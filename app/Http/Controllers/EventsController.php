<?php

namespace App\Http\Controllers;

use App\Enums\EventsFilters;
use App\Models\Events;
use LaravelIdea\Helper\App\Models\_IH_Events_C;

class EventsController extends Controller
{

    //TODO filtrar por metodos al mismo tiempo, ej. año, categoria, ubicacion

    /**
     * @param string $eventName
     * @return Events[]|_IH_Events_C devuelve un evento por su nombre
     * el formulario llamara a este metodo
     */
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
    }

    /**
     * @param string $province
     * @return Events[]|_IH_Events_C
     * el formulario llamara a este metodo
     */
    public function getEventsFromProvince(string $province)
    {
        return Events::where(EventsFilters::COMARCA_I_MUNICIPI->value, 'LIKE', 'agenda:ubicacions/' . $province . '%')
            ->where(EventsFilters::DATA_FI->value, '>', '2022')
            ->orderBy(EventsFilters::DATA_INICI->value, 'asc')
            ->get();
    }

    public function getEventsFromCategory(string $category)
    {
        return Events::where(EventsFilters::TAGS_CATEGOR_ES->value, 'LIKE', 'agenda:categories/' . $category . '%')->get();
    }

    public function getEventsFromProvinceAndCategory(string $province, string $category)
    {
        return Events::where(EventsFilters::COMARCA_I_MUNICIPI->value, 'LIKE', 'agenda:ubicacions/' . $province . '%')
            ->where(EventsFilters::TAGS_CATEGOR_ES->value, 'LIKE', 'agenda:categories/' . $category . '%')->get();

    }

    /**
     * @param Events $event
     * @return Events|Events[]|_IH_Events_C|null
     * al hacer clic en un evento, se abrira un "modal" con información del evento
     * y llamara a este metodo
     */
    public function show(Events $event)
    {
        return $event;
    }
}
