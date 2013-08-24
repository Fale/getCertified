<?php

class TextController
{

	public static function fileToHtml($file)
	{
		$data = file_get_contents($file);
		return TextController::stringToHtml($data);
	}

	public static function stringToHtml($string)
	{
		$html = Michelf\MarkdownExtra::defaultTransform($string);
		return Michelf\SmartyPants::defaultTransform($html);
	}

}