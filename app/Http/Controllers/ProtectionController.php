<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProtectionRequest;
use App\Services\ProtectionService;
use Illuminate\Http\Request;

class ProtectionController extends Controller
{
    public function __construct(private ProtectionService $protectionService)
    {

    }

    public function __invoke(ProtectionRequest $request)
    {

        $altitudeList = trim($request->altitudes);
        $altitude = $request->altitude;
        // vérifier si la liste contient une virgule

        if (str_contains( $altitudeList, ',')) {
            $listOfAltitudes = $this->protectionService->transformToArray(",", $altitudeList);
        }
        else if(str_contains($altitudeList, " ")){
            $listOfAltitudes = $this->protectionService->transformToArray(" ", $altitudeList);
        }else if(str_contains($altitudeList, "-")){
            $listOfAltitudes = $this->protectionService->transformToArray("-", $altitudeList);
        }
        else {

            return redirect()->back()->with('error', 'les altitudes doivent être séparées par un espace ou une virgule ou un
            trait d\'union (-)
            ');
        }
        // verification si les elements du tableau ont les bonnes valeurs
        if(!$this->protectionService->checkIfElementIsValid($listOfAltitudes, 100000)) {
            return redirect()->back()->with('error', "un ou plusieurs éléments sont invalides dans la liste");
        }

        //si le tableau est donc valide on vérifie si les elements du tableau correspondent
        if(! $this->protectionService->elementsIsEqual($listOfAltitudes, (int) $altitude)) {

            return redirect()->back()->with('error', "le nombre d'éléments ne correspond pas.");
        }

        $protectedArea = $this->protectionService->getProtectedArea($listOfAltitudes);

        return redirect()->back()->with('success', "le nombre de surface(s) protégée(s) est de: $protectedArea");

    }

}
