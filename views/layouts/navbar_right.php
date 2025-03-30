<!-- Barre latérale droite -->
<div class="col-md-3 p-3">
    <div class="mb-4">
        <div class="input-group">
            <input type="text" class="form-control search-input" placeholder="Rechercher...">
        </div>
    </div>
    <div class="bg-dark rounded p-3 mb-4">
        <h6 class="mb-3">Qui suivre?</h6>
        <?php for ($i = 0; $i < 3; $i++): ?>
            <div class="d-flex align-items-center mb-3">
                <div class="user-img me-2 bg-secondary"></div>
                <div>
                    <div class="fw-bold">Username</div>
                    <div class="text-muted">@Username123</div>
                </div>
                <button class="btn btn-light rounded-5 px-2 follow-btn" style="min-width: 80px; font-size: 0.8rem;">Suivre</button>
            </div>
        <?php endfor; ?>
        <div class="text-danger">
            <small>Plus...</small>
        </div>
    </div>
</div>