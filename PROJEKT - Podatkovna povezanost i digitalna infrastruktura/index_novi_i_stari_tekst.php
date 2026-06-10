<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Le Monde</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <header>
        <img src="img/Le_Monde.svg.png" alt="Le Monde" class="logo">
    </header>

   <!--  <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="kategorija.php?kategorija=politique">Politique</a></li>
            <li><a href="kategorija.php?kategorija=sport">Sport</a></li>
            <li><a href="administracija.php">Administracija</a></li>
        </ul>
    </nav> -->

    <nav>
        <div class="nav-inner">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="kategorija.php?kategorija=politique">Politique</a></li>
                <li><a href="kategorija.php?kategorija=sport">Sport</a></li>
                <li><a href="administracija.php">Administracija</a></li>
                <li><a href="unos.php">Unos</a></li>
            </ul>
        </div>
    </nav>

    <div class="container">

        <section class="category-section">

        <h2>Politique</h2>

            <div class="news-grid">

                <!-- <article class="news-card">
                    <a href="clanak.php">
                    <img src="img/politika.jpg" alt="">
                    <h3>Pour la Cour de Luxembourg, les patrons doivent mesurer le temps de travail journalier</h3>
                    </a>
                </article>

                <article class="news-card">
                    <a href="clanak.php">
                    <img src="img/politika.jpg" alt="">
                    <h3>Pour la Cour de Luxembourg, les patrons doivent mesurer le temps de travail journalier</h3>
                    </a>
                </article>

                <article class="news-card">
                    <a href="clanak.php">
                    <img src="img/politika.jpg" alt="">
                    <h3>Pour la Cour de Luxembourg, les patrons doivent mesurer le temps de travail journalier</h3>
                    </a>
                </article> -->

                <article class="news-card">

                    <a href="clanak.php">

                        <img src="img/politika.avif"
                            class="politika-small"
                            alt="">

                        <img src="img/politika.avif"
                            class="politika-large"
                            alt="">

                        <h3>
                            Pour la Cour de Luxembourg, les patrons doivent mesurer
                            le temps de travail journalier
                        </h3>

                    </a>

                </article>

                <article class="news-card">

                    <a href="clanak.php">

                        <img src="img/politika.avif"
                            class="politika-small"
                            alt="">

                        <img src="img/politika.avif"
                            class="politika-large"
                            alt="">

                        <h3>
                            Pour la Cour de Luxembourg, les patrons doivent mesurer
                            le temps de travail journalier
                        </h3>

                    </a>

                </article>
                
                <article class="news-card">

                    <a href="clanak.php">

                        <img src="img/politika.avif"
                            class="politika-small"
                            alt="">

                        <img src="img/politika.avif"
                            class="politika-large"
                            alt="">

                        <h3>
                            Pour la Cour de Luxembourg, les patrons doivent mesurer
                            le temps de travail journalier
                        </h3>

                    </a>

                </article>                


            </div>

        </section>

        <section class="category-section">

            <h2>Sport</h2>

            <div class="news-grid">

                <article class="news-card">
                    <a href="clanak.php">
                        <img src="img/sport.avif" alt="" class="news-img">
                        <h3>Dopage : la Slovénie dans l'oeil du cyclone « Aderlass »</h3>
                    </a>
                </article>

                <article class="news-card">
                    <a href="clanak.php">
                        <img src="img/sport.avif" alt="" class="news-img">
                        <h3>Dopage : la Slovénie dans l'oeil du cyclone « Aderlass »</h3>
                    </a>
                </article>

                <article class="news-card">
                    <a href="clanak.php">
                        <img src="img/sport.avif" alt="" class="news-img">
                        <h3>Dopage : la Slovénie dans l'oeil du cyclone « Aderlass »</h3>
                    </a>
                </article>

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

<?php
include 'connect.php';

define('UPLPATH', 'img/');
?>

<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Le Monde</title>
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
        </ul>
    </div>
</nav>

<div class="container">

    <section class="category-section">

        <h2>Politique</h2>

        <div class="news-grid">

            <?php
            $query = "SELECT * FROM vijesti 
                      WHERE arhiva = 0 AND kategorija = 'politique'
                      ORDER BY id DESC
                      LIMIT 3";

            $result = mysqli_query($dbc, $query);

            while ($row = mysqli_fetch_array($result)) {
                echo '
                <article class="news-card">
                    <a href="clanak.php?id=' . $row["id"] . '">

                        <img src="' . UPLPATH . $row["slika"] . '" 
                             class="politika-small" 
                             alt="">

                        <img src="' . UPLPATH . $row["slika"] . '" 
                             class="politika-large" 
                             alt="">

                        <h3>' . $row["naslov"] . '</h3>

                    </a>
                </article>';
            }
            ?>

        </div>

    </section>

    <section class="category-section">

        <h2>Sport</h2>

        <div class="news-grid">

            <?php
            $query = "SELECT * FROM vijesti 
                      WHERE arhiva = 0 AND kategorija = 'sport'
                      ORDER BY id DESC
                      LIMIT 3";

            $result = mysqli_query($dbc, $query);

            while ($row = mysqli_fetch_array($result)) {
                echo '
                <article class="news-card">
                    <a href="clanak.php?id=' . $row["id"] . '">

                        <img src="' . UPLPATH . $row["slika"] . '" 
                             class="news-img" 
                             alt="">

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

<!-- administrator.php -->
 <?php
include 'connect.php';
define('UPLPATH', 'img/');

$poruka = "";

if (isset($_POST["delete"])) {
    $id = (int)$_POST["id"];

    $query = "DELETE FROM vijesti WHERE id = $id";
    mysqli_query($dbc, $query);

    $poruka = "Vijest je izbrisana.";
}

if (isset($_POST["update"])) {
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

    $query = "UPDATE vijesti SET
              naslov = '$title',
              sazetak = '$about',
              tekst = '$content',
              slika = '$picture',
              kategorija = '$category',
              arhiva = '$archive'
              WHERE id = $id";

    mysqli_query($dbc, $query);

    $poruka = "Vijest je izmijenjena.";
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
        </ul>
    </div>
</nav>

<div class="container">

    <section class="form-section">
        <h2>Administracija vijesti</h2>

        <?php if ($poruka != ""): ?>
            <p class="form-message"><?php echo $poruka; ?></p>
        <?php endif; ?>

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

        <?php
        }
        ?>

    </section>

</div>

<footer>
    Jakša Mencl | jmencl@tvz.hr | 2026
</footer>

</body>
</html>