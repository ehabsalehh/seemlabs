<?php

namespace App\Http\Controllers\PartOne;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CountElementsExceptController extends Controller
{
    public function __invoke($startNumber, $endNumber)
    {
        if ($startNumber > $endNumber)
            return "start number must br grater than end number";
        $count = 0;
        for ($number = $startNumber; $number <= $endNumber; $number++) {
//            if (in_array(5, str_split(strval($number))))
            if(str_contains(strval($number),'5'))
                continue;
            $count++;
        }
        return $count;
    }
}
