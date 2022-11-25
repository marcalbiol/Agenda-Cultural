<?php

namespace App\Http\Controllers;

use App\Enums\EventsFilters;
use App\Http\Requests\StoreEventsRequest;
use App\Http\Requests\UpdateEventsRequest;
use App\Models\Events;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Response;
use Illuminate\View\View;
use LaravelIdea\Helper\App\Models\_IH_Events_C;

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

    //TODO sitemap XML

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|\Illuminate\Contracts\View\View
     */
    public function index(string $where, string $value, string $orderBy, string $orderType)
    {
        $events = Events::where($where, "LIKE", $value . "%")
            ->orderBy($orderBy, $orderType)
            ->paginate(10);
        return view('welcome', compact('events', 'orderBy', 'orderType', 'where'));

    }


    public function getEventName(string $eventName)
    {
        return Events::where(EventsFilters::DENOMINACI->value, '=', $eventName)->get();
    }

    /**
     * @param string $eventName
     * @param string $codi
     * @return _IH_Events_C|Events[] un evento a partir del nombre del evento y codigo
     */
    public function getEventNameWithCodi(string $eventName, string $codi)
    {
        return Events::where([
            [EventsFilters::DENOMINACI->value, '=', $eventName],
            [EventsFilters::CODI->value, '=', $codi]
        ])->get();
        //TODO ordenar por categoria y ciudad
    }

    public function eventsCategory(string $categoria)
    {
        $event = Events::select('*')->where(EventsFilters::TAGS_CATEGO_ES->value, '=', 'agenda:categories/' . $categoria)->get();
        return compact('event');
    }

    public function getEventsFromProvince(string $municipi)
    {
        return Events::where(EventsFilters::COMARCA_I_MUNICIPI->value, 'LIKE', 'agenda:ubicacions/' . $municipi . '%')->get();
        //TODO oredenar por fecha inicio y no q no hayan terminado
    }


    /**
     * @param Events $event
     * @return Events|Events[]|_IH_Events_C|null
     * al hacer clic en un evento, se abrira un "modal" con información del evento
     * y llamara a este metodo
     */
    public function getById(Events $event)
    {
        return $event;
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
