<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>
	<style type="text/css">
     body{
        background-image: url( '../../images/Slider-background.png');
        background-repeat :no-repeat;
        background-size: 100% 100%;
     }
	 #content {
	 	margin: 150  0  0 450;
	 	width: 500px;
	 }
  	</style>
	<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
	<script type= "text/javascript">
	    function callfunc(name){
	     var  temp = name;
	     $('#container ul').empty();
	     $.ajax({
     	 url:"<?php echo base_url().'/index.php/speach/req_handle'; ?>",
     	 type:'POST',
     	 data:{'type' : temp},
          'success' : function(data){ //probably this request will return anything, it'll be put in var "data"
                    var container = $('#container'); //jquery selector (get element by id)
                    if(data){
                        res = eval("(" + data + ")");
                        var reslen = res.length;
                        var error = "Data not Match";
                        if(reslen === 0 ){
                            $('#container ul').append("<li>" +error+"</li>");
                            //container.html("No Data");
                            } 
                        else{ 
                            $.each(res, function(index, value){   
                            $('#container ul').append("<li>" +value.name+"</li>");
                            }); 
                            }
                    }
                }
	       });
        }
	</script>
</head>
<body>
	<div id="content">
    <marquee behavior="alternate"><p style="color:#61210B"><font size ="5">Say Something....</font></p></marquee>
		<!-- Codes by HTML.am -->
	<input type="text" align='middle' name="username" id ="user"  style="background-color:#F6E3CE;text-align:center;width:530px;height:35px;borderradius:7px;" x-webkit-speech onwebkitspeechchange="callfunc($(this).val()) ;" />
	<div id='container'>
		<ul id= "name-list"></ul>
	</div>
    </div>
</body>
</html>