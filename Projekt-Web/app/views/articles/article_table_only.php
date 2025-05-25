<?php
// Spuštění session, pokud ještě není spuštěna
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!-- Kontejner s tabulkou článků -->
<div class="container mt-5">
    <div class="card shadow-sm">
        <!-- Hlavička tabulky -->
        <div class="card-header bg-primary text-white py-3">
            <h2 class="h3 mb-0"><i class="bi bi-list-ul me-2"></i>Seznam článků</h2>
        </div>
        <!-- Tělo tabulky -->
        <div class="card-body p-4">
            <?php if (!empty($articles)): ?>
                <!-- Responzivní obal tabulky -->
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <!-- Hlavička tabulky s názvy sloupců -->
                        <thead class="table-light">
                            <tr>
                                <th><i class="bi bi-type-h1 me-1"></i>Název</th>
                                <th><i class="bi bi-text-paragraph me-1"></i>Obsah</th>
                                <th><i class="bi bi-person me-1"></i>Autor</th>
                                <th><i class="bi bi-calendar me-1"></i>Vytvořeno</th>
                            </tr>
                        </thead>
                        <!-- Tělo tabulky s daty článků -->
                        <tbody>
                            <?php foreach ($articles as $article): ?>
                                <tr>
                                    <!-- Název článku -->
                                    <td class="fw-medium"><?= htmlspecialchars($article['title']) ?></td>
                                    <!-- Omezený obsah článku (prvních 100 znaků) -->
                                    <td class="text-muted"><?= htmlspecialchars(substr($article['content'], 0, 100)) . (strlen($article['content']) > 100 ? '...' : '') ?></td>
                                    <!-- Odznak autora -->
                                    <td><span class="badge bg-secondary"><?= htmlspecialchars($article['username']) ?></span></td>
                                    <!-- Datum vytvoření -->
                                    <td><small class="text-muted"><?= htmlspecialchars($article['created_at']) ?></small></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php else: ?>
                <!-- Zpráva zobrazená, když nejsou nalezeny žádné články -->
                <div class="alert alert-info d-flex align-items-center" role="alert">
                    <i class="bi bi-info-circle-fill me-2"></i>
                    <div>Žádný článek nebyl nalezen.</div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>