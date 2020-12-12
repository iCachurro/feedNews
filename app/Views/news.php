<?php
if($data == NULL){
    ?>
    <div class="row">
        <div class="col-md-4 offset-md-4 text-center mb-5 mt-5">
            <a href="<?php echo base_url(); ?>/home/loadData/" class="btn btn-primary" role="button">
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
                        data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail"
                        alt="<?php echo $value["title"]; ?>"
                        style="height: 225px; width: 100%; display: block;"
                        src="<?php echo $value['img']; ?>"
                        data-holder-rendered="true"
                    >
                <?php } ?>

                <div class="card-body">
                    <h5 class="card-text">
                        <?php echo $value['title']; ?>
                    </h5>
                    <p class="card-text">
                        <?php echo $value['body']; ?>
                    </p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                            <a role="button" class="btn btn-sm btn-outline-secondary" href="<?php echo $value['url']; ?>" target="_blank">Ver</button>
                            <a role="button" class="btn btn-sm btn-outline-secondary" href="<?php echo base_url() . '/news/' . $value['id']; ?>">Editar</a>
                        </div>
                        <small class="text-muted"><?php echo $value['publisher']; ?></small>
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
