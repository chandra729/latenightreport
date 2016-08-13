<?php
$proxies = array(); 

$proxies[] = '192.168.1.5:3128';

if (isset($proxies)) {  
                      
    $proxy = $proxies[array_rand($proxies)];    
}

$ch = curl_init();  

if (isset($proxy)) 
  {  
           curl_setopt($ch, CURLOPT_PROXY, $proxy); 

          if(isset($_GET['id']))
            {  
              $id =$_GET['id'];
              $theurl= $_SERVER['REQUEST_URI'];
              $urlarr = explode("?id=",$theurl);
              $theurl3 = $urlarr[1]."?id=".$urlarr[2];
            // echo $theurl3;
    
               $timeout = 5;
               curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
              curl_setopt($ch, CURLOPT_HEADER, FALSE);
              curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
              curl_setopt($ch, CURLOPT_COOKIESESSION, TRUE);
              curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
              curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
              curl_setopt($ch, CURLOPT_URL, $theurl3);
              //curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    
             $buffer = curl_exec($ch);
	     curl_close($ch);

            if(empty($buffer))
                    {
                          //   return();
                     print "Nothing returned from url.<p>";
                
                     }
       
               else{
                      print $buffer;
                    //  return $buffer;
                     $File = "a.txt"; 
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

        else 
       echo "Please pass some paramter";

  }


?>







   

