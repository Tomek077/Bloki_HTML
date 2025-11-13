<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Część 2 - Odczyt z bazy danych</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container fade-in">
        <!-- NAGŁÓWEK -->
        <div class="header">
            <h1>📖 Część 2: Odczyt Danych z Bazy</h1>
            <p>Nauczymy się jak odczytać i wyświetlić dane z bazy MySQL</p>
        </div>

        <!-- NAWIGACJA -->
        <div class="navigation">
            <a href="index.html" class="nav-button">🏠 Strona główna</a>
            <a href="czesc1_zapis.php" class="nav-button">📝 Część 1: Zapis</a>
            <a href="czesc2_odczyt.php" class="nav-button active">📖 Część 2: Odczyt</a>
            <a href="czesc3_filtrowanie.php" class="nav-button">🔍 Część 3: Filtrowanie</a>
        </div>

        <!-- TREŚĆ -->
        <div class="content">
            <!-- INFORMACJA O NAUCE -->
            <div class="info-box">
                <h3>🎯 Co się nauczysz?</h3>
                <ul>
                    <li>Jak odczytać dane z bazy MySQL</li>
                    <li>Jak wyświetlić dane jako punktory (ul)</li>
                    <li>Jak wyświetlić dane jako listę numerowaną (ol)</li>
                    <li>Jak wyświetlić dane w tabeli HTML</li>
                </ul>
            </div>

            <?php
            // =============================================
            // CZĘŚĆ PHP - ODCZYT DANYCH Z BAZY
            // =============================================

            // KROK 1: Pobieramy połączenie z bazą danych
            require_once 'db_config.php';

            // KROK 2: Tworzymy zapytanie SQL SELECT
            // SELECT * FROM - pobiera wszystkie dane z tabeli
            // ORDER BY id DESC - sortuje od najnowszych
            $sql = "SELECT * FROM uczniowie ORDER BY id DESC";

            // KROK 3: Wykonujemy zapytanie
            $result = mysqli_query($conn, $sql);

            // KROK 4: Sprawdzamy czy są jakieś dane
            if (mysqli_num_rows($result) > 0) {
                // Mamy dane! Możemy je wyświetlić
                $liczba_uczniow = mysqli_num_rows($result);

                echo '<div class="success-box">';
                echo '<h3>✅ Połączenie z bazą danych działa!</h3>';
                echo '<p>Znaleziono <strong>' . $liczba_uczniow . '</strong> uczniów w bazie danych.</p>';
                echo '</div>';
            } else {
                // Brak danych
                echo '<div class="warning-box">';
                echo '<h3>⚠️ Brak danych</h3>';
                echo '<p>W bazie danych nie ma jeszcze żadnych uczniów.</p>';
                echo '<p><a href="czesc1_zapis.php">Przejdź do Części 1 aby dodać uczniów</a></p>';
                echo '</div>';
            }
            ?>

            <!-- SEKCJA 1: WYŚWIETLANIE JAKO PUNKTORY -->
            <div class="section">
                <h2 class="section-title">🔸 Sposób 1: Lista wypunktowana (ul)</h2>

                <div class="info-box">
                    <strong>💡 Co to jest?</strong> Lista wypunktowana (ul = unordered list) wyświetla dane jako punkty bez numeracji.
                </div>

                <?php
                // Resetujemy wskaźnik wyniku do początku
                mysqli_data_seek($result, 0);

                // Sprawdzamy czy są dane
                if (mysqli_num_rows($result) > 0) {
                    echo '<ul class="data-list">';

                    // PĘTLA: Pobieramy każdy wiersz z bazy danych
                    while($row = mysqli_fetch_assoc($result)) {
                        // $row to tablica z danymi jednego ucznia
                        // mysqli_fetch_assoc() pobiera kolejny wiersz jako tablicę asocjacyjną

                        echo '<li>';
                        echo '<strong>🆔 ID:</strong> ' . $row['id'] . ' | ';
                        echo '<strong>👤 Imię:</strong> ' . htmlspecialchars($row['imie']) . ' | ';
                        echo '<strong>👥 Nazwisko:</strong> ' . htmlspecialchars($row['nazwisko']) . ' | ';
                        echo '<strong>🎂 Wiek:</strong> ' . $row['wiek'] . ' lat | ';
                        echo '<strong>🏫 Klasa:</strong> ' . htmlspecialchars($row['klasa']);
                        echo '</li>';
                    }

                    echo '</ul>';
                }
                ?>
            </div>

            <!-- SEKCJA 2: WYŚWIETLANIE JAKO LISTA NUMEROWANA -->
            <div class="section">
                <h2 class="section-title">🔢 Sposób 2: Lista numerowana (ol)</h2>

                <div class="info-box">
                    <strong>💡 Co to jest?</strong> Lista numerowana (ol = ordered list) wyświetla dane z kolejnymi numerami 1, 2, 3...
                </div>

                <?php
                // Resetujemy wskaźnik wyniku do początku
                mysqli_data_seek($result, 0);

                // Sprawdzamy czy są dane
                if (mysqli_num_rows($result) > 0) {
                    echo '<ol class="numbered-list">';

                    // PĘTLA: Pobieramy każdy wiersz
                    while($row = mysqli_fetch_assoc($result)) {
                        echo '<li>';
                        echo '<strong>' . htmlspecialchars($row['imie']) . ' ' . htmlspecialchars($row['nazwisko']) . '</strong> ';
                        echo '(wiek: ' . $row['wiek'] . ' lat, klasa: ' . htmlspecialchars($row['klasa']) . ')';
                        echo '</li>';
                    }

                    echo '</ol>';
                }
                ?>
            </div>

            <!-- SEKCJA 3: WYŚWIETLANIE W TABELI -->
            <div class="section">
                <h2 class="section-title">📊 Sposób 3: Tabela HTML</h2>

                <div class="info-box">
                    <strong>💡 Co to jest?</strong> Tabela HTML to najczęstszy sposób prezentacji danych z bazy. Dane są uporządkowane w wiersze i kolumny.
                </div>

                <?php
                // Resetujemy wskaźnik wyniku do początku
                mysqli_data_seek($result, 0);

                // Sprawdzamy czy są dane
                if (mysqli_num_rows($result) > 0) {
                    echo '<table>';

                    // NAGŁÓWEK TABELI
                    echo '<thead>';
                    echo '<tr>';
                    echo '<th>🆔 ID</th>';
                    echo '<th>👤 Imię</th>';
                    echo '<th>👥 Nazwisko</th>';
                    echo '<th>🎂 Wiek</th>';
                    echo '<th>🏫 Klasa</th>';
                    echo '<th>📅 Data dodania</th>';
                    echo '</tr>';
                    echo '</thead>';

                    // TREŚĆ TABELI
                    echo '<tbody>';

                    // PĘTLA: Pobieramy każdy wiersz
                    while($row = mysqli_fetch_assoc($result)) {
                        echo '<tr>';
                        echo '<td>' . $row['id'] . '</td>';
                        echo '<td>' . htmlspecialchars($row['imie']) . '</td>';
                        echo '<td>' . htmlspecialchars($row['nazwisko']) . '</td>';
                        echo '<td>' . $row['wiek'] . ' lat</td>';
                        echo '<td>' . htmlspecialchars($row['klasa']) . '</td>';
                        echo '<td>' . date('Y-m-d H:i', strtotime($row['data_dodania'])) . '</td>';
                        echo '</tr>';
                    }

                    echo '</tbody>';
                    echo '</table>';
                }

                // KROK 5: Zamykamy połączenie z bazą danych
                mysqli_close($conn);
                ?>
            </div>

            <!-- JAK TO DZIAŁA? -->
            <div class="section">
                <h2 class="section-title">🤔 Jak to działa krok po kroku?</h2>

                <div class="step">
                    <span class="step-number">1</span>
                    <strong>Łączymy się z bazą</strong> - używamy require_once 'db_config.php' aby pobrać połączenie
                </div>

                <div class="step">
                    <span class="step-number">2</span>
                    <strong>Tworzymy zapytanie SELECT</strong> - SELECT * FROM uczniowie pobiera wszystkie dane z tabeli
                </div>

                <div class="step">
                    <span class="step-number">3</span>
                    <strong>Wykonujemy zapytanie</strong> - mysqli_query() wysyła zapytanie do bazy MySQL
                </div>

                <div class="step">
                    <span class="step-number">4</span>
                    <strong>Sprawdzamy ile jest wyników</strong> - mysqli_num_rows() zwraca liczbę wierszy
                </div>

                <div class="step">
                    <span class="step-number">5</span>
                    <strong>Pobieramy dane w pętli</strong> - mysqli_fetch_assoc() pobiera kolejny wiersz jako tablicę
                </div>

                <div class="step">
                    <span class="step-number">6</span>
                    <strong>Wyświetlamy dane</strong> - używamy echo aby pokazać dane w HTML
                </div>

                <div class="step">
                    <span class="step-number">7</span>
                    <strong>Zamykamy połączenie</strong> - mysqli_close() kończy połączenie z bazą
                </div>
            </div>

            <!-- WAŻNE FUNKCJE -->
            <div class="section">
                <h2 class="section-title">📚 Ważne funkcje PHP + MySQL</h2>

                <div class="card">
                    <h3 class="card-title">mysqli_query($conn, $sql)</h3>
                    <p>Wykonuje zapytanie SQL. Dla SELECT zwraca obiekt z wynikami.</p>
                    <div class="code-block">$result = mysqli_query($conn, "SELECT * FROM uczniowie");</div>
                </div>

                <div class="card">
                    <h3 class="card-title">mysqli_num_rows($result)</h3>
                    <p>Zwraca liczbę wierszy w wyniku zapytania SELECT.</p>
                    <div class="code-block">$liczba = mysqli_num_rows($result);  // np. 8</div>
                </div>

                <div class="card">
                    <h3 class="card-title">mysqli_fetch_assoc($result)</h3>
                    <p>Pobiera jeden wiersz jako tablicę asocjacyjną. W pętli while pobiera kolejne wiersze.</p>
                    <div class="code-block">while($row = mysqli_fetch_assoc($result)) {
    echo $row['imie'];
}</div>
                </div>

                <div class="card">
                    <h3 class="card-title">mysqli_data_seek($result, 0)</h3>
                    <p>Resetuje wskaźnik wyniku do początku. Używamy gdy chcemy przejść przez dane ponownie.</p>
                    <div class="code-block">mysqli_data_seek($result, 0);  // wraca na początek</div>
                </div>

                <div class="card">
                    <h3 class="card-title">htmlspecialchars($text)</h3>
                    <p>Zabezpiecza przed atakami XSS - zamienia znaki specjalne na bezpieczne encje HTML.</p>
                    <div class="code-block">echo htmlspecialchars($row['imie']);  // bezpieczne wyświetlanie</div>
                </div>
            </div>

            <!-- PORÓWNANIE METOD -->
            <div class="section">
                <h2 class="section-title">⚖️ Która metoda jest najlepsza?</h2>

                <div class="card">
                    <h3 class="card-title">🔸 Lista wypunktowana (ul)</h3>
                    <p><strong>✅ Zalety:</strong> Prosta, szybka do zrobienia, dobra dla małej ilości danych</p>
                    <p><strong>❌ Wady:</strong> Trudna do czytania przy dużej ilości danych</p>
                    <p><strong>📌 Najlepsza dla:</strong> Krótkich list, menu, prostych zestawień</p>
                </div>

                <div class="card">
                    <h3 class="card-title">🔢 Lista numerowana (ol)</h3>
                    <p><strong>✅ Zalety:</strong> Pokazuje kolejność, łatwa do odniesienia się (np. "punkt 3")</p>
                    <p><strong>❌ Wady:</strong> Zabiera więcej miejsca niż tabela</p>
                    <p><strong>📌 Najlepsza dla:</strong> Rankingów, instrukcji krok po kroku, kolejności</p>
                </div>

                <div class="card">
                    <h3 class="card-title">📊 Tabela HTML</h3>
                    <p><strong>✅ Zalety:</strong> Przejrzysta, profesjonalna, łatwa do czytania, dużo danych</p>
                    <p><strong>❌ Wady:</strong> Więcej kodu do napisania</p>
                    <p><strong>📌 Najlepsza dla:</strong> Dużej ilości danych, baz danych, raportów</p>
                </div>
            </div>
        </div>

        <!-- STOPKA -->
        <div class="footer">
            <p>📚 Tutorial PHP + MySQL dla uczniów | 2024</p>
            <p>
                <a href="czesc1_zapis.php" style="color: #667eea; font-weight: bold;">← Poprzednia lekcja</a> |
                <a href="czesc3_filtrowanie.php" style="color: #667eea; font-weight: bold;">Następna lekcja: Filtrowanie →</a>
            </p>
        </div>
    </div>
</body>
</html>
