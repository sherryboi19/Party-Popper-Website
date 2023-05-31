<?php
session_start();
unset($_SESSION['adminname']);
echo"<script>alert('Loged Out.')</script>";
echo "<script>window.open('login.php','_self')</script>";
?>