<?php
// Adatbázis kapcsolat beállítása
$servername = "localhost";
$username = "felhasznalonev";
$password = "jelszo";
$dbname = "adatbazisnev";

$conn = new mysqli($servername, $username, $password, $dbname);

// Ellenőrizzük a kapcsolatot
if ($conn->connect_error) {
    die("Sikertelen kapcsolódás az adatbázishoz: " . $conn->connect_error);
}

// Lekérjük az aktuális helyszín adatait
$sql = "SELECT helyszin_nev, varos, orszag FROM helyszinek WHERE id = 1"; // Példa, cseréld le az id-t az aktuális helyszín azonosítójára
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Kiírjuk az adatokat
    while($row = $result->fetch_assoc()) {
        echo "<h1>" . $row["helyszin_nev"]. "</h1>";
        echo "<p>Varos: " . $row["varos"]. "</p>";
        echo "<p>Orszag: " . $row["orszag"]. "</p>";
    }
} else {
    echo "Nincs találat az adatbázisban.";
}

// Adatbázis kapcsolat lezárása
$conn->close();
?>
