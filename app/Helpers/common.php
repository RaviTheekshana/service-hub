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
if(!function_exists('get_users')) {
    function get_users()
    {
        return \App\Models\User::where('role', 'user')->get();
    }
}
