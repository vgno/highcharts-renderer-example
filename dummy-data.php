<?php
/**
 * This file just generates some random highcharts charts
 * Same chart settings, just different values
 */
$dummyData = array (
  'chart' =>
  array (
    'type' => 'line',
    ),
  'title' => NULL,
  'xAxis' =>
  array (
    'categories' =>
    array (
      0 => 'Jan',
      1 => 'Feb',
      2 => 'Mar',
      3 => 'Apr',
      4 => 'May',
      5 => 'Jun',
      6 => 'Jul',
      7 => 'Aug',
      8 => 'Sep',
      9 => 'Oct',
      10 => 'Nov',
      11 => 'Dec',
      ),
    ),
  'yAxis' =>
  array (
    'title' =>
    array (
      'text' => 'Temperature (°C)',
      ),
    ),
  'series' =>
  array (
    0 =>
    array (
      'name' => 'Tokyo',
      'data' => NULL,
      ),
    1 =>
    array (
      'name' => 'New York',
      'data' => NULL,
      ),
    2 =>
    array (
      'name' => 'Berlin',
      'data' => NULL,
      ),
    3 =>
    array (
      'name' => 'London',
      'data' => NULL,
      ),
    ),
  );

$dummies = [];
for ($i = 0; $i < 3; $i++) {
    $dummy = array_merge([], $dummyData);

    foreach ($dummy['series'] as &$series) {
        $series['data'] = [];

        for ($x = 0; $x < 12; $x++) {
            $series['data'][] = rand(-4, 20);
        }
    }

    $dummies[] = $dummy;
}

return $dummies;