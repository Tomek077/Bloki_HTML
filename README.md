# Lekcja: Tworzenie prostej strony w HTML z użyciem zewnętrznego stylu CSS

## Wstęp

W tej lekcji nauczymy się, jak stworzyć prostą stronę internetową. Użyjemy do tego HTML i CSS. Strona będzie składać się z:

- **Nagłówka** o wysokości 120 pikseli.
- **Menu nawigacji** o szerokości 30% i wysokości 400 pikseli.
- **Głównej treści** o szerokości 70% i wysokości 400 pikseli.
- **Stopki** o wysokości 60 pikseli.

Użyjemy **pływających bloków** (float), aby ułożyć elementy na stronie.

## Krok 1: Przygotowanie plików

1. **Utwórz folder** na swoim komputerze, np. `moja_strona`.
2. **Otwórz Notatnik** lub inny prosty edytor tekstu.

## Krok 2: Tworzenie pliku HTML

1. W Notatniku **zapisz nowy plik** jako `index.html` w folderze `moja_strona`.
2. Wpisz podstawową strukturę HTML:

```html
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Moja Prosta Strona</title>
    <!-- Łączenie zewnętrznego pliku CSS -->
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

    <!-- Nagłówek -->
    <div id="header">
        <h1>Witamy na naszej stronie</h1>
    </div>

    <!-- Menu nawigacji -->
    <div id="nav">
        <h2>Menu</h2>
        <ul>
            <li><a href="#">Strona główna</a></li>
            <li><a href="#">O nas</a></li>
            <li><a href="#">Kontakt</a></li>
        </ul>
    </div>

    <!-- Główna treść -->
    <div id="main">
        <h2>Główna Treść</h2>
        <p>To jest miejsce na główną treść Twojej strony.</p>
    </div>

    <!-- Stopka -->
    <div id="footer">
        <p>&copy; 2023 Moja Strona</p>
    </div>

</body>
</html>
```

## Krok 3: Tworzenie pliku CSS

1. **Utwórz nowy plik** w Notatniku.
2. **Zapisz go** jako `style.css` w tym samym folderze `moja_strona`.
3. Wpisz następujący kod CSS:

```css
/* Resetowanie marginesów i odstępów */
* {
    margin: 0;
    padding: 0;
}

body {
    font-family: Arial, sans-serif;
}

/* Nagłówek */
#header {
    background-color: #4CAF50;
    color: white;
    height: 120px;
    text-align: center;
    padding-top: 30px;
}

/* Menu nawigacji */
#nav {
    background-color: #f1f1f1;
    width: 30%;
    height: 400px;
    float: left;
    padding: 20px;
}

/* Główna treść */
#main {
    background-color: #ffffff;
    width: 70%;
    height: 400px;
    float: left;
    padding: 20px;
}

/* Stopka */
#footer {
    background-color: #ddd;
    height: 60px;
    clear: both;
    text-align: center;
    padding-top: 20px;
}
```

## Krok 4: Uruchomienie strony

1. **Zapisz oba pliki**: `index.html` i `style.css`.
2. **Otwórz plik** `index.html` w przeglądarce internetowej (np. Chrome, Firefox).

## Wyjaśnienie kodu

- **Nagłówek** (`#header`):
  - Wysokość: 120 pikseli.
  - Tło w kolorze zielonym.
  - Tekst wyśrodkowany i w kolorze białym.

- **Menu nawigacji** (`#nav`):
  - Szerokość: 30% strony.
  - Wysokość: 400 pikseli.
  - Ustawienie po lewej stronie dzięki `float: left`.

- **Główna treść** (`#main`):
  - Szerokość: 70% strony.
  - Wysokość: 400 pikseli.
  - Ustawienie obok menu nawigacji dzięki `float: left`.

- **Stopka** (`#footer`):
  - Wysokość: 60 pikseli.
  - Umieszczona poniżej pływających elementów dzięki `clear: both`.

## Dodatkowe wskazówki

- **Pływające bloki**: Użycie `float` pozwala ustawić elementy obok siebie.
- **Czyszczenie float**: Użycie `clear: both` w stopce powoduje, że jest ona wyświetlana poniżej elementów pływających.
- **Dostosowanie wyglądu**: Możesz zmieniać kolory, czcionki i inne style w pliku CSS, aby dostosować wygląd strony.

## Podsumowanie

Gratulacje! Stworzyłeś prostą stronę internetową z użyciem HTML i CSS. Poznałeś podstawy tworzenia struktury strony i jej stylizacji za pomocą zewnętrznego pliku CSS.

## Zadanie domowe

Spróbuj dodać więcej elementów do swojej strony, takich jak:

- Obrazki
- Dodatkowe linki w menu
- Kolejne sekcje w głównej treści

**Pamiętaj:** Ćwiczenie czyni mistrza!
