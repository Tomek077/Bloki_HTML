<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Przykład 2: Zmienne i typy danych</title>
    <link rel="stylesheet" href="../css/prosty-styl.css">
</head>
<body>
    <div class="container">
        <h1>Przykład 2: Zmienne i typy danych</h1>

        <div class="nawigacja">
            <a href="../../index.html">← Strona Główna</a>
            <a href="../nawigacja.php">Wszystkie Przykłady</a>
        </div>

        <h2>Demonstracja zmiennych:</h2>

        <div class="wynik">
            <?php
            // Zmienna to "pudełko" w którym przechowujemy dane
            // Nazwa zmiennej w PHP zaczyna się od znaku $

            // TEKST (string) - przechowuje napisy
            $imie = "Jan";
            $nazwisko = "Kowalski";
            echo "<h3>Dane osobowe:</h3>";
            echo "<p>Imię: " . $imie . "</p>";
            echo "<p>Nazwisko: " . $nazwisko . "</p>";

            // LICZBY CAŁKOWITE (integer)
            $wiek = 15;
            $klasa = 8;
            echo "<p>Wiek: " . $wiek . " lat</p>";
            echo "<p>Klasa: " . $klasa . "</p>";

            // LICZBY DZIESIĘTNE (float)
            $ocena = 4.5;
            $wzrost = 1.65;
            echo "<p>Średnia ocen: " . $ocena . "</p>";
            echo "<p>Wzrost: " . $wzrost . " m</p>";

            // WARTOŚCI LOGICZNE (boolean) - true lub false
            $czyZdal = true;
            echo "<p>Czy zdał egzamin? ";
            if ($czyZdal) {
                echo "Tak!";
            } else {
                echo "Nie";
            }
            echo "</p>";

            // OPERACJE NA ZMIENNYCH
            $liczba1 = 10;
            $liczba2 = 5;
            $suma = $liczba1 + $liczba2;
            echo "<h3>Obliczenia:</h3>";
            echo "<p>" . $liczba1 . " + " . $liczba2 . " = " . $suma . "</p>";
            ?>
        </div>

        <!-- Przycisk do pokazania kodu -->
        <button class="pokaz-kod-btn" onclick="toggleCode()">📄 Pokaż kod z wyjaśnieniami</button>

        <!-- Kontener z kodem źródłowym -->
        <div id="kod" class="kod-kontener">
            <h3 style="color: #ecf0f1; margin-bottom: 15px;">Kod źródłowy z komentarzami:</h3>
            <pre>
<span class="komentarz">&lt;?php</span>
<span class="komentarz">// CZYM JEST ZMIENNA?</span>
<span class="komentarz">// Zmienna to "pudełko" w którym przechowujemy dane</span>
<span class="komentarz">// W PHP nazwa zmiennej ZAWSZE zaczyna się od znaku $</span>

<span class="komentarz">// ==========================================</span>
<span class="komentarz">// TYP 1: TEKST (string)</span>
<span class="komentarz">// ==========================================</span>
$imie = "Jan";
<span class="komentarz">// $imie - nazwa zmiennej (zawsze zaczyna się od $)</span>
<span class="komentarz">// = - znak przypisania (wkładamy wartość do zmiennej)</span>
<span class="komentarz">// "Jan" - wartość tekstowa w cudzysłowie</span>

$nazwisko = "Kowalski";
<span class="komentarz">// Możemy utworzyć wiele zmiennych</span>

echo "&lt;p&gt;Imię: " . $imie . "&lt;/p&gt;";
<span class="komentarz">// Używamy zmiennej: wyświetlamy jej zawartość</span>
<span class="komentarz">// Łączymy tekst z zawartością zmiennej używając kropki (.)</span>

<span class="komentarz">// ==========================================</span>
<span class="komentarz">// TYP 2: LICZBY CAŁKOWITE (integer)</span>
<span class="komentarz">// ==========================================</span>
$wiek = 15;
<span class="komentarz">// Liczby nie są w cudzysłowie!</span>
<span class="komentarz">// $wiek przechowuje liczbę 15</span>

$klasa = 8;
echo "&lt;p&gt;Wiek: " . $wiek . " lat&lt;/p&gt;";

<span class="komentarz">// ==========================================</span>
<span class="komentarz">// TYP 3: LICZBY DZIESIĘTNE (float)</span>
<span class="komentarz">// ==========================================</span>
$ocena = 4.5;
<span class="komentarz">// Używamy kropki (.) do oddzielenia części dziesiętnej</span>
<span class="komentarz">// 4.5 to liczba zmiennoprzecinkowa</span>

$wzrost = 1.65;
echo "&lt;p&gt;Średnia ocen: " . $ocena . "&lt;/p&gt;";

<span class="komentarz">// ==========================================</span>
<span class="komentarz">// TYP 4: WARTOŚCI LOGICZNE (boolean)</span>
<span class="komentarz">// ==========================================</span>
$czyZdal = true;
<span class="komentarz">// Boolean może mieć tylko 2 wartości:</span>
<span class="komentarz">// - true (prawda)</span>
<span class="komentarz">// - false (fałsz)</span>
<span class="komentarz">// Używamy do sprawdzania warunków</span>

<span class="komentarz">// ==========================================</span>
<span class="komentarz">// OPERACJE NA ZMIENNYCH</span>
<span class="komentarz">// ==========================================</span>
$liczba1 = 10;
$liczba2 = 5;
$suma = $liczba1 + $liczba2;
<span class="komentarz">// $suma będzie przechowywać wynik dodawania:</span>
<span class="komentarz">// 10 + 5 = 15</span>
<span class="komentarz">// Możemy wykonywać: + - * / (dodawanie, odejmowanie, mnożenie, dzielenie)</span>

echo "&lt;p&gt;" . $liczba1 . " + " . $liczba2 . " = " . $suma . "&lt;/p&gt;";
<span class="komentarz">?&gt;</span>

<span class="komentarz">// ==========================================</span>
<span class="komentarz">// PODSUMOWANIE TYPÓW DANYCH:</span>
<span class="komentarz">// ==========================================</span>
<span class="komentarz">// 1. string (tekst) - w cudzysłowie: "tekst"</span>
<span class="komentarz">// 2. integer (liczby całkowite) - bez cudzysłowu: 15</span>
<span class="komentarz">// 3. float (liczby dziesiętne) - bez cudzysłowu: 4.5</span>
<span class="komentarz">// 4. boolean (logiczne) - true lub false</span>
<span class="komentarz">// </span>
<span class="komentarz">// NAZWY ZMIENNYCH:</span>
<span class="komentarz">// - Zawsze zaczynają się od $</span>
<span class="komentarz">// - Mogą zawierać litery, cyfry i _ (podkreślenie)</span>
<span class="komentarz">// - NIE mogą zaczynać się od cyfry</span>
<span class="komentarz">// - Dobre nazwy: $imie, $wiek, $suma_liczb</span>
<span class="komentarz">// - Złe nazwy: $1liczba, $suma liczb (spacja!)</span>
</pre>
        </div>

        <div style="margin-top: 30px; padding: 15px; background-color: #fff3cd; border-left: 4px solid #ffc107;">
            <strong>💡 Zadanie do wypróbowania:</strong><br>
            Spróbuj utworzyć własne zmienne z Twoim imieniem, wiekiem i ulubioną liczbą. Wyświetl je używając <code>echo</code>!
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
