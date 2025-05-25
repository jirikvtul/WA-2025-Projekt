<?php
// Povolení zobrazení chyb pro vývoj
error_reporting(E_ALL);
ini_set('display_errors', 1);

/**
 * Komunitní stránka
 * 
 * Funkce:
 * - Zobrazuje všechny články v kartách
 * - Umožňuje přidávání komentářů
 * - Zobrazuje komentáře v rozbalovacích sekcích
 * - Kontroluje přihlášení uživatelů
 */

// Inicializace session, pokud ještě není spuštěna
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Načtení potřebných modelů pro práci s databází
require_once __DIR__ . '/../app/models/Database.php';
require_once __DIR__ . '/../app/models/Article.php';
require_once __DIR__ . '/../app/models/Comment.php';

// Načtení článků z databáze
try {
    $db = (new Database())->getConnection();
    $articleModel = new Article($db);
    $articles = $articleModel->getAll();
} catch (PDOException $e) {
    $error = "Chyba při načítání článků. Zkuste to prosím později.";
    $articles = [];
}
?>
<!DOCTYPE html>
<html lang="cs">
<head>
    <!-- Meta tagy pro SEO a responzivní design -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Komunitní sekce pro sdílení zkušeností a diskuzi o PC sestavách.">
    <meta name="author" content="Jiří Kvajsar">
    <title>Komunita | ReComp</title>
    <link rel="icon" type="image/x-icon" href="/WA-2025-Kvajsar-Jiri/Projekt-Web/assets/favicon.ico">
    <!-- Externí CSS závislosti -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
</head>
<body class="bg-light">
    <!-- Načtení navigačního menu -->
    <?php include __DIR__ . '/../app/views/articles/navbar.php'; ?>

    <!-- Hlavička stránky -->
    <header class="py-5 bg-warning border-bottom mb-4">
        <div class="container">
            <div class="text-center my-5">
                <h1 class="fw-bolder display-4">Komunitní sekce</h1>
                <p class="lead mb-0 fs-4">Sdílejte své zkušenosti a diskutujte o PC sestavách</p>
            </div>
        </div>
    </header>

    <!-- Hlavní kontejner s obsahem -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card shadow-sm mb-4">
                    <div class="card-body">
                        <h2 class="card-title h3 mb-4">Komunita</h2>
                        <div class="card-text">
                            <?php if (isset($error)): ?>
                                <!-- Zobrazení chybové hlášky -->
                                <div class="alert alert-danger" role="alert">
                                    <?= htmlspecialchars($error) ?>
                                </div>
                            <?php endif; ?>

                            <!-- Mřížka článků -->
                            <div class="row">
                                <?php foreach ($articles as $article): 
                                    // Načtení komentářů pro aktuální článek
                                    $commentModel = new Comment($db);
                                    $comments = $commentModel->getCommentsByArticle($article['id']);
                                ?>
                                    <!-- Karta článku -->
                                    <div class="col-12 mb-4">
                                        <div class="card shadow-sm">
                                            <!-- Hlavička karty s názvem a autorem -->
                                            <div class="card-header bg-primary text-white">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <h5 class="card-title mb-0">
                                                        <?= htmlspecialchars($article['title']) ?>
                                                    </h5>
                                                    <small>
                                                        <?= htmlspecialchars($article['username']) ?>
                                                    </small>
                                                </div>
                                            </div>
                                            <!-- Tělo karty s obsahem článku -->
                                            <div class="card-body">
                                                <p class="card-text">
                                                    <?= nl2br(htmlspecialchars($article['content'])) ?>
                                                </p>
                                                
                                                <!-- Tlačítko pro zobrazení komentářů -->
                                                <button class="btn btn-outline-secondary btn-sm" 
                                                        type="button" 
                                                        data-bs-toggle="collapse" 
                                                        data-bs-target="#comments<?= $article['id'] ?>" 
                                                        aria-expanded="false" 
                                                        aria-controls="comments<?= $article['id'] ?>">
                                                    Komentáře
                                                    <?php if (count($comments) > 0): ?>
                                                        <span class="badge bg-secondary ms-1"><?= count($comments) ?></span>
                                                    <?php endif; ?>
                                                </button>

                                                <!-- Sekce komentářů -->
                                                <div class="collapse mt-3" id="comments<?= $article['id'] ?>">
                                                    <?php if (isset($_SESSION['user_id'])): ?>
                                                        <!-- Formulář pro přidání komentáře (pouze pro přihlášené uživatele) -->
                                                        <form action="/WA-2025-Kvajsar-Jiri/Projekt-Web/app/controllers/add_comment.php" method="POST" class="mb-3">
                                                            <input type="hidden" name="article_id" value="<?= $article['id'] ?>">
                                                            <div class="form-group">
                                                                <textarea name="content" class="form-control" rows="2" placeholder="Napište svůj komentář..." required></textarea>
                                                            </div>
                                                            <button type="submit" class="btn btn-primary btn-sm mt-2">Přidat komentář</button>
                                                        </form>
                                                    <?php else: ?>
                                                        <!-- Zpráva pro nepřihlášené uživatele -->
                                                        <div class="alert alert-info py-2 mb-3">
                                                            Pro přidání komentáře se prosím <a href="/WA-2025-Kvajsar-Jiri/Projekt-Web/app/views/auth/login.php">přihlaste</a>.
                                                        </div>
                                                    <?php endif; ?>

                                                    <!-- Seznam komentářů -->
                                                    <div class="comments-list">
                                                        <?php foreach ($comments as $comment): ?>
                                                            <!-- Karta jednotlivého komentáře -->
                                                            <div class="comment card mb-2">
                                                                <div class="card-body py-2">
                                                                    <div class="d-flex justify-content-between align-items-center">
                                                                        <h6 class="card-subtitle mb-1 text-muted small">
                                                                            <?= htmlspecialchars($comment['username']) ?>
                                                                        </h6>
                                                                    </div>
                                                                    <!-- nl2br() převádí odřádkování v textu na HTML <br> tagy -->
                                                                    <p class="card-text small mb-0"><?= nl2br(htmlspecialchars($comment['content'])) ?></p>
                                                                </div>
                                                            </div>
                                                        <?php endforeach; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Načtení patičky -->
    <?php include __DIR__ . '/../app/views/articles/footer.php'; ?>

    <!-- Bootstrap JavaScript pro interaktivní komponenty -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</body>
</html>
