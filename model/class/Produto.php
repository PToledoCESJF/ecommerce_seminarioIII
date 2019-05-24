<?php

class Produto {

    private $idProduto;
    private $nomeProduto;
    private $valor;
    private $estoque;
    private $descricao;
    private $imagem;
    private $idCategoria;
    
    public function __construct($idProduto, $nomeProduto, $valor, $estoque, $descricao, $imagem, $idCategoria) {
        $this->idProduto = $idProduto;
        $this->nomeProduto = $nomeProduto;
        $this->valor = $valor;
        $this->estoque = $estoque;
        $this->descricao = $descricao;
        $this->imagem = $imagem;
        $this->idCategoria = $idCategoria;
    }
    
    public function getIdProduto() {
        return $this->idProduto;
    }

    public function getNomeProduto() {
        return $this->nomeProduto;
    }

    public function getValor() {
        return $this->valor;
    }

    public function getEstoque() {
        return $this->estoque;
    }

    public function getDescricao() {
        return $this->descricao;
    }
    
    public function getImagem() {
        return $this->imagem;
    }

    public function getIdCategoria() {
        return $this->idCategoria;
    }

}
