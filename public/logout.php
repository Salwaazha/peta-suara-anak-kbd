<?php
session_start();
session_destroy();
header("Location: login_anak.php");
exit;
