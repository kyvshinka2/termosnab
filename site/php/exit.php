<?php
session_start();
unset($_COOKIE[session_name()]);
unset($_COOKIE[session_id()]);
session_unset();
session_destroy();
// ссылка на страницу, которая откроется после выхода
header("Location: ./profile.php");
exit;
?>