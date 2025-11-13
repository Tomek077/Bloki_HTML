<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Część 1 - Zapis do bazy danych</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container fade-in">
        <!-- NAGŁÓWEK -->
        <div class="header">
            <h1>📝 Część 1: Formularz i Zapis do Bazy</h1>
            <p>Nauczymy się jak zapisać dane z formularza do bazy MySQL</p>
        </div>

        <!-- NAWIGACJA -->
        <div class="navigation">
            <a href="index.html" class="nav-button">🏠 Strona główna</a>
            <a href="czesc1_zapis.php" class="nav-button active">📝 Część 1: Zapis</a>
            <a href="czesc2_odczyt.php" class="nav-button">📖 Część 2: Odczyt</a>
            <a href="czesc3_filtrowanie.php" class="nav-button">🔍 Część 3: Filtrowanie</a>
        </div>

        <!-- TREŚĆ -->
        <div class="content">
            <!-- INFORMACJA O NAUCE -->
            <div class="info-box">
                <h3>🎯 Co się nauczysz?</h3>
                <ul>
                    <li>Jak stworzyć formularz HTML</li>
                    <li>Jak odebrać dane z formularza w PHP</li>
                    <li>Jak połączyć się z bazą danych MySQL</li>
                    <li>Jak zapisać dane do bazy używając mysqli</li>
                </ul>
            </div>

            <?php
            // =============================================
            // CZĘŚĆ PHP - OBSŁUGA FORMULARZA
            // =============================================

            // Sprawdzamy czy formularz został wysłany
            // Metoda POST oznacza, że dane zostały wysłane z formularza
            if ($_SERVER["REQUEST_METHOD"] == "POST") {

                // KROK 1: Pobieramy połączenie z bazą danych
                require_once 'db_config.php';

                // KROK 2: Odbieramy dane z formularza
                // $_POST to specjalna tablica która zawiera dane z formularza
                $imie = $_POST['imie'];
                $nazwisko = $_POST['nazwisko'];
                $wiek = $_POST['wiek'];
                $klasa = $_POST['klasa'];

                // KROK 3: Zabezpieczamy dane przed SQL Injection
                // mysqli_real_escape_string() usuwa niebezpieczne znaki
                $imie = mysqli_real_escape_string($conn, $imie);
                $nazwisko = mysqli_real_escape_string($conn, $nazwisko);
                $wiek = mysqli_real_escape_string($conn, $wiek);
                $klasa = mysqli_real_escape_string($conn, $klasa);

                // KROK 4: Tworzymy zapytanie SQL INSERT
                // INSERT INTO - dodaje nowe dane do tabeli
                $sql = "INSERT INTO uczniowie (imie, nazwisko, wiek, klasa)
                        VALUES ('$imie', '$nazwisko', '$wiek', '$klasa')";

                // KROK 5: Wykonujemy zapytanie
                if (mysqli_query($conn, $sql)) {
                    // Jeśli się udało - pokazujemy komunikat sukcesu
                    echo '<div class="success-box">';
                    echo '<h3>✅ SUKCES!</h3>';
                    echo '<p><strong>Uczeń został dodany do bazy danych!</strong></p>';
                    echo '<p>📌 Imię: ' . htmlspecialchars($imie) . '</p>';
                    echo '<p>📌 Nazwisko: ' . htmlspecialchars($nazwisko) . '</p>';
                    echo '<p>📌 Wiek: ' . htmlspecialchars($wiek) . '</p>';
                    echo '<p>📌 Klasa: ' . htmlspecialchars($klasa) . '</p>';
                    echo '</div>';
                } else {
                    // Jeśli wystąpił błąd - pokazujemy komunikat błędu
                    echo '<div class="error-box">';
                    echo '<h3>❌ BŁĄD!</h3>';
                    echo '<p>Nie udało się dodać ucznia do bazy danych.</p>';
                    echo '<p>Szczegóły błędu: ' . mysqli_error($conn) . '</p>';
                    echo '</div>';
                }

                // KROK 6: Zamykamy połączenie z bazą danych
                mysqli_close($conn);
            }
            ?>

            <!-- SEKCJA Z FORMULARZEM -->
            <div class="section">
                <h2 class="section-title">📋 Formularz dodawania ucznia</h2>

                <div class="warning-box">
                    <strong>⚠️ WAŻNE!</strong> Przed użyciem formularza musisz:
                    <ol>
                        <li>Uruchomić serwer MySQL (np. XAMPP, WAMP)</li>
                        <li>Utworzyć bazę danych używając pliku <code>create_database.sql</code></li>
                        <li>Sprawdzić ustawienia w pliku <code>db_config.php</code></li>
                    </ol>
                </div>

                <!-- FORMULARZ HTML -->
                <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

                    <div class="form-group">
                        <label for="imie">👤 Imię ucznia:</label>
                        <input type="text" id="imie" name="imie" required
                               placeholder="np. Jan">
                    </div>

                    <div class="form-group">
                        <label for="nazwisko">👥 Nazwisko ucznia:</label>
                        <input type="text" id="nazwisko" name="nazwisko" required
                               placeholder="np. Kowalski">
                    </div>

                    <div class="form-group">
                        <label for="wiek">🎂 Wiek ucznia:</label>
                        <input type="number" id="wiek" name="wiek" required
                               min="6" max="20" placeholder="np. 15">
                    </div>

                    <div class="form-group">
                        <label for="klasa">🏫 Klasa:</label>
                        <select id="klasa" name="klasa" required>
                            <option value="">-- Wybierz klasę --</option>
                            <option value="1A">1A</option>
                            <option value="1B">1B</option>
                            <option value="2A">2A</option>
                            <option value="2B">2B</option>
                            <option value="3A">3A</option>
                            <option value="3B">3B</option>
                            <option value="3C">3C</option>
                        </select>
                    </div>

                    <button type="submit" class="btn">
                        ➕ Dodaj ucznia do bazy
                    </button>
                </form>
            </div>

            <!-- JAK TO DZIAŁA? -->
            <div class="section">
                <h2 class="section-title">🤔 Jak to działa krok po kroku?</h2>

                <div class="step">
                    <span class="step-number">1</span>
                    <strong>Wypełniasz formularz</strong> - wpisujesz dane ucznia (imię, nazwisko, wiek, klasa)
                </div>

                <div class="step">
                    <span class="step-number">2</span>
                    <strong>Klikasz przycisk "Dodaj"</strong> - formularz wysyła dane metodą POST do tego samego pliku PHP
                </div>

                <div class="step">
                    <span class="step-number">3</span>
                    <strong>PHP odbiera dane</strong> - używamy $_POST['nazwa_pola'] aby pobrać wartości z formularza
                </div>

                <div class="step">
                    <span class="step-number">4</span>
                    <strong>Zabezpieczamy dane</strong> - używamy mysqli_real_escape_string() aby chronić się przed atakami
                </div>

                <div class="step">
                    <span class="step-number">5</span>
                    <strong>Tworzymy zapytanie SQL</strong> - INSERT INTO uczniowie VALUES (...)
                </div>

                <div class="step">
                    <span class="step-number">6</span>
                    <strong>Wykonujemy zapytanie</strong> - mysqli_query() wysyła zapytanie do bazy MySQL
                </div>

                <div class="step">
                    <span class="step-number">7</span>
                    <strong>Sprawdzamy rezultat</strong> - wyświetlamy komunikat sukcesu lub błędu
                </div>
            </div>

            <!-- WAŻNE FUNKCJE -->
            <div class="section">
                <h2 class="section-title">📚 Ważne funkcje PHP + MySQL</h2>

                <div class="card">
                    <h3 class="card-title">mysqli_connect()</h3>
                    <p>Łączy się z bazą danych MySQL. Potrzebuje: host, użytkownik, hasło, nazwa bazy.</p>
                    <div class="code-block">mysqli_connect("localhost", "root", "", "szkola_db");</div>
                </div>

                <div class="card">
                    <h3 class="card-title">mysqli_real_escape_string()</h3>
                    <p>Zabezpiecza dane przed SQL Injection - usuwa niebezpieczne znaki.</p>
                    <div class="code-block">$bezpieczne_imie = mysqli_real_escape_string($conn, $imie);</div>
                </div>

                <div class="card">
                    <h3 class="card-title">mysqli_query()</h3>
                    <p>Wykonuje zapytanie SQL w bazie danych. Zwraca TRUE/FALSE dla INSERT.</p>
                    <div class="code-block">mysqli_query($conn, $sql);</div>
                </div>

                <div class="card">
                    <h3 class="card-title">$_POST[]</h3>
                    <p>Tablica zawierająca dane wysłane z formularza metodą POST.</p>
                    <div class="code-block">$imie = $_POST['imie'];</div>
                </div>
            </div>
        </div>

        <!-- STOPKA -->
        <div class="footer">
            <p>📚 Tutorial PHP + MySQL dla uczniów | 2024</p>
            <p><a href="czesc2_odczyt.php" style="color: #667eea; font-weight: bold;">Następna lekcja: Odczyt danych →</a></p>
        </div>
    </div>
</body>
</html>
