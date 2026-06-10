<?php
$title = "";
$about = "";
$content = "";
$category = "";
$image = "";
$archive = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST["title"])) {
        $title = $_POST["title"];
    }

    if (isset($_POST["about"])) {
        $about = $_POST["about"];
    }

    if (isset($_POST["content"])) {
        $content = $_POST["content"];
    }

    if (isset($_POST["category"])) {
        $category = $_POST["category"];
    }

    if (isset($_POST["archive"])) {
        $archive = 1;
    }

    if (isset($_FILES["pphoto"]) && $_FILES["pphoto"]["error"] == 0) {
        $image = $_FILES["pphoto"]["name"];
        $target = "img/" . $image;
        move_uploaded_file($_FILES["pphoto"]["tmp_name"], $target);
    }
}
?>

<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
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
            <li><a href="administracija.php">Administracija</a></li>
            <li><a href="registracija.php">Registracija</a></li>
            <li><a href="xml_vijesti.php">XML/JSON</a></li>
            <li><a href="xml_admin.php">XML/JSON Admin</a></li>
        </ul>
    </div>
</nav>

<div class="article-page">

    <p class="article-category"><?php echo $category; ?></p>

    <h1 class="article-title">
        <?php echo $title; ?>
    </h1>

    <div class="article-line"></div>

    <p class="article-summary">
        <?php echo $about; ?>
    </p>

    <?php if ($image != ""): ?>
        <div class="article-image">
            <img src="img/<?php echo $image; ?>" alt="">
        </div>
    <?php endif; ?>

    <p class="image-caption">
        Prikaz vijesti unesene putem forme.
    </p>

    <div class="article-content">
        <p><?php echo nl2br($content); ?></p>
    </div>

    <?php if ($archive == 1): ?>
        <p class="archive-note">Ova vijest je označena za arhivu.</p>
    <?php endif; ?>

</div>

<footer>
    Jakša Mencl |
    jmencl@tvz.hr |
    2026
</footer>

</body>
</html>