<?php require "../../private/scripts_extra/selecaoAdd.php";?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
 <meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <title>Divina Pizzaria</title>
 <link href="../css/bootstrap.min.css" rel="stylesheet">
 <link href="../css/style.css" rel="stylesheet">
 <style>#central{width: 80%; margin: auto;} .addpedido{text-align: center; padding-bottom: 30px;} .inserido{width: 220px; margin: auto;}</style>
</head>
<body>

 <nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
   <div class="navbar-header">
    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
     <span class="sr-only">Toggle navigation</span>
     <span class="icon-bar"></span>
     <span class="icon-bar"></span>
     <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="index.php">Divina Pizzaria</a>
   </div>
   <div id="navbar" class="navbar-collapse collapse">
    <ul class="nav navbar-nav navbar-right">
     <li><a href="#">Pedidos pendentes</a></li>
     <li><a href="index.php">Inicio</a></li>
    </ul>
   </div>
  </div>
 </nav>
<div id="main" class="container-fluid">
<h3 class="page-header addpedido"> Adicionar Pedido</h3>
<div class ="inserido">
<?php if (isset($_GET['inserido']) && $_GET['inserido']=='sucesso') { ?>
	<div class="alert alert-success" role="alert">
  		Pedido inserido com sucesso!
	</div>
<?php } ?>
</div>

<!-- Inicio do form -->
  <div id="central">
  <form action="tarefa_controller.php?acao=inserir" method="POST">
  	<div class="row">
  	 
 <div class="form-group col-md-4">
    <label for="exampleFormControlSelect1">Sabor (Pizza)</label>
    <select class="form-control" name="pizza">
		<?php 
			$recu = recuperar('pizza');
			foreach ($recu as $key => $value) { ?>
			<option value="<?= $value->id ?>"> <?= $value->sabor ?> </option>
		<?php } ?>
    </select>
  </div>
  	  
  <div class="form-group col-md-4">
    <label>Acompanhamento</label>
    <select class="form-control" name="acompanhamento">
		<?php 
			$recu = recuperar('acompanhamento');
			foreach ($recu as $key => $value) { ?>
			<option value="<?= $value->id ?>"> <?= $value->nome ?> </option>
		<?php } ?>
    </select>
  </div>

	  <div class="form-group col-md-4">
  	  	<label>Cliente</label>
  	  	<input type="text" class="form-control" placeholder="Digite o valor" name="cliente">
  	  </div>
		
	  </div>

	<div class="row">
  	  <div class="form-group col-md-3">
  	  	<label>Endereço</label>
  	  	<input type="text" class="form-control" placeholder="Digite o valor" name="endereco">
  	  </div>

		<div class="form-group col-md-3">
    <label>Bairro</label>
    <select class="form-control" name="bairro">
		<?php 
			$recu = recuperar('bairro');
			foreach ($recu as $key => $value) { ?>
			<option value="<?= $value->id ?>"> <?= $value->nome ?> </option>
			<?php } ?>
		</select>
	</div>
		
	<div class="form-group col-md-3">
    <label>Entregador</label>
    <select class="form-control" name="entregador">
		<?php 
			$recu = recuperar('entregador');
			foreach ($recu as $key => $value) { ?>
			<option value="<?= $value->id ?>"> <?= $value->nome ?> </option>
		<?php } ?>
    </select>
  </div>

	  <div class="form-group col-md-3">
  	  	<label>Valor</label>
  	  	<input type="text" class="form-control" placeholder="Digite o valor" name="valor">
  	  </div>
	</div>
	<hr />
	<div class="row">
	  <div class="col-md-12">
	  	<button type="submit" class="btn btn-primary">Salvar</button>
		<a href="index.php" class="btn btn-default">Cancelar</a>
	  </div>
	</div>
  </form>
  </div>
  <!-- Final do form -->
 </div>
 <script src="js/jquery.min.js"></script>
 <script src="js/bootstrap.min.js"></script>
</body>
</html>