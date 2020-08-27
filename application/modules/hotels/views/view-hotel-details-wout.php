<?php  
$this->load->view('home/header');
 ?>
<script>
function change() {
document.getElementById( "register" ).submit();
}
</script>
 
<link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
<!-- Modal//cartModal -->
<?php //include "cart-item.php"; ?>
<!-- End Cart Modal -->
 
<div class="row page-heads" id="contents">
  <div class="container">
    <form type="search" method="POST" action="" class="searchs col-sm-10 offset-md-1">
      <input name="by" type="hidden" value="1"/>
      <div class="selection clearfix">
        <div class="row">
          <div class="col-sm-3 pr-1 pl-1">
            <div class="styled-select-small">
              <div class="position-absolute"><i class="fa fa-search"></i></div>
              <input type="text" placeholder="Penang" class="form-control" name="">
              
            </div>
          </div>
          <div class="col-sm-2 pr-1 pl-1">
            <div class="styled-select-small">
              <div class="position-absolute"><i class="fa fa-calendar"></i></div>
              <input type="text" id="datepicker" value="<?php if(isset($_SESSION['date']) && $_SESSION['date']!=''){echo $_SESSION['date'];} ?>" class="form-control" name="checkdate"  >
            </div>


          </div>
		<div class="col-sm-2 pr-1 pl-1">
		<div class="styled-select-small">
		<div class="position-absolute"><i class="fa fa-calendar"></i></div>
		<input type="text" id="datepicker1" class="form-control" name="to" value="<?php if(isset($_SESSION['to_date']) && $_SESSION['to_date']!=''){echo $_SESSION['to_date'];} ?>" placeholder="Check-Out-Date" autocomplete="off">
		<b><span class="text-warning" id="date_result"></span></b>
		</div>
		</div>
          <div class="col-sm-2 pr-1 pl-1">
            <div class="styled-select-small">
              <div class="position-absolute"><i class="fa fa-user"></i></div>
              <input type="text" class="form-control" name="" placeholder="2 Room 6 Guest">
            </div>
          </div>
          <div class="col-sm-2 pr-1 pl-1">
            <button type="submit"  name="search" class="btn btn-primary btn-search search-transfer  btn-block"> <i class="fa fa-search"></i> Find Hotel</button>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
<div class="row content">
  <div class="container">
    <div class="row">
      
      <div class="col-sm-8">
	    <?php
		     $hotelid= $this->uri->segment(4);
		     $hotelList = getHotelDetailsById($hotelid);
			 if(!empty($hotelList)){
		?>
        <h2 class="tour-name"> <a href="#">
          <i class="fa fa-building-o"></i> <?php echo $hotelList['hotelname']; ?> <span> <?php echo $hotelList['address'];  ?> </span> </a></h2>
		<?php  
		}  ?>
            
           <div class="bg-secondary pl-4 pr-4 pt-2">
		   <form  name="register" id="register" type="search" method="REQUEST" action="" class="row searchs-details">
              <input name="by" type="hidden" value="2" />
               <div class="col-sm-2 pr-1 pl-1">
                <div class="dates">
                  <input type="text" placeholder="from" value='<?php if(isset($_SESSION['date']) && $_SESSION['date']!=''){echo $_SESSION['date'];} ?>'  class="form-control" id="datepicker1" name="cindate">
                </div>
              </div>
              <div class="col-sm-2 pr-1 pl-1">
                
                <div class="dates">
                  <input type="text" placeholder="to"  value='<?php if(isset($_SESSION['to_date'])&& $_SESSION['to_date']!=''){echo $_SESSION['to_date'];} ?>'  class="form-control" id="datepicker2" name="coutdate">
                </div>
              </div>
              <div class="col-sm-2 pr-1 pl-1">
                 <div class="selects">
                  <select type="search" name="adult" class="form-control searchbox1" required>
					<?php for($i=1;$i<=10;$i++) {?>
					<option value="<?php echo $i ;?>"<?php if(!empty($_SESSION['adult']) && $_SESSION['adult']==$i){echo 'selected="selected"';} ?>><?php echo $i ;?></option>
					<?php }?>
					        </select> 
                </div>
              </div>
              <div class="col-sm-2 pr-1 pl-1">
                <div class="selects">
                  <select type="search" name="child" class="form-control searchbox1">
                      <?php for($i=1;$i<=10;$i++) {?>
					<option value="<?php echo $i ;?>"<?php if(!empty($_SESSION['child']) && $_SESSION['child']==$i){echo 'selected="selected"';} ?>><?php echo $i ;?></option>
					<?php }?>   
					       </select> 
                </div>
              </div>
              <div class="col-sm-2 pr-1 pl-1">
                <select type="search" name="room" class="form-control searchbox1">
                      <?php for($i=1;$i<=10;$i++) {?>
					<option value="<?php echo $i ;?>"<?php if(!empty($_SESSION['room']) && $_SESSION['room']==$i){echo 'selected="selected"';} ?>><?php echo $i ;?></option>
					<?php }?>   
					      </select>
                </div> 
              
              <div class="col-sm-2 pr-1 pl-1">
                <input type="hidden"  name="id"  />
                <input type="hidden"  name="hid"  />
                <button class="btn btn-primary btn-block btn-search" name="search">Search</button>
              </div>
            </form>
				  </div>
          
          
          <div class="price ">
             <div class="row">
              <div class="col-sm-2 pr-1 pl-1">
                <label for="inputEmail">Checkin</label>
                <div class="form-control-static">
                  <strong class="text-primary"><?php
                 // echo date('d M Y',strtotime($_REQUEST['cindate']));
                  
                  ?></strong>
                </div>
              </div>
              <div class="col-sm-2 pr-1 pl-1">
                <label for="inputEmail">Checkout </label>
                <div class="form-control-static">
                  <strong class="text-primary"><?php // echo date('d M Y',strtotime($_REQUEST['coutdate'])); ?></strong>
                </div>
              </div>
              <div class="col-sm-2 pr-1 pl-1">
                <label for="inputEmail">Night</label>
                <div class="form-control-static">
                  <strong class="text-primary"><?php
                  //$start = strtotime($_REQUEST['cindate']);
                 // $end = strtotime($_REQUEST['coutdate']);
                  //echo $night = ceil(abs($end - $start) / 86400);
                  ?></strong>
                </div>
              </div>
              
              <div class="col-sm-2 pr-1 pl-1">
                <label class="">Adult</label>
                <div class="form-control-static">
                  <strong class="text-primary"></strong>
                </div>
              </div>
              <div class="col-sm-2 pr-1 pl-1">
                <label class="">Child</label>
                <div class="form-control-static">
                  <strong class="text-primary"></strong>
                </div>
              </div>
              
              <div class="col-sm-2 pr-1 pl-1">
                <label class="">Room</label>
                <div class="form-control-static">
                  <strong class="text-primary"></strong>
                </div>
              </div>
              </div>
           </div>
		   
		   
          <div class="price-container">
            <h4>Room Details</h4>
			<?php 
			 
				 foreach($bookhotel as $bookhtl){
			   ?>
             <div class="card ">
				<div class="card-body">
			   <h4  class="card-title" data-toggle="modal" data-target="#room-details">  x <?php echo $bookhtl['room_type'].' '."Room";?>  <a class="small" href="#" data-toggle="tooltip" data-placement="bottom" data-html="true" title=" <p>Max 2 Adults </p><p class='no-margin'> Child and extra bed Policy</p>
                <ul>
                  <li>infant 0-3 year(s): stay for free if using existing bedding. Note, if you need a cot there may be an extra charge.</li>
                </ul>"> Capacity: 2 x <i class="fa fa-user"></i> </a>
                </h4>
				<form name="form2" action="" method="POST">
				
				<?php 
				$roomCat = getRoomCategory($bookhtl['room_cat']);
				$p=1;
				if(!empty($roomCat)){	 				
				?>
					<div class="row">
					   <div class="col-sm-1" data-toggle="tooltip" data-placement="top" title="Bed And Breakfast">BB</div>
						 <div class="col-sm-5"><span ><i class="fa fa-gear"></i>
							<a href="#" class="heads text-primary" data-toggle="modal" data-target="#room-details<?php echo $p; ?>"><?php
                          echo $roomCat['roomtype']; ?></a></span><span class="pull-right">20 Rooms Left</span>
						 </div>
						   
						    <!-- Room Details Modal -->
                      <div class="modal fade" id="room-details<?php echo $p; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog modal-dialog2" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title" id="myModalLabel">  <?php  echo $bookhtl['room_type'];  ?></h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                             </div>
                        
                          </div>
                        </div>
                      </div>
                      <!-- Room Details Modal End -->    
						
					<div class="col-sm-6">
					  <span class="prices" ><small>MYR</small>
						<?php
							echo number_format($bookhtl['room_price'],2);
						?>
					  </span>
                      <div id="a1<?php echo $p; ?>" class="d-none popover">
                       
                      </div>
                        <span class="pull-right">
							<span class="prices" data-toggle="popover" data-trigger="hover" data-popover-content="#a1<?php echo $p; ?>" data-placement="top"><small>MYR</small><?php echo $bookhtl['room_price']; ?>
							</span>
                      <button type="button"  onclick="addto_cart('<?php echo $bookhtl['id'].','.$bookhtl['hotel_id'];?>')" name="submit_double" class="btn btn-primary btn-sm"> Add </button>
                     </span>
                  </div>
 	
					</div>
				<?php } ?>
				   </form>
				  </div>
				</div>
			<?php } ?>
          </div>
		
<!------ Include the above in your HEAD tag ---------->



		 </div>
	   </div>
   </div>
</div>
 

<script type="text/javascript">
var base_url='<?php echo base_url(); ?>';
</script>

<?php  $this->load->view('home/footer'); ?>
<script type="text/javascript">
function addto_cart(room_id)
{
	st=room_id.split(',');
	
	 $.ajax({
      url:base_url+'hotels/hotels/hotel_cart',
      method:"POST",
      data:{hotel_id:st[1],room_id:st[0]},
	  beforeSend:function(){
		$.preloader.start({
			modal: true,
			position: 'center'
         });
	},
      success:function(data)
      {
		  swal("Hotel Room Added Successfully","","success");
		  price_total();
		  display_cart();
		  $.preloader.stop();
	  }
	 });
}
function display_cart()
{
$.ajax({
      url:base_url+'hotels/hotels/cart_list',
      method:"POST",
      data:{hotel_id:'1'},
	  
      success:function(data)
      {
		  if(JSON.parse(data).length>0)
		  {
		  $(".shopping-cart-items").empty();
		  $(".badge").html(JSON.parse(data).length);
		  //$(".main-color-text").html(data.total);
		  
		  $.each(JSON.parse(data),function(key,value){
			    
			    var cart_data='<li class="clearfix"><img src="'+base_url+'uploads/hotelmaster/'+value.hotel_pic+'" style="height:80px;width:80px;" alt="item1"/><span class="item-name">'+value.hotelname+'</span><span class="item-price">MYR '+value.room_price+'</span><span class="item-quantity">Quantity: 01</span></li>';
				 //$(".main-color-text").html(value.room_price);
               $(".shopping-cart-items").append(cart_data);
               $("#checkout").show();			   
				   });
				
						
		  }else{
			 $("#checkout").hide();	 
		  }
		 
	  }
	 });	
}
function price_total()
{
	$.ajax({
      url:base_url+'hotels/hotels/room_total',
      method:"POST",
      data:{hotel_id:'1'},
      success:function(data)
      {
		  $(".main-color-text").html(data);
	  }
	});
}
</script>
 
 