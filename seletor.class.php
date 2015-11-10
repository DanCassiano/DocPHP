<?php 

	/**
	* Seletor
	*/
	class Seletor
	{
		
		private $arquivo = null;

		private $indiceDasFuncoes = null;

		function __construct( )
		{
			
		}

		public function abreArquivo( $arquivo )
		{	
			if( !file_exists( $arquivo ))
				die("Arquivo nao encontrado");

			$arquivoLeitura = fopen( $arquivo , 'r', FILE_SKIP_EMPTY_LINES);

			while(!feof($arquivoLeitura))
			{
				//Mostra uma linha do arquivo
				$linha = fgets($arquivoLeitura, 1024);
				$this->arquivo[] = $linha;
			}

			fclose( $arquivoLeitura );

			$this->percorreLinhas();

			foreach ($this->indiceDasFuncoes as $ind => $local ) {
				echo $this->arquivo[ $local ];
			}

		}

		private function percorreLinhas()
		{
			foreach ($this->arquivo as $indice => $linha) {
				if( $this->temFuncao( $linha  )){
					$this->indiceDasFuncoes[] = $indice;					
				}
			}

		}

		public function getArquivo()
		{
			return $this->arquivo;
		}

		public function temIniComentario( $texto )
		{
			if( strpos( $texto, '/**'))
				return true;

			return false;
		}

		public function temFimComentario( $texto )
		{
			if( strpos( $texto, '*/'))
				return true;

			return false;
		}

		public function temFuncao( $texto )
		{
			if( strpos( $texto, 'function') && strpos( $texto, "("))
				return true;

			return false;
		}
	}