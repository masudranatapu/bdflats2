<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    //

    public function dashboard()
    {
        $data['title'] = 'Dashboard';
        $data['total_property'] = DB::table('prd_listings')->count();
        $data['total_property_published'] =  DB::table('prd_listings')->where('status',10)->count();;
        $data['total_owner'] = DB::table('users')->whereIn('user_type',[2,3,4])->count();
        $data['total_seeker'] = DB::table('users')->where('user_type',1)->count();
        return view('admin.dashboard',compact('data'));
    }


    public function cacheClear(){
        // \Artisan::call('php artisan cache:forget spatie.permission.cache');
        \Artisan::call('route:clear');
        \Artisan::call('optimize');
        \Artisan::call('optimize:clear');
        \Artisan::call('view:clear');
        \Artisan::call('view:cache');
        \Artisan::call('config:clear');
        \Artisan::call('storage:link');
        // Artisan::call('cache:forget');
        \Artisan::call('cache:forget spatie.permission.cache');
        \Artisan::call('config:cache');

        return redirect()->route('admin.dashboard');
    }

    public function adminProfile()
    {
         return view('admin.profile.index');
    }

}
