<?php
session_start();

$proizvodi = array(
    array('id' => 1, 'naziv' => 'Laptop', 'cena' => 800),
    array('id' => 2, 'naziv' => 'Mis', 'cena' => 20),
    array('id' => 3, 'naziv' => 'Slusalice', 'cena' => 100)
);
if (!isset($_SESSION['korpa'])) {
    $_SESSION['korpa'] = array();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog</title>

    <style>
        table {
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
        }
    </style>
</head>
<body>
    
    <p>Vaša korpa sadrži: <?= count($_SESSION['korpa']); ?> proizvoda</p>
    <a href="?vidi_korpu">Vidi korpu</a>

    <table>
        <thead>
            <tr>
                <th>Naziv proizvoda</th>
                <th>Cena proizvoda</th>
                <th>Akcija</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($proizvodi as $pr): ?>
            <tr>
                <td><?= $pr['naziv']; ?></td>
                <td><?= $pr['cena']; ?> RSD</td>    
                <td>
                    <form action="index.php" method="post">
                        <input type="hidden" name="id" value="<?= $pr['id']; ?>">
                        <input type="submit" name="submit" value="kupi"> 
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>
</html>
