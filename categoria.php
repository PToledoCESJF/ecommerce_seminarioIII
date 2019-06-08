<?php

require_once './config/Global.php';

try {

    $method = filter_input(INPUT_POST, 'metodo');

    if($method === 'salvar' ){
        $idCategoria = filter_input(INPUT_POST, 'id_categoria');
        $nomeCategoria = filter_input(INPUT_POST, 'nome_categoria');
        CategoriaController::carregar($method, $idCategoria, $nomeCategoria);
    }elseif($method === 'excluir' ){
        $idCategoria = filter_input(INPUT_POST, 'id_categoria');
        CategoriaController::excluir($idCategoria);
    }elseif ($method === 'buscar') {
        $categoria = CategoriaController::buscarPorId(filter_input(INPUT_POST, 'id_categoria'));
    } else {
        $categoria = CategoriaController::carregarVazio();
    }
    

   $categoriaLista = CategoriaController::listar();
} catch (Exception $exc) {
    Erro::trataErro($exc);
}

Template::header();

?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="./assets/css/glyphicon.css">
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <title>Categoria</title>
</head>
<body>
    <div class="container col-md-12">        
        
    <div class="row">
        <a href="index.php">
            <button class="margin-t btn btn-secondary">
                Voltar
            </button>            
        </a>
    </div>
    <form action="categoria.php" method="POST">
        <input type="hidden" name="metodo" value="salvar">
        <input type="hidden" name="id_categoria" value="<?php echo $categoria->getIdCategoria() ?>">
        <div class="row col-md-4 margin-t m-bottom margin-l10">        
                Categoria: <input class="form margin-l10" type="text" name="nome_categoria" value="<?php echo $categoria->getNomeCategoria() ?>">
                <button type="submit" class="margin-l10 btn btn-success">Salvar</button>
        </div>
    </form>        
    

        <table class="table">
            <?php if(count($categoriaLista) > 0): ?>
            <thead>
                <tr>
                  <th scope="col">#id</th>
                  <th scope="col">Categoria</th>
                  <th scope="col">Editar</th>
                  <th scope="col">Excluir</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($categoriaLista as $linha): ?>
                    <tr>
                        <th scope="row"><?php echo $linha['id_categoria'] ?></th>
                        <td><?php echo $linha['nome_categoria'] ?></td>
                        <td>
                            <form action="categoria.php" method="POST">
                                <input type="hidden" name="metodo" value="buscar">
                                <input type="hidden" name="id_categoria" value="<?php echo $linha['id_categoria'] ?>">
                                <button type="submit"> 
                                    <span class="glyphicon glyphicon-pencil"></span> 
                                </button>
                            </form>          
                        </td>
                        <td>
                            <form action="categoria.php" method="POST">
                                <input type="hidden" name="metodo" value="excluir">
                                <input type="hidden" name="id_categoria" value="<?php echo $linha['id_categoria'] ?>">
                                <button type="submit"> <span class="glyphicon glyphicon-trash"></span> </button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
            <?php else: ?>
                    <p>Nenhuma Categoria cadastrada!</p>
                <?php endif ?>    
        </table>
    </div>
</body>
</html>

<?php
    Template::footer();
?>