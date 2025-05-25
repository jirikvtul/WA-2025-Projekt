<?php
/**
 * Kontroler pro přidávání komentářů
 * 
 * Tento skript zpracovává:
 * - Ověření přihlášení uživatele
 * - Validaci vstupních dat
 * - Přidání nového komentáře
 * - Přesměrování po zpracování
 */
session_start();
require_once __DIR__ . '/../controllers/CommentController.php';

// Kontrola, zda je uživatel přihlášen
if (!isset($_SESSION['user_id'])) {
    header('Location: ../../login.php');
    exit();
}

// Kontrola, zda byl formulář odeslán
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Získání a validace vstupních dat
    $article_id = filter_input(INPUT_POST, 'article_id', FILTER_VALIDATE_INT);
    $content = trim($_POST['content'] ?? '');
    $user_id = $_SESSION['user_id'];

    // Kontrola validity dat a přidání komentáře
    if ($article_id && !empty($content)) {
        $commentController = new CommentController();
        if ($commentController->addComment($article_id, $user_id, $content)) {
            // Úspěšné přidání - přesměrování zpět na stránku s komentáři
            header('Location: ../../community/community.php#comments' . $article_id);
            exit();
        }
    }
}

// Při chybě přesměrování s chybovou hláškou
header('Location: ../../community/community.php?error=comment_failed');
exit();
?> 