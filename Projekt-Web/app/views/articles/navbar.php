<?php if (session_status() === PHP_SESSION_NONE) { session_start(); } ?>
<!-- Hlavní navigační lišta s tmavým pozadím -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <!-- Logo a odkaz na hlavní stránku -->
        <a class="navbar-brand d-flex align-items-center" href="/WA-2025-Projekt/Projekt-Web/index.php">
            <img src="/WA-2025-Projekt/Projekt-Web/images/logo.png" 
                 alt="ReComp"
                 height="80"
                 class="d-inline-block align-text-top">
        </a>

        <!-- Tlačítko pro zobrazení menu na mobilních zařízeních -->
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Sbalitelné menu -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Hlavní navigační odkazy -->
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link px-3" href="/WA-2025-Projekt/Projekt-Web/introduction/introduction.php">Úvod</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-3" href="/WA-2025-Projekt/Projekt-Web/compatibility/compatibility.php">Kompatibilita</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-3" href="/WA-2025-Projekt/Projekt-Web/purchasing/purchasing.php">Nákup</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-3" href="/WA-2025-Projekt/Projekt-Web/usefulwebsites/usefulwebsites.php">Odkazy</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-3" href="/WA-2025-Projekt/Projekt-Web/community/community.php">Komunita</a>
                </li>
            </ul>

            <!-- Menu pro přihlášené/nepřihlášené uživatele -->
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <?php if (isset($_SESSION['username'])): ?>
                    <!-- Menu pro přihlášeného uživatele -->
                    <li class="nav-item">
                        <a class="nav-link px-3" href="/WA-2025-Projekt/Projekt-Web/app/controllers/ArticleController.php">
                            Přidat článek
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3" href="/WA-2025-Projekt/Projekt-Web/app/views/articles/article_edit_delete.php">
                            Editovat
                        </a>
                    </li>
                    <!-- Zobrazení jména přihlášeného uživatele -->
                    <li class="nav-item">
                        <span class="nav-link px-3 text-white-50">
                            <?= htmlspecialchars($_SESSION['username']) ?>
                        </span>
                    </li>
                    <!-- Odkaz pro odhlášení -->
                    <li class="nav-item">
                        <a class="nav-link px-3" href="/WA-2025-Projekt/Projekt-Web/app/controllers/logout.php">
                            Odhlásit
                        </a>
                    </li>
                <?php else: ?>
                    <!-- Menu pro nepřihlášeného uživatele -->
                    <li class="nav-item">
                        <a class="nav-link px-3" href="/WA-2025-Projekt/Projekt-Web/app/views/auth/login.php">
                            Přihlásit
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3" href="/WA-2025-Projekt/Projekt-Web/app/views/auth/register.php">
                            Registrace
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>