<?php

namespace Helpers;

class JsonWebToken {
	private $secret;
	public function __construct() {
		$this->secret = "k_Jiu-Jitsu_GB72";
	}
	public function createJWT($data) {
		$header = json_encode ( [ 
				"typ" => "JWT",
				"alg" => "HS256"
		] );
		$payload = json_encode ( $data );

		$hbase64 = $this->base64url_encode ( $header );
		$pbase64 = $this->base64url_encode ( $payload );
		$signature = hash_hmac ( "sha256", $hbase64 . "." . $pbase64, $this->secret, true );
		$sbase64 = $this->base64url_encode ( $signature );

		$jwt = $hbase64 . "." . $pbase64 . "." . $sbase64;

		return $jwt;
	}
	public function validateJWT($token) {
		$jwt = explode ( '.', $token );

		if (count ( $jwt ) == 3) {
			$signature = hash_hmac ( "sha256", $jwt [0] . "." . $jwt [1], $this->secret, true );
			$sbase64 = $this->base64url_encode ( $signature );
			if ($sbase64 == $jwt [2]) {
				print_r ( "Validado !!!" );
			} else {
				return false;
			}
		} else {
			return false;
		}
	}
	private function base64url_encode($data) {
		return rtrim ( strtr ( base64_encode ( $data ), '+/', '-_' ), '=' );
	}
	private function base64url_decode($data) {
		return base64_decode ( strtr ( $data, '-_', '+/' ) . str_repeat ( '=', 3 - (3 + strlen ( $data )) % 4 ) );
	}
}
