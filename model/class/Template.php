<?php

class Template{
    
    public static function header(){
        
        session_start();
        
        if(!isset($_SESSION['usuario_logado'])){
            $_SESSION['usuario_nome'] = 'Visitante';
            $_SESSION['usuario_tipo'] = 0;
        }
        
        echo "

            <!DOCTYPE html>
            <html lang='pt-br'>

            <head>

              <meta charset='utf-8'>
              <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
              <meta name='description' content=''>
              <meta name='author' content=''>

              <title>Black Store</title>

              <!-- Bootstrap core CSS -->
              <link href='./assets/css/bootstrap.min.css' rel='stylesheet'>

              <!-- Custom styles for this template -->
              <link href='./assets/css/modern-business.css' rel='stylesheet'>

    </head>
    
    <!-- Navigation -->
              <nav class='navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top'>
                <div class='container'>
                  <a class='navbar-brand' href='index.php'>Black Store</a>
                  <button class='navbar-toggler navbar-toggler-right' type='button' data-toggle='collapse' data-target='#navbarResponsive' aria-controls='navbarResponsive' aria-expanded='false' aria-label='Toggle navigation'>
                    <span class='navbar-toggler-icon'></span>
                  </button>
                  <div class='collapse navbar-collapse' id='navbarResponsive'>
                    <ul class='navbar-nav ml-auto'>
                      <li class='nav-item'>
                        <a class='nav-link' href='about.html'>About</a>
                      </li>
                      <li class='nav-item'>
                        <a class='nav-link' href='services.html'>Services</a>
                      </li>
                      <li class='nav-item'>
                        <a class='nav-link' href='contact.html'>Contact</a>
                      </li>
                      <li class='nav-item dropdown'>
                        <a class='nav-link dropdown-toggle' href='#' id='navbarDropdownPortfolio' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                          Portfolio
                        </a>
                        <div class='dropdown-menu dropdown-menu-right' aria-labelledby='navbarDropdownPortfolio'>
                          <a class='dropdown-item' href='portfolio-1-col.html'>1 Column Portfolio</a>
                          <a class='dropdown-item' href='portfolio-2-col.html'>2 Column Portfolio</a>
                          <a class='dropdown-item' href='portfolio-3-col.html'>3 Column Portfolio</a>
                          <a class='dropdown-item' href='portfolio-4-col.html'>4 Column Portfolio</a>
                          <a class='dropdown-item' href='portfolio-item.html'>Single Portfolio Item</a>
                        </div>
                      </li>
                      <li class='nav-item dropdown'>
                        <a class='nav-link dropdown-toggle' href='#' id='navbarDropdownBlog' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                          Blog
                        </a>
                        <div class='dropdown-menu dropdown-menu-right' aria-labelledby='navbarDropdownBlog'>
                          <a class='dropdown-item' href='blog-home-1.html'>Blog Home 1</a>
                          <a class='dropdown-item' href='blog-home-2.html'>Blog Home 2</a>
                          <a class='dropdown-item' href='blog-post.html'>Blog Post</a>
                        </div>
                      </li>
                      <li class='nav-item dropdown'>
                        <a class='nav-link dropdown-toggle' href='#' id='navbarDropdownBlog' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                          Minha conta
                        </a>
                        <div class='dropdown-menu dropdown-menu-right' aria-labelledby='navbarDropdownBlog'>
                          <a class='dropdown-item' href='login.php'>Login</a>
                          <a class='dropdown-item' href='cadastroCliente.php'>Cadastro</a>
                          
                          <a class='dropdown-item' href='categoria.php'>Categoria</a>
                          <a class='dropdown-item' href='produto.php'>Produtos</a>
                          <a class='dropdown-item' href='usuario.php'>Usuário</a>
                          
                          <a class='dropdown-item' href='faq.html'>FAQ</a>
                          <a class='dropdown-item' href='404.html'>404</a>
                          <a class='dropdown-item' href='pricing.html'>Pricing Table</a>
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
              </nav>

            <body> ";
    }
    
    
    public static function body(){
        echo "
 ";
    }
    
    
    public static function footer(){
        echo "
        <!-- Footer -->
          <footer class='py-5 bg-dark'>
            <div class='container'>
              <p class='m-0 text-center text-white'>Copyright &copy; Your Website 2019</p>
            </div>
            <!-- /.container -->
          </footer>

          <!-- Bootstrap core JavaScript -->
          <script src='./vendor/jquery/jquery.min.js'></script>
          <script src='./vendor/bootstrap/js/bootstrap.bundle.min.js'></script>

        </body>

        </html> ";
    }
    
}