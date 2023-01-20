<?php

namespace App\Http\Controllers\PartOne;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StringIndexController extends Controller
{
    public function __invoke($inputString)
    {
        $result = 0;
        for ($i = 0; $i < strlen($inputString); $i++) {
            $result += (ord($inputString[$i]) - ord('A') + 1) * (26 ** (strlen($inputString) - $i - 1));
        }
        return $result;

    }
}
