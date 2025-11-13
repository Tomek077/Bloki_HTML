<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uczniowie z wybranej klasy</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            padding: 20px;
        }
        .container {
            max-width: 1000px;
            margin: 0 auto;
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        h1 { color: #2c3e50; text-align: center; }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        th {
            background-color: #3498db;
            color: white;
            padding: 15px;
            text-align: left;
        }
        td {
            padding: 12px 15px;
            border-bottom: 1px solid #ddd;
        }
        tr:nth-child(even) { background-color: #f9f9f9; }
        tr:hover { background-color: #f0f7ff; }
        .info {
            background-color: #e3f2fd;
            border-left: 4px solid #2196F3;
            padding: 15px;
            margin: 20px 0;
        }
        .warning {
            background-color: #fff3cd;
            border-left: 4px solid #ffc107;
            padding: 15px;
            margin: 20px 0;
        }
        .code-box {
            background-color: #263238;
            color: #aed581;
            padding: 15px;
            border-radius: 5px;
            margin: 15px 0;
            font-family: 'Courier New', monospace;
        }
        .back-link {
            text-align: center;
            margin-top: 20px;
        }
        .back-link a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #3498db;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin: 5px;
        }
        .count {
            text-align: center;
            font-size: 1.3em;
            color: #2c3e50;
            margin: 20px 0;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="container">

<?php
/*
    ===================================================
    FILTROWANIE PO KLASIE - WHERE
    ===================================================

    Ten plik pokazuje uczniów z WYBRANEJ klasy (nie wszystkich!).
    Używamy WHERE w zapytaniu SQL.

    KROKI:
    1. Połącz się z bazą
    2. Pobierz wybraną klasę z formularza
    3. Użyj WHERE w zapytaniu SQL
    4. Wyświetl tylko uczniów z tej klasy

    ===================================================
*/

// ========== KROK 1: POŁĄCZENIE ==========
include("polaczenie.php");


// ========== KROK 2: POBIERZ WYBRANĄ KLASĘ ==========
// $_POST['wybrana_klasa'] - nazwa MUSI być taka sama jak name="wybrana_klasa" w formularzu!

$klasa = $_POST['wybrana_klasa'];

echo "<h1>📚 Uczniowie z klasy: <span style='color: #3498db;'>$klasa</span></h1>";

echo "<div class='info'>";
echo "<strong>KROK 1:</strong> Pobrano wybraną klasę z formularza<br>";
echo "Użyto: <code>\$klasa = \$_POST['wybrana_klasa'];</code><br>";
echo "Wartość: <strong>$klasa</strong>";
echo "</div>";


// ========== KROK 3: ZAPYTANIE SQL Z WHERE ==========
// WHERE klasa = '$klasa' - pokaż tylko uczniów gdzie klasa = wybrana wartość

$sql = "SELECT * FROM uczniowie WHERE klasa = '$klasa'";

echo "<div class='info'>";
echo "<strong>KROK 2:</strong> Przygotowano zapytanie SQL z WHERE<br>";
echo "<div class='code-box'>$sql</div>";
echo "<strong>Wyjaśnienie:</strong><br>";
echo "<ul>";
echo "<li><code>SELECT *</code> - wybierz wszystkie kolumny</li>";
echo "<li><code>FROM uczniowie</code> - z tabeli uczniowie</li>";
echo "<li><code>WHERE klasa = '$klasa'</code> - tylko tam gdzie klasa = $klasa</li>";
echo "</ul>";
echo "✨ <strong>WHERE to filtr!</strong> Dzięki niemu nie pobieramy wszystkich uczniów, tylko z klasy $klasa!";
echo "</div>";


// ========== KROK 4: WYKONAJ ZAPYTANIE ==========
$wynik = mysqli_query($conn, $sql);


// ========== KROK 5: SPRAWDŹ ILU UCZNIÓW ZNALEZIONO ==========
$ilosc = mysqli_num_rows($wynik);

echo "<div class='count'>";
echo "👥 Znaleziono uczniów: <strong>$ilosc</strong>";
echo "</div>";


// ========== KROK 6: WYŚWIETL UCZNIÓW ==========

if ($ilosc > 0) {
    // Są uczniowie w tej klasie - pokaż tabelę

    echo "<table>";
    echo "<tr>";
    echo "<th>ID</th>";
    echo "<th>Imię</th>";
    echo "<th>Nazwisko</th>";
    echo "<th>Klasa</th>";
    echo "<th>Email</th>";
    echo "</tr>";

    // Pętla while - przechodzi przez każdego ucznia
    while ($wiersz = mysqli_fetch_assoc($wynik)) {
        echo "<tr>";
        echo "<td>" . $wiersz['id'] . "</td>";
        echo "<td>" . $wiersz['imie'] . "</td>";
        echo "<td>" . $wiersz['nazwisko'] . "</td>";
        echo "<td><strong>" . $wiersz['klasa'] . "</strong></td>";
        echo "<td>" . $wiersz['email'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";

    echo "<div class='info'>";
    echo "✅ <strong>Sukces!</strong> Wyświetlono $ilosc uczniów z klasy <strong>$klasa</strong>.";
    echo "</div>";

} else {
    // Brak uczniów w tej klasie

    echo "<div class='warning'>";
    echo "⚠️ <strong>Nie znaleziono uczniów w klasie $klasa</strong><br>";
    echo "Możliwe przyczyny:";
    echo "<ul>";
    echo "<li>W bazie nie ma uczniów z tej klasy</li>";
    echo "<li>Klasa została źle wpisana (wielkość liter się liczy!)</li>";
    echo "<li>Nie zaimportowano danych do bazy</li>";
    echo "</ul>";
    echo "</div>";
}


// ========== KROK 7: ZAMKNIJ POŁĄCZENIE ==========
mysqli_close($conn);

?>

    <div class="back-link">
        <a href="filtruj.html">🔍 Filtruj ponownie</a>
        <a href="lista.php">📋 Zobacz wszystkich</a>
        <a href="../index.html">🏠 Strona główna</a>
    </div>

    <!-- Podsumowanie -->
    <div class="info" style="margin-top: 30px;">
        <h2 style="color: #2196F3; margin-top: 0;">📚 Podsumowanie - Filtrowanie WHERE</h2>

        <h3>🎯 Co właśnie zrobiłeś?</h3>
        <ol>
            <li>Użytkownik wybrał klasę w formularzu (np. "3A")</li>
            <li>Dane zostały wysłane do tego pliku PHP</li>
            <li>PHP złapał wybraną klasę: <code>$_POST['wybrana_klasa']</code></li>
            <li>PHP użył WHERE w zapytaniu: <code>WHERE klasa = '3A'</code></li>
            <li>Baza zwróciła tylko uczniów z klasy 3A (nie wszystkich!)</li>
            <li>PHP wyświetlił ich w tabeli</li>
        </ol>

        <h3>🔑 Najważniejsze rzeczy:</h3>
        <ul>
            <li><strong>WHERE</strong> = filtr (wybiera tylko niektóre wiersze)</li>
            <li><code>$_POST['wybrana_klasa']</code> musi być taki sam jak <code>name="wybrana_klasa"</code></li>
            <li>Wartości tekstowe w WHERE zawsze w apostrofach: <code>'3A'</code></li>
            <li>Bez WHERE wyświetliłyby się WSZYSTKIE wiersze</li>
        </ul>

        <h3>📝 Inne przykłady WHERE:</h3>
        <ul>
            <li><code>WHERE imie = 'Jan'</code> - tylko uczniowie o imieniu Jan</li>
            <li><code>WHERE id = 5</code> - tylko uczeń o ID = 5</li>
            <li><code>WHERE klasa = '3A' AND nazwisko = 'Kowalski'</code> - oba warunki muszą być spełnione</li>
            <li><code>WHERE klasa = '3A' OR klasa = '3B'</code> - jeden z warunków</li>
            <li><code>WHERE imie LIKE 'A%'</code> - imiona zaczynające się na A</li>
        </ul>

        <h3>⚠️ Najczęstsze błędy:</h3>
        <ul>
            <li>❌ <code>WHERE klasa = $klasa</code> - brak apostrofów!</li>
            <li>✅ <code>WHERE klasa = '$klasa'</code> - poprawnie!</li>
            <li>❌ Różne nazwy: <code>$_POST['klasa']</code> ale formularz ma <code>name="wybrana_klasa"</code></li>
            <li>❌ Wielkie/małe litery: <code>'3a'</code> ≠ <code>'3A'</code></li>
        </ul>

        <h3>💡 Wskazówka na egzamin:</h3>
        <p>
            Filtrowanie to BARDZO częste zadanie na INF.03!<br>
            Schemat zawsze ten sam:
        </p>
        <ol>
            <li>Formularz z listą rozwijaną lub polem tekstowym</li>
            <li><code>$zmienna = $_POST['nazwa'];</code></li>
            <li><code>WHERE kolumna = '$zmienna'</code></li>
            <li>Pętla <code>while</code> do wyświetlenia</li>
        </ol>
    </div>

</div>

</body>
</html>
