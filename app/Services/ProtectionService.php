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

    public function elementsIsEqual(array $elements, int $number): bool
    {

       return count($elements) === $number;
    }

    public function checkIfElementIsValid(array $elements, int $max):bool
    {
        foreach ($elements as $element) {

            if(!is_numeric($element) || $element < 0 || $element > $max){
               return false;
            }

        }

        return true;
    }
}
