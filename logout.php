<?php
session_start();
session_destroy();
header("Location: community connect.php");
exit();
?>