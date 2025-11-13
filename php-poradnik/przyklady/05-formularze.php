<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Przykład 5: Formularze</title>
    <link rel="stylesheet" href="../css/prosty-styl.css">
</head>
<body>
    <div class="container">
        <h1>Przykład 5: Formularze - odbieranie danych</h1>

        <div class="nawigacja">
            <a href="../../index.html">← Strona Główna</a>
            <a href="../nawigacja.php">Wszystkie Przykłady</a>
        </div>

        <h2>Formularz kontaktowy:</h2>

        <?php
        // Sprawdzamy czy formularz został wysłany
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            // METODA Z TABLICĄ INDEKSOWANĄ - łatwiejsza dla uczniów!
            // Zbieramy dane z formularza do tablicy indeksowanej
            $dane = array();
            $dane[0] = $_POST["imie"];      // indeks 0: imię
            $dane[1] = $_POST["nazwisko"];  // indeks 1: nazwisko
            $dane[2] = $_POST["email"];     // indeks 2: email
            $dane[3] = $_POST["wiadomosc"]; // indeks 3: wiadomość

            // Wyświetlamy otrzymane dane
            echo '<div class="wynik">';
            echo '<h3>✅ Formularz został wysłany!</h3>';
            echo '<p><strong>Otrzymane dane (z tablicy indeksowanej):</strong></p>';
            echo '<p>Imię (indeks 0): ' . $dane[0] . '</p>';
            echo '<p>Nazwisko (indeks 1): ' . $dane[1] . '</p>';
            echo '<p>Email (indeks 2): ' . $dane[2] . '</p>';
            echo '<p>Wiadomość (indeks 3): ' . $dane[3] . '</p>';
            echo '</div>';

            // Dodatkowy przykład - wyświetlanie wszystkich danych w pętli
            echo '<div class="wynik">';
            echo '<h3>Wyświetlanie wszystkich danych w pętli FOR:</h3>';
            $etykiety = ["Imię", "Nazwisko", "Email", "Wiadomość"];

            for ($i = 0; $i < count($dane); $i++) {
                echo '<p>' . $etykiety[$i] . ' (indeks ' . $i . '): ' . $dane[$i] . '</p>';
            }
            echo '</div>';
        }
        ?>

        <!-- Formularz HTML -->
        <form method="POST" action="">
            <label for="imie">Imię:</label>
            <input type="text" id="imie" name="imie" required>

            <label for="nazwisko">Nazwisko:</label>
            <input type="text" id="nazwisko" name="nazwisko" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="wiadomosc">Wiadomość:</label>
            <textarea id="wiadomosc" name="wiadomosc" rows="4" required></textarea>

            <button type="submit">📤 Wyślij formularz</button>
        </form>

        <!-- Przycisk do pokazania kodu -->
        <button class="pokaz-kod-btn" onclick="toggleCode()">📄 Pokaż kod z wyjaśnieniami</button>

        <!-- Kontener z kodem źródłowym -->
        <div id="kod" class="kod-kontener">
            <h3 style="color: #ecf0f1; margin-bottom: 15px;">Kod źródłowy z komentarzami:</h3>
            <pre>
<span class="komentarz">&lt;?php</span>
<span class="komentarz">// ==========================================</span>
<span class="komentarz">// JAK DZIAŁAJĄ FORMULARZE W PHP?</span>
<span class="komentarz">// ==========================================</span>
<span class="komentarz">// 1. Użytkownik wypełnia formularz na stronie</span>
<span class="komentarz">// 2. Klika przycisk "Wyślij"</span>
<span class="komentarz">// 3. Dane są wysyłane do PHP</span>
<span class="komentarz">// 4. PHP odbiera dane i może je przetworzyć</span>

<span class="komentarz">// ==========================================</span>
<span class="komentarz">// KROK 1: Sprawdzamy czy formularz został wysłany</span>
<span class="komentarz">// ==========================================</span>
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    <span class="komentarz">// Ten kod wykona się TYLKO gdy formularz zostanie wysłany</span>
    <span class="komentarz">// $_SERVER["REQUEST_METHOD"] zawiera informację jak strona została wywołana</span>
    <span class="komentarz">// "POST" oznacza, że dane zostały wysłane z formularza</span>

    <span class="komentarz">// ==========================================</span>
    <span class="komentarz">// KROK 2: Odbieramy dane do TABLICY INDEKSOWANEJ</span>
    <span class="komentarz">// ==========================================</span>
    $dane = array();  <span class="komentarz">// Tworzymy pustą tablicę</span>

    <span class="komentarz">// Teraz zbieramy dane z formularza</span>
    <span class="komentarz">// $_POST to specjalna tablica z danymi z formularza</span>

    $dane[0] = $_POST["imie"];
    <span class="komentarz">// $_POST["imie"] - pobiera wartość pola o nazwie "imie"</span>
    <span class="komentarz">// $dane[0] - zapisujemy to na pozycji 0 w naszej tablicy</span>

    $dane[1] = $_POST["nazwisko"];
    <span class="komentarz">// Nazwisko trafia na pozycję 1</span>

    $dane[2] = $_POST["email"];
    <span class="komentarz">// Email na pozycję 2</span>

    $dane[3] = $_POST["wiadomosc"];
    <span class="komentarz">// Wiadomość na pozycję 3</span>

    <span class="komentarz">// Teraz mamy tablicę indeksowaną:</span>
    <span class="komentarz">// $dane[0] = imię</span>
    <span class="komentarz">// $dane[1] = nazwisko</span>
    <span class="komentarz">// $dane[2] = email</span>
    <span class="komentarz">// $dane[3] = wiadomość</span>

    <span class="komentarz">// ==========================================</span>
    <span class="komentarz">// KROK 3: Wyświetlamy dane</span>
    <span class="komentarz">// ==========================================</span>
    echo "Imię (indeks 0): " . $dane[0];
    echo "Nazwisko (indeks 1): " . $dane[1];
    echo "Email (indeks 2): " . $dane[2];
    echo "Wiadomość (indeks 3): " . $dane[3];

    <span class="komentarz">// ==========================================</span>
    <span class="komentarz">// KROK 4: Wyświetlamy w pętli (bardziej zaawansowane)</span>
    <span class="komentarz">// ==========================================</span>
    $etykiety = ["Imię", "Nazwisko", "Email", "Wiadomość"];
    <span class="komentarz">// Tablica z nazwami pól - dla lepszego wyświetlania</span>

    for ($i = 0; $i &lt; count($dane); $i++) {
        echo $etykiety[$i] . ": " . $dane[$i];
    }
    <span class="komentarz">// Pętla przechodzi przez wszystkie elementy:</span>
    <span class="komentarz">// $i=0: wyświetl "Imię: " + $dane[0]</span>
    <span class="komentarz">// $i=1: wyświetl "Nazwisko: " + $dane[1]</span>
    <span class="komentarz">// $i=2: wyświetl "Email: " + $dane[2]</span>
    <span class="komentarz">// $i=3: wyświetl "Wiadomość: " + $dane[3]</span>
}
<span class="komentarz">?&gt;</span>

<span class="komentarz">&lt;!-- ========================================== --&gt;</span>
<span class="komentarz">&lt;!-- FORMULARZ HTML --&gt;</span>
<span class="komentarz">&lt;!-- ========================================== --&gt;</span>
&lt;form method="POST" action=""&gt;
    <span class="komentarz">&lt;!-- method="POST" - dane będą wysłane metodą POST --&gt;</span>
    <span class="komentarz">&lt;!-- action="" - dane zostaną wysłane do tego samego pliku --&gt;</span>

    <span class="komentarz">&lt;!-- POLE TEKSTOWE: Imię --&gt;</span>
    &lt;label for="imie"&gt;Imię:&lt;/label&gt;
    &lt;input type="text" id="imie" name="imie" required&gt;
    <span class="komentarz">&lt;!-- name="imie" - WAŻNE! To jest nazwa, której używamy w PHP --&gt;</span>
    <span class="komentarz">&lt;!-- PHP odbierze to jako: $_POST["imie"] --&gt;</span>
    <span class="komentarz">&lt;!-- required - pole musi być wypełnione --&gt;</span>

    <span class="komentarz">&lt;!-- POLE TEKSTOWE: Nazwisko --&gt;</span>
    &lt;label for="nazwisko"&gt;Nazwisko:&lt;/label&gt;
    &lt;input type="text" id="nazwisko" name="nazwisko" required&gt;
    <span class="komentarz">&lt;!-- name="nazwisko" → PHP: $_POST["nazwisko"] --&gt;</span>

    <span class="komentarz">&lt;!-- POLE EMAIL --&gt;</span>
    &lt;label for="email"&gt;Email:&lt;/label&gt;
    &lt;input type="email" id="email" name="email" required&gt;
    <span class="komentarz">&lt;!-- type="email" - automatycznie sprawdza format email --&gt;</span>
    <span class="komentarz">&lt;!-- name="email" → PHP: $_POST["email"] --&gt;</span>

    <span class="komentarz">&lt;!-- POLE TEXTAREA: Wiadomość --&gt;</span>
    &lt;label for="wiadomosc"&gt;Wiadomość:&lt;/label&gt;
    &lt;textarea id="wiadomosc" name="wiadomosc" rows="4" required&gt;&lt;/textarea&gt;
    <span class="komentarz">&lt;!-- textarea to większe pole na dłuższy tekst --&gt;</span>
    <span class="komentarz">&lt;!-- name="wiadomosc" → PHP: $_POST["wiadomosc"] --&gt;</span>

    <span class="komentarz">&lt;!-- PRZYCISK WYSYŁANIA --&gt;</span>
    &lt;button type="submit"&gt;Wyślij formularz&lt;/button&gt;
    <span class="komentarz">&lt;!-- type="submit" - kliknięcie wyśle formularz --&gt;</span>
&lt;/form&gt;

<span class="komentarz">// ==========================================</span>
<span class="komentarz">// PODSUMOWANIE:</span>
<span class="komentarz">// ==========================================</span>
<span class="komentarz">// 1. Formularz HTML ma method="POST"</span>
<span class="komentarz">// 2. Każde pole ma atrybut name="nazwa"</span>
<span class="komentarz">// 3. W PHP sprawdzamy: if($_SERVER["REQUEST_METHOD"]=="POST")</span>
<span class="komentarz">// 4. Odbieramy dane: $_POST["nazwa"]</span>
<span class="komentarz">// 5. Zapisujemy do tablicy indeksowanej: $dane[0], $dane[1]...</span>
<span class="komentarz">// 6. Wyświetlamy używając indeksów: $dane[0], $dane[1]...</span>
<span class="komentarz">//</span>
<span class="komentarz">// DLACZEGO TABLICA INDEKSOWANA?</span>
<span class="komentarz">// - Łatwiej używać w pętlach: for($i=0; $i&lt;count($dane); $i++)</span>
<span class="komentarz">// - Nie pomylisz się w nazwie (jak w $_POST["nazwa"])</span>
<span class="komentarz">// - Możesz łatwo policzyć ile danych: count($dane)</span>
<span class="komentarz">// - Idealne dla początkujących!</span>
</pre>
        </div>

        <div style="margin-top: 30px; padding: 15px; background-color: #fff3cd; border-left: 4px solid #ffc107;">
            <strong>💡 Zadanie do wypróbowania:</strong><br>
            1. Wypełnij formularz i kliknij "Wyślij"<br>
            2. Zobacz jak PHP odbiera i wyświetla dane<br>
            3. Kliknij "Pokaż kod" i przeczytaj komentarze
        </div>

        <div style="margin-top: 20px; padding: 15px; background-color: #e8f5e9; border-left: 4px solid #4caf50;">
            <strong>⚠️ Ważne:</strong> Używamy tablicy indeksowanej (0, 1, 2...) bo jest prostsza dla uczniów.
            Nie ma ryzyka pomyłki w nazwie, jak w przypadku $_POST["nazwa_pola"].
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
