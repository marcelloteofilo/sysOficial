<?php
	class Veiculo {
		//Atributos da classe Veículo
		private $idVeiculo;
		private $placa;
		private $capacidadeKg;
		private $capacidadeM3;
		private $ano;
		private $tipo;
		private $uf;
		private $cidade;

		//Método responsável para definir o id do veículo
		public function setIdVeiculo($idVeiculo) {
			$this -> idVeiculo = trim($idVeiculo);
		}

		//Método responsável para obter o id do veículo
		public function getIdVeiculo() {
			return $this -> idVeiculo;
		}

		//Método responsável para definir a placa do veículo
		public function setPlaca($placa) {
			$this -> placa = trim($placa);
		}

		//Método responsável para obter a placa do veículo
		public function getPlaca() {
			return $this -> placa;
		}	

		//Método responsável para definir a capacidade em kg do veículo
		public function setCapacidadeKg($capacidadeKg) {
			$this -> capacidadeKg = trim($capacidadeKg);
		}

		//Método responsável para obter a capacidade em kg do veículo
		public function getCapacidadeKg() {
			return $this -> capacidadeKg;
		}		

		//Método responsável para definir a capacidade em m3 do veículo
		public function setCapacidadeM3($capacidadeM3) {
			$this -> capacidadeM3 = trim($capacidadeM3);
		}

		//Método responsável para obter a capacidade em kg do veículo
		public function getCapacidadeM3() {
			return $this -> capacidadeM3;
		}

		//Método responsável para definir o ano do veículo
		public function setAno($ano) {
			$this -> ano = trim($ano);
		}

		//Método responsável para obter o ano do veículo
		public function getAno() {
			return $this -> ano;
		}

		//Método responsável para definir o tipo do veículo
		public function setTipo($tipo) {
			$this -> tipo = trim($tipo);
		}

		//Método responsável para obter o tipo do veículo
		public function getTipo() {
			return $this -> tipo;
		}

		//Método responsável para definir o tiufpo do veículo
		public function setUf($uf) {
			$this -> uf = trim($uf);
		}

		//Método responsável para obter o uf do veículo
		public function getUf() {
			return $this -> uf;
		}

		//Método responsável para definir o cidade do veículo
		public function setCidade($cidade) {
			$this -> cidade = trim($cidade);
		}

		//Método responsável para obter o cidade do veículo
		public function getCidade() {
			return $this -> cidade;
		}
	}
?>