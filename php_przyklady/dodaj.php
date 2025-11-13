<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dodawanie ucznia - Wynik</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            padding: 20px;
        }
        .container {
            max-width: 700px;
            margin: 0 auto;
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .success {
            background-color: #d4edda;
            border: 2px solid #28a745;
            color: #155724;
            padding: 20px;
            border-radius: 5px;
            margin: 20px 0;
        }
        .error {
            background-color: #f8d7da;
            border: 2px solid #dc3545;
            color: #721c24;
            padding: 20px;
            border-radius: 5px;
            margin: 20px 0;
        }
        .info {
            background-color: #fff3cd;
            border: 2px solid #ffc107;
            color: #856404;
            padding: 20px;
            border-radius: 5px;
            margin: 20px 0;
        }
        .code-explanation {
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
        h1 { color: #2c3e50; }
        h2 { color: #34495e; margin-top: 30px; }
    </style>
</head>
<body>

<div class="container">
    <h1>📝 Wynik dodawania ucznia</h1>

<?php
/*
    ===================================================
    PLIK DODAJ.PHP - ZAPISUJE DANE Z FORMULARZA DO BAZY
    ===================================================

    Ten plik odbiera dane z formularza i zapisuje je w bazie danych.

    KROKI:
    1. Połącz się z bazą danych
    2. Pobierz dane z formularza ($_POST)
    3. Przygotuj zapytanie SQL (INSERT INTO)
    4. Wykonaj zapytanie
    5. Sprawdź czy się udało
    6. Zamknij połączenie

    ===================================================
*/

// ========== KROK 1: POŁĄCZENIE Z BAZĄ ==========
// Wczytujemy plik z połączeniem do bazy danych

include("polaczenie.php");

echo "<div class='info'>";
echo "<strong>KROK 1:</strong> Połączono z bazą danych ✅<br>";
echo "Użyto pliku: <code>polaczenie.php</code>";
echo "</div>";


// ========== KROK 2: POBIERANIE DANYCH Z FORMULARZA ==========
// $_POST['nazwa'] - pobiera wartość z pola o name="nazwa"
// UWAGA: 'imie' musi być takie samo jak name="imie" w formularzu!

$imie = $_POST['imie'];           // Pobiera wartość z pola name="imie"
$nazwisko = $_POST['nazwisko'];   // Pobiera wartość z pola name="nazwisko"
$klasa = $_POST['klasa'];         // Pobiera wartość z pola name="klasa"
$email = $_POST['email'];         // Pobiera wartość z pola name="email"

echo "<div class='info'>";
echo "<strong>KROK 2:</strong> Pobrano dane z formularza ✅<br>";
echo "<ul>";
echo "<li>Imię: <strong>$imie</strong> (z pola name='imie')</li>";
echo "<li>Nazwisko: <strong>$nazwisko</strong> (z pola name='nazwisko')</li>";
echo "<li>Klasa: <strong>$klasa</strong> (z pola name='klasa')</li>";
echo "<li>Email: <strong>$email</strong> (z pola name='email')</li>";
echo "</ul>";
echo "</div>";


// ========== KROK 3: PRZYGOTOWANIE ZAPYTANIA SQL ==========
// INSERT INTO - wstawia nowe dane do tabeli
// UWAGA: Nazwy kolumn (imie, nazwisko, klasa, email) MUSZĄ być
//        takie same jak w Twojej tabeli w bazie danych!

$sql = "INSERT INTO uczniowie (imie, nazwisko, klasa, email)
        VALUES ('$imie', '$nazwisko', '$klasa', '$email')";

echo "<div class='info'>";
echo "<strong>KROK 3:</strong> Przygotowano zapytanie SQL ✅<br>";
echo "Zapytanie: <div class='code-explanation'>$sql</div>";
echo "<strong>Wyjaśnienie:</strong><br>";
echo "<ul>";
echo "<li><code>INSERT INTO uczniowie</code> - wstaw do tabeli 'uczniowie'</li>";
echo "<li><code>(imie, nazwisko, klasa, email)</code> - nazwy kolumn w tabeli</li>";
echo "<li><code>VALUES ('$imie', '$nazwisko', ...)</code> - wartości do wstawienia</li>";
echo "</ul>";
echo "</div>";


// ========== KROK 4: WYKONANIE ZAPYTANIA ==========
// mysqli_query($conn, $sql) - wykonuje zapytanie SQL
// $conn - połączenie z bazy (z pliku polaczenie.php)
// $sql - zapytanie SQL (przygotowane w KROKU 3)

if (mysqli_query($conn, $sql)) {

    // ===== SUKCES! =====
    echo "<div class='success'>";
    echo "<h2>✅ SUKCES!</h2>";
    echo "<p>Uczeń <strong>$imie $nazwisko</strong> został pomyślnie dodany do bazy danych!</p>";
    echo "<p>Dane zostały zapisane w tabeli <strong>uczniowie</strong>.</p>";
    echo "</div>";

    echo "<div class='info'>";
    echo "<strong>KROK 4:</strong> Zapytanie wykonane pomyślnie! ✅<br>";
    echo "Funkcja użyta: <code>mysqli_query(\$conn, \$sql)</code>";
    echo "</div>";

} else {

    // ===== BŁĄD! =====
    echo "<div class='error'>";
    echo "<h2>❌ BŁĄD!</h2>";
    echo "<p>Nie udało się dodać ucznia do bazy danych.</p>";
    echo "<p><strong>Komunikat błędu:</strong> " . mysqli_error($conn) . "</p>";
    echo "</div>";

    echo "<div class='info'>";
    echo "<strong>Najczęstsze przyczyny błędów:</strong>";
    echo "<ul>";
    echo "<li>Nazwy kolumn w SQL nie pasują do kolumn w tabeli</li>";
    echo "<li>Tabela 'uczniowie' nie istnieje w bazie danych</li>";
    echo "<li>Nie zaimportowano bazy danych (plik .sql)</li>";
    echo "<li>Błąd w składni SQL (brak cudzysłowu, przecinka, itp.)</li>";
    echo "</ul>";
    echo "</div>";
}


// ========== KROK 5: ZAMKNIĘCIE POŁĄCZENIA ==========
// Zawsze zamykaj połączenie po zakończeniu operacji!

mysqli_close($conn);

echo "<div class='info'>";
echo "<strong>KROK 5:</strong> Połączenie z bazą zamknięte ✅<br>";
echo "Funkcja użyta: <code>mysqli_close(\$conn)</code>";
echo "</div>";

?>

    <!-- Przyciski powrotu -->
    <div class="back-link">
        <a href="formularz.html">← Dodaj kolejnego ucznia</a>
        <a href="lista.php">📋 Zobacz listę uczniów</a>
        <a href="../index.html">🏠 Strona główna</a>
    </div>

    <!-- Dodatkowe wyjaśnienia dla ucznia -->
    <h2>📚 Podsumowanie dla Ciebie:</h2>

    <div class="info">
        <h3>🔍 Co się właśnie stało?</h3>
        <ol>
            <li><strong>Połączyłeś się z bazą</strong> - używając <code>include("polaczenie.php")</code></li>
            <li><strong>Złapałeś dane z formularza</strong> - używając <code>$_POST['nazwa_pola']</code></li>
            <li><strong>Przygotowałeś zapytanie SQL</strong> - używając <code>INSERT INTO</code></li>
            <li><strong>Wykonałeś zapytanie</strong> - używając <code>mysqli_query()</code></li>
            <li><strong>Sprawdziłeś czy się udało</strong> - używając <code>if</code></li>
            <li><strong>Zamknąłeś połączenie</strong> - używając <code>mysqli_close()</code></li>
        </ol>

        <h3>💡 Najważniejsze rzeczy do zapamiętania:</h3>
        <ul>
            <li><code>$_POST['imie']</code> - nazwa musi być taka sama jak <code>name="imie"</code> w formularzu!</li>
            <li><code>INSERT INTO tabela (kolumna1, kolumna2) VALUES ('wartość1', 'wartość2')</code></li>
            <li>Nazwy kolumn w SQL muszą być takie same jak w bazie danych!</li>
            <li>Tekst w SQL zawsze w apostrofach: <code>'Jan'</code></li>
            <li>Liczby BEZ apostrofów: <code>18</code></li>
        </ul>

        <h3>⚠️ Najczęstsze błędy:</h3>
        <ul>
            <li>❌ <code>$_POST['Imie']</code> ≠ <code>name="imie"</code> (wielkie/małe litery się liczą!)</li>
            <li>❌ Brak apostrofów: <code>VALUES ($imie, ...)</code> - powinno być <code>VALUES ('$imie', ...)</code></li>
            <li>❌ Złe nazwy kolumn: sprawdź w phpMyAdmin jak nazywają się kolumny!</li>
            <li>❌ Nie uruchomiony XAMPP (Apache + MySQL)</li>
        </ul>
    </div>

</div>

</body>
</html>
