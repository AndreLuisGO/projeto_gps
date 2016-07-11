<?php
	//Declaracao da classe
	//Nome da classe devera ser o nome da tabela respectiva no banco de dados
	class Afastamento{
		
		//Variaveis da classe
		//Nome das variaveis devem ser de acordo com as colunas da tabela respectiva no bd
		private $id_afastamento;
		private $data_afastamento;
		private $observ_afastamento;
		private $id_ocorrencia;
		private $id_docente;
				

		//setters
		
		//Funcao que seta uma instancia da classe
		public function SetValues($id_afastamento, $data_afastamento, $observ_afastamento, $id_ocorrencia, $id_docente){ 
			$this->id_afastamento = $id_afastamento;
			$this->data_afastamento = $data_afastamento;
			$this->observ_afastamento = $observ_afastamento;
			$this->id_ocorrencia = $id_ocorrencia;
			$this->id_docente = $id_docente;
						
		}
		
		
		//Methods
		
		//Funcao que salva a instancia no BD
		public function Create(){
			
			$sql = "
				INSERT INTO afastamento
						  (
				 			id_afastamento,
							data_afastamento,
							observ_afastamento,
							id_ocorrencia,
							id_docente
						  )  
				VALUES 
					(
						'$this->id_afastamento',
						'$this->data_afastamento',
						'$this->observ_afastamento',
						'$this->id_ocorrencia',
						'$this->id_docente'
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
					t1.id_afastamento,
					t1.data_afastamento,
					t1.observ_afastamento,
					t1.id_ocorrencia,
					t1.id_docente
				FROM
					afastamento AS t1
				WHERE
					t1.id_afastamento = '$id'

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
					t1.id_afastamento,
					t1.data_afastamento,
					t1.observ_afastamento,
					t1.id_ocorrencia,
					t1.id_docente
				FROM
					afastamento AS t1
				

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
					tt1.id_afastamento,
					t1.data_afastamento,
					t1.observ_afastamento,
					t1.id_ocorrencia,
					t1.id_docente
				FROM
					afastamento AS t1
					
					
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
				UPDATE afastamento SET
				
				  data_afastamento = '$this->data_afastamento',
				  observ_afastamento = '$this->observ_afastamento',
				  id_ocorrencia = '$this->id_ocorrencia',
				  id_docente = '$this->id_docente'
				
				WHERE id_afastamento = '$this->id_afastamento';
				
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
				DELETE FROM afastamento
				WHERE id_afastamento = '$this->id_afastamento';
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
			$this->id_afastamento;
			$this->data_afastamento;
			$this->observ_afastamento;
			$this->id_ocorrencia;
			$this->id_docente;
			
			
		}
		
		//destructor
		function __destruct(){
			$this->id_afastamento;
			$this->data_afastamento;
			$this->observ_afastamento;
			$this->id_ocorrencia;
			$this->id_docente;
			
			
		}
			
	};

?>