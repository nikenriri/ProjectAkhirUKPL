<?php
$host = 'localhost'; //Host yang digunakan Localhost atau 127.0.0.1
$user = 'root'; //Username dari Host yakni root
$pass = ''; //User root tidak menggunakan password
$dbname = 'db_enkrip'; //Nama Database Aplikasi Enkirpsi dan Dekripsi
$connect = mysqli_connect($host, $user, $pass) or die(mysqli_error($link)); //Mencoba terhubung apabila Host, User, dan Pass Benar. Kalau tidak MySQL memberikan Notif Error
$dbselect = mysqli_select_db($connect, $dbname); //Jika benar maka akan memilih Database sesuai pada variable $dbname