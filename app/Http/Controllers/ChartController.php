<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChartController extends Controller
{
    public function barChart()
    {
        // Replace this with your actual data retrieval logic
        $data = [
            'labels' => ['2015', '2016', '2017', '2018', '2019','2020','2021','2022'],
            'data' => [513, 516, 549, 541, 690,686,1122,1008],
        ];


        return view('client.Facts-Figures', compact('data'));
    }
}
