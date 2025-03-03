<?php

namespace App\Services;

class ProtectionService
{

    /**
     * calcule le nombre d'altitudes protégée
     * @param array $altitudesList
     * @return int
     */
    public function getProtectedArea( array $altitudesList) : int
    {
        $maxAltitude = 0 ;
        $surfaceProtegee = 0;
        foreach ($altitudesList as $hauteur) {
           $hauteur >= $maxAltitude ?  $maxAltitude = $hauteur : $surfaceProtegee++;
        }
        return $surfaceProtegee;

    }

    public function transformToArray(string $separator, string $array): array
    {
        return explode($separator, $array);
    }
}
