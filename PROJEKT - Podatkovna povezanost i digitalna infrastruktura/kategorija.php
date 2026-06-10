<?php
include 'connect.php';

define('UPLPATH', 'img/');

$kategorija = "";

if (isset($_GET["kategorija"])) {
    $kategorija = $_GET["kategorija"];
}
?>

<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo ucfirst($kategorija); ?></title>
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

<div class="container">

    <section class="category-section">

        <h2><?php echo ucfirst($kategorija); ?></h2>

        <div class="news-grid category-list">

            <?php
            $query = "SELECT * FROM vijesti 
                      WHERE arhiva = 0 AND kategorija = '$kategorija'
                      ORDER BY id DESC";

            $result = mysqli_query($dbc, $query);

            while ($row = mysqli_fetch_array($result)) {
                echo '
                <article class="news-card">
                    <a href="clanak.php?id=' . $row["id"] . '">
                        <img src="' . UPLPATH . $row["slika"] . '" class="news-img" alt="">
                        <h3>' . $row["naslov"] . '</h3>
                    </a>
                </article>';
            }
            ?>

        </div>

    </section>

</div>

<footer>
    Jakša Mencl |
    jmencl@tvz.hr |
    2026
</footer>

</body>
</html>