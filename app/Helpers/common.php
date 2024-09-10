<?php

if(!function_exists('get_categories')) {
    function get_categories()
    {
        return \App\Models\Category::all();
    }
}
//Get Service Providers
if(!function_exists('get_service_providers')) {
    function get_service_providers()
    {
        return \App\Models\User::where('role', 'service_provider')->get();
    }
}
if (!function_exists('get_approved_service_providers')){

        function get_approved_service_providers()
        {
            return \App\Models\User::where('role', 'service_provider')
                ->whereHas('profile', function($query) {
                    $query->where('status', 'approved');
                })
                ->get();
        }
}

if (!function_exists('_t')){

        function _t($key)
        {
            // check if the key exists in the database
            $language = \App\Models\Language::where('key', $key)
                ->where('language', app()->getLocale())
                ->first();

            if($language) {
                return $language->value;
            }

            // if the key does not exist in the database, create it
            \App\Models\Language::create([
                'key' => $key,
                'value' => $key,
                'language' => app()->getLocale()
            ]);


            return $key;
        }
}

if(!function_exists('get_users')) {
    function get_users()
    {
        return \App\Models\User::where('role', 'user')->get();
    }
    if (!function_exists('get_reviews')) {
        function get_reviews($column, $value) {
            return \App\Models\Review::where($column, $value)->avg('rating');
        }
    }

}
