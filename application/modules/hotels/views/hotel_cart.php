<?php  
$this->load->view('home/header');
 ?>
 
 <div class="container" style="padding-top:50px;">
<div class="table-responsive">
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
				  <td class=""><img src="<?php echo base_url(); ?>uploads/hotelmaster/<?php echo $item['hotel_pic']; ?>"></td>
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
			<?php  }?>
            <tr>
              <th colspan="6" align="right">Total</th>
              <th align="right"><strong> MYR <?php echo $total; ?></strong></th>
			  <th></th>
            </tr>
          </tbody>
        </table>
      </div>
      </div>
<?php  $this->load->view('home/footer'); ?>	
<script type="text/javascript">
var base_url='<?php echo base_url(); ?>';
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