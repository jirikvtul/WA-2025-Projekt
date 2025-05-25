<?php
/**
 * Model pro správu uživatelů
 * 
 * Tato třída zpracovává:
 * - Registraci nových uživatelů
 * - Přihlašování uživatelů
 * - Kontrolu oprávnění
 * - Správu uživatelských dat
 */
class User {
    /** @var PDO Instance databázového připojení */
    private $db;

    /**
     * Konstruktor třídy User
     * 
     * @param PDO $db Instance databázového připojení
     */
    public function __construct($db) {
        $this->db = $db;
    }

    /**
     * Kontrola existence uživatelského jména v databázi
     * 
     * @param string $username Kontrolované uživatelské jméno
     * @return bool True, pokud uživatelské jméno existuje
     */
    public function existsByUsername($username) {
        $stmt = $this->db->prepare("SELECT id FROM users WHERE username = ?");
        $stmt->execute([$username]);
        return $stmt->fetch() !== false;
    }

    /**
     * Registrace nového uživatele
     * 
     * Funkce:
     * - Hashování hesla
     * - Uložení uživatelských dat
     * - Nastavení výchozí role
     * - Zaznamenání data vytvoření
     * 
     * @param string $username Uživatelské jméno
     * @param string $email Email uživatele
     * @param string $password Heslo (bude zahashováno)
     * @param string|null $name Jméno uživatele (volitelné)
     * @param string|null $surname Příjmení uživatele (volitelné)
     * @return bool True při úspěšné registraci
     */
    public function register($username, $email, $password, $name = null, $surname = null) {
        // Hashování hesla pro bezpečné uložení
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        
        // Příprava a provedení SQL dotazu
        $stmt = $this->db->prepare("
            INSERT INTO users (username, email, password, name, surname, role, created_at)
            VALUES (?, ?, ?, ?, ?, 'user', NOW())
        ");
        return $stmt->execute([$username, $email, $password_hash, $name, $surname]);
    }

    /**
     * Vyhledání uživatele podle uživatelského jména
     * 
     * @param string $username Hledané uživatelské jméno
     * @return array|false Uživatelská data nebo false při nenalezení
     */
    public function findByUsername($username) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$username]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Přihlášení uživatele
     * 
     * Funkce:
     * - Ověření přihlašovacích údajů
     * - Nastavení session proměnných
     * - Kontrola role uživatele
     * 
     * @param string $username Uživatelské jméno
     * @param string $password Heslo
     * @return bool True při úspěšném přihlášení
     */
    public function login($username, $password) {
        $user = $this->findByUsername($username);
        if ($user && password_verify($password, $user['password'])) {
            // Nastavení session proměnných
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];
            return true;
        }
        return false;
    }

    /**
     * Kontrola, zda je aktuální uživatel administrátor
     * 
     * @return bool True, pokud je uživatel administrátor
     */
    public function isAdmin() {
        return isset($_SESSION['role']) && $_SESSION['role'] === 'admin';
    }

    /**
     * Kontrola, zda je aktuální uživatel vlastníkem článku
     * 
     * @param int $article_id ID kontrolovaného článku
     * @return bool True, pokud je uživatel vlastníkem článku
     */
    public function isArticleOwner($article_id) {
        if (!isset($_SESSION['user_id'])) {
            return false;
        }
        $stmt = $this->db->prepare("SELECT user_id FROM articles WHERE id = ?");
        $stmt->execute([$article_id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result && $result['user_id'] === $_SESSION['user_id'];
    }
}
?>