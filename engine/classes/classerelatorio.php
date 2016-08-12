<?php
// Declaracao da classe
// Nome da classe devera ser o nome da tabela respectiva no banco de dados
class ClasseRelatorio {
	
	// Variaveis da classe
	// Nome das variaveis devem ser de acordo com as colunas da tabela respectiva no bd
	
	private $nome_docente;
	private $siape_docente;
	private $dt_inicio_afastamento;
	private $dt_fim_afastamento;
	private $tipo_ocorrencia;
	private $codigo_ocorrencia;
	
	// setters
	
	// Funcao que seta uma instancia da classe
	public function SetValues($nome_docente,$siape_docente, $dt_inicio_afastamento, $dt_fim_afastamento, $tipo_ocorrencia, $codigo_ocorrencia) {
		$this->nome_docente = $nome_docente;
		$this->siape_docente = $siape_docente;
		$this->dt_inicio_afastamento = $dt_inicio_afastamento;
		$this->dt_fim_afastamento = $dt_fim_afastamento;
		$this->tipo_ocorrencia = $tipo_ocorrencia;
		$this->codigo_ocorrencia = $codigo_ocorrencia;
	}
	
	// Methods
	
	// Funcao que salva a instancia no BD

	/*
	 * --------------------------------------------------
	 * Viewer SPecific methods -- begin
	 * --------------------------------------------------
	 *
	 */
	// Funcao que retorna um vetor com as instancias da classe no BD relacionados ao $id do Docente
	
	
	public function ReadAllReport($mes,$ano,$id_docente) {
		$sql = "
		SELECT
			t1.nome_docente AS nome_docente,
			t1.siape_docente AS siape_docente,
			t2.dt_inicio_afastamento AS dt_inicio_afastamento,
			t2.dt_fim_afastamento AS dt_fim_afastamento,
			t2.observ_afastamento AS observ_afastamento,
			t3.tipo_ocorrencia AS tipo_ocorrencia,
			t3.codigo_ocorrencia AS codigo_ocorrencia
		FROM 
			((`docente` `t1` 
		LEFT JOIN
			`afastamento` `t2` on((`t1`.`id_docente` = `t2`.`id_docente`))) 
		LEFT JOIN 
			`ocorrencia` `t3` on((`t2`.`id_ocorrencia` = `t3`.`id_ocorrencia`)))
		WHERE 
			(
				(
					(month(`t2`.`dt_inicio_afastamento`) = $mes
				) OR
				(
				month(`t2`.`dt_fim_afastamento`) = $mes)
				) AND
				(
					(year(`t2`.`dt_inicio_afastamento`) = $ano
				) OR
				(
					year(`t2`.`dt_fim_afastamento`) = $ano)
				)
			) AND
			t1.id_docente =$id_docente
			
			";
	
		$DB = new DB ();
		$DB->open ();
		$Data = $DB->fetchData ( $sql );
		$realData;
		if ($Data == NULL) {
			$realData = $Data;
		} else {
				
			foreach ( $Data as $itemData ) {
				if (is_bool ( $itemData ))
					continue;
					else {
						$realData [] = $itemData;
					}
			}
		}
		$DB->close ();
		var_dump($realData);
		return $realData;
		
	}
	
	
	/*
	 * --------------------------------------------------
	 * Viewer SPecific methods -- end
	 * --------------------------------------------------
	 *
	 */
	
	// constructor
	function __construct() {
		$this->nome_docente;
		$this->siape_docente;
		$this->dt_inicio_afastamento;
		$this->dt_fim_afastamento;
		$this->tipo_ocorrencia;
		$this->codigo_ocorrencia;
	}
	
	// destructor
	function __destruct() {
		$this->nome_docente;
		$this->siape_docente;
		$this->dt_inicio_afastamento;
		$this->dt_fim_afastamento;
		$this->tipo_ocorrencia;
		$this->codigo_ocorrencia;
	}
}
;

?>
