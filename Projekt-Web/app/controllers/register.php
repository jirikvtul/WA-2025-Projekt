<?php
/**
 * Controller pro registraci uživatele
 * 
 * Tento controller zpracovává:
 * - Registrační formulář
 * - Validaci vstupních dat
 * - Kontrolu dostupnosti uživatelského jména
 * - Vytvoření nového uživatele
 * - Přesměrování po registraci
 */

// Nastavení zobrazení chyb pro vývojové prostředí
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Načtení potřebných modelů
require_once '../models/Database.php';
require_once '../models/User.php';

// Spuštění session
session_start();

// Inicializace databázového připojení a modelu uživatele
$db = (new Database())->getConnection();
$userModel = new User($db);

// Zpracování odeslaného registračního formuláře
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Získání a očištění vstupních dat z formuláře
    $username = trim($_POST['username'] ?? '');
    $email = !empty($_POST['email']) ? trim($_POST['email']) : null;
    $name = !empty($_POST['name']) ? trim($_POST['name']) : null;
    $surname = !empty($_POST['surname']) ? trim($_POST['surname']) : null;
    $password = $_POST['password'] ?? '';
    $password_confirm = $_POST['password_confirm'] ?? '';

    // Validace povinných polí
    if (empty($username) || empty($password) || empty($password_confirm)) {
        echo 'Vyplňte prosím všechna povinná pole.';
        return;
    }

    // Kontrola shody hesel
    if ($password !== $password_confirm) {
        echo 'Hesla se neshodují.';
        return;
    }

    // Kontrola, zda není uživatelské jméno již obsazené
    if ($userModel->existsByUsername($username)) {
        echo 'Uživatelské jméno je již obsazené.';
        return;
    }

    // Pokus o registraci nového uživatele
    if ($userModel->register($username, $email, $password, $name, $surname)) {
        // Úspěšná registrace - přesměrování na přihlašovací stránku
        header("Location: /WA-2025-Kvajsar-Jiri/Projekt-Web/app/views/auth/login.php");
        exit();
    } else {
        // Neúspěšná registrace
        echo 'Registrace se nezdařila.';
    }
} else {
    // Neplatný typ požadavku
    echo 'Neplatný požadavek.';
}
?>