<?php
//Get BRS Class
class getBRS_006 {

	var $host = "brs.trilan.ru";
	var $type = "HTML";
	var $encoding = "Windows-1251";
	var $tmc = 2; 	// Socket connect timeout in seconds
	var $tmr = 2; 	// Socket read timeout in seconds
	var $linkURL = "/linkservice.php";

	function set($host,$type,$encoding) { $this->host=$host; $this->type=$type; $this->encoding=$encoding; }

	function get(){

		$postdata = "hostname=".$_SERVER['HTTP_HOST']."&type=".$this->type."&encoding=".$this->encoding.'&uri='.urlencode($_SERVER['REQUEST_URI']);
		$query = $this->query( $this->linkURL, $this->host, $postdata); //."&rnd=".mt_rand(0,10000).mt_rand(0,10000) );
		$fp = @fsockopen( $this->host, '80', $err, $err, $this->tmc ); 
		if ( !$fp ) return "<!-- brs time=".date("Y-m-d H:i:s")." socket error -->";
		@stream_set_timeout ( $fp, $this->tmr ); 
		@fwrite ($fp, $query); $txt = ""; $ctm = mktime();
		do { $txt .= @fread($fp,4096); $leof = @feof($fp);} while ((!$leof) && ((mktime()-$ctm)<$this->tmr));
		@fclose($fp);
		if (!$leof) return "<!-- brs time=".date("Y-m-d H:i:s")." partial -->"; 
		if (!$txt) return "<!-- brs time=".date("Y-m-d H:i:s")." timeout -->";
		$response = substr($txt,0,strpos($txt,"\r\n\r\n")+4);
		if (@preg_match("#Location: (.+)#", $response, $result)) {
			$query = $this->query(@($result[1]),$this->host,$postdata);
			$fp = @fsockopen( $this->host, '80', $err, $err, $this->tmc ); 
			if ( !$fp ) return "<!-- brs time=".date("Y-m-d H:i:s")." socket error -->";
			@stream_set_timeout ( $fp, $this->tmr ); 
			@fwrite ($fp, $query); $txt = ""; $ctm = mktime();
			do { $txt .= @fread($fp,4096); } while ((!@feof($fp)) && ((mktime()-$ctm)<$this->tmr));
			@fclose($fp);
			if (!$txt) return "<!-- brs time=".date("Y-m-d H:i:s")." timeout2 -->";
		}
		if (@preg_match("#404 Not Found#",$txt)) return "<!-- brs time=".date("Y-m-d H:i:s")." 404 -->";
		if (@preg_match_all("#HTTP/\d\.\d 50(\d) .*?\s#",$txt,$mch)) return "<!-- brs time=".date("Y-m-d H:i:s")." 50".$mch[1][0]." -->";
		return substr($txt,strpos($txt,"\r\n\r\n")+4,strlen($txt));

	}

	function query($linkURL,$host,$postdata) {

	   return  "GET ".$linkURL."?".$postdata." HTTP/1.0\r\n"
			 . "Host: ".$host."\r\n"
			 . "Connection: Close\r\n\r\n";
	}

}


// getCPR Class 
class getCPR_006 {

	var $host = "brs.trilan.ru";
	var $type = "HTML";
	var $encoding = "Windows-1251";
	var $tmc = 2; 	// Socket connect timeout in seconds
	var $tmr = 2; 	// Socket read timeout in seconds
	var $linkURL = "/cpr/linkservice.php";

	function set($host,$type,$encoding) { $this->host=$host; $this->type=$type; $this->encoding=$encoding; }

	function get(){

		$postdata = "hostname=".$_SERVER['HTTP_HOST']."&type=".$this->type."&encoding=".$this->encoding.'&uri='.urlencode($_SERVER['REQUEST_URI']);
		$query = $this->query( $this->linkURL, $this->host, $postdata); //."&rnd=".mt_rand(0,10000).mt_rand(0,10000) );
		$fp = @fsockopen( $this->host, '80', $err, $err, $this->tmc ); 
		if ( !$fp ) return "<!-- brs time=".date("Y-m-d H:i:s")." socket error -->";
		@stream_set_timeout ( $fp, $this->tmr ); 
		@fwrite ($fp, $query); $txt = ""; $ctm = mktime();
		do { $txt .= @fread($fp,4096); $leof = @feof($fp);} while ((!$leof) && ((mktime()-$ctm)<$this->tmr));
		@fclose($fp);
		if (!$leof) return "<!-- brs time=".date("Y-m-d H:i:s")." partial -->"; 
		if (!$txt) return "<!-- brs time=".date("Y-m-d H:i:s")." timeout -->";
		$response = substr($txt,0,strpos($txt,"\r\n\r\n")+4);
		if (@preg_match("#Location: (.+)#", $response, $result)) {
			$query = $this->query(@($result[1]),$this->host,$postdata);
			$fp = @fsockopen( $this->host, '80', $err, $err, $this->tmc ); 
			if ( !$fp ) return "<!-- brs time=".date("Y-m-d H:i:s")." socket error -->";
			@stream_set_timeout ( $fp, $this->tmr ); 
			@fwrite ($fp, $query); $txt = ""; $ctm = mktime();
			do { $txt .= @fread($fp,4096); } while ((!@feof($fp)) && ((mktime()-$ctm)<$this->tmr));
			@fclose($fp);
			if (!$txt) return "<!-- brs time=".date("Y-m-d H:i:s")." timeout2 -->";
		}
		if (@preg_match("#404 Not Found#",$txt)) return "<!-- brs time=".date("Y-m-d H:i:s")." 404 -->";
		if (@preg_match_all("#HTTP/\d\.\d 50(\d) .*?\s#",$txt,$mch)) return "<!-- brs time=".date("Y-m-d H:i:s")." 50".$mch[1][0]." -->";
		return substr($txt,strpos($txt,"\r\n\r\n")+4,strlen($txt));

	}

	function query($linkURL,$host,$postdata) {

	   return  "GET ".$linkURL."?".$postdata." HTTP/1.0\r\n"
			 . "Host: ".$host."\r\n"
			 . "Connection: Close\r\n\r\n";
	}

}

?>