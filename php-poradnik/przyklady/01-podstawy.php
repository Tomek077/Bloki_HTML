<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Przykład 1: Podstawy PHP</title>
    <link rel="stylesheet" href="../css/prosty-styl.css">
</head>
<body>
    <div class="container">
        <h1>Przykład 1: Podstawy PHP i wyświetlanie tekstu</h1>

        <div class="nawigacja">
            <a href="../../index.html">← Strona Główna</a>
            <a href="../nawigacja.php">Wszystkie Przykłady</a>
        </div>

        <h2>Demonstracja działania PHP:</h2>

        <div class="wynik">
            <?php
            // To jest komentarz w PHP - zaczyna się od //
            // Pierwszy sposób: echo wyświetla tekst na stronie
            echo "<h3>Witaj w PHP!</h3>";

            // Możemy wyświetlać różne teksty
            echo "<p>PHP to język programowania używany do tworzenia stron internetowych.</p>";

            // Łączenie tekstów za pomocą kropki (.)
            echo "<p>Mój pierwszy " . "połączony tekst!</p>";

            // Wyświetlanie liczb
            echo "<p>Matematyka w PHP: 5 + 3 = " . (5 + 3) . "</p>";
            ?>
        </div>

        <!-- Przycisk do pokazania kodu -->
        <button class="pokaz-kod-btn" onclick="toggleCode()">📄 Pokaż kod z wyjaśnieniami</button>

        <!-- Kontener z kodem źródłowym -->
        <div id="kod" class="kod-kontener">
            <h3 style="color: #ecf0f1; margin-bottom: 15px;">Kod źródłowy z komentarzami:</h3>
            <pre>
<span class="komentarz">&lt;!-- Część HTML strony --&gt;</span>
&lt;div class="wynik"&gt;
    <span class="komentarz">&lt;?php</span>
    <span class="komentarz">// KOMENTARZ: To jest komentarz w PHP - zaczyna się od //</span>
    <span class="komentarz">// Komentarze nie są wykonywane, służą do wyjaśnień</span>

    <span class="komentarz">// KROK 1: Wyświetlanie tekstu za pomocą echo</span>
    echo "&lt;h3&gt;Witaj w PHP!&lt;/h3&gt;";
    <span class="komentarz">// echo to komenda, która wyświetla tekst na stronie</span>
    <span class="komentarz">// Tekst musi być w cudzysłowie " " lub apostrofach ' '</span>
    <span class="komentarz">// Każda linijka kodu kończy się średnikiem ;</span>

    <span class="komentarz">// KROK 2: Wyświetlamy kolejny tekst</span>
    echo "&lt;p&gt;PHP to język programowania...&lt;/p&gt;";
    <span class="komentarz">// Możemy używać znaczników HTML wewnątrz echo</span>

    <span class="komentarz">// KROK 3: Łączenie tekstów</span>
    echo "&lt;p&gt;Mój pierwszy " . "połączony tekst!&lt;/p&gt;";
    <span class="komentarz">// Kropka (.) łączy dwa teksty w jeden</span>
    <span class="komentarz">// "Mój pierwszy " + "połączony tekst!" = "Mój pierwszy połączony tekst!"</span>

    <span class="komentarz">// KROK 4: Matematyka w PHP</span>
    echo "&lt;p&gt;Matematyka w PHP: 5 + 3 = " . (5 + 3) . "&lt;/p&gt;";
    <span class="komentarz">// (5 + 3) wykonuje obliczenie i zwraca wynik: 8</span>
    <span class="komentarz">// Następnie łączymy tekst z wynikiem działania</span>
    <span class="komentarz">?&gt;</span>
&lt;/div&gt;

<span class="komentarz">// PODSUMOWANIE:</span>
<span class="komentarz">// 1. PHP kod umieszczamy między &lt;?php i ?&gt;</span>
<span class="komentarz">// 2. echo wyświetla tekst na stronie</span>
<span class="komentarz">// 3. Kropka (.) łączy teksty</span>
<span class="komentarz">// 4. Każda instrukcja kończy się średnikiem ;</span>
<span class="komentarz">// 5. Możemy wykonywać obliczenia matematyczne</span>
</pre>
        </div>

        <div style="margin-top: 30px; padding: 15px; background-color: #fff3cd; border-left: 4px solid #ffc107;">
            <strong>💡 Zadanie do wypróbowania:</strong><br>
            Spróbuj zmienić ten kod! Dodaj własne wyświetlanie tekstu używając <code>echo</code>.
        </div>
    </div>

    <script>
        // Funkcja JavaScript do pokazywania/ukrywania kodu
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
