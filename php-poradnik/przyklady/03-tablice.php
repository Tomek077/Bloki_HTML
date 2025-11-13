<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Przykład 3: Tablice indeksowane</title>
    <link rel="stylesheet" href="../css/prosty-styl.css">
</head>
<body>
    <div class="container">
        <h1>Przykład 3: Tablice indeksowane (0, 1, 2...)</h1>

        <div class="nawigacja">
            <a href="../../index.html">← Strona Główna</a>
            <a href="../nawigacja.php">Wszystkie Przykłady</a>
        </div>

        <h2>Demonstracja tablic indeksowanych:</h2>

        <div class="wynik">
            <?php
            // TABLICA to zmienna, która może przechowywać WIELE wartości
            // Indeksy to numery pozycji: 0, 1, 2, 3, 4...
            // WAŻNE: Numeracja zaczyna się od 0, nie od 1!

            // Sposób 1: Tworzenie tablicy z wartościami
            $owoce = array("Jabłko", "Banan", "Pomarańcza", "Gruszka");

            echo "<h3>Lista owoców:</h3>";
            echo "<p>Owoc na pozycji 0: " . $owoce[0] . "</p>";
            echo "<p>Owoc na pozycji 1: " . $owoce[1] . "</p>";
            echo "<p>Owoc na pozycji 2: " . $owoce[2] . "</p>";
            echo "<p>Owoc na pozycji 3: " . $owoce[3] . "</p>";

            // Sposób 2: Krótszy zapis tablicy (od PHP 5.4)
            $oceny = [5, 4, 3, 5, 4];

            echo "<h3>Twoje oceny:</h3>";
            echo "<p>Ocena 1 (indeks 0): " . $oceny[0] . "</p>";
            echo "<p>Ocena 2 (indeks 1): " . $oceny[1] . "</p>";
            echo "<p>Ocena 3 (indeks 2): " . $oceny[2] . "</p>";

            // Ile elementów ma tablica?
            $ile_owocow = count($owoce);
            $ile_ocen = count($oceny);

            echo "<h3>Informacje o tablicach:</h3>";
            echo "<p>Liczba owoców w tablicy: " . $ile_owocow . "</p>";
            echo "<p>Liczba ocen w tablicy: " . $ile_ocen . "</p>";

            // Dodawanie elementu do tablicy
            $kolory = ["Czerwony", "Niebieski"];
            echo "<h3>Kolory przed dodaniem:</h3>";
            echo "<p>Indeks 0: " . $kolory[0] . "</p>";
            echo "<p>Indeks 1: " . $kolory[1] . "</p>";

            // Dodajemy nowy kolor
            $kolory[2] = "Zielony";
            echo "<h3>Kolory po dodaniu:</h3>";
            echo "<p>Indeks 0: " . $kolory[0] . "</p>";
            echo "<p>Indeks 1: " . $kolory[1] . "</p>";
            echo "<p>Indeks 2: " . $kolory[2] . " (nowo dodany)</p>";

            // Zmiana wartości w tablicy
            $liczby = [10, 20, 30];
            echo "<h3>Zmiana wartości:</h3>";
            echo "<p>Przed zmianą - liczby[1] = " . $liczby[1] . "</p>";
            $liczby[1] = 99;
            echo "<p>Po zmianie - liczby[1] = " . $liczby[1] . "</p>";
            ?>
        </div>

        <!-- Przycisk do pokazania kodu -->
        <button class="pokaz-kod-btn" onclick="toggleCode()">📄 Pokaż kod z wyjaśnieniami</button>

        <!-- Kontener z kodem źródłowym -->
        <div id="kod" class="kod-kontener">
            <h3 style="color: #ecf0f1; margin-bottom: 15px;">Kod źródłowy z komentarzami:</h3>
            <pre>
<span class="komentarz">&lt;?php</span>
<span class="komentarz">// ==========================================</span>
<span class="komentarz">// CZYM JEST TABLICA?</span>
<span class="komentarz">// ==========================================</span>
<span class="komentarz">// Zwykła zmienna przechowuje JEDNĄ wartość:</span>
<span class="komentarz">//   $owoc = "Jabłko";  // tylko jedno jabłko</span>
<span class="komentarz">//</span>
<span class="komentarz">// TABLICA przechowuje WIELE wartości:</span>
<span class="komentarz">//   $owoce = ["Jabłko", "Banan", "Gruszka"];  // wiele owoców!</span>
<span class="komentarz">//</span>
<span class="komentarz">// WAŻNE: Numeracja indeksów zaczyna się od 0!</span>
<span class="komentarz">//   Indeks 0 = pierwszy element</span>
<span class="komentarz">//   Indeks 1 = drugi element</span>
<span class="komentarz">//   Indeks 2 = trzeci element</span>
<span class="komentarz">//   itd...</span>

<span class="komentarz">// ==========================================</span>
<span class="komentarz">// SPOSÓB 1: Tworzenie tablicy funkcją array()</span>
<span class="komentarz">// ==========================================</span>
$owoce = array("Jabłko", "Banan", "Pomarańcza", "Gruszka");
<span class="komentarz">// $owoce to tablica z 4 elementami</span>
<span class="komentarz">// Indeksy: 0, 1, 2, 3</span>

<span class="komentarz">// Odczytywanie elementów tablicy:</span>
echo $owoce[0];  <span class="komentarz">// Wyświetli: Jabłko (pierwszy element, indeks 0)</span>
echo $owoce[1];  <span class="komentarz">// Wyświetli: Banan (drugi element, indeks 1)</span>
echo $owoce[2];  <span class="komentarz">// Wyświetli: Pomarańcza (trzeci element, indeks 2)</span>
echo $owoce[3];  <span class="komentarz">// Wyświetli: Gruszka (czwarty element, indeks 3)</span>

<span class="komentarz">// UWAGA: $owoce[0] oznacza:</span>
<span class="komentarz">// - weź tablicę $owoce</span>
<span class="komentarz">// - znajdź element o indeksie 0</span>
<span class="komentarz">// - wyświetl jego wartość</span>

<span class="komentarz">// ==========================================</span>
<span class="komentarz">// SPOSÓB 2: Krótszy zapis tablicy []</span>
<span class="komentarz">// ==========================================</span>
$oceny = [5, 4, 3, 5, 4];
<span class="komentarz">// To samo co: $oceny = array(5, 4, 3, 5, 4);</span>
<span class="komentarz">// Ale krótsze i łatwiejsze!</span>

echo $oceny[0];  <span class="komentarz">// Wyświetli: 5 (indeks 0)</span>
echo $oceny[1];  <span class="komentarz">// Wyświetli: 4 (indeks 1)</span>
echo $oceny[2];  <span class="komentarz">// Wyświetli: 3 (indeks 2)</span>

<span class="komentarz">// ==========================================</span>
<span class="komentarz">// FUNKCJA count() - ile elementów ma tablica?</span>
<span class="komentarz">// ==========================================</span>
$ile_owocow = count($owoce);
<span class="komentarz">// count($owoce) policzy elementy w tablicy</span>
<span class="komentarz">// $owoce ma 4 elementy, więc $ile_owocow = 4</span>

$ile_ocen = count($oceny);
<span class="komentarz">// $oceny ma 5 elementów, więc $ile_ocen = 5</span>

<span class="komentarz">// ==========================================</span>
<span class="komentarz">// DODAWANIE ELEMENTU DO TABLICY</span>
<span class="komentarz">// ==========================================</span>
$kolory = ["Czerwony", "Niebieski"];
<span class="komentarz">// Teraz mamy:</span>
<span class="komentarz">// indeks 0: Czerwony</span>
<span class="komentarz">// indeks 1: Niebieski</span>

$kolory[2] = "Zielony";
<span class="komentarz">// Dodajemy element na pozycji 2</span>
<span class="komentarz">// Teraz mamy:</span>
<span class="komentarz">// indeks 0: Czerwony</span>
<span class="komentarz">// indeks 1: Niebieski</span>
<span class="komentarz">// indeks 2: Zielony (nowy!)</span>

<span class="komentarz">// ==========================================</span>
<span class="komentarz">// ZMIANA WARTOŚCI W TABLICY</span>
<span class="komentarz">// ==========================================</span>
$liczby = [10, 20, 30];
<span class="komentarz">// Teraz: $liczby[1] = 20</span>

$liczby[1] = 99;
<span class="komentarz">// Zamieniamy wartość na indeksie 1</span>
<span class="komentarz">// Było: 20, Teraz: 99</span>

<span class="komentarz">?&gt;</span>

<span class="komentarz">// ==========================================</span>
<span class="komentarz">// PODSUMOWANIE:</span>
<span class="komentarz">// ==========================================</span>
<span class="komentarz">// 1. Tablica = zmienna przechowująca wiele wartości</span>
<span class="komentarz">// 2. Indeksy numerowane od 0: 0, 1, 2, 3...</span>
<span class="komentarz">// 3. Tworzenie: array(...) lub [...]</span>
<span class="komentarz">// 4. Odczyt: $tablica[0], $tablica[1], etc.</span>
<span class="komentarz">// 5. Dodawanie: $tablica[2] = "nowa wartość";</span>
<span class="komentarz">// 6. Zmiana: $tablica[1] = "zmieniona wartość";</span>
<span class="komentarz">// 7. Liczenie: count($tablica)</span>
<span class="komentarz">//</span>
<span class="komentarz">// DLACZEGO TABLICE INDEKSOWANE?</span>
<span class="komentarz">// - Proste do zrozumienia (0, 1, 2...)</span>
<span class="komentarz">// - Nie pomylisz się w nazwie (jak w tablicach asocjacyjnych)</span>
<span class="komentarz">// - Idealne dla początkujących!</span>
</pre>
        </div>

        <div style="margin-top: 30px; padding: 15px; background-color: #fff3cd; border-left: 4px solid #ffc107;">
            <strong>💡 Zadanie do wypróbowania:</strong><br>
            Spróbuj utworzyć tablicę ze swoimi ulubionymi kolorami lub nazwami ulubionych gier. Wyświetl elementy używając indeksów 0, 1, 2...
        </div>

        <div style="margin-top: 20px; padding: 15px; background-color: #e8f5e9; border-left: 4px solid #4caf50;">
            <strong>⚠️ Pamiętaj:</strong> W tablicach indeksowanych numeracja zaczyna się od 0, nie od 1!
            To najczęstszy błąd początkujących programistów.
        </div>
    </div>

    <script>
        function toggleCode() {
            var kod = document.getElementById('kod');
            if (kod.classList.contains('widoczny')) {
                kod.classList.remove('widoczny');
                event.target.textContent = '📄 Pokaż kod z wyjaśnieniami';
            } else {
                kod.classList.add('widoczny');
                event.target.textContent = '📄 Ukryj kod';
            }
        }
    </script>
</body>
</html>
