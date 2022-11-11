<?php

namespace Database\Seeders;

use App\Models\Events;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class EventsSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get("database/data/data.json");
        $data = json_decode($json);

        foreach ($data as $obj) {
            Events::create(array(
                'codi' => $obj->codi,
                'data_fi' => $obj->data_fi,
                'data_inici' => $obj->data_inici,
                'denominaci' => $obj->denominaci,
                'descripcio' => $obj->descripcio,
                'entrades' => $obj->entrades,
                'horari' => $obj->horari,
                'subt_tol' => $obj->subt_tol,
                'tags_mbits' => $obj->tags_mbits,
                'tags_categor_es' => $obj->tags_categor_es,
                'enlla_os' => $obj->enlla_os,
                'imatges' => $obj->imatges,
                'v_deos' => $obj->v_deos,
                'adre_a' => $obj->adre_a,
                'comarca_i_municipi' => $obj->comarca_i_municipi,
                'email' => $obj->email,
                'espai' => $obj->espai,
                'latitud' => $obj->latitud,
                'longitud' => $obj->longitud,
                'tel_fon' => $obj->tel_fon,
                'url' => $obj->url,
                'imgapp' => $obj->imgapp,
                'descripcio_html' => $obj->descripcio_html,
            ));
        }

    }
}
