<?php

    class Tarefa{
        private $id;
        private $pizza;
        private $acompanhamento;
        private $cliente;
        private $endereco;
        private $bairro;
        private $entregador;
        private $valor;

        public function __get($atributo)
        {
            return $this->$atributo;
        }

        public function __set ($atributo, $valor)
        {
            $this->$atributo = $valor;
        }

    }