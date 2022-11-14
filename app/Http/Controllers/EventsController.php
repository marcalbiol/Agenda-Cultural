<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEventsRequest;
use App\Http\Requests\UpdateEventsRequest;
use App\Models\Events;
use Illuminate\Http\Response;

class EventsController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public static function create()
    {

    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $events = Events::paginate(4);
        return $events;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreEventsRequest $request
     * @return Response
     */
    public function store(StoreEventsRequest $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param Events $events
     * @return array
     */
    public function show(int $id): array
    {
        $event = Events::find($id);
        return compact('event');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param Events $events
     * @return Response
     */
    public function edit(Events $events)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateEventsRequest $request
     * @param Events $events
     * @return Response
     */
    public function update(UpdateEventsRequest $request, Events $events)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Events $events
     * @return Response
     */
    public function destroy(Events $events)
    {
        //
    }
}
