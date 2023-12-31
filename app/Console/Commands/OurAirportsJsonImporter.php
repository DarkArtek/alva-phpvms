<?php

namespace App\Console\Commands;

use App\Models\Airport;
use Illuminate\Console\Command;

class OurAirportsJsonImporter extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'phpvms:oa-importer';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Imports the OutAirports Airport Database formatted in JSON';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //$file_arg = $this->argument('file');
        //dd(file_get_contents("csvjson.json"));
        $airports = json_decode(file_get_contents("csvjson.json"), true);

        $bar = $this->output->createProgressBar(count($airports));
        $bar->start();
        foreach ($airports as $airport) {

            if ($airport['type'] === "closed" || $airport['gps_code'] === "" || is_numeric($airport['ident'])) {
                $bar->advance();
                continue;
            }
            Airport::updateOrCreate(['id' => $airport['gps_code']], [
                'icao' => $airport['gps_code'],
                'iata' => $airport['iata_code'],
                'name' => $airport['name'],
                'lat' => $airport['latitude_deg'],
                'lon' => $airport['longitude_deg'],
                'location' => $airport['municipality'],
                'country' => $airport['iso_country'],
                'elevation' => $airport['elevation_ft']
            ]);
            $bar->advance();
        }
        $bar->finish();
        return 0;
    }
}
