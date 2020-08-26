<?php
$jml_costumer=$mysqli->query("SELECT id_costumer FROM costumer")->num_rows;
$jml_kategori=$mysqli->query("SELECT id_kategori FROM kategori_produk")->num_rows;
$jml_item=$mysqli->query("SELECT id_produk FROM produk")->num_rows;
$jml_sales=$mysqli->query("SELECT id_penjualan FROM penjualan")->num_rows;
?>
 <!-- Info boxes --
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="ion ion-ios-people-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Positif</span>
              <span class="info-box-number"><?php echo $satu;?></span>
            </div>
          </div>
         
        </div>
       
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-gears"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Negatif</span>
              <span class="info-box-number"><?php echo $dua;?></span>
            </div>
            
          </div>
        
        </div>
      
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-dropbox"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Netral</span>
              <span class="info-box-number"><?php echo $tiga;?></span>
            </div>
           
          </div>
         
        </div>
       
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="ion ion-ios-cart-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total Sales</span>
              <span class="info-box-number"><?php echo $jml_sales;?></span>
            </div>
          
          </div>
         
        </div>
      
      </div>
      <!-- /.row -->
	  		
<div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
 <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Sentimen Analisys</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
			<?php $p1=jmlSentimen(1,"positif");$p2=jmlSentimen(2,"positif");$p3=jmlSentimen(3,"positif");
				$n1=jmlSentimen(1,"negatif");$n2=jmlSentimen(2,"negatif");$n3=jmlSentimen(3,"negatif");
				$nt1=jmlSentimen(1,"netral");$nt2=jmlSentimen(2,"netral");$nt3=jmlSentimen(3,"netral");
			
			?>
			
	  <table class="table table-bordered table-striped table-condensed flip-content" id="mytablex">
							<thead class="flip-content">
                <tr>
                    <th width="8px">No</th>
		    <th>Keyword</th>
			 <th>Negatif</th>
			  <th>Positif</th>
			   <th>Netral</th>
		  
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
		   
	        </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
		</div>
		</div>
		</div>
		
		</div>


