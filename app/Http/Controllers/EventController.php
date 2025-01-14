<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;

use MaddHatter\LaravelFullCalendar\Facades\Calendar;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::all();
        $event = [];
        foreach($events as $row){
            $enddate = $row->end_Date."24:00:00";
            $event[] = \Calendar::event(
                $row->title,
                true,
                new\DateTime($row->start_date),
                new\DateTime($row->end_date),
                $row->id,
                [
                    'color'=>$row->color,
                ]
                );
        }
        $calendar = \Calendar::addEvents($event);
        return view('eventpage', compact('event','calendar'));
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

    public function display(){
        return view('addevent');
    }

    public function store(Request $request){
        $this->validate($request,[
            'title'=>'required',
            'color'=>'required',
            'start_date'=>'required',
            'end_date'=>'required',
        ]);

        $events=new Event;

        $events->title=$request->input('title');
        $events->color=$request->input('color');
        $events->start_date=$request->input('start_date');
        $events->end_date=$request->input('end_date');

        $events->save();

        return redirect('events')->with('sucsess','Events Added');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
        //
    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $events = Event::all();
        return view('display')->with('events',$events);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
