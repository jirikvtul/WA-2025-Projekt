<!DOCTYPE html>
<html lang="cs">
    <head>
        <!-- Základní meta tagy pro správné kódování a responzivní zobrazení -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        
        <!-- SEO meta tagy pro lepší viditelnost ve vyhledávačích -->
        <meta name="description" content="Blog o stavbě PC sestav s důrazem na použité komponenty a udržitelnost." />
        <meta name="author" content="Jiří Kvajsar" />
        <title>Domov | ReComp</title>
        
        <!-- Favicon pro ikonu v záložce prohlížeče -->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        
        <!-- Externí CSS frameworky a knihovny -->
        <!-- Bootstrap 5.3.5 pro responzivní layout a komponenty -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
        <!-- Bootstrap Icons pro škálovatelné vektorové ikony -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    </head>
    <body class="bg-light">
        <!-- Načtení navigačního menu ze samostatného souboru pro lepší údržbu -->
        <?php include 'app/views/articles/navbar.php';?>
        
        <!-- Hlavička stránky s nadpisem a podnadpisem -->
        <header class="py-5 bg-warning border-bottom mb-4">
            <div class="container">
                <div class="text-center my-5">
                    <h1 class="fw-bolder display-4">Sekáčové PC sestavy</h1>
                    <p class="lead mb-0 fs-4">Vše o PC sestavách, tipech a užitečných programech!</p>
                </div>
            </div>
        </header>

        <!-- Hlavní kontejner s obsahem -->
        <div class="container">
            <div class="row justify-content-center">
                <!-- Hlavní obsah stránky -->
                <div class="col-lg-10">
                    <!-- Mřížka s hlavními sekcemi -->
                    <div class="row g-4">
                        <!-- Karta sekce kompatibility -->
                        <div class="col-md-6">
                            <div class="card shadow-sm h-100">
                                <div class="card-body d-flex flex-column">
                                    <!-- Hlavička karty s ikonou a nadpisem -->
                                    <div class="d-flex align-items-center mb-3">
                                        <i class="bi bi-cpu-fill text-primary fs-1 me-3"></i>
                                        <h2 class="card-title h4 mb-0">Kompatibilita komponentů</h2>
                                    </div>
                                    <!-- Obsah karty -->
                                    <p class="card-text">Naučte se, jak správně vybrat kompatibilní komponenty pro vaši PC sestavu. Zjistěte, které kombinace fungují nejlépe a jak se vyhnout běžným problémům.</p>
                                    <!-- Tlačítko pro přechod na detail -->
                                    <a class="btn btn-primary mt-auto" href="compatibility/compatibility.php">
                                        <i class="bi bi-arrow-right-circle me-1"></i>Zjistit více
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Karta sekce nákupu -->
                        <div class="col-md-6">
                            <div class="card shadow-sm h-100">
                                <div class="card-body d-flex flex-column">
                                    <div class="d-flex align-items-center mb-3">
                                        <i class="bi bi-cart-fill text-primary fs-1 me-3"></i>
                                        <h2 class="card-title h4 mb-0">Nákup komponent</h2>
                                    </div>
                                    <p class="card-text">Objevte nejlepší místa pro nákup nových i použitých komponent. Naučte se, jak vybrat kvalitní součástky a ušetřit při stavbě vašeho PC.</p>
                                    <a class="btn btn-primary mt-auto" href="purchasing/purchasing.php">
                                        <i class="bi bi-arrow-right-circle me-1"></i>Zjistit více
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Karta sekce užitečných odkazů -->
                        <div class="col-md-6">
                            <div class="card shadow-sm h-100">
                                <div class="card-body d-flex flex-column">
                                    <div class="d-flex align-items-center mb-3">
                                        <i class="bi bi-link-45deg text-primary fs-1 me-3"></i>
                                        <h2 class="card-title h4 mb-0">Užitečné odkazy</h2>
                                    </div>
                                    <p class="card-text">Kolekce nejlepších nástrojů, webů a aplikací pro stavbu a správu PC. Od benchmarků po diagnostické nástroje - vše na jednom místě.</p>
                                    <a class="btn btn-primary mt-auto" href="usefulwebsites/usefulwebsites.php">
                                        <i class="bi bi-arrow-right-circle me-1"></i>Zjistit více
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Karta komunitní sekce -->
                        <div class="col-md-6">
                            <div class="card shadow-sm h-100">
                                <div class="card-body d-flex flex-column">
                                    <div class="d-flex align-items-center mb-3">
                                        <i class="bi bi-people-fill text-primary fs-1 me-3"></i>
                                        <h2 class="card-title h4 mb-0">Komunitní sekce</h2>
                                    </div>
                                    <p class="card-text">Připojte se k naší komunitě a sdílejte své zkušenosti. Diskutujte o PC sestavách, ptejte se na rady a pomozte ostatním.</p>
                                    <a class="btn btn-primary mt-auto" href="community/community.php">
                                        <i class="bi bi-arrow-right-circle me-1"></i>Zjistit více
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Načtení patičky stránky -->
        <?php include 'app/views/articles/footer.php'; ?>

        <!-- Bootstrap JavaScript bundle pro interaktivní komponenty -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>     
    </body>
</html>