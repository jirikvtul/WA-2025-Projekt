<?php
/**
 * Controller pro aktualizaci článků
 * 
 * Tento controller zpracovává:
 * - Úpravu existujících článků v databázi
 * - Validaci vstupních dat
 * - Kontrolu oprávnění uživatele
 * - Přesměrování po aktualizaci
 */

// Nastavení zobrazení chyb pro vývojové prostředí
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Načtení potřebných modelů
require_once '../models/Database.php';
require_once '../models/Article.php';

// Spuštění session
session_start();

// Kontrola přihlášení uživatele
if (!isset($_SESSION['user_id'])) {
    header("Location: /WA-2025-Kvajsar-Jiri/Projekt-Web/app/views/auth/login.php?error=please_login");
    exit();
}

// Zpracování požadavku na aktualizaci článku
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Získání a očištění vstupních dat z formuláře
    $id = (int)$_POST['id'];
    $title = htmlspecialchars($_POST['title'] ?? '');
    $content = htmlspecialchars($_POST['content'] ?? '');
    $user_id = $_SESSION['user_id'];
    $user_role = $_SESSION['role'] ?? 'user';

    // Validace povinných polí
    if (empty($title) || empty($content)) {
        echo "Vyplňte prosím všechna pole.";
        return;
    }

    // Inicializace databázového připojení a modelu článku
    $db = (new Database())->getConnection();
    $articleModel = new Article($db);

    // Pokus o aktualizaci článku
    if ($articleModel->update($id, $title, $content, $user_id, $user_role)) {
        // Úspěšná aktualizace - přesměrování na seznam článků
        header("Location: /WA-2025-Kvajsar-Jiri/Projekt-Web/app/controllers/article_list.php");
        exit();
    } else {
        // Neúspěšná aktualizace - nedostatečná oprávnění
        echo "Nemáte oprávnění k úpravě tohoto článku.";
    }
} else {
    // Neplatný typ požadavku
    echo "Neplatný požadavek.";
}
?>