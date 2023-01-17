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
                'region_nom' => 'TARAPACÁ' ,
            ],[
                'region_nom' => 'ANTOFAGASTA',
            ],[
                'region_nom' => 'ATACAMA',
            ],[
                'region_nom' => 'COQUIMBO',
            ],[
                'region_nom' => 'VALPARAISO',
            ],[
                'region_nom' => "OHIGGINS",
            ],[
                'region_nom' => 'MAULE',
            ],[
                'region_nom' => 'BIOBÍO',
            ],[
                'region_nom' => 'ARAUCANÍA',
            ],[
                'region_nom' => 'LOS LAGOS',
            ],[
                'region_nom' => 'AYSEN',
            ],[
                'region_nom' => 'MAGALLANES',
            ],[
                'region_nom' => 'METROPOLITANA',
            ],[
                'region_nom' => 'LOS RIOS',
            ],[
                'region_nom' => 'ARICA Y PARINACOTA',
            ],[
                'region_nom' => 'ÑUBLE',
            ]
            ]);
        
    }
}