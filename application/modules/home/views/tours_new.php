<?php $this->load->view("header.php");?>


 <div id="fades"></div>
 <div class="text-center" id="load">
  <p>
  <img src="images/loading.gif">
 </p>
 <p>Searching for Tours</p>
 <h4 class="text-primary">Penang, Malaysia</h4>
 <p>Service Date <strong><?php /*echo $_REQUEST['cdate'];*/ ?></strong><!--,  To <strong><?php echo $_REQUEST['cod']; ?></strong>--> </p>
   <p>No Of Pax <strong><?php/* echo $_REQUEST['pax'];*/ ?></strong> <!--, Child <strong><?php echo $_REQUEST['child']; ?></strong>--></p>

 </div>

 
 
        <div class="row banner" id="contents">
            <div class="input">
                <div class="container">
      <form type="search" method="POST" action="" class="searchs">
       <input name="by" type="hidden" value="2"/>
       
       
       
       <ul class="list-inline">
       <li><label>Location :</label>
        <div class="location">
              <select type="search" class="form-control searchbox">
                <option>Penang</option>
              </select>
          </div>
              </li>
			  <li><label>Service Date :</label><div class="dates"><input type="text" class="form-control" id="from-date" name="cdate" value="<?php /* echo $cdt;*/ ?>">
          </div>
          </li>
		
			<li>
                        <label>Type:</label>                   
						<div class="selects"><select name="tt" type="search" class="form-control searchbox">
                         <option value="A" <?php /*if($_REQUEST['tt']=='A') echo 'selected="selected"';*/ ?>>All</option>
						 <option value="Half Day" <?php /*if($_REQUEST['tt']=='Half Day') echo 'selected="selected"'; */ ?>>Half Day</option>	    <option value="Short Tour" <?php /*if($_REQUEST['tt']=='Short Tour') echo 'selected="selected"'; */ ?>>Short Tour</option>		<option value="Full Day" <?php /*if($_REQUEST['tt']=='Full Day') echo 'selected="selected"'; */ ?>>Full Day</option> 
                        </select>
                    </li>

			<li><label>No Of Pax:</label>                     <div class="selects"> <select type="search" name="pax" class="form-control searchbox1">                                                 <?php                           for($i=1;$i<=9;$i++) 
		  {
			  ?>
			     <option value="<?=$i;?>" <?php /* if($pax==$i) echo 'selected="selected"'; */ ?>><?=$i;?></option>
			  <?php
		  }
			  ?>                          
									</select>   </div> </li>

           <li><label>&nbsp;</label>
		   <input type="hidden"  name="id" value="<?php echo $_REQUEST['id']; ?>"/>
              <button type="submit" class="btn btn-primary btn-block btn-search" name="search">Search</button>
              </li>
              </ul>
        </form>
        </div>
    </div>
        </div>
		
        <div class="row bg-grey gap1">
            <div class="container">
                <div class="row">
                 <div class="col-sm-3">
                         <div class="filter shuttle-widget">
                            <!--  <h4 class="text-center">Search Transfer</h4> -->
                            <div class="tops text-center">
                                
                                <div class="new-price text-center"><span style="font-size:smaller;"><?php /* echo $no=mysql_num_rows($sql);*/ ?></span></div>
 <div class="offer">No Of Tours Founds in Penang</div>
                                
                            </div>
                            <h4>Ticket Name</h4>
<ul class="list-unstyled">
       <li>
        <div class="search-icon">
          <input type="text" class="form-control">
      </div>
              </li>             
              </ul>
                        </div>
                    </div>
                    <div class="col-sm-9">
                    <div id="cbp-vm" class="cbp-vm-switcher cbp-vm-view-list">
                        <div class="col-md-7">
                            <ol class="breadcrumb">
                                <li><a href="index.html"><i class="fa fa-home"></i> Apollo Asia Holidays</a></li>
                                <li><a href="#">Tourist Attractions</a></li>
                            </ol>
                        </div>
                        <div class="cbp-vm-options">
                            <a href="#" class="cbp-vm-icon cbp-vm-grid" data-view="cbp-vm-view-grid">Grid View</a>
                            <a href="#" class="cbp-vm-icon cbp-vm-list cbp-vm-selected" data-view="cbp-vm-view-list">List View</a>
                        </div>
                        
                            <div class="row">
<ul>					
                                      <li>
                                        <span class="launch-soon"><?php /*echo  $fetch5['type']; */ ?></span>
										
										<div class="cbp-vm-image"> <div id="" class="owl-carousel " data-slider-id="1">
                                        <a class="item" href="http://supplier.apolloasiab2b.com/transport/tour_pic/<?php /* echo $fetch5['pic']; */ ?>" rel="prettyPhoto" >
                                            <img class="img-responsive" src="http://supplier.apolloasiab2b.com/transport/tour_pic/<?php /* echo $fetch5['pic']; */ ?>" alt="title" />
                                        </a>
                    
                    <?php

                    //$c2=substr($fetch5['pic2'], -1);
//if(!empty($c2))
//{
                    ?>
                                        <a class="item" href="http://supplier.apolloasiab2b.com/transport/tour_pic/<?php /* echo $fetch5['pic2']; */ ?>" rel="prettyPhoto">
                                            <img class="img-responsive" src="http://supplier.apolloasiab2b.com/transport/tour_pic/<?php /* echo $fetch5['pic2']; */ ?>" alt="title" />
                                        </a>
                    
                    
                    <?php
                    
        /*            
}

else
{
  ?>
     
                                        <a class="item" href="http://supplier.apolloasiab2b.com/transport/tour_pic/<?php  echo $fetch5['pic'];  ?>" rel="prettyPhoto">
                                            <img class="img-responsive" src="http://supplier.apolloasiab2b.com/transport/tour_pic/<?php  echo $fetch5['pic'];  ?>" alt="title" />
                                        </a>
  <?php
  
}
?>


      <?php
                    $c3=substr($fetch5['pic3'], -1);
if(!empty($c3))
{
                    ?>
                                        <a class="item" href="http://supplier.apolloasiab2b.com/transport/tour_pic/<?php  echo $fetch5['pic3'];  ?>" rel="prettyPhoto">
                                            <img class="img-responsive" src="http://supplier.apolloasiab2b.com/transport/tour_pic/<?php  echo $fetch5['pic3'];  ?>" alt="title" />
                                        </a>
                    
                    
                    <?php
                    
                    
}

else
{
  ?>
     
                                        <a class="item" href="http://supplier.apolloasiab2b.com/transport/tour_pic/<?php  echo $fetch5['pic'];  ?>" rel="prettyPhoto" title="This is the description">
                                            <img class="img-responsive" src="http://supplier.apolloasiab2b.com/transport/tour_pic/<?php  echo $fetch5['pic'];  ?>" alt="title" />
                                        </a>
  <?php
  
}*/
?>
                   
                                    </div></div>
                                        <div class="cbp-vm-details">							
										
                                            <h5 class="project-name text-uppercase"><!--<a href="tour-details.php?id=<?=$fetch['serviceid'];?>&cin=<?=$_REQUEST['cd'];?>&cout=<?=$_REQUEST['cod'];?>&adult=<?=$_REQUEST['adult'];?>&child=<?=$_REQUEST['child'];?>&type=<?=$_REQUEST['tt'];?>&ttype=<?=$_REQUEST['ttype'];?>">-->
											<?php  echo $fetch5['servicename'];  ?>
											
											<a href="#" data-toggle="modal" data-target="#mymodale<?=$p;?>"><i class="fa fa-info-circle"></i></a>
												
											
											</h5>
											<div class="modal fade" id="mymodale<?=$p;?>">
												<div class="modal-dialog" role="document">
												<div class="modal-content">
												<div class="modal-header">
												  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
												<h4><?php echo  $fetch5['servicename']; ?></h4>
												
												</div>
												<div class="modal-body"><p><?php echo  $fetch5['descrip']; ?></p></div>
												
												</div></div></div>
                                            <p class="location1"><i class="fa fa-map-marker"></i> <?php echo  $fetch5['descrip']; ?></p>
                                            </h3>
                                      
                                        </div>
                                        <div class="call-back">
                                          
                                            <!--<h3 class="price1">MYR  <?php  											if($tt=='PVT')											{												echo $fetch['pr2'];											}											if($tt=='SIC')											{												echo $fetch['r2'];											}											?>
/<small>Per Person</small></h3>
                                            <span class="tiny-text">( Net Price, Inclusive of All taxes )</span>-->
                                           <!-- <a class="cbp-vm-icon btn-sm cbp-vm-add" href="view-details.html"> View Details</a>-->										   <!--<a class="cbp-vm-icon btn-sm cbp-vm-add" href="tour-details-abd.php?id=<?=$fetch['serviceid'];?>&cin=<?=$_REQUEST['cd'];?>&cout=<?=$_REQUEST['cod'];?>&adult=<?=$_REQUEST['adult'];?>&child=<?=$_REQUEST['child'];?>&type=<?=$_REQUEST['tt'];?>&ttype=<?=$_REQUEST['ttype'];?>">Book</a>-->
                                        </div>
                                           <div class="table-responsive">
                                             <div id="a1" class="hidden">
  
  <div class="popover-body">
    <table class="table table-condensed table-bordered small">
     
      <?php
      for($i=0;$i<$night;$i++)
      {
          
 
   
    $new_date = date('Y/m/d', strtotime($_REQUEST['cindate'] . ' +'.$i.' day'));

      ?> <tr>
        <td><?php  
        
         echo date('d-M-Y',strtotime($new_date));
        ?></td><td><small>MYR</small><?php echo number_format($fetch_cat2['room_price']+$fetch_rate['markup'],2);  
                                     ?></td> </tr>
        
      <?php }  ?>
     
      
      
    </table>
  </div>
</div>
        <form name="reservation<?php echo $p; ?>" id="reservation" action="" type="search" method="POST">   
          <table class="table-condensed table table-bordered  no-margin">
            <tbody><tr>
              <th>Service Type</th>
               
              <th>Date</th>
              
			  <th>Adult</th>
			  <th>Child</th>
			   <th>Per Person Price</th>
              <th>Total Price</th>
              <th></th>
            </tr>



<?php $this->load->view("footer.php"); ?>