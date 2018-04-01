<?php

$conn = mysqli_connect("localhost", "root", "", "sunrise");

if(!$conn){
		die("Connection failed: ".mysqli_connect_error());
}

