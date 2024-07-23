<?php

if(!function_exists('get_categories')) {
    function get_categories()
    {
        return \App\Models\Category::all();
    }
}
