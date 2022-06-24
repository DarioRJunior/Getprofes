<?php
$con = mysqli_connect('localhost', 'root', '');
$db = mysqli_select_db($con, 'getprofes');

if (!$con || !$db) {
    echo "<pre>";
    echo mysqli_error($con);
    echo "</pre>";
}
mysqli_query($con, "SET NAMES 'utf8'");
mysqli_query($con, 'SET character_set_connection=utf8');
mysqli_query($con, 'SET character_set_client=utf8');
mysqli_query($con, 'SET character_set_results=utf8');
