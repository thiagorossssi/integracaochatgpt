<?php

namespace Controllers;

use Models\Openai;

class GetController {
    public function index() {}

    public function getStatusKeyWord() {
        $o = new Openai();
        $descricao = filter_input(INPUT_POST, 'descricao', FILTER_DEFAULT);
        $getStatusKeyWord = $o->getStatusKeyWord($descricao);
        echo json_encode($getStatusKeyWord);
    }
    
    public function getConteudoGeradoOpenAI() {
        $o = new Openai();
        $conteudo = filter_input(INPUT_POST, 'conteudo', FILTER_DEFAULT);
        $getConteudoGeradoOpenAI = $o->getConteudoGeradoOpenAI($conteudo);
        echo json_encode($getConteudoGeradoOpenAI);
    }
}
