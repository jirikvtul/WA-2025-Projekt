<?php
/**
 * Kontroler pro mazání článků
 * 
 * Tento skript zpracovává:
 * - Ověření přihlášení uživatele
 * - Kontrolu oprávnění k mazání
 * - Mazání článku z databáze
 * - Přesměrování po zpracování
 */

// Načtení potřebných modelů
require_once '../models/Database.php';
require_once '../models/Article.php';

session_start();

// Kontrola přihlášení uživatele
if (!isset($_SESSION['user_id'])) {
    header("Location: ../views/auth/login.php?error=please_login");
    exit();
}

// Zpracování požadavku na smazání článku
if (isset($_GET['id'])) {
    // Získání a validace vstupních dat
    $id = (int)$_GET['id'];
    $user_id = $_SESSION['user_id'];
    $user_role = $_SESSION['role'] ?? 'user';

    // Inicializace databázového připojení a modelu článku
    $db = (new Database())->getConnection();
    $articleModel = new Article($db);

    // Pokus o smazání článku
    if ($articleModel->delete($id, $user_id, $user_role)) {
        // Úspěšné smazání - přesměrování zpět na stránku pro úpravu a mazání
        header("Location: /WA-2025-Kvajsar-Jiri/Projekt-Web/app/views/articles/article_edit_delete.php?success=deleted");
        exit();
    } else {
        echo "Nemáte oprávnění k odstranění tohoto článku.";
    }
} else {
    echo "Neplatný požadavek.";
}
?>