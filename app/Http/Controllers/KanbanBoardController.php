<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\KanbanBoard;
use App\Models\Work;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class KanbanBoardController extends Controller
{
    /**
     * Display a Kanban board.
     */
    public function index(Event $event)
    {
        Gate::authorize('viewAny', KanbanBoard::class);

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
    public function createWork(Event $event)
    {
        Gate::authorize('viewAny', KanbanBoard::class);
        return view('kanbanboard.create', [
            'event' => $event
        ]);
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
    public function update(Request $request, Event $event)
    {
        Gate::authorize('update', KanbanBoard::class);

        $work_id = $request->get('work_id');

        $work = $event->kanbanBoard->works()->get()->find($work_id);

        $work->status = $request->get('new_status');
        $work->save();

        return redirect()->route('kanban-board.index', [
            'event' => $event
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroyWork(Request $request, Event $event)
    {
        Gate::authorize('delete', KanbanBoard::class);

        $work_id = $request->get('work_id');

        $workToDelete = $event->kanbanBoard->works()->get()->find($work_id);

        $workToDelete->delete();

        return redirect()->route('kanban-board.index', [
            'event' => $event
        ]);
    }
}
