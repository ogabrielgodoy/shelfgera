<?php session_start();
	
//se não tiver sessão
if(!isset($_SESSION['iduser'])){
  header('location:page-login.php');
  exit;
}

  $pasta = "arquivos/";
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>ShelfGera - Produtos</title>
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
      <h1>Listar produtos</h1>
      <nav>
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="paineluser.php">Inicio</a></li>
          <li class="breadcrumb-item active">Listar</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <?php if (isset($_SESSION['msg_certo'])){ ?>
    <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show" role="alert">
                <?php echo $_SESSION['msg_certo']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
    <?php unset($_SESSION['msg_certo']);}?>


    <?php if (isset($_SESSION['msg_apagar'])){ ?>
    <div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show" role="alert">
                <?php echo $_SESSION['msg_apagar']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
    <?php unset($_SESSION['msg_apagar']);}?>

    <?php if (isset($_SESSION['msg_erro'])){ ?>
    <div class="alert alert-warning bg-warning border-0 alert-dismissible fade show" role="alert">
                <?php echo $_SESSION['msg_erro']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
    <?php unset($_SESSION['msg_erro']);}?>

    <?php if (isset($_SESSION['msg_atencao'])){ ?>
    <div class="alert alert-warning bg-warning border-0 alert-dismissible fade show" role="alert">
                <?php echo $_SESSION['msg_atencao']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
    <?php unset($_SESSION['msg_atencao']);}?>


    <section class="section dashboard">
      <div class="row">

            <!-- Tabela -->
            <div class="col-12">
              <div class="card recent-sales overflow-auto">
                
                <div class="card-body">
                  <h5 class="card-title">Produtos cadastrados</h5>
                  <table class="table table-borderless">                    
                  <thead>
                      <tr>
                        <th><a href="form-cad.php" label class="btn btn-primary">+ Cadastrar</label></a></th>
                        <th></th>
                        <th scope="col">Imagem</th>
                        <th scope="col">Sku</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Gênero</th>
                        <th scope="col">Estoque</th>
                        <th scope="col">Autor</th>
                      </tr>
                    </thead>

              <?php require_once('config/dbconectar.php');

              $sql="SELECT * FROM tblivros";
              $registros=mysqli_query($conn,$sql);

              //while ($regi=mysqli_fetch_array($registros)){
                foreach ($registros as $regi) {

              ?>
                    <tbody>
                      <th></th>
                      <tr>
                      <td>
                        <form action="form-atualizar.php" method="post">
                        <input type="hidden" name="id" value="<?php echo $regi['idlivro']; ?>" >
                        <input type="submit" name="enviar" class="btn btn-primary" value="Editar">
                        </form>
                        </td>  
                        <td>
                        <form action="scripts/processarapagar.php" method="post">
                   <input type="hidden" value="<?php echo $regi['idlivro']; ?>" name="id">
                   <input type="submit" name="enviar" class="btn btn-outline-danger" value="Apagar">

                        </form>
                        </td>
                        <td> <div class="cardimg"> <img src="<?php echo $pasta . $regi['imagemlivro']; ?>" height="150px"> </div></td>
                        <td><?php echo strip_tags($regi['skulivro']); ?></td>
                        <td><?php echo strip_tags($regi['nomelivro']); ?></td>
                        <td><?php echo strip_tags($regi['generolivro']); ?></td>
                        <td><?php echo strip_tags($regi['estoquelivro']); ?></td>
                        <td><?php echo strip_tags($regi['autorlivro']); ?></td>
                      </tr>
                    </tbody>
<?php } ?>
                  </table>

                </div>
              </div>
            </div><!-- Tabela -->
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