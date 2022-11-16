<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEventsRequest;
use App\Http\Requests\UpdateEventsRequest;
use App\Models\Events;
use Illuminate\Http\Response;
use Illuminate\View\View;

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
        /*
        $from = date('2020-01-01');
        $to = date('2013-05-02');
        $events = Events::WhereBetween('data_inici', [$from, $to])->get()->paginate(4);
        return $events;
        */
    }

    public function eventsCategory(string $categoria)
    {

        $event = Events::select('*')->where('tags_categor_es', '=', 'agenda:categories/' . $categoria)->get();
        return compact('event');
    }

    public function eventsMunicipi(string $municipi)
    {
        $event = Events::select('*')->where('comarca_i_municipi', 'LIKE', 'agenda:ubicacions/' . $municipi . '%')->get();
        return compact('event');
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
     * @return view
     */
    public function show(int $id): view
    {
        $event = Events::find($id);
        return view('index', compact('event'));
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
