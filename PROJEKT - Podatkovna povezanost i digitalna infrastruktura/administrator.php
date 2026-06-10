<?php
session_start();

include 'connect.php';
define('UPLPATH', 'img/');

$poruka = "";
$uspjesnaPrijava = false;
$admin = false;
$imeKorisnika = "";

/* LOGIN */
if (isset($_POST["prijava"])) {

    $prijavaImeKorisnika = $_POST["username"];
    $prijavaLozinkaKorisnika = $_POST["lozinka"];

    $sql = "SELECT korisnicko_ime, lozinka, razina 
            FROM korisnik 
            WHERE korisnicko_ime = ?";

    $stmt = mysqli_stmt_init($dbc);

    if (mysqli_stmt_prepare($stmt, $sql)) {
        mysqli_stmt_bind_param($stmt, "s", $prijavaImeKorisnika);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        mysqli_stmt_bind_result($stmt, $imeKorisnika, $lozinkaKorisnika, $levelKorisnika);
        mysqli_stmt_fetch($stmt);

        if (mysqli_stmt_num_rows($stmt) > 0 && password_verify($prijavaLozinkaKorisnika, $lozinkaKorisnika)) {

            $uspjesnaPrijava = true;

            $_SESSION["username"] = $imeKorisnika;
            $_SESSION["level"] = $levelKorisnika;

            if ($levelKorisnika == 1) {
                $admin = true;
            } else {
                $admin = false;
            }

        } else {
            $poruka = "Neispravno korisničko ime ili lozinka. Prvo se registrirajte.";
        }
    }
}

/* PROVJERA SESSIONA */
if (isset($_SESSION["username"]) && isset($_SESSION["level"])) {
    if ($_SESSION["level"] == 1) {
        $admin = true;
    }
}

/* BRISANJE VIJESTI */
if ($admin && isset($_POST["delete"])) {

    $id = (int)$_POST["id"];

    $sql = "DELETE FROM vijesti WHERE id = ?";
    $stmt = mysqli_stmt_init($dbc);

    if (mysqli_stmt_prepare($stmt, $sql)) {
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        $poruka = "Vijest je izbrisana.";
    }
}

/* IZMJENA VIJESTI */
if ($admin && isset($_POST["update"])) {

    $id = (int)$_POST["id"];
    $title = $_POST["title"];
    $about = $_POST["about"];
    $content = $_POST["content"];
    $category = $_POST["category"];

    if (isset($_POST["archive"])) {
        $archive = 1;
    } else {
        $archive = 0;
    }

    $old_image = $_POST["old_image"];
    $picture = $old_image;

    if (!empty($_FILES["pphoto"]["name"])) {
        $picture = $_FILES["pphoto"]["name"];
        $target = "img/" . $picture;
        move_uploaded_file($_FILES["pphoto"]["tmp_name"], $target);
    }

    $sql = "UPDATE vijesti 
            SET naslov = ?, sazetak = ?, tekst = ?, slika = ?, kategorija = ?, arhiva = ?
            WHERE id = ?";

    $stmt = mysqli_stmt_init($dbc);

    if (mysqli_stmt_prepare($stmt, $sql)) {
        mysqli_stmt_bind_param($stmt, "sssssii", $title, $about, $content, $picture, $category, $archive, $id);
        mysqli_stmt_execute($stmt);
        $poruka = "Vijest je izmijenjena.";
    }
}
?>

<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <title>Administracija</title>
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

        <h2>Administracija</h2>

        <?php if ($poruka != ""): ?>
            <p class="form-message"><?php echo $poruka; ?></p>
        <?php endif; ?>

        <?php if (isset($_SESSION["username"]) && $_SESSION["level"] == 0): ?>

            <p>Dobro došli, <?php echo $_SESSION["username"]; ?>! Uspješno ste prijavljeni. Vaša razina je korisnik.</p>
            <p><a href="logout.php">Odjava</a></p>

        <?php elseif (!$admin): ?>

            <form action="administrator.php" method="POST">

                <label>Korisničko ime</label>
                <input type="text" name="username" required>

                <label>Lozinka</label>
                <input type="password" name="lozinka" required class="password-field">

                <button type="submit" name="prijava">Prijava</button>

            </form>

            <p class="registracija-link">
                Nemate korisnički račun?
                <a href="registracija.php">Registrirajte se ovdje.</a>
            </p>

        <?php else: ?>

            <p>
                Dobro došli, <?php echo $_SESSION["username"]; ?>.
                Vaša razina je administrator.
            </p>

            <p class="odjava-link">
                <a href="logout.php">Odjava</a>
            </p>

            <?php
            $query = "SELECT * FROM vijesti ORDER BY id DESC";
            $result = mysqli_query($dbc, $query);

            while ($row = mysqli_fetch_array($result)) {
            ?>

                <form class="admin-form" enctype="multipart/form-data" action="administrator.php" method="POST">

                    <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
                    <input type="hidden" name="old_image" value="<?php echo $row["slika"]; ?>">

                    <label>Naslov vijesti</label>
                    <input type="text" name="title" value="<?php echo $row["naslov"]; ?>">

                    <label>Kratki sažetak</label>
                    <textarea name="about" rows="4"><?php echo $row["sazetak"]; ?></textarea>

                    <label>Tekst vijesti</label>
                    <textarea name="content" rows="8"><?php echo $row["tekst"]; ?></textarea>

                    <label>Kategorija</label>
                    <select name="category">
                        <option value="politique" <?php if ($row["kategorija"] == "politique") echo "selected"; ?>>Politique</option>
                        <option value="sport" <?php if ($row["kategorija"] == "sport") echo "selected"; ?>>Sport</option>
                    </select>

                    <label>Trenutna slika</label>
                    <img src="<?php echo UPLPATH . $row["slika"]; ?>" class="admin-img" alt="">

                    <label>Promijeni sliku</label>
                    <input type="file" name="pphoto" accept="image/*">

                    <label class="checkbox-label">
                        <input type="checkbox" name="archive" <?php if ($row["arhiva"] == 1) echo "checked"; ?>>
                        Arhiviraj vijest
                    </label>

                    <div class="form-buttons">
                        <button type="submit" name="update">Izmijeni</button>
                        <button type="submit" name="delete" class="delete-btn">Izbriši</button>
                    </div>

                </form>

            <?php } ?>

        <?php endif; ?>

    </section>

</div>

<footer>
    Jakša Mencl | jmencl@tvz.hr | 2026
</footer>

</body>
</html>