<form action="/upg/agencia/config" method="post">
    <div class="row">
        <div class="col-12 text-end my-2">
            <button type="button" class="btn btn-sm btn-dark w-px-150" data-bs-toggle="modal" data-bs-target="#ModalConfigCopy"><i class="bi bi-copy me-1"></i> Copiar</button>
            <button type="submit" class="btn btn-sm btn-success w-px-150"><i class="bi bi-floppy-fill me-1"></i> Salvar</button>
            <input type="hidden" name="agencia" value="<?= $URI[1]; ?>">
        </div>
    </div>

    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true"><i class="bi bi-briefcase me-1"></i> Profissões</button>
            <button class="nav-link" id="nav-transferencias-tab" data-bs-toggle="tab" data-bs-target="#nav-transferencias" type="button" role="tab" aria-controls="nav-transferencias" aria-selected="false"><i class="bi bi-arrow-down-up me-1"></i> Transferências</button>
            <button class="nav-link" id="nav-sortereves-tab" data-bs-toggle="tab" data-bs-target="#nav-sortereves" type="button" role="tab" aria-controls="nav-sortereves" aria-selected="false"><i class="bi bi-brilliance me-1"></i> Sorte ou Azar</button>
            <button class="nav-link" id="nav-debitos-tab" data-bs-toggle="tab" data-bs-target="#nav-debitos" type="button" role="tab" aria-controls="nav-debitos" aria-selected="false"><i class="bi bi-cash-coin me-1"></i> Débitos Automáticos</button>
            <button class="nav-link" id="nav-shop-tab" data-bs-toggle="tab" data-bs-target="#nav-shop" type="button" role="tab" aria-controls="nav-shop" aria-selected="false"><i class="bi bi-shop me-1"></i> shop</button>
            <button class="nav-link" id="nav-tempo-tab" data-bs-toggle="tab" data-bs-target="#nav-tempo" type="button" role="tab" aria-controls="nav-tempo" aria-selected="false"><i class="bi bi-clock me-1"></i> Tempo (Ciclo)</button>
            <button class="nav-link" id="nav-encerrar-tab" data-bs-toggle="tab" data-bs-target="#nav-encerrar" type="button" role="tab" aria-controls="nav-encerrar" aria-selected="false"><i class="bi bi-door-closed-fill me-1"></i> Fechar Agência</button>
        </div>
    </nav>

    <div class="tab-content" id="nav-tabContent">
        <!-- Profissões -->
        <div class="tab-pane fade p-3 show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
            <!-- Informativo -->
            <div class="row justify-content-center mb-2">
                <div class="col-12 col-sm-6 col-md-7 mb-2">
                    <div class="infomain bd-1 bd-primary shadow-md d-flex justify-content-between">
                        <div class="mb-1 mb-sm-0 align-self-center">Em relação aos sorteios de profissões, os salários serão:</div>
                        <div>
                            <span class="badge-alt text-bg-warning ms-1">Mínimo</span> <input type="number" step="0.01" class="form-control form-control-sm me-1 d-inline-block w-px-100 text-center" placeholder="R$ Mínimo" value="<?= @$Configuracoes['profissaoMin'] ?: $ProfissoesSalario['min']; ?>" name="profissaoMin" id="profissaoMin">
                            <span class="badge-alt text-bg-danger ms-1">Máximo</span> <input type="number" step="0.01" class="form-control form-control-sm me-1 d-inline-block w-px-100 text-center" placeholder="R$ Máximo" value="<?= @$Configuracoes['profissaoMax'] ?: $ProfissoesSalario['max']; ?>" name="profissaoMax" id="profissaoMax">
                        </div>
                    </div>
                </div>
                <!-- Botoes do Header -->
                <div class="col-12 col-sm-6 col-md-5 text-center text-sm-end mb-2 align-self-center">
                    <button type="button" onclick="$('#TabelaProfissoes').toggle(500);" class="btn btn-sm btn-warning px-3"><i class="bi bi-briefcase me-1"></i> Lista de Profissões <span class="badge text-bg-dark ms-2"><?= count($Profissoes); ?></span></button>
                    <button type="button" class="btn btn-sm btn-primary" onclick="$('#ProfissoesTodos').modal('show');"><i class="bi bi-wrench-adjustable me-1"></i> Definir para Todos</button>
                </div>
                <!-- Tabela de Profissoes (oculta) -->
                <div class="col-12 col-sm-8 col-md-6">
                    <table class="table table-striped table-sm ft-10 collapse shadow-md" id="TabelaProfissoes">
                        <thead>
                            <tr class="main">
                                <td class="text-start">Nome</td>
                                <td>Salario</td>
                                <td>Min | Max</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($Profissoes as $KeyP => $ViewP) { ?>
                                <tr>
                                    <td><?= $ViewP['pf_nome']; ?></td>
                                    <td class="text-center d-flex justify-content-between"><span>R$</span> <span><?= number_format($ViewP['pf_salario'] * $SalarioMinimo, 2, ',', '.'); ?></span></td>
                                    <td class="text-center">
                                        <span class="btn btn-outline-secondary btn-sm py-0 ft-8" onclick="$('#profissaoMin').val('<?= number_format($ViewP['pf_salario'] * $SalarioMinimo, 2, '.', ''); ?>');">Min</span>
                                        <span class="btn btn-outline-secondary btn-sm py-0 ft-8" onclick="$('#profissaoMax').val('<?= number_format($ViewP['pf_salario'] * $SalarioMinimo, 2, '.', ''); ?>');">Max</span>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Relação cliente/profissão -->
            <div class="row">
                <?php foreach ($Contas as $KeyC => $ViewC) { ?>
                    <div class="col-12 col-sm-6 col-md-3 mb-2">
                        <div class="card shadow-md card-hover">
                            <div class="card-body p-2">
                                <div class="d-flex">
                                    <div class="text-center">
                                        <img loading="lazy" src="<?= $ViewC['user_foto']; ?>" alt="" class="rounded mb-2" width="75px" height="75px">
                                    </div>
                                    <p class="fw-bold text-center align-self-center ft-10 px-2"><?= mb_strtoupper($ViewC['user_nome'], 'UTF-8'); ?></p>
                                </div>

                                <div class="input-group">
                                    <button type="button" class="btn btn-sm btn-danger py-0 iPersonalRandom"><i class="bi bi-arrow-repeat"></i></button>
                                    <select class="form-select form-select-sm iProfissao" name="profissoes[<?= $ViewC['ct_id']; ?>]">
                                        <option value=""></option>
                                        <?php foreach ($Profissoes as $KeyP => $ViewP) { ?>
                                            <option value="<?= $KeyP; ?>" data-salario="<?= $ViewP['pf_salario']; ?>" <?= iSelect($KeyP, $ViewC['ct_profissao']); ?>><?= $ViewP['pf_nome']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="mt-1 text-end iSalario justify-content-between d-flex">
                                    <i class="bi bi-exclamation-triangle-fill text-danger align-self-center"></i>
                                    <span class="badge text-bg-success align-self-center">R$ <?= str_replace([',', '.'], ['.', ','], $ViewC['ct_salario']); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
        <!-- Transferências -->
        <div class="tab-pane fade p-3" id="nav-transferencias" role="tabpanel" aria-labelledby="nav-transferencias-tab" tabindex="0">
            <div class="infomain bd-1 bd-info mb-2 shadow-md">
                Um dos problemas que pode ocorrer é o estudante criar uma agência fictícia e gerar fundos para, em seguida, transferi-los para uma conta própria dentro dessa mesma agência. Para evitar esse tipo de situação, as transferências entre agências serão inicialmente bloqueadas. A seguir, você poderá configurar como as transferências deverão funcionar.
            </div>

            <div class="row justify-content-center">
                <div class="col-12 col-sm-10 col-md-8 col-lg-6">
                    <div class="infomain bd-1 bd-success mb-2 shadow-sm fw-bold">Modo de transferência</div>
                    <ul class="list-group">
                        <li class="list-group-item">
                            <input class="form-check-input me-1" type="radio" name="transferenciasTipo" value="0" id="transferenicaTipo1" <?= iCheck(@$Configuracoes['transferenciasTipo'], 0); ?>>
                            <label class="form-check-label" for="transferenicaTipo1">Não poderá ocorrer transferências entre agências</label>

                        </li>
                        <li class="list-group-item">
                            <input class="form-check-input me-1" type="radio" name="transferenciasTipo" value="1" id="transferenicaTipo2" <?= iCheck(@$Configuracoes['transferenciasTipo'], 1); ?>>
                            <label class="form-check-label" for="transferenicaTipo2">Poderá ocorrer transferências entre agências</label>

                        </li>
                        <li class="list-group-item">
                            <input class="form-check-input me-1" type="radio" name="transferenciasTipo" value="2" id="transferenicaTipo3" <?= iCheck(@$Configuracoes['transferenciasTipo'], 2); ?>>
                            <label class="form-check-label" for="transferenicaTipo3">Só poderá ocorrer transferências entre agências selecionados</label>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="row justify-content-center mt-2">
                <div class="col-12 col-sm-10 col-md-8 col-lg-6">
                    <div class="infomain bd-1 bd-success mb-2 shadow-sm fw-bold">Agências Selecionadas</div>
                    <input type="text" name="transferenciasAgencias" id="transferenciasAgencias" class="form-control" value="<?= @implode(',', $Configuracoes['transferenciasAgencias']); ?>">
                    <small class="ft-8">Separe as agências com vírgula</small>
                </div>
            </div>

        </div>
        <!-- Sorte ou Azar -->
        <div class="tab-pane fade p-3" id="nav-sortereves" role="tabpanel" aria-labelledby="nav-sortereves-tab" tabindex="0">
            <div class="infomain bd-1 bd-primary mb-2 shadow-md">
                Sorte ou Azar é um sistema de cartas aleatórias que buscam simular situações do cotidiano onde o estudante poderá ter sorte (ganho) ou azar (perda), baseado em situações do cotidiano. Por exemplo, o gás acabou (revés), você achou um dinheiro no chão (sorte).
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="bd-1 bd-success infomain text-center shadow-md py-2">
                        <div class="row">
                            <div class="col-12 col-sm-3">
                                <label for="sorte">Quantidade de Sorteio Semanais</label>
                                <input type="number" step="1" min="0" max="" name="sorte" id="sorte" class="w-75 mx-auto form-control form-control-sm placeholder-transparente text-center" placeholder="0 a 10" required value="<?= @$Configuracoes['sorte']; ?>">
                            </div>
                            <div class="col-12 col-sm-9 text-start align-self-center">
                                <strong>Quantidade de Sorteio Semanais.</strong>
                                <br />
                                Se o valor de sorteio for 0, então não haverá sorteio. Se for 5, será sorteado 5 cartas por dia para cada cliente.
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-12">
                    <?php require_once Views . '/gerencia/configuracoes_sorte_reves_cards.php'; ?>
                </div>
            </div>

        </div>
        <!-- Debitos -->
        <div class="tab-pane fade p-3" id="nav-debitos" role="tabpanel" aria-labelledby="nav-debitos-tab" tabindex="0">

            <div class="row mb-2">
                <div class="col-12">
                    <div class="infomain bd-1 bd-info shadow-sm ">
                        Os itens podem ter valores fixos de débitos ou poderá corresponder a um percentual do salário do cliente. Em caso de preenchimento dos dois valores sempre prevalecerá o percentual. A variação corresponderá a uma randomização pelo sistema que poderá cobrar +/- o percentual, ou seja, em um valor de 100 reais com variação de 5% a conta poderá corresponder de 95 à 105 reais.
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12 mt-1 mb-2">
                    <div class="infomain bd-1 bd-warning shadow-sm <?= (array_key_exists('ketmuacfc', $Configuracoes['debitos'])) ? '' : 'd-none'; ?>">
                        Não encontramos nenhuma informação salva, por isso, carregamos as informações padrões do sistema. Lembre-se de <strong>SALVAR</strong> as informações após edita-las.
                    </div>

                </div>
                <div class="col-12 col-sm-10 col-md-8">
                    <table class="table table-sm table-striped" id="nav-debitos-itens">
                        <thead>
                            <tr class="main">
                                <td class="">Nome</td>
                                <td class="">Valor R$</td>
                                <td class="">Porcentagem %</td>
                                <td class="">Variação %</i></td>
                                <td>Juros %</td>
                                <td class="">Excluir</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($Configuracoes['debitos'] as $KeyD => $ViewD) { ?>
                                <tr>
                                    <td class="text-center align-middle"><input type="text" name="debitos[<?= $KeyD; ?>][nome]" class="form-control form-control-sm text-center" value="<?= $ViewD['nome']; ?>"></td>
                                    <td class="text-center align-middle"><input type="number" step="0.01" name="debitos[<?= $KeyD; ?>][valor]" class="form-control form-control-sm text-center placeholder-transparente" placeholder="0.00" min="0" value="<?= $ViewD['valor']; ?>"></td>
                                    <td class="text-center align-middle"><input type="number" step="0.1" name="debitos[<?= $KeyD; ?>][porcentagem]" class="form-control form-control-sm text-center placeholder-transparente" placeholder="10" min="0" max="100" value="<?= $ViewD['porcentagem']; ?>"></td>
                                    <td class="text-center align-middle"><input type="number" step="1" name="debitos[<?= $KeyD; ?>][variacao]" class="form-control form-control-sm text-center placeholder-transparente" placeholder="5" min="0" max="100" value="<?= $ViewD['variacao']; ?>"></td>
                                    <td class="text-center align-middle"><input type="number" step="1" name="debitos[<?= $KeyD; ?>][juros]" class="form-control form-control-sm text-center placeholder-transparente" placeholder="5" min="0" max="100" value="<?= (isset($ViewD['juros']) ? $ViewD['juros'] : 0); ?>"></td>
                                    <td class="text-center align-middle"><button type="button" class="btn btn-sm btn-danger iTrash"><i class="bi bi-trash3-fill"></i></button></td>
                                </tr>
                            <?php } ?>
                        </tbody>

                        <tfoot class="d-none">
                            <tr>
                                <td class="text-center align-middle"><input type="text" name="debitos[{id}][nome]" class="form-control form-control-sm text-center"></td>
                                <td class="text-center align-middle"><input type="number" step="0.01" name="debitos[{id}][valor]" class="form-control form-control-sm text-center" placeholder="0.00" min="0"></td>
                                <td class="text-center align-middle"><input type="number" step="0.1" name="debitos[{id}][porcentagem]" class="form-control form-control-sm text-center" placeholder="10" min="0" max="100"></td>
                                <td class="text-center align-middle"><input type="number" step="1" name="debitos[{id}][variacao]" class="form-control form-control-sm text-center" placeholder="5" min="0" max="100"></td>
                                <td class="text-center align-middle"><input type="number" step="1" name="debitos[{id}][juros]" class="form-control form-control-sm text-center" placeholder="5" min="0" max="100"></td>
                                <td class="text-center align-middle"><button type="button" class="btn btn-sm btn-danger iTrash"><i class="bi bi-trash3-fill"></i></button></td>
                            </tr>
                        </tfoot>
                    </table>

                    <div class="text-end">
                        <button type="button" class="btn btn-sm btn-warning w-px-150" id="nav-debitos-itens-insert"><i class="bi bi-plus-square me-1"></i> Novo Item</button>
                    </div>
                </div>
            </div>

        </div>
        <!-- shop -->
        <div class="tab-pane fade p-3" id="nav-shop" role="tabpanel" aria-labelledby="nav-shop-tab" tabindex="0">
            <div class="infomain bd-1 bd-primary shadow-md mb-3 d-flex justify-content-between">
                <div class="align-self-center">O Shopping é uma área onde você pode disponibilizar itens para os estudantes comprarem. Após editar seu shopping, não esqueca de salvar as configurações!</div>
                <button type="button" class="btn btn-warning btn-sm w-px-150" data-bs-toggle="modal" data-bs-target="#shopNewItem"><i class="bi bi-cart-plus me-1"></i> Novo Item</button>
            </div>
            <div class="row" id="shopItems">
                <?php foreach($Shop -> getShop() as $KeyS => $ViewS){ ?>
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-3 shopItemBox">
                    <div class="card shadow md-2 h-100">
                        <div class="card-body text-center d-flex flex-column">
                            <h4><?= $ViewS['title']; ?></h4>
                            <div class="d-flex align-items-center justify-content-center flex-grow-1" style="min-height: 150px;">
                                <img src="<?= $ViewS['thumbnail']; ?>" loading="lazy" class="imageShop" style=" max-width: 100%; object-fit: contain;">
                            </div>
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <div class="text-start">
                                    <span class="ft-10">U$</span>
                                    <span class="fw-bold ft-16"><?= number_format($ViewS['price'], 2, ',', '.'); ?></span>
                                </div>
                            </div>
                            <div class="ft-9 text-start mb-2">
                                R$ <?= number_format($ViewS['price_real'], 2, ',', '.'); ?>
                            </div>
                            <div class="d-flex justify-content-between">
                                <div class="btn-group">
                                    <span class="py-0 ft-10 btn btn-sm btn-warning"><?= $ViewS['discountPercentage']; ?> %</span>
                                    <span class="py-0 ft-10 btn btn-sm btn-light border">à vista</span>
                                </div>
                                <div class="btn-group">
                                    <span class="py-0 ft-10 btn btn-sm btn-primary"><?= $ViewS['stock']; ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between">
                            <button type="button" class="btn btn-sm btn-outline-danger align-self-center ishopItemTrash"><i class="bi bi-trash"></i> Excluir</button>
                            <button type="button" class="btn btn-sm btn-outline-primary align-self-center ishopItemEdit"><i class="bi bi-pencil-square"></i> Editar</button>
                        </div>
                    </div>
                    <!-- Item Json do shop -->
                    <input type="hidden" name="shop[<?= $ViewS['id']; ?>]" class="shopItemBoxJson" value="<?= htmlspecialchars(json_encode($ViewS), ENT_QUOTES, 'UTF-8'); ?>">
                </div>
                <?php } ?>
            </div>

            <div class="row d-none" id="shopItemModel">
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-3 shopItemBox">
                    <div class="card shadow md-2 h-100">
                        <div class="card-body text-center d-flex flex-column">
                            <h4>{title}</h4>
                            <div class="d-flex align-items-center justify-content-center flex-grow-1" style="min-height: 150px;">
                                <img src="{thumbnail}" loading="lazy" class="imageShop" style=" max-width: 100%; object-fit: contain;">
                            </div>
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <div class="text-start">
                                    <span class="ft-10">U$</span>
                                    <span class="fw-bold ft-16">{price}</span>
                                </div>
                            </div>
                            <div class="ft-9 text-start mb-2">
                                R$ {priceReal}
                            </div>
                            <div class="d-flex justify-content-between">
                                <div class="btn-group">
                                    <span class="py-0 ft-10 btn btn-sm btn-warning">{discountPercentage} %</span>
                                    <span class="py-0 ft-10 btn btn-sm btn-light border">à vista</span>
                                </div>
                                <div class="btn-group">
                                    <span class="py-0 ft-10 btn btn-sm btn-primary">{stock}</span>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between">
                            <button type="button" class="btn btn-sm btn-outline-danger align-self-center ishopItemTrash"><i class="bi bi-trash"></i> Excluir</button>
                            <button type="button" class="btn btn-sm btn-outline-primary align-self-center ishopItemEdit"><i class="bi bi-pencil-square"></i> Editar</button>
                        </div>
                    </div>
                    <!-- Item Json do shop -->
                    <input type="hidden" name="shop[{id}]" class="shopItemBoxJson" value="">
                </div>
            </div>
        </div>
        <!-- Ciclos -->
        <div class="tab-pane fade p-3" id="nav-tempo" role="tabpanel" aria-labelledby="nav-tempo-tab" tabindex="0">
            <!-- Tempo dos ciclos -->
            <div class="infomain bd-1 bd-info mb-2 shadow-md">
                <div class="row">
                    <div class="col-12 col-md-4 col-lg-3 mb-2 mb-md-0 align-self-center">
                        <div class="form-group text-center">
                            <label for="InsertCiclo" class="main">Os ciclos ocorrerão à cada quantos dias?</label>
                            <input type="number" step="1" min="1" max="30" name="ciclo" id="InsertCiclo" class="form-control form-control-sm w-px-150 mx-auto text-center" value="<?= @(isset($Configuracoes['ciclo']) ? $Configuracoes['ciclo'] : 7); ?>" required>
                        </div>
                    </div>
                    <div class="col-12 col-md-8 col-lg-9">
                        Os ciclos são períodos onde diversas ações automáticas do sistema ocorrem, como por exemplo: cobrança de débitos automáticos, aplicação de shop, sorteios de cartas de sorte ou azar, entre outras ações. No mundo real, os ciclos são mensais, mas, para dar mais dinâmica ao sistema, você pode definir ciclos menores, como por exemplo, a cada 7 dias.
                    </div>
                </div>
            </div>
            <!-- Como os ciclos serão processados -->
            <div class="infomain bd-1 bd-info mb-2 shadow-md">
                <div class="row">
                    <div class="col-12 col-md-4 col-lg-3 mb-2 mb-md-0 text-center align-self-center">
                        <div class="form-group text-center mb-2">
                            <label for="InsertCiclo" class="main">Os ciclos ocorrerão de qual forma?</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="cicloForma" id="cicloForma1" required <?= @iCheck($Configuracoes['cicloForma'], 1) ?> value="1">
                            <label class="form-check-label" for="cicloForma1">
                                Ciclos automáticos
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="cicloForma" id="cicloForma2" required <?= @iCheck($Configuracoes['cicloForma'], 0) ?> value="0">
                            <label class="form-check-label" for="cicloForma2">
                                Ciclos manuais
                            </label>
                        </div>
                    </div>
                    <div class="col-12 col-md-8 col-lg-9 align-self-center">
                        O sistema pode executar os ciclos de forma automática, sendo processados a cada número de dias (informado acima). Caso seja configurado para manual, o sistema não executará automaticamente os ciclos.
                    </div>
                </div>
            </div>
        </div>
        <!-- Encerrar Agência -->
        <div class="tab-pane fade p-3" id="nav-encerrar" role="tabpanel" aria-labelledby="nav-encerrar-tab" tabindex="0">
            <div class="d-flex justify-content-between">
                <div class="infomain bd-1 bd-danger shadow-md mb-2 w-100 align-self-start">
                    O encerramento da agência não poderá ser desfeito. Esse processo irá apagar completamente todos os dados dos clientes e os mesmos <strong>NÃO PODERÃO</strong> ser recuperados.
                </div>
                <button class="btn btn-danger btn-sm align-self-start w-px-200 mx-2" type="button" data-eb-rmv="upg/agencia/encerrar/<?= $URI[1]; ?>"><i class="bi bi-ban me-1"></i> Encerrar Agência</button>
            </div>
        </div>
        
    </div>
</form>


<div class="modal" tabindex="-1" id="ProfissoesTodos">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-bg-primary">
                <span class="modal-title ft-11"><i class="bi bi-people me-1"></i> Definir para Todos</span>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="ft-10">Selecione a profissão que será definida para todos os clientes. Lembre-se de após de definir, salvar as definições.</p>
                <select id="ProfissoesDefinirSelect" class="form-select form-select-sm">
                    <?php foreach ($Profissoes as $KeyP => $ViewP) { ?>
                        <option value="<?= $KeyP; ?>" data-salario="<?= $ViewP['pf_salario']; ?>"><?= $ViewP['pf_nome']; ?></option>
                    <?php } ?>
                </select>
                <div class="mt-3 d-flex justify-content-between">
                    <span class="btn btn-sm btn-success">R$ <span class="valor" id="ProfissoesDefinirValor">0,00</span></span>
                    <button type="button" class="btn btn-sm btn-primary w-px-150" id="ProfissoesDefinirInsert"><i class="bi bi-wrench-adjustable me-1"></i> Definir</button>
                </div>
            </div>
            <div class="modal-body border-top">
                <p class="ft-10">Caso deseje, será possível sortear as profissões aleatoriamente. Será selecionado profissões que se encontram dentro dos valores máximo e mínimo que você definiu na página principal.</p>
                <div class="text-end mt-2">
                    <button type="button" class="btn btn-sm btn-primary w-px-150" id="ProfissoesSortear"><i class="bi bi-shuffle me-1"></i> Sortear</button>
                </div>
            </div>
        </div>
    </div>
</div>
<?php 
    require_once Modal . '/shoppingItem.php';
    require_once Modal . '/configCopy.php';    
?>

<script>
    $(function() {

        const SalarioMinimo = parseFloat('<?= $SalarioMinimo; ?>');
        var SalarioMin = (parseFloat($('#profissaoMin').val()) / SalarioMinimo).toFixed(3);
        var SalarioMax = (parseFloat($('#profissaoMax').val()) / SalarioMinimo).toFixed(3);

        function SalarioAlert() {
            $('div.iSalario').each(function() {
                let valor = $(this).find('span').text().replace('R$ ', '').replace('.', '').replace(',', '.');
                let min = SalarioMinimo * SalarioMin;
                let max = SalarioMinimo * SalarioMax;
                $(this).find('i').removeClass('bi-exclamation-triangle-fill text-danger text-success bi-check-circle-fill');
                if (valor < min || valor > max) {
                    $(this).find('i').addClass('bi-exclamation-triangle-fill text-danger');
                } else {
                    $(this).find('i').addClass('bi-check-circle-fill text-success');
                }
            });
        }
        SalarioAlert();

        $(document).on('click', 'button.iTrash', function() {
            $(this).closest('tr').remove();
        });
        $('#nav-debitos-itens-insert').click(function() {
            const id = UniqID().replace('_', '');
            $('#nav-debitos-itens tbody').append($('#nav-debitos-itens tfoot').html().replaceAll('{id}', id));
        })
        $('select.iProfissao').change(function() {
            const salario = $(this).find('option[value="' + $(this).val() + '"]').data('salario');
            $(this).closest('div.card-body').find('div.iSalario span').text('R$ ' + (SalarioMinimo * salario).toFixed(2).replace('.', ','));
        });
        $('select#ProfissoesDefinirSelect').change(function() {
            const salario = $(this).find('option[value="' + $(this).val() + '"]').data('salario');
            $('#ProfissoesDefinirValor').text((SalarioMinimo * salario).toFixed(2).replace('.', ','));
        });
        $('#ProfissoesDefinirInsert').click(function() {
            $('select.iProfissao').val($('#ProfissoesDefinirSelect').val()).trigger('change');
            SalarioAlert();
        });
        $('#transferenciasAgencias').tagInput({
            labelClass: "badge bg-success"
        });
        $('#profissaoMin,#profissaoMax').change(function() {
            SalarioMin = (parseFloat($('#profissaoMin').val()) / SalarioMinimo).toFixed(3);
            SalarioMax = (parseFloat($('#profissaoMax').val()) / SalarioMinimo).toFixed(3);
        });
        $('#ProfissoesSortear').click(function() {
            if (confirm("Deseja realmente sortear as profissões?")) {

                $('select.iProfissao').each(function() {
                    let $select = $(this);
                    // 1. Filtra as opções que estão dentro do intervalo [Min, Max]
                    let opcoesValidas = $(this).find('option').filter(function() {
                        let salario = parseFloat($(this).data('salario'));
                        return salario >= SalarioMin && salario <= SalarioMax;
                    });
                    // 2. Se encontrou opções no intervalo, sorteia uma
                    if (opcoesValidas.length > 0) {
                        let indiceAleatorio = Math.floor(Math.random() * opcoesValidas.length);
                        let valorSorteado = opcoesValidas.eq(indiceAleatorio).val();
                        // 3. Define o valor no select
                        $(this).val(valorSorteado).trigger('change');
                        $('#ProfissoesTodos').modal('hide');
                    } else {
                        console.warn("Nenhuma profissão encontrada no intervalo para este select.");
                    }
                });

                SalarioAlert();
            }
        });

        $('button.iPersonalRandom').click(function() {
            if (confirm("Deseja sortear novamente a profissão desta pessoa?")) {
                let select = $(this).next();
                // 1. Filtra as opções que estão dentro do intervalo [Min, Max]
                let opcoesValidas = select.find('option').filter(function() {
                    let salario = parseFloat($(this).data('salario'));
                    return salario >= SalarioMin && salario <= SalarioMax;
                });
                // 2. Se encontrou opções no intervalo, sorteia uma
                if (opcoesValidas.length > 0) {
                    let indiceAleatorio = Math.floor(Math.random() * opcoesValidas.length);
                    let valorSorteado = opcoesValidas.eq(indiceAleatorio).val();
                    // 3. Define o valor no select
                    select.val(valorSorteado).trigger('change');
                } else {
                    console.warn("Nenhuma profissão encontrada no intervalo para este select.");
                }
            }

            SalarioAlert();
        });
    });
</script>