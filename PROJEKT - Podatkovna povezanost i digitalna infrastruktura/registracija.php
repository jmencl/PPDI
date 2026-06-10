<?php
include 'connect.php';

$poruka = "";
$registriran = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $ime = $_POST["ime"];
    $prezime = $_POST["prezime"];
    $username = $_POST["username"];
    $pass = $_POST["pass"];
    $passRep = $_POST["passRep"];
    $razina = 0;

    if ($pass != $passRep) {
        $poruka = "Lozinke nisu iste.";
    } else {

        $sql = "SELECT korisnicko_ime FROM korisnik WHERE korisnicko_ime = ?";
        $stmt = mysqli_stmt_init($dbc);

        if (mysqli_stmt_prepare($stmt, $sql)) {
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
        }

        if (mysqli_stmt_num_rows($stmt) > 0) {
            $poruka = "Korisničko ime već postoji.";
        } else {

            $hashed_password = password_hash($pass, PASSWORD_BCRYPT);

            $sql = "INSERT INTO korisnik (ime, prezime, korisnicko_ime, lozinka, razina)
                    VALUES (?, ?, ?, ?, ?)";

            $stmt = mysqli_stmt_init($dbc);

            if (mysqli_stmt_prepare($stmt, $sql)) {
                mysqli_stmt_bind_param($stmt, "ssssi", $ime, $prezime, $username, $hashed_password, $razina);
                mysqli_stmt_execute($stmt);

                $registriran = true;
                $poruka = "Korisnik je uspješno registriran.";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <title>Registracija</title>
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

        <h2>Registracija korisnika</h2>

        <?php if ($poruka != ""): ?>
            <p class="form-message"><?php echo $poruka; ?></p>
        <?php endif; ?>

        <?php if (!$registriran): ?>

        <form action="registracija.php" method="POST">

            <label>Ime</label>
            <input type="text" name="ime" required>

            <label>Prezime</label>
            <input type="text" name="prezime" required>

            <label>Korisničko ime</label>
            <input type="text" name="username" required>

            <label>Lozinka</label>
            <input type="password" name="pass" required>

            <label>Ponovite lozinku</label>
            <input type="password" name="passRep" required>

            <button type="submit">Registriraj se</button>

        </form>

        <?php endif; ?>

    </section>

</div>

<footer>
    Jakša Mencl | jmencl@tvz.hr | 2026
</footer>

</body>
</html>