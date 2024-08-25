<?php

namespace App\Livewire;

use App\Models\Profile_Management;
use Livewire\Component;
use App\Models\BlogPost;
use App\Models\Approve;
use Illuminate\Support\Facades\Auth;

class ApproveButton extends Component
{
    public $post;
    public $approveCount;
    public $hasApproved;

    public function mount(BlogPost $post)
    {
        $this->post = $post;
        $this->approveCount = $post->approve()->count();
        $this->hasApproved = $post->approve->contains('user_id', Auth::id());
    }

    public function toggleApprove()
    {
        // Check if the authenticated user's role is 'user'
        if (Auth::user()->role === 'user') {
            // Redirect back with flash message
            return redirect()->back()->with('flash.bannerStyle', 'danger')
                ->with('flash.banner', 'You are not authorized to approve Job posts!');
        }
        else{
            //Check if authenticated user as a profile
            $profile = Profile_Management::where('service_provider_id', auth()->id())->first();
            if (!$profile) {
                // Redirect back with flash message
                return redirect()->back()->with('flash.bannerStyle', 'danger')
                    ->with('flash.banner', 'You need to create a profile to approve Job posts!');
            }
        }
        if ($this->hasApproved) {
            // Unlike
            Approve::where('blog_post_id', $this->post->id)
                ->where('user_id', Auth::id())
                ->delete();

            $this->hasApproved = false;
            $this->approveCount--;
        } else {
            // Like
            Approve::create([
                'blog_post_id' => $this->post->id,
                'user_id' => Auth::id(),
            ]);

            $this->hasApproved = true;
            $this->approveCount++;
        }
    }

    public function render()
    {
        return view('livewire.approve-button');
    }
}

