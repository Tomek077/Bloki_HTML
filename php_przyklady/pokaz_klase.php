<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Uczniowie z wybranej klasy</title>
    <style>
        /* ========== PODSTAWOWE STYLE (tło strony) ========== */
        body {
            font-family: Arial, sans-serif;  /* Czcionka */
            background-color: #f0f0f0;       /* Tło strony */
            padding: 20px;
        }

        /* ========== KONTENER (białe pudełko) ========== */
        .container {
            max-width: 1000px;
            margin: 0 auto;                  /* Wyśrodkowanie */
            background-color: white;
            padding: 30px;
            border-radius: 10px;             /* Zaokrąglone rogi */
            box-shadow: 0 2px 10px rgba(0,0,0,0.1); /* Cień */
        }

        /* ========== NAGŁÓWKI ========== */
        h1 {
            color: #2c3e50;
            text-align: center;
        }

        /* ========== TABELA ========== */
        table {
            width: 100%;
            border-collapse: collapse;       /* Usuwa podwójne ramki */
            margin: 20px 0;
        }
        th {
            background-color: #3498db;       /* Niebieski nagłówek */
            color: white;
            padding: 15px;
            text-align: left;
        }
        td {
            padding: 12px 15px;
            border-bottom: 1px solid #ddd;   /* Linia na dole */
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;       /* Co drugi wiersz jaśniejszy */
        }
        tr:hover {
            background-color: #e8f4f8;       /* Kolor po najechaniu myszką */
        }

        /* ========== RAMKI INFORMACYJNE ========== */
        .info {
            background-color: #e3f2fd;       /* Jasny niebieski */
            border-left: 4px solid #2196F3;  /* Lewa niebieska linia */
            padding: 15px;
            margin: 20px 0;
        }
        .warning {
            background-color: #fff3cd;       /* Jasny żółty */
            border-left: 4px solid #ffc107;  /* Lewa żółta linia */
            padding: 15px;
            margin: 20px 0;
        }

        /* ========== PUDEŁKO NA KOD ========== */
        .code-box {
            background-color: #2c3e50;       /* Ciemne tło */
            color: #2ecc71;                  /* Zielony tekst */
            padding: 15px;
            border-radius: 5px;
            margin: 15px 0;
            font-family: 'Courier New', monospace;
            overflow-x: auto;
        }

        /* ========== PRZYCISKI ========== */
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
        .back-link a:hover {
            background-color: #2980b9;       /* Ciemniejszy po najechaniu */
        }

        /* ========== LICZNIK ========== */
        .count {
            text-align: center;
            font-size: 1.3em;
            color: #2c3e50;
            margin: 20px 0;
            font-weight: bold;
        }

        /* ========== SEKCJA Z KODEM ========== */
        .source-code {
            background-color: #f8f9fa;
            border: 2px solid #dee2e6;
            padding: 20px;
            margin: 30px 0;
            border-radius: 5px;
        }
        .source-code pre {
            background-color: #2c3e50;
            color: #2ecc71;
            padding: 15px;
            border-radius: 5px;
            overflow-x: auto;
            font-size: 14px;
        }
    </style>
</head>
<body>

<div class="container">

<?php
/*
    ===================================================
    FILTROWANIE PO KLASIE - WHERE + TABLICA INDEKSOWANA
    ===================================================

    Ten plik pokazuje uczniów z WYBRANEJ klasy (nie wszystkich!).
    Używamy:
    - WHERE w zapytaniu SQL (filtrowanie)
    - mysqli_fetch_row() (tablica indeksowana)

    KROKI:
    1. Połącz się z bazą
    2. Pobierz wybraną klasę z formularza
    3. Użyj WHERE w zapytaniu SQL
    4. Wyświetl tylko uczniów z tej klasy używając [0], [1], [2]...

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
echo "<li><code><strong>WHERE klasa = '$klasa'</strong></code> - tylko tam gdzie klasa = $klasa</li>";
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


// ========== KROK 6: WYŚWIETL UCZNIÓW - TABLICA INDEKSOWANA! ==========

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

    // ========== PĘTLA WHILE - TABLICA INDEKSOWANA ==========
    // mysqli_fetch_row() - zwraca tablicę z numerami!

    while ($wiersz = mysqli_fetch_row($wynik)) {
        // $wiersz[0] = id, $wiersz[1] = imie, $wiersz[2] = nazwisko, itd.

        echo "<tr>";
        echo "<td>" . $wiersz[0] . "</td>";  // [0] = id
        echo "<td>" . $wiersz[1] . "</td>";  // [1] = imie
        echo "<td>" . $wiersz[2] . "</td>";  // [2] = nazwisko
        echo "<td><strong>" . $wiersz[3] . "</strong></td>";  // [3] = klasa (pogrubiona)
        echo "<td>" . $wiersz[4] . "</td>";  // [4] = email
        echo "</tr>";
    }

    echo "</table>";

    echo "<div class='info'>";
    echo "✅ <strong>Sukces!</strong> Wyświetlono $ilosc uczniów z klasy <strong>$klasa</strong>.<br><br>";
    echo "<strong>🔑 Użyto:</strong><br>";
    echo "<ul>";
    echo "<li><code>WHERE</code> - do filtrowania (tylko klasa $klasa)</li>";
    echo "<li><code>mysqli_fetch_row()</code> - tablica indeksowana [0], [1], [2]...</li>";
    echo "</ul>";
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

    <!-- PODGLĄD KODU ŹRÓDŁOWEGO -->
    <div class="source-code">
        <h2 style="color: #2c3e50; margin-top: 0;">📄 Podgląd kodu PHP - skopiuj i użyj!</h2>
        <pre>
&lt;?php
<span style="color: #95a5a6;">// 1. Połącz się z bazą</span>
include("polaczenie.php");

<span style="color: #95a5a6;">// 2. Pobierz wybraną klasę z formularza</span>
<span style="color: #e74c3c;">$klasa = $_POST['wybrana_klasa'];</span>

<span style="color: #95a5a6;">// 3. Przygotuj zapytanie SQL z WHERE</span>
<span style="color: #e74c3c;">$sql = "SELECT * FROM uczniowie WHERE klasa = '$klasa'";</span>

<span style="color: #95a5a6;">// 4. Wykonaj zapytanie</span>
$wynik = mysqli_query($conn, $sql);

<span style="color: #95a5a6;">// 5. Sprawdź ile uczniów znaleziono</span>
$ilosc = mysqli_num_rows($wynik);

<span style="color: #95a5a6;">// 6. Jeśli są uczniowie...</span>
if ($ilosc > 0) {

    echo "&lt;table&gt;";
    echo "&lt;tr&gt;&lt;th&gt;Imię&lt;/th&gt;&lt;th&gt;Nazwisko&lt;/th&gt;&lt;th&gt;Klasa&lt;/th&gt;&lt;/tr&gt;";

    <span style="color: #95a5a6;">// 7. PĘTLA - tablica indeksowana!</span>
    <span style="color: #e74c3c;">while ($wiersz = mysqli_fetch_row($wynik)) {</span>
        echo "&lt;tr&gt;";
        echo "&lt;td&gt;" . <span style="color: #e74c3c;">$wiersz[1]</span> . "&lt;/td&gt;";  <span style="color: #95a5a6;">// [1] = imie</span>
        echo "&lt;td&gt;" . <span style="color: #e74c3c;">$wiersz[2]</span> . "&lt;/td&gt;";  <span style="color: #95a5a6;">// [2] = nazwisko</span>
        echo "&lt;td&gt;" . <span style="color: #e74c3c;">$wiersz[3]</span> . "&lt;/td&gt;";  <span style="color: #95a5a6;">// [3] = klasa</span>
        echo "&lt;/tr&gt;";
    }

    echo "&lt;/table&gt;";
}

<span style="color: #95a5a6;">// 8. Zamknij połączenie</span>
mysqli_close($conn);
?&gt;</pre>
    </div>

    <!-- Podsumowanie -->
    <div class="info" style="margin-top: 30px;">
        <h2 style="color: #2196F3; margin-top: 0;">📚 Podsumowanie - Filtrowanie WHERE + Tablica indeksowana</h2>

        <h3>🎯 Co właśnie zrobiłeś?</h3>
        <ol>
            <li>Użytkownik wybrał klasę w formularzu (np. "3A")</li>
            <li>PHP złapał wybraną klasę: <code>$_POST['wybrana_klasa']</code></li>
            <li>PHP użył WHERE w zapytaniu: <code>WHERE klasa = '3A'</code></li>
            <li>Baza zwróciła tylko uczniów z klasy 3A</li>
            <li>PHP wyświetlił ich używając <code>mysqli_fetch_row()</code> i numerów [0], [1], [2]</li>
        </ol>

        <h3>🔑 Dwie ważne rzeczy w tym pliku:</h3>

        <h4>1️⃣ WHERE - filtrowanie:</h4>
        <pre style="background: #f8f9fa; padding: 10px; border-left: 3px solid #3498db;">
<strong>WHERE klasa = '$klasa'</strong>

- WHERE = filtr (wybiera tylko niektóre wiersze)
- Wartości tekstowe ZAWSZE w apostrofach: '$klasa'
- Bez WHERE wyświetliłyby się WSZYSTKIE wiersze
        </pre>

        <h4>2️⃣ Tablica indeksowana - [0], [1], [2]:</h4>
        <pre style="background: #f8f9fa; padding: 10px; border-left: 3px solid #e74c3c;">
<strong>mysqli_fetch_row($wynik)</strong>

- Zwraca tablicę z numerami: [0], [1], [2], [3], [4]
- [0] = pierwsza kolumna (id)
- [1] = druga kolumna (imie)
- [2] = trzecia kolumna (nazwisko)
- itd.
        </pre>

        <h3>⚠️ SUPER WAŻNE:</h3>
        <ul>
            <li>✅ <code>$_POST['wybrana_klasa']</code> musi być takie samo jak <code>name="wybrana_klasa"</code> w formularzu!</li>
            <li>✅ Wartości tekstowe w WHERE zawsze w apostrofach: <code>'3A'</code></li>
            <li>✅ Numerowanie tablicy od 0, nie od 1!</li>
            <li>❌ <code>$wiersz['imie']</code> NIE ZADZIAŁA z mysqli_fetch_row()!</li>
        </ul>

        <h3>💡 Wskazówka na egzamin:</h3>
        <p>
            Filtrowanie WHERE + tablica indeksowana to częste zadanie na INF.03!<br>
            Schemat:
        </p>
        <ol>
            <li>Formularz z listą lub polem tekstowym</li>
            <li><code>$zmienna = $_POST['nazwa'];</code></li>
            <li><code>WHERE kolumna = '$zmienna'</code></li>
            <li><code>mysqli_fetch_row()</code> i <code>$wiersz[0], $wiersz[1]...</code></li>
        </ol>
    </div>

</div>

</body>
</html>
