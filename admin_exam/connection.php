<?php
$conn = mysqli_connect("localhost","root","","institute_db");
if (!$conn) { die("DB Error"); }
session_start();