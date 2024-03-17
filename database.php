<?php
    define('DB_SERVER', 'db');
    define('DB_USERNAME', 'chromerce');
    define('DB_PASSWORD', 'password');
    define('DB_NAME', 'chromerce');

    try {
        $pdo = new PDO("mysql:host=db;port=3306;dbname=chromerce", 'chromerce', 'password');
        
        // Configurer PDO pour signaler les erreurs
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // Définir le mode de récupération par défaut sur FETCH_ASSOC
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    } catch(PDOException $e) {
        die("FATAL ERROR: Could not connect to the database " . $e->getMessage());
    }
?>