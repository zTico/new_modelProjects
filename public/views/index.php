<?php 
$acao='recuperar';
require "tarefa_controller.php";
 ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
 <meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <title>Divina Pizzaria</title>

 <link href="../css/bootstrap.min.css" rel="stylesheet">
 <link href="../css/style.css" rel="stylesheet">
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
    <a class="navbar-brand" href="#">Divina Pizzaria</a>
   </div>
   <div id="navbar" class="navbar-collapse collapse">
    <ul class="nav navbar-nav navbar-right">
     <li><a href="#">Pedidos pendentes</a></li>
     <li><a href="index.php">Inicio</a></li>
    
    </ul>
   </div>
  </div>
 </nav>

 <div id="main" class="container-fluid" style="margin-top: 50px">
 
 	<div id="top" class="row">
		<div class="col-sm-3">
			<h2>Todos os pedidos</h2>
		</div>
		<div class="col-sm-6">
			
			<div class="input-group h2">
				<input name="data[search]" class="form-control" id="search" type="text" placeholder="Pesquisar Pedidos">
				<span class="input-group-btn">
					<button class="btn btn-primary" type="submit">
						<span class="glyphicon glyphicon-search"></span>
					</button>
				</span>
			</div>
			
		</div>
		<div class="col-sm-3">
			<a href="add.php" class="btn btn-primary pull-right h2">Novo pedido</a>
		</div>
	</div> <!-- /#top -->
 	<hr />

	 <?php if(isset($_GET['pedido']) && $_GET['pedido'] == 'deletado'){ ?>
		<div class="alert alert-danger" role="alert">
		Deletado com sucesso!
		</div>
		 <?php } ?>

 	<div id="list" class="row">
	
	<div class="table-responsive col-md-12">
		<table class="table table-striped" cellspacing="0" cellpadding="0">
			<thead>
				<tr>
					<th>ID</th>	
					<th>Sabor</th>
					<th>Cliente</th>
					<th>Endereço</th>
					<th>Bairro</th>
					<th>Valor</th>
					<th class="actions">Ações</th>
				</tr>
			</thead>
			<tbody>
			<?php foreach ($tarefa as $key => $value){ ?>

			<tr>
					<td><?= $value->id ?></td>
					<td><?= $value->sabor ?></td>
					<td><?= $value->cliente ?></td>
					<td><?= $value->endereco ?></td>
					<td><?= $value->bairro ?></td>
					<td><?= $value->valor ?></td>
					<td class="actions">
						<a class="btn btn-success btn-xs" href="view.html">Visualizar</a>
						<a class="btn btn-warning btn-xs" href="edit.php?id=<?= $value->id ?>">Editar</a>
						<a class="btn btn-danger btn-xs deletee" href="tarefa_controller.php?acao=remover&id=<?= $value->id ?>" data-toggle="modal" data-target="#delete-modal">Excluir</a>
					</td>
				</tr>
			<?php } ?>	

			</tbody>
		</table>
	</div>
	
	</div> <!-- /#list -->
	
	<div id="bottom" class="row">
		<div class="col-md-12">
			<ul class="pagination">
				<li class="disabled"><a>&lt; Anterior</a></li>
				<li class="disabled"><a>1</a></li>
				<li><a href="#">2</a></li>
				<li><a href="#">3</a></li>
				<li class="next"><a href="#" rel="next">Próximo &gt;</a></li>
			</ul><!-- /.pagination -->
		</div>
	</div> <!-- /#bottom -->
 </div> <!-- /#main -->

<!-- Modal -->
<div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="modalLabel">Excluir Item</h4>
      </div>
      <div class="modal-body">
        Deseja realmente excluir este item?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Sim</button>
	<button type="button" class="btn btn-default" data-dismiss="modal">N&atilde;o</button>
      </div>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script> (function ($){
    $(document).ready(function(){
        $('a.deletee').click(function(e)
        {
            e.preventDefault();
            if (window.confirm('Tem certeza que quer deletar o registro?')) {
                return window.location.href = $(this).attr('href');
            }
        })
    });
})(jQuery);
 </script>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>