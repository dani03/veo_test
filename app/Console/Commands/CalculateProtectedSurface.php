<?php

namespace App\Console\Commands;

use App\Services\ProtectionService;
use Illuminate\Console\Command;

class CalculateProtectedSurface extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'calculate:surface';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $max_num = 100000;
        // demande au user d'entrer une valeur
        $number = $this->ask('Enter the number of altitudes');
        // verification de la validité du nombre
        while (!is_numeric($number) || $number < 1 || $number > $max_num) {
            $this->error("ce nombre est invalide. ou est supérieur à $max_num");
            $number = $this->ask('Enter the number of altitudes');
        }
        // on demande ensuite une liste d'altitude
        $altitudesList = $this->ask("entrez une liste d'altitudes séparer par des espaces ");
        $altitudes = explode(' ', trim($altitudesList));

        // on compte les nombres d'éléments si ça correspond bien
       if (! (new ProtectionService())->elementsIsEqual($altitudes, (int)$number)) {
           $this->error("le nombre d'éléments dans la liste est inférieur/supérieur à $number");
           exit;
       }

        // vérification si une des valeurs n'est pas inférieure à 0 ou supérieure au max
        foreach ($altitudes as $oneAltitude) {

            if(!is_numeric($oneAltitude) || $oneAltitude < 0 || $oneAltitude > $max_num){
                $this->error(" $oneAltitude est invalide");
                $this->info("les altitudes doivent être comprisent entre 0 et $max_num");
            }

        }
        //appelle de la méthode
        $val = (new ProtectionService())->getProtectedArea($altitudes);



        $this->info("il y a $val qui sont protégées. ");
    }
}
