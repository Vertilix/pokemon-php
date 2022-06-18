<?php
session_start();
error_reporting(-1);
ini_set( 'display_errors', 1 ); // Op arch linux liet hij geen errors zien maar met deze functies wel, Misschien is er een andere oplossing maar voor nu niet nodig

if(isset($_GET['reset'])){ // Reset knop
    session_destroy();
    header('location:index.php');
}

$selectedPokemon = new Pokemon;
$enemyPokemon = new Pokemon;

if(isset($_SESSION['hp'])) {
    $selectedPokemon->hp = $_SESSION['hp'];
    $enemyPokemon->hp = $_SESSION['eHp'];
}else {
    $enemyPokemon->setHp(100);
    $selectedPokemon->setHp(100);
}

if(isset($_GET["pokemon"])) {
    $pokemon = $_GET["pokemon"];
    $ePokemon = $_GET["ePokemon"];
}else {
    $pokemon = "";
    $ePokemon = "";
}

if(isset($_GET['attack'])){
    damage();
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
    global $enemyPokemon;
    global $names;
    global $types;
    global $ePokemon;
    $enemyPokemon->name = $ePokemon;

    if ($enemyPokemon->name == "Charmander") {
        $enemyPokemon->setType($types[0]);
        $enemyPokemon->setName($names[0]);
    }elseif ($enemyPokemon->name  == "Bulbasaur") {
        $enemyPokemon->setType($types[1]);
        $enemyPokemon->setName($names[1]);
    }else{
        $enemyPokemon->setType($types[2]);
        $enemyPokemon->setName($names[2]);
    }
    echo $enemyPokemon->type;
    echo $enemyPokemon->name;
    echo $enemyPokemon->hp;
}

$_SESSION["hp"] = $selectedPokemon->hp;
$_SESSION["eHp"] = $enemyPokemon->hp;

function damage(){
    $defaultDmg = 20;
    if
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

echo $enemyPokemon->name;
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
            <select name="ePokemon">
                <option>Charmander</option>
                <option>Bulbasaur</option>
                <option>Squirtle</option>
            </select>
            <button type="submit">Select</button>
        </div>

        <button type="attack">Attack</button>
    </form>

    <div class="buttons">
    <a href="?reset">Reset</a>
</div>
</body>
</html>