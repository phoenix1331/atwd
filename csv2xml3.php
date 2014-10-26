<?php
 
/**
* flat file to XML/JSON generator v3
* defaults to XML
*
* @author: Darren Williams <design@phoenix1331.co.uk>
* @date: 30th September 2014
*
*/
 
//Set output to JSON in query string to change (i.e ...php?output=json)
if(isset($_GET['output'])){
	$output = $_GET['output'];
}
 
//Link to file
$file = file('quotes_13.txt');
 
	//Get file content
	if($file != false){ 
		$count = count($file); //Count lines
		$xml = new SimpleXMLElement('<quotes/>'); //Instatiate new XML object
 
		for($i=1;$i<$count;$i++) {
			//Create array from each line
			$content = explode('|',$file[$i]); 
			//Build XML
			$ent = $xml->addChild('quote');
			$ent->addChild('source', $content[1]);
			$ent->addChild('dobdod', $content[2]);
			$ent->addChild('link',$content[3]);
			$text = $ent->addChild('text',$content[0]);
			$text->addAttribute('category',$content[5]);
			$ent->addChild('image',$content[4]);
		}
		
		//Set XML
		$xml = $xml->asXML(); 
			
			if($output == 'json'){
				//output JSON
				$xml = simplexml_load_string($xml);
				$json = json_encode($xml);
				header ("Content-Type: application/json"); //Set header
				echo $json;
			}else{
				//Output XML
				header('Content-type:text/xml'); //Set header
				echo $xml; 
			}
	}else{
		//Error fallback
		echo 'File not found !';
	}
	
?>