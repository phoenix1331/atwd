<?php

/**
* flat file to XML generator
*
* @author Darren Williams <design@phoenix1331.co.uk>
*
*/


	$file = file('quotes_12.txt'); //Get file content
	$count = count($file); //Count lines
	$xml = new SimpleXMLElement('<quotes/>'); //Instatiate new xml object

	for($i=1;$i<$count;$i++) {
		$content = explode('|',$file[$i]); //Array from each line
		$name = explode(' ',$content[1], 2); //Array from name with limit
		$dobdod = explode('-',$content[2]); //Array from dob & dod
		
		$auth = $xml->addChild('author');
		$auth->addChild('fname', $name[0]);
		if(isset($name[1])){ //If set second name to prevent error
			$auth->addChild('sname', $name[1]);
			}
		$auth->addChild('dob',$dobdod[0]);
		$auth->addChild('dod',$dobdod[1]);
		$auth->addChild('link',$content[3]);
		
		$quo = $xml->addChild('quote');
		$quo->addChild('text',$content[0]);
		
		$cat = $xml->addChild('category');
		$cat->addChild('name',$content[4]);
	}
	header('Content-type:text/xml'); //Set header
	echo $xml->asXML(); //Output xml
		
?>