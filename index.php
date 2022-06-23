<?php
session_start();
error_reporting(-1);
ini_set( 'display_errors', 1 );
class Pokemon {
    public $name;
    public $type;
    public $hp;
}

$ePokemon = new Pokemon();
$jPokemon = new Pokemon();

$description = [
    "Charmander"=>"Fire",
    "Bulbasaur"=>"Grass",
    "Squirtle"=>"Water"
];

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
    header('location:index.php');
}

if(isset($_GET['pokemon'])){
    $pokeName = $_GET['pokemon'];
    $jPokemon->name = $pokeName;
    $jPokemon->type = $description[$pokeName];

    $ePokeName = $_GET['ePokemon'];
    $ePokemon->name = $ePokeName;
    $ePokemon->type = $description[$ePokeName];
}

function damage($a, $d) {
    $damage = 20;

    // Zwaktes bv vuur is niet goed tegen water
    if ($a->type == "Fire" && $d->type == "Grass") {
        $damage = $damage * 2;
        $damageMessage = $a->name. "used Fire!". "It's super effective!";
    }elseif ($a->type == "Grass" && $d->type == "Water"){
        $damage = $damage * 2;
        $damageMessage = $a->name. "used Grass!". "It's super effective!";
    }elseif ($a->type == "Water" && $d->type == "Fire"){
        $damage = $damage * 2;
        $damageMessage = $a->name. "used Water!". "It's super effective!";
    }elseif ($a->type == "Fire" && $d->type == "Water") {
        $damage = $damage * 0.5;
        $damageMessage = $a->name. "used Fire!". "It's not very effective!";
    }elseif ($a->type == "Grass" && $d->type == "Fire"){
        $damage = $damage * 0.5;
        $damageMessage = $a->name. "used Grass!". "It's not very effective!";
    }elseif ($a->type == "Water" && $d->type == "Grass"){
        $damage = $damage * 0.5;
        $damageMessage = $a->name. "used Water!". "It's not very effective!";
    }elseif ($a->type == "Fire" && $d->type == "Fire") {
        $damage = $damage * 0.5;
        $damageMessage = $a->name. "used Fire!". "It's not very effective!";
    }elseif ($a->type == "Grass" && $d->type == "Grass"){
        $damage = $damage * 0.5;
        $damageMessage = $a->name. "used Grass!". "It's not very effective!";
    }elseif ($a->type == "Water" && $d->type == "Water"){
        $damage = $damage * 0.5;
        $damageMessage = $a->name. "used Water!". "It's not very effective!";
    }else{
        $damage = 20;
        $damageMessage = $a->name ." did ". $damage . " damage to ". $d->name;
    }

    echo $damageMessage;
    $d->hp -= $damage;
}

function death($d){
    echo $d->name." is dood!";
    $d->hp = 0;
}

if ($ePokemon->hp <= 0) {
    death($ePokemon);
}elseif ($jPokemon->hp <= 0){
    death($jPokemon);
}

echo "<br>";
echo $jPokemon->hp;
echo $ePokemon->hp;
echo $jPokemon->type;
echo $ePokemon->type;
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
        <select name="ePokemon">
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