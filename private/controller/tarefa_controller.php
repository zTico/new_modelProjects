<?php

require "../../private/controller/tarefa.model.php";
require "../../private/controller/tarefa.service.php";
require "../../private/banco/conexao.php";

$acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;

if($acao == 'inserir'){
    $tarefa = new Tarefa();
    $tarefa->__set('pizza', $_POST['pizza']);
    $tarefa->__set('acompanhamento', $_POST['acompanhamento']);
    $tarefa->__set('cliente', $_POST['cliente']);
    $tarefa->__set('endereco', $_POST['endereco']);
    $tarefa->__set('bairro', $_POST['bairro']);
    $tarefa->__set('entregador', $_POST['entregador']);
    $tarefa->__set('valor', $_POST['valor']);

    $conexao = new Conexao();

    $tarefaService = new TarefaService($conexao, $tarefa);
    $tarefaService->inserir();
    header('Location: add.php?inserido=sucesso');

} elseif($acao == 'recuperar') {
    $tarefa = new Tarefa;
    $conexao = new Conexao;
    $tarefaService = new TarefaService($conexao, $tarefa);
    $tarefa = $tarefaService->recuperar();

}elseif($acao == 'remover'){
    $tarefa = new Tarefa();
	$tarefa->__set('id', $_GET['id']);

	$conexao = new Conexao();

	$tarefaService = new TarefaService($conexao, $tarefa);
    $tarefaService->remover();
    header('Location: index.php?pedido=deletado');

} elseif($acao == 'atualizar') {
    var_dump($_POST);
    $tarefa = new Tarefa();
    $tarefa->__set('id', $_GET['id']);
    $tarefa->__set('pizza', $_POST['pizza']);
    $tarefa->__set('acompanhamento', $_POST['acompanhamento']);
    $tarefa->__set('cliente', $_POST['cliente']);
    $tarefa->__set('endereco', $_POST['endereco']);
    $tarefa->__set('bairro', $_POST['bairro']);
    $tarefa->__set('entregador', $_POST['entregador']);
    $tarefa->__set('valor', $_POST['valor']);
    if(!empty($tarefa->__get('pizza') && $tarefa->__get('acompanhamento') && $tarefa->__get('cliente')
    && $tarefa->__get('endereco') && $tarefa->__get('bairro') && $tarefa->__get('entregador') && $tarefa->__get('valor'))){

        $conexao = new Conexao();

        $tarefaService = new TarefaService($conexao, $tarefa);
        $tarefaService->atualizar();
        header('Location: index.php?pedido=atualizado');
} 
}