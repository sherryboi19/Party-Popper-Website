<?php
session_start();
unset($_SESSION['username']);
echo"<script>alert('Loged Out.')</script>";
echo "<script>window.open('index.php','_self')</script>";
?>