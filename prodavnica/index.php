<?php
$proizvodi = array(
    array(
        'id' => 1,
        'naziv' => 'Laptop',
        'cena' => 800
    ),
    array(
        'id' => 2,
        'naziv' => 'Mis',
        'cena' => 20
    ),
    array(
        'id' => 3,
        'naziv' => 'Slusalice',
        'cena' => 100
    )
);

session_start();

if (!isset($_SESSION['korpa'])) {
    $_SESSION['korpa'] = array();
}

if (isset($_POST['submit']) && $_POST['submit'] == 'kupi') {
    $_SESSION['korpa'][] = $_POST['id'];
    header('Location: .');
    exit();
}

if (isset($_POST['submit']) && $_POST['submit'] == 'Isprazni') {
    unset($_SESSION['korpa']);
    header('Location: ?vidi_korpu');
    exit();
}

if (isset($_GET['vidi_korpu'])) {
    $korpa = array();
    $ukupno = 0;
    
    foreach ($_SESSION['korpa'] as $id) {
        foreach ($proizvodi as $proizvod) {
            if ($proizvod['id'] == $id) {
                $korpa[] = $proizvod;
                $ukupno += $proizvod['cena'];
                break;
            }
        }
    }

    include 'korpa.php';
    include 'katalog.php';
    exit();
}
?>
