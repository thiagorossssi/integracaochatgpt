<?php

namespace Models;

use Core\Model;
use PDOException;

class Openai extends Model {
	public function __construct() {
		parent::__construct ();
	}

    public function getStatusKeyWord($descricao) {
        $countKeyWord = 0;
        $keyWords = [
            'jiu-jitsu',
            'bjj'
        ];
        $explodeDesc = explode(' ', $descricao);

        for($i=0; $i < count($keyWords); $i++) { //FOR PARA PERCORRER O ARRAY DE KEYWORDS
            for($j=0; $j < count($explodeDesc); $j++) { //FOR PARA PERCORRER O ARRAY DO EXPLODEDESC
                if($keyWords[$i] == $explodeDesc[$j]) {
                    $countKeyWord++;
                }
            }
        }

        if($countKeyWord > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getConteudoGeradoOpenAI($conteudo) {
        $OPENAI_API_KEY = '< SUA API KEY OBTIDA EM https://platform.openai.com/account/api-keys >';
        $headers = [
            "Content-Type: application/json",
            "cache-control: no-cache",
            "Authorization: Bearer " . $OPENAI_API_KEY,
        ];
        $data = [
            'model' => 'gpt-3.5-turbo',
            'messages' => [[
                'role' => 'user',
                'content' => $conteudo
            ]],
            'temperature' => 0.75,
            'max_tokens' => 4000
        ];
        $url = 'https://api.openai.com/v1/chat/completions';
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
        $resp = curl_exec($curl);
        curl_close($curl);
        return $resp;
    }
}
