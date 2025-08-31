<html lang="de">
<body>
<h1>Mein Blog </h1>
<label> Suche: <input type="search" name="suche" placeholder="suchen"/> </label>
<button>Suche starten</button>
<br><br>
<h3>Eintrag verfassen</h3>
<label> Titel: <input type="text" name="titel" placeholder="Blog-Titel"/> </label>
<label> <input type="date" name="datum"/></label>
<label> <input type="time" name="uhrzeit"/></label>
<br><br>
<label> Eintrag: <textarea name="blogeintrag"> </textarea> </label>
<button name="speichern">Speichern</button>
<h3>alle Einträge</h3>

<?php
$host = "db";
$user = 'root';
$pass = getenv('MARIADB_ROOT_PASSWORD');
$dbname = 'blog';

// Verbindung herstellen
$conn = new mysqli($host, $user, $pass, $dbname);

// Verbindung prüfen
if ($conn->connect_error) {
    die("Verbindung fehlgeschlagen: " . $conn->connect_error);
}
$sql = "SELECT * FROM blog_entries";
$result = $conn->query($sql);

while($row = $result->fetch_assoc()) {
    echo "Titel: " . $row["title"] . "  Inhalt: " . $row["content"] . "Erstellt am: ". $row["timestamp"]."<br>";
}
?>



<button type="button">filtern nach</button>
</body>
</html>
