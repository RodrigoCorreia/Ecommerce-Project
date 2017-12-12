<?php 

namespace Hcode;

use Rain\TpL;

class Page{

	private $tlp;
	private $options = [];
	private $defaults = [
		"data"=>[]
	];

	public function __construct($opts = array()){

		$this->options = array_merge($this->defaults, $opts);
		// config
		$config = array(
			"tpl_dir"       => $_SERVER["DOCUMENT_ROOT"] . "/views/",
			"cache_dir"     => $_SERVER["DOCUMENT_ROOT"] . "/views-cache",
			"debug"         => false
		);

		Tpl::configure( $config );

		$this->tpl = new Tpl;


		$this->setData($this->options["data"]);

		$this->tpl->draw("header");

	}

	private function setData($data = array()){

		foreach ($data as $key => $value) {
			
			$this->tpl->assing($key,$value);
			
		}		

	}

	public function setTpl($name, $data = array(), $returnHTML = false){

		$this->setData($data);

		return $this->tpl->draw($name, $returnHTML);

	}

	public function __destruct(){

		$this->tpl->draw("footer");

	}

}

 ?>