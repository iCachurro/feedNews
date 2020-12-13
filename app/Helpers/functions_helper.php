<?php

/*
* Get date of today
* output string
*/
function dateNow()
{
    return date('Y-m-d');
}

/*
* Change string to spanish date
* intput string
* output string
*/
function changeDate($value)
{
    $year = substr($value, 0, 4);
    $month = substr($value, 5, 2);
    $day = substr($value, 8, 2);

    $date = $day . '/' . $month . '/' . $year;

    return $date;
}


?>
