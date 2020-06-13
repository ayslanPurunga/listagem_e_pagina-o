<?php
$cont = 2;
while($cont < 10000){
    echo "INSERT INTO usuarios(nome, email) VALUES ('Cesar$cont', 'cesar$cont@hotmail.com'), ('Juliana$cont', 'juli77$cont@hotmail.com'), ('Kelly$cont', 'kelly$cont@hotmail.com'); <br>";

    $cont = $cont + 2;
}