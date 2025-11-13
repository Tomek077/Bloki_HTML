-- Plik bazy danych do importu w phpMyAdmin
-- Ten plik zawiera przykładową bazę danych dla uczniów przygotowujących się do egzaminu INF.03

-- Tworzenie bazy danych
CREATE DATABASE IF NOT EXISTS szkola CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE szkola;

-- Tworzenie tabeli uczniowie
CREATE TABLE IF NOT EXISTS uczniowie (
    id INT AUTO_INCREMENT PRIMARY KEY,
    imie VARCHAR(50) NOT NULL,
    nazwisko VARCHAR(50) NOT NULL,
    klasa VARCHAR(10),
    email VARCHAR(100)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Wstawianie przykładowych danych
INSERT INTO uczniowie (imie, nazwisko, klasa, email) VALUES
('Jan', 'Kowalski', '3A', 'jan.kowalski@szkola.pl'),
('Anna', 'Nowak', '3A', 'anna.nowak@szkola.pl'),
('Piotr', 'Wiśniewski', '3B', 'piotr.wisniewski@szkola.pl'),
('Maria', 'Wójcik', '3B', 'maria.wojcik@szkola.pl'),
('Tomasz', 'Kowalczyk', '3C', 'tomasz.kowalczyk@szkola.pl'),
('Katarzyna', 'Kamińska', '3A', 'katarzyna.kaminska@szkola.pl'),
('Michał', 'Lewandowski', '3B', 'michal.lewandowski@szkola.pl'),
('Magdalena', 'Zielińska', '3C', 'magdalena.zielinska@szkola.pl'),
('Paweł', 'Szymański', '3A', 'pawel.szymanski@szkola.pl'),
('Agnieszka', 'Dąbrowska', '3B', 'agnieszka.dabrowska@szkola.pl');

-- Tworzenie dodatkowej tabeli klasy (dla bardziej zaawansowanych zadań)
CREATE TABLE IF NOT EXISTS klasy (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nazwa VARCHAR(10) NOT NULL,
    wychowawca VARCHAR(100),
    sala VARCHAR(10)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Wstawianie danych do tabeli klasy
INSERT INTO klasy (nazwa, wychowawca, sala) VALUES
('3A', 'Pani Nowak', '101'),
('3B', 'Pan Kowalski', '102'),
('3C', 'Pani Wiśniewska', '103');

-- Koniec pliku SQL
-- Możesz teraz zaimportować ten plik w phpMyAdmin!
