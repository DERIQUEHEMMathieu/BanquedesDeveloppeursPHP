<?php
session_start();
if(!isset($_SESSION["user"])) {
  header("Location: login.php");
}
require "view/blogView.php";
?>