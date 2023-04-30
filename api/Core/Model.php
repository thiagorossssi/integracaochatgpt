<?php

namespace Core;

use PDO;

class Model {
	protected $db;
	public function __construct() {
		global $config;

		$this->db = new PDO ( $config ['driver'] . ":dbname=" . $config ['dbname'] . ";host=" . $config ['host'] . ";charset=" . $config ['charset'], $config ['dbuser'], $config ['dbpass'], array (
				PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
				PDO::ATTR_PERSISTENT => false,
				PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4 COLLATE utf8mb4_unicode_ci"
		) );
	}
}
