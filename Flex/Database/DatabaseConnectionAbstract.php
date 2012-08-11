<?php

	namespace Flex\Database;

	class DatabaseConnectionAbstract
	{
		/**
		 * Data Source Name
		 * Registro que armazena as informações necessárias para fazer a conexão com o banco de dados.
		 * @var String
		 * @access private
		 */
		private $dsn = "";
		
		/**
		 * Server
		 * Endereço do servidor MySQL para conexão
		 * @var String
		 * @access private
		 */
		private $server = "";
		
		/**
		 * Username
		 * Nome de usuario do banco de dados
		 * @var String
		 * @access private
		 */
		private $username = "";
		
		/**
		 * Port
		 * Porta para conexão, padrão estabelecido '3306'
		 * @var int
		 * @access private
		 */
		private $port = 3306;
		
		/**
		 * Password
		 * Senha do usuario do banco de dados
		 * @var String
		 * @access private
		 */
		private $password = "";
		
		/**
		 * Database
		 * Nome do banco atual
		 * @var String
		 */
		private $database = "";
		
		/**
		 * Database Link
		 * Objeto PDO para acesso ao banco de dados
		 * @var \PDO
		 */
		private $_databaseLink = null;
		
		/**
		 * Construtor
		 * 
		 * Gera o DSN e inicia automaticamente a conexão com os parametros passados
		 * 
		 * @param String $server Endereço do servidor
		 * @param String $username Usuario do banco
		 * @param String $password Senha do usuario
		 * @param String $database Nome do banco de dados
		 * @param int $port Porta de conexão
		 */
		public function __construct($server = "", $username = "", $password = "", $database = "", $port = 3306){
			
			if($server != "" && $username != "" && $password != "" && $database != ""){
				$this->dsn = $this->generateDSN($server, $database);
				$this->username = $username;
				$this->password = $password;
				$this->open();				
			}		
			
		}
		
		/**
		 * Generate DSN
		 * 
		 * Gera string DSN para conexão do PDO
		 * 
		 * @param String $server Endereço do servidor
		 * @param String $database Nome do banco de dados
		 * @return String DSN
		 */
		private function generateDSN($server, $database){
			return "mysql:host={$server};dbname={$database}";
		}
		
		/**
		 * Abre a conexão com o banco de dados
		 * @throws \Exception Caso não seja configurado o banco de dados
		 * @throws \PDOException Caso a configuração passada esteja errada
		 */
		public function open(){
			if($this->dsn == "" || $this->username == "" || $this->password == "")
				throw new Exception("Sem configuração do banco de dados");
			
			$this->_databaseLink = new \PDO($this->dsn, $this->username, $this->password);			
		}
	}