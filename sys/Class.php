<?php

	class Hospede{

		public $nome;
		public $login;
		public $senha;
		public $email;
		public $endereco;
		public $cidade;
		public $pais;
		public $telefone;
		public $documento;

		public function getDataFromDBWithHosLog($HosLog)
		{
			$data = DBConnection::select("Select * from hospede WHERE HosLog='".$HosLog."'");
			foreach($data as $row)
			{
				$this->nome = $row['HosNom'];
                $this->login= $row['HosLog'];
                $this->senha = $row['HosPas'];
                $this->email = $row['HosEma'];
                $this->endereco = $row['HosEnd'];
                $this->cidade = $row['HosCid'];
                $this->pais = $row['HosPai'];
                $this->telefone = $row['HosTel'];
                $this->documento = $row['HosDoc'];
			}
		}
	}

    class ReservaData{

        public $arriveDate;
        public $leaveDate;
        public $maxSingle=40;
        public $maxCouple=20;
        public $maxLux=10;


    }