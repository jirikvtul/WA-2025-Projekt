<?php
/**
 * Stránka pro registraci uživatelů
 * 
 * Tato stránka poskytuje:
 * - Registrační formulář s validací
 * - Požadavky na sílu hesla
 * - Kontrolu shody hesel na straně klienta
 * - Zpracování chybových hlášek
 * - Volitelná pole pro dodatečné informace
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
    <meta name="description" content="Registrace do sekce Sekáčové PC sestavy">
    <meta name="author" content="Jiří Kvajsar">
    <title>Registrace - Sekáčové PC sestavy</title>
    
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
            <!-- Kontejner registračního formuláře - centrovaný a responzivní -->
            <div class="col-md-8 col-lg-6">
                <div class="card shadow-sm">
                    <!-- Hlavička formuláře -->
                    <div class="card-header bg-primary text-white text-center py-3">
                        <h2 class="h3 mb-0">Registrace</h2>
                    </div>
                    <!-- Tělo formuláře -->
                    <div class="card-body p-4">
                        <!-- Zobrazení chybových hlášek podle typu chyby -->
                        <?php if (isset($_GET['error'])): ?>
                            <div class="alert alert-danger d-flex align-items-center" role="alert">
                                <div>
                                    <?php
                                    // Zpracování chybových hlášek podle typu chyby
                                    switch ($_GET['error']) {
                                        case 'empty_fields':
                                            echo 'Vyplňte prosím všechna povinná pole.';
                                            break;
                                        case 'password_mismatch':
                                            echo 'Hesla se neshodují.';
                                            break;
                                        case 'username_taken':
                                            echo 'Uživatelské jméno je již obsazené.';
                                            break;
                                        default:
                                            echo 'Registrace se nezdařila. Zkontrolujte údaje.';
                                    }
                                    ?>
                                </div>
                            </div>
                        <?php endif; ?>

                        <!-- Registrační formulář s validací na straně klienta -->
                        <form id="registrationForm" action="../../controllers/register.php" method="post">
                            <!-- Pole pro uživatelské jméno (povinné) -->
                            <div class="mb-3">
                                <label for="username" class="form-label">
                                    Uživatelské jméno <span class="text-danger">*</span>
                                </label>
                                <input type="text" id="username" name="username" class="form-control" required>
                            </div>
                            <!-- Pole pro e-mail (nepovinné) -->
                            <div class="mb-3">
                                <label for="email" class="form-label">
                                    E-mail (nepovinný)
                                </label>
                                <input type="email" id="email" name="email" class="form-control">
                            </div>
                            <!-- Pole pro jméno a příjmení (nepovinné) -->
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="name" class="form-label">
                                        Jméno (nepovinné)
                                    </label>
                                    <input type="text" id="name" name="name" class="form-control">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="surname" class="form-label">
                                        Příjmení (nepovinné)
                                    </label>
                                    <input type="text" id="surname" name="surname" class="form-control">
                                </div>
                            </div>
                            <!-- Pole pro heslo s požadavky na sílu -->
                            <div class="mb-3">
                                <label for="password" class="form-label">
                                    Heslo <span class="text-danger">*</span>
                                </label>
                                <input type="password" id="password" name="password" class="form-control"
                                       pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$"
                                       title="Min. 8 znaků, 1 velké písmeno a 1 číslo" required>
                                <div class="form-text">
                                    Min. 8 znaků, 1 velké písmeno a 1 číslo
                                </div>
                            </div>
                            <!-- Pole pro potvrzení hesla -->
                            <div class="mb-4">
                                <label for="password_confirm" class="form-label">
                                    Potvrzení hesla <span class="text-danger">*</span>
                                </label>
                                <input type="password" id="password_confirm" name="password_confirm" class="form-control" required>
                                <div id="passwordMatchMessage" class="form-text text-danger d-none">
                                    Hesla se neshodují.
                                </div>
                            </div>
                            <!-- Tlačítko pro odeslání -->
                            <button type="submit" class="btn btn-primary w-100 py-2">
                                Registrovat se
                            </button>
                        </form>

                        <!-- Odkaz na přihlášení pro existující uživatele -->
                        <div class="mt-4 text-center">
                            <a href="login.php" class="text-decoration-none">
                                Již máte účet? Přihlaste se
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JavaScript pro interaktivní komponenty -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>

    <!-- Skript pro kontrolu shody hesel na straně klienta -->
    <script>
        // Získání elementů formuláře
        const form = document.getElementById('registrationForm');
        const password = document.getElementById('password');
        const confirm = document.getElementById('password_confirm');
        const message = document.getElementById('passwordMatchMessage');

        // Přidání event listeneru pro validaci hesel při odeslání
        form.addEventListener('submit', function (e) {
            if (password.value !== confirm.value) {
                e.preventDefault();
                message.classList.remove('d-none');
            } else {
                message.classList.add('d-none');
            }
        });
    </script>
</body>
</html>