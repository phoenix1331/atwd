<?php

/**
* XML DOM to HTML output via PHP
*
* @author: Darren Williams <design@phoenix1331.co.uk>
* @date: 8th October 2014
*
*/

	$domSrc = file_get_contents('schema2.xml');
	$quotes = new DomDocument();
	$quotes->preserveWhiteSpace = FALSE;
	$quotes->loadXML( $domSrc );
	$quotes = $quotes->getElementsByTagName('quotes');
echo '<table>';
$arr = array();
//Create array out of node values and names
foreach($quotes as $node){
    foreach($node->childNodes as $child) {
		foreach($child->childNodes as $quo) {
		
			$arr[$quo->nodeName][] = $quo->nodeValue ;
		
		}
    }
}


foreach($arr as $arrays){
echo $arrays;
foreach($arrays as $key => $value){
	$i = 0;
	//echo $key . ' - ' . $value[0] . '<br />';
	$i++;
}

}
//var_dump($arr);





/***************************************************/
    // $arr[$child->nodeName] = $child->nodeValue ;
     //var_dump($child);
	 //echo $child->nodeName.'<br />';
    /* if($child->nodeName == 'image'){
         echo '<img src="'.$child->nodeValue.'" width="50px" /><br />';
    }
    
    //Output text
    if($child->nodeName == 'text'){
         echo 'Quote: '.$child->nodeValue.'<br />';
    }
    
     if($child->nodeName == 'dobdod'){
         echo 'Date: '.$child->nodeValue.'<br /><br />';
    }*/
    
  
    
        //echo $child->nodeName." - ".$child->nodeValue;
//Loop through for each entry

		/*echo '<tr>';
		echo '<td>'.$quote->getElementsByTagName('source')->item(0)->nodeValue.'</td>';
		echo '<td>'.$quote->getElementsByTagName('image')->item(0)->nodeValue.'</td>';
		echo '<td>'.$quote->getElementsByTagName('dobdod')->item(0)->nodeValue.'</td>';
		echo '<td>'.$quote->getElementsByTagName('link')->item(0)->nodeValue.'</td>';
		echo '<td>'.$quote->getElementsByTagName('text')->item(0)->nodeValue.'</td>';
		echo '</tr>';*/

		
	/*$i = rand(0,11);
	//Get Values
	$source = $quote->getElementsByTagName('source')->item($i)->nodeValue;
	$image = $quote->getElementsByTagName('image')->item($i)->nodeValue;
	$dobdod = $quote->getElementsByTagName('dobdod')->item($i)->nodeValue;
	$link = $quote->getElementsByTagName('link')->item($i)->nodeValue;
	$quo = $quote->getElementsByTagName('text')->item($i)->nodeValue;
	$text = $quote->getElementsByTagName('text');
	$category = $text->item($i)->getAttribute('category');
	
	//Create output
	$output .= '<p><img src="'.$image.'" width="50px" /><br>';
    $output .= 'Author - <a href="'.$link.'">'.$source.'</a><br>';
	$output .= 'Dob - Dod - '.$dobdod.'<br>';
	$output .= 'Category - '.$category.'<br>';
	$output .= 'Quote - '.$quo.'<br></p>';*/
	


//Echo output
//echo $output;
//echo '</table>';
?>