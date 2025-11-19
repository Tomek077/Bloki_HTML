<?php
/*
    ===================================================
    PLIK POŁĄCZENIA Z BAZĄ DANYCH
    ===================================================

    Ten plik służy do nawiązania połączenia z bazą danych MySQL.
    Używaj go na początku każdego pliku PHP, który musi komunikować
    się z bazą danych.

    Użycie: include("polaczenie.php");

    ===================================================
*/

// ========== DANE DO POŁĄCZENIA ==========
// WAŻNE: Zmień tylko nazwę bazy danych ($baza)!

$serwer = "localhost";      // Adres serwera - NIE ZMIENIAJ (zawsze localhost w XAMPP)
$uzytkownik = "root";       // Nazwa użytkownika - NIE ZMIENIAJ (domyślnie root w XAMPP)
$haslo = "";                // Hasło - NIE ZMIENIAJ (domyślnie puste w XAMPP)
$baza = "szkola";           // ZMIEŃ NA NAZWĘ SWOJEJ BAZY! (np. z zadania egzaminacyjnego)


// ========== NAWIĄZYWANIE POŁĄCZENIA ==========
// mysqli_connect() - funkcja PHP łącząca z bazą danych

$conn = mysqli_connect($serwer, $uzytkownik, $haslo, $baza);


// ========== SPRAWDZANIE POŁĄCZENIA ==========
// Sprawdzamy czy połączenie się udało

if (!$conn) {
    // Jeśli połączenie NIE udało się - wyświetl błąd i zakończ skrypt
    die("❌ Błąd połączenia z bazą danych: " . mysqli_connect_error());
}


// ========== USTAWIENIE KODOWANIA ==========
// utf8 - dzięki temu polskie znaki (ą, ć, ę, ł, ń, ó, ś, ź, ż) będą działać poprawnie

mysqli_set_charset($conn, "utf8");


// ========== KOMUNIKAT POWODZENIA ==========
// Jeśli dojdziesz tutaj, znaczy że połączenie działa!

// Możesz odkomentować poniższą linię, żeby sprawdzić czy połączenie działa:
// echo "✅ Połączono z bazą danych '$baza' pomyślnie!<br>";


/*
    ===================================================
    WYJAŚNIENIE DLA UCZNIA:
    ===================================================

    1. $serwer = "localhost"
       - To adres serwera MySQL
       - W XAMPP zawsze "localhost"
       - NIE ZMIENIAJ tego!

    2. $uzytkownik = "root"
       - To nazwa użytkownika bazy danych
       - W XAMPP domyślnie "root"
       - NIE ZMIENIAJ tego!

    3. $haslo = ""
       - To hasło do bazy danych
       - W XAMPP domyślnie puste (nic między cudzysłowami)
       - NIE ZMIENIAJ tego!

    4. $baza = "szkola"
       - To nazwa TWOJEJ bazy danych
       - MUSISZ to zmienić na nazwę bazy z zadania!
       - Np. jeśli w zadaniu jest baza "egzamin", zmień na: $baza = "egzamin";

    5. $conn
       - To zmienna przechowująca połączenie
       - Używasz jej we wszystkich innych plikach PHP!
       - Np: mysqli_query($conn, $sql);

    6. mysqli_connect()
       - To funkcja PHP, która łączy się z bazą
       - NIE ZMIENIAJ kolejności parametrów!

    7. if (!$conn)
       - Sprawdza czy połączenie się NIE UDAŁO
       - Jeśli nie udało się, wyświetli błąd i zakończy skrypt

    8. mysqli_set_charset($conn, "utf8")
       - Ustawia kodowanie na UTF-8
       - Dzięki temu polskie znaki działają!
       - NIE ZAPOMNIJ O TYM!

    ===================================================
    NAJCZĘSTSZE BŁĘDY:
    ===================================================

    ❌ "Access denied for user 'root'@'localhost'"
       - Sprawdź czy MySQL jest uruchomiony w XAMPP!

    ❌ "Unknown database 'szkola'"
       - Sprawdź czy nazwa bazy w $baza jest poprawna!
       - Sprawdź czy zaimportowałeś bazę w phpMyAdmin!

    ❌ Dziwne znaki zamiast polskich liter
       - Dodaj: mysqli_set_charset($conn, "utf8");

    ===================================================
*/

?>
