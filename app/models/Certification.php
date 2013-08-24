<?php

class Certifiation {

	#
	## Constructors
	#
	public function __constructor($name, $provider) {
		$this->name = $name;
		$this->provider = $provider;
	}

	#
	# Sets and Gets
	# 
	public function setName($data) { $this->name = $data; }
	public function getName() {	return $name; }
	public function setProvider($data) { $this->provider = $data; }
	public function getProvider() { return $provider; }
	public function setFile($data) { $this->file = $data; }
	public function getFile() { return $file; }

	#
	## Data
	#
	protected $name;
	protected $provider;
	protected $file;
}