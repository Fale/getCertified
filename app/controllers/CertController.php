<?php

class CertController extends BaseController {

	public function showProvider($name)
	{
		return TextController::fileToHtml( base_path() . "/data/" . $name . ".md");
	}

}