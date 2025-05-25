<?php
/**
 * Community page
 * Displays all articles in a card-based layout
 * Allows users to view full article content and comments in expandable sections
 */

// Initialize session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Load database connection and Article model
require_once __DIR__ . '/../app/models/Database.php';
require_once __DIR__ . '/../app/models/Article.php';
require_once __DIR__ . '/../app/models/Comment.php';

// Fetch all articles from the database
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
    <!-- Meta tags for SEO and responsive design -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Komunitní sekce pro sdílení zkušeností a diskuzi o PC sestavách.">
    <meta name="author" content="Jiří Kvajsar">
    <title>Komunita | ReComp</title>
    <link rel="icon" type="image/x-icon" href="../assets/favicon.ico">
    <!-- External CSS dependencies -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body class="bg-light">
    <?php include '../app/views/articles/navbar.php'; ?>

    <!-- Page header -->
    <header class="py-5 bg-warning border-bottom mb-4">
        <div class="container">
            <div class="text-center my-5">
                <h1 class="fw-bolder display-4">Komunitní sekce</h1>
                <p class="lead mb-0 fs-4">Sdílejte své zkušenosti a diskutujte o PC sestavách</p>
            </div>
        </div>
    </header>

    <!-- Main content container -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card shadow-sm mb-4">
                    <div class="card-body">
                        <h2 class="card-title h3 mb-4">Komunita</h2>
                        <div class="card-text">
                            <?php if (isset($error)): ?>
                                <!-- Error message display -->
                                <div class="alert alert-danger" role="alert">
                                    <i class="bi bi-exclamation-triangle-fill me-2"></i>
                                    <?= htmlspecialchars($error) ?>
                                </div>
                            <?php endif; ?>

                            <?php if (empty($articles)): ?>
                                <!-- No articles message -->
                                <div class="alert alert-info" role="alert">
                                    <i class="bi bi-info-circle-fill me-2"></i>
                                    Zatím zde nejsou žádné příspěvky.
                                </div>
                            <?php else: ?>
                                <!-- Articles grid -->
                                <div class="row">
                                    <?php foreach ($articles as $article): 
                                        // Get comments for this article
                                        $commentModel = new Comment($db);
                                        $comments = $commentModel->getCommentsByArticle($article['id']);
                                    ?>
                                        <!-- Article card -->
                                        <div class="col-12 mb-4">
                                            <div class="card shadow-sm">
                                                <!-- Card header with title and author -->
                                                <div class="card-header bg-primary text-white">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <h5 class="card-title mb-0">
                                                            <i class="bi bi-pencil-square me-2"></i>
                                                            <?= htmlspecialchars($article['title']) ?>
                                                        </h5>
                                                        <small>
                                                            <i class="bi bi-person-circle me-1"></i>
                                                            <?= htmlspecialchars($article['username']) ?>
                                                        </small>
                                                    </div>
                                                </div>
                                                <!-- Card body with article content -->
                                                <div class="card-body">
                                                    <p class="card-text">
                                                        <?= nl2br(htmlspecialchars($article['content'])) ?>
                                                    </p>
                                                    
                                                    <!-- Comments button -->
                                                    <button class="btn btn-outline-secondary btn-sm" 
                                                            type="button" 
                                                            data-bs-toggle="collapse" 
                                                            data-bs-target="#comments<?= $article['id'] ?>" 
                                                            aria-expanded="false" 
                                                            aria-controls="comments<?= $article['id'] ?>">
                                                        <i class="bi bi-chat me-1"></i>Komentáře
                                                        <?php if (count($comments) > 0): ?>
                                                            <span class="badge bg-secondary ms-1"><?= count($comments) ?></span>
                                                        <?php endif; ?>
                                                    </button>

                                                    <!-- Comments section -->
                                                    <div class="collapse mt-3" id="comments<?= $article['id'] ?>">
                                                        <?php if (isset($_SESSION['user_id'])): ?>
                                                            <form action="../app/controllers/add_comment.php" method="POST" class="mb-3">
                                                                <input type="hidden" name="article_id" value="<?= $article['id'] ?>">
                                                                <div class="form-group">
                                                                    <textarea name="content" class="form-control" rows="2" placeholder="Napište svůj komentář..." required></textarea>
                                                                </div>
                                                                <button type="submit" class="btn btn-primary btn-sm mt-2">Přidat komentář</button>
                                                            </form>
                                                        <?php else: ?>
                                                            <div class="alert alert-info py-2 mb-3">
                                                                Pro přidání komentáře se prosím <a href="../app/views/auth/login.php">přihlaste</a>.
                                                            </div>
                                                        <?php endif; ?>

                                                        <div class="comments-list">
                                                            <?php foreach ($comments as $comment): ?>
                                                                <div class="comment card mb-2">
                                                                    <div class="card-body py-2">
                                                                        <div class="d-flex justify-content-between align-items-center">
                                                                            <h6 class="card-subtitle mb-1 text-muted small">
                                                                                <?= htmlspecialchars($comment['username']) ?>
                                                                            </h6>
                                                                        </div>
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
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Include the footer -->
    <?php include '../app/views/articles/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</body>
</html>
