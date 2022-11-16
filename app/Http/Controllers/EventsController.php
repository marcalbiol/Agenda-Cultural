<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEventsRequest;
use App\Http\Requests\UpdateEventsRequest;
use App\Models\Events;
use Illuminate\Http\Response;
use Illuminate\View\View;

class EventsController extends Controller
{

    //TODO filtrar por metodos al mismo tiempo, ej. año, categoria, ubicacion

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
     * @return array
     */

    public function index()
    {
        //      return $events;

    }


    public function eventsYear(int $year)
    {

        return Events::select('*')->where('data_inici', 'LIKE', $year . '%')
            ->paginate(4);

        //TODO handle errors en laravel?
    }


    /**
     * @param int $id
     * @return Events|Events[]|\LaravelIdea\Helper\App\Models\_IH_Events_C|null
     * al hacer clic en un evento, se abrira un "modal" con información del evento
     * y llamara a este metodo
     */
    public function eventsById(int $id)
    {

        return Events::find($id);
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
