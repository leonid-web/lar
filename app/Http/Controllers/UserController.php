<?php

namespace App\Http\Controllers;

use App\Razdel;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function store(Razdel $razdel,Request $request){
        return Razdel::create($request->all());
        return redirect('admin');
    }
}
