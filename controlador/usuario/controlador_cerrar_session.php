<?php

// Me redirecciona al login y cierra sesión
session_start();
session_destroy();
header('Location: ../../Login/index.php');
?>