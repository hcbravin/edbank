<div class="row justify-content-center">
    <div class="col-12 col-sm-10 col-md-8">

        <div class="row">
            <!-- Usuarios -->
            <div class="col-12 col-sm-6 col-md-4 mb-2">
                <div class="card shadow-md mb-1">
                    <div class="card-header">
                        <i class="bi bi-people-fill me-1"></i> Usuários
                    </div>
                    <div class="card-body text-center">
                        <h2><?= $Estatistica['users']; ?></h2>
                    </div>
                </div>
                <div class="text-end">
                    <a href="/admin/usuarios" class="btn btn-sm py-0 btn-primary">Abrir</a>
                </div>
            </div>
            <!-- Agencias -->
            <div class="col-12 col-sm-6 col-md-4 mb-2">
                <div class="card shadow-md mb-1">
                    <div class="card-header">
                        <i class="bi bi-bank me-1"></i> Agências
                    </div>
                    <div class="card-body text-center">
                        <h2><?= $Estatistica['agencias']; ?></h2>
                    </div>
                </div>
                <div class="text-end">
                    <a href="/admin/agencias" class="btn btn-sm py-0 btn-primary">Abrir</a>
                </div>
            </div>
            <!-- Contas -->
            <div class="col-12 col-sm-6 col-md-4 mb-2">
                <div class="card shadow-md mb-1">
                    <div class="card-header">
                        <i class="bi bi-credit-card me-1"></i> Contas
                    </div>
                    <div class="card-body text-center">
                        <h2><?= $Estatistica['contas']; ?></h2>
                    </div>
                </div>
                <div class="text-end">
                    <!-- <a href="/admin/contas" class="btn btn-sm py-0 btn-primary">Abrir</a> -->
                </div>
            </div>

        </div>

    </div>
</div>