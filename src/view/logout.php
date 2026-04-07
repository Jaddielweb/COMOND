<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
session_destroy();
header('Location: ' . BASE_URL . '/index.php?view=login');
exit();
?>