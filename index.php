<?php
if(isset($_GET["pokemon"])) {
    $pokemon = $_GET["pokemon"];
}

class Pokemon {
    public $name;
    public $type;

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
$types = array("Fire", "Grass", "Squirtle");

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

if ($pokemon == "Charmander") {
    createPokemon(0, 0);
}elseif ($pokemon == "Bulbasaur") {
    createPokemon(1, 1);
}else{
    createPokemon(2, 2);
}

function createBattle() {
    global $selectedPokemon;
    global $randomPokemon;
    global $names;
    global $types;
    $randomPokemonChooser = array_rand($names, 3);

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokemon</title>
</head>
<body>
    <form action="" method="GET">
        <p>Kies een pokémon</p>
        <select name="pokemon">
            <option>Charmander</option>
            <option>Bulbasaur</option>
            <option>Squirtle</option>
        </select>
        <button type="submit">Select</button>
    </form>
</body>
</html>