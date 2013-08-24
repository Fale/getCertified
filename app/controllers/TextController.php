<?php

class TextController
{
	public static function stringToHtml($string)
	{
		$html = Michelf\MarkdownExtra::defaultTransform($string);
		return Michelf\SmartyPants::defaultTransform($html);
	}
}