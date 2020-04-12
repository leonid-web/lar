<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EventController extends Controller
{
    public function index(){
        $events=DB::table('events')->oldest('date')->get();
        return (view('admin', ['events' => $events]));
    }
    public function edit(Event $event){
        return (view('event.edit_event', ['data' => $event]));
    }
    public function update(Request $request, Event $event)
    {
        $event->update($request->all());
//        return redirect('home');
        return $event;
    }
}
