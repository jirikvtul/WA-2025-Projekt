<?php
/**
 * Controller pro přihlášení uživatele
 * 
 * Tento controller zpracovává:
 * - Přihlašovací formulář
 * - Ověření přihlašovacích údajů
 * - Správu session
 * - Přesměrování po přihlášení
 */

// Načtení potřebných modelů
require_once '../models/Database.php';
require_once '../models/User.php';

// Spuštění session
session_start();

// Inicializace databázového připojení a modelu uživatele
$db = (new Database())->getConnection();
$userModel = new User($db);

// Zpracování odeslaného přihlašovacího formuláře
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Získání a očištění vstupních dat
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    // Validace vstupních dat
    if (empty($username) || empty($password)) {
        echo 'Vyplňte prosím všechna pole.';
        return;
    }

    // Pokus o přihlášení
    if ($userModel->login($username, $password)) {
        // Úspěšné přihlášení - nastavení session
        $_SESSION['username'] = $username;
        // Přesměrování na homepage
        header("Location: ../../index.php");
        exit();
    } else {
        // Neúspěšné přihlášení
        echo 'Neplatné přihlašovací údaje.';
    }
} else {
    // Neplatný typ požadavku
    echo 'Neplatný požadavek.';
}
?>