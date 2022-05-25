<?php

require_once('connexion.php');
$query = $db->query('select * from category');
echo "<pre>";
$categories = $query->fetchAll(PDO::FETCH_ASSOC);

//print_r($categories);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/node_modules/bootstrap/dist/css/bootstrap.min.css">
    <title>Document</title>
</head>

<body>

    <a class="btn btn-primary btn-lg" href="category.php" role="button">Ajouter</a>
    <table class="table table-dark">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Editer</th>
            <th>Supprimer</th>
        </tr>
        <?php if($query->rowCount()===0){
        echo '<tr> <Td colspan=4      style="text-align:center;"> Aucun enregistrement !!</TD></tr>';
}?>
        <?php foreach ($categories as $category) : ?>
            <tr>
                <td><?= $category['id'] ?></td>
                <td><?= $category['name'] ?></td>
                <td><a href="category.php?id=<?= $category['id'] ?>"><button class="btn btn-primary">Editer</button></A></td>
                <td><a onclick="return confirm('Voulez vous vraiment supprimer cet élément?')" href="category_remove.php?id=<?= $category['id'] ?>"><button class="btn btn-danger">Supprimer</button></A></td>

            </tr>
        <?php endforeach; ?>
    </table>

</body>

</html>