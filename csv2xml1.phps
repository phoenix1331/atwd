<?php

/**
* flat file to XML generator
*
* @author Darren Williams <design@phoenix1331.co.uk>
*
*/

	//Set header
	header('Content-type:text/xml');
	//Get file content
	$file = file('quotes_12.txt');
	
	//Start xml
	$xml = '<quotes>';
	
	$count = count($file); //Count lines
	for($i=1;$i<$count;$i++) { //$i = 1 to prevent pulling in header
		$content = explode('|',$file[$i]); //Array from each line
		$name = explode(' ',$content[1], 2); //Array from name with limit
		$dobdod = explode('-',$content[2]); //Array from dob & dod
		
		$xml .= '<author>';
			$xml .= '<fname>'.$name[0].'</fname>'; //First Name
			$xml .= '<sname>';
				if(isset($name[1])){$xml .= $name[1];} //If set second name
			$xml .= '</sname>'; 
			$xml .= '<dob>'.$dobdod[0].'</dob>'; //DOB
			$xml .= '<dod>'.$dobdod[1].'</dod>'; //DOD
			$xml .= '<link>'.$content[3].'</link>'; //Link
		$xml .= '</author>'; //Close author
		
		$xml .= '<quote><text>'.$content[0].'</text></quote>'; //Quote
		$xml .= '<category><name>' . $content[4] . '</name></category>'; //Category
	}

	$xml .= '</quotes>'; //Wrap up
	echo $xml; //Echo out
	
?>