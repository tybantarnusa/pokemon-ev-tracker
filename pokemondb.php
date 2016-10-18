<?php
    $url = 'http://pokemondb.net/pokedex/national';
    $output = file_get_contents($url);
    echo $output;
?>
