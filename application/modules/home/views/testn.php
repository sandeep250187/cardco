<?php
 
function clockalize($in){

    $h = intval($in);
    $m = round((((($in - $h) / 100.0) * 60.0) * 100), 0);
    if ($m == 60)
    {
        $h++;
        $m = 0;
    }
    $retval = sprintf("%02d:%02d", $h, $m);
    return $retval;
}


echo clockalize(".5");
?>

 