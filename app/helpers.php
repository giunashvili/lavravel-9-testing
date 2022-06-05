<?php

use Carbon\Carbon;

function format_date(Carbon $date): string
{
    $months = [
        'იანვარი',
        'თებერვალი',
        'მარტი',
        'აპრილი',
    ];

    $year = $date->year;
    $monthNumber = $date->month;
    $dayNumber = $date->day;
    $month = $months[$monthNumber];

    return "$year წლის $dayNumber $month";
}
