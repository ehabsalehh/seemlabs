<?php

namespace App\Http\Controllers\PartOne;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReduceToZeroController extends Controller
{
    public function __invoke(Request $request)
    {
        $this->validate()
        $result = [];
        foreach ($request->get('Q') as $x) {
            $steps = 0;
            while ($x != 0) {
                if ($x % 2 == 0):
                    $x /= 2;
                elseif ($x % 3 == 0):
                    $x /= 3;
                elseif ($x % 5 == 0):
                    $x /= 5;
                else:
                    $x -= 1;
                endif;
                $steps += 1;
                // result.append(steps)
            }
            $result[] = $steps;

        }
        return $result;

    }
}
