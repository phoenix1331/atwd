<?php require_once("config/connection.php"); ?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>DSA - Quotes</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <style>
            body {
                padding-top: 50px;
                padding-bottom: 20px;
            }
        </style>
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/main.css">

        <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">DSA - Quotes</a>
        </div>
        <div class="navbar-collapse collapse">
         <!-- <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li class="divider"></li>
                <li class="dropdown-header">Nav header</li>
                <li><a href="#">Separated link</a></li>
                <li><a href="#">One more separated link</a></li>
              </ul>
            </li>
          </ul>-->

        </div><!--/.navbar-collapse -->
      </div>
    </div>


    <div class="container">
		<?php
			##PULLING IN FROM A FILE
			/*$file = file("QSEE/quotes_12.txt");
			$count = count($file);
			$new = array();
			for($i=0;$i<$count;$i++) {
			
				$data = explode('|',$file[$i]);
				foreach($data as $key => $value){
					$new = array(
						"link" => $data[3],
						"quote" => $data[0],
						"date" => $data[2],
						"name" => $data[1]
					);
				}	

			}	*/
			header('Content-type: text/xml');
			//$array = array_map('str_getcsv', file('QSEE/quotes_12.txt'));
			$file = file("QSEE/quotes_12.txt");
			//$count = count($file);
			//$count = count($array);
			//echo $count;
			echo "<pre>" . htmlspecialchars("<Quotes>");
			foreach($file as $line)
			{
				$data = explode("|", $line);
				echo htmlspecialchars("
						<quote>
							<text>".$data[2]."</text>
						<quote>
						");
				//etc...
			}
			echo htmlspecialchars("</Quotes>") . "</pre>";
			
			//print_r($array);
			
			##PULLING IN FROM XML
			echo '<h3>- Pulled in through XML</h3>';
			
			$xml=simplexml_load_file("QSEE/schema.xml");
			$countxml = count($xml);
			$foo = rand(0,2);
			
			$data = '<h2>' . $xml->quote[$foo]->text .'</h2>' . $xml->author[$foo]->fname .' ' . $xml->author[$foo]->sname
			. " <em>(" . $xml->author[$foo]->dob . ' - ' . $xml->author[$foo]->dod . ')</em> - ' . $xml->category[$foo]->name;
			
			echo $data;


			##PULLING IN FROM JSON
			echo '<h3>- Pulled in through JSON</h3>';
			
			$json=file_get_contents("QSEE/json.json");
			$json = json_decode($json,true);
			$ran = rand(0,2);
			
			$bar = '<h2>' . $json['Quotes']['quote'][$ran]['text'] . ' </h2>';
			$bar .= ' - ' . $json['Quotes']['author'][$ran]['fname'] . ' ';
			$bar .= $json['Quotes']['author'][$ran]['sname'] . ' ';
			$bar .= ' <em>(' . $json['Quotes']['author'][$ran]['dob'] . ' - ';
			$bar .= $json['Quotes']['author'][$ran]['dod'] . ')</em> -  ';
			$bar .= $json['Quotes']['category'][$ran]['name'];
			
			echo $bar;
						
		?>
		
		
		<?php
		
		echo '<h3>- Pulled in through MYSQL</h3>';
		
			//FUNCTION TO COUNT QUOTES IN DB
			function countQuotes(){
				$result = mysql_query("
				SELECT *
				FROM quote
				");
				return mysql_num_rows($result);	
			}
			
			function getCategory($qid){
				$result = mysql_query("
				SELECT *
				FROM category
				INNER JOIN category_quote_categories_quote
				ON category.cid = category_quote_categories_quote.s_cid
				WHERE category_quote_categories_quote.d_qid	= '$qid'			
				");
				$row = mysql_fetch_array($result);
				return $row['name'];
			}
			
			//GET COUNT
			$count = countQuotes();
			//GET RAND NUMBER
			$id = rand(1,$count);
			
			//QUERY DB
			$result = mysql_query("
				SELECT *
				FROM quote
				INNER JOIN author
				WHERE quote.fk1_aid = '$id'
			");
			
			//IF NO RESULTS
			if(!$result) {
				echo "nothing in database";
				//IF RESULTS
			}else{
				$row = mysql_fetch_array($result);
					echo "<h2>".$row["text"]."</h2> - ".$row["fname"]." ".$row["sname"].
					" <em>(".$row["dob"]." - ".$row["dod"].") - ".getCategory($row["qid"])."</em><br>";
				} 
				//END ELSE ?>	
				
				
				
				
      <hr>
	  
	  <?php
	  echo '<h3>- Pulled in through JSON</h3>';
			//Compile json
			$json='
			{
				"lists":[
					{"listone":"firstlist"},
					{"listtwo":"secondlist"}
				]
			}';
			//For associative arrays with second parameter set to true
			$json1 = json_decode($json,true);
			//to return stdClass object back remove the true parameter from the method
			$json2 = json_decode($json);
			//Pull from associative array
			echo $json1['lists'][0]['listone'];
			echo '<br>';
			//Pull json object
			echo $json2->lists[1]->listtwo;

	  
	  ?>

      <footer>
       
      </footer>
      </div> <!-- /container -->        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.1.min.js"><\/script>')</script>

        <script src="js/vendor/bootstrap.min.js"></script>

        <script src="js/main.js"></script>

    </body>
</html>
