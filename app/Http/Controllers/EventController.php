<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Event;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

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
    public function create(Request $request)
    {

        $event = new Event();
        $event->title = $request->title;
        $event->start_date_time = $request->start_date_time;
        $event->organizer = $request->user();
        $event->save();

        return redirect()->route('events.index');
    }

    /**
     * Show the form for creating a new application.
     */
    public function createApplication(Event $event)
    {
        if (! Auth::check()) {
            return redirect()->route('login');
        }

        return view('events.create-application', [
            'event' => $event
        ]);
    }

    public function storeApplication(Request $request, Event $event)
    {
        Gate::authorize('apply', Event::class);
        $application = new Application();
        $application->event_id = $event->id;
        $application->user_id = $request->user()->id;
        $application->video_url = $request->video_url;
        $application->message = $request->message;
        $application->save();

        return redirect()->route('applications.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) //, User $user)
    {
        Gate::authorize('create', Event::class);

        $event = new Event();
        $event->title = $request->title;
        $event->start_date_time = $request->start_date_time;
        $event->organizer = $request->user()->id;
        $event->save();

        return redirect()->route('events.show', [
            'event' => $event
        ]);
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
        return view('events.edit', [
            'event' => $event
        ]);
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
