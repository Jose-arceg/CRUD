<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Provincia;
use Illuminate\Support\Facades\DB;

class ProvinciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Provincias')->insert([
            [
                'provincia_nom' =>'Arica',
                'region_id' =>1,
            ],[
                'provincia_nom' =>'Parinacota',
                'region_id' =>1,
            ],[
                'provincia_nom' =>'Iquique',
                'region_id' =>2,
            ],[
                'provincia_nom' =>'El Tamarugal',
                'region_id' =>2,
            ],[
                'provincia_nom' =>'Tocopilla',
                'region_id' =>3,
            ],[
                'provincia_nom' =>'El Loa',
                'region_id' =>3,
            ],[
                'provincia_nom' =>'Antofagasta',
                'region_id' =>3,
            ],[
                'provincia_nom' =>'Chañaral',
                'region_id' =>4,
            ],[
                'provincia_nom' =>'Copiapó',
                'region_id' =>4,
            ],[
                'provincia_nom' =>'Huasco',
                'region_id' =>4,
            ],[
                'provincia_nom' =>'Elqui',
                'region_id' =>5,
            ],[
                'provincia_nom' =>'Limarí',
                'region_id' =>5,
            ],[
                'provincia_nom' =>'Choapa',
                'region_id' =>5,
            ],[
                'provincia_nom' =>'Petorca',
                'region_id' =>6,
            ],[
                'provincia_nom' =>'Los Andes',
                'region_id' =>6,
            ],[
                'provincia_nom' =>'San Felipe de Aconcagua',
                'region_id' =>6,
            ],[
                'provincia_nom' =>'Quillota',
                'region_id' =>6,
            ],[
                'provincia_nom' =>'Valparaiso',
                'region_id' =>6,
            ],[
                'provincia_nom' =>'San Antonio',
                'region_id' =>6,
            ],[
                'provincia_nom' =>'Marga Marga',
                'region_id' =>6,
            ],[
                'provincia_nom' =>'Chacabuco',
                'region_id' =>7,
            ],[
                'provincia_nom' =>'Santiago',
                'region_id' =>7,
            ],[
                'provincia_nom' =>'Cordillera',
                'region_id' =>7,
            ],[
                'provincia_nom' =>'Maipo',
                'region_id' =>7,
            ],[
                'provincia_nom' =>'Melipilla',
                'region_id' =>7,
            ],[
                'provincia_nom' =>'Talagante',
                'region_id' =>7,
            ],[
                'provincia_nom' =>'Cachapoal',
                'region_id' =>8,
            ],[
                'provincia_nom' =>'Colchagua',
                'region_id' =>8,
            ],[
                'provincia_nom' =>'Cardenal Caro',
                'region_id' =>8,
            ],[
                'provincia_nom' =>'Curicó',
                'region_id' =>9,
            ],[
                'provincia_nom' =>'Talca',
                'region_id' =>9,
            ],[
                'provincia_nom' =>'Linares',
                'region_id' =>9,
            ],[
                'provincia_nom' =>'Cauquenes',
                'region_id' =>9,
            ],[
                'provincia_nom' =>'Diguillín',
                'region_id' =>10,
            ],[
                'provincia_nom' =>'Itata',
                'region_id' =>10,
            ],[
                'provincia_nom' =>'Punilla',
                'region_id' =>10,
            ],[
                'provincia_nom' =>'Bio Bío',
                'region_id' =>11,
            ],[
                'provincia_nom' =>'Concepción',
                'region_id' =>11,
            ],[
                'provincia_nom' =>'Arauco',
                'region_id' =>11,
            ],[
                'provincia_nom' =>'Malleco',
                'region_id' =>12,
            ],[
                'provincia_nom' =>'Cautín',
                'region_id' =>12,
            ],[
                'provincia_nom' =>'Valdivia',
                'region_id' =>13,
            ],[
                'provincia_nom' =>'Ranco',
                'region_id' =>13,
            ],[
                'provincia_nom' =>'Osorno',
                'region_id' =>14,
            ],[
                'provincia_nom' =>'Llanquihue',
                'region_id' =>14,
            ],[
                'provincia_nom' =>'Chiloé',
                'region_id' =>14,
            ],[
                'provincia_nom' =>'Aysén',
                'region_id' =>15,
            ],[
                'provincia_nom' =>'General Carrera',
                'region_id' =>15,
            ],[
                'provincia_nom' =>'Capitán Prat',
                'region_id' =>15,
            ],[
                'provincia_nom' =>'Última Esperanza',
                'region_id' =>16,
            ],[
                'provincia_nom' =>'Magallanes',
                'region_id' =>16,
            ],[
                'provincia_nom' =>'Tierra del Fuego',
                'region_id' =>16,
            ],
        ]);
    }
}
