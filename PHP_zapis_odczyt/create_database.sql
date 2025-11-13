-- ====================================
-- SKRYPT DO UTWORZENIA BAZY DANYCH
-- ====================================
-- Ten skrypt tworzy prostą bazę danych dla naszego tutoriala
-- Uruchom ten skrypt w phpMyAdmin lub innym narzędziu do zarządzania MySQL

-- KROK 1: Tworzenie bazy danych
CREATE DATABASE IF NOT EXISTS szkola_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- KROK 2: Wybieramy bazę danych
USE szkola_db;

-- KROK 3: Tworzenie tabeli "uczniowie"
CREATE TABLE IF NOT EXISTS uczniowie (
    id INT AUTO_INCREMENT PRIMARY KEY,
    imie VARCHAR(50) NOT NULL,
    nazwisko VARCHAR(50) NOT NULL,
    wiek INT NOT NULL,
    klasa VARCHAR(10) NOT NULL,
    data_dodania TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- KROK 4: Dodajemy przykładowe dane do testowania
INSERT INTO uczniowie (imie, nazwisko, wiek, klasa) VALUES
('Jan', 'Kowalski', 15, '1A'),
('Anna', 'Nowak', 16, '2B'),
('Piotr', 'Wiśniewski', 15, '1A'),
('Maria', 'Dąbrowska', 17, '3C'),
('Tomasz', 'Lewandowski', 16, '2A'),
('Katarzyna', 'Wójcik', 15, '1B'),
('Michał', 'Kamiński', 16, '2B'),
('Magdalena', 'Zielińska', 17, '3A');

-- Gotowe! Twoja baza danych jest teraz przygotowana do użycia.
