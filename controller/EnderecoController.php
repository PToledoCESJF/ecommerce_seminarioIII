<?php

require_once './config/Global.php';

class EnderecoController{
    
    public static function carregar($method, $idEndereco, $descricao, $logradouro, 
            $numero, $cep, $bairro, $cidade, $uf, $idUsuario) {
        if($method === "salvar"){
            $endereco = new Endereco($idEndereco, $descricao, $logradouro, $numero, 
                    $cep, $bairro, $cidade, $uf, $idUsuario);
            self::salvar($endereco);
        }
    }
    
    public static function carregarVazio(){
        return new Endereco(NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
    }

    public static function buscarPorId($idEndereco) {
        try {
            $stmt = EnderecoDao::buscarPorId($idEndereco);
            $endereco = new Endereco($stmt['id_endereco'], $stmt['descricao'], 
                    $stmt['logradouro'], $stmt['numero'], $stmt['cep'], 
                    $stmt['bairro'], $stmt['cidade'], $stmt['uf'], $stmt['idUsuario']);
            return $endereco;
        } catch (Exception $exc) {
            Erro::trataErro($exc);
        }
    }

    public static function excluir($idEndereco) {
        try {
            EnderecoDao::excluir($idEndereco);
            self::retornar();
        } catch (Exception $exc) {
            Erro::trataErro($exc);
        }
    }

    public static function listar() {
        try {
            return EnderecoDao::listar();
        } catch (Exception $exc) {
            Erro::trataErro($exc);
        }
    }

    public static function salvar($endereco) {
        try {
            EnderecoDao::salvar($endereco);
            self::retornar();
        } catch (Exception $exc) {
            Erro::trataErro($exc);
        }
    }
}
