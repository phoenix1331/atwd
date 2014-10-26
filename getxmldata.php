<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Quotes</title>
        <style>
            button {
                position:absolute;
				top:300px;
            }
        </style>
<script type="text/javascript">

function loadXML(){

	var doc="schema2.xml";
	if (window.XMLHttpRequest)
	  {
	  xhttp=new XMLHttpRequest();
	  }
	else // code for IE5 and IE6
	  {
	  xhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	xhttp.open("GET",doc,false);
	xhttp.send();
	xmlDoc = xhttp.responseXML;
	
	function getNodeValue(node,i){
		var val = xmlDoc.getElementsByTagName(node)[i].childNodes[0].nodeValue;
		
		if(val == "undefined"){
			return val;
		}else{
			return "Error";
		}
	}
	
	
	var i = Math.floor(Math.random() * 11) + 1;
    document.getElementById("Source").innerHTML = getNodeValue("source",i);
    document.getElementById("Text").innerHTML = getNodeValue("text",i);
	document.getElementById("Category").innerHTML = xmlDoc.getElementsByTagName("text")[i].getAttribute("category");
    document.getElementById("Dobdod").innerHTML = getNodeValue("dobdod",i);
    document.getElementById("Link").innerHTML = getNodeValue("link",i);
    document.getElementById("Image").src = getNodeValue("image",i);

}
</script>

</head>
<body>

<div><img src="" id="Image" width="50px" /></div>
<div id="Source"></div>
<div id="Category"></div>
<div id="Text"></div>
<div id="Dobdod"></div>
<div id="Link"></div>


<div class="central">
<button type="button" onclick="loadXML()">Update Details </button>

</body>
</html>