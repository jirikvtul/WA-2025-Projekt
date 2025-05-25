# Základní PHP Funkce a Koncepty

## String Manipulace
- `trim()` - Odstraní mezery a jiné prázdné znaky z začátku a konce řetězce
  ```php
  $text = "  Hello World  ";
  echo trim($text); // Vypíše: "Hello World"
  ```

- `strlen()` - Vrátí délku řetězce
  ```php
  $text = "Hello";
  echo strlen($text); // Vypíše: 5
  ```

- `strtolower()` - Převede řetězec na malá písmena
- `strtoupper()` - Převede řetězec na velká písmena
- `ucfirst()` - Převede první písmeno na velké
- `ucwords()` - Převede první písmeno každého slova na velké

## Pole (Arrays)
- `array()` nebo `[]` - Vytvoření pole
- `count()` - Počet prvků v poli
- `in_array()` - Kontrola, zda prvek existuje v poli
- `array_push()` - Přidání prvku na konec pole
- `array_pop()` - Odebrání posledního prvku z pole
- `array_merge()` - Spojení dvou nebo více polí

## Bezpečnost
- `htmlspecialchars()` - Převede speciální znaky na HTML entity
  ```php
  $text = "<script>alert('XSS')</script>";
  echo htmlspecialchars($text); // Vypíše: &lt;script&gt;alert('XSS')&lt;/script&gt;
  ```

- `password_hash()` - Bezpečné hashování hesla
  ```php
  $password = "mojeHeslo123";
  $hash = password_hash($password, PASSWORD_DEFAULT);
  ```

- `password_verify()` - Ověření hesla proti hashi
  ```php
  $password = "mojeHeslo123";
  $hash = password_hash($password, PASSWORD_DEFAULT);
  if (password_verify($password, $hash)) {
      echo "Heslo je správné";
  }
  ```

## Session Management
- `session_start()` - Spustí nebo obnoví session
- `$_SESSION` - Superglobální pole pro ukládání session dat
- `session_destroy()` - Zničí všechna session data

## Formuláře a Data
- `$_POST` - Data odeslaná metodou POST
- `$_GET` - Data odeslaná metodou GET
- `$_REQUEST` - Kombinace POST a GET dat
- `isset()` - Kontrola, zda proměnná existuje a není null
- `empty()` - Kontrola, zda proměnná je prázdná

## Databáze (MySQL)
- `mysqli_connect()` - Připojení k databázi
- `mysqli_query()` - Provedení SQL dotazu
- `mysqli_fetch_assoc()` - Získání řádku jako asociativní pole
- `mysqli_real_escape_string()` - Escapování speciálních znaků pro SQL

## Čas a Datum
- `date()` - Formátování data a času
  ```php
  echo date("Y-m-d H:i:s"); // Vypíše: 2024-03-14 15:30:00
  ```
- `strtotime()` - Převede textové datum na timestamp
- `time()` - Aktuální timestamp

## Soubory
- `file_exists()` - Kontrola existence souboru
- `fopen()` - Otevření souboru
- `fclose()` - Zavření souboru
- `fwrite()` - Zápis do souboru
- `fread()` - Čtení ze souboru

## OOP (Objektově Orientované Programování)
- `class` - Definice třídy
- `public`, `private`, `protected` - Modifikátory přístupu
- `__construct()` - Konstruktor třídy
- `$this` - Reference na aktuální objekt
- `extends` - Dědičnost tříd
- `implements` - Implementace rozhraní

## Chybové Hlášky
- `try` - Blok pro zachycení výjimek
- `catch` - Zachycení výjimky
- `throw` - Vyhození výjimky
- `error_reporting()` - Nastavení úrovně chybových hlášek
- `ini_set()` - Nastavení PHP konfigurace

## Často Používané Funkce v MVC
- `require` vs `include` - Načtení souboru
  - `require` - Zastaví skript při chybě
  - `include` - Pokračuje při chybě
- `header()` - Odeslání HTTP hlavičky
  ```php
  header("Location: login.php"); // Přesměrování
  ```
- `exit` nebo `die` - Ukončení skriptu

## Best Practices
1. Vždy validujte vstupní data
2. Používejte prepared statements pro SQL dotazy
3. Nikdy neukládejte hesla v plaintextu
4. Vždy escapujte výstup pro prevenci XSS
5. Používejte konstanty pro konfigurační hodnoty
6. Dodržujte PSR standardy pro psaní kódu
7. Komentujte složitější části kódu
8. Používejte meaningful názvy proměnných a funkcí 