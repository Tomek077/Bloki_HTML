<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Część 3 - Filtrowanie danych</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container fade-in">
        <!-- NAGŁÓWEK -->
        <div class="header">
            <h1>🔍 Część 3: Filtrowanie Danych</h1>
            <p>Nauczymy się jak szukać i filtrować dane w bazie MySQL</p>
        </div>

        <!-- NAWIGACJA -->
        <div class="navigation">
            <a href="index.html" class="nav-button">🏠 Strona główna</a>
            <a href="czesc1_zapis.php" class="nav-button">📝 Część 1: Zapis</a>
            <a href="czesc2_odczyt.php" class="nav-button">📖 Część 2: Odczyt</a>
            <a href="czesc3_filtrowanie.php" class="nav-button active">🔍 Część 3: Filtrowanie</a>
        </div>

        <!-- TREŚĆ -->
        <div class="content">
            <!-- INFORMACJA O NAUCE -->
            <div class="info-box">
                <h3>🎯 Co się nauczysz?</h3>
                <ul>
                    <li>Jak stworzyć formularz wyszukiwania</li>
                    <li>Jak filtrować dane po nazwisku (pole tekstowe)</li>
                    <li>Jak filtrować dane po klasie (select)</li>
                    <li>Jak używać WHERE w zapytaniach SQL</li>
                    <li>Jak łączyć różne filtry razem</li>
                </ul>
            </div>

            <!-- FORMULARZ FILTROWANIA -->
            <div class="section">
                <h2 class="section-title">🔎 Formularz wyszukiwania</h2>

                <div class="warning-box">
                    <strong>💡 Jak używać?</strong>
                    <ul>
                        <li>Możesz wpisać nazwisko (lub część nazwiska) w pole tekstowe</li>
                        <li>Możesz wybrać klasę z listy rozwijanej</li>
                        <li>Możesz użyć obu filtrów jednocześnie</li>
                        <li>Zostaw puste aby pokazać wszystkich uczniów</li>
                    </ul>
                </div>

                <!-- FORMULARZ -->
                <form method="GET" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <div class="form-group">
                        <label for="nazwisko">👥 Wyszukaj po nazwisku:</label>
                        <input type="text" id="nazwisko" name="nazwisko"
                               placeholder="Wpisz nazwisko lub jego część..."
                               value="<?php echo isset($_GET['nazwisko']) ? htmlspecialchars($_GET['nazwisko']) : ''; ?>">
                        <small style="color: #666;">Przykład: wpisz "Kowalski" lub "owski"</small>
                    </div>

                    <div class="form-group">
                        <label for="klasa">🏫 Wybierz klasę:</label>
                        <select id="klasa" name="klasa">
                            <option value="">-- Wszystkie klasy --</option>
                            <option value="1A" <?php echo (isset($_GET['klasa']) && $_GET['klasa'] == '1A') ? 'selected' : ''; ?>>1A</option>
                            <option value="1B" <?php echo (isset($_GET['klasa']) && $_GET['klasa'] == '1B') ? 'selected' : ''; ?>>1B</option>
                            <option value="2A" <?php echo (isset($_GET['klasa']) && $_GET['klasa'] == '2A') ? 'selected' : ''; ?>>2A</option>
                            <option value="2B" <?php echo (isset($_GET['klasa']) && $_GET['klasa'] == '2B') ? 'selected' : ''; ?>>2B</option>
                            <option value="3A" <?php echo (isset($_GET['klasa']) && $_GET['klasa'] == '3A') ? 'selected' : ''; ?>>3A</option>
                            <option value="3B" <?php echo (isset($_GET['klasa']) && $_GET['klasa'] == '3B') ? 'selected' : ''; ?>>3B</option>
                            <option value="3C" <?php echo (isset($_GET['klasa']) && $_GET['klasa'] == '3C') ? 'selected' : ''; ?>>3C</option>
                        </select>
                    </div>

                    <button type="submit" class="btn">
                        🔍 Szukaj uczniów
                    </button>

                    <a href="czesc3_filtrowanie.php" class="btn" style="background: #6c757d; margin-left: 10px; text-decoration: none; display: inline-block;">
                        🔄 Wyczyść filtry
                    </a>
                </form>
            </div>

            <?php
            // =============================================
            // CZĘŚĆ PHP - FILTROWANIE DANYCH
            // =============================================

            // KROK 1: Pobieramy połączenie z bazą danych
            require_once 'db_config.php';

            // KROK 2: Pobieramy wartości filtrów z formularza
            // Używamy GET zamiast POST, bo chcemy aby można było udostępnić link
            $filtr_nazwisko = isset($_GET['nazwisko']) ? $_GET['nazwisko'] : '';
            $filtr_klasa = isset($_GET['klasa']) ? $_GET['klasa'] : '';

            // KROK 3: Zabezpieczamy dane
            $filtr_nazwisko = mysqli_real_escape_string($conn, $filtr_nazwisko);
            $filtr_klasa = mysqli_real_escape_string($conn, $filtr_klasa);

            // KROK 4: Budujemy zapytanie SQL z filtrami
            // Zaczynamy od podstawowego SELECT
            $sql = "SELECT * FROM uczniowie WHERE 1=1";
            // "WHERE 1=1" to trik - zawsze prawda, łatwo dodawać warunki

            // Sprawdzamy czy użytkownik wpisał nazwisko
            if (!empty($filtr_nazwisko)) {
                // LIKE '%tekst%' szuka tekstu w dowolnym miejscu
                $sql .= " AND nazwisko LIKE '%$filtr_nazwisko%'";
            }

            // Sprawdzamy czy użytkownik wybrał klasę
            if (!empty($filtr_klasa)) {
                // Szukamy dokładnego dopasowania klasy
                $sql .= " AND klasa = '$filtr_klasa'";
            }

            // Sortujemy wyniki
            $sql .= " ORDER BY nazwisko ASC, imie ASC";

            // KROK 5: Wykonujemy zapytanie
            $result = mysqli_query($conn, $sql);

            // KROK 6: Sprawdzamy ile znaleźliśmy wyników
            $liczba_wynikow = mysqli_num_rows($result);
            ?>

            <!-- WYNIKI WYSZUKIWANIA -->
            <div class="section">
                <h2 class="section-title">📊 Wyniki wyszukiwania</h2>

                <?php
                // Pokazujemy informację o filtrach
                if (!empty($filtr_nazwisko) || !empty($filtr_klasa)) {
                    echo '<div class="info-box">';
                    echo '<h3>🔍 Aktywne filtry:</h3>';
                    echo '<ul>';
                    if (!empty($filtr_nazwisko)) {
                        echo '<li><strong>Nazwisko:</strong> "' . htmlspecialchars($filtr_nazwisko) . '"</li>';
                    }
                    if (!empty($filtr_klasa)) {
                        echo '<li><strong>Klasa:</strong> ' . htmlspecialchars($filtr_klasa) . '</li>';
                    }
                    echo '</ul>';
                    echo '<p>Znaleziono: <strong>' . $liczba_wynikow . '</strong> uczniów</p>';
                    echo '</div>';
                } else {
                    echo '<div class="info-box">';
                    echo '<p>📋 Pokazuję <strong>wszystkich</strong> uczniów (brak filtrów)</p>';
                    echo '<p>Liczba uczniów: <strong>' . $liczba_wynikow . '</strong></p>';
                    echo '</div>';
                }

                // Sprawdzamy czy są jakieś wyniki
                if ($liczba_wynikow > 0) {
                    // WYŚWIETLAMY DANE W TABELI
                    echo '<table>';

                    // NAGŁÓWEK TABELI
                    echo '<thead>';
                    echo '<tr>';
                    echo '<th>🆔 ID</th>';
                    echo '<th>👤 Imię</th>';
                    echo '<th>👥 Nazwisko</th>';
                    echo '<th>🎂 Wiek</th>';
                    echo '<th>🏫 Klasa</th>';
                    echo '</tr>';
                    echo '</thead>';

                    // TREŚĆ TABELI
                    echo '<tbody>';

                    // PĘTLA: Pobieramy każdy wiersz
                    while($row = mysqli_fetch_assoc($result)) {
                        echo '<tr>';
                        echo '<td>' . $row['id'] . '</td>';

                        // Jeśli szukaliśmy po nazwisku, podświetlamy znaleziony tekst
                        $imie_display = htmlspecialchars($row['imie']);
                        $nazwisko_display = htmlspecialchars($row['nazwisko']);

                        if (!empty($filtr_nazwisko)) {
                            // Podświetlamy znaleziony fragment
                            $nazwisko_display = str_ireplace(
                                $filtr_nazwisko,
                                '<span class="highlight">' . htmlspecialchars($filtr_nazwisko) . '</span>',
                                $nazwisko_display
                            );
                        }

                        echo '<td>' . $imie_display . '</td>';
                        echo '<td>' . $nazwisko_display . '</td>';
                        echo '<td>' . $row['wiek'] . ' lat</td>';

                        // Jeśli filtrowaliśmy po klasie, podświetlamy ją
                        $klasa_display = htmlspecialchars($row['klasa']);
                        if (!empty($filtr_klasa) && $row['klasa'] == $filtr_klasa) {
                            $klasa_display = '<span class="highlight">' . $klasa_display . '</span>';
                        }

                        echo '<td>' . $klasa_display . '</td>';
                        echo '</tr>';
                    }

                    echo '</tbody>';
                    echo '</table>';
                } else {
                    // Brak wyników
                    echo '<div class="error-box">';
                    echo '<h3>❌ Brak wyników</h3>';
                    echo '<p>Nie znaleziono uczniów spełniających podane kryteria.</p>';
                    echo '<p>Spróbuj zmienić filtry lub <a href="czesc3_filtrowanie.php">wyczyść wyszukiwanie</a>.</p>';
                    echo '</div>';
                }

                // KROK 7: Zamykamy połączenie
                mysqli_close($conn);
                ?>
            </div>

            <!-- JAK TO DZIAŁA? -->
            <div class="section">
                <h2 class="section-title">🤔 Jak to działa krok po kroku?</h2>

                <div class="step">
                    <span class="step-number">1</span>
                    <strong>Wypełniasz formularz</strong> - wpisujesz nazwisko i/lub wybierasz klasę
                </div>

                <div class="step">
                    <span class="step-number">2</span>
                    <strong>Klikasz "Szukaj"</strong> - formularz wysyła dane metodą GET (widoczne w URL)
                </div>

                <div class="step">
                    <span class="step-number">3</span>
                    <strong>PHP odbiera filtry</strong> - używamy $_GET['nazwisko'] i $_GET['klasa']
                </div>

                <div class="step">
                    <span class="step-number">4</span>
                    <strong>Budujemy zapytanie SQL</strong> - dodajemy warunki WHERE dla aktywnych filtrów
                </div>

                <div class="step">
                    <span class="step-number">5</span>
                    <strong>Wykonujemy zapytanie</strong> - mysqli_query() szuka w bazie
                </div>

                <div class="step">
                    <span class="step-number">6</span>
                    <strong>Wyświetlamy wyniki</strong> - pokazujemy znalezionych uczniów w tabeli
                </div>

                <div class="step">
                    <span class="step-number">7</span>
                    <strong>Podświetlamy wyniki</strong> - używamy <span class="highlight">kolorów</span> aby pokazać co znaleźliśmy
                </div>
            </div>

            <!-- RÓŻNICE GET VS POST -->
            <div class="section">
                <h2 class="section-title">🔀 GET vs POST - Jaka jest różnica?</h2>

                <div class="card">
                    <h3 class="card-title">📤 Metoda GET</h3>
                    <p><strong>Jak działa?</strong> Dane są wysyłane w adresie URL (np. ?nazwisko=Kowalski&klasa=2A)</p>
                    <p><strong>✅ Zalety:</strong></p>
                    <ul>
                        <li>Można udostępnić link z wynikami</li>
                        <li>Można dodać stronę do zakładek</li>
                        <li>Łatwo debugować - widać parametry w URL</li>
                    </ul>
                    <p><strong>❌ Wady:</strong></p>
                    <ul>
                        <li>Dane widoczne w przeglądarce</li>
                        <li>Ograniczona długość (max ~2000 znaków)</li>
                    </ul>
                    <p><strong>📌 Używamy dla:</strong> Wyszukiwania, filtrowania, stron które można udostępnić</p>
                </div>

                <div class="card">
                    <h3 class="card-title">📥 Metoda POST</h3>
                    <p><strong>Jak działa?</strong> Dane są wysyłane "w środku" żądania HTTP (niewidoczne w URL)</p>
                    <p><strong>✅ Zalety:</strong></p>
                    <ul>
                        <li>Bezpieczniejsza - dane nie widoczne w URL</li>
                        <li>Brak limitów długości</li>
                        <li>Można wysyłać pliki</li>
                    </ul>
                    <p><strong>❌ Wady:</strong></p>
                    <ul>
                        <li>Nie można udostępnić linka</li>
                        <li>Trudniej debugować</li>
                    </ul>
                    <p><strong>📌 Używamy dla:</strong> Logowania, formularzy zapisu, wysyłania wrażliwych danych</p>
                </div>
            </div>

            <!-- WAŻNE FUNKCJE -->
            <div class="section">
                <h2 class="section-title">📚 Ważne funkcje i operatory SQL</h2>

                <div class="card">
                    <h3 class="card-title">WHERE</h3>
                    <p>Dodaje warunki do zapytania SQL - filtruje wyniki</p>
                    <div class="code-block">SELECT * FROM uczniowie WHERE klasa = '2A'</div>
                </div>

                <div class="card">
                    <h3 class="card-title">LIKE</h3>
                    <p>Szuka tekstu wg wzorca. % oznacza "dowolne znaki"</p>
                    <div class="code-block">WHERE nazwisko LIKE '%owski%'  -- znajduje "Kowalski", "Nowakowski" itd.</div>
                </div>

                <div class="card">
                    <h3 class="card-title">AND</h3>
                    <p>Łączy warunki - wszystkie muszą być spełnione</p>
                    <div class="code-block">WHERE klasa = '2A' AND wiek > 15  -- musi być 2A ORAZ wiek > 15</div>
                </div>

                <div class="card">
                    <h3 class="card-title">OR</h3>
                    <p>Łączy warunki - wystarczy że jeden jest spełniony</p>
                    <div class="code-block">WHERE klasa = '2A' OR klasa = '2B'  -- może być 2A LUB 2B</div>
                </div>

                <div class="card">
                    <h3 class="card-title">isset()</h3>
                    <p>Sprawdza czy zmienna istnieje i nie jest NULL</p>
                    <div class="code-block">if (isset($_GET['nazwisko'])) { ... }</div>
                </div>

                <div class="card">
                    <h3 class="card-title">empty()</h3>
                    <p>Sprawdza czy zmienna jest pusta (pusty string, 0, NULL, false)</p>
                    <div class="code-block">if (!empty($filtr_nazwisko)) { ... }  // jeśli nie jest puste</div>
                </div>
            </div>

            <!-- PRZYKŁADY ZAPYTAŃ -->
            <div class="section">
                <h2 class="section-title">💡 Przykłady zapytań SQL</h2>

                <div class="card">
                    <h4>🔹 Wszyscy uczniowie z klasy 2A:</h4>
                    <div class="code-block">SELECT * FROM uczniowie WHERE klasa = '2A'</div>
                </div>

                <div class="card">
                    <h4>🔹 Uczniowie z nazwiskiem zawierającym "ski":</h4>
                    <div class="code-block">SELECT * FROM uczniowie WHERE nazwisko LIKE '%ski%'</div>
                </div>

                <div class="card">
                    <h4>🔹 Uczniowie z klasy 2A którzy mają na imię Jan:</h4>
                    <div class="code-block">SELECT * FROM uczniowie WHERE klasa = '2A' AND imie = 'Jan'</div>
                </div>

                <div class="card">
                    <h4>🔹 Uczniowie z klasy 1A lub 1B:</h4>
                    <div class="code-block">SELECT * FROM uczniowie WHERE klasa = '1A' OR klasa = '1B'</div>
                </div>

                <div class="card">
                    <h4>🔹 Uczniowie starsi niż 16 lat z klasy 3:</h4>
                    <div class="code-block">SELECT * FROM uczniowie WHERE wiek > 16 AND klasa LIKE '3%'</div>
                </div>
            </div>
        </div>

        <!-- STOPKA -->
        <div class="footer">
            <p>📚 Tutorial PHP + MySQL dla uczniów | 2024</p>
            <p>
                <a href="czesc2_odczyt.php" style="color: #667eea; font-weight: bold;">← Poprzednia lekcja</a> |
                <a href="index.html" style="color: #667eea; font-weight: bold;">Wróć do strony głównej</a>
            </p>
        </div>
    </div>
</body>
</html>
