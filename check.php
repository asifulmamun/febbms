<?php
    // dob
    $dob = "07-02-1998";
    $newFormatDob = date("d-M-Y", strtotime($dob));
    echo $newFormatDob . '<br>';

    // converting
    $dobD = date("d", strtotime($dob));
    $dobM = date("m", strtotime($dob));
    $dobY = date("y", strtotime($dob));

    // allocate variable
    $dd = $dobD;
    $mm = $dobM;
    $yy = $dobY;

    // configuraton dob
    $dob = $mm."/".$dd."/".$yy;
    $arr = explode('/',$dob);

    //$dateTs=date_default_timezone_set($dob); 
    $dateTs=strtotime($dob);
    $now=strtotime('today');
    if(sizeof($arr)!=3);
    if(!checkdate($arr[0],$arr[1],$arr[2]));
    if($dateTs>=$now);

    // calculate
    $ageDays = floor(($now-$dateTs)/86400);
    $ageYears = floor($ageDays/365);
    $ageMonths = floor(($ageDays-($ageYears*365))/30);

    // results
    echo  $ageYears . 'y ' . $ageMonths . 'm';
?>