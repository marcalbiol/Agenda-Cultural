<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEventsRequest;
use App\Http\Requests\UpdateEventsRequest;
use App\Models\Events;
use Illuminate\Http\Response;
use Illuminate\Pagination\LengthAwarePaginator;
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

    /**
     * Display a listing of the resource.
     *
     * @return _IH_Events_C|Events[]|LengthAwarePaginator
     */
    public function index(string $where, string $value, string $orderBy, string $orderType)
    {
        $events = Events::where($where, "LIKE", $value . "%")
            ->orderBy($orderBy, $orderType)
            ->paginate(10);
        return $events;
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
