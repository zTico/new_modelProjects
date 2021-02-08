<?php
$acao = null;
require "../../private/controller/tarefa_controller.php"; 
function recuperar($column) { 
	$query = "
		select 
			*
		from 
		$column
			
		";
	$conexao = new Conexao;
	$stmt = $conexao->conectar()->prepare($query);
	$stmt->execute();
	return $stmt->fetchAll(PDO::FETCH_OBJ);
}

function inserido($id) { 
	$query = "
    select pz.sabor, a.nome, p.cliente, p.endereco, b.nome,e.nome, p.valor
from pedidos as p
inner join pizza as pz
on p.id_pizza = pz.id
inner join acompanhamento as a
on p.id_acompanhamento = a.id 
inner join bairro as b
on p.id_bairro = b.id
inner join entregador as e
on p.id_entregador = e.id
where p.id = $id";
	$conexao = new Conexao;
	$stmt = $conexao->conectar()->prepare($query);
	$stmt->execute();
  return $stmt->fetchAll(PDO::FETCH_OBJ); 
   
}
