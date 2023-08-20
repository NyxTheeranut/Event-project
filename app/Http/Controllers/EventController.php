<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::get();

        return view('events.index', [
            'events' => $events
        ]);
    }

    /**
     * Show the form for creating a new event.
     */
    public function create()
    {
        return view('events.create');
    }

    /**
     * Show the form for creating a new application.
     */
    public function createApplication(Request $request)
    {
        return view('events.create-application', [
            'event' => $request->get('event')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $event = new Event();
        $event->title = $request->get('title');
        $event->description = $request->get('description');
        $event->start_date_time = $request->get('start_date_time');
        $event->end_date_time = $request->get('end_date_time');
        $event->budget = $request->get('budget');

        $event->save();
        return redirect()->route('events.index');
    }

    /**
     * Display the event detail.
     */
    public function show(Event $event)
    {
        return view('events.show', [
            'event' => $event
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        $event->title = $request->get('title');
        $event->description = $request->get('description');
        $event->start_date_time = $request->get('start_date_time');
        $event->end_date_time = $request->get('end_date_time');
        $event->budget = $request->get('budget');

        $event->save();
        return redirect()->route('events.show', [
            'event' => $event
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('events.index');
    }
}
