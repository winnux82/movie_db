<?php

require_once('connexion.php');
echo "<pre>";
print_r($_POST);

$id = $_GET['id'] ?? null;
function validation($key, $message)
{
    if (isset($_POST[$key]) == false || empty($_POST[$key])) {
        echo $message;
        exit;
    }
}


validation("name", "Le nom est obligatoire");
validation("release", "La release est obligatoire");
validation("duration", "La durée est obligatoire");

$movie = $_POST;

if ($id != null) {
    $query = $db->query("update movie set name='$name' where id=$id");
    echo "movie $id mise à jour";
} else {
    $query = $db->query('insert into movie (`name`,`release`,`duration`) values  ("'.$movie['name'].'", "'.$movie['release'].'","'.$movie['duration'].'")');
    header('location: movie_list.php');
    echo "movie créé";
    exit;
}
header("Refresh:3; url=category_list.php");
