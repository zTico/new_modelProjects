<?php

class TarefaService {

	private $conexao;
	private $tarefa;

	public function __construct(Conexao $conexao, Tarefa $tarefa) {
		$this->conexao = $conexao->conectar();
		$this->tarefa = $tarefa;
	}

	public function inserir() { //create
		$query = 'insert into pedidos(id_pizza, id_acompanhamento, cliente, endereco, id_bairro, id_entregador, valor)values(?,?,?,?,?,?,?)';
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(1, $this->tarefa->__get('pizza'));
		$stmt->bindValue(2, $this->tarefa->__get('acompanhamento'));
		$stmt->bindValue(3, $this->tarefa->__get('cliente'));
		$stmt->bindValue(4, $this->tarefa->__get('endereco'));
		$stmt->bindValue(5, $this->tarefa->__get('bairro'));
		$stmt->bindValue(6, $this->tarefa->__get('entregador'));
		$stmt->bindValue(7, $this->tarefa->__get('valor'));
		$stmt->execute();
	}

	public function recuperar() { //read
		$query = '
		select p.id, pz.sabor, p.cliente, p.endereco, b.nome as "bairro", p.valor
		from pedidos as p
		inner join pizza as pz
		on p.id_pizza = pz.id
		inner join bairro as b
		on p.id_bairro = b.id
		order by id desc';
            
		$stmt = $this->conexao->prepare($query);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}

	public function atualizar() { //update

		$query = "update pedidos set id_pizza = ?, 
		id_acompanhamento = ?, 
		cliente = ?,
		endereco = ?,
		id_bairro = ?,
		id_entregador = ?,
		valor = ?,
		where id = ?;"
		;
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(1, $this->tarefa->__get('nome'));
		$stmt->bindValue(2, $this->tarefa->__get('email'));
		$stmt->bindValue(3, $this->tarefa->__get('cpf'));
		$stmt->bindValue(4, $this->tarefa->__get('id'));
		return $stmt->execute(); 
	}

	public function remover() { //delete

		$query = 'delete from pedidos where id = ?';
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(1, $this->tarefa->__get('id'));
		$stmt->execute();
	}

}

