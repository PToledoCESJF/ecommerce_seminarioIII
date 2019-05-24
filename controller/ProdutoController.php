<?php

require_once './config/Global.php';

class ProdutoController{
    
    public static function carregar($idProduto, $nomeProduto, $valor, $estoque, 
                    $descricao, $imagem, $idCategoria) {

        $produto = new Produto($idProduto, $nomeProduto, $valor, $estoque, 
                $descricao, $imagem, $idCategoria);

        self::salvar($produto);
    }
    
    public static function carregarVazio(){
        return new Produto(NULL, NULL, NULL, NULL, NULL, NULL, NULL);
    }
    
    public static function buscarPorId($idProduto) {
        try {
            $stmt = ProdutoDao::buscarPorId($idProduto);
            $produto = new Produto($stmt['id_produto'], $stmt['nome_produto'], $stmt['valor'], 
                $stmt['estoque'], $stmt['descricao'], $stmt['imagem_nome'], $stmt['id_categoria']);
            return $produto;
        } catch (Exception $exc) {
            Erro::trataErro($exc);
        }
    }

    public static function excluir($idProduto) {
        try {
            ProdutoDao::excluir($idProduto);
            self::retornar();
        } catch (Exception $exc) {
            Erro::trataErro($exc);
        }
    }

    public static function listar() {
        try {
            return ProdutoDao::listar();
        } catch (Exception $exc) {
            Erro::trataErro($exc);
        }
    }

    public static function retornar() {
        header('Location: ./produto.php');
    }

    public static function salvar($produto) {
        try {
            ProdutoDao::salvar($produto);
            self::retornar();
        } catch (Exception $exc) {
            Erro::trataErro($exc);
        }
    }
}
