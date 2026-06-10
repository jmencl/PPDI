<?php
include 'connect.php';
define('UPLPATH', 'img/');

$id = 0;

if (isset($_GET["id"])) {
    $id = (int)$_GET["id"];
}

$query = "SELECT * FROM vijesti WHERE id = $id";
$result = mysqli_query($dbc, $query);
$row = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <title><?php echo $row["naslov"]; ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <img src="img/Le_Monde.svg.png" alt="Le Monde" class="logo">
</header>

<nav>
    <div class="nav-inner">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="kategorija.php?kategorija=politique">Politique</a></li>
            <li><a href="kategorija.php?kategorija=sport">Sport</a></li>
            <li><a href="unos.php">Unos</a></li>
            <li><a href="administrator.php">Administracija</a></li>
            <li><a href="registracija.php">Registracija</a></li>
            <li><a href="xml_vijesti.php">XML/JSON</a></li>
            <li><a href="xml_admin.php">XML/JSON Admin</a></li>
        </ul>
    </div>
</nav>

<div class="article-page">

    <p class="article-category"><?php echo $row["kategorija"]; ?></p>

    <h1 class="article-title"><?php echo $row["naslov"]; ?></h1>

    <div class="article-line"></div>

    <p class="article-summary"><?php echo $row["sazetak"]; ?></p>

    <div class="article-image">
        <img src="<?php echo UPLPATH . $row["slika"]; ?>" alt="">
    </div>

    <p class="image-caption">
        Le Monde / Projektna vijest
    </p>

    <div class="article-content">
        <p><?php echo nl2br($row["tekst"]); ?></p>
    </div>

</div>

<footer>
    Jakša Mencl | jmencl@tvz.hr | 2026
</footer>

</body>
</html>