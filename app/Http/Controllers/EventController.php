<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventValidate;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Carbon\CarbonTimeZone;
use Illuminate\Support\Facades\Session as FacadesSession;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventValidate $request)
    {
      try{
        $value = FacadesSession::get('calender');
        $event = new Event();
        $event->title = $request->title;
        $event->description = $request->description;
        $event->start = $request->start;
        $event->end = $request->end;
        $event->user_id = Auth::id();
        $event->calendar_id = $value;
        $event->save();
      }catch(\Exception $e){
     return response()->json($e);

    }
}

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        //event
        $value = FacadesSession::get('calender');
        $event = Event::select("*")->where("user_id",Auth::id())->where("calendar_id",$value)->get();
        
        return response()->json($event);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $event = Event::select("*")->where("id",$id)->get();
        return response()->json($event);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(EventValidate $request, Event $event)
    {
        try{
            $event = Event::findOrFail($request->id);
            $event->title = $request->title;
            $event->description = $request->description;
            $event->start = $request->start;
            $event->end = $request->end;
            $event->save();
          }catch(\Exception $e){
            dd($e);
        }
        return response()->json($event);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event::find($id)->delete();
        return response()->json($event);
    }
}
