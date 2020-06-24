<?php
//***********
//**** 06/2020 - VITOR AMARAL	
//***********
	
	
class Mysql{
	
		protected $DB_HOST = "mysql669.umbler.com";
		protected $DB_NAME = "db_lojablue";
		protected $DB_USER = "usr_eulbajoj";
		protected $DB_PASS = "L#QAZ#WSX200Lbolu";
		
		
		//CONEXAO
	function Conexao()
	{	
		
		try {
		  	$conn = new PDO('mysql:host='.$this->DB_HOST.';dbname='.$this->DB_NAME, $this->DB_USER, $this->DB_PASS);
		    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		    
		    return $conn;
		    
		} catch(PDOException $e) {
			
			return 'Não foi possível fazer a conexão com o banco de dados';
		    
		}
	

	}
		
		
}



?>