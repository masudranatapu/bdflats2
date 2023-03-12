<?php

use App\Models\WebSetting;
use Illuminate\Support\Facades\DB;

if (!function_exists('setting')) {
    function setting()
    {
        return DB::table('web_settings')->first();
    }
}


if (!function_exists('defaultThumb')) {
    function defaultThumb($path): string
    {
        if (file_exists(public_path($path))) {
            return asset($path);
        }
        return asset('images/default.jpg');
    }
}

if (!function_exists('transaction_type')) {
    function transaction_type($type): string
    {
        switch ($type) {
            case 1:
                $msg = 'Recharge';
                break;
            case 2:
                $msg = 'Property Payment';
                break;
            default:
                $msg = 'Listing Lead Purchase Payment';
        }
        return $msg;
    }
}


if (!function_exists('posted_by')) {
    function posted_by($user_id): bool
    {
        if (request()->query->has('posted_by')) {
            $pst = request()->query('posted_by');
            $pst = explode(',', $pst);
            return in_array($user_id, $pst);
        }
        return false;
    }
}

if (!function_exists('meta_info')) {
    function meta_info($data = null): array
    {
        $web = WebSetting::all()->first();
//        dd($web);
        return [
            'title' => ($data && isset($data['title'])) ? $data['title'] : ($web->META_TITLE ?: $web->TITLE),
            'description' => ($data && isset($data['description'])) ? $data['description'] : ($web->META_TITLE ?: $web->DESCRIPTION),
            'keywords' => ($data && isset($data['keywords'])) ? $data['keywords'] : ($web->META_KEYWARDS ?? ''),
            'og_image' => ($data && isset($data['og_image'])) ? $data['og_image'] : ($web->OG_IMAGE ?: $web->META_IMAGE),
        ];
    }
}

if (!function_exists('fileExit')) {
    function fileExit($path) {
        if($path){
            $ppath = public_path($path);
            if(file_exists($ppath)){
              return asset($path);
            } else {
                return asset('images/no-photo.png');
           }
        }else{
            return asset('images/no-photo.png');
        }

    }
}

if (!function_exists('fileExitRemote')) {
    function fileExitRemote($url) {
        $curl = curl_init($url);
        //don't fetch the actual page, you only want to check the connection is ok
        curl_setopt($curl, CURLOPT_NOBODY, true);
        //do request
        $result = curl_exec($curl);
        $ret = asset('img/no-photo.png');
        //if request did not fail
        if ($result !== false) {
            //if request was ok, check response code
            $statusCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
            if ($statusCode == 200) {
                $ret = $url;
            }
        }
        curl_close($curl);
        return $ret;

    }
}

if (!function_exists('getLogo')) {
    function getLogo($path = null)
    {
        if($path){
            $ppath = public_path($path);
            if(file_exists($ppath)){
              return asset($path);
            } else {
                return asset('assets/img/default_avatar.jpg');
           }
        }else{
            return asset('assets/img/default_avatar.jpg');
        }
    }
}



if (!function_exists('getAvatar')) {
    function getAvatar($path)
    {
        if(!empty($path)){
              return $path;
            } else {
            // return asset('assets/img/card/personal.png');
            return asset('assets/img/default_avatar.jpg');
        }
    }
}

if (!function_exists('getCover')) {
    function getCover($path = null)
    {
        if($path){
            $ppath = public_path($path);
            if(file_exists($ppath)){
              return asset($path);
            } else {
                return asset('assets/img/default-cover.png');
           }
        }else{
            return asset('assets/img/default-cover.png');
        }
    }
}
if (!function_exists('getProfile')) {
    function getProfile($path = null)
    {
        if($path){
            $ppath = public_path($path);
            if(file_exists($ppath)){
              return asset($path);
            } else {
                return asset('assets/img/default_avatar.jpg');
           }
        }else{
            return asset('assets/img/default_avatar.jpg');
        }

    }
}
