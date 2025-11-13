<?php
/**
 * =============================================
 * PLIK KONFIGURACJI BAZY DANYCH
 * =============================================
 * Ten plik zawiera ustawienia połączenia z bazą danych MySQL
 *
 * WAŻNE: Musisz zmienić poniższe wartości na swoje własne!
 */

// DANE DO POŁĄCZENIA Z BAZĄ DANYCH
// Zmień te wartości na swoje własne:
$db_host = "localhost";        // Adres serwera (zwykle localhost)
$db_user = "root";             // Nazwa użytkownika (domyślnie root)
$db_password = "";             // Hasło do bazy (domyślnie puste)
$db_name = "szkola_db";        // Nazwa bazy danych

// TWORZYMY POŁĄCZENIE Z BAZĄ DANYCH
// Używamy funkcji mysqli_connect do połączenia
$conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);

// SPRAWDZAMY CZY POŁĄCZENIE SIĘ POWIODŁO
if (!$conn) {
    // Jeśli połączenie nie udało się, wyświetlamy błąd
    die("❌ BŁĄD: Nie można połączyć się z bazą danych: " . mysqli_connect_error());
}

// USTAWIAMY KODOWANIE ZNAKÓW NA UTF-8
// Dzięki temu polskie znaki będą się poprawnie wyświetlać
mysqli_set_charset($conn, "utf8mb4");

// Jeśli wszystko OK, nie wyświetlamy niczego
// (możesz odkomentować poniższą linię dla testów)
// echo "✅ Połączenie z bazą danych działa!";
?>
