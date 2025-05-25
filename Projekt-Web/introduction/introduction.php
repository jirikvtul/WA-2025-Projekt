<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Úvod do stavby PC sestav s důrazem na použité komponenty a udržitelnost.">
    <meta name="author" content="Jiří Kvajsar">
    <title>Úvod | ReComp</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="../assets/favicon.ico">
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
</head>
<body class="bg-light">
    <!-- Responsive navbar-->
    <?php include '../app/views/articles/navbar.php';?> <!-- Volání navbaru -->
    <!-- Page header-->
    <header class="py-5 bg-warning border-bottom mb-4">
        <div class="container">
            <div class="text-center my-5">
                <h1 class="fw-bolder display-4">Úvod</h1>
                <p class="lead mb-0 fs-4">Proč stavět PC sestavy z použitých komponent?</p>
            </div>
        </div>
    </header>
    <!-- Page content-->
    <div class="container">
        <div class="row justify-content-center">
            <!-- Main content-->
            <div class="col-lg-10">
                <div class="card shadow-sm mb-4">
                    <div class="card-body">
                        <h2 class="card-title h3 mb-4">Vlastní PC sestavy a výhody použitých komponent</h2>
                        <div class="card-text">
                            <p class="mb-4">Stavba vlastního počítače je dnes dostupnější než kdy dříve. Díky online tutoriálům, videím na YouTube a nástrojům jako <a href="https://www.alza.cz/pc-konfigurator" target="_blank" class="text-decoration-none">Alza PC konfigurátor</a>/<a href="https://pcpartpicker.com" target="_blank" class="text-decoration-none">PCPartPicker</a> zvládne sestavit PC i začátečník. Ekonomická situace však zvyšuje ceny nových komponent – například kvůli inflaci a přetrvávajícímu nedostatku čipů. Výsledkem je, že nová výkonná PC sestava je pro mnohé, zejména studenty, finančně nedostupná. Řešením může být využití použitých komponent, které výrazně snižují náklady a přispívají k udržitelnosti tím, že omezují e-waste.</p>
                            
                            <div class="alert alert-info mb-4">
                                <strong>Tip:</strong> Použité komponenty mohou ušetřit až 50% nákladů oproti novým součástkám.
                            </div>

                            <p class="mb-4">Použité součástky však nejsou pro každého. Vyžadují čas na hledání na inzertních portálech, jako je <a href="https://www.bazos.cz" target="_blank" class="text-decoration-none">Bazos.cz</a> nebo <a href="https://www.aukro.cz" target="_blank" class="text-decoration-none">Aukro.cz</a>, a obezřetnost při ověřování stavu či vyhýbání se podvodníkům. Přesto pro nadšence, kteří hledají nejlepší poměr cena/výkon, představují ideální cestu k výkonné sestavě za zlomek ceny. Tento blog vás provede světem PC sestav s důrazem na nákup použitých i nových komponent. Nabídne tipy na spolehlivé portály, přehled aktuálních platforem a doporučení cen.</p>
                        </div>
                    </div>
                </div>
                <!-- Placeholder for image-->
                <div class="card shadow-sm mb-4">
                    <div class="row g-4">
                        <div class="col-12">
                            <img class="img-fluid rounded w-100" src="../images/Alza_konfigurátor.png" alt="Alza PC konfigurátor">
                            <div class="card-body">
                                <p class="card-text text-muted"><em>Obrázek 1: Alza PC konfigurátor - nástroj pro sestavení PC.</em></p>
                            </div>
                        </div>
                        <div class="col-12">
                            <img class="img-fluid rounded w-100" src="../images/PcPartPicker.png" alt="PCPartPicker">
                            <div class="card-body">
                                <p class="card-text text-muted"><em>Obrázek 2: PCPartPicker - populární nástroj pro sestavení PC.</em></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Include the footer -->
    <?php include '../app/views/articles/footer.php'; ?>

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</body>
</html>