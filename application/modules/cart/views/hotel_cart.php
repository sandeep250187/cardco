<?php  
$this->load->view('home/header');
 ?>
 
 <div class="container" style="padding-top:50px;">
<div class="table-responsive">
<?php 
     if(!empty($items)){ 
?>
          <table class="table table-sm table-bordered">
            <tbody>
              <tr>
                <th>&nbsp;</th>
				<th>Hotel Image</th>
                <th>Hotel Name</th>
                <th>Date/Time</th>
                <th><strong>Description</strong></th>
                <th><strong>No Of Pax / Vehicle</strong></th>
                <th align="right">Per Pax / Vehicle</th>
                <th align="right"><strong class="pull-right">Subtotal</strong></th>
              </tr>
			  <?php  foreach($items as $item){ ?>
              <tr id="remove_<?php echo $item['room_id']; ?>">
			  
                <td>
                  <a class="btn p-1 btn-outline-info btn-sm" onclick="remove('<?php echo $item['room_id']; ?>')"><span aria-hidden="true">×</span></a></td>
				  <td class=""><img src="<?php echo base_url(); ?>uploads/hotelmaster/<?php echo $item['hotel_pic']; ?>" height="80px;" width="80px;"></td>
                  <td class=""><?php echo $item['hotelname'].','.$item['address'].'<br>'.'Room Type &nbsp;'.$item['room_type']; ?></td>
                  <td class="">2017/09/30 (06:30)</td>
                  <td class="">
                    <ul class="mb-0">
                      <li class="product-text"><?php echo $item['description']; ?>  <br>
                      </li>
                    </ul>
                  </td>
                  <td align="center"><!--<input type="number" class="form-control" name="number" id="number">-->
                1 CAR         </td>
                <td>SGD <!--<input type="number" class="form-control" name="number2" id="number2">-->
              42 (Per Vehicle)          </td>
              <td align="right"><strong>MYR
              <?php echo $item['room_price']; ?>          </strong></td>
			  
            </tr>
			  <?php  }}?>
            <tr>
              <th colspan="6" align="right">Total</th>
              <th align="right"><strong> MYR <?php echo (!empty($total))? $total :'' ; ?></strong></th>
			  <th></th>
            </tr>
          </tbody>
        </table>
		<?php 
		     if(!empty($ticket_items))
			  { 
		?>
		<table class="table table-sm table-bordered table-striped table-hover">
            <tbody>
			
              <tr>
                <th>&nbsp;</th>
				<th>Ticket Image</th>
                <th>Ticket Name</th>
                <th>Date/Time</th>
                <th><strong>Description</strong></th>
                <th><strong>No Of Pax</strong></th>
                <th align="right">Price</th>
               
              </tr>
			  <?php 
		        foreach($ticket_items as $item)
				{ 
				?>
                <tr id="remove_<?php echo $item['id']; ?>">
			  
                <td>
                  <a class="btn p-1 btn-outline-info btn-sm" onclick="remove('<?php echo $item['id']; ?>')"><span aria-hidden="true">×</span></a></td>
				  <td class=""><img src="https://uat-api.globaltix.com/api/image?name=<?php echo $item['imagePath']; ?>_thumb"></td>
                  <td class=""><?php echo $item['title']; ?></td>
                  <td class=""><?php echo $item['hoursOfOperation']; ?></td>
                  <td class="">
                    <ul class="mb-0">
                      <li class="product-text"><?php echo $item['description']; ?>  <br>
                      </li>
                    </ul>
                  </td>
                  <td align="center"><?php echo 'N/A'; ?></td>
                
              <td align="right"><strong>MYR
              <?php echo $cprice=$item['adult_price']+$item['child_price']; ?>          </strong></td>
			  
			  
            </tr>
			  <?php  
			  @$ticket_total=$ticket_total+$cprice;
			  }
			     
			  }?>
            <tr>
              <th colspan="6" align="right">Total</th>
              <th align="right"><strong> MYR <?php echo (!empty($ticket_total))? $ticket_total+$total :'' ; ?></strong></th>
			  
            </tr>
          </tbody>
        </table>
		<?php 
		     if(!empty($tour_items))
			  { 
		?>
		<table class="table table-sm table-bordered table-striped table-hover">
            <tbody>
			<h3 align="center">Tour Details</h3>
              <tr>
                <th>&nbsp;</th>
				<th>Tour Image</th>
                <th>Tour Name</th>
                <th>Date/Time</th>
                <th><strong>No Of Pax</strong></th>
                <th align="right">Price</th>
                <th align="right">Subtotal</th>
              </tr>
			  <?php 
			  
		        foreach($tour_items as $item)
				{ 
				?>
                <tr id="rv_tour_<?php echo $item['id']; ?>">
			  
                <td>
                  <!--<a class="btn p-1 btn-outline-info btn-sm" onclick="remove('<?php echo $item['id']; ?>')"><span aria-hidden="true">×</span></a>-->
				  <a class="btn p-1 btn-outline-info btn-sm remove_tour" id="remove_tour" href="javascript:void(0);" ref="<?php echo $item['id'];?>">×</a>
				</td>
				  <td class=""><img src="<?php echo base_url(); ?>uploads/tourname/<?php echo $item['thumbnail']; ?>"></td>
                  <td class=""><?php echo $item['tour_name']; ?></td>
                  <td class=""><?php echo $item['service_date']; ?></td>
                  <td align="center"><?php echo $item['noof_pax']; ?></td>
                
              <td align="right"><strong>MYR
              <?php echo $tprice=$item['tour_price']; ?></strong></td>
			  <td></td>
			  
            </tr>
			  <?php  
			  @$tour_total=$tour_total+$tprice;
			  }
			     
			  }?>
            <tr>
              <th colspan="5" align="right">Total</th>
              <th align="right"><strong> MYR <?php echo (!empty($tour_total))? $tour_total :'' ; ?></strong></th>
			  <th></th>
            </tr>
          </tbody>
        </table>
		<?php 
		     if(!empty($transfer_items))
			  { 
		?>
		<table class="table table-sm table-bordered table-striped table-hover">
            <tbody>
			<h3 align="center">Transfer Details</h3>
              <tr>
                <th>&nbsp;</th>
				<th>Transfer Image</th>
                <th>Transfer Name</th>
                <th>Date/Time</th>
                <th><strong>Description</strong></th>
                <th><strong>No Of Pax</strong></th>
                <th align="right">Price</th>
               
              </tr>
			  <?php 
		        foreach($transfer_items as $item)
				{ 
				?>
                <tr id="remove_<?php echo $item['id']; ?>">
			  
                <td>
                  <a class="btn p-1 btn-outline-info btn-sm" onclick="remove('<?php echo $item['id']; ?>')"><span aria-hidden="true">×</span></a>
				</td>
				  <td class=""><img src="<?php echo base_url(); ?>uploads/tourname/<?php echo $item['thumbnail']; ?>"></td>
                  <td class=""><?php echo $item['tour_name']; ?></td>
                  <td class=""><?php echo $item['service_date']; ?></td>
                  <td class="">
                    <ul class="mb-0">
                      <li class="product-text"><?php echo $item['description']; ?>  <br>
                      </li>
                    </ul>
                  </td>
                  <td align="center"><?php echo $item['noof_pax']; ?></td>
                
              <td align="right"><strong>MYR
              <?php echo $tprice=$item['tour_price']; ?>          </strong></td>
			  
			  
            </tr>
			  <?php  
			  $tour_total=$tour_total+$tprice;
			  }
			     
			  }?>
            <tr>
              <th colspan="6" align="right">Total</th>
              <th align="right"><strong> MYR <?php echo (!empty($tour_total))? $tour_total :'' ; ?></strong></th>
			  
            </tr>
          </tbody>
        </table>
		
		
      </div>
      </div>
<?php  $this->load->view('home/footer'); ?>	
<script type="text/javascript">
var base_url='<?php echo base_url(); ?>';
$(document).ready(function(){
	$(document).on('click','.remove_tour',function(){
		var tid = $(this).attr('ref');
		$.ajax({
			type : 'post',
			data : {id:tid},
			url : base_url+'tours/tours/remove',
			beforeSend: function() {
                        $.preloader.start({
                            modal: true,
                            position: 'center'
                        });
                    },
			success : function(data){
			$.preloader.stop();	
			swal('Tour Removed successfully', '', 'success');
			$('#rv_tour_'+tid).hide();
			remove_cart_tour();
			}
		});
	});
});
function remove_cart_tour()
{
$.ajax({
      url:base_url+'tours/tours/cart_list_tour',
      method:"POST",
      //data:{hotel_id:'1'},
      success:function(data)
      {
		  if(JSON.parse(data).length>0)
		  {
		  $(".shopping-cart-items-tour").empty();
		  $(".badge").html(JSON.parse(data).length);
		  
		  $.each(JSON.parse(data),function(key,value){ 
			    
			    var cart_data_tour='<li class="clearfix"><img src="'+base_url+'uploads/tourname/'+value.thumbnail+'" style="height:80px;width:80px;" alt="item1"/><span class="item-name">'+value.tour_name+'</span><span class="item-price">MYR '+value.tour_price+'</span><span class="item-quantity">Quantity: 01</span></li>';
			
               $(".shopping-cart-items-tour").append(cart_data_tour);
               $("#checkout").show();			   
				   });
				
						
		  }else{
			 $("#checkout").hide();	 
		  }
		 
	  }
	 });	
}



function remove(room_id)
{
	if(room_id!='')
	{
		alert('would you like to remove item from cart');
		$("#remove_"+room_id).hide();
		//$.post({base_url+'hotels/hotels/remove'});
	}
}
</script>