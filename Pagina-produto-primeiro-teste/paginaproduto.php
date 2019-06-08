<?php
require_once './config/Global.php';

//$idProduto = filter_input(INPUT_GET, 'id');
$idProduto = $_GET['id_produto'];

$produtoLista = ProdutoController::listar();

$produto = ProdutoController::buscarPorId($idProduto);
Template::header();

?>

<body>

    <section class="section-content bg padding-y-sm">
        <div class="container">


            <div class="row">
                <div class="col-xl-10 col-md-9 col-sm-12">


                    <main class="card">
                        <div class="row no-gutters">
                            <aside class="col-sm-6 border-right">
                                <article class="gallery-wrap"> 
                                    <div class="img-big-wrap">
                                        <div> <img src="assets/img/<?php echo $produto->getImagem()?>" ></div>
                                    </div> 

                                </article> 
                            </aside>
                            <aside class="col-sm-6">
                                <article class="card-body">

                                    <h3 class="title mb-3"><?php echo $produto->getNomeProduto() ?></h3>

                                    <div class="mb-3"> 
                                        <var class="price h3 text-warning"> 
                                            <span class="currency"> R$</span><span class="num">Pegar preco no banco</span>
                                        </var> 

                                    </div>
                                    <dl>
                                        <dt>Descricao: <dd> <?php echo $produto->getNomeProduto() ?></dd></dt>

                                    </dl>
                                    <dl class="row">
                                        <dt class="col-sm-3">Modelo: </dt>
                                        <dd class="col-sm-9">12345611</dd>


                                        <dt class="col-sm-3">Frete grátis</dt>
                                        <dd class="col-sm-9"><strong>REGIÃO SUDESTE</strong> </dd>
                                    </dl>
                                    <div class="rating-wrap">



                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <dl class="dlist-inline">
                                                <dt>Tamanho: </dt>
                                                <dd> 
                                                    <select class="form-control form-control-sm" style="width:70px;">
                                                        <option>37</option>
                                                        <option>38</option>
                                                        <option>39</option>
                                                        <option>40</option>
                                                        <option>41</option>
                                                        <option>42</option>
                                                        <option>43</option>
                                                        <option>44</option>
                                                    </select>
                                                </dd>
                                            </dl>  
                                        </div> 
                                        <div class="col-sm-5">
                                            <dl class="dlist-inline">
                                                <dt>Cor: </dt>
                                                <dd> 
                                                    <select class="form-control form-control-sm" style="width:70px;">
                                                        <option> Preto/Branco </option>
                                                        <option> Vermelho/Branco </option>
                                                        <option> Branco</option>

                                                    </select>
                                                </dd>
                                            </dl> 
                                        </div>

                                    </div> 
                                    <hr>
                                    <a href="#" class="btn  btn-danger"> Comprar </a>

                                </article> 
                            </aside> 
                        </div> 
                    </main> 
                </div>
            </div>
        </div>
    </section>
    </body>
</html>
                   

<?php
Template::footer();
