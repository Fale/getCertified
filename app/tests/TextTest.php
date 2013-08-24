<?php

class TextTest extends TestCase {

	public function testH1()
	{
		$string = "# Hi #";
		$this->assertEquals(TextController::stringToHtml($string), "<h1>Hi</h1>\n");
	}

	public function testDots()
	{
		$string = "Text ... Text";
		$this->assertEquals(TextController::stringToHtml($string), "<p>Text &#8230; Text</p>\n");
	}

}