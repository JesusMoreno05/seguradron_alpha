<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Make;

class MarcaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $marcas = [
            ['nombre' => 'dji', 'pais' => 'alemania', 'link' => 'dji.com'],
            ['nombre' => 'axon', 'pais' => 'china', 'link' => 'axon.com'],
            ['nombre' => 'parrot', 'pais' => 'francia', 'link' => 'parrot.com'],
            ['nombre' => 'yuneec', 'pais' => 'china', 'link' => 'yuneec.com'],
            ['nombre' => 'autel', 'pais' => 'estados unidos', 'link' => 'autel.com'],
            ['nombre' => 'hubsan', 'pais' => 'china', 'link' => 'hubsan.com'],
            ['nombre' => 'skydio', 'pais' => 'estados unidos', 'link' => 'skydio.com'],
            ['nombre' => 'blade', 'pais' => 'estados unidos', 'link' => 'blade.com'],
            ['nombre' => 'walkera', 'pais' => 'china', 'link' => 'walkera.com'],
            ['nombre' => 'potensic', 'pais' => 'china', 'link' => 'potensic.com'],
            ['nombre' => 'syma', 'pais' => 'china', 'link' => 'syma.com'],
            ['nombre' => 'jjrc', 'pais' => 'china', 'link' => 'jjrc.com'],
            ['nombre' => 'eachine', 'pais' => 'china', 'link' => 'eachine.com'],
            ['nombre' => 'cheerson', 'pais' => 'china', 'link' => 'cheerson.com'],
            ['nombre' => 'horizon hobby', 'pais' => 'estados unidos', 'link' => 'horizonhobby.com'],
            ['nombre' => 'great wall', 'pais' => 'china', 'link' => 'greatwall.com'],
            ['nombre' => 'geoscan', 'pais' => 'rusia', 'link' => 'geoscan.com'],
            ['nombre' => 'delair', 'pais' => 'francia', 'link' => 'delair.com'],
            ['nombre' => 'sensefly', 'pais' => 'suiza', 'link' => 'sensefly.com'],
            ['nombre' => 'tecnodrone', 'pais' => 'espana', 'link' => 'tecnodrone.com'],
            ['nombre' => 'flyability', 'pais' => 'suiza', 'link' => 'flyability.com'],
            ['nombre' => 'aerovironment', 'pais' => 'estados unidos', 'link' => 'aerovironment.com'],
            ['nombre' => 'insitu', 'pais' => 'estados unidos', 'link' => 'insitu.com'],
            ['nombre' => 'xag', 'pais' => 'china', 'link' => 'xag.ai'],
            ['nombre' => 'yamaha', 'pais' => 'japon', 'link' => 'yamaha.com'],
            ['nombre' => 'ageagle aerial systems', 'pais' => 'estados unidos', 'link' => 'ageagle.com'],
            ['nombre' => 'precisionhawk', 'pais' => 'estados unidos', 'link' => 'precisionhawk.com'],
            ['nombre' => 'sentera', 'pais' => 'estados unidos', 'link' => 'sentera.com'],
            ['nombre' => '3d robotics', 'pais' => 'estados unidos', 'link' => '3dr.com'],
            ['nombre' => 'trimble', 'pais' => 'estados unidos', 'link' => 'trimble.com'],
            ['nombre' => 'american robotics', 'pais' => 'estados unidos', 'link' => 'american-robotics.com'],
            ['nombre' => 'dronedeploy', 'pais' => 'estados unidos', 'link' => 'dronedeploy.com'],
        ];

        foreach ($marcas as $marca) {
            Make::firstOrCreate(
                ['nombre' => $marca['nombre']],
                ['pais' => $marca['pais'], 'link' => $marca['link']]
            );
        }
    }
}
