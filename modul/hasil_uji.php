<?php
require_once './autoload.php';
$sentiment = new \PHPInsight\Sentiment();
?>
          <div class="row"> 
                    <section class="col-lg-12">
                     
                         <div class="panel panel-default">   
                        <div class="panel-heading">
                        <h3 class="panel-title"><span class="glyphicon glyphicon-list"></span> Hasil Uji </h3> 
                        </div>
                        <div class="panel-body">
	<table class="table table-bordered table-striped table-condensed flip-content" id="mytablex">
							<thead class="flip-content">
                <tr>
                    <th width="8px">No</th>
		    <th>Keyword</th>
			 <th>Negatif</th>
			  <th>Positif</th>
			   <th>Netral</th>
		  
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
			<td><?php echo jmlSentimen($d["id_keyword"],"negatif"); ?></td>
			<td><?php echo jmlSentimen($d["id_keyword"],"positif"); ?></td>
			<td><?php echo jmlSentimen($d["id_keyword"],"netral"); ?></td>
		    <td style="text-align:center" width="200px">
<a href="?page=hasil_uji&aksi=go&key=<?php echo $d["id_keyword"];?>&keyname=<?php echo $d["keyword"];?>" class="btn btn-success btn-xs purple"><i class="fa fa-eye"></i> Lihat Detail Hasil</a>
              
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
					
		    <th>Tanggal</th>
			 <th>Tweet</th>
		    <th>Sentiment</th>
			
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
			 $query="SELECT * FROM tweets a JOIN tweet_preprocessing b ON a.id_tweet=b.id_tweet WHERE id_keyword='".$_GET["key"]."' AND status='1' order by a.`id` asc ";
		$result= $mysqli->query($query);
		while($tweets=$result->fetch_assoc())
		 {
			 $string=$tweets["tweet"];
	// calculations:
	$nilai = $tweets["nilai"];
	$class = $tweets["sentimen"];

	
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
		    <td><?php echo WKT($tweets["tanggal"]); ?></td>
			 <td><?php echo $tweets["tweet"]; ?></td>
		    <td><?php echo $label; ?></td>
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