<?php
// Spuštění session, pokud ještě není spuštěna
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Přesměrování nepřihlášených uživatelů na seznam článků
if (!isset($_SESSION['user_id'])) {
    header("Location: ../../controllers/article_list.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="cs">
<head>
    <!-- Meta tagy pro správné kódování a responzivní zobrazení -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- SEO meta tagy -->
    <meta name="description" content="Přidání nového článku do sekce Sekáčové PC sestavy">
    <meta name="author" content="Jiří Kvajsar">
    <title>Přidat článek | ReComp</title>
    
    <!-- Favicon a externí zdroje -->
    <link rel="icon" type="image/x-icon" href="../../assets/favicon.ico">
    <!-- Bootstrap CSS pro stylování -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
</head>
<body class="bg-light">
    <!-- Načtení navigačního menu -->
    <?php include 'navbar.php'; ?>

    <!-- Hlavní kontejner s obsahem -->
    <div class="container mt-5">
        <div class="row justify-content-center">
            <!-- Kontejner formuláře - centrovaný a responzivní -->
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <!-- Hlavička karty s nadpisem -->
                    <div class="card-header bg-primary text-white text-center py-3">
                        <h2 class="h3 mb-0">Přidat nový článek</h2>
                    </div>
                    <!-- Tělo karty obsahující formulář -->
                    <div class="card-body p-4">
                        <!-- Formulář pro vytvoření článku -->
                        <form action="/WA-2025-Projekt/Projekt-Web/app/controllers/ArticleController.php" method="post">
                            <!-- Pole pro název článku -->
                            <div class="mb-4">
                                <label for="title" class="form-label">
                                    Název článku <span class="text-danger">*</span>
                                </label>
                                <input type="text" id="title" name="title" class="form-control" required>
                            </div>
                            <!-- Pole pro obsah článku -->
                            <div class="mb-4">
                                <label for="content" class="form-label">
                                    Obsah <span class="text-danger">*</span>
                                </label>
                                <textarea id="content" name="content" class="form-control" rows="8" required></textarea>
                            </div>
                            <!-- Tlačítko pro odeslání formuláře -->
                            <button type="submit" class="btn btn-primary w-100 py-2">
                                Uložit článek
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JavaScript pro interaktivní komponenty -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</body>
</html>