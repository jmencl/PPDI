<?php
include 'connect.php';

$poruka = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $title = $_POST["title"];
    $about = $_POST["about"];
    $content = $_POST["content"];
    $category = $_POST["category"];
    $date = date("Y-m-d");

    if (isset($_POST["archive"])) {
        $archive = 1;
    } else {
        $archive = 0;
    }

    $picture = $_FILES["pphoto"]["name"];
    $target = "img/" . $picture;

    if (move_uploaded_file($_FILES["pphoto"]["tmp_name"], $target)) {

        $sql = "INSERT INTO vijesti 
                (datum, naslov, sazetak, tekst, slika, kategorija, arhiva)
                VALUES (?, ?, ?, ?, ?, ?, ?)";

        $stmt = mysqli_stmt_init($dbc);

        if (mysqli_stmt_prepare($stmt, $sql)) {

            mysqli_stmt_bind_param(
                $stmt,
                "ssssssi",
                $date,
                $title,
                $about,
                $content,
                $picture,
                $category,
                $archive
            );

            if (mysqli_stmt_execute($stmt)) {
                $poruka = "Vijest je uspješno spremljena u bazu.";
            } else {
                $poruka = "Greška kod spremanja u bazu.";
            }

        } else {
            $poruka = "Greška kod pripreme SQL upita.";
        }

    } else {
        $poruka = "Greška kod uploada slike.";
    }
}
?>

<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unos vijesti</title>
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

    <section class="form-section">

        <h2>Unos nove vijesti</h2>

        <?php if ($poruka != ""): ?>
            <p class="form-message"><?php echo $poruka; ?></p>
        <?php endif; ?>

        <form action="unos.php" method="POST" enctype="multipart/form-data">

            <label for="title">Naslov vijesti</label>
            <input type="text" name="title" id="title" required>

            <label for="about">Kratki sažetak vijesti</label>
            <textarea name="about" id="about" rows="5" required></textarea>

            <label for="content">Tekst vijesti</label>
            <textarea name="content" id="content" rows="10" required></textarea>

            <label for="category">Kategorija</label>
            <select name="category" id="category" required>
                <option value="politique">Politique</option>
                <option value="sport">Sport</option>
            </select>

            <label for="pphoto">Slika</label>
            <input type="file" name="pphoto" id="pphoto" accept="image/*" required>

            <label class="checkbox-label">
                <input type="checkbox" name="archive">
                Arhiviraj vijest
            </label>

            <div class="form-buttons">
                <button type="submit">Pošalji</button>
                <button type="reset">Poništi</button>
            </div>

        </form>

    </section>

</div>

<footer>
    Jakša Mencl |
    jmencl@tvz.hr |
    2026
</footer>

</body>
</html>