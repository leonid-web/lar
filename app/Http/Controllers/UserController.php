<?php

namespace App\Http\Controllers;

use App\Razdel;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function store(Razdel $razdel,Request $request){
        return Razdel::create($request->all());
        return redirect('admin');
    }
    public function index()
    {
        $users=DB::table('users')->get();
        return (view('event.edit_event', ['users' => $users]));

    }
}
