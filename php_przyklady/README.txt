================================================================================
                    GOTOWE PRZYKŁADY PHP - JAK UŻYWAĆ?
================================================================================

Ten folder zawiera GOTOWE pliki PHP, które możesz skopiować i użyć
do swojego projektu egzaminacyjnego INF.03!

================================================================================
                           LISTA PLIKÓW
================================================================================

📄 polaczenie.php
   - Połączenie z bazą danych MySQL
   - Używaj na początku każdego pliku PHP: include("polaczenie.php");
   - PAMIĘTAJ: Zmień nazwę bazy ($baza) na swoją!

📋 formularz.html
   - Przykładowy formularz do dodawania ucznia
   - Każde pole jest dokładnie wyjaśnione
   - Wyślij dane do dodaj.php

💾 dodaj.php
   - Zapisuje dane z formularza do bazy (INSERT INTO)
   - Pokazuje szczegółowe wyjaśnienia każdego kroku
   - Wyświetla komunikaty o sukcesie lub błędzie

📖 lista.php
   - Wyświetla WSZYSTKICH uczniów z bazy (SELECT)
   - Używa pętli while do przejścia przez wiersze
   - Pokazuje dane w tabeli HTML

🔍 filtruj.html
   - 3 formularze do filtrowania:
     * Po klasie (lista rozwijana)
     * Po imieniu (pole tekstowe)
     * Po nazwisku (pole tekstowe)

🎯 pokaz_klase.php
   - Pokazuje uczniów z WYBRANEJ klasy (WHERE)
   - Filtrowanie na podstawie danych z formularza

🎯 pokaz_imie.php
   - Pokazuje uczniów o WYBRANYM imieniu (WHERE)

🎯 pokaz_nazwisko.php
   - Pokazuje uczniów o WYBRANYM nazwisku (WHERE)

================================================================================
                        JAK URUCHOMIĆ PRZYKŁADY?
================================================================================

KROK 1: Skopiuj pliki do folderu XAMPP
   - Skopiuj cały folder "php_przyklady" do:
     C:\xampp\htdocs\
   - Teraz masz: C:\xampp\htdocs\php_przyklady\

KROK 2: Zaimportuj bazę danych
   - Uruchom XAMPP (Apache + MySQL)
   - Otwórz phpMyAdmin: localhost/phpmyadmin
   - Stwórz bazę "szkola"
   - Zaimportuj plik szkola.sql (jest w folderze głównym)

KROK 3: Sprawdź połączenie
   - Otwórz plik polaczenie.php
   - Sprawdź czy $baza = "szkola"; (lub zmień na swoją bazę)
   - Zapisz plik

KROK 4: Uruchom przykłady
   - Otwórz przeglądarkę
   - Wpisz: localhost/php_przyklady/formularz.html
   - Dodaj ucznia i zobacz jak działa!

KROK 5: Testuj inne pliki
   - localhost/php_przyklady/lista.php
   - localhost/php_przyklady/filtruj.html

================================================================================
                         SZYBKI START NA EGZAMINIE
================================================================================

Na egzaminie INF.03 masz ograniczony czas! Użyj tych plików jako szablonu:

1. Skopiuj polaczenie.php i ZMIEŃ nazwę bazy na tę z zadania
2. Skopiuj formularz.html i ZMIEŃ pola na te z zadania
3. Skopiuj dodaj.php i ZMIEŃ nazwy kolumn na te z zadania
4. Skopiuj lista.php jeśli musisz wyświetlić wszystkie dane
5. Skopiuj pokaz_klase.php jeśli musisz filtrować (WHERE)

PAMIĘTAJ:
- Nazwy kolumn w SQL MUSZĄ być takie same jak w bazie!
- name="" w formularzu MUSI być takie samo jak $_POST[''] w PHP!
- Tekst w WHERE zawsze w apostrofach: WHERE klasa = '3A'
- Uruchom Apache i MySQL w XAMPP!

================================================================================
                         NAJCZĘSTSZE BŁĘDY
================================================================================

❌ "Undefined index 'imie'"
   → Sprawdź czy name="imie" w formularzu jest takie samo jak $_POST['imie']

❌ "Unknown column 'imie' in 'field list'"
   → Sprawdź nazwy kolumn w phpMyAdmin (zakładka "Struktura")

❌ "Unknown database 'szkola'"
   → Sprawdź czy zaimportowałeś bazę danych
   → Sprawdź czy nazwa w polaczenie.php jest poprawna

❌ "Access denied for user 'root'@'localhost'"
   → Sprawdź czy MySQL jest uruchomiony w XAMPP

❌ Dziwne znaki zamiast polskich liter
   → Dodaj: mysqli_set_charset($conn, "utf8");

❌ Strona nie działa (biały ekran)
   → Sprawdź czy Apache jest uruchomiony w XAMPP
   → Sprawdź czy plik ma rozszerzenie .php (nie .txt!)

================================================================================
                            KONTAKT
================================================================================

Jeśli coś nie działa:
1. Przeczytaj komunikat błędu - często mówi co jest nie tak!
2. Sprawdź polaczenie.php - czy nazwa bazy jest poprawna?
3. Sprawdź phpMyAdmin - czy tabele i kolumny istnieją?
4. Sprawdź XAMPP - czy Apache i MySQL są uruchomione?

Powodzenia na egzaminie INF.03! 🍀

================================================================================
