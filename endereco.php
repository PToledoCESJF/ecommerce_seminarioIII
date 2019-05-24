<?php

require_once './config/Global.php';

try {

    $method = filter_input(INPUT_POST, 'metodo');
    $idEndereco = filter_input(INPUT_POST, 'id_endereco');

    if($method === 'salvar' ){
        $descricao = filter_input(INPUT_POST, 'descricao');
        $logradouro = filter_input(INPUT_POST, 'logradouro');
        $numero = filter_input(INPUT_POST, 'numero');
        $cep = filter_input(INPUT_POST, 'cep');
        $bairro = filter_input(INPUT_POST, 'bairro');
        $cidade = filter_input(INPUT_POST, 'cidade');
        $uf = filter_input(INPUT_POST, 'uf');
        $idUsuario = filter_input(INPUT_POST, 'id_usuario');
        
        EnderecoController::carregar($idEndereco, $descricao, $logradouro, $numero, 
                $cep, $bairro, $cidade, $uf, $idUsuario);
        
    }elseif($method === 'excluir' ){
        EnderecoController::excluir($idEndereco);
    }elseif ($method === 'buscar') {
        $endereco = EnderecoController::buscarPorId($idEndereco);
    } else {
        $endereco = EnderecoController::carregarVazio();
    }

    $enderecoLista = EnderecoController::listar();
    
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
                    <h3 class="title">Endereço</h3>
                </div>
                <div class="content">
                    <form action="endereco.php" method="POST">
                        <input type="hidden" name="metodo" value="salvar">
                        <input type="hidden" name="id_endereco" value="<?php echo $endereco->getIdEndereco() ?>">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="descricao">Descrição</label>
                                    <input type="text" name="descricao" value="<?php echo $endereco->getDescricao() ?>"
                                           class="form-control">
                                </div>                
                            </div>                
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="logradouro">Logradouro</label>
                                    <input type="text" name="logradouro" value="<?php echo $endereco->getLogradouro() ?>"
                                           class="form-control">
                                </div>                
                            </div>                
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="numero">Número</label>
                                    <input type="number" name="numero" value="<?php echo $endereco->getNumero() ?>"
                                           class="form-control" required>
                                </div>                
                            </div>                
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="cep">CEP</label>
                                    <input type="text" name="cep" value="<?php echo $endereco->getCep() ?>"
                                           class="form-control">
                                </div>                
                            </div>              
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="uf">Estado</label>
                                    <select name="uf" class="form-control">
                                        <?php
                                            $selected = '';
                                            $estados = ArreiosAuxController::getEstados();
                                            foreach ($estados as $uf => $estado){
                                                if($uf == $endereco->getUf()){
                                                    $selected = 'selected';
                                                }
                                        ?>
                                        <option <?php echo $selected ?> value="<?php echo $uf ?>"><?php echo $estado ?></option>
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
                                    <label for="bairro">Bairro</label>
                                    <input type="text" name="bairro" value="<?php echo $endereco->getBairro() ?>"
                                           class="form-control">
                                </div>                
                            </div>                
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="cidade">Cidade</label>
                                    <input type="text" name="cidade" value="<?php echo $endereco->getCidade() ?>"
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

<?php Template::footer() ?>

            