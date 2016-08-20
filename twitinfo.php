<?php

function get_data($url) 
         {
	   $ch = curl_init();
	   $timeout = 5;

  	   curl_setopt($ch, CURLOPT_URL, $url);
           curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	   curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
	  //$data = curl_exec($ch);
           $buffer = curl_exec($ch);
	   curl_close($ch);
	 //  return $buffer;
           if(empty($buffer))
                {
               //   return();
                  print "Nothing returned from url.<p>";
               
                  }
       
          else{
          print $buffer;
          //  return $buffer;
           $File = "twitdata.html"; 
           $Handle = fopen($File, 'w')or die("can't open file");
           $Data = $buffer; 
           fwrite($Handle, $Data); 
           echo "<br>";
           print "Following Data Added";
            echo "<br>"; 
           return $buffer;
           fclose($Handle); 

              }
    

        }
if(isset($_GET['id']))
{  
    $id =$_GET['id'];
    $theurl= $_SERVER['REQUEST_URI'];
    $urlarr = explode("?id=",$theurl);
    $theurl3 = $urlarr[1]."?id=".$urlarr[2];



   //  $returned_content = get_data('http://localhost/attacker/Injection/inject3.php?id=5%20UNION%20Select%20*%20from%20two;');
        
//      $returned_content = get_data();

       $returned_content = get_data($theurl3);
       echo $returned_content;
}
else 
echo "Please pass some paramter";

?>




