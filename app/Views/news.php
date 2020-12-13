<?php
if($data == NULL){
    ?>
    <div class="row">
        <div class="col-md-4 offset-md-4 text-center mb-5 mt-5">
            <a href="<?php echo base_url(); ?>/Home/loadData/" class="btn btn-primary" role="button">
                Cargar contenido remoto
            </a>
        </div>
    </div>
    <?php
}else{
    ?>
    <div class="row mb-5">
    <?php
    foreach ($data as $value) {
        ?>
        <div class="col-md-4">
            <article class="card mb-4 box-shadow">
                <?php
                if($value['img'] != NULL){
                ?>
                    <img class="card-img-top"
                        alt="<?php echo $value["title"]; ?>"
                        title="<?php echo $value["title"]; ?>"
                        style="height: 225px; width: 100%; display: block;"
                        src="<?php echo $value['img']; ?>"
                    >
                <?php } ?>

                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <small class="text-muted"><?php echo $value['publisher']; ?></small>
                        <small class="text-muted"><?php echo changeDate($value['date']); ?></small>
                    </div>
                    <h5 class="card-text">
                        <?php echo $value['title']; ?>
                    </h5>
                    <p class="card-text">
                        <?php echo $value['body']; ?>
                    </p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                            <a role="button" class="btn btn-sm btn-outline-success" href="<?php echo $value['url']; ?>" target="_blank"><i class="fas fa-globe"></i></a>
                        </div>
                        <div class="btn-group">
                            <a role="button" class="btn btn-sm btn-outline-info" href="<?php echo base_url() . '/Home/editData/' . $value['id']; ?>"><i class="fas fa-pencil-alt"></i></a>
                            <a role="button" class="btn btn-sm btn-outline-danger delete" data-id="<?php echo $value['id']; ?>" data-toggle="modal" data-target="#confirm"><i class="fas fa-trash-alt"></i></a>
                        </div>

                    </div>
                </div>
            </article>
        </div>
    <?php
    }
    ?>
    </div>
    <div class="row">
        <div class="col-md-12">
            <?php echo $pager->links(); ?>
        </div>
    </div>
    <?php
}
?>



<!--Modal-->
<div class="modal fade" id="confirm" tabindex="-1" aria-labelledby="confirm" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmLabel">Advertencia</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <p>¿Estás seguro que deseas eliminar la publicación?</p>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <a role="button" class="btn btn-sm btn-danger" id="deleteButton" href="">Eliminar</a>
            </div>
        </div>
    </div>
</div>
