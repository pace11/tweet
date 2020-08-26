<?php session_start();
include"include/notice.php";

if($_SESSION["ses_uid"]==""){
			echo "<script>document.location='login';</script>";
}
include"include/fungsi.php";
include"include/koneksi.php";

include"header.php";
include"include/bukaprogram.php";
include"footer.php";
?>