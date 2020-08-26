<?php
require_once './autoload.php';
$sentiment = new \PHPInsight\Sentiment();
?>
          <div class="row"> 
                    <section class="col-lg-12">
                     
                         <div class="panel panel-default">   
                        <div class="panel-heading">
                        <h3 class="panel-title"><span class="glyphicon glyphicon-list"></span> Data Latih Negatif </h3> 
                        </div>
                        <div class="panel-body">
	
							<table class="table table-bordered table-striped table-condensed flip-content" id="mytable">
							<thead class="flip-content">
                <tr>
                    <th width="8px">No</th>
					
		  
			 <th>Tweet</th>
		    <th>Sentiment</th>
		   
			
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
			 $query="SELECT * FROM datalatih_negatif order by `id` asc ";
		$result= $mysqli->query($query);
		while($tweets=$result->fetch_assoc())
		 {
			 $string=$tweets["tweet"];
	// calculations:
	$nilai = $tweets["nilai"];
	$class ='negatif';

	
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
		   
	        </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
						
	  </div>
		</div>
      </section>
      </div> 