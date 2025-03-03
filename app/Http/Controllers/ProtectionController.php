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

    public function show(ProtectionRequest $request)
    {
        $altitudeList = trim($request->altitudes);
        $altitude = $request->altitude;
        // vérifier si la liste contient une virgule
        str_contains(',', $altitudeList);
        if (str_contains(',', $altitudeList)) {
            $listOfAltitudes = $this->protectionService->transformToArray(",", $altitudeList);
        }
        else if( str_contains(' ', $altitudeList)){
            $listOfAltitudes = $this->protectionService->transformToArray(" ", $altitudeList);
        }else if( str_contains('-', $altitudeList)){
            $listOfAltitudes = $this->protectionService->transformToArray(" ", $altitudeList);
        }
        else {
            return redirect()->back()->with('error', 'les altitudes doivent être séparées par un espace ou une virgule');
        }

        dd($request->all());
    }

    public function showInCommand(int $altitudes, array $altitudesList)
    {

    }
}
