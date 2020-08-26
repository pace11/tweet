<?php
require_once './autoload.php';
$sentiment = new \PHPInsight\Sentiment();
?>
          <div class="row"> 
                    <section class="col-lg-12">
                     
                         <div class="panel panel-default">   
                        <div class="panel-heading">
                        <h3 class="panel-title"><span class="glyphicon glyphicon-list"></span> Daftar Uji </h3> 
                        </div>
                        <div class="panel-body">
	<table class="table table-bordered table-striped table-condensed flip-content" id="mytablex">
							<thead class="flip-content">
                <tr>
                    <th width="8px">No</th>
		    <th>Keyword</th>
		  
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
			 $query="SELECT * FROM keyword order by `id_keyword` asc ";
		$result= $mysqli->query($query);
		while($d=$result->fetch_assoc())
		 {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
		    <td><?php echo $d["keyword"]; ?></td>
		    <td style="text-align:center" width="200px">
<a href="?page=daftar_uji&aksi=go&key=<?php echo $d["id_keyword"];?>&keyname=<?php echo $d["keyword"];?>" class="btn btn-success btn-xs purple" onclick="javasciprt: return confirm('Are You Sure ?')"><i class="fa fa-refresh"></i> Uji</a>
              
		    </td>
	        </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
			
						<?php if($_GET["aksi"]=="go"){?>	
							<table class="table table-bordered table-striped table-condensed flip-content" id="mytable">
							<thead class="flip-content">
                <tr>
                    <th width="8px">No</th>
		    <th>Tweet</th>
		    <th>Sentiment</th>
		    <th>Nilai</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
			 $query="SELECT * FROM tweets WHERE id_keyword='".$_GET["key"]."' AND status='0' order by `id` asc ";
		$result= $mysqli->query($query);
		// echo '<pre>';
		// print_r($query);
		// echo '</pre>';
		while($tweets=$result->fetch_assoc())
		 {
			 $string=$tweets["tweet"];
	// calculations:
	$scores = $sentiment->score($string);
	$class = $sentiment->categorise($string);

	// output:
	if (in_array("pos", $scores)) {
	    echo "Got positif";
	}


	
	if($class=="positif"){
		$label='<a href="" class="btn btn-success btn-xs purple"><i class="fa fa-search"></i> Positif</a>
';
	}elseif($class=="negatif"){
		$label='
<a href="" class="btn btn-danger btn-xs purple"><i class="fa fa-edit"></i> Negatif</a> 
';}elseif($class=="netral"){
		$label='
<a href="" class="btn btn-warning btn-xs purple"><i class="fa fa-edit"></i> Netral</a> 
';
}
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
		    <td><?php echo $tweets["tweet"]; ?></td>
		    <td><?php echo $label; ?></td>
		    <td width="80px">
<?php
foreach ($scores as $skor) {
		echo $skor;
	}
	$query=$mysqli->query("UPDATE tweets set `status` = '1' WHERE id='$tweets[id]' AND `status` = '0' AND id_keyword='".$tweets["id_keyword"]."'");
	$query=$mysqli->query("INSERT INTO tweet_preprocessing (`Id`,`id_tweet`,`sentimen`,`nilai`,`tanggal`) VALUES ('$Id','".$tweets["id_tweet"]."','$class','$skor',now())");
	?>
              
		    </td>
	        </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
						<?php }?>
	  </div>
		</div>
      </section>
      </div> 