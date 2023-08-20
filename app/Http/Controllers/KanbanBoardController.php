<?php

namespace App\Http\Controllers;

use App\Models\KanbanBoard;
use App\Models\Work;
use Illuminate\Http\Request;

class KanbanBoardController extends Controller
{
    /**
     * Display a Kanban board.
     */
    public function index()
    {
//        $works = KanbanBoard::find(1)->works()->get();
        $planning = Work::planning()->get();
        $in_progress = Work::inProgress()->get();
        $review = Work::review()->get();
        $done = Work::done()->get();

        return view('kanbanboard.index', [
            'planning' => $planning,
            'in_progress' => $in_progress,
            'review' => $review,
            'done' => $done
        ]);
    }

    /**
     * Show the form for creating a new work.
     */
    public function create()
    {
        //
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
    public function destroy(KanbanBoard $kanbanBoard)
    {
        //
    }
}
