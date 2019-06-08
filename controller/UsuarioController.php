<?php

require_once './config/Global.php';

class UsuarioController{
    
    public static function consultaUsuario($email, $senha){
        $usuarioLista = self::listar();
        
        foreach ($usuarioLista as $usuario){
            if($usuario['email'] === $email && $usuario['senha'] === $senha){
//                session_destroy();
//                session_start();
                $_SESSION['usuario_nome'] = $usuario['nome'];
                $_SESSION['usuario_tipo'] = $usuario['tipo'];
                $_SESSION['usuario_logado'] = TRUE;
                return TRUE;
            }
        }
    }
    
    public static function carregar($idUsuario, $nome, $email, $senha, $telefone, 
                    $cpf, $tipo, $dataNascimento) {
        
        $usuario = new Usuario($idUsuario, $nome, $email, $senha, $telefone, 
                $cpf, $tipo, $dataNascimento);
        self::salvar($usuario);
    }
    
    public static function carregarVazio(){
        return new Usuario(NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
    }

    public static function buscarPorId($idUsuario) {
        try {
            $stmt = UsuarioDao::buscarPorId($idUsuario);
            $usuario = new Usuario($stmt['id_usuario'], $stmt['nome'], $stmt['email'], 
                    $stmt['senha'], $stmt['telefone'], $stmt['cpf'], $stmt['tipo'], 
                    $stmt['data_nascimento']);
        
            return $usuario;
        } catch (Exception $exc) {
            Erro::trataErro($exc);
        }
    }
    
    public static function buscarPorEmail($email) {
        try {
            $stmt = UsuarioDao::buscarPorEmail($email);
            return $stmt['id_usuario'];
        } catch (Exception $exc) {
            Erro::trataErro($exc);
        }
    }

    public static function excluir($idUsuario) {
        try {
            UsuarioDao::excluir($idUsuario);
            self::retornar();
        } catch (Exception $exc) {
            Erro::trataErro($exc);
        }
    }

    public static function listar() {
        try {
            return UsuarioDao::listar();
        } catch (Exception $exc) {
            Erro::trataErro($exc);
        }
    }

    public static function retornar() {
        header('Location: ./usuario.php');
    }

    public static function salvar($usuario) {
        try {
            UsuarioDao::salvar($usuario);
            self::retornar();
        } catch (Exception $exc) {
            Erro::trataErro($exc);
        }
    }
}
