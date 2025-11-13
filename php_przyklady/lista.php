<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista uczniów</title>
    <style>
        /* ========== PODSTAWOWE STYLE (tło strony) ========== */
        body {
            font-family: Arial, sans-serif;  /* Czcionka - prosta i czytelna */
            background-color: #f0f0f0;       /* Tło strony - jasny szary */
            padding: 20px;                    /* Odstęp od krawędzi */
        }

        /* ========== KONTENER (główne białe pudełko) ========== */
        .container {
            max-width: 1000px;                /* Maksymalna szerokość */
            margin: 0 auto;                   /* Wyśrodkowanie na stronie */
            background-color: white;          /* Białe tło */
            padding: 30px;                    /* Odstęp wewnętrzny */
            border-radius: 10px;              /* Zaokrąglone rogi */
            box-shadow: 0 2px 10px rgba(0,0,0,0.1); /* Cień (delikatny) */
        }

        /* ========== NAGŁÓWKI ========== */
        h1 {
            color: #2c3e50;        /* Ciemny niebieski */
            text-align: center;    /* Wyśrodkowany */
        }
        h2 {
            color: #34495e;        /* Trochę jaśniejszy niebieski */
            margin-top: 30px;      /* Odstęp od góry */
        }

        /* ========== TABELA ========== */
        table {
            width: 100%;                      /* Szerokość 100% kontenera */
            border-collapse: collapse;        /* Usuwa podwójne ramki */
            margin: 20px 0;                   /* Odstępy góra-dół */
        }
        th {
            background-color: #3498db;  /* Niebieski nagłówek */
            color: white;               /* Biały tekst */
            padding: 15px;              /* Odstęp wewnętrzny */
            text-align: left;           /* Tekst do lewej */
            font-weight: bold;          /* Pogrubiony */
        }
        td {
            padding: 12px 15px;              /* Odstęp wewnętrzny */
            border-bottom: 1px solid #ddd;   /* Linia na dole komórki */
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;  /* Co drugi wiersz jaśniejszy */
        }
        tr:hover {
            background-color: #e8f4f8;  /* Zmiana koloru po najechaniu myszką */
        }

        /* ========== RAMKI INFORMACYJNE ========== */
        .info {
            background-color: #e3f2fd;     /* Jasnoniebieski */
            border-left: 4px solid #2196F3; /* Lewa gruba linia - niebieski */
            padding: 15px;                  /* Odstęp wewnętrzny */
            margin: 20px 0;                 /* Odstępy góra-dół */
        }
        .warning {
            background-color: #fff3cd;     /* Jasny żółty */
            border-left: 4px solid #ffc107; /* Lewa gruba linia - żółty */
            padding: 15px;
            margin: 20px 0;
        }

        /* ========== PUDEŁKO NA KOD ========== */
        .code-box {
            background-color: #2c3e50;      /* Ciemne tło jak w edytorze */
            color: #2ecc71;                 /* Zielony tekst (jak matrix!) */
            padding: 15px;
            border-radius: 5px;             /* Zaokrąglone rogi */
            margin: 15px 0;
            font-family: 'Courier New', monospace; /* Czcionka programistyczna */
            overflow-x: auto;               /* Przewijanie jeśli za długie */
        }

        /* ========== PRZYCISKI NAWIGACJI ========== */
        .back-link {
            text-align: center;  /* Wyśrodkowanie */
            margin-top: 20px;
        }
        .back-link a {
            display: inline-block;       /* Zachowuje się jak przycisk */
            padding: 10px 20px;          /* Odstęp wewnętrzny */
            background-color: #3498db;   /* Niebieski */
            color: white;                /* Biały tekst */
            text-decoration: none;       /* Bez podkreślenia */
            border-radius: 5px;          /* Zaokrąglone rogi */
            margin: 5px;                 /* Odstęp między przyciskami */
        }
        .back-link a:hover {
            background-color: #2980b9;   /* Ciemniejszy niebieski po najechaniu */
        }

        /* ========== LICZNIK ========== */
        .count {
            text-align: center;
            font-size: 1.2em;        /* Większa czcionka */
            color: #2c3e50;
            margin: 20px 0;
            font-weight: bold;       /* Pogrubiony */
        }

        /* ========== SEKCJA Z KODEM ŹRÓDŁOWYM ========== */
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
    <h1>📋 Lista wszystkich uczniów</h1>

    <div class="info">
        <strong>💡 Co robi ten plik?</strong><br>
        Ten plik odczytuje WSZYSTKICH uczniów z bazy danych i wyświetla ich w tabeli.<br>
        Używamy <strong>tablicy indeksowanej</strong> - dostęp po numerach: 0, 1, 2, 3, 4...
    </div>

<?php
/*
    ===================================================
    PLIK LISTA.PHP - ODCZYTUJE I WYŚWIETLA DANE Z BAZY
    ===================================================

    WAŻNE: Ten plik używa TABLICY INDEKSOWANEJ!
    - mysqli_fetch_row() zwraca tablicę z numerami: [0], [1], [2], [3]...
    - NIE używamy nazw kolumn, tylko numery!

    KROKI:
    1. Połącz się z bazą danych
    2. Przygotuj zapytanie SELECT
    3. Wykonaj zapytanie
    4. Sprawdź ile wierszy zwróciło zapytanie
    5. Przejdź przez każdy wiersz pętlą while
    6. Wyświetl dane używając numerów: [0], [1], [2]...
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


// ========== KROK 5: WYŚWIETLANIE DANYCH - TABLICA INDEKSOWANA! ==========

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

    // ========== PĘTLA WHILE - TABLICA INDEKSOWANA! ==========
    // mysqli_fetch_row() - zwraca tablicę indeksowaną [0], [1], [2], [3], [4]
    // NIE używamy nazw kolumn! Używamy numerów!

    while ($wiersz = mysqli_fetch_row($wynik)) {
        // $wiersz to teraz tablica z numerami:
        // $wiersz[0] = id
        // $wiersz[1] = imie
        // $wiersz[2] = nazwisko
        // $wiersz[3] = klasa
        // $wiersz[4] = email

        echo "<tr>";
        echo "<td>" . $wiersz[0] . "</td>";  // [0] = id (pierwsza kolumna)
        echo "<td>" . $wiersz[1] . "</td>";  // [1] = imie (druga kolumna)
        echo "<td>" . $wiersz[2] . "</td>";  // [2] = nazwisko (trzecia kolumna)
        echo "<td>" . $wiersz[3] . "</td>";  // [3] = klasa (czwarta kolumna)
        echo "<td>" . $wiersz[4] . "</td>";  // [4] = email (piąta kolumna)
        echo "</tr>";
    }

    echo "</table>";

    echo "<div class='info'>";
    echo "✅ <strong>KROK 3: Wyświetlono wszystkich uczniów!</strong><br><br>";
    echo "<strong>🔑 SUPER WAŻNE - TABLICA INDEKSOWANA:</strong><br>";
    echo "<code>mysqli_fetch_row(\$wynik)</code> - zwraca tablicę z numerami!<br><br>";
    echo "<strong>Jak to działa?</strong><br>";
    echo "<ul>";
    echo "<li><code>\$wiersz[0]</code> = <strong>pierwsza kolumna</strong> = id</li>";
    echo "<li><code>\$wiersz[1]</code> = <strong>druga kolumna</strong> = imie</li>";
    echo "<li><code>\$wiersz[2]</code> = <strong>trzecia kolumna</strong> = nazwisko</li>";
    echo "<li><code>\$wiersz[3]</code> = <strong>czwarta kolumna</strong> = klasa</li>";
    echo "<li><code>\$wiersz[4]</code> = <strong>piąta kolumna</strong> = email</li>";
    echo "</ul>";
    echo "<strong>⚠️ UWAGA:</strong> Numerowanie zaczyna się od 0, nie od 1!<br>";
    echo "<strong>⚠️ KOLEJNOŚĆ:</strong> Musi być taka sama jak kolejność kolumn w bazie!";
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

    <!-- PODGLĄD KODU ŹRÓDŁOWEGO -->
    <div class="source-code">
        <h2 style="color: #2c3e50; margin-top: 0;">📄 Podgląd kodu PHP (fragment)</h2>
        <p><strong>To jest najważniejsza część kodu - skopiuj i użyj na egzaminie!</strong></p>
        <pre>
&lt;?php
<span style="color: #95a5a6;">// 1. Połącz się z bazą</span>
include("polaczenie.php");

<span style="color: #95a5a6;">// 2. Przygotuj zapytanie SQL</span>
$sql = "SELECT * FROM uczniowie";

<span style="color: #95a5a6;">// 3. Wykonaj zapytanie</span>
$wynik = mysqli_query($conn, $sql);

<span style="color: #95a5a6;">// 4. Sprawdź ile jest wierszy</span>
$ilosc = mysqli_num_rows($wynik);

<span style="color: #95a5a6;">// 5. Jeśli są jakieś dane...</span>
if ($ilosc > 0) {

    <span style="color: #95a5a6;">// 6. Rozpocznij tabelę HTML</span>
    echo "&lt;table&gt;";
    echo "&lt;tr&gt;&lt;th&gt;ID&lt;/th&gt;&lt;th&gt;Imię&lt;/th&gt;&lt;th&gt;Nazwisko&lt;/th&gt;&lt;/tr&gt;";

    <span style="color: #95a5a6;">// 7. PĘTLA - przejdź przez każdy wiersz</span>
    <span style="color: #e74c3c;">while ($wiersz = mysqli_fetch_row($wynik)) {</span>
        <span style="color: #95a5a6;">// $wiersz[0] = id, $wiersz[1] = imie, $wiersz[2] = nazwisko</span>
        echo "&lt;tr&gt;";
        echo "&lt;td&gt;" . <span style="color: #e74c3c;">$wiersz[0]</span> . "&lt;/td&gt;";  <span style="color: #95a5a6;">// [0] = pierwsza kolumna</span>
        echo "&lt;td&gt;" . <span style="color: #e74c3c;">$wiersz[1]</span> . "&lt;/td&gt;";  <span style="color: #95a5a6;">// [1] = druga kolumna</span>
        echo "&lt;td&gt;" . <span style="color: #e74c3c;">$wiersz[2]</span> . "&lt;/td&gt;";  <span style="color: #95a5a6;">// [2] = trzecia kolumna</span>
        echo "&lt;/tr&gt;";
    }

    echo "&lt;/table&gt;";
}

<span style="color: #95a5a6;">// 8. Zamknij połączenie</span>
mysqli_close($conn);
?&gt;</pre>
    </div>

    <!-- Dodatkowe wyjaśnienia -->
    <h2>📚 Podsumowanie - TABLICA INDEKSOWANA</h2>

    <div class="info">
        <h3>🔍 Dwa sposoby odczytu z bazy:</h3>

        <h4>1️⃣ TABLICA ASOCJACYJNA (po nazwach kolumn):</h4>
        <pre style="background: #f8f9fa; padding: 10px; border-left: 3px solid #3498db;">
while ($wiersz = <strong>mysqli_fetch_assoc($wynik)</strong>) {
    echo $wiersz['imie'];      // używamy NAZWY kolumny
    echo $wiersz['nazwisko'];  // używamy NAZWY kolumny
}
        </pre>

        <h4>2️⃣ TABLICA INDEKSOWANA (po numerach) - UŻYWAMY W TYM PLIKU:</h4>
        <pre style="background: #f8f9fa; padding: 10px; border-left: 3px solid #e74c3c;">
while ($wiersz = <strong>mysqli_fetch_row($wynik)</strong>) {
    echo $wiersz[1];  // używamy NUMERU (1 = imie)
    echo $wiersz[2];  // używamy NUMERU (2 = nazwisko)
}
        </pre>

        <h3>💡 Kiedy używać której?</h3>
        <ul>
            <li><strong>mysqli_fetch_assoc()</strong> - gdy chcesz używać nazw kolumn (łatwiejsze do czytania)</li>
            <li><strong>mysqli_fetch_row()</strong> - gdy chcesz używać numerów (szybsze, ale musisz znać kolejność!)</li>
        </ul>

        <h3>⚠️ SUPER WAŻNE przy tablicy indeksowanej:</h3>
        <ul>
            <li>✅ Numerowanie zaczyna się od <strong>0</strong> nie od 1!</li>
            <li>✅ Kolejność musi być taka sama jak w SELECT</li>
            <li>✅ Jeśli zmienisz SELECT, musisz zmienić numery!</li>
            <li>❌ <code>$wiersz['imie']</code> NIE ZADZIAŁA z mysqli_fetch_row()!</li>
            <li>❌ <code>$wiersz[1]</code> NIE ZADZIAŁA z mysqli_fetch_assoc()!</li>
        </ul>

        <h3>🎯 Na egzaminie:</h3>
        <p><strong>Możesz użyć którejkolwiek metody!</strong> Wybierz tę, którą lepiej rozumiesz:</p>
        <ul>
            <li>Jeśli wolisz <strong>nazwy</strong> (imie, nazwisko) → użyj <code>mysqli_fetch_assoc()</code></li>
            <li>Jeśli wolisz <strong>numery</strong> (0, 1, 2) → użyj <code>mysqli_fetch_row()</code></li>
        </ul>
    </div>

</div>

</body>
</html>
