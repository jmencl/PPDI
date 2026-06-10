<?php

session_start();

if (!isset($_SESSION["username"]) || $_SESSION["level"] != 1) {
    header("Location: administrator.php");
    exit();
}

$xmlFile = "data/vijesti.xml";
$jsonFile = "data/vijesti.json";
$poruka = "";

function spremiXmlLijepo($xml, $xmlFile) {
    $dom = new DOMDocument("1.0", "UTF-8");
    $dom->preserveWhiteSpace = false;
    $dom->formatOutput = true;
    $dom->loadXML($xml->asXML());
    $dom->save($xmlFile);
}

/* DODAVANJE XML VIJESTI */
if (isset($_POST["dodaj_xml"])) {

    $naslov = $_POST["naslov"];
    $kategorija = $_POST["kategorija"];
    $sazetak = $_POST["sazetak"];
    $autor = $_POST["autor"];

    $xml = simplexml_load_file($xmlFile);

    $novaVijest = $xml->addChild("vijest");
    $novaVijest->addChild("naslov", htmlspecialchars($naslov));
    $novaVijest->addChild("kategorija", htmlspecialchars($kategorija));
    $novaVijest->addChild("sazetak", htmlspecialchars($sazetak));
    $novaVijest->addChild("autor", htmlspecialchars($autor));

    spremiXmlLijepo($xml, $xmlFile);

    $poruka = "XML vijest je dodana.";
}

/* BRISANJE XML VIJESTI */
if (isset($_POST["obrisi_xml"])) {

    $index = (int)$_POST["xml_index"];

    $xml = simplexml_load_file($xmlFile);
    unset($xml->vijest[$index]);

    spremiXmlLijepo($xml, $xmlFile);

    $poruka = "XML vijest je obrisana.";
}

/* DODAVANJE JSON VIJESTI */
if (isset($_POST["dodaj_json"])) {

    $naslov = $_POST["naslov"];
    $kategorija = $_POST["kategorija"];
    $sazetak = $_POST["sazetak"];
    $autor = $_POST["autor"];

    $jsonData = file_get_contents($jsonFile);
    $vijesti = json_decode($jsonData, true);

    $vijesti[] = array(
        "naslov" => $naslov,
        "kategorija" => $kategorija,
        "sazetak" => $sazetak,
        "autor" => $autor
    );

    file_put_contents(
        $jsonFile,
        json_encode($vijesti, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE)
    );

    $poruka = "JSON vijest je dodana.";
}

/* BRISANJE JSON VIJESTI */
if (isset($_POST["obrisi_json"])) {

    $index = (int)$_POST["json_index"];

    $jsonData = file_get_contents($jsonFile);
    $vijesti = json_decode($jsonData, true);

    unset($vijesti[$index]);
    $vijesti = array_values($vijesti);

    file_put_contents(
        $jsonFile,
        json_encode($vijesti, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE)
    );

    $poruka = "JSON vijest je obrisana.";
}

?>

<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <title>XML/JSON administracija</title>
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

        <h2>XML / JSON administracija</h2>

        <?php if ($poruka != ""): ?>
            <p class="form-message"><?php echo $poruka; ?></p>
        <?php endif; ?>

        <h2>Dodaj XML vijest</h2>

        <form action="xml_admin.php" method="POST">

            <label>Naslov</label>
            <input type="text" name="naslov" required>

            <label>Kategorija</label>
            <select name="kategorija" required>
                <option value="politique">Politique</option>
                <option value="sport">Sport</option>
            </select>

            <label>Sažetak</label>
            <textarea name="sazetak" rows="4" required></textarea>

            <label>Autor</label>
            <input type="text" name="autor" value="Jakša Mencl" required>

            <button type="submit" name="dodaj_xml">Dodaj XML vijest</button>

        </form>

        <h2>Postojeće XML vijesti</h2>

        <?php
        $xml = simplexml_load_file($xmlFile);
        $i = 0;

        foreach ($xml->vijest as $vijest) {
            echo '
            <form class="admin-form" action="xml_admin.php" method="POST">
                <p><strong>' . $vijest->naslov . '</strong></p>
                <p>' . $vijest->sazetak . '</p>
                <input type="hidden" name="xml_index" value="' . $i . '">
                <button type="submit" name="obrisi_xml" class="delete-btn">Obriši XML vijest</button>
            </form>
            ';
            $i++;
        }
        ?>

        <h2>Dodaj JSON vijest</h2>

        <form action="xml_admin.php" method="POST">

            <label>Naslov</label>
            <input type="text" name="naslov" required>

            <label>Kategorija</label>
            <select name="kategorija" required>
                <option value="politique">Politique</option>
                <option value="sport">Sport</option>
            </select>

            <label>Sažetak</label>
            <textarea name="sazetak" rows="4" required></textarea>

            <label>Autor</label>
            <input type="text" name="autor" value="Jakša Mencl" required>

            <button type="submit" name="dodaj_json">Dodaj JSON vijest</button>

        </form>

        <h2>Postojeće JSON vijesti</h2>

        <?php
        $jsonData = file_get_contents($jsonFile);
        $vijesti = json_decode($jsonData, true);

        foreach ($vijesti as $index => $vijest) {
            echo '
            <form class="admin-form" action="xml_admin.php" method="POST">
                <p><strong>' . $vijest["naslov"] . '</strong></p>
                <p>' . $vijest["sazetak"] . '</p>
                <input type="hidden" name="json_index" value="' . $index . '">
                <button type="submit" name="obrisi_json" class="delete-btn">Obriši JSON vijest</button>
            </form>
            ';
        }
        ?>

    </section>

</div>

<footer>
    Jakša Mencl | jmencl@tvz.hr | 2026
</footer>

</body>
</html>