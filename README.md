# README

## Instalation 
### Installiere diese Software:

- Apache
- PHP
- MySQL

Man kann all diese tools mit Xampp installieren. 

### Datenbank einrichten

Verschiebe den SaschaProject Ordner in das Verzeichnis, welches von dem Apache ausgeliefert wird. Bei Xampp wäre dies das htdocs Verzeichnis.
Vor dem importieren der datenbank erstelle eine leere datenbank mit dem Namen SaschaProject. 
Die Datei SaschaProject.sql kann in MySQL phpMyAdmin, in localhost auf einem Browser, importiert werden, um eine funktionierende Datenbank zu erhalten.


Eine .env datei erstellen und z.b. 
```
MYSQL_HOST = localhost 
MYSQL_USER = root 
MYSQL_PASSWORD = 
MYSQL_DATABASE = SaschaProject 
```
Login auf der webseite: username : admin, passwort : admin

## Info:
Dies ist meine erste Website, die programiert wurde während des Praktikum der 10. Klasse einer Weberstellungs Frima. 

## Probleme behebung:
Wenn der upload von dateien auf der Webseite wegen fehlenden Rechte für den uploads Ordner nicht funktioniert, nutze folgenden befehl 
```
chmod a+rw uploads 
```  


