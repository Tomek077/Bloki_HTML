<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista uczniów</title>
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
        h2 { color: #34495e; margin-top: 30px; }
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
            font-weight: bold;
        }
        td {
            padding: 12px 15px;
            border-bottom: 1px solid #ddd;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f0f7ff;
        }
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
            overflow-x: auto;
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
            font-size: 1.2em;
            color: #2c3e50;
            margin: 20px 0;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>📋 Lista wszystkich uczniów</h1>

    <div class="info">
        <strong>💡 Co robi ten plik?</strong><br>
        Ten plik odczytuje WSZYSTKICH uczniów z bazy danych i wyświetla ich w tabeli.
        Używamy zapytania <code>SELECT * FROM uczniowie</code>
    </div>

<?php
/*
    ===================================================
    PLIK LISTA.PHP - ODCZYTUJE I WYŚWIETLA DANE Z BAZY
    ===================================================

    KROKI:
    1. Połącz się z bazą danych
    2. Przygotuj zapytanie SELECT
    3. Wykonaj zapytanie
    4. Sprawdź ile wierszy zwróciło zapytanie
    5. Przejdź przez każdy wiersz pętlą while
    6. Wyświetl dane w tabeli HTML
    7. Zamknij połączenie

    ===================================================
*/

// ========== KROK 1: POŁĄCZENIE Z BAZĄ ==========
include("polaczenie.php");


// ========== KROK 2: PRZYGOTOWANIE ZAPYTANIA SQL ==========
// SELECT * FROM uczniowie - wybierz wszystkie kolumny ze wszystkich wierszy

$sql = "SELECT * FROM uczniowie";

echo "<div class='info'>";
echo "<strong>KROK 1:</strong> Przygotowano zapytanie SQL<br>";
echo "<div class='code-box'>$sql</div>";
echo "<strong>Wyjaśnienie:</strong><br>";
echo "<ul>";
echo "<li><code>SELECT</code> - wybierz dane</li>";
echo "<li><code>*</code> - wszystkie kolumny (id, imie, nazwisko, klasa, email)</li>";
echo "<li><code>FROM uczniowie</code> - z tabeli 'uczniowie'</li>";
echo "</ul>";
echo "</div>";


// ========== KROK 3: WYKONANIE ZAPYTANIA ==========
// mysqli_query() - wykonuje zapytanie i zwraca wynik

$wynik = mysqli_query($conn, $sql);


// ========== KROK 4: SPRAWDZENIE ILU UCZNIÓW JEST W BAZIE ==========
// mysqli_num_rows() - zlicza ile wierszy (uczniów) zwróciło zapytanie

$ilosc = mysqli_num_rows($wynik);

echo "<div class='count'>";
echo "📊 Liczba uczniów w bazie: <strong>$ilosc</strong>";
echo "</div>";

echo "<div class='info'>";
echo "<strong>KROK 2:</strong> Sprawdzono liczbę wierszy<br>";
echo "Funkcja użyta: <code>mysqli_num_rows(\$wynik)</code><br>";
echo "Zwrócono: <strong>$ilosc</strong> uczniów";
echo "</div>";


// ========== KROK 5: WYŚWIETLANIE DANYCH ==========

if ($ilosc > 0) {
    // Jest co najmniej 1 uczeń - wyświetlamy tabelę

    echo "<h2>👥 Tabela uczniów:</h2>";

    echo "<table>";
    echo "<tr>";
    echo "<th>ID</th>";
    echo "<th>Imię</th>";
    echo "<th>Nazwisko</th>";
    echo "<th>Klasa</th>";
    echo "<th>Email</th>";
    echo "</tr>";

    // ========== PĘTLA WHILE - NAJWAŻNIEJSZE! ==========
    // Przechodzi przez każdy wiersz (każdego ucznia)
    // W każdym obrocie pętli $wiersz to dane jednego ucznia

    while ($wiersz = mysqli_fetch_assoc($wynik)) {
        // mysqli_fetch_assoc() - pobiera jeden wiersz jako tablicę asocjacyjną
        // $wiersz['imie'] - pobiera wartość z kolumny 'imie'

        echo "<tr>";
        echo "<td>" . $wiersz['id'] . "</td>";
        echo "<td>" . $wiersz['imie'] . "</td>";
        echo "<td>" . $wiersz['nazwisko'] . "</td>";
        echo "<td>" . $wiersz['klasa'] . "</td>";
        echo "<td>" . $wiersz['email'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";

    echo "<div class='info'>";
    echo "<strong>KROK 3:</strong> Wyświetlono wszystkich uczniów ✅<br>";
    echo "<strong>Jak działa pętla while?</strong><br>";
    echo "<code>while (\$wiersz = mysqli_fetch_assoc(\$wynik))</code><br>";
    echo "<ul>";
    echo "<li>Pobiera kolejny wiersz z wyniku</li>";
    echo "<li>Zapisuje go w zmiennej <code>\$wiersz</code></li>";
    echo "<li>Powtarza to dla każdego ucznia</li>";
    echo "<li>Kończy gdy nie ma więcej uczniów</li>";
    echo "</ul>";
    echo "<strong>Przykład:</strong><br>";
    echo "<ul>";
    echo "<li><code>\$wiersz['id']</code> - ID ucznia</li>";
    echo "<li><code>\$wiersz['imie']</code> - Imię ucznia</li>";
    echo "<li><code>\$wiersz['nazwisko']</code> - Nazwisko ucznia</li>";
    echo "</ul>";
    echo "</div>";

} else {
    // Brak uczniów w bazie

    echo "<div class='warning'>";
    echo "⚠️ <strong>Brak uczniów w bazie danych!</strong><br>";
    echo "Dodaj pierwszego ucznia używając formularza.";
    echo "</div>";
}


// ========== KROK 6: ZAMKNIĘCIE POŁĄCZENIA ==========
mysqli_close($conn);

?>

    <!-- Przyciski nawigacji -->
    <div class="back-link">
        <a href="formularz.html">➕ Dodaj ucznia</a>
        <a href="filtruj.html">🔍 Filtruj uczniów</a>
        <a href="../index.html">🏠 Strona główna</a>
    </div>

    <!-- Dodatkowe wyjaśnienia -->
    <h2>📚 Podsumowanie - Odczyt z bazy danych</h2>

    <div class="info">
        <h3>🔍 Co właśnie się stało?</h3>
        <ol>
            <li><strong>Połączyliśmy się z bazą</strong> - <code>include("polaczenie.php")</code></li>
            <li><strong>Przygotowaliśmy zapytanie SELECT</strong> - <code>SELECT * FROM uczniowie</code></li>
            <li><strong>Wykonaliśmy zapytanie</strong> - <code>mysqli_query($conn, $sql)</code></li>
            <li><strong>Sprawdziliśmy ile jest uczniów</strong> - <code>mysqli_num_rows($wynik)</code></li>
            <li><strong>Przeszliśmy przez każdego ucznia</strong> - pętla <code>while</code></li>
            <li><strong>Wyświetliliśmy dane w tabeli</strong> - <code>echo</code></li>
        </ol>

        <h3>💡 Najważniejsze funkcje:</h3>
        <table>
            <tr>
                <th>Funkcja</th>
                <th>Co robi?</th>
            </tr>
            <tr>
                <td><code>SELECT * FROM tabela</code></td>
                <td>Wybiera wszystkie dane z tabeli</td>
            </tr>
            <tr>
                <td><code>mysqli_query($conn, $sql)</code></td>
                <td>Wykonuje zapytanie SQL</td>
            </tr>
            <tr>
                <td><code>mysqli_num_rows($wynik)</code></td>
                <td>Zlicza ile wierszy zwróciło zapytanie</td>
            </tr>
            <tr>
                <td><code>mysqli_fetch_assoc($wynik)</code></td>
                <td>Pobiera jeden wiersz jako tablicę (jeden obrót pętli)</td>
            </tr>
            <tr>
                <td><code>$wiersz['imie']</code></td>
                <td>Pobiera wartość z kolumny 'imie'</td>
            </tr>
        </table>

        <h3>⚠️ Najczęstsze błędy:</h3>
        <ul>
            <li>❌ <code>$wiersz['Imie']</code> - wielka litera! Powinno być: <code>$wiersz['imie']</code></li>
            <li>❌ Zapomnienie o pętli <code>while</code> - wyświetli się tylko pierwszy uczeń!</li>
            <li>❌ Zła nazwa tabeli: <code>SELECT * FROM uczen</code> zamiast <code>uczniowie</code></li>
            <li>❌ Nie zaimportowana baza danych w phpMyAdmin</li>
        </ul>

        <h3>🎯 Na egzaminie pamiętaj:</h3>
        <ul>
            <li>✅ Zawsze użyj pętli <code>while</code> do wyświetlania wielu wierszy</li>
            <li>✅ Sprawdź nazwy kolumn w phpMyAdmin (zakładka "Struktura")</li>
            <li>✅ Użyj <code>mysqli_num_rows()</code> żeby sprawdzić czy są jakieś dane</li>
            <li>✅ Pamiętaj o <code>include("polaczenie.php")</code> na początku!</li>
        </ul>
    </div>

</div>

</body>
</html>
