<?php
	if(isset($_POST['time'])){
	    session_start();
	   
	
	    $time = $_POST['time'];
	
	    if($time=="")
	    {
		$time=0;
	    }
	
	    else{
		$_SESSION['time8']=$time-1;
		
		header("Location:slide9.php");
	    }
	}
	else{
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Slide 1</title>
        
        <link rel="stylesheet" type="text/css" href="css/slide.css" />
        
        <script type="text/javascript">
            function disable_enable(){
                if (document.all || document.getElementById){
                    if (document.slide.nxt.disabled==true){
                        document.slide.nxt.disabled=false
                        document.slide.sam.disabled=true
                        document.slide.diff.disabled=true
		    }
                }
            }
            
            //For Timer
		
            var t, c = <?php if(isset($_POST['time'])){echo $time;} else{echo "0";} ?>;
            function StartTimer()
            {
		document.getElementById('timer').value=c;
		c=c+1;
		t=setTimeout("StartTimer()",10);
            }
        
            function StopTimer()
            {
		document.getElementById('time').value=c;

		clearTimeout(t);
		c = 0;
            }
	    
	    function loadXMLDoc()
            {
                var xmlhttp;

                if (window.XMLHttpRequest)
                {// code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp=new XMLHttpRequest();
                }

                else
                {// code for IE6, IE5
                    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
                }
                
                xmlhttp.onreadystatechange=function()
                {
                    if (xmlhttp.readyState==4 && xmlhttp.status==200)
                    {
                        document.getElementById("myDiv").innerHTML=xmlhttp.responseText;
                    }   
                }
                xmlhttp.open("POST","test.php",true);
                xmlhttp.send();
            }
        </script>
    </head>
    
    <body onload = "StartTimer()">
        <form name="slide" action="slide8.php" method="post">
            <div class="slide">
		<p style="width: auto;
			  height: auto;
			  font-size: 20px;
			  margin: 0 10px 0 500px;
			  padding: 0;
			  color: black">
			8/12
		</p>
                <div class="letter">
                    <div class="block">
                        F
                    </div>
                    
                    <div class="block" id="hid" style="visibility: hidden">
                        g
                    </div>
		    
		    <div id="myDiv" class="myDiv">
		    </div>
		    
		    <script type="text/javascript">
			function showIt() {
			    document.getElementById("hid").style.visibility = "visible";
			}
			setTimeout("showIt()", 500); // after 1 sec
		    </script>
                </div>
            
                <?php
			include ("button.php");
		?>
            </div>
        </form>
    </body>
</html>
<?php } ?>