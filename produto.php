<?php

require_once './config/Global.php';

try {

    $method = filter_input(INPUT_POST, 'metodo');

    if($method === 'salvar' ){
        $idProduto = filter_input(INPUT_POST, 'id_produto');
        $nomeProduto = filter_input(INPUT_POST, 'nome_produto');
        $valor = filter_input(INPUT_POST, 'valor');
        $estoque = filter_input(INPUT_POST, 'estoque');
        $descricao = filter_input(INPUT_POST, 'descricao');
        $imagem = filter_input(INPUT_POST, 'imagem');
        $idCategoria = filter_input(INPUT_POST, 'id_categoria');
        ProdutoController::carregar($idProduto, $nomeProduto, $valor, 
                $estoque, $descricao, $imagem, $idCategoria);
    }elseif($method === 'excluir' ){
        $idProduto = filter_input(INPUT_POST, 'id_produto');
        ProdutoController::excluir($idProduto);
    }elseif ($method === 'buscar') {
        $produto = ProdutoController::buscarPorId(filter_input(INPUT_POST, 'id_produto'));
    } else {
        $produto = ProdutoController::carregarVazio();
    }

    $produtoLista = ProdutoController::listar();
    $categoriaLista = CategoriaController::listar();
} catch (Exception $exc) {
    Erro::trataErro($exc);
}
Template::header();
?>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-6 offset-sm-3">
                <div class="header">
                    <h3 class="title">Produto</h3>
                </div>
                <div class="content">
                    <form action="produto.php" method="POST">
                        <input type="hidden" name="metodo" value="salvar">
                        <input type="hidden" name="id_produto" value="<?php echo $produto->getIdProduto() ?>">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="nome_produto">Produto</label>
                                    <input type="text" name="nome_produto" value="<?php echo $produto->getNomeProduto() ?>"
                                           class="form-control">
                                </div>                
                            </div>                
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="valor">Valor</label>
                                    <input type="number" name="valor" value="<?php echo $produto->getValor() ?>"
                                           class="form-control" required>
                                </div>                
                            </div>                
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="estoque">Estoque</label>
                                    <input type="text" name="estoque" value="<?php echo $produto->getEstoque() ?>"
                                           class="form-control">
                                </div>                
                            </div>              
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="id_categoria">Categoria</label>
                                    <select name="id_categoria" class="form-control">
                                        <?php
                                            $selected = '';
                                            foreach ($categoriaLista as $catLinha){
                                                if($catLinha['id_categoria'] === $produto->getIdCategoria()){
                                                    $selected = 'selected';
                                                }
                                        ?>
                                        <option <?php echo $selected ?> value="<?php echo $catLinha['id_categoria']?>"><?php echo $catLinha['nome_categoria']?></option>
                                        <?php
                                            $selected = '';
                                            }
                                        ?>
                                    </select>
                                </div>                
                            </div>              
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="descricao">Descrição</label>
                                    <input type="text" name="descricao" value="<?php echo $produto->getDescricao() ?>"
                                           class="form-control">
                                </div>                
                            </div>                
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="imagem">Nome da Imagem</label>
                                    <input type="text" name="imagem" value="<?php echo $produto->getImagem() ?>"
                                           class="form-control">
                                </div>                
                            </div>                
                        </div>
                        <div class="row">
                            <div class="col-md-3 offset-sm-9">
                                <div class="form-group">
                                    <input type="submit" class="btn btn-success btn-block active-pro" value="Salvar">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10 offset-sm-1">
                <div class="header">
                    <h3 class="title">Lista de Produtos</h3>
                </div>
                <?php if(count($produtoLista) > 0): ?>
                    <div class='content table-responsive table-full-width'>
                        <table class='table table-hover table-striped'>
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Produto</th>
                                    <th>Estoque</th>
                                    <th>Editar</th>
                                    <th>Excluir</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($produtoLista as $linha): ?>
                                <tr>
                                    <td><?php echo $linha['id_produto'] ?></td>
                                    <td><?php echo $linha['nome_produto'] ?></td>
                                    <td><?php echo $linha['estoque'] ?></td>
                                    <td>
                                        <form action="produto.php" method="POST">
                                            <input type="hidden" name="metodo" value="buscar">
                                            <input type="hidden" name="id_produto" value="<?php echo $linha['id_produto'] ?>">
                                            <button type="submit" class="btn btn-primary">Editar</button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="produto.php" method="POST">
                                            <input type="hidden" name="metodo" value="excluir">
                                            <input type="hidden" name="id_produto" value="<?php echo $linha['id_produto'] ?>">
                                            <button type="submit" class="btn btn-danger">Excluir</button>
                                        </form>
                                    </td>
                                </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                <?php else: ?>
                    <p>Nenhum Produto cadastrado!</p>
                <?php endif ?>
            </div>
        </div>
    </div>
</div>

<?php Template::footer() ?>

            