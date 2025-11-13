<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Przykład 4: Pętle</title>
    <link rel="stylesheet" href="../css/prosty-styl.css">
</head>
<body>
    <div class="container">
        <h1>Przykład 4: Pętle (for, while, foreach)</h1>

        <div class="nawigacja">
            <a href="../../index.html">← Strona Główna</a>
            <a href="../nawigacja.php">Wszystkie Przykłady</a>
        </div>

        <h2>Demonstracja pętli:</h2>

        <div class="wynik">
            <?php
            // PĘTLA to fragment kodu, który wykonuje się wiele razy
            // Zamiast pisać ten sam kod 10 razy, użyjemy pętli!

            // ==========================================
            // PĘTLA FOR - gdy wiemy ile razy powtórzyć
            // ==========================================
            echo "<h3>1. Pętla FOR - liczenie od 1 do 5:</h3>";
            for ($i = 1; $i <= 5; $i++) {
                echo "<p>To jest powtórzenie numer: " . $i . "</p>";
            }

            // ==========================================
            // PĘTLA FOR z tablicą indeksowaną
            // ==========================================
            echo "<h3>2. Pętla FOR z tablicą:</h3>";
            $uczniowie = ["Anna", "Bartek", "Celina", "Damian"];

            // count($uczniowie) zwraca liczbę elementów: 4
            // więc pętla wykona się dla i = 0, 1, 2, 3
            for ($i = 0; $i < count($uczniowie); $i++) {
                echo "<p>Uczeń " . ($i + 1) . ": " . $uczniowie[$i] . " (indeks: " . $i . ")</p>";
            }

            // ==========================================
            // PĘTLA WHILE - dopóki warunek jest prawdziwy
            // ==========================================
            echo "<h3>3. Pętla WHILE - odliczanie:</h3>";
            $licznik = 5;
            while ($licznik > 0) {
                echo "<p>Odliczanie: " . $licznik . "</p>";
                $licznik--;  // zmniejszamy o 1
            }
            echo "<p><strong>Start!</strong></p>";

            // ==========================================
            // PĘTLA FOREACH - najlepsza dla tablic
            // ==========================================
            echo "<h3>4. Pętla FOREACH - automatyczne przechodzenie przez tablicę:</h3>";
            $przedmioty = ["Matematyka", "Polski", "Angielski", "Historia", "WF"];

            // foreach automatycznie bierze każdy element
            foreach ($przedmioty as $przedmiot) {
                echo "<p>📚 " . $przedmiot . "</p>";
            }

            // ==========================================
            // FOREACH z indeksem
            // ==========================================
            echo "<h3>5. FOREACH z numerem pozycji:</h3>";
            $oceny = [5, 4, 5, 3, 4];

            $pozycja = 0;
            foreach ($oceny as $ocena) {
                echo "<p>Ocena " . ($pozycja + 1) . ": " . $ocena . "/5</p>";
                $pozycja++;
            }

            // ==========================================
            // Przykład praktyczny: Suma liczb
            // ==========================================
            echo "<h3>6. Praktyczny przykład - sumowanie:</h3>";
            $liczby = [10, 20, 30, 40, 50];
            $suma = 0;

            echo "<p>Liczby do zsumowania: ";
            for ($i = 0; $i < count($liczby); $i++) {
                echo $liczby[$i];
                if ($i < count($liczby) - 1) {
                    echo ", ";
                }
            }
            echo "</p>";

            // Sumujemy używając pętli
            for ($i = 0; $i < count($liczby); $i++) {
                $suma = $suma + $liczby[$i];
            }

            echo "<p><strong>Suma wszystkich liczb: " . $suma . "</strong></p>";
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
<span class="komentarz">// CZYM JEST PĘTLA?</span>
<span class="komentarz">// ==========================================</span>
<span class="komentarz">// Pętla to kod, który wykonuje się wiele razy</span>
<span class="komentarz">// </span>
<span class="komentarz">// BEZ PĘTLI (złe!):</span>
<span class="komentarz">//   echo "Liczba: 1";</span>
<span class="komentarz">//   echo "Liczba: 2";</span>
<span class="komentarz">//   echo "Liczba: 3";</span>
<span class="komentarz">//   ... (pisanie 100 razy!)</span>
<span class="komentarz">//</span>
<span class="komentarz">// Z PĘTLĄ (dobre!):</span>
<span class="komentarz">//   for($i=1; $i<=100; $i++) {</span>
<span class="komentarz">//     echo "Liczba: " . $i;</span>
<span class="komentarz">//   }</span>

<span class="komentarz">// ==========================================</span>
<span class="komentarz">// PĘTLA FOR</span>
<span class="komentarz">// ==========================================</span>
for ($i = 1; $i &lt;= 5; $i++) {
    echo "Powtórzenie: " . $i;
}

<span class="komentarz">// Jak to działa?</span>
<span class="komentarz">// for ( START ; WARUNEK ; KROK ) { KOD }</span>
<span class="komentarz">//</span>
<span class="komentarz">// $i = 1       - START: zaczynamy od $i równego 1</span>
<span class="komentarz">// $i &lt;= 5      - WARUNEK: wykonuj dopóki $i jest mniejsze lub równe 5</span>
<span class="komentarz">// $i++         - KROK: po każdym obiegu zwiększ $i o 1</span>
<span class="komentarz">//</span>
<span class="komentarz">// Przebieg pętli:</span>
<span class="komentarz">// Obieg 1: $i=1, wyświetl "Powtórzenie: 1", zwiększ do 2</span>
<span class="komentarz">// Obieg 2: $i=2, wyświetl "Powtórzenie: 2", zwiększ do 3</span>
<span class="komentarz">// Obieg 3: $i=3, wyświetl "Powtórzenie: 3", zwiększ do 4</span>
<span class="komentarz">// Obieg 4: $i=4, wyświetl "Powtórzenie: 4", zwiększ do 5</span>
<span class="komentarz">// Obieg 5: $i=5, wyświetl "Powtórzenie: 5", zwiększ do 6</span>
<span class="komentarz">// Koniec: $i=6, warunek $i&lt;=5 jest fałszywy, STOP</span>

<span class="komentarz">// ==========================================</span>
<span class="komentarz">// PĘTLA FOR Z TABLICĄ INDEKSOWANĄ</span>
<span class="komentarz">// ==========================================</span>
$uczniowie = ["Anna", "Bartek", "Celina", "Damian"];

<span class="komentarz">// count($uczniowie) zwraca 4 (liczba elementów)</span>
for ($i = 0; $i &lt; count($uczniowie); $i++) {
    echo $uczniowie[$i];
}

<span class="komentarz">// Przebieg:</span>
<span class="komentarz">// $i=0: wyświetl $uczniowie[0] → "Anna"</span>
<span class="komentarz">// $i=1: wyświetl $uczniowie[1] → "Bartek"</span>
<span class="komentarz">// $i=2: wyświetl $uczniowie[2] → "Celina"</span>
<span class="komentarz">// $i=3: wyświetl $uczniowie[3] → "Damian"</span>
<span class="komentarz">// $i=4: warunek $i&lt;4 jest fałszywy, STOP</span>

<span class="komentarz">// WAŻNE: używamy $i &lt; count($uczniowie)</span>
<span class="komentarz">// a nie $i &lt;= count($uczniowie)</span>
<span class="komentarz">// bo indeksy to: 0, 1, 2, 3 (czyli od 0 do 3)</span>
<span class="komentarz">// a count zwraca 4</span>

<span class="komentarz">// ==========================================</span>
<span class="komentarz">// PĘTLA WHILE</span>
<span class="komentarz">// ==========================================</span>
$licznik = 5;
while ($licznik &gt; 0) {
    echo "Odliczanie: " . $licznik;
    $licznik--;  <span class="komentarz">// to samo co: $licznik = $licznik - 1;</span>
}

<span class="komentarz">// Jak to działa?</span>
<span class="komentarz">// while ( WARUNEK ) { KOD }</span>
<span class="komentarz">//</span>
<span class="komentarz">// Wykonuje KOD dopóki WARUNEK jest prawdziwy</span>
<span class="komentarz">//</span>
<span class="komentarz">// Przebieg:</span>
<span class="komentarz">// $licznik=5, warunek 5&gt;0 prawda, wyświetl 5, zmniejsz do 4</span>
<span class="komentarz">// $licznik=4, warunek 4&gt;0 prawda, wyświetl 4, zmniejsz do 3</span>
<span class="komentarz">// $licznik=3, warunek 3&gt;0 prawda, wyświetl 3, zmniejsz do 2</span>
<span class="komentarz">// $licznik=2, warunek 2&gt;0 prawda, wyświetl 2, zmniejsz do 1</span>
<span class="komentarz">// $licznik=1, warunek 1&gt;0 prawda, wyświetl 1, zmniejsz do 0</span>
<span class="komentarz">// $licznik=0, warunek 0&gt;0 FAŁSZ, STOP</span>

<span class="komentarz">// ==========================================</span>
<span class="komentarz">// PĘTLA FOREACH - najlepsza dla tablic!</span>
<span class="komentarz">// ==========================================</span>
$przedmioty = ["Matematyka", "Polski", "Angielski"];

foreach ($przedmioty as $przedmiot) {
    echo $przedmiot;
}

<span class="komentarz">// Jak to działa?</span>
<span class="komentarz">// foreach ( TABLICA as ZMIENNA ) { KOD }</span>
<span class="komentarz">//</span>
<span class="komentarz">// Automatycznie przechodzi przez każdy element tablicy</span>
<span class="komentarz">// i wkłada go do zmiennej $przedmiot</span>
<span class="komentarz">//</span>
<span class="komentarz">// Przebieg:</span>
<span class="komentarz">// Obieg 1: $przedmiot = "Matematyka", wyświetl</span>
<span class="komentarz">// Obieg 2: $przedmiot = "Polski", wyświetl</span>
<span class="komentarz">// Obieg 3: $przedmiot = "Angielski", wyświetl</span>
<span class="komentarz">// Koniec: nie ma więcej elementów, STOP</span>
<span class="komentarz">//</span>
<span class="komentarz">// FOREACH jest najłatwiejszy dla tablic!</span>
<span class="komentarz">// Nie musisz pamiętać o indeksach i count()</span>

<span class="komentarz">// ==========================================</span>
<span class="komentarz">// PRAKTYCZNY PRZYKŁAD: SUMOWANIE</span>
<span class="komentarz">// ==========================================</span>
$liczby = [10, 20, 30, 40, 50];
$suma = 0;  <span class="komentarz">// zaczynamy od 0</span>

for ($i = 0; $i &lt; count($liczby); $i++) {
    $suma = $suma + $liczby[$i];
}
<span class="komentarz">// Przebieg sumowania:</span>
<span class="komentarz">// START: $suma = 0</span>
<span class="komentarz">// $i=0: $suma = 0 + 10 = 10</span>
<span class="komentarz">// $i=1: $suma = 10 + 20 = 30</span>
<span class="komentarz">// $i=2: $suma = 30 + 30 = 60</span>
<span class="komentarz">// $i=3: $suma = 60 + 40 = 100</span>
<span class="komentarz">// $i=4: $suma = 100 + 50 = 150</span>
<span class="komentarz">// KONIEC: $suma = 150</span>

<span class="komentarz">?&gt;</span>

<span class="komentarz">// ==========================================</span>
<span class="komentarz">// PODSUMOWANIE PĘTLI:</span>
<span class="komentarz">// ==========================================</span>
<span class="komentarz">// 1. FOR - gdy wiesz ile razy powtórzyć</span>
<span class="komentarz">//    Składnia: for(start; warunek; krok) { kod }</span>
<span class="komentarz">//</span>
<span class="komentarz">// 2. WHILE - wykonuj dopóki warunek prawdziwy</span>
<span class="komentarz">//    Składnia: while(warunek) { kod }</span>
<span class="komentarz">//</span>
<span class="komentarz">// 3. FOREACH - automatycznie przejdź przez tablicę</span>
<span class="komentarz">//    Składnia: foreach(tablica as element) { kod }</span>
<span class="komentarz">//    NAJLEPSZY dla tablic!</span>
<span class="komentarz">//</span>
<span class="komentarz">// Pętle oszczędzają czas i sprawiają, że kod jest krótszy!</span>
</pre>
        </div>

        <div style="margin-top: 30px; padding: 15px; background-color: #fff3cd; border-left: 4px solid #ffc107;">
            <strong>💡 Zadanie do wypróbowania:</strong><br>
            Utwórz tablicę ze swoimi ulubionymi grami i wyświetl je używając pętli <code>foreach</code>!
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
