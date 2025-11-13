# 📚 Tutorial PHP + MySQL - Zapis i Odczyt Danych

Interaktywny tutorial nauczania podstaw PHP i MySQL dla uczniów.

## 🎯 Cel tutoriala

Ten tutorial uczy uczniów jak:
- Tworzyć formularze HTML
- Odbierać dane z formularzy w PHP
- Łączyć się z bazą danych MySQL
- Zapisywać dane do bazy (INSERT)
- Odczytywać dane z bazy (SELECT)
- Wyświetlać dane w różnych formatach
- Filtrować i wyszukiwać informacje

## 📂 Struktura plików

```
PHP_zapis_odczyt/
│
├── index.html              # Strona główna z nawigacją
├── czesc1_zapis.php        # Część 1: Formularz i zapis do bazy
├── czesc2_odczyt.php       # Część 2: Odczyt i wyświetlanie danych
├── czesc3_filtrowanie.php  # Część 3: Filtrowanie danych
├── db_config.php           # Konfiguracja połączenia z bazą
├── create_database.sql     # Skrypt SQL do utworzenia bazy
├── style.css               # Arkusz stylów CSS
└── README.md               # Ten plik
```

## ⚙️ Wymagania

- XAMPP, WAMP lub inny serwer lokalny (Apache + MySQL)
- Przeglądarka internetowa
- Podstawowa znajomość HTML

## 🚀 Instalacja

1. **Zainstaluj XAMPP**
   - Pobierz z https://www.apachefriends.org
   - Uruchom Apache i MySQL

2. **Skopiuj pliki**
   - Skopiuj folder `PHP_zapis_odczyt` do `C:\xampp\htdocs\`

3. **Utwórz bazę danych**
   - Otwórz http://localhost/phpmyadmin
   - Zaimportuj plik `create_database.sql`

4. **Skonfiguruj połączenie**
   - Edytuj `db_config.php` jeśli potrzebujesz innych danych logowania

5. **Uruchom tutorial**
   - Otwórz http://localhost/PHP_zapis_odczyt/

## 📖 Części tutoriala

### Część 1: Formularz i Zapis do Bazy (📝)
- Tworzenie formularza HTML
- Odbieranie danych z POST
- Połączenie z MySQL używając mysqli
- Zapis danych (INSERT)
- Zabezpieczenia (SQL Injection)

**Poziom:** ⭐⭐☆☆☆ (Łatwy)

### Część 2: Odczyt i Wyświetlanie (📖)
- Odczyt danych (SELECT)
- Wyświetlanie jako lista wypunktowana (ul)
- Wyświetlanie jako lista numerowana (ol)
- Wyświetlanie w tabeli HTML
- Pętla while i mysqli_fetch_assoc()

**Poziom:** ⭐⭐☆☆☆ (Łatwy)

### Część 3: Filtrowanie i Wyszukiwanie (🔍)
- Formularz wyszukiwania (pole tekstowe + select)
- Metoda GET
- Zapytania z WHERE
- Operator LIKE
- Łączenie warunków (AND, OR)
- Różnice GET vs POST

**Poziom:** ⭐⭐⭐☆☆ (Średni)

## 🗄️ Struktura bazy danych

**Tabela: uczniowie**

| Pole | Typ | Opis |
|------|-----|------|
| id | INT (AUTO_INCREMENT) | Unikalny identyfikator |
| imie | VARCHAR(50) | Imię ucznia |
| nazwisko | VARCHAR(50) | Nazwisko ucznia |
| wiek | INT | Wiek ucznia |
| klasa | VARCHAR(10) | Klasa (np. 1A, 2B) |
| data_dodania | TIMESTAMP | Data dodania (auto) |

## 💡 Funkcje PHP i SQL

### Kluczowe funkcje PHP:
- `mysqli_connect()` - połączenie z bazą
- `mysqli_query()` - wykonanie zapytania
- `mysqli_fetch_assoc()` - pobieranie wiersza
- `mysqli_num_rows()` - liczba wyników
- `mysqli_real_escape_string()` - zabezpieczenie danych
- `$_POST` - dane z formularza (POST)
- `$_GET` - dane z formularza (GET)

### Kluczowe operatory SQL:
- `INSERT INTO` - dodawanie danych
- `SELECT` - odczyt danych
- `WHERE` - filtrowanie
- `LIKE` - wyszukiwanie wzorca
- `AND` / `OR` - łączenie warunków
- `ORDER BY` - sortowanie

## 🎨 Cechy tutoriala

✅ **Prosty i zrozumiały** - dostosowany do uczniów słabszych
✅ **Interaktywny** - praktyczne ćwiczenia
✅ **Obrazowy** - ładny design z gradientami i ikonami
✅ **Komentarze** - każda linijka kodu wyjaśniona
✅ **Krok po kroku** - jasna struktura nauki
✅ **Bezpieczny** - uwzględnia podstawowe zabezpieczenia

## 🐛 Rozwiązywanie problemów

**Problem:** "Cannot connect to database"
**Rozwiązanie:** Sprawdź czy MySQL jest uruchomiony w XAMPP

**Problem:** "Table doesn't exist"
**Rozwiązanie:** Zaimportuj plik create_database.sql

**Problem:** Polskie znaki się psują
**Rozwiązanie:** Sprawdź UTF-8 w HTML i mysqli_set_charset()

**Problem:** Biały ekran
**Rozwiązanie:** Włącz wyświetlanie błędów PHP

## 📚 Dalsze materiały

- [PHP Documentation](https://www.php.net/manual/pl/)
- [MySQL Documentation](https://dev.mysql.com/doc/)
- [W3Schools PHP](https://www.w3schools.com/php/)
- [W3Schools SQL](https://www.w3schools.com/sql/)

## 👨‍🏫 Dla nauczycieli

Tutorial jest zaprojektowany tak, aby:
- Można było go realizować w 3-4 lekcjach po 45 minut
- Uczniowie mogli pracować we własnym tempie
- Każda część była niezależna (można pominąć część 3)
- Kod był czytelny i dobrze skomentowany
- Zadania dodatkowe dla szybszych uczniów

## 📝 Licencja

Materiał edukacyjny - wolny do użytku w celach dydaktycznych.

## ✨ Autor

Tutorial stworzony dla uczniów szkół średnich - 2024
