<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Užitečné odkazy a programy pro stavbu PC sestav a testování hardwaru.">
    <meta name="author" content="Jiří Kvajsar">
    <title>Užitečné odkazy | ReComp</title>
    <link rel="icon" type="image/x-icon" href="../assets/favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
</head>
<body class="bg-light">
    <?php include '../app/views/articles/navbar.php'; ?>
    <header class="py-5 bg-warning border-bottom mb-4">
        <div class="container">
            <div class="text-center my-5">
                <h1 class="fw-bolder display-4">Užitečné odkazy</h1>
                <p class="lead mb-0 fs-4">Webové stránky a programy pro stavitele PC sestav</p>
            </div>
        </div>
    </header>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card shadow-sm mb-4">
                    <div class="card-body">
                        <h2 class="card-title h3 mb-4">Užitečné odkazy pro sestavení PC</h2>
                        <div class="card-text">
                            <p class="mb-4">Pro kompatibilitu a sestavu PC již zmíněny portály <a href="https://pcpartpicker.com" target="_blank" class="text-decoration-none">PCPartPicker.com</a> a <a href="https://www.alza.cz/pc-konfigurator" target="_blank" class="text-decoration-none">Alza PC konfigurátor</a> jsou skvělé, jakožto základní stavební kámen, když nevíte kudy kam. Také se můžete poradit na fórech jako je například <a href="https://linustechtips.com" target="_blank" class="text-decoration-none">LinusTechTips.com</a> nebo subreddit <a href="https://www.reddit.com/r/buildapc" target="_blank" class="text-decoration-none">r/buildapc</a>.</p>
                        </div>

                        <h3 class="h4 mb-3">Programy pro instalaci a testování</h3>
                        <div class="card-text">
                            <p class="mb-4">Pokud by se někdo trošku cítil je dobré použít program na instalační média například <a href="https://rufus.ie" target="_blank" class="text-decoration-none">Rufus</a>, kde si lze modifikovat instalační ISO, v případě Windowsu lze například vypnout požadavek na připojení k Microsoft účtu, nebo přeskočit TPM 2.0 požadavek hardwaru.</p>

                            <div class="alert alert-info mb-4">
                                Pro testování zakoupeného hardwaru je skvělý <a href="https://www.maxon.net/en/cinebench" target="_blank" class="text-decoration-none">CineBench</a> nebo <a href="https://www.guru3d.com/files-details/prime95-download.html" target="_blank" class="text-decoration-none">Prime95</a> pro CPU a <a href="https://www.3dmark.com" target="_blank" class="text-decoration-none">3DMark</a> pro GPU, to jsou takové zlaté standardy. Ovšem SpyMark je za poplatek pro takové obyčejné testování se používá například <a href="https://benchmark.unigine.com/heaven" target="_blank" class="text-decoration-none">Heaven's Benchmark</a>, ale ten už je relativně dost zastaralý, ovšem pro základní stabilitu poslouží.
                            </div>
                        </div>
                        <h3 class="h4 mb-3">Optimalizace systému</h3>
                        <div class="card-text">
                            <p class="mb-4">Skvělý nástroj pro stažení softwaru a optimalizace Windows je <a href="https://github.com/ChrisTitusTech/winutil" target="_blank" class="text-decoration-none">CTT Windows Optimizer</a>. Open-Source nástroj, který byl vyvinut pro zrychlení nových Windowsů a vypnutí jejich "otravných" funkcí. Zároveň slouží také jako instalátor programů skrz Microsoft službu Winget. Velmi rychlý automatický download aplikací.</p>

                            <div class="card-text">
                                Určitě stojí za zmínku <a href="https://www.techpowerup.com/download/nvidia-nvcleanstall/" target="_blank" class="text-decoration-none">nvcleanstall</a>, což je také open-source program pro optimalizaci driverů pro Nvidia karty, driver se nainstaluje bez zbytečností a bez telemetrie, to je spíše, ale taková třešnička na dortu, není to zdaleka potřeba k hladkému chodu systému.
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Images section -->
                <div class="card shadow-sm mb-4">
                    <div class="row g-4">
                        <div class="col-12">
                            <img class="img-fluid rounded w-100" src="../images/CTT1.png" alt="CTT Windows Optimizer - Hlavní obrazovka">
                            <div class="card-body">
                                <p class="card-text text-muted"><em>Obrázek 1: CTT Windows Optimizer - hlavní obrazovka s možnostmi optimalizace.</em></p>
                            </div>
                        </div>
                        <div class="col-12">
                            <img class="img-fluid rounded w-100" src="../images/CTT2.png" alt="CTT Windows Optimizer - Instalace programů">
                            <div class="card-body">
                                <p class="card-text text-muted"><em>Obrázek 2: CTT Windows Optimizer - sekce pro instalaci programů pomocí Winget.</em></p>
                            </div>
                        </div>
                        <div class="col-12">
                            <img class="img-fluid rounded w-100" src="../images/nvcleanstall.png" alt="NVCleanstall - Optimalizace Nvidia driverů">
                            <div class="card-body">
                                <p class="card-text text-muted"><em>Obrázek 3: NVCleanstall - nástroj pro optimalizaci a instalaci Nvidia driverů.</em></p>
                            </div>
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