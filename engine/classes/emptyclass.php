<?php
	//Declaracao da classe
	//Nome da classe devera ser o nome da tabela respectiva no banco de dados
	class NOME_DA_CLASSE{
		
		//Variaveis da classe
		//Nome das variaveis devem ser de acordo com as colunas da tabela respectiva no bd
		private $CAMPODATABELA1;
		private $CAMPODATABELA2;
		private $CAMPODATABELA3;
				

		//setters
		
		//Funcao que seta uma instancia da classe
		public function SetValues($CAMPODATABELA1, $CAMPODATABELA2, $CAMPODATABELA3){ 
			$this->CAMPODATABELA1 = $CAMPODATABELA1;
			$this->CAMPODATABELA2 = $CAMPODATABELA2;
			$this->CAMPODATABELA3 = $CAMPODATABELA3;
						
		}
		
		
		//Methods
		
		//Funcao que salva a instancia no BD
		public function Create(){
			
			$sql = "
				INSERT INTO NOME_DA_TABELA
						  (
				 			CAMPODATABELA1,
							CAMPODATABELA2,
							CAMPODATABELA3
						  )  
				VALUES 
					(
						'$this->CAMPODATABELA1',
						'$this->CAMPODATABELA2',
						'$this->CAMPODATABELA3'
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
					 t1.CAMPODATABELA1,					 
					 t1.CAMPODATABELA2,
					 t1.CAMPODATABELA3
				FROM
					NOME_DA_TABELA AS t1
				WHERE
					t1.CAMPODATABELA1 = '$id'

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
					 t1.CAMPODATABELA1,
					 t1.CAMPODATABELA2,
					 t1.CAMPODATABELA3
				FROM
					NOME_DA_TABELA AS t1
				

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
					 t1.CAMPODATABELA1,
					 t1.CAMPODATABELA2,
					 t1.CAMPODATABELA3
				FROM
					NOME_DA_TABELA AS t1
					
					
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
				UPDATE NOME_DA_TABELA SET
				
				  CAMPODATABELA2 = '$this->CAMPODATABELA2',
				  CAMPODATABELA3 = '$this->CAMPODATABELA3'
				
				WHERE CAMPODATABELA1 = '$this->CAMPODATABELA1';
				
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
				DELETE FROM NOME_DA_TABELA
				WHERE CAMPODATABELA1 = '$this->CAMPODATABELA1';
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
			$this->CAMPODATABELA1;
			$this->CAMPODATABELA2;
			$this->CAMPODATABELA3;
			
			
		}
		
		//destructor
		function __destruct(){
			$this->CAMPODATABELA1;
			$this->CAMPODATABELA2;
			$this->CAMPODATABELA3;
			
			
		}
			
	};

?>