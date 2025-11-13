<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Przykład 6: Warunki if/else</title>
    <link rel="stylesheet" href="../css/prosty-styl.css">
</head>
<body>
    <div class="container">
        <h1>Przykład 6: Warunki if/else</h1>

        <div class="nawigacja">
            <a href="../../index.html">← Strona Główna</a>
            <a href="../nawigacja.php">Wszystkie Przykłady</a>
        </div>

        <h2>Interaktywny kalkulator ocen:</h2>

        <?php
        // Sprawdzamy czy formularz został wysłany
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Zbieramy oceny do tablicy indeksowanej
            $oceny = array();
            $oceny[0] = (int)$_POST["ocena1"];
            $oceny[1] = (int)$_POST["ocena2"];
            $oceny[2] = (int)$_POST["ocena3"];

            // Obliczamy średnią
            $suma = 0;
            for ($i = 0; $i < count($oceny); $i++) {
                $suma = $suma + $oceny[$i];
            }
            $srednia = $suma / count($oceny);

            echo '<div class="wynik">';
            echo '<h3>📊 Wyniki:</h3>';
            echo '<p>Twoje oceny:</p>';
            for ($i = 0; $i < count($oceny); $i++) {
                echo '<p>Ocena ' . ($i + 1) . ' (indeks ' . $i . '): ' . $oceny[$i] . '</p>';
            }
            echo '<p><strong>Średnia ocen: ' . number_format($srednia, 2) . '</strong></p>';

            // ==========================================
            // INSTRUKCJE WARUNKOWE IF/ELSE
            // ==========================================

            // Przykład 1: Prosty IF
            echo '<h3>Analiza średniej:</h3>';
            if ($srednia >= 4.5) {
                echo '<p style="color: green;">✅ Doskonale! Twoja średnia jest bardzo wysoka!</p>';
            }

            // Przykład 2: IF-ELSE (jeśli... to... w przeciwnym razie...)
            if ($srednia >= 3.0) {
                echo '<p style="color: blue;">✅ Gratulacje! Zdałeś!</p>';
            } else {
                echo '<p style="color: red;">❌ Niestety, musisz poprawić oceny.</p>';
            }

            // Przykład 3: IF-ELSEIF-ELSE (wiele warunków)
            echo '<h3>Ocena opisowa:</h3>';
            if ($srednia >= 5.0) {
                echo '<p>🏆 Celujący - Jesteś mistrzem!</p>';
            } elseif ($srednia >= 4.5) {
                echo '<p>⭐ Bardzo dobry - Świetna robota!</p>';
            } elseif ($srednia >= 3.5) {
                echo '<p>👍 Dobry - Dobra praca!</p>';
            } elseif ($srednia >= 2.5) {
                echo '<p>📚 Dostateczny - Możesz się poprawić.</p>';
            } else {
                echo '<p>📖 Niedostateczny - Musisz więcej się uczyć.</p>';
            }

            // Przykład 4: Sprawdzanie każdej oceny
            echo '<h3>Analiza poszczególnych ocen:</h3>';
            for ($i = 0; $i < count($oceny); $i++) {
                echo '<p>Ocena ' . ($i + 1) . ': ';

                if ($oceny[$i] >= 5) {
                    echo '⭐⭐⭐ Wspaniale!';
                } elseif ($oceny[$i] >= 4) {
                    echo '⭐⭐ Bardzo dobrze!';
                } elseif ($oceny[$i] >= 3) {
                    echo '⭐ Dobrze!';
                } else {
                    echo '📚 Do poprawy';
                }

                echo '</p>';
            }

            echo '</div>';
        }
        ?>

        <!-- Formularz -->
        <form method="POST" action="">
            <h3>Wprowadź swoje 3 oceny:</h3>

            <label for="ocena1">Ocena 1 (1-6):</label>
            <input type="number" id="ocena1" name="ocena1" min="1" max="6" required>

            <label for="ocena2">Ocena 2 (1-6):</label>
            <input type="number" id="ocena2" name="ocena2" min="1" max="6" required>

            <label for="ocena3">Ocena 3 (1-6):</label>
            <input type="number" id="ocena3" name="ocena3" min="1" max="6" required>

            <button type="submit">🧮 Oblicz średnią i oceń</button>
        </form>

        <h2>Dodatkowe przykłady warunków:</h2>

        <div class="wynik">
            <?php
            // Przykłady różnych operatorów porównania

            $wiek = 15;
            $punkty = 85;

            echo '<h3>Operatory porównania:</h3>';

            // == (równe)
            if ($wiek == 15) {
                echo '<p>Masz dokładnie 15 lat</p>';
            }

            // > (większe)
            if ($punkty > 80) {
                echo '<p>Masz więcej niż 80 punktów!</p>';
            }

            // < (mniejsze)
            if ($wiek < 18) {
                echo '<p>Jesteś niepełnoletni</p>';
            }

            // >= (większe lub równe)
            if ($punkty >= 80) {
                echo '<p>Zdobyłeś przynajmniej 80 punktów</p>';
            }

            // <= (mniejsze lub równe)
            if ($wiek <= 15) {
                echo '<p>Masz maksymalnie 15 lat</p>';
            }

            // != (różne)
            if ($wiek != 18) {
                echo '<p>Nie masz 18 lat</p>';
            }

            echo '<h3>Operatory logiczne (łączenie warunków):</h3>';

            // && (AND - i)
            if ($wiek >= 13 && $wiek <= 19) {
                echo '<p>Jesteś nastolatkiem (13-19 lat)</p>';
            }

            // || (OR - lub)
            if ($punkty >= 90 || $wiek >= 18) {
                echo '<p>Masz 90+ punktów LUB jesteś pełnoletni</p>';
            }

            // Przykład z tablicą indeksowaną
            $liczby = [5, 12, 8, 20, 3];
            echo '<h3>Szukanie liczb większych niż 10:</h3>';

            for ($i = 0; $i < count($liczby); $i++) {
                if ($liczby[$i] > 10) {
                    echo '<p>Liczba na indeksie ' . $i . ': ' . $liczby[$i] . ' ✅ (większa niż 10)</p>';
                } else {
                    echo '<p>Liczba na indeksie ' . $i . ': ' . $liczby[$i] . ' ❌ (nie większa niż 10)</p>';
                }
            }
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
<span class="komentarz">// CZYM SĄ INSTRUKCJE WARUNKOWE?</span>
<span class="komentarz">// ==========================================</span>
<span class="komentarz">// Instrukcje warunkowe pozwalają programowi podejmować decyzje</span>
<span class="komentarz">// "Jeśli coś jest prawdą, to zrób to, w przeciwnym razie zrób tamto"</span>

<span class="komentarz">// ==========================================</span>
<span class="komentarz">// PRZYKŁAD 1: PROSTY IF</span>
<span class="komentarz">// ==========================================</span>
$srednia = 4.8;

if ($srednia &gt;= 4.5) {
    echo "Doskonale!";
}

<span class="komentarz">// Jak to działa?</span>
<span class="komentarz">// if (WARUNEK) { KOD }</span>
<span class="komentarz">//</span>
<span class="komentarz">// 1. Sprawdź warunek: Czy $srednia &gt;= 4.5?</span>
<span class="komentarz">// 2. Jeśli PRAWDA: wykonaj kod w { }</span>
<span class="komentarz">// 3. Jeśli FAŁSZ: pomiń kod w { }</span>
<span class="komentarz">//</span>
<span class="komentarz">// W tym przypadku: 4.8 &gt;= 4.5? TAK!</span>
<span class="komentarz">// Więc wyświetli: "Doskonale!"</span>

<span class="komentarz">// ==========================================</span>
<span class="komentarz">// PRZYKŁAD 2: IF-ELSE</span>
<span class="komentarz">// ==========================================</span>
if ($srednia &gt;= 3.0) {
    echo "Zdałeś!";
} else {
    echo "Nie zdałeś";
}

<span class="komentarz">// Jak to działa?</span>
<span class="komentarz">// if (WARUNEK) {</span>
<span class="komentarz">//     KOD1 - wykonaj gdy PRAWDA</span>
<span class="komentarz">// } else {</span>
<span class="komentarz">//     KOD2 - wykonaj gdy FAŁSZ</span>
<span class="komentarz">// }</span>
<span class="komentarz">//</span>
<span class="komentarz">// Jeśli średnia &gt;= 3.0: wyświetl "Zdałeś!"</span>
<span class="komentarz">// W przeciwnym razie: wyświetl "Nie zdałeś"</span>

<span class="komentarz">// ==========================================</span>
<span class="komentarz">// PRZYKŁAD 3: IF-ELSEIF-ELSE (wiele warunków)</span>
<span class="komentarz">// ==========================================</span>
if ($srednia &gt;= 5.0) {
    echo "Celujący";
} elseif ($srednia &gt;= 4.5) {
    echo "Bardzo dobry";
} elseif ($srednia &gt;= 3.5) {
    echo "Dobry";
} elseif ($srednia &gt;= 2.5) {
    echo "Dostateczny";
} else {
    echo "Niedostateczny";
}

<span class="komentarz">// Jak to działa?</span>
<span class="komentarz">// 1. Sprawdź pierwszy warunek: $srednia &gt;= 5.0?</span>
<span class="komentarz">//    - Jeśli TAK: wyświetl "Celujący" i ZAKOŃCZ</span>
<span class="komentarz">//    - Jeśli NIE: idź dalej</span>
<span class="komentarz">//</span>
<span class="komentarz">// 2. Sprawdź drugi warunek: $srednia &gt;= 4.5?</span>
<span class="komentarz">//    - Jeśli TAK: wyświetl "Bardzo dobry" i ZAKOŃCZ</span>
<span class="komentarz">//    - Jeśli NIE: idź dalej</span>
<span class="komentarz">//</span>
<span class="komentarz">// 3. Sprawdź trzeci warunek: $srednia &gt;= 3.5?</span>
<span class="komentarz">//    ... i tak dalej</span>
<span class="komentarz">//</span>
<span class="komentarz">// WAŻNE: Wykonuje się TYLKO JEDEN blok kodu!</span>
<span class="komentarz">// Jak tylko znajdzie prawdziwy warunek, kończy sprawdzanie</span>

<span class="komentarz">// ==========================================</span>
<span class="komentarz">// OPERATORY PORÓWNANIA</span>
<span class="komentarz">// ==========================================</span>
$liczba = 10;

<span class="komentarz">// == (równe)</span>
if ($liczba == 10) { }
<span class="komentarz">// Sprawdza: Czy $liczba jest równa 10?</span>

<span class="komentarz">// != (różne od)</span>
if ($liczba != 5) { }
<span class="komentarz">// Sprawdza: Czy $liczba jest różna od 5?</span>

<span class="komentarz">// &gt; (większe)</span>
if ($liczba &gt; 5) { }
<span class="komentarz">// Sprawdza: Czy $liczba jest większa od 5?</span>

<span class="komentarz">// &lt; (mniejsze)</span>
if ($liczba &lt; 20) { }
<span class="komentarz">// Sprawdza: Czy $liczba jest mniejsza od 20?</span>

<span class="komentarz">// &gt;= (większe lub równe)</span>
if ($liczba &gt;= 10) { }
<span class="komentarz">// Sprawdza: Czy $liczba jest większa lub równa 10?</span>

<span class="komentarz">// &lt;= (mniejsze lub równe)</span>
if ($liczba &lt;= 15) { }
<span class="komentarz">// Sprawdza: Czy $liczba jest mniejsza lub równa 15?</span>

<span class="komentarz">// ==========================================</span>
<span class="komentarz">// OPERATORY LOGICZNE (łączenie warunków)</span>
<span class="komentarz">// ==========================================</span>
$wiek = 15;
$punkty = 85;

<span class="komentarz">// &amp;&amp; (AND - i)</span>
if ($wiek &gt;= 13 &amp;&amp; $wiek &lt;= 19) {
    echo "Jesteś nastolatkiem";
}
<span class="komentarz">// Sprawdza: Czy wiek &gt;= 13 I wiek &lt;= 19?</span>
<span class="komentarz">// OBA warunki muszą być prawdziwe!</span>
<span class="komentarz">// 15 &gt;= 13? TAK. 15 &lt;= 19? TAK. Oba TAK = wykonaj kod</span>

<span class="komentarz">// || (OR - lub)</span>
if ($punkty &gt;= 90 || $wiek &gt;= 18) {
    echo "Wysokie punkty LUB pełnoletni";
}
<span class="komentarz">// Sprawdza: Czy punkty &gt;= 90 LUB wiek &gt;= 18?</span>
<span class="komentarz">// PRZYNAJMNIEJ JEDEN warunek musi być prawdziwy!</span>
<span class="komentarz">// 85 &gt;= 90? NIE. 15 &gt;= 18? NIE. Oba NIE = NIE wykonuj</span>

<span class="komentarz">// ==========================================</span>
<span class="komentarz">// WARUNKI Z TABLICAMI INDEKSOWANYMI</span>
<span class="komentarz">// ==========================================</span>
$oceny = [5, 3, 4];  <span class="komentarz">// Tablica z ocenami</span>

<span class="komentarz">// Sprawdzamy każdą ocenę w pętli</span>
for ($i = 0; $i &lt; count($oceny); $i++) {
    if ($oceny[$i] &gt;= 4) {
        echo "Ocena " . $i . " jest dobra!";
    } else {
        echo "Ocena " . $i . " do poprawy";
    }
}

<span class="komentarz">// Przebieg:</span>
<span class="komentarz">// $i=0: $oceny[0]=5, 5&gt;=4? TAK → "Ocena 0 jest dobra!"</span>
<span class="komentarz">// $i=1: $oceny[1]=3, 3&gt;=4? NIE → "Ocena 1 do poprawy"</span>
<span class="komentarz">// $i=2: $oceny[2]=4, 4&gt;=4? TAK → "Ocena 2 jest dobra!"</span>

<span class="komentarz">?&gt;</span>

<span class="komentarz">// ==========================================</span>
<span class="komentarz">// PODSUMOWANIE:</span>
<span class="komentarz">// ==========================================</span>
<span class="komentarz">// 1. IF - wykonaj kod jeśli warunek prawdziwy</span>
<span class="komentarz">//    if (warunek) { kod }</span>
<span class="komentarz">//</span>
<span class="komentarz">// 2. IF-ELSE - wybierz jedną z dwóch opcji</span>
<span class="komentarz">//    if (warunek) { kod1 } else { kod2 }</span>
<span class="komentarz">//</span>
<span class="komentarz">// 3. IF-ELSEIF-ELSE - wybierz z wielu opcji</span>
<span class="komentarz">//    if (war1) { kod1 } elseif (war2) { kod2 } else { kod3 }</span>
<span class="komentarz">//</span>
<span class="komentarz">// 4. Operatory porównania:</span>
<span class="komentarz">//    == (równe), != (różne), &gt; &lt; &gt;= &lt;=</span>
<span class="komentarz">//</span>
<span class="komentarz">// 5. Operatory logiczne:</span>
<span class="komentarz">//    &amp;&amp; (i - oba muszą być prawdziwe)</span>
<span class="komentarz">//    || (lub - przynajmniej jeden prawdziwy)</span>
<span class="komentarz">//</span>
<span class="komentarz">// Warunki to podstawa programowania!</span>
<span class="komentarz">// Pozwalają programowi podejmować decyzje</span>
</pre>
        </div>

        <div style="margin-top: 30px; padding: 15px; background-color: #fff3cd; border-left: 4px solid #ffc107;">
            <strong>💡 Zadanie do wypróbowania:</strong><br>
            1. Wprowadź różne oceny i zobacz jak program je ocenia<br>
            2. Spróbuj wprowadzić oceny: 6, 6, 6 - co się stanie?<br>
            3. Spróbuj: 2, 2, 2 - jaki będzie wynik?<br>
            4. Kliknij "Pokaż kod" i przeczytaj wszystkie komentarze!
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
