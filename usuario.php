<?php
require_once './config/Global.php';

try {

    $method = filter_input(INPUT_POST, 'metodo');
    $idUsuario = filter_input(INPUT_POST, 'id_usuario');

    if($method === 'salvar' ){
        
        $nome = filter_input(INPUT_POST, 'nome');
        $email = filter_input(INPUT_POST, 'email');
        $senha = filter_input(INPUT_POST, 'senha');
        $telefone = filter_input(INPUT_POST, 'telefone');
        $cpf = filter_input(INPUT_POST, 'cpf');
        $tipo = filter_input(INPUT_POST, 'tipo');
        $dataNascimento = filter_input(INPUT_POST, 'data_nascimento');

        UsuarioController::carregar($idUsuario, $nome, $email, $senha, 
                $telefone, $cpf, $tipo, $dataNascimento);
        
    }elseif($method === 'excluir' ){
        UsuarioController::excluir($idUsuario);
    }elseif ($method === 'buscar') {
        $usuario = UsuarioController::buscarPorId($idUsuario);
    } else {
        $usuario = UsuarioController::carregarVazio();
    }

    $usuarioLista = UsuarioController::listar();
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
                    <h3 class="title">Usuário</h3>
                </div>
                <div class="content">
                    <form action="usuario.php" method="POST">
                        <input type="hidden" name="metodo" value="salvar">
                        <input type="hidden" name="id_usuario" value="<?php echo $usuario->getIdUsuario() ?>">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="categoria">Nome</label>
                                    <input type="text" name="nome" value="<?php echo $usuario->getNome() ?>" 
                                            class="form-control" autofocus required>                            
                                </div>                
                            </div>                
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="categoria">Email</label>
                                    <input type="email" name="email" value="<?php echo $usuario->getEmail() ?>"
                                           class="form-control" required>
                                </div>                
                            </div>                
                        </div>                            
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="categoria">Senha</label>
                                    <input type="password" name="senha" value="<?php echo $usuario->getSenha() ?>"
                                           class="form-control" required>
                                </div>                
                            </div>                
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="categoria">Telefone</label>
                                    <input type="tel" name="telefone" oninput="maskTelefone(this)" 
                                           value="<?php echo $usuario->getTelefone() ?>" class="form-control"  
                                           onfocus="mostrarPlace(this, 'Ex.: (00)0000-0000 - somente números')" 
                                           onblur="esconderPlace(this)">
                                </div>                
                            </div>                
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="categoria">CPF</label>
                                    <input type="text" name="cpf" value="<?php echo $usuario->getCpf() ?>"
                                           class="form-control" oninput="maskCpf(this)"
                                           onfocus="mostrarPlace(this, 'Ex.: 000.000.000-00 - somente números')" 
                                           onblur="esconderPlace(this)">
                                </div>                
                            </div>                
                        
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tipo">Tipo</label>
                                    <select class="form-control" name="tipo">
                                        <?php
                                            $selectedTp = '';
                                            $tipos = ArreiosAuxController::getTipos();
                                            foreach ($tipos as $tp => $tipo){
                                                if($tp == $usuario->getTipo()){
                                                    $selectedTp = 'selected';
                                                }
                                        ?>
                                        <option <?php echo $selectedTp ?> value="<?php echo $tp ?>"><?php echo $tipo ?></option>
                                        <?php
                                            $selectedTp = '';
                                            }
                                        ?>
                                    </select>
                                </div>                
                            </div>                
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="categoria">Data de Nascimento</label>
                                    <input type="date" name="data_nascimento" value="<?php echo $usuario->getDataNascimento() ?>"
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
                    <h3 class="title">Lista de Usuários</h3>
                </div>
                <?php if(count($usuarioLista) > 0): ?>
                    <div class='content table-responsive table-full-width'>
                        <table class='table table-hover table-striped'>
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Usuario</th>
                                    <th>Email</th>
                                    <th>Telefone</th>
                                    <th>Editar</th>
                                    <th>Excluir</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($usuarioLista as $linha): ?>
                                <tr>
                                    <td><?php echo $linha['id_usuario'] ?></td>
                                    <td><?php echo $linha['nome'] ?></td>
                                    <td><?php echo $linha['email'] ?></td>
                                    <td><?php echo $linha['telefone'] ?></td>
                                    <td>
                                        <form action="usuario.php" method="POST">
                                            <input type="hidden" name="metodo" value="buscar">
                                            <input type="hidden" name="id_usuario" value="<?php echo $linha['id_usuario'] ?>">
                                            <button type="submit" class="btn btn-primary">Editar</button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="usuario.php" method="POST">
                                            <input type="hidden" name="metodo" value="excluir">
                                            <input type="hidden" name="id_usuario" value="<?php echo $linha['id_usuario'] ?>">
                                            <button type="submit" class="btn btn-danger">Excluir</button>
                                        </form>
                                    </td>
                                </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                <?php else: ?>
                    <p>Nenhum Usuario cadastrado!</p>
                <?php endif ?>
                    
            </div>
        </div>
    </div>
</div>

<script src="./assets/js/mascara.js"> </script>

<?php Template::footer() ?>
