<?php

$fruits = [

    "りんご" => [100,1],
    "みかん" => [150,2],
    "桃" => [200,3]
];

function goukei($kakaku,$kazu){
    $kei = $kakaku * $kazu;
    return $kei;
}

foreach($fruits as $key => $value){
    $total = goukei($value[0],$value[1]);
    echo "${key}は${total}円です。<br>";
}
?>