<?php

namespace App\Http\Controllers;

use App\Models\KanbanBoard;
use Illuminate\Http\Request;

class KanbanBoardController extends Controller
{
    /**
     * Display a Kanban board.
     */
    public function index()
    {
        return view('kanbanboard.index');
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
