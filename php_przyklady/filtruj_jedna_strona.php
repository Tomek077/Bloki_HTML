<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Filtrowanie na jednej stronie</title>
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
        h2 {
            color: #34495e;
            margin-top: 30px;
        }

        /* ========== FORMULARZ ========== */
        .form-box {
            background-color: #e8f5e9;       /* Jasny zielony */
            border: 2px solid #4caf50;       /* Zielona ramka */
            padding: 20px;
            margin: 20px 0;
            border-radius: 5px;
        }
        label {
            display: block;
            margin-top: 10px;
            margin-bottom: 5px;
            font-weight: bold;
            color: #2e7d32;
        }
        select {
            width: 100%;
            padding: 10px;
            border: 2px solid #4caf50;
            border-radius: 5px;
            font-size: 16px;
            background-color: white;
        }
        button {
            width: 100%;
            padding: 15px;
            background-color: #4caf50;       /* Zielony przycisk */
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
            margin-top: 15px;
        }
        button:hover {
            background-color: #388e3c;       /* Ciemniejszy zielony */
        }

        /* ========== TABELA ========== */
        table {
            width: 100%;
            border-collapse: collapse;       /* Usuwa podwójne ramki */
            margin: 20px 0;
        }
        th {
            background-color: #4caf50;       /* Zielony nagłówek */
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
            background-color: #e8f5e9;       /* Zielony po najechaniu */
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
            text-align: center;
            font-size: 1.2em;
        }
        .success {
            background-color: #e8f5e9;       /* Jasny zielony */
            border-left: 4px solid #4caf50;  /* Lewa zielona linia */
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

        /* ========== PRZYCISKI NAWIGACJI ========== */
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
            line-height: 1.5;
        }

        .count {
            text-align: center;
            font-size: 1.2em;
            color: #2e7d32;
            margin: 15px 0;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>🔍 Filtrowanie na jednej stronie</h1>

    <div class="info">
        <strong>💡 Co to jest filtrowanie na jednej stronie?</strong><br>
        To znaczy że <strong>formularz i wyniki są w tym samym pliku PHP!</strong><br>
        Wybierasz klasę → klikasz "Szukaj" → wyniki pojawiają się poniżej na tej samej stronie.
    </div>

    <!-- ========== FORMULARZ - GÓRNA CZĘŚĆ STRONY ========== -->
    <div class="form-box">
        <h2 style="margin-top: 0; color: #2e7d32;">📋 Wybierz klasę do wyświetlenia:</h2>

        <form method="POST" action="">
            <!-- action="" = wyślij do tego samego pliku! -->

            <label for="klasa">Klasa:</label>
            <select id="klasa" name="klasa" required>
                <option value="">-- Wybierz klasę --</option>
                <option value="3A">3A</option>
                <option value="3B">3B</option>
                <option value="3C">3C</option>
            </select>

            <button type="submit" name="szukaj">🔍 Szukaj uczniów</button>
        </form>

        <div class="info" style="margin-top: 15px; background-color: #fff9e6;">
            <strong>⚠️ WAŻNE:</strong> <code>action=""</code> oznacza "wyślij do tego samego pliku"!<br>
            Dzięki temu formularz i wyniki są na jednej stronie.
        </div>
    </div>

<?php
/*
    ===================================================
    FILTROWANIE NA JEDNEJ STRONIE - SUPER WAŻNE!
    ===================================================

    Ten plik pokazuje jak zrobić filtrowanie "wszystko w jednym":
    1. Formularz na górze strony
    2. Sprawdzenie czy formularz został wysłany
    3. Wyświetlenie wyników poniżej formularza
    4. Jeśli brak danych - komunikat "brak danych"

    To BARDZO CZĘSTE zadanie na egzaminie INF.03!

    ===================================================
*/

// ========== KROK 1: SPRAWDŹ CZY FORMULARZ ZOSTAŁ WYSŁANY ==========
// isset() sprawdza czy zmienna istnieje
// Jeśli użytkownik kliknął "Szukaj", to $_POST['szukaj'] będzie istnieć!

if (isset($_POST['szukaj'])) {
    // ===== FORMULARZ ZOSTAŁ WYSŁANY - POKAZUJEMY WYNIKI! =====

    echo "<div class='success'>";
    echo "✅ <strong>Formularz został wysłany! Szukam danych...</strong>";
    echo "</div>";

    // Połącz się z bazą
    include("polaczenie.php");

    // Pobierz wybraną klasę z formularza
    $klasa = $_POST['klasa'];

    echo "<h2>📊 Wyniki dla klasy: <span style='color: #4caf50;'>$klasa</span></h2>";

    // Przygotuj zapytanie SQL z WHERE
    $sql = "SELECT * FROM uczniowie WHERE klasa = '$klasa'";

    echo "<div class='info'>";
    echo "<strong>Zapytanie SQL:</strong>";
    echo "<div class='code-box'>$sql</div>";
    echo "</div>";

    // Wykonaj zapytanie
    $wynik = mysqli_query($conn, $sql);

    // Sprawdź ile uczniów znaleziono
    $ilosc = mysqli_num_rows($wynik);

    echo "<div class='count'>";
    echo "👥 Znaleziono: <strong>$ilosc</strong> uczniów";
    echo "</div>";

    // ========== WYŚWIETLANIE WYNIKÓW ==========

    if ($ilosc > 0) {
        // ===== SĄ UCZNIOWIE - POKAŻ TABELĘ =====

        echo "<table>";
        echo "<tr>";
        echo "<th>ID</th>";
        echo "<th>Imię</th>";
        echo "<th>Nazwisko</th>";
        echo "<th>Klasa</th>";
        echo "<th>Email</th>";
        echo "</tr>";

        // Pętla while - tablica indeksowana
        while ($wiersz = mysqli_fetch_row($wynik)) {
            echo "<tr>";
            echo "<td>" . $wiersz[0] . "</td>";  // [0] = id
            echo "<td>" . $wiersz[1] . "</td>";  // [1] = imie
            echo "<td>" . $wiersz[2] . "</td>";  // [2] = nazwisko
            echo "<td><strong>" . $wiersz[3] . "</strong></td>";  // [3] = klasa
            echo "<td>" . $wiersz[4] . "</td>";  // [4] = email
            echo "</tr>";
        }

        echo "</table>";

    } else {
        // ===== BRAK UCZNIÓW - POKAŻ KOMUNIKAT =====

        echo "<div class='warning'>";
        echo "⚠️ <strong>Brak danych</strong><br>";
        echo "Nie znaleziono uczniów w klasie <strong>$klasa</strong>";
        echo "</div>";
    }

    // Zamknij połączenie
    mysqli_close($conn);

} else {
    // ===== FORMULARZ NIE ZOSTAŁ WYSŁANY - POKAŻ KOMUNIKAT =====

    echo "<div class='info'>";
    echo "👆 <strong>Wybierz klasę z listy powyżej i kliknij 'Szukaj'</strong><br>";
    echo "Wyniki pojawią się tutaj, na tej samej stronie.";
    echo "</div>";
}

?>

    <div class="back-link">
        <a href="filtruj.html">← Wróć do wyboru filtrów</a>
        <a href="lista.php">📋 Zobacz wszystkich</a>
        <a href="../index.html">🏠 Strona główna</a>
    </div>

    <!-- PODGLĄD KODU ŹRÓDŁOWEGO -->
    <div class="source-code">
        <h2 style="color: #2c3e50; margin-top: 0;">📄 Podgląd kodu PHP - TO JEST NAJWAŻNIEJSZE!</h2>
        <p><strong>Skopiuj ten kod i użyj na egzaminie!</strong></p>
        <pre>
&lt;!-- <span style="color: #95a5a6;">FORMULARZ - action="" = wyślij do tego samego pliku</span> --&gt;
&lt;form method="POST" action=""&gt;
    &lt;select name="klasa"&gt;
        &lt;option value="3A"&gt;3A&lt;/option&gt;
        &lt;option value="3B"&gt;3B&lt;/option&gt;
    &lt;/select&gt;
    &lt;button type="submit" name="szukaj"&gt;Szukaj&lt;/button&gt;
&lt;/form&gt;

&lt;?php
<span style="color: #95a5a6;">// KROK 1: Sprawdź czy formularz został wysłany</span>
<span style="color: #e74c3c;">if (isset($_POST['szukaj'])) {</span>

    <span style="color: #95a5a6;">// KROK 2: Połącz z bazą</span>
    include("polaczenie.php");

    <span style="color: #95a5a6;">// KROK 3: Pobierz wybraną klasę</span>
    <span style="color: #e74c3c;">$klasa = $_POST['klasa'];</span>

    <span style="color: #95a5a6;">// KROK 4: Zapytanie SQL z WHERE</span>
    $sql = "SELECT * FROM uczniowie WHERE klasa = '$klasa'";
    $wynik = mysqli_query($conn, $sql);
    $ilosc = mysqli_num_rows($wynik);

    <span style="color: #95a5a6;">// KROK 5: Sprawdź czy są wyniki</span>
    <span style="color: #e74c3c;">if ($ilosc > 0) {</span>
        <span style="color: #95a5a6;">// Są wyniki - pokaż tabelę</span>
        echo "&lt;table&gt;";
        while ($wiersz = mysqli_fetch_row($wynik)) {
            echo "&lt;tr&gt;";
            echo "&lt;td&gt;" . $wiersz[0] . "&lt;/td&gt;";  <span style="color: #95a5a6;">// [0] = id</span>
            echo "&lt;td&gt;" . $wiersz[1] . "&lt;/td&gt;";  <span style="color: #95a5a6;">// [1] = imie</span>
            echo "&lt;/tr&gt;";
        }
        echo "&lt;/table&gt;";
    <span style="color: #e74c3c;">} else {</span>
        <span style="color: #95a5a6;">// Brak wyników - pokaż komunikat</span>
        echo "Brak danych";
    }

    mysqli_close($conn);

<span style="color: #e74c3c;">} else {</span>
    <span style="color: #95a5a6;">// Formularz nie został wysłany - pokaż informację</span>
    echo "Wybierz klasę i kliknij Szukaj";
}
?&gt;</pre>
    </div>

    <!-- SZCZEGÓŁOWE WYJAŚNIENIE -->
    <div class="info" style="margin-top: 30px;">
        <h2 style="color: #2196F3; margin-top: 0;">📚 Jak to działa? - KROK PO KROKU</h2>

        <h3>🔑 KLUCZOWE ELEMENTY:</h3>

        <h4>1️⃣ Formularz z <code>action=""</code></h4>
        <pre style="background: #f8f9fa; padding: 10px; border-left: 3px solid #4caf50;">
&lt;form method="POST" <strong>action=""</strong>&gt;

<strong>action=""</strong> = pusty = wyślij do TEGO SAMEGO pliku!
Dzięki temu formularz i wyniki są na jednej stronie.
        </pre>

        <h4>2️⃣ Sprawdzenie czy formularz wysłano</h4>
        <pre style="background: #f8f9fa; padding: 10px; border-left: 3px solid #e74c3c;">
<strong>if (isset($_POST['szukaj'])) {</strong>
    // Formularz ZOSTAŁ wysłany - pokazuj wyniki
} else {
    // Formularz NIE ZOSTAŁ wysłany - pokaż komunikat
}

<strong>isset()</strong> = sprawdza czy zmienna istnieje
<strong>$_POST['szukaj']</strong> = istnieje tylko gdy kliknięto przycisk "Szukaj"
        </pre>

        <h4>3️⃣ Wyświetlanie wyników lub "brak danych"</h4>
        <pre style="background: #f8f9fa; padding: 10px; border-left: 3px solid #3498db;">
$ilosc = mysqli_num_rows($wynik);

<strong>if ($ilosc > 0) {</strong>
    // Są dane - pokaż tabelę
} <strong>else {</strong>
    // Brak danych - pokaż komunikat "Brak danych"
}
        </pre>

        <h3>⚠️ SUPER WAŻNE NA EGZAMINIE:</h3>
        <ul>
            <li>✅ <code>action=""</code> - formularz i wyniki w jednym pliku!</li>
            <li>✅ <code>isset($_POST['nazwa_przycisku'])</code> - sprawdza czy kliknięto przycisk</li>
            <li>✅ <code>if ($ilosc > 0)</code> - sprawdza czy są dane</li>
            <li>✅ <code>else</code> - wyświetla "brak danych" gdy nic nie znaleziono</li>
            <li>✅ Przycisk MUSI mieć <code>name="szukaj"</code> (lub inną nazwę)</li>
        </ul>

        <h3>🎯 Kiedy używać tej metody?</h3>
        <p><strong>Używaj gdy w zadaniu jest napisane:</strong></p>
        <ul>
            <li>"Wyświetl wyniki na tej samej stronie"</li>
            <li>"Stwórz stronę z formularzem i wynikami"</li>
            <li>"Po wybraniu opcji wyświetl dane poniżej"</li>
            <li>"Jeśli brak danych wyświetl komunikat"</li>
        </ul>

        <h3>💡 Schemat do zapamiętania:</h3>
        <ol style="background: #fffde7; padding: 15px; border-radius: 5px;">
            <li><strong>Formularz z action=""</strong></li>
            <li><strong>if (isset($_POST['przycisk']))</strong> - czy wysłano?</li>
            <li><strong>Pobierz dane z formularza</strong> - $_POST['pole']</li>
            <li><strong>Zapytanie SQL</strong> - SELECT ... WHERE ...</li>
            <li><strong>if ($ilosc > 0)</strong> - czy są wyniki?</li>
            <li><strong>Pętla while</strong> - wyświetl tabelę</li>
            <li><strong>else</strong> - wyświetl "brak danych"</li>
        </ol>
    </div>

</div>

</body>
</html>
