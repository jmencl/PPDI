## 1. O projektu
Projekt naziva "Le Monde" je spojen s projektom drugog predmeta "Programiranje web aplikacija".  
Na spomenuti projekt drugog predmeta još su dodane funkcionalnosti koje demonstriraju rad s temama  
pokrivenim u ovom predmetu - "Podatkovna povezanost i digitalna infrastruktura".

--- 

## 2. Pokretanje web aplikacije  
U slučaju pokretanja web aplikacije pripaziti na sljedeće:  

Provjeriti da se baza spaja na ispravan port.  
Zbog već prijašnje zauzetosti porta 3306, za razvijanje projekta korišten je port 3307.  
Prije predaje kod u datoteci connect.php koji je glasio ovako:  
```<?php  
header('Content-Type: text/html; charset=utf-8');  

$servername = "localhost";  
$username = "root";  
$password = "";  
$basename = "webprojekt";  
$port = 3307;  
  
$dbc = mysqli_connect($servername, $username, $password, $basename, $port);  

if (!$dbc) {  
    die("Greška kod spajanja na bazu: " . mysqli_connect_error());  
}  

mysqli_set_charset($dbc, "utf8mb4");  
?>```  
  
Je zamijenjen s ovim:  
```<?php  
header('Content-Type: text/html; charset=utf-8');  
  
$servername = "localhost";  
$username = "root";  
$password = "";  
$basename = "webprojekt";  
$port = 3306;  
  
$dbc = mysqli_connect($servername, $username, $password, $basename, $port);  
  
if (!$dbc) {  
    die("Greška kod spajanja na bazu: " . mysqli_connect_error());  
}  
  
mysqli_set_charset($dbc, "utf8mb4");  
?>```
  
Dakle port je promijenjen na 3306 - default port za MySQL  
Također, ovo je opcija koja bi trebala raditi za neki drugi port koji nije ni 3306 ni 3307:  
```<?php  
header('Content-Type: text/html; charset=utf-8');  
  
$servername = "localhost";  
$username = "root";  
$password = "";  
$basename = "webprojekt";  
  
$dbc = mysqli_connect($servername, $username, $password, $basename);  
  
if (!$dbc) {  
    die("Greška kod spajanja na bazu: " . mysqli_connect_error());  
}  
mysqli_set_charset($dbc, "utf8mb4");  
?>```  
