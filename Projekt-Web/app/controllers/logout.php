<?php
/**
 * Controller pro odhlášení uživatele
 * 
 * Tento controller zpracovává:
 * - Odhlášení uživatele
 * - Vymazání session
 * - Přesměrování na seznam článků
 */

// Nastavení zobrazení chyb pro vývojové prostředí
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Spuštění session
session_start();

// Vymazání všech session proměnných
session_unset();

// Zničení session
session_destroy();

// Přesměrování na seznam článků
header("Location: /WA-2025-Kvajsar-Jiri/Projekt-Web/app/controllers/article_list.php");
exit();
?>