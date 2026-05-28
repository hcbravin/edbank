<div class="row justify-content-center mt-1">
    <div class="col-12 col-sm-10 col-md-8">
        <div class="d-flex justify-content-between">
            <span class="text-muted ft-10">
                O acesso root garante possibilidade de acessar a conta selecionada
            </span>
        </div>
    </div>
    <div class="col-12 col-sm-10 col-md-8">
        <table class="table table-sm table-striped" id="AdminUserList">
            <thead class="ft-10">
                <tr>
                    <th class="text-bg-dark">Nome</th>
                    <th class="text-bg-dark text-end">Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($Admin->getAllUser() as $KeyU => $ViewU) { ?>
                    <tr>
                        <td>
                            <strong><?= $ViewU['user_nome']; ?></strong>
                            <br>
                            <span class="text-muted ft-9"><?= $ViewU['user_email']; ?></span>
                        </td>
                        <td class="text-end align-middle">
                            <a href="/admin/usuarios/root/<?= $ViewU['user_id']; ?>" class="btn btn-dark btn-sm"><i class="bi bi-person-workspace me-1"></i> Root</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>