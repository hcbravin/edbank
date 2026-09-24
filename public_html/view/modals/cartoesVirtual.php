<div class="modal" tabindex="-99" id="ModalCardVirtual" data-bs-keyboard="false" data-bs-backdrop="static">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">

            <div class="modal-header text-bg-warning">
                <h5 class="modal-title">
                    <i class="bi bi-credit-card-2-front-fill me-1"></i> Cartão de Débito Virtual
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body d-flex flex-column overflow-hidden align-items-center" id="VirtualCardMain">

                <!-- Cartão Virtual -->
                <div class="cartao cartao-frente position-relative rounded-4 text-white bg-dark overflow-hidden p-3 shadow" style="width: 340px; height: 214px;">

                    <!-- Faixa de fundo superior (simulando gradiente) -->
                    <div class="position-absolute top-0 start-0 w-100 h-50"></div>

                    <!-- Conteúdo do Cartão (camada acima do fundo) -->
                    <div class="position-relative z-1 h-100 d-flex flex-column justify-content-between">

                        <!-- Topo: EDBank + Bandeira -->
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="fw-bold fs-5">
                                EDBank <small class="fw-normal fs-6 text-opacity-75 text-white">Débito</small>
                            </div>
                            <div class="fw-semibold">VISA</div>
                        </div>

                        <!-- Meio: Chip + Contactless -->
                        <div class="d-flex align-items-center gap-2">
                            <div class="rounded-2 p-1" style="width: 42px; height: 30px; background-color: #d4af37;">
                                <div class="border border-dark border-opacity-25 rounded-1 h-100 w-100"></div>
                            </div>
                            <div class="contactless">
                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAACWUlEQVR4AcSVLVdVQRSGBxM0+QfYoEHTpk0bNmmQxGjzX2gTkzRsEm3atGGDptGmDdv1efadPZxzzzncpWu5OGu/M3v27P2+88XlVvnP380LzGazTXAGFu2cwPayA5jcAcUSzyA4B2NEm8RTeGye6VJGBSB/zazEdOU3zd7KwkfsMXCOrihkjX4PAwHI35JxCLQdeNfAOwddEDsFa8QeAe2w1uo39ARIcKv7dXYdgq/VH3Tkrhok5wO9QnRln7gc+oGeAJEzoN2j8JfOGCC5JC7oSiHXo3pQ5l9yxKgJUHQ3IjQUfKHrGfMnIEkvnGT81F5Q84leoUK87aIJMPkSaLkSEzdI3jUInoA4FvrnQHth08Fe9b3HcLsCsYO6EsldxTeyMjlXp0jucIP5ZtSe1oG14XYFIpANyXnBt2ssx9vMhViNX9tNClxb9ReTkwKcfRwZXD+AltvOnRhbiq5AnCvEcakcg+M7MDwDmmcfT5Kc+wZAvCb6MOIPwynFF1X8ugIHBsAJCEPkO8iLO47gvMmLfzUftvZ99fKVXf0WQZSrWWUlucKaX1z5ATkrZf7FxTN+Mx8WX51Hmrtsx9jdgbk7NuAjIkGCPzCI1wnmz4PkEn8mpiWH/tUOHFGo8pE++InIYCfEw8iNp0qOK8+/8GPickSOzeIOPAovNc/WnVxC4l+x+Q3EdoH/L3LlR5DnPba8gYAzJHpJW/rA7fs7JF8D8bxQ3LJFjQvT72FUwAwKLoCXqpBP1nAXPgqJTdPvzjV/UiAzqFbIn2/cnkk+SZz1SwUy8V/7PwAAAP//fOsTGgAAAAZJREFUAwA5n+YxlPR32AAAAABJRU5ErkJggg==" alt="Contactless" width="20" class="img-fluid filter-white">
                            </div>
                        </div>

                        <!-- Número do Cartão -->
                        <div class="numero-cartao fs-5 fw-bold tracking-wide font-monospace">
                            <?= chunk_split($CartaoVirtual['card_numero'], 4, ' '); ?>
                        </div>

                        <!-- Rodapé: Titular + Validade -->
                        <div class="d-flex justify-content-between align-items-end fs-7">
                            <div class="titular-bloco">
                                <div class="text-uppercase text-white-50 lh-1" style="font-size: 0.65rem;">TITULAR</div>
                                <div class="fw-semibold text-uppercase font-monospace text-truncate" style="max-width: 190px;">
                                    <?= AbreviarNome(mb_strtoupper($fConta['user_nome'], 'UTF-8')); ?>
                                </div>
                            </div>

                            <div class="validade-bloco text-end">
                                <div class="text-uppercase text-white-50 lh-1" style="font-size: 0.65rem;">VÁLIDO ATÉ</div>
                                <div class="fw-semibold font-monospace">
                                    <?= date('m/y', strtotime($CartaoVirtual['card_validade'])); ?>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- Detalhe/Linha Dourada sutil no rodapé do cartão -->
                    <div class="linha-dourada position-absolute bottom-0 start-0 w-100" style="height: 3px; background: linear-gradient(90deg, #ffd700, #b8860b);"></div>

                </div>

                <!-- qrCode -->
                <div>

                </div>
            </div>
        </div>
    </div>
</div>