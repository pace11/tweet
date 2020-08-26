<?php
function rand_string( $length ) {
	$chars = "0123456789";	

	$size = strlen( $chars );
	for( $i = 0; $i < $length; $i++ ) {
		$str .= $chars[ rand( 0, $size - 1 ) ];
	}

	return $str;
}
function jmlSentimen($id,$sentimen){
	global $mysqli;
$d1=$mysqli->query("SELECT count(*) as jml  FROM tweets a JOIN tweet_preprocessing b ON a.id_tweet=b.id_tweet WHERE id_keyword='".$id."' AND sentimen='$sentimen'")->fetch_assoc();
return $d1["jml"];
}
function angkrebaru($table,$pegawai_id){
			global $mysqli;
$d1=$mysqli->query("SELECT sum(tim_penilai3) as jml  FROM ".$table." WHERE  status_spmk<4 AND pegawai_id='".$pegawai_id."'")->fetch_assoc();
return $d1["jml"];
			}
function select($tb,$primary){
	
	$selectArg="select * from `".$tb."` ";
	$selectDB=mysql_query($selectArg);
			$d=mysql_fetch_array($selectDB);
 $d[$field];
return $d[$field];
	
}

function rupiah($angka) {
	$rupiah="";
	$rp=strlen($angka);
	while ($rp>3) {
		$rupiah = ".". substr($angka,-3). $rupiah;
		$s		= strlen($angka) - 3;
		$angka	= substr($angka,0,$s);
		$rp		= strlen($angka);
	}
	$rupiah = "Rp." . $angka . $rupiah . ",00-";
	return $rupiah;
}
function angka($angka) {
	$rupiah="";
	$rp=strlen($angka);
	while ($rp>3) {
		$rupiah = ".". substr($angka,-3). $rupiah;
		$s		= strlen($angka) - 3;
		$angka	= substr($angka,0,$s);
		$rp		= strlen($angka);
	}
	$rupiah = $angka . $rupiah ;
	return $rupiah;
}
function WKT($sekarang){
$tanggal = substr($sekarang,8,2)+0;
$bulan = substr($sekarang,5,2);
$tahun = substr($sekarang,0,4);

$judul_bln=array(1=> "Januari", "Februari", "Maret", "April", "Mei","Juni", "Juli", "Agustus", "September","Oktober", "November", "Desember");
$wk=$tanggal." ".$judul_bln[(int)$bulan]." ".$tahun;
return $wk;
}
?>
<?php
function BAL($tanggal){
	$arr=split(" ",$tanggal);
	if($arr[1]=="Januari"){$bul="01";}
	else if($arr[1]=="Februari"){$bul="02";}
	else if($arr[1]=="Maret"){$bul="03";}
	else if($arr[1]=="April"){$bul="04";}
	else if($arr[1]=="Mei"){$bul="05";}
	else if($arr[1]=="Juni"){$bul="06";}
	else if($arr[1]=="Juli"){$bul="07";}
	else if($arr[1]=="Agustus"){$bul="08";}
	else if($arr[1]=="September"){$bul="09";}
	else if($arr[1]=="Oktober"){$bul="10";}
	else if($arr[1]=="November"){$bul="11";}
	else if($arr[1]=="Nopember"){$bul="11";}
	else if($arr[1]=="Desember"){$bul="12";}
return "$arr[2]-$bul-$arr[0]";	
}
function getName($tb,$primary,$parameter,$field){
	global $mysqli;
	$selectArg="select * from `".$tb."` where `".$primary."`='$parameter'";
	$selectDB=mysqli_query($mysqli,$selectArg);
			$d=mysqli_fetch_assoc($selectDB);
 $d[$field];
return $d[$field];
}
function getNameKey($tb,$primary,$parameter,$id,$field,$kd_semester){
	global $mysqli;
	$selectArg="select * from `".$tb."` where `".$primary."`='$parameter' AND pegawai_id='$id' AND semester_id='$kd_semester'";
	$selectDB=mysqli_query($mysqli,$selectArg);
			$d=mysqli_fetch_assoc($selectDB);
 $d[$field];
return $d[$field];
}
function getNameSum($tb,$primary,$parameter,$id,$field,$kd_semester){
	global $mysqli;
	$selectArg="select sum($field) as jml from `".$tb."` where `".$primary."`='$parameter' AND pegawai_id='$id' AND semester_id='$kd_semester'";
	$selectDB=mysqli_query($mysqli,$selectArg);
			$d=mysqli_fetch_assoc($selectDB);
return $d["jml"];
}
function cmb_dinamis($name,$table,$field,$pk,$selected,$option=NULL){
    global $mysqli;
    $cmb = "<select name='$name' class='form-control' id='$name'>";
	if($option!=""){ $cmb .="<option value=''>-- $option --</option>";}
	 $query="SELECT * FROM $table";
		$result= $mysqli->query($query);
    while($d=$result->fetch_assoc()){
        $cmb .="<option value='".$d["$pk"]."'";
        $cmb .= $selected==$d["$pk"]?" selected='selected'":'';
        $cmb .=">".  strtoupper($d["$field"])."</option>";
    }
    $cmb .="</select>";
    return $cmb;  
}
function terlambat($tgl_dateline, $tgl_kembali) {

$tgl_dateline_pcs = explode ("-", $tgl_dateline);
$tgl_dateline_pcs = $tgl_dateline_pcs[2]."-".$tgl_dateline_pcs[1]."-".$tgl_dateline_pcs[0];

$tgl_kembali_pcs = explode ("-", $tgl_kembali);
$tgl_kembali_pcs = $tgl_kembali_pcs[2]."-".$tgl_kembali_pcs[1]."-".$tgl_kembali_pcs[0];

$selisih = strtotime ($tgl_kembali_pcs) - strtotime ($tgl_dateline_pcs);

$selisih = $selisih / 86400;

if ($selisih>=1) {
	$hasil_tgl = floor($selisih);
}
else {
	$hasil_tgl = 0;
}
return $hasil_tgl;
}

//getName('tb_anggota','id_anggota',$hasil[id_anggota],'nama')//penggunaaanya
function kode($tabel, $digit, $kolom, $pre) {
		$urut = @mysql_result(@mysql_query("SELECT mid(".$kolom.",-".$digit.")+1 FROM ".$tabel." order by ".$kolom." DESC limit 0,1"),0,0);
		$max  = $digit - strlen($urut);
		$no_kode = $pre;
		for ($i=1;$i<=$max;$i++) {
			//if($urut=="") {
				$no_kode .= "0";
			//}
		}
		$no_kode .= $urut;
		return $no_kode;
	}
	
	//$id_anggota = kode('tb_anggota',5,'id_anggota','ANG'); //penggunaannya
		//$id_anggota = kode('tb_anggota',5,'id_anggota','ANG'); //penggunaannya
function getKode($table, $param, $kode,$a1,$a2) {
@$today = date("Ymd");

global $mysqli;
	$qri = "SELECT MAX($param) AS last FROM $table where $param like '%$today%'";
	$hsl = $mysqli->query($qri);
	$row = $hsl->fetch_array();
$lastNo = $row["last"];
$custom_code =$kode;
$code=$kode.$today;
// baca nomor urut Pengajuan dari id Pengajuan terakhir
//SM-20170517 002 (11,3)
$lastNoUrut = substr($lastNo, $a1, $a2); 

// nomor urut ditambah 1
$nextNoUrut = $lastNoUrut + 1;

// membuat format nomor Pengajuan berikutnya
$no_nota = $code.sprintf('%0'.$a2.'s', $nextNoUrut);
		return $no_nota;
	}

	
	

//fungsi multiple select yang telah terpilih
function multipleSelected($x, $y) {
	$p = explode(",",$x);
	foreach($p as $page){
		if($y==$page)
		return 'selected';	
	}
}

//fungsi multiple select yang telah terpilih
function multipleCheckedted($x, $y) {
	$p = explode(",",$x);
	foreach($p as $page){
		if($y==$page)
		return 'checked';	
	}
}

function multipleCheckedtedLike($x, $y) {
	$p = explode(",",$x);
	foreach($p as $page){
		if($y==$page)
		return 'checked';	
	}
}


//fungsi multiple select yang baru akan dipilih
function multipleSelect($x) {
	if($x) {
		$no = 1; $text = null;
		foreach ($x as $t){
			if($no==1)
				$t = "$t";
			else
				$t = ",$t";
			$text .= $t;
			$no++;
		}
		return $text;
	}
}

function hitung_umur($tanggal_lahir,$date2) {
	date_default_timezone_set('Asia/Jakarta');
 $date1=$tanggal_lahir;
    //$date2=date("Y-m-d");
    $datetime1 = new DateTime($date1);
    $datetime2 = new DateTime($date2);
    $difference = $datetime1->diff($datetime2);
    $months=$difference->days/30;
	return (int) round($months);

//return $diff->m;
}
     function hitung_umurx($date1, $date2)
    {
    $diff =  $date1->diff($date2);

    $months = $diff->y * 12 + $diff->m + $diff->d / 30;

    return (int) round($months);
    }
	
	
# Fungsi untuk membalik tanggal dari format Indo (d-m-Y) -> English (Y-m-d)
function InggrisTgl($tanggal){
	$tgl=substr($tanggal,0,2);
	$bln=substr($tanggal,3,2);
	$thn=substr($tanggal,6,4);
	$tanggal="$thn-$bln-$tgl";
	return $tanggal;
}

# Fungsi untuk membalik tanggal dari format English (Y-m-d) -> Indo (d-m-Y)
function IndonesiaTgl($tanggal){
	$tgl=substr($tanggal,8,2);
	$bln=substr($tanggal,5,2);
	$thn=substr($tanggal,0,4);
	$tanggal="$tgl-$bln-$thn";
	return $tanggal;
}

function IndonesiaTgl2($tanggal){
	$tgl=substr($tanggal,8,2);
	$bln=substr($tanggal,5,2);
	$thn=substr($tanggal,0,4);
	$tanggal="$tgl/$bln/$thn";
	return $tanggal;
}


//require './libraries/phpmailer/PHPMailerAutoload.php';
function senMailx($from,$to,$to_name,$subject,$message){
	$body             = eregi_replace("[\]",'',$message);
// Menambahkan atau menginclude auto load PHPMailer
//require 'libraries/phpmailer/PHPMailerAutoload.php';

// Membuat instance PHPMailer
//Create a new PHPMailer instance
$mail = new PHPMailer;
 
//Tell PHPMailer to use SMTP
$mail->isSMTP();
 
//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 2;
 
//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';
 
//Set the hostname of the mail server
$mail->Host = 'smtp.gmail.com';
// use
// $mail->Host = gethostbyname('smtp.gmail.com');
// if your network does not support SMTP over IPv6
 
//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 587;
 
//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'tls';
 
//Whether to use SMTP authentication
$mail->SMTPAuth = true;
 
//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = "akh.sandri@gmail.com";
 
//Password to use for SMTP authentication
$mail->Password = "rahasiaakh";
 
//Set who the message is to be sent from
$mail->setFrom('sandri.wcs@gmail.com', $from);
 
//Set an alternative reply-to address
//$mail->addReplyTo('@gmail.com', 'First Last');
 
//Set who the message is to be sent to
$mail->addAddress($to, $to_name);
 
//Set the subject line
$mail->Subject = $subject;
 
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
$mail->msgHTML($body);
 
//Replace the plain text body with one created manually
$mail->AltBody = 'This is a plain-text message body';
 
//Attach an image file
//$mail->addAttachment('images/phpmailer_mini.png');
 
//send the message, check for errors
if (!$mail->send()) {
    $return="Mailer Error: " . $mail->ErrorInfo;
} else {
    $return= "Message sent!";
}
return $return;
}
?>