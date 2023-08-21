<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Application;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('applications.index', [
            'applications' => Application::get(),
            'events' => Event::get()
        ]);
    }
    public function getEvents()
    {
        $events = Event::get();

        return view('applications.index', [
            'events' => $events
        ]);
    }
}
