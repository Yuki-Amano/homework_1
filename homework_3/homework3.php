<?php
echo "<h2> Реальные звери: </h2>";
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

echo "<br><h2> Звери, в названиях которых только два слова: </h2>";

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
            echo $zveri;
            echo "<br>";
        }
    }
}

shuffle($y);
foreach (array_keys($x) as $i) {
    $z[] = $x[$i].' '.$y[$i];
}

$string = implode(", ", $z); 

echo "<br><h2> Фантазийные существа: </h2>";
echo $string;
?>
