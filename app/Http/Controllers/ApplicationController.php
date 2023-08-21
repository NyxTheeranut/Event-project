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
        $applications = Application::get();

        return view('applications.index', [
            'applications' => $applications
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
