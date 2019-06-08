<?php

require_once './config/Global.php';

$produtoLista = ProdutoController::listar();


Template::header();

?>

<!-- carrossel -->

<header>
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
      <!-- Slide One - Set the background image for this slide in the line below -->
      <div class="carousel-item active" style="background-image: url('./assets/img/img_topo/adidas.jpg')">
        <div class="carousel-caption d-none d-md-block">
          <h3></h3>
          <p></p>
        </div>
      </div>
      <!-- Slide Two - Set the background image for this slide in the line below -->
      <div class="carousel-item" style="background-image: url('./assets/img/img_topo/nike.jpg')">
        <div class="carousel-caption d-none d-md-block">
          <h3></h3>
          <p>.</p>
        </div>
      </div>
      <!-- Slide Three - Set the background image for this slide in the line below -->
     
      <div class="carousel-item" style="background-image: url('./assets/img/img_topo/puma.jpg')">
        <div class="carousel-caption d-none d-md-block">
          <h3></h3>
          <p></p>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a> -->
  </div>
</header>

<!-- body -->

<!-- Page Content -->
<div class='container'>

  <h1 class='my-4'>Bem Vindo a loja!</h1>

  <!-- Marketing Icons Section -->
  <!-- <div class='row'>
    <div class='col-lg-4 mb-4'>
      <div class='card h-100'>
        <h4 class='card-header'>Card Title</h4>
        <div class='card-body'>
          <p class='card-text'>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente esse necessitatibus neque.</p>
        </div>
        <div class='card-footer'>
          <a href='#' class='btn btn-primary'>Learn More</a>
        </div>
      </div>
    </div>
    <div class='col-lg-4 mb-4'>
      <div class='card h-100'>
        <h4 class='card-header'>Card Title</h4>
        <div class='card-body'>
          <p class='card-text'>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis ipsam eos, nam perspiciatis natus commodi similique totam consectetur praesentium molestiae atque exercitationem ut consequuntur, sed eveniet, magni nostrum sint fuga.</p>
        </div>
        <div class='card-footer'>
          <a href='#' class='btn btn-primary'>Learn More</a>
        </div>
      </div>
    </div>
    <div class='col-lg-4 mb-4'>
      <div class='card h-100'>
        <h4 class='card-header'>Card Title</h4>
        <div class='card-body'>
          <p class='card-text'>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente esse necessitatibus neque.</p>
        </div>
        <div class='card-footer'>
          <a href='#' class='btn btn-primary'>Learn More</a>
        </div>
      </div>
    </div>
  </div> -->
  <!-- Portfolio Section -->
  <h2>Produtos</h2>



  <div class='row'>
    <?php
    foreach ($produtoLista as $p) {
      ?>
      <div class='col-lg-4 col-sm-6 portfolio-item'>
        <div class='card h-100'>
          <a href='paginaproduto.php?id_produto=<?=$p['id_produto']?>'>
              <img class='card-img-top' src='./assets/img/
                  <?php echo ProdutoController::buscarPorId($p['id_produto']) ?>' alt=''>
          <div class='card-body'>
            <h4 class='card-title'>
              <?= $p['nome_produto']; ?>
            </h4>
            <p class='card-text'><?= $p['descricao']; ?></p>
          </div>
          </a>
        </div>
      </div>
    <?php } ?>

  <!-- Features Section -->
  <div class='row'>
    <div class='col-lg-6'>
      <h2>Entre em cotato</h2>
      <p>Disponível 24hrs para atendimento</p>
      <ul>
        <li>
          <strong>Produtos</strong>
        </li>
        <li>Forma de pagamento</li>
        <li>Dúvidas de entrega</li>
        <li>Ligue 0800 900 9000</li>
        <li>Email: blackstore@blackstore.com.br</li>
      </ul>
      
    </div>
    <div class='col-lg-6'>
      <img class='img-fluid rounded' src='./assets/img/atendimento.jpg' alt=''>
    </div>
  </div>
  <!-- /.row -->

  <hr>

  <!-- Call to Action Section -->
  <!-- <div class='row mb-4'>
    <div class='col-md-8'>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias, expedita, saepe, vero rerum deleniti beatae veniam harum neque nemo praesentium cum alias asperiores commodi.</p>
    </div>
    <div class='col-md-4'>
      <a class='btn btn-lg btn-secondary btn-block' href='#'>Call to Action</a>
    </div>
  </div> -->

</div>

<?php
Template::footer();
?>