<?php
/**
 * Model pro správu komentářů k článkům
 * 
 * Tato třída zpracovává:
 * - Vytváření nových komentářů
 * - Získávání komentářů k článkům
 * - Bezpečné ukládání komentářů
 * - Propojení s uživateli
 */
class Comment {
    /** @var PDO Databázové připojení */
    private $conn;
    /** @var string Název tabulky */
    private $table_name = "comments";

    /** @var int ID komentáře */
    public $id;
    /** @var int ID článku */
    public $article_id;
    /** @var int ID uživatele */
    public $user_id;
    /** @var string Obsah komentáře */
    public $content;
    /** @var string Datum vytvoření komentáře */
    public $created_at;
    /** @var string Uživatelské jméno autora komentáře */
    public $username;

    /**
     * Konstruktor s databázovým připojením
     * 
     * @param PDO $db Databázové připojení
     */
    public function __construct($db) {
        $this->conn = $db;
    }

    /**
     * Vytvoření nového komentáře
     * 
     * Funkce:
     * - Sanitizace vstupních dat
     * - Vložení komentáře do databáze
     * - Zaznamenání času vytvoření
     * 
     * @return bool True při úspěšném vytvoření
     */
    public function create() {
        $query = "INSERT INTO " . $this->table_name . "
                (article_id, user_id, content, created_at)
                VALUES
                (:article_id, :user_id, :content, NOW())";

        $stmt = $this->conn->prepare($query);

        // Sanitizace vstupních dat pro bezpečnost
        $this->article_id = htmlspecialchars(strip_tags($this->article_id));
        $this->user_id = htmlspecialchars(strip_tags($this->user_id));
        $this->content = htmlspecialchars(strip_tags($this->content));

        // Vazba parametrů
        $stmt->bindParam(":article_id", $this->article_id);
        $stmt->bindParam(":user_id", $this->user_id);
        $stmt->bindParam(":content", $this->content);

        return $stmt->execute();
    }

    /**
     * Získání všech komentářů k určitému článku
     * 
     * Funkce:
     * - Načtení komentářů včetně informací o autorech
     * - Seřazení podle data vytvoření (nejnovější první)
     * 
     * @param int $article_id ID článku
     * @return array Pole komentářů
     */
    public function getCommentsByArticle($article_id) {
        $query = "SELECT c.*, u.username 
                FROM " . $this->table_name . " c
                LEFT JOIN users u ON c.user_id = u.id
                WHERE c.article_id = :article_id
                ORDER BY c.created_at DESC";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":article_id", $article_id);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?> 