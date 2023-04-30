<?php
namespace Helpers;

class Email {
    public function enviaEmailContato($para, $assunto, $mensagem) {
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= "From: contato@thiagorossi.com.br" . "\r\n";

        mail($para, $assunto, $mensagem, $headers);
    }

    public function enviaEmailSuporte($para, $assunto, $mensagem) {
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= "From: suporte@midathiagorossisplr.com.br" . "\r\n";

        mail($para, $assunto, $mensagem, $headers);
    }

    public function enviaEmailRecuperaSenha($para, $assunto, $mensagem) {
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= "From: suporte@thiagorossi.com.br" . "\r\n";

        mail($para, $assunto, $mensagem, $headers);
    }
}
