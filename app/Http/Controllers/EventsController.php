<?php

namespace App\Http\Controllers;

use App\Enums\EventsFilters;
use App\Models\Events;
use Illuminate\View\View;
use LaravelIdea\Helper\App\Models\_IH_Events_C;

class EventsController extends Controller
{

    //TODO filtrar por metodos al mismo tiempo, ej. año, categoria, ubicacion

    /**
     * @param string $eventName
     * @return Events[]|_IH_Events_C devuelve un evento por su nombre
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
        function getRandomEvents()
        {
            $eventsList = Events::inRandomOrder()
            ->limit(5)
            ->orderBy(EventsFilters::TAGS_CATEGO_ES->value)
            ->orderBy(EventsFilters::COMARCA_I_MUNICIPI->value)
            ->get();

            return $eventsList;
        }

        $event = Events::where([
            [EventsFilters::DENOMINACI->value, '=', $eventName],
            [EventsFilters::CODI->value, '=', $codi],
        ])->get();

        $randomEvents = getRandomEvents();

        $eventAndRandomEvents = array(
            $event,
            $randomEvents
        );

        return $eventAndRandomEvents;
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
    public function show(Events $event)
    {
        return view('show', ['event'=>$event]);
    }

    public function getByDate($year, $month) {
        return Events::where('data_inici', 'LIKE', $year . '-' .$month . '%')->get();
    }

    public function generateSitemap()
    {
        $events = Events::all();
        $output = '<?xml version="1.0" encoding="UTF-8"?>';
        $output .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
        foreach ($events as $event) {
            $output .= "<url><loc>http://www.quefer.cat/events/" . $event->id . "</loc></url>";
        }
        $output .= "</urlset>";
        return $output;
    }

    /**
     * @return Events[]
     */
    public function getRandomEvents() {
        $events = Events::inRandomOrder()
            ->limit(10)
            ->get();

        return view('welcome', ['events' => $events ]);
    }


    //

}
