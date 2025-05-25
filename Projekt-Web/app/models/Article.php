<?php
/**
 * Model pro správu článků
 * 
 * Tato třída zpracovává:
 * - Vytváření nových článků
 * - Získávání seznamu článků
 * - Úpravu existujících článků
 * - Mazání článků
 * - Kontrolu oprávnění pro úpravy a mazání
 */
class Article {
    /** @var PDO Instance databázového připojení */
    private $db;

    /**
     * Konstruktor třídy Article
     * 
     * @param PDO $db Instance databázového připojení
     */
    public function __construct($db) {
        $this->db = $db;
    }

    /**
     * Vytvoření nového článku v databázi
     * 
     * @param string $title Název článku
     * @param string $content Obsah článku
     * @param int $user_id ID autora článku
     * @return bool True při úspěšném vytvoření
     */
    public function create($title, $content, $user_id) {
        $sql = "INSERT INTO articles (title, content, user_id, created_at)
                VALUES (:title, :content, :user_id, NOW())";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':title' => $title,
            ':content' => $content,
            ':user_id' => $user_id
        ]);
    }

    /**
     * Získání všech článků včetně informací o autorech
     * 
     * @return array Pole článků s informacemi o uživatelích
     */
    public function getAll() {
        $sql = "SELECT a.*, u.username, u.role FROM articles a
                JOIN users u ON a.user_id = u.id
                ORDER BY a.created_at DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Získání jednoho článku podle ID
     * 
     * @param int $id ID článku
     * @return array|false Data článku nebo false při nenalezení
     */
    public function getById($id) {
        $sql = "SELECT a.*, u.username, u.role FROM articles a
                JOIN users u ON a.user_id = u.id
                WHERE a.id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Aktualizace existujícího článku
     * 
     * Funkce:
     * - Kontrola oprávnění uživatele
     * - Aktualizace názvu a obsahu
     * - Zaznamenání času úpravy
     * 
     * @param int $id ID článku
     * @param string $title Nový název článku
     * @param string $content Nový obsah článku
     * @param int $user_id ID uživatele provádějícího úpravu
     * @param string $user_role Role uživatele provádějícího úpravu
     * @return bool True při úspěšné aktualizaci
     */
    public function update($id, $title, $content, $user_id, $user_role) {
        // Kontrola oprávnění uživatele
        if ($user_role !== 'admin') {
            $article = $this->getById($id);
            if (!$article || $article['user_id'] !== $user_id) {
                return false;
            }
        }

        $sql = "UPDATE articles 
                SET title = :title,
                    content = :content,
                    updated_at = NOW()
                WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':id' => $id,
            ':title' => $title,
            ':content' => $content
        ]);
    }

    /**
     * Smazání článku z databáze
     * 
     * Funkce:
     * - Kontrola oprávnění uživatele
     * - Smazání článku a souvisejících dat
     * 
     * @param int $id ID článku
     * @param int $user_id ID uživatele provádějícího mazání
     * @param string $user_role Role uživatele provádějícího mazání
     * @return bool True při úspěšném smazání
     */
    public function delete($id, $user_id, $user_role) {
        // Kontrola oprávnění uživatele
        if ($user_role !== 'admin') {
            $article = $this->getById($id);
            if (!$article || $article['user_id'] !== $user_id) {
                return false;
            }
        }

        $sql = "DELETE FROM articles WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([':id' => $id]);
    }
}
?>