<?php
/**
 * Controller pro zobrazení seznamu článků
 * 
 * Tento controller zpracovává:
 * - Zobrazení všech článků v tabulce
 * - Využívá ArticleController pro logiku zobrazení
 * - Kontrolu přihlášení uživatele
 */

// Nastavení zobrazení chyb pro vývojové prostředí
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Načtení a inicializace ArticleControlleru
require_once 'ArticleController.php';
$controller = new ArticleController();

// Zobrazení seznamu článků
$controller->listArticles();
?>