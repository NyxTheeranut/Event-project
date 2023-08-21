<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\BudgetRequest;
use Illuminate\Http\Request;

class BudgetRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $budgetrequests = BudgetRequest::get();
        $events = Event::get();

        return view('budgetrequests.index', ['budgetrequests' => $budgetrequests, 'events' => $events]);
    }

    /**
     * Show the form for creating a new resource.
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
     * Display the specified resource.
     */
    public function show(BudgetRequest $budgetRequest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BudgetRequest $budgetRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BudgetRequest $budgetrequest)
    {
        return $budgetrequest;
        $budgetRequest->status = $request->get('status');
        $budgetRequest->reason = $request->get('reason');
        $budgetRequest->save();

        return redirect()->route('budgetrequests.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BudgetRequest $budgetRequest)
    {
        //
    }

}
