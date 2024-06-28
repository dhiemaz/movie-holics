<?php
require_once("./database/db_connection.php");
session_destroy();
setAlert("Anda sudah logout!", "Sukses logout!", "success");
header("Location: login.php");
