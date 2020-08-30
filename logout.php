<?php
session_start();
unset($_SESSION["sid"]);

header("Location:index.html");
?>