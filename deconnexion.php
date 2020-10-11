<?php
session_start();
session_destroy();
header("Location: login.php");
exit("À bientôt sur notre site");
?>