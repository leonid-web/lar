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
//    public function index()
//    {
//        $users=DB::table('users')->get();
//        return (view('event.edit_event', ['users' => $users]));
//
//    }
//    public function index()
//    {
//        $data=DB::table('razdels')->get();
//        return (view('admin', ['data' => $data]));
//
//    }
    public function destroy(Razdel $razdel)
    {
        $razdel->delete();
        return redirect('admin');
    }
    public function edit(Razdel $razdel)
    {
        return (view('razdel.edit_razdel', ['data' => $razdel]));
    }
    public function update(Request $request, Razdel $razdel)
    {
        $razdel->update($request->all());
        return redirect('admin');
    }
}
