<?php

// Spuštění session a načtení potřebných modelů
session_start();
require_once __DIR__ . '/../models/Database.php';
require_once __DIR__ . '/../models/Article.php';

/**
 * Controller pro správu článků
 * 
 * Tato třída zpracovává všechny operace související s články:
 * - Vytváření nových článků
 * - Zobrazení seznamu článků
 * - Kontrola přihlášení uživatele
 */
class ArticleController {
    /** @var PDO Instance databázového připojení */
    private $db;
    /** @var Article Instance modelu článku */
    private $articleModel;

    /**
     * Konstruktor ArticleControlleru
     * Inicializuje databázové připojení a model článku
     */
    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->articleModel = new Article($this->db);
    }

    /**
     * Kontrola, zda je uživatel přihlášen
     * @return bool True, pokud je uživatel přihlášen
     */
    private function isUserLoggedIn() {
        return isset($_SESSION['user_id']) && !empty($_SESSION['user_id']);
    }

    /**
     * Zpracování vytvoření nového článku
     * 
     * Funkce:
     * - Kontrola přihlášení uživatele
     * - Zpracování POST požadavku
     * - Validace vstupních dat
     * - Uložení článku do databáze
     * - Přesměrování na seznam článků
     */
    public function createArticle() {
        // Kontrola přihlášení
        if (!$this->isUserLoggedIn()) {
            header("Location: /WA-2025-Projekt/Projekt-Web/app/views/auth/login.php?error=please_login");
            exit();
        }

        // Zpracování POST požadavku
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Získání a očištění vstupních dat
            $title = htmlspecialchars($_POST['title'] ?? '');
            $content = htmlspecialchars($_POST['content'] ?? '');
            $user_id = $_SESSION['user_id'];

            // Validace vstupních dat
            if (empty($title) || empty($content)) {
                $error = 'Vyplňte prosím všechna povinná pole.';
            } elseif ($this->articleModel->create($title, $content, $user_id)) {
                // Úspěšné vytvoření článku
                header("Location: /WA-2025-Projekt/Projekt-Web/community/community.php?success=created");
                exit();
            } else {
                $error = 'Chyba při ukládání článku.';
            }
        }

        // Zobrazení formuláře pro vytvoření článku
        include __DIR__ . '/../views/articles/article_create.php';
    }

    /**
     * Zobrazení seznamu všech článků
     * 
     * Funkce:
     * - Kontrola přihlášení uživatele
     * - Načtení všech článků z databáze
     * - Zobrazení článků v tabulce
     */
    public function listArticles() {
        // Kontrola přihlášení
        if (!$this->isUserLoggedIn()) {
            header("Location: /WA-2025-Projekt/Projekt-Web/app/views/auth/login.php?error=please_login");
            exit();
        }
        // Načtení a zobrazení článků
        $articles = $this->articleModel->getAll();
        include __DIR__ . '/../views/articles/article_table_only.php';
    }
}

// Vytvoření instance controlleru a zpracování požadavku
$controller = new ArticleController();
$controller->createArticle();
?>