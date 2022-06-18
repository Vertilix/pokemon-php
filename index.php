<?php
session_start();
error_reporting(-1);
ini_set( 'display_errors', 1 );
class Pokemon {
    public $name;
    public $type;
    public $hp;
}
$names = array("Charmander", "Bulbasaur", "Squirtle");
$types = array("Fire", "Grass", "Water");

$jPokemon = new Pokemon();

$jPokemon->hp = 100;

$ePokemon = new Pokemon();
$ePokemon->name = $names[1];
$ePokemon->type = $types[1];
$ePokemon->hp = 100;


if(isset($_SESSION['jPokemon'])) {
    $jPokemon = $_SESSION['jPokemon'];
    $ePokemon = $_SESSION['ePokemon'];
}else{
    $jPokemon->hp = 100;
    $ePokemon->hp = 100;
}

if(isset($_GET['attack'])){
    damage($jPokemon, $ePokemon);
}

if(isset($_GET['reset'])){ // Reset knop
    session_destroy();
    header('location:rewrite.php');
}

if(isset($_GET['pokemon'])){
    $pokeName = $_GET['pokemon'];
    $jPokemon->name = $pokeName;
}

function createPokemon($i,$n,$t){
    $i = new Pokemon;
    $i->name = $n;
    $i->type = $t;
}

function damage($a, $d) {
    $defaultDamage = 20;
    $d->hp -= $defaultDamage;
    echo $a->name ." did ". $defaultDamage . " damage to ". $d->name;
}

if ($ePokemon->hp <= 0) {
    death($ePokemon);
}elseif ($jPokemon->hp <= 0){
    death($jPokemon);
}

function death($d){
    echo $d->name." is dood!";
    $d->hp = 0;
}

echo "<br>";
echo $jPokemon->hp;
echo $ePokemon->hp;
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Pokemon</title>
</head>
<body>
    <form method="GET" action="">
        <select name="pokemon">
            <option>Charmander</option>
            <option>Bulbasaur</option>
            <option>Squirtle</option>
        </select>
        <input type="submit" value="Kies">
    </form>

    <form method="GET">
        <input type="submit" name="attack" value="Val aan">
    </form>
    <a href="?reset">Reset</a>
</body>
</html>

<?php
    $_SESSION["jPokemon"] = $jPokemon;
    $_SESSION["ePokemon"] = $ePokemon;
?>