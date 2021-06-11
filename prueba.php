<?php

    // Me encripta la contraseña

    $pass = password_hash('123456',PASSWORD_DEFAULT,['const' =>12]);

    echo $pass;

?>