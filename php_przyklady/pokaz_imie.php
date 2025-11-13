<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Wyszukiwanie po imieniu</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f0f0f0; padding: 20px; }
        .container { max-width: 1000px; margin: 0 auto; background-color: white; padding: 30px; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        h1 { color: #2c3e50; text-align: center; }
        table { width: 100%; border-collapse: collapse; margin: 20px 0; }
        th { background-color: #9b59b6; color: white; padding: 15px; text-align: left; }
        td { padding: 12px 15px; border-bottom: 1px solid #ddd; }
        tr:nth-child(even) { background-color: #f9f9f9; }
        tr:hover { background-color: #f0e6ff; }
        .info { background-color: #e8daef; border-left: 4px solid #9b59b6; padding: 15px; margin: 20px 0; }
        .warning { background-color: #fff3cd; border-left: 4px solid #ffc107; padding: 15px; margin: 20px 0; }
        .code-box { background-color: #263238; color: #aed581; padding: 15px; border-radius: 5px; margin: 15px 0; font-family: 'Courier New', monospace; }
        .back-link { text-align: center; margin-top: 20px; }
        .back-link a { display: inline-block; padding: 10px 20px; background-color: #9b59b6; color: white; text-decoration: none; border-radius: 5px; margin: 5px; }
        .count { text-align: center; font-size: 1.3em; color: #2c3e50; margin: 20px 0; font-weight: bold; }
    </style>
</head>
<body>

<div class="container">

<?php
// Połączenie z bazą
include("polaczenie.php");

// Pobierz szukane imię z formularza
$imie = $_POST['szukane_imie'];

echo "<h1>👤 Wyszukiwanie ucznia: <span style='color: #9b59b6;'>$imie</span></h1>";

echo "<div class='info'>";
echo "<strong>Pobrano z formularza:</strong> <code>\$imie = \$_POST['szukane_imie'];</code><br>";
echo "Szukane imię: <strong>$imie</strong>";
echo "</div>";

// Zapytanie SQL z WHERE
$sql = "SELECT * FROM uczniowie WHERE imie = '$imie'";

echo "<div class='info'>";
echo "<strong>Zapytanie SQL:</strong>";
echo "<div class='code-box'>$sql</div>";
echo "🔍 Szukamy uczniów gdzie <code>imie = '$imie'</code>";
echo "</div>";

// Wykonaj zapytanie
$wynik = mysqli_query($conn, $sql);
$ilosc = mysqli_num_rows($wynik);

echo "<div class='count'>";
echo "🎯 Znaleziono: <strong>$ilosc</strong> uczniów o imieniu $imie";
echo "</div>";

// Wyświetl wyniki
if ($ilosc > 0) {
    echo "<table>";
    echo "<tr><th>ID</th><th>Imię</th><th>Nazwisko</th><th>Klasa</th><th>Email</th></tr>";

    while ($wiersz = mysqli_fetch_assoc($wynik)) {
        echo "<tr>";
        echo "<td>" . $wiersz['id'] . "</td>";
        echo "<td><strong>" . $wiersz['imie'] . "</strong></td>";
        echo "<td>" . $wiersz['nazwisko'] . "</td>";
        echo "<td>" . $wiersz['klasa'] . "</td>";
        echo "<td>" . $wiersz['email'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "<div class='warning'>";
    echo "⚠️ <strong>Nie znaleziono uczniów o imieniu '$imie'</strong><br>";
    echo "Sprawdź czy imię jest poprawnie wpisane (wielkość liter się liczy!)";
    echo "</div>";
}

mysqli_close($conn);
?>

    <div class="back-link">
        <a href="filtruj.html">🔍 Szukaj ponownie</a>
        <a href="lista.php">📋 Zobacz wszystkich</a>
    </div>

    <div class="info">
        <h3>💡 Wskazówka:</h3>
        <p>Ten plik działa dokładnie tak samo jak <code>pokaz_klase.php</code>, ale filtruje po <strong>imieniu</strong> zamiast po klasie!</p>
        <p>Jedyna różnica: <code>WHERE imie = '$imie'</code> zamiast <code>WHERE klasa = '$klasa'</code></p>
    </div>

</div>

</body>
</html>
