<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChartController extends Controller
{
    public function barChart()
    {
        // Replace this with your actual data retrieval logic
        $data = [
            'labels' => ['2011', '2012', '2013', '2014', '2015','2016','2017','2018'],
            'data' => [533, 604, 840, 715, 802,793,700,700],
        ];

        return view('client.Facts-Figures', compact('data'));
    }
}
