<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Pochopení kompatibility PC komponentů pro stavbu vlastní sestavy.">
    <meta name="author" content="Jiří Kvajsar">
    <title>Kompatibilita | ReComp</title>
    <link rel="icon" type="image/x-icon" href="../assets/favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
</head>
<body class="bg-light">
    <?php include '../app/views/articles/navbar.php'; ?>
    <header class="py-5 bg-warning border-bottom mb-4">
        <div class="container">
            <div class="text-center my-5">
                <h1 class="fw-bolder display-4">Kompatibilita komponentů</h1>
                <p class="lead mb-0 fs-4">Pochopení PC komponent a jejich kompatibility</p>
            </div>
        </div>
    </header>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card shadow-sm mb-4">
                    <div class="card-body">
                        <h2 class="card-title h3 mb-4">Pochopení PC komponent a jejich kompatibility</h2>
                        <div class="card-text">
                            <p class="mb-4">Každá PC sestava se skládá minimálně ze 7 komponent, bez kterých není možné počítač zprovoznit:</p>
                            <ul class="list-unstyled mb-4">
                                <li><strong>CPU</strong> (procesor)</li>
                                <li><strong>MOBO</strong> (základní deska)</li>
                                <li><strong>GPU</strong> (grafická karta)</li>
                                <li><strong>RAM</strong> (operační paměť)</li>
                                <li><strong>SSD/HDD</strong> (úložiště)</li>
                                <li><strong>PSU</strong> (zdroj)</li>
                                <li><strong>PC Case</strong> (skříň)</li>
                            </ul>

                            <h3 class="h4 mb-3">Procesor a základní deska</h3>
                            <p class="mb-4">Tyto součástky jsou nezbytné pro chod počítače. Klíčová je jejich vzájemná kompatibilita. Nejdůležitější je shoda patice procesoru se základní deskou. Při zkoumání procesoru, například jednoho z aktuálně nejlepších herních procesorů AMD Ryzen 7 9800X3D, zjistíme, že nemá piny na sobě.</p>
                            
                            <div class="row mb-4 justify-content-center">
                                <div class="col-md-6">
                                    <img src="../images/AMD_ryzen_9800_x3d.png" class="img-fluid rounded mb-2" alt="AMD Ryzen 9800X3D">
                                    <p class="text-muted small text-center">AMD Ryzen 9800X3D</p>
                                </div>
                            </div>

                            <p class="mb-4">Patice AM5 je tzv. LGA (Land Grid Array), kde jsou piny umístěny na základní desce, nikoli na procesoru. Naopak PGA (Pin Grid Array) má piny na procesoru. Na níže uvedeném obrázku je patrný rozdíl mezi těmito dvěma typy patic.</p>

                            <div class="row mb-4 justify-content-center">
                                <div class="col-md-6">
                                    <img src="../images/PGAvsLGA.png" class="img-fluid rounded mb-2" alt="PGA vs LGA">
                                    <p class="text-muted small text-center">PGA vs LGA</p>
                                </div>
                                <div class="col-md-6">
                                    <img src="../images/PGAvsLGA_MOBO.png" class="img-fluid rounded mb-2" alt="PGA vs LGA na základní desce">
                                    <p class="text-muted small text-center">PGA vs LGA na základní desce</p>
                                </div>
                            </div>

                            <p class="mb-4">Pro běžné nadšence nemá tato informace vliv na výkon systému, ale je důležité, aby se patice základní desky shodovala s procesorem. Z mého pohledu stojí za zmínku, že při nákupu použitého nebo poškozeného procesoru je výhodnější volit PGA patice, například AM4 od AMD. Pokud je procesor inzerován jako poškozený, může být příčinou ohnutý pin, který lze relativně jednoduše narovnat pomocí drobného plochého šroubováku nebo párátka. U LGA procesorů, jako jsou nové AM5 nebo moderní procesory Intel, je domácí oprava výrazně složitější.</p>

                            <h3 class="h4 mb-3">Paměť RAM</h3>
                            <p class="mb-4">Po výběru platformy je třeba zaměřit se na kompatibilitu operační paměti. Nejnovější jsou paměti DDR5, ale při nákupu použitých či starších komponent se pravděpodobně setkáte s DDR4. Systém nebude fungovat, pokud paměti nesplňují požadavky základní desky.</p>

                            <h3 class="h4 mb-3">Grafická karta</h3>
                            <p class="mb-4">Následuje výběr grafické karty. Pro nejlepší herní výkon je ideální zvolit co nejvýkonnější kartu, kterou rozpočet dovolí, a ostatní komponenty případně omezit. Naopak pro střih videí nebo pracovní využití je vhodnější investovat do výkonnějšího procesoru a větší kapacity RAM. Grafické karty se připojují přes PCI-Express port, do kterého by měly pasovat všechny běžně dostupné karty. Rozdíly spočívají pouze ve výkonu a rozměrech.</p>

                            <div class="row mb-4 justify-content-center">
                                <div class="col-md-8">
                                    <img src="../images/GPU_RTX_4060_EXAMPLE.png" class="img-fluid rounded mb-2" alt="GIGABYTE RTX 4060 AERO OC 8G">
                                    <p class="text-muted small text-center">GIGABYTE RTX 4060 AERO OC 8G</p>
                                </div>
                            </div>

                            <p class="mb-4">Výrobce karet uvádí doporučený výkon zdroje, například u karty GIGABYTE RTX 4060 AERO OC 8G jsou uvedeny následující parametry:</p>
                            <ul class="mb-4">
                                <li><strong>Velikost chladiče (počet zabraných slotů, výška karty).</strong></li>
                                <li><strong>Šířka karty (každá skříň má maximální povolenou šířku).</strong></li>
                                <li><strong>Doporučený výkon zdroje (minimálně 450 W).</strong></li>
                            </ul>

                            <p class="mb-4">V současnosti je 450 W považováno za nižší hodnotu, a osobně doporučuji volit zdroje s výkonem 600–650 W od kvalitních výrobců s vysokou efektivitou. Příliš slabý zdroj může potenciálně způsobit zkrat a poškodit celý systém, což by bylo značně nepříjemné.</p>

                            <h3 class="h4 mb-3">Rozměry systému (Form-Factor MOBO)</h3>
                            <p class="mb-4">Dalším aspektem kompatibility jsou rozměry. Základní desky se dělí do tří hlavních kategorií podle fyzické velikosti:</p>
                            <ol class="mb-4">
                                <li><strong>mini-ITX</strong></li>
                                <li><strong>m-ATX</strong></li>
                                <li><strong>ATX</strong></li>
                            </ol>

                            <div class="row mb-4 justify-content-center">
                                <div class="col-md-8">
                                    <img src="../images/MOBO_SIZE_COMPARASION.png" class="img-fluid rounded mb-2" alt="Porovnání velikostí základních desek">
                                    <p class="text-muted small text-center">Porovnání velikostí základních desek <small class="text-muted">(Zdroj: Voltcave.com)</small></p>
                                </div>
                            </div>

                            <p class="mb-4">Tyto formáty jsou seřazeny od nejmenšího po největší. Jedná se především o fyzické charakteristiky systému.</p>
                            <ul class="mb-4">
                                <li><strong>ATX</strong> je standardní velikost pro běžné PC sestavy, ideální pro začátečníky díky dostatku prostoru pro stavbu a případný dodatečný hardware.</li>
                                <li><strong>m-ATX</strong> představuje zhruba dvoutřetinový formát ATX. Nabízí většinu funkcí ATX s úsporou místa.</li>
                                <li><strong>mini-ITX</strong> je určen pro nejkompaktnější sestavy. Optimalizuje prostor, ale přináší výrazná omezení při stavbě, proto je vhodnější pro zkušené uživatele, kteří chtějí maximalizovat efektivitu.</li>
                            </ul>
                            <h3 class="h4 mb-3">Pomocníci při výběru komponent</h3>
                            <p class="mb-4">Pro člověka, který se s těmito pojmy setkává poprvé, může být výběr komponent složitý a matoucí. Na internetu však existují stovky tutoriálů, které tyto aspekty podrobně vysvětlují a pomáhají s výběrem. Kromě toho portály jako <a href="https://pcpartpicker.com" target="_blank" class="text-decoration-none">PCPartPicker</a> nebo <a href="https://www.alza.cz/pc-konfigurator" target="_blank" class="text-decoration-none">Alza PC Konfigurátor</a> zajišťují, že zvolené komponenty budou vzájemně kompatibilní.</p>
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