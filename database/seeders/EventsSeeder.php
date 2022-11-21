<?php

namespace Database\Seeders;

use App\Models\Events;
use Illuminate\Database\Seeder;

class EventsSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = file_get_contents('https://analisi.transparenciacatalunya.cat/resource/rhpv-yr4f.json?$limit=500', true);
        $data = json_decode($json, false);

        foreach ($data as $event) {
            Events::create(array(
                'codi' => $event->codi,
                'data_fi' => property_exists($event, 'data_fi') ? $event->data_fi : '',
                'data_inici' => property_exists($event, 'data_inici') ? $event->data_inici : '',
                'denominaci' => property_exists($event, 'denominaci') ? $event->denominaci : '',
                'descripcio' => property_exists($event, 'descripcio') ? $event->descripcio : '',
                'entrades' => property_exists($event, 'entrades') ? $event->entrades : '',
                'horari' => property_exists($event, 'horari') ? $event->horari : '',
                'subt_tol' => property_exists($event, 'subt_tol') ? $event->subt_tol : '',
                'tags_mbits' => property_exists($event, 'tags_mbits') ? $event->tags_mbits : '',
                'tags_categor_es' => property_exists($event, 'tags_categor_es') ? $event->tags_categor_es : '',
                'enlla_os' => property_exists($event, 'enlla_os') ? $event->enlla_os : '',
                'imatges' => property_exists($event, 'imatges') ? $event->imatges : '',
                'adre_a' => property_exists($event, 'adre_a') ? $event->adre_a : '',
                'descripcio_html' => property_exists($event, 'descripcio_html') ? $event->descripcio_html : '',
                'tel_fon' => property_exists($event, 'tel_fon') ? $event->tel_fon : '',
                'email' => property_exists($event, 'email') ? $event->email : '',
                'espai' => property_exists($event, 'espai') ? $event->espai : '',
                'url' => property_exists($event, 'url') ? $event->url : '',
                'comarca_i_municipi' => property_exists($event, 'comarca_i_municipi') ? $event->comarca_i_municipi : '',
            ));
        }

    }
}
