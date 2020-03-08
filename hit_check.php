<?php
error_reporting(-1);
session_start();
$start = microtime(true);
error_reporting(-1);
$x=$_GET['clicked_x'];
$y=$_GET['y'];
$r=$_GET['r'];
$result;
$error;
$time;
$worktime;
$hit;
$y = str_replace(",", ".", $y);
if ( ! isset($_SESSION['arr'])) {
 $_SESSION['arr'] = array();
 }

function validation($x, $y, $r) {
   if (filter_var($x, FILTER_VALIDATE_FLOAT) === false) {
           echo "Число X '$x' является неверным.\n";
           return false;
           }
   if (filter_var($y, FILTER_VALIDATE_FLOAT) === false) {
        echo "Число Y '$y' является неверным.\n";
        return false;
        }
   if (filter_var($r, FILTER_VALIDATE_FLOAT) === false) {
        echo "Число R '$r' является неверным.\n";
        return false;
        }
   return true;
}

function tryXYR($x, $y, $r) {
$result;
/*if ($x>=0 and $x<=$r/2) {
if($y>=-1*sqrt($r/4-$x*$x) and $y<=$r) {
$result = "true";
}
else $result = "false";
}
elseif($x>=-$r and $x<0) {
if($y>=0 and $y<=($x+$r)/2){
$result = "true";
}
else $result = "false";
}
else $result = "false";*/

if($x>=0 and $y>=0) {
    if($y<=$r and $x<=($r/2)) {
        $result = true;
    }
    else $result = false;
}
elseif ($x>=0 and $y<0) {
    if (($x*$x+$y*$y)<=($r*$r/4)) {
        $result = true;
    }
    else $result = false;
}
elseif($x<0 and $y>=0) {
    if($y<=(0.5*$x+0.5)) {
        $result = true;
    }
    else $result = false;
}
elseif ($x<0 and $y<0) {
    $result = false;
}
return $result;
}

function times() {
$time;
    date_default_timezone_set('Europe/Moscow');
    return $time =  date('h:i:s');
}

function target($result) {
            if ($result == "true") {
                  return "есть";
                  }
                  else {
                  return "нет";
                  }
}

if (validation($x, $y, $r))
{
    $result = tryXYR($x, $y, $r);
    $hit = target($result);
    $time = times();
    $worktime = number_format((microtime(true) - $start), 6);
    include 'view.html';
    if (count($_SESSION['arr']) >= 8 ) {
        session_destroy();
     }
     }
?>