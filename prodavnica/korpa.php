<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Korpa</title>
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

<?php
session_start();
$proizvodi = array(
    array('id' => 1, 'naziv' => 'Laptop', 'cena' => 800),
    array('id' => 2, 'naziv' => 'Mis', 'cena' => 20),
    array('id' => 3, 'naziv' => 'Slusalice', 'cena' => 100)
);

$korpa = array();
$ukupno = 0;

if (isset($_SESSION['korpa'])) {
    foreach ($_SESSION['korpa'] as $id) {
        foreach ($proizvodi as $proizvod) {
            if ($proizvod['id'] == $id) {
                $korpa[] = $proizvod;
                $ukupno += $proizvod['cena'];
                break;
            }
        }
    }
}
?>

<table>
    <thead>
        <tr>
            <th>Naziv proizvoda</th>
            <th>Cena proizvoda</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($korpa as $proizvod): ?>
        <tr>
            <td><?= $proizvod['naziv']; ?></td>
            <td><?= $proizvod['cena']; ?> RSD</td>
        </tr>
        <?php endforeach; ?>
    </tbody>
    <tfoot>
        <tr>
            <td>Ukupno:</td>
            <td><?= $ukupno; ?> RSD</td>
        </tr>
    </tfoot>
</table>

<form action="index.php" method="post">
    <p>
        <a href="index.php">Nastavi sa kupovinom</a>
        <input type="submit" name="submit" value="Isprazni" formaction="index.php">
    </p>
</form>

</body>
</html>
