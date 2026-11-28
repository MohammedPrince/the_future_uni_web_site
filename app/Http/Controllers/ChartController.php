<?php

namespace App\Http\Controllers;

/** Facts & Figures page: the numbers behind its charts and tables. */
class ChartController extends Controller
{
    public function barChart()
    {
        $years = ['2015', '2016', '2017', '2018', '2019', '2020', '2021', '2022'];

        $intake = array_combine($years, [513, 516, 549, 541, 690, 686, 1122, 1008]);
        $enrolment = array_combine($years, [513, 516, 594, 541, 690, 686, 1122, 1008]);

        // Biggest first; "Others" stays last.
        $countries = [
            'Nigeria' => 21, 'South Sudan' => 3, 'Somalia' => 3, 'Tanzania' => 1, 'Iraq' => 1,
            'United Kingdom' => 1, 'United States' => 1, 'Morocco' => 1, 'India' => 1, 'Others' => 3,
        ];

        $faculties = [
            'Engineering' => 246, 'Telecommunication' => 42, 'Architecture' => 59, 'Information Technology' => 292,
            'Computer Science' => 58, 'Art & Design' => 104, 'Geoinformatics' => 10, 'Business Administration' => 197,
        ];
        arsort($faculties);

        $first = reset($intake);
        $last = end($intake);

        $stats = [
            ['value' => number_format($last), 'label' => 'New students in ' . array_key_last($intake)],
            ['value' => number_format(max($intake)), 'label' => 'Highest intake (' . array_search(max($intake), $intake) . ')'],
            ['value' => '+' . round(($last - $first) / $first * 100) . '%', 'label' => 'Intake growth since ' . array_key_first($intake)],
            ['value' => (string) array_sum($countries), 'label' => 'Foreign students, ' . (count($countries) - 1) . '+ countries'],
        ];

        return view('client.Facts-Figures', compact('intake', 'enrolment', 'countries', 'faculties', 'stats'));
    }
}
