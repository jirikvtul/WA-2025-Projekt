<?php
/**
 * Stránka pro přihlášení uživatele
 * 
 * Tato stránka poskytuje:
 * - Přihlašovací formulář
 * - Zobrazení chybových hlášek
 * - Odkaz na registraci
 * - Bezpečnostní opatření
 */

// Spuštění session pro autentizaci uživatele
session_start(); 
?>
<!DOCTYPE html>
<html lang="cs">
<head>
    <!-- Meta tagy pro správné kódování a responzivní zobrazení -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- SEO meta tagy -->
    <meta name="description" content="Přihlášení do sekce Sekáčové PC sestavy">
    <meta name="author" content="Jiří Kvajsar">
    <title>Přihlášení - Sekáčové PC sestavy</title>
    
    <!-- Favicon a externí zdroje -->
    <link rel="icon" type="image/x-icon" href="../../assets/favicon.ico">
    <!-- Bootstrap CSS pro stylování -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
</head>
<body class="bg-light">
    <!-- Zahrnutí navigační lišty -->
    <?php include '../articles/navbar.php'; ?>

    <!-- Hlavní kontejner obsahu -->
    <div class="container mt-5">
        <div class="row justify-content-center">
            <!-- Kontejner přihlašovacího formuláře - centrovaný a responzivní -->
            <div class="col-md-6 col-lg-5">
                <div class="card shadow-sm">
                    <!-- Hlavička formuláře -->
                    <div class="card-header bg-primary text-white text-center py-3">
                        <h2 class="h3 mb-0">Přihlášení</h2>
                    </div>
                    <!-- Tělo formuláře -->
                    <div class="card-body p-4">
                        <!-- Zobrazení chybové hlášky -->
                        <?php if (isset($_GET['error'])): ?>
                            <div class="alert alert-danger d-flex align-items-center" role="alert">
                                <div>Neplatné přihlašovací údaje.</div>
                            </div>
                        <?php endif; ?>

                        <!-- Přihlašovací formulář -->
                        <form action="../../controllers/login.php" method="post">
                            <!-- Pole pro uživatelské jméno -->
                            <div class="mb-3">
                                <label for="username" class="form-label">
                                    Uživatelské jméno <span class="text-danger">*</span>
                                </label>
                                <input type="text" id="username" name="username" class="form-control" required>
                            </div>
                            <!-- Pole pro heslo -->
                            <div class="mb-4">
                                <label for="password" class="form-label">
                                    Heslo <span class="text-danger">*</span>
                                </label>
                                <input type="password" id="password" name="password" class="form-control" required>
                            </div>
                            <!-- Tlačítko pro odeslání -->
                            <button type="submit" class="btn btn-primary w-100 py-2">
                                Přihlásit se
                            </button>
                        </form>

                        <!-- Odkaz na registraci -->
                        <div class="mt-4 text-center">
                            <a href="register.php" class="text-decoration-none">
                                Nemáte účet? Registrujte se
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JavaScript pro interaktivní komponenty -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</body>
</html>