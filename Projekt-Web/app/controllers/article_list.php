<?php
/**
 * Controller pro zobrazení seznamu článků
 * 
 * Tento controller zpracovává:
 * - Zobrazení všech článků v tabulce
 * - Využívá ArticleController pro logiku zobrazení
 * - Kontrolu přihlášení uživatele
 */

// Načtení a inicializace ArticleControlleru
require_once __DIR__ . '/ArticleController.php';
$controller = new ArticleController();

// Zobrazení seznamu článků
$controller->listArticles();
?>