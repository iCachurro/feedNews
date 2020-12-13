<!doctype html>
<html lang="es">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>feedNews</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <!--Font Awesome-->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
</head>
<body class="d-flex flex-column min-vh-100">
    <header class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
        <a href="<?php echo base_url(); ?>" class="my-0 mr-md-auto text-decoration-none">
            <h5 class="font-weight-normal">feedNews</h5>
        </a>
        <nav class="my-2 my-md-0 mr-md-3">
            <a class="p-2 text-dark text-decoration-none" href="<?php echo base_url() . '/Home/history'; ?>">Histórico</a>
            <a class="p-auto btn btn-primary text-decoration-none" href="<?php echo base_url() . '/Home/news'; ?>" role="button"><i class="fas fa-plus"></i></a>
        </nav>

    </header>
    <main class="container">
