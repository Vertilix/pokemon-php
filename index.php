<?php
if(isset($_GET["pokemon"])) {
    $pokemon = $_GET["pokemon"];
}

$shown = "none";

class Pokemon {
    public $name;
    public $type;
    public $hp = 100;

    function setName($name){
        $this->name = $name;
    }

    function setType($type){
        $this->type = $type;
    }

    function getName(){
        return $this->name;
    }

    function getType(){
        return $this->type;
    }
}

$names = array("Charmander", "Bulbasaur", "Squirtle");
$types = array("Fire", "Grass", "Water");

$selectedPokemon = new Pokemon;
$randomPokemon = new Pokemon;
function createPokemon($n, $t) {
    global $names;
    global $types;
    global $selectedPokemon;
    $selectedPokemon->setName($names[$n]);
    $selectedPokemon->setType($types[$t]);
    echo 'Jij koos "' . $selectedPokemon->getName(). '"!<br>';
    echo 'Met type "' . $selectedPokemon->getType(). '"!<br>';
}

function createBattle() {
    global $randomPokemon;
    global $names;
    global $types;
    $randomPokemon->setName($names[array_rand($names)]);
    if ($randomPokemon->getName() == "Charmander") {
        $randomPokemon->setType($types[0]);
    }elseif ($randomPokemon->getName()  == "Bulbasaur") {
        $randomPokemon->setType($types[1]);
    }else{
        $randomPokemon->setType($types[2]);
    }
    echo $randomPokemon->getType();
    echo $randomPokemon->getName();
}

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