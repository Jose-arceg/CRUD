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
                "region_code" => "R1",
                "region_nom" => "TARAPACA",
            ],
            [
                "region_code" => "R2",
                "region_nom" => "ANTOFAGASTA",
                
            ],
            [
                "region_code" => "R3",
                "region_nom" => "ATACAMA",
                
            ],
            [
                "region_code" => "R4",
                "region_nom" => "COQUIMBO",
                
            ],
            [
                "region_code" => "R5",
                "region_nom" => "VALPARAISO",
                
            ],
            [
                "region_code" => "R6",
                "region_nom" => "LIBERTADOR GRAL BERNARDO O HIGGINS",
                
            ],
            [
                "region_code" => "R7",
                "region_nom" => "MAULE",
                
            ],
            [
                "region_code" => "R8",
                "region_nom" => "BIOBIO",
                
            ],
            [
                "region_code" => "R9",
                "region_nom" => "ARAUCANIA",
                
            ],
            [
                "region_code" => "RM",
                "region_nom" => "METROPOLITANA DE SANTIAGO",
                
            ],
            [
                "region_code" => "R10",
                "region_nom" => "LOS LAGOS",
                
            ],
            [
                "region_code" => "R11",
                "region_nom" => "AISEN DEL GRAL C IBANEZ DEL CAMPO",
                
            ],
            [
                "region_code" => "R12",
                "region_nom" => "MAGALLANES Y LA ANTARTICA CHILENA",
                
            ],
            [
                "region_code" => "R14",
                "region_nom" => "LOS RIOS",
                
            ],
            [
                "region_code" => "R15",
                "region_nom" => "ARICA Y PARINACOTA",
                
            ],
            [
                "region_code" => "R16",
                "region_nom" => "NUBLE",
                
            ]
            ]);
        
    }
}