<?php

// Initialize values
$id         = NULL;
$title      = NULL;
$date       = NULL;
$body       = NULL;
$publisher  = NULL;
$img        = NULL;
$url        = NULL;

// Get values
if(isset($data)){
    $id         = $data[0]['id'];
    $title      = $data[0]['title'];
    $date       = $data[0]['date'];
    $body       = $data[0]['body'];
    $publisher  = $data[0]['publisher'];
    $img        = $data[0]['img'];
    $url        = $data[0]['url'];
}

?>

<div class="form-group">

    <?php
    echo form_open(base_url() . '/Home/saveData');
    echo form_hidden('id', $id);
    ?>

    <div class="row">
        <div class="col-md-12">
            <?php echo form_input(array('name' => 'title', 'placeholder' => 'Título', 'class' => 'form-control mb-2', 'value' => $title)); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?php echo form_input(array('name' => 'publisher', 'placeholder' => 'Fuente', 'class' => 'form-control mb-2', 'value' => $publisher)); ?>
        </div>
        <div class="col-md-6">
            <?php echo form_input(array('name' => 'date', 'type' => 'date', 'placeholder' => 'Fecha', 'class' => 'form-control mb-2', 'value' => $date)); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <?php echo form_input(array('name' => 'img', 'placeholder' => 'Imagen: http://ejemplo.com/abcd.jpg', 'class' => 'form-control mb-2', 'value' => $img)); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <?php echo form_input(array('name' => 'url', 'placeholder' => 'Link: http://ejemplo.com', 'class' => 'form-control mb-2', 'value' => $url)); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <?php echo form_textarea(array('name' => 'body', 'placeholder' => 'Cuerpo', 'rows' => '5', 'class' => 'form-control mb-2', 'value' => $body)); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <?php echo form_submit('guardar', 'Guardar', 'class="btn btn-primary"'); ?>
            <a href="<?php echo base_url(); ?>" role="button" class="btn  btn-secondary">Cancelar</a>
        </div>
    </div>

    <?php
    echo form_close();
    ?>
</div>
