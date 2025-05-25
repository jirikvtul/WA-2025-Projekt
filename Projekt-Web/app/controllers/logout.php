<?php
/**
 * Controller pro odhlášení uživatele
 * 
 * Tento controller zpracovává:
 * - Odhlášení uživatele
 * - Vymazání session
 * - Přesměrování na seznam článků
 */

// Spuštění session
session_start();

// Vymazání všech session proměnných
session_unset();

// Zničení session
session_destroy();

// Přesměrování na seznam článků
header("Location: ../../index.php");
exit();
?>