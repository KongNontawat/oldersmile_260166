<?php

if(!isset($_SESSION['login']) OR $_SESSION['my_role'] != 'admin') {
    header('location:../login.php');
}