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
                        style="height: 225px; width: 100%; display: block;"
                        src="<?php echo $value['img']; ?>"
                        data-holder-rendered="true"
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
                            <a role="button" class="btn btn-sm btn-outline-success" href="<?php echo $value['url']; ?>" target="_blank">Ver</a>
                        </div>
                        <div class="btn-group">
                            <a role="button" class="btn btn-sm btn-outline-info" href="<?php echo base_url() . '/Home/editData/' . $value['id']; ?>">Editar</a>
                            <a role="button" class="btn btn-sm btn-outline-danger" href="<?php echo base_url() . '/Home/deleteData/' . $value['id']; ?>">Borrar</a>
                        </div>

                    </div>
                </div>
            </article>
        </div>


    <?php
    }
    ?>
    </div>
    <?php
}
?>
