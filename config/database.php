<?php
class Database {
    public static function connect() {
        try {
            $host = 'localhost';
            $dbname = 'udinus'; // harus sesuai nama database di phpMyAdmin
            $username = 'root';
            $password = ''; // default XAMPP tidak ada password
            return new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }
}
