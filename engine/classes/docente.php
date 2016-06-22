<?php
	//Declaracao da classe
	//Nome da classe devera ser o nome da tabela respectiva no banco de dados
	class Docente{
		
		//Variaveis da classe
		//Nome das variaveis devem ser de acordo com as colunas da tabela respectiva no bd
		private $id_docente;
		private $nome_docente;
		private $siape_docente;
		private $curso_docente;
		private $email_docente;
		private $efetivo_docente;
				

		//setters
		
		//Funcao que seta uma instancia da classe
		public function SetValues($id_docente, $nome_docente, $siape_docente, $curso_docente, $email_docente, $efetivo_docente){ 
			$this->id_docente = $id_docente; 
			$this->nome_docente = $nome_docente; 
			$this->siape_docente = $siape_docente; 
			$this->curso_docente = $curso_docente; 
			$this->email_docente = $email_docente; 
			$this->efetivo_docente = $efetivo_docente; 
						
		}
		
		
		//Methods
		
		//Funcao que salva a instancia no BD
		public function Create(){
			
			$sql = "
				INSERT INTO docente
						  (
				 			id_docente,
							nome_docente,
							siape_docente,
							curso_docente,
							email_docente,
							efetivo_docente,
							efetivo_docente
						  )  
				VALUES 
					(
						'$this->id_docente',
						'$this->nome_docente',
						'$this->siape_docente',
						'$this->curso_docente',
						'$this->email_docente',
						'$this->efetivo_docente',
						'$this->efetivo_docente'
					);
			";
			
			$DB = new DB();
			$DB->open();
			$result = $DB->query($sql);
			$DB->close();
			return $result;
		}
		
		//Funcao que retorna uma Instancia especifica da classe no bd
		public function Read($id){
			$sql = "
				SELECT
					t1.id_docente,
					t1.nome_docente,
					t1.siape_docente,
					t1.curso_docente,
					t1.email_docente,
					t1.efetivo_docente,
					t1.efetivo_docente
				FROM
					docente AS t1
				WHERE
					t1.id_docente = '$id'

			";
			
			
			$DB = new DB();
			$DB->open();
			$Data = $DB->fetchData($sql);
			
			$DB->close();
			return $Data[0]; 
		}
		
		
		//Funcao que retorna um vetor com todos as instancias da classe no BD
		public function ReadAll(){
			$sql = "
				SELECT
					t1.id_docente,
					t1.nome_docente,
					t1.siape_docente,
					t1.curso_docente,
					t1.email_docente,
					t1.efetivo_docente,
					t1.efetivo_docente
				FROM
					docente AS t1
				

			";
			
			
			$DB = new DB();
			$DB->open();
			$Data = $DB->fetchData($sql);
			$realData;
			if($Data ==NULL){
				$realData = $Data;
			}
			else{
				
				foreach($Data as $itemData){
					if(is_bool($itemData)) continue;
					else{
						$realData[] = $itemData;	
					}
				}
			}
			$DB->close();
			return $realData; 
		}
		
		
		
		
		//Funcao que retorna um vetor com todos as instancias da classe no BD com paginacao
		public function ReadAll_Paginacao($inicio, $registros){
			$sql = "
				SELECT
					t1.id_docente,
					t1.nome_docente,
					t1.siape_docente,
					t1.curso_docente,
					t1.email_docente,
					t1.efetivo_docente,
					t1.efetivo_docente
				FROM
					docente AS t1
					
					
				LIMIT $inicio, $registros;
			";
			
			
			$DB = new DB();
			$DB->open();
			$Data = $DB->fetchData($sql);
			
			$DB->close();
			return $Data; 
		}
		
		//Funcao que atualiza uma instancia no BD
		public function Update(){
			$sql = "
				UPDATE docente SET
				
				  nome_docente = '$this->nome_docente',
				  siape_docente = '$this->siape_docente',
				  curso_docente = '$this->curso_docente',
				  email_docente = '$this->email_docente',
				  efetivo_docente = '$this->efetivo_docente',
				  efetivo_docente = '$this->efetivo_docente'
				
				WHERE id_docente = '$this->id_docente';
				
			";
		
			
			$DB = new DB();
			$DB->open();
			$result =$DB->query($sql);
			$DB->close();
			return $result;
		}
		
		//Funcao que deleta uma instancia no BD
		public function Delete(){
			$sql = "
				DELETE FROM docente
				WHERE id_docente = '$this->id_docente';
			";
			$DB = new DB();
			
			$DB->open();
			$result =$DB->query($sql);
			$DB->close();
			return $result;
		}
		
		
		/*
			--------------------------------------------------
			Viewer SPecific methods -- begin 
			--------------------------------------------------
		
		*/
		
		
		/*
			--------------------------------------------------
			Viewer SPecific methods -- end 
			--------------------------------------------------
		
		*/
		
		
		//constructor 
		
		function __construct(){ 
			$this->id_docente;
			$this->nome_docente;
			$this->siape_docente;
			$this->curso_docente;
			$this->email_docente;
			$this->efetivo_docente;
			$this->efetivo_docente;
			
			
		}
		
		//destructor
		function __destruct(){
			$this->id_docente;
			$this->nome_docente;
			$this->siape_docente;
			$this->curso_docente;
			$this->email_docente;
			$this->efetivo_docente;
			$this->efetivo_docente;
			
			
		}
			
	};

?>