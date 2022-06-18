<?php
session_start();
error_reporting(-1);
ini_set( 'display_errors', 1 ); // Op arch linux liet hij geen errors zien maar met deze functies wel, Misschien is er een andere oplossing maar voor nu niet nodig

$selectedPokemon = new Pokemon;
$randomPokemon = new Pokemon;

if(isset($_SESSION['hp'])) {
    $selectedPokemon->hp = $_SESSION['hp'];
    $randomPokemon->hp = $_SESSION['eHp'];
    $selectedPokemon->name = $_SESSION['jPokemon'];
    $randomPokemon->name = $_SESSION['vPokemon'];
}else {
    $randomPokemon->setHp(100);
    $selectedPokemon->setHp(100);
    $selectedPokemon->name = "";
    $randomPokemon->name = "";
}

if(isset($_GET["pokemon"])) {
    $pokemon = $_GET["pokemon"];
}else {
    $pokemon = "";
}

$shown = "none";

class Pokemon {
    public $name;
    public $type;
    public $hp;

    function setName($name){
        $this->name = $name;
    }

    function setHp($hp) {
        $this->hp = $hp;
    }

    function setType($type){
        $this->type = $type;
    }
}

$names = array("Charmander", "Bulbasaur", "Squirtle");
$types = array("Fire", "Grass", "Water");

function createPokemon($n, $t) {
    global $names;
    global $types;
    global $selectedPokemon;
    $selectedPokemon->setName($names[$n]);
    $selectedPokemon->setType($types[$t]);
    echo 'Jij koos "' . $selectedPokemon->name. '"!<br>';
    echo 'Met type "' . $selectedPokemon->type. '"!<br>';
}

function createBattle() {
    global $randomPokemon;
    global $names;
    global $types;
    $randomPokemon->setName($names[array_rand($names)]);
    if ($randomPokemon->name == "Charmander") {
        $randomPokemon->setType($types[0]);
    }elseif ($randomPokemon->name  == "Bulbasaur") {
        $randomPokemon->setType($types[1]);
    }else{
        $randomPokemon->setType($types[2]);
    }
    echo $randomPokemon->type;
    echo $randomPokemon->name;
    echo $randomPokemon->hp;
}

$_SESSION["hp"] = $selectedPokemon->hp;
$_SESSION["eHp"] = $randomPokemon->hp;
$_SESSION['jPokemon'] = $selectedPokemon->name;
$_SESSION['vPokemon'] = $randomPokemon->name;


function damage(){
    $defaultDmg = 20;

}

if ($pokemon == "Charmander") {
    createPokemon(0, 0);
    createBattle();
}elseif ($pokemon == "Bulbasaur") {
    createPokemon(1, 1);
    createBattle();
}elseif ($pokemon == "Squirtle"){
    createPokemon(2, 2);
    createBattle();
}else {
    $shown = "block";
}

echo $randomPokemon->name;
echo $selectedPokemon->name;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokemon</title>
    <style>
        .shown {
            display: <?php echo $shown?>
        }
    </style>
</head>
<body>
    <form action="" method="GET">
        <div class="shown">
            <p>Kies een pokémon</p>
            <select name="pokemon">
                <option>Charmander</option>
                <option>Bulbasaur</option>
                <option>Squirtle</option>
            </select>
            <button type="submit">Select</button>
        </div>
    </form>
</body>
</html>