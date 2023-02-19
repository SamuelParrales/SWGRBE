<?php

namespace App\Http\Controllers\mvc\user\admin;

use App\Http\Controllers\Controller;
use App\Models\Report;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function userIndex(Request $request){

        $profile_type = $request->input('profile_type',null);
        $username = $request->input('username',null);

        $searchParams = compact('profile_type','username');
        $users = User::where('profile_type','!=','App\Models\Admin'); // admin not showing

        if($profile_type)
        {
            $profile_type = "App\Models\\". $profile_type;
            $users = $users->where('profile_type',$profile_type);
        }

        if($username)
        {
            $users =  $users->where('username','like','%'.$username.'%');
        }

        $users = $users->paginate(10);

        $users->appends($searchParams);
        return view('user.admin.user.index', compact('users','searchParams'));
    }
    public function moderatorCreate()
    {
        return view('user.admin.user.moderatorCreate');
    }

    public function reportIndex(Request $request){
        $order_by = $request->input('order_by','desc');
        $username = $request->input('username',null);

        $searchParams = compact('order_by','username');

        $reports = Report::query();
                                            //fILTERS
        if($username)
        {
            $reports = $reports->join('products', 'reports.product_id', '=', 'products.id')
            ->join('users', 'users.id', '=', 'products.user_id')
            ->where('users.username','like','%'.$username.'%');
        }
        if($order_by == 'desc' || $order_by == 'asc')
        {
            $reports = $reports->orderBy('reports.created_at',$order_by);
        }

        $reports = $reports->paginate(10);
        $reports->appends($searchParams);

        return view('user.admin.report.index', compact('reports','searchParams'));
    }
}
