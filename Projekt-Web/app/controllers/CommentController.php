<?php
/**
 * Controller pro správu komentářů
 * 
 * Tento controller zpracovává:
 * - Přidávání nových komentářů
 * - Získávání komentářů k článkům
 * - Validaci vstupních dat
 */

// Načtení potřebných modelů
require_once __DIR__ . '/../models/Database.php';
require_once __DIR__ . '/../models/Comment.php';

class CommentController {
    /** @var PDO Instance databázového připojení */
    private $db;
    /** @var Comment Instance modelu komentáře */
    private $comment;

    /**
     * Konstruktor CommentControlleru
     * Inicializuje databázové připojení a model komentáře
     */
    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->comment = new Comment($this->db);
    }

    /**
     * Přidání nového komentáře
     * 
     * @param int $article_id ID článku
     * @param int $user_id ID uživatele
     * @param string $content Obsah komentáře
     * @return bool True, pokud byl komentář úspěšně přidán
     */
    public function addComment($article_id, $user_id, $content) {
        // Validace vstupních dat
        if (empty($content)) {
            return false;
        }

        // Nastavení vlastností komentáře
        $this->comment->article_id = $article_id;
        $this->comment->user_id = $user_id;
        $this->comment->content = $content;

        // Vytvoření komentáře v databázi
        return $this->comment->create();
    }

    /**
     * Získání všech komentářů k článku
     * 
     * @param int $article_id ID článku
     * @return array Pole komentářů
     */
    public function getArticleComments($article_id) {
        return $this->comment->getCommentsByArticle($article_id);
    }
}
?> 