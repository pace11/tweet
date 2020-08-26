<?php
session_start();
require("../include/notice.php"); 
require("../include/koneksi.php"); 
require("../include/fungsi.php"); 
$u=$_POST["username"];
$p=$_POST["password"];

			$query="SELECT * FROM users WHERE username='$u' AND password='$p'";
		$result= $mysqli->query($query);
		if($result->num_rows>0){
		$data=$result->fetch_assoc();
		$_SESSION["ses_level"]=$data["level"];
		$_SESSION["namalengkap"]=$data["nama_lengkap"];
		$_SESSION["ses_uid"]=$data["username"];
		 echo "<script>document.location='../';</script>";
		}else{
					 echo "<script>document.location='./';</script>";

		
}
		

					/*$json['url_home'] 	= '';
							$json['status']		= 1;

					//echo json_encode($json);*/
?>
