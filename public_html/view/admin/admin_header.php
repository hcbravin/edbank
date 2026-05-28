<div class="row justify-content-center">
    <div class="col-12 col-sm-10 col-md-8 mb-2">
        <div class="infomain shadow-md">
            <i class="bi bi-terminal me-1"></i> Admin

            <?php switch($URI[1]){
                case 'usuarios':
                    print '<i class="bi bi-person mx-1"></i> Usuarios';
                    break;
                
                case 'agencias':
                    print '<i class="bi bi-bank mx-1"></i> Agências';
                    break;

                
            } ?>
        
        </div>
    </div>
</div>