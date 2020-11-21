<?php
foreach($_POST as $k => $v){$$k=$v;}  echo $k.' -> '.$v.' | ';
foreach($_GET as $k => $v){$$k=$v;}  echo $k.' -> '.$v.' | ';
?>