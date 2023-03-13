# Einrichtung der API auf dem lokalen Entwicklungsserver

## Voraussetzungen

Bevor Sie beginnen, stellen Sie sicher, dass Ihr lokaler Entwicklungsserver die folgenden Voraussetzungen erfüllt:

- ENTWEDER: XAMPP 8.0.25 (Mit PHP 8.0.25) inkl. MySQL (Neuere Versionen nicht unterstützt!)
- ODER: Alternativ zu XAMPP: Nur PHP 8.0.2* und MySQL separat
- Composer (PHP Dependecy Manager)

DevOps / Testing:
- IDE
- Postman / API-Testing Tool

## Installation

1. Laden Sie das Projekt herunter und entpacken Sie es auf Ihrem lokalen Entwicklungsserver.
2. Öffnen Sie eine Kommandozeile in Ihrem Projektverzeichnis und führen Sie den folgenden Befehl aus, um die erforderlichen Pakete zu installieren:
    ```
    composer install
    ```
3. Kopieren Sie die .env.example Datei und benennen Sie sie in .env um:
    ```
    cp .env.example .env
    ```
4. Öffnen Sie die .env Datei in einem Texteditor und passen Sie die Konfiguration an Ihre lokale Umgebung an. Stellen Sie sicher, dass die Datenbankverbindungsinformationen korrekt sind (Eigenes PW / Username etc.).
5. Führen Sie den folgenden Befehl aus, um einen App-Key zu setzen:
    ```
    php artisan key:generate
    ```
6. Führen Sie den folgenden Befehl aus, um die Datenbankmigrationen und -seeds auszuführen:
    ```
    php artisan migrate
    ```
7. Führen Sie den folgenden Befehl aus, um die Anwendung auf Ihrem lokalen Entwicklungsserver zu starten:

    ```
    php artisan serve
    ```
8. Öffnen Sie einen Browser und geben Sie die URL http://localhost:8000 ein, um die Anwendung in Ihrem Browser zu öffnen.
