<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <title>XML i JSON vijesti</title>
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
        <h2>Vijesti učitane iz XML datoteke</h2>

        <div class="news-grid category-list">

            <?php
            $xml = simplexml_load_file("data/vijesti.xml");

            foreach ($xml->vijest as $vijest) {
                echo '
                <article class="news-card">
                    <h3>' . $vijest->naslov . '</h3>
                    <p><strong>Kategorija:</strong> ' . $vijest->kategorija . '</p>
                    <p>' . $vijest->sazetak . '</p>
                    <p><strong>Autor:</strong> ' . $vijest->autor . '</p>
                </article>';
            }
            ?>

        </div>
    </section>

    <section class="category-section">
        <h2>Vijesti učitane iz JSON datoteke</h2>

        <div class="news-grid category-list">

            <?php
            $jsonData = file_get_contents("data/vijesti.json");
            $vijesti = json_decode($jsonData, true);

            foreach ($vijesti as $vijest) {
                echo '
                <article class="news-card">
                    <h3>' . $vijest["naslov"] . '</h3>
                    <p><strong>Kategorija:</strong> ' . $vijest["kategorija"] . '</p>
                    <p>' . $vijest["sazetak"] . '</p>
                    <p><strong>Autor:</strong> ' . $vijest["autor"] . '</p>
                </article>';
            }
            ?>

        </div>
    </section>
    <br>
    <div>
        <p><a href="xml_admin.php">Uredi XML i JSON vijesti</a></p>
    </div>

</div>

<footer>
    Jakša Mencl | jmencl@tvz.hr | 2026
</footer>

</body>
</html>