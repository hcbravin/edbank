<div class="modal" tabindex="-1" id="ModalSubGerente" data-bs-keyboard="false" data-bs-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-bg-warning">
                <h6 class="modal-title"><i class="bi bi-person-lines-fill me-1"></i> Subgerentes</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body py-5">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-11">
                        <label for="ModalSubGerenteEmail" class="form-label">Informe os emails dos subgerentes que deseja contratar.</label>
                        <textarea class="form-control form-control-sm" id="ModalSubGerenteEmail" placeholder="name1@example.com, name2@exemple.com ..."></textarea>
                        <div class="d-flex justify-content-between mt-1 ">
                            <span class="ft-10">Separe os emails por virgula.</span>
                            <button type="button" class="btn btn-sm btn-warning" id="ModalSubGerenteSearch"><i class="bi bi-search me-1"></i> Buscar</button>
                        </div>
                    </div>

                    <div class="col-12 col-md-11 d-none">
                        <hr>
                        <div class="infomain bd-1 bd-danger">
                            Informe ao menos 1 endereço de email válido.
                        </div>

                        <form action="/exe/agencia/subgerente" method="post">
                            <ul class="list-group" id="ModalSubGerenteList">
                                
                            </ul>

                            <div class="text-end mt-2">
                                <?= Button(); ?>
                                <input type="hidden" name="agencia" value="<?= $URI[1]; ?>">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(function(){
        
        $('#ModalSubGerenteSearch').click(function(){
            var emails = $('#ModalSubGerenteEmail').val();

            $.post('/api.php/usuario/buscar/email', { emails }, function(data){

                if(!typeof data === 'object' && data !== null){
                    data = JSON.parse(data);
                }

                if(data.status == 'error'){
                    alert(data.msg);
                    return;
                }

                if(data.status == 'success'){                    
                    $.each(data.data, function(chave, valor){
                        $('#ModalSubGerenteList').prepend(
                        `<li class="list-group-item d-flex justify-content-between">
                            <div class="align-self-center">
                                <input type="hidden" name="subgerente[${valor.user_id}]" value="insert">
                                ${valor.user_nome.trim()}
                                <br/>
                                <small class="ft-10 opacity-50">${valor.user_email.trim()}</small>
                            </div>
                            <button class="btn btn-sm btn-danger iTrash align-self-center" type="button">
                                <i class="bi bi-trash-fill"></i>
                            </button>
                        </li>`);

                    });
                    $('#ModalSubGerenteSearch').closest('div.row').find('div.d-none').removeClass('d-none');
                    return;
                }
            });
        });

        // Remove o item da listagem de gerentes
        $(document).on('click', '#ModalSubGerente button.iTrash', function(){
            $(this).closest('li.list-group-item').remove();
        });


    })
</script>