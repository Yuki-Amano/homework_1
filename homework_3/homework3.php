<?php
$animals = array(
    "South America"=>
    array(
        "Mico leucippe",
        "Sciurus aestuans",
        "Vicugna pacos",
    ),
    "Africa"=>
    array(
        "Cephalophus natalensis",
        "Felis silvestris lybica",
        "Civettictis civetta",
    ),
    "North America"=>
    array(
        "Lontra",
        "Oreamnos americanus",
        "Leopardus pardalis",
    ),
    "Australia"=>
    array(
        "Chaeropus",
        "Lagostrophus fasciatus",
        "Potorous",
    ),
);
foreach ($animals as $continents => $zveri)
{
    echo "<h2>" . $continents . "</h2>";
    echo implode(", ", $zveri) . "<br>";
};

$x = array();
$y = array();
$z = array();

foreach ($animals as $continents) 
{
    foreach ($continents as $zveri)
    {
        if (substr_count($zveri, " ") === 1)
        {
            list($x[], $y[]) = explode(" ", $zveri);
        }
    }
}

shuffle($y);
foreach (array_keys($x) as $i) {
    $z[] = $x[$i].' '.$y[$i];
}

echo "<br><h2> Фантазийные существа: </h2>";
foreach($z as $value)
{
echo "$value <br>";
}

?>
