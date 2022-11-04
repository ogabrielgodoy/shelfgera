<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Shelf - Cadastrar</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

 <?php require_once('config/header.php'); ?>
  <?php require_once('config/slidebar.php'); ?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Cadastrar</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="paineluser.php">Inicio</a></li>
          <li class="breadcrumb-item"><a href="listarprodutos .php">Listar</a></li>
          <li class="breadcrumb-item active">Cadastrar</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <?php if (isset($_SESSION['msg_erro'])){ ?>
    <div class="alert alert-warning bg-warning border-0 alert-dismissible fade show" role="alert">
                <?php echo $_SESSION['msg_erro']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
    <?php unset($_SESSION['msg_erro']);}?>

    <section class="section">
      <div class="row">
        <div class="col">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title"></h5>

              <!-- Form -->
              <form method="post" action="scripts/processarcad.php" enctype="multipart/form-data">
                <div class="row mb-3">
                  <label for="inputSKu" class="col-sm-2 col-form-label">Sku</label>
                  <div class="col-sm-10">
                    <input type="text" name="sku" class="form-control" required>
                  </div>
                </div>
                   <div class="row mb-3">
                  <label for="inputNome" class="col-sm-2 col-form-label">Nome</label>
                  <div class="col-sm-10">
                    <input type="text" name="nome" class="form-control" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputAutor" class="col-sm-2 col-form-label">Autor</label>
                  <div class="col-sm-10">
                    <input type="text" name="autor" class="form-control" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputGenero" class="col-sm-2 col-form-label">Gênero</label>
                  <div class="col-sm-10">
                    <input type="text" name="genero" class="form-control" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputImagem" class="col-sm-2 col-form-label">Imagem</label>
                  <div class="col-sm-10">
                    <input type="file" name="arquivo" class="form-control" id="formFile">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputEstoque" class="col-sm-2 col-form-label">Estoque</label>
                  <div class="col-sm-10">
                    <input type="number" name="estoque" class="form-control" required>
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label"></label>
                  <div class="col-sm-10">
                    <input type="submit" class="btn btn-primary" value="Cadastrar">
                    </form>
                    <a href="listarprodutos.php"><label class="btn btn-outline-danger" required>Cancelar</a></label>
                  </div>
                </div><!-- End General Form Elements -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <?php require_once('config/footer.php'); ?>
  
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>