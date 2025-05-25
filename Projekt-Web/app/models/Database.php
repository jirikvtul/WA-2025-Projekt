<?php
/**
 * Třída pro správu databázového připojení
 * 
 * Tato třída zajišťuje:
 * - Konfiguraci připojení k databázi
 * - Vytvoření PDO instance
 * - Ošetření chyb při připojení
 * - Nastavení UTF-8 kódování
 */
class Database {
    /** @var string Host databázového serveru */
    private $host = "localhost";
    /** @var string Název databáze */
    private $db_name = "wa_projekt_2025_jk_01";
    /** @var string Uživatelské jméno pro přístup k databázi */
    private $username = "root";
    /** @var string Heslo pro přístup k databázi */
    private $password = "";
    /** @var PDO|null Instance databázového připojení */
    public $conn;

    /**
     * Vytvoří a vrátí připojení k databázi pomocí PDO
     * 
     * Funkce:
     * - Inicializace PDO připojení
     * - Nastavení UTF-8 kódování
     * - Nastavení režimu chyb
     * - Ošetření výjimek při připojení
     * 
     * @return PDO|null Instance databázového připojení nebo null při chybě
     */
    public function getConnection() {
        $this->conn = null;
        
        try {
            // Vytvoření PDO instance s UTF-8 kódováním
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name . ";charset=utf8", $this->username, $this->password);
            // Nastavení režimu chyb na výjimky
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            // Zobrazení chybové hlášky při selhání připojení
            echo "Chyba připojení: " . $exception->getMessage();
        }
        return $this->conn;
    }
}
?>