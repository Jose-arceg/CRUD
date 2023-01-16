<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Region;
use Illuminate\Support\Facades\DB;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Regions')->insert([
            [
                'region_nom' => 'Arica y Parinacota',
                'region_abreviatura' => 'AP',
                'region_capital' => 'Arica',
            ],[
                'region_nom' => 'Tarapacá' ,
                'region_abreviatura' => 'TA' ,
                'region_capital' => 'Iquique',
            ],[
                'region_nom' => 'Antofagasta',
                'region_abreviatura' => 'AN',
                'region_capital' => 'Antofagasta',
            ],[
                'region_nom' => 'Atacama',
                'region_abreviatura' => 'AT',
                'region_capital' => 'Copiapó',
            ],[
                'region_nom' => 'Coquimbo',
                'region_abreviatura' => 'CO',
                'region_capital' => 'La Serena',
            ],[
                'region_nom' => 'Valparaiso',
                'region_abreviatura' => 'VA',
                'region_capital' => 'valparaíso',
            ],[
                'region_nom' => 'Metropolitana de Santiago',
                'region_abreviatura' => 'RM',
                'region_capital' => 'Santiago',
            ],[
                'region_nom' => "Libertador General Bernardo O'Higgins",
                'region_abreviatura' => 'OH',
                'region_capital' => 'Rancagua',
            ],[
                'region_nom' => 'Maule',
                'region_abreviatura' => 'MA',
                'region_capital' => 'Talca',
            ],[
                'region_nom' => 'Ñuble',
                'region_abreviatura' => 'NB',
                'region_capital' => 'Chillán',
            ],[
                'region_nom' => 'Biobío',
                'region_abreviatura' => 'BI',
                'region_capital' => 'Concepción',
            ],[
                'region_nom' => 'La Araucanía',
                'region_abreviatura' => 'IAR',
                'region_capital' => 'Temuco',
            ],[
                'region_nom' => 'Los Ríos',
                'region_abreviatura' => 'LR',
                'region_capital' => 'Valdivia',
            ],[
                'region_nom' => 'Los Lagos',
                'region_abreviatura' => 'LL',
                'region_capital' => 'Puerto Montt',
            ],[
                'region_nom' => 'Aysén del General Carlos Ibáñez del Campo',
                'region_abreviatura' => 'AI',
                'region_capital' => 'Coyhaique',
            ],[
                'region_nom' => 'Magallanes y de la Antártica Chilena',
                'region_abreviatura' => 'MG',
                'region_capital' => 'Punta Arenas',
            ]
            ]);
        
    }
}
