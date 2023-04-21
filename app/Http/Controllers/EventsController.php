<?php

namespace App\Http\Controllers;

use App\Enums\EventsFilters;
use App\Models\Events;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
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
        function getRandomEventsByCategoryAndProvince()
        {
            $eventsList = Events::inRandomOrder()
                ->limit(5)
                ->orderBy(EventsFilters::TAGS_CATEGOR_ES->value)
                ->orderBy(EventsFilters::COMARCA_I_MUNICIPI->value)
                ->get();

            return $eventsList;
        }

        $event = Events::where([
            [EventsFilters::DENOMINACI->value, '=', $eventName],
            [EventsFilters::CODI->value, '=', $codi],
        ])->get();

        $randomEvents = getRandomEventsByCategoryAndProvince();

        $eventAndRandomEvents = array(
            $event,
            $randomEvents
        );

        return $eventAndRandomEvents;
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


    /**
     * @param Events $event
     * @return Events|Events[]|_IH_Events_C|null
     * al hacer clic en un evento, se abrira un "modal" con información del evento
     * y llamara a este metodo
     */
    public function show(Events $event)
    {
        $eventsList = $this->getRandomEvents(3, $event->comarca_i_municipi);
        return view('show', ['event'=>$event, 'eventsList'=>$eventsList]);
    }

    public function getByDate($year, $month)
    {
        return Events::where('data_inici', 'LIKE', $year . '-' . $month . '%')->get();
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
     * @param int $limit
     * @param string $province
     * @return Events
     */
    public function getRandomEvents($limit, $province = null)
    {
        $events = Events::inRandomOrder()
            ->where(EventsFilters::COMARCA_I_MUNICIPI->value, 'LIKE', $province . '%')
            ->limit($limit)
            ->get();

        return $events;
    }

    /**
     * @param int
     * @return Application|Factory|View
     */
    public function getCalendarView() {
        $events = $this->getRandomEvents(10);

        return view('welcome', compact("events"));
    }

    /**
     * @param string $denominaci
     * @param string $data_inici
     * @param string $data_fi
     * @return Application|Factory|View
     */
    public function getEvents(Request $request)
    {
        $events = null;

        if ($request->denominaci != null) {
            $events = Events::where(EventsFilters::DENOMINACI->value, 'LIKE', '%' . $request->denominaci . '%');
        }

        if ($request->data_inici != null) {
            $events = Events::where(EventsFilters::DATA_INICI->value, '>=', date($request->data_inici));
        }

        if ($request->data_fi != null) {
            $events = Events::where(EventsFilters::DATA_INICI->value, '<=', date($request->data_fi));
        }

        if ($events != null) {
            $events = $events->get();
        } else {
            $events = $this->getRandomEvents(10);
            return view('welcome', compact("events"));
        }

        return view('welcome', compact("events"));
    }

    /**
     * @param string $province
     * @param string $category
     */
    public function getEventsFromProvinceAndCategory(string $province, string $category)
    {
        return Events::where(EventsFilters::COMARCA_I_MUNICIPI->value, 'LIKE', 'agenda:ubicacions/' . $province . '%')
            ->where(EventsFilters::TAGS_CATEGOR_ES->value, 'LIKE', 'agenda:categories/' . $category . '%')
            ->get();

    }
}
