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
				top:200px;
            }
        </style>
    </head>
<script type="application/javascript">
function loadJSON()
{
   var data_file = "jsondata.json";
   var http_request = new XMLHttpRequest();
   try{
      // Opera 8.0+, Firefox, Chrome, Safari
      http_request = new XMLHttpRequest();
   }catch (e){
      // Internet Explorer Browsers
      try{
         http_request = new ActiveXObject("Msxml2.XMLHTTP");
      }catch (e) {
         try{
            http_request = new ActiveXObject("Microsoft.XMLHTTP");
         }catch (e){
            // Something went wrong
            alert("Your browser broke!");
            return false;
         }
      }
   }
   http_request.onreadystatechange  = function(){
      if (http_request.readyState == 4  )
      {
        // Javascript function JSON.parse to parse JSON data
        var jsonObj = JSON.parse(http_request.responseText);

        // jsonObj variable now contains the data structure and can
        // be accessed as jsonObj.name and jsonObj.country.
		var data = jsonObj.quote;
		console.log(data);
		var i = Math.floor(Math.random() * 11) + 1;
        document.getElementById("Source").innerHTML =  data[i].source;
        document.getElementById("Text").innerHTML = data[i].text;
      }
   }
   http_request.open("GET", data_file, true);
   http_request.send();
}
</script>
<title>Get JSON Data</title>
</head>
<body>
<div id="Source"></div>
<div id="Text"></div>

<div class="central">
<button type="button" onclick="loadJSON()">Update Details </button>
</body>
</html>