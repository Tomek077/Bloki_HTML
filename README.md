# Poradnik INF.03 - Interaktywny Tutorial dla Uczniów

## 📚 Opis projektu

Kompleksowy, interaktywny poradnik przygotowujący uczniów do egzaminu zawodowego INF.03. Projekt zawiera szczegółowe tutoriale dotyczące:
- Tworzenia stron HTML/CSS
- Pracy z bazami danych MySQL
- Programowania w PHP (formularze, zapis, odczyt, filtrowanie)

## 🎯 Dla kogo jest ten poradnik?

Ten poradnik jest **specjalnie zaprojektowany dla słabych uczniów** przygotowujących się do egzaminu INF.03. Wszystko jest wyjaśnione:
- Krok po kroku
- W prosty, zrozumiały sposób
- Z wieloma przykładami
- Z gotowymi kodami do skopiowania
- Z interaktywnymi wyjaśnieniami

## 📖 Zawartość projektu

### 1. Strona główna (index.html)
- Menu nawigacji
- **Szczegółowa instrukcja importu bazy danych w phpMyAdmin**
- Linki do wszystkich tutoriali

### 2. Tutorial PHP - Zapis i Odczyt (PHP_zapis_odczyt.html)
Kompletny przewodnik zawierający:
- ✅ Jak stworzyć formularz HTML (każde pole wyjaśnione!)
- ✅ Jak połączyć się z bazą danych MySQL
- ✅ Jak zapisać dane z formularza do bazy (INSERT)
- ✅ Jak odczytać dane z bazy (SELECT)
- ✅ Jak filtrować dane (WHERE)
- ✅ Szczegółowe wyjaśnienia każdej funkcji PHP
- ✅ Przykłady zapytań SQL
- ✅ Najczęstsze błędy i jak ich unikać

### 3. Gotowe przykłady PHP (folder php_przyklady/)
Działające pliki PHP gotowe do użycia:

#### polaczenie.php
- Połączenie z bazą danych MySQL
- Szczegółowe komentarze
- Instrukcje co zmienić na egzaminie

#### formularz.html
- Prosty formularz do dodawania ucznia
- Każde pole dokładnie wyjaśnione
- Podpowiedzi dla ucznia

#### dodaj.php
- Zapisuje dane z formularza do bazy (INSERT INTO)
- Pokazuje krok po kroku co się dzieje
- Wyjaśnia każdą linię kodu
- Wyświetla komunikaty o sukcesie/błędzie

#### lista.php
- Wyświetla wszystkich uczniów z bazy (SELECT)
- Używa pętli while
- Pokazuje dane w tabeli HTML
- Szczegółowe wyjaśnienia pętli i funkcji

#### filtruj.html
- 3 formularze do filtrowania:
  - Po klasie (lista rozwijana)
  - Po imieniu (pole tekstowe)
  - Po nazwisku (pole tekstowe)

#### pokaz_klase.php
- Filtruje uczniów po klasie (WHERE)
- Pokazuje jak używać WHERE z danymi z formularza

#### pokaz_imie.php
- Filtruje uczniów po imieniu

#### pokaz_nazwisko.php
- Filtruje uczniów po nazwisku

### 4. Przykładowa baza danych (szkola.sql)
- Gotowa baza danych do importu
- Tabela `uczniowie` z przykładowymi danymi
- Tabela `klasy` dla zaawansowanych zadań
- 10 przykładowych uczniów

## 🚀 Jak uruchomić projekt?

### KROK 1: Pobierz projekt
```bash
git clone https://github.com/Tomek077/Bloki_HTML.git
```

### KROK 2: Uruchom XAMPP
1. Otwórz **XAMPP Control Panel**
2. Kliknij **Start** przy **Apache** (serwer PHP)
3. Kliknij **Start** przy **MySQL** (baza danych)
4. Poczekaj aż oba zmienią kolor na zielony

### KROK 3: Zaimportuj bazę danych
1. Otwórz przeglądarkę i wpisz: `localhost/phpmyadmin`
2. Kliknij zakładkę **"Bazy danych"**
3. Utwórz nową bazę o nazwie: `szkola`
4. Kliknij na bazę `szkola` po lewej stronie
5. Kliknij zakładkę **"Import"**
6. Wybierz plik `szkola.sql` z projektu
7. Kliknij **"Wykonaj"**

### KROK 4: Skopiuj pliki do XAMPP
1. Skopiuj cały folder projektu do: `C:\xampp\htdocs\`
2. Teraz masz: `C:\xampp\htdocs\Bloki_HTML\`

### KROK 5: Otwórz w przeglądarce
1. Otwórz przeglądarkę
2. Wpisz: `localhost/Bloki_HTML/index.html`
3. Gotowe! Możesz korzystać z poradnika!

## 📁 Struktura projektu

```
Bloki_HTML/
│
├── index.html                    # Strona główna z menu i instrukcją importu
├── PHP_zapis_odczyt.html        # Główny tutorial PHP
├── szkola.sql                   # Baza danych do importu
├── README.md                    # Ten plik
│
├── css/
│   └── style.css                # Style dla wszystkich stron
│
└── php_przyklady/               # Gotowe przykłady PHP
    ├── README.txt               # Instrukcja użycia przykładów
    ├── polaczenie.php           # Połączenie z bazą
    ├── formularz.html           # Formularz dodawania ucznia
    ├── dodaj.php                # Zapis do bazy (INSERT)
    ├── lista.php                # Odczyt z bazy (SELECT)
    ├── filtruj.html             # Formularze do filtrowania
    ├── pokaz_klase.php          # Filtrowanie po klasie (WHERE)
    ├── pokaz_imie.php           # Filtrowanie po imieniu
    └── pokaz_nazwisko.php       # Filtrowanie po nazwisku
```

## 🎓 Przygotowanie do egzaminu INF.03

### Co musisz umieć na egzamin?

#### 1. Import bazy danych
✅ Poradnik zawiera krok po kroku instrukcję w sekcji głównej

#### 2. Połączenie z bazą
✅ Plik `polaczenie.php` - skopiuj i zmień nazwę bazy

#### 3. Formularz HTML
✅ Plik `formularz.html` - każde pole wyjaśnione

#### 4. Zapis do bazy (INSERT)
✅ Plik `dodaj.php` - szczegółowe wyjaśnienia

#### 5. Odczyt z bazy (SELECT)
✅ Plik `lista.php` - pokazuje pętlę while

#### 6. Filtrowanie (WHERE)
✅ Pliki `pokaz_*.php` - różne przykłady WHERE

## ⚠️ Najczęstsze błędy (i jak ich unikać!)

### ❌ "Undefined index"
**Problem:** `$_POST['imie']` nie istnieje
**Rozwiązanie:** Sprawdź czy `name="imie"` w formularzu jest identyczne!

### ❌ "Unknown column"
**Problem:** Kolumna nie istnieje w tabeli
**Rozwiązanie:** Sprawdź nazwy kolumn w phpMyAdmin (zakładka "Struktura")

### ❌ "Unknown database"
**Problem:** Baza danych nie istnieje
**Rozwiązanie:** Zaimportuj plik .sql w phpMyAdmin

### ❌ "Access denied"
**Problem:** Błędne dane połączenia
**Rozwiązanie:** Sprawdź czy MySQL jest uruchomiony w XAMPP

### ❌ Dziwne znaki zamiast polskich liter
**Problem:** Błędne kodowanie
**Rozwiązanie:** Dodaj `mysqli_set_charset($conn, "utf8");`

## 💡 Wskazówki na egzamin

1. **Zawsze czytaj polecenie dwa razy!**
2. **Sprawdź nazwy tabel i kolumn w phpMyAdmin**
3. **Pamiętaj o `include("polaczenie.php");`**
4. **Tekst w WHERE zawsze w apostrofach: `'3A'`**
5. **Liczby BEZ apostrofów: `5`**
6. **Zapisuj pliki z rozszerzeniem `.php` nie `.txt`!**
7. **Uruchom Apache i MySQL przed testowaniem!**

## 🔧 Wymagania techniczne

- **XAMPP** (zawiera Apache, MySQL, PHP)
- Przeglądarka internetowa (Chrome, Firefox, Edge)
- Edytor tekstu (Notepad++, Visual Studio Code, lub zwykły Notatnik)

## 📞 Pomoc

Jeśli coś nie działa:
1. Przeczytaj komunikat błędu - często podpowiada rozwiązanie!
2. Sprawdź czy XAMPP (Apache + MySQL) jest uruchomiony
3. Sprawdź czy baza danych została zaimportowana
4. Sprawdź pliki w folderze `php_przyklady/README.txt`

## 🍀 Powodzenia na egzaminie INF.03!

Ten poradnik zawiera WSZYSTKO czego potrzebujesz do zdania egzaminu. Przećwicz każdy przykład, zrozum jak działa, i będziesz gotowy!

---

**Autor:** Poradnik stworzony specjalnie dla uczniów przygotowujących się do egzaminu INF.03
**Licencja:** Projekt edukacyjny - możesz swobodnie używać i modyfikować
**Wersja:** 1.0 - Kompletny tutorial PHP, HTML, CSS, MySQL
