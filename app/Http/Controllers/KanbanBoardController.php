<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\KanbanBoard;
use App\Models\Work;
use Illuminate\Http\Request;

class KanbanBoardController extends Controller
{
    /**
     * Display a Kanban board.
     */
    public function index(Event $event)
    {
        $kanbanBoard = $event->kanbanBoard;

        $planning = $kanbanBoard->works()->planning()->get();
        $in_progress = $kanbanBoard->works()->inProgress()->get();
        $review = $kanbanBoard->works()->review()->get();
        $done = $kanbanBoard->works()->done()->get();

        return view('kanbanboard.index', [
            'planning' => $planning,
            'in_progress' => $in_progress,
            'review' => $review,
            'done' => $done,
            'event' => $event
        ]);
    }

    /**
     * Show the form for creating a new work.
     */
    public function create()
    {
        return view('kanbanboard.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified work.
     */
    public function show(KanbanBoard $kanbanBoard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KanbanBoard $kanbanBoard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, KanbanBoard $kanbanBoard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroyWork(Array $array)
    {
        $work = $array('work');
        $event = $array('event');

        $work_id = $work->id;
        $workToDelete = $event->kanbanBoard->works()->find($work_id);

        $workToDelete->delete();

        return redirect()->route('kanban-board.index', [
            'event' => $event
        ]);
    }
}
