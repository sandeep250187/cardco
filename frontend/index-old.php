<?php include "include/header.php"; 
session_start();
$_SESSION['ref']="no";
?>
	<script>

	function getXMLHTTP() { 

			var xmlhttp=false;	

			try{

				xmlhttp=new XMLHttpRequest();

			}

			catch(e)	{		

				try{			

					xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");

				}

				catch(e){

					try{

					xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");

					}

					catch(e1){

						xmlhttp=false;

					}

				}

			}

				

			return xmlhttp;

		}

	

	function getCurrencyCode(strURL,el1)

	{	

	

		var req = getXMLHTTP();		

		if (req) 

		{

			//function to be called when state is changed

			req.onreadystatechange = function()

			{

				//when state is completed i.e 4

				if (req.readyState == 4) 

				{			

					// only if http status is "OK"

					if (req.status == 200)

					{						

						//document.getElementById('cur_code').value=req.responseText;						

					//alert(temp);	

				temp=req.responseText.substring(0,req.responseText.lastIndexOf(","));

				

					el=temp.split(",");

						sel=document.getElementById(el1);

						if(temp.length>0)

						{

						sel.options.length=0;

				 

						//sel.options.add(new Option("Please Select",""));

						for(var i=0; i < el.length; i++)

							{

								var d = el[i];

								var x = d.split("#")[0];

								var y = d.split("#")[1];

								 

								sel.options.add(new Option(x.trim(),y.trim()));

								

							}

						//	if(d.split("#")[1]!='Others')

							//{

							//sel.options.add(new Option("Others","100000"));

							//}

						}

						else

						{

						sel.options.length=0;

						sel.options.add(new Option('Please Select point',''));

						//sel.options.add(new Option("Others","100000"));

						}

					} 

					else 

					{

						alert("There was a problem while using XMLHTTP:\n" + req.statusText);

					}

				}				

			 }			

			req.open("GET", strURL, true);

			//window.open(strURL);

			 req.send(null);

		}

			

	}
</script>
<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$("#city").change(function(){
		var ssa = $(this).val();
		//var ss = $(this).attr('id');
		//var arr = data.split('/');
		
		//alert('type='+ssa);
		
		//alert("roomtype="+roomtype + "hotelid="+hotelid);
		$.ajax({
			type: 'post',
			url: 'find_ccode04.php',
			data: 
			{
				ttype: ssa,
				
			},
			success: function (response){
				 
				
				$('#vehicletype').html(response);
				
				
				//old_property_rents =property_rents;
				/* $('.fix').smint({'scrollSpeed' : 1000, 'mySelector': 'a.colonies_'+property_rents}); */
				
			}
		})
	})
//var ids= $('# room_type_1').val();
//alert('hlo----'+ ids);	

});
	
	
	</script>
	
        <div class="row banner banner1">
        <div class="container">
            <div class="col-sm-8">
                <div class="transfer-search searchs-details">
                    <div>
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#A" data-toggle="tab">Search Transfers</a></li>
                           <!-- <li><a  href="#B" data-toggle="tab">Tours Tickets</a></li>-->
                        </ul>
                        <!-- Tab panes -->
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="A">
                            <form name="input1" action="transfer.php" method="POST">
                                <div class="selection clearfix">
								<?php 	?>
								<div class="row">
									<div class="col-sm-12">
										    
										<label class="radio-inline"><input type="radio" checked="checked" value="false" name="rnd">Round Trip</label>                                       
								 
                                             <label class="radio-inline" id="seat5"><input type="radio" checked="checked" value="true" name="rnd">One-way Only</label> 
                                    </div>
</div>
								 
                                    <div class="row">
                                        <div class="col-sm-3">
                                           <!-- <div class="styled-select-small"> <label>Pattern:</label>
                                                <select name="pattern" required="" class="form-control" >
                                                     <select name="pattern" id="state" style="width:110px;" onchange="getCurrencyCode('find_ccode4.php?q='+this.value,'vehicleid');"> -->
                                                    <!--   <option value="">Select Country</option> 
                                                  <option value="">Transfer Pattern</option>	   <option value="A">Arrival</option>	   <option value="D">Departure</option>	       <option value="I">Internal</option>      
                                                    <option value="Malaysia">Malaysia</option> 
                                                </select>
                                            </div>-->
											
											
											  <div class="styled-select-small"><label>Pickup From:</label>
<div class="selects">
                                               <select name="pf"   class="form-control"   onchange="getCurrencyCode('find_ccode4444.php?q='+this.value,'locationf');" >
		<option value="">Please Select</option>
	    <option value="1">Airport</option>
	    <option value="2">Coach station</option>
		<option value="3">Railway Station</option>
		<option value="4">Hotel</option>
	   	<option value="5">Venue</option>
		<option value="6">Cruise</option>
	    <option value="7">Ferry</option>
	   
      
      </select> 
  </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3"> 
                                          
											
											 <div class="styled-select-small"><label>Pickup Point:</label>
<div class="selects">
                                               <select name="pp" id="locationf" class="form-control"  >
											   
       <option value="">Please Select</option>
 
 
      </select> 
  </div>
                                            </div>

                                        </div>
                                  

                                        <div class="col-sm-3">

                                         
											
											  <div class="styled-select-small"><label>Drop  To:</label>
<div class="selects">
                                               <select name="dt"   class="form-control"   onchange="getCurrencyCode('find_ccode4444.php?q='+this.value,'location');" >
 <option value="">Please Select</option>
		<option value="1">Airport</option>
	    <option value="2">Coach station</option>
		<option value="3">Railway Station</option>
		<option value="4">Hotel</option>
	    <option value="5">Venue</option>
		<option value="6">Cruise</option>
	    <option value="7">Ferry</option>
	   
      
      </select> 
  </div>
                                            </div>

                                        </div>
                                         <div class="col-sm-3"> 

                                          
											
											  
											
											 <div class="styled-select-small">

                                             <label>Drop Point</label>
<div class="selects">
                                                <select name="dp" required="" class="form-control" id="location">

                                                    <option value="">-Select-</option>

                                                     

                                                </select>
                                            </div>

                                            </div>


                                        </div>

  </div>
									
									
									
									
									
									
									<div class="row">
                                       
                                   
									
									
									
									
							 
                                        <!-- <div class="col-sm-3">
                                          
											  <div class="styled-select-small"><label>Transfer Type:</label>

                                                <select name="ttype" required="" class="form-control" id="city" onchange="getCurrencyCode('find_ccode444.php?q='+this.value,'vehicleid');">

                                                    <option value="">Transfer Type</option>
													 <option value="PVT">Private</option>
	                                                 <option value="SIC">Shared</option>
													<option value="HOURLY">Hourly</option>
	        
      

                                                </select>

                                              

                                            </div> 
                                        </div>-->
                                        <div class="col-sm-3" id="seat5">
                                             <div class="styled-select-small">

                                             <label>Adult :</label>
<div class="selects">
                                             <select name="seat" required="" class="form-control"  id="vehicleid">

                                                    <option value="0">-select-</option>

                                                    <!--   <option value="1">1</option> -->

                                                   
                                                    <!-- <option value="13">13</option>-->

                                                </select>
                                            </div>


                                            </div>
                                        </div>
                                        <div class="col-sm-3" id="seat5">
                                             <div class="styled-select-small">
												<label>Child :</label>
<div class="selects">
                                             <select name="vno"  class="form-control" id="vehicletype">

                                                    <option value="0">-select-</option>

                                                    <!--   <option value="1">1</option> -->

                                                   
                                                    <!-- <option value="13">13</option>-->

                                                </select>
                                            </div>


                                            </div>
                                        </div>
                                     
									    
                                        <div class="col-sm-3" id="seat51">
                                            <div class="styled-select-small">

                                             <label>Departure Date:</label>
											 
											 <?php
											 $date1 = date('Y/m/d');
											 ?>
<div class="dates">
                                              <input type="text" id="date_from" class="form-control" value="<?php echo $package_date1=date("d M Y",strtotime($date1.'+1 day'));  ?>" name="cd1" placeholder="Service Date">
</div>
                                            </div>
                                        </div>
                                    <div class="col-sm-3" id="seat51">
                                            <div class="styled-select-small">

                                             <label>Return  Date:</label>
											 
											 <?php
											 $date1 = date('Y/m/d');
											 ?>
<div class="dates">
                                              <input type="text" id="date_to" class="form-control" value="<?php echo $package_date2=date("d M Y",strtotime($date1.'+1 day'));  ?>" name="cd2" placeholder="Service Date">
</div>
                                            </div>
                                        </div>
										
										
                                    </div>
								
									<div class="row text-center">	
										<div class="col-sm-4 col-sm-offset-4"> <br> 
                                        <button type="submit" name="submit" class="btn btn-primary btn-search  btn-block">Search Transfer</button>
                                  
									
									
</div>
                                    </div>
                                    
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="B">
                            <form name="input" action="ticket-search.php" method="POST">
                                <div class="selection clearfix">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="styled-select-small"> <label>Country:</label>
                                                <select name="country" required="" class="form-control" onchange="getCurrencyCode('find_ccode41.php?q='+this.value,'citytk');">
                                                   
                                                    <option value="Singapore">Singapore</option>
                                                    <!--<option value="Malaysia">Malaysia</option>-->
                                                </select>
                                            </div>
                                        </div>
                                       
                                        <div class="col-sm-6">
                                             
                                            <div class="styled-select-small">
                                            <label>City</label>
                                                <select name="city" required="" class="form-control" id="citytk">
                                                    <option value="1">Singapore</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="styled-select-small"> <label>Adult:</label>
                                              
                                                <select name="adult" required="" class="form-control">
                                                    
                                                    <option value="0">1
                                                    </option>
                                                    <option value="1">2
                                                    </option>
                                                    <option value="2">3
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                       
                                        <div class="col-sm-6">
                                            <div class="styled-select-small"> <label>Child:</label>
                                                <select name="child" required="" class="form-control">
                                                    <!--  <option value="">No of Pax</option>-->
                                                    <option value="0">1
                                                    </option>
                                                    <option value="1">2
                                                    </option>
                                                    <option value="2">3
                                                    </option>
                                                   
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="styled-select-small"><label> Service Date:</label>
                                               
                                                <input type="text" name="cd" autocomplete="off" required="" id="mydate1" value="11 Aug 2017" readonly="" class="form-control hasDatepicker">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                           <div class="book-now offer styled-select-small">
                                           <label>&nbsp;</label>
                                       <button type="submit" name="submit" class="btn btn-primary btn-block btn-search">Search Tours</button>
                                        
                                    </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
		 
		 
		  <div class="row">
    <div class="container ">
      <div class="row text-center">
        <h4 class="heading">Hotels, apartments, Homestays and more in Penang </h4>
        <ul class="list-inline property-india">
          <li>
            <div class="div"><img src="http://aatg.work/my/upload/2016-10-24 15:57:33tune.jpg">
              <button class="btn btn-warning btn-xs btn-view" onClick="window.location='hotel-search.php?search=search'">View Details</button>
              <span class="heading">TUNE HOTEL</span></div>
          </li>
          <li>
            <div class="div"><img src="http://aatg.work/my/upload/2016-10-24 10:13:44sentral penanag.jpg">
              <button class="btn btn-warning btn-xs btn-view" onClick="window.location='hotel-search.php?search=search'">View Details</button>
              <span class="heading">SENTRAL GEORGE TOWN</span></div>
          </li><li>
            <div class="div"><img src="http://aatg.work/my/upload/2016-10-24 13:26:33red rock.jpg">
              <button class="btn btn-warning btn-xs btn-view" onClick="window.location='book-hotel1.php'">View Details</button>
              <span class="heading">RED ROCK HOTEL</span></div>
          </li><li>
            <div class="div"><img src="http://aatg.work/my/upload/2016-10-21 18:08:56copthrone orchid.jpg">
              <button class="btn btn-warning btn-xs btn-view" onClick="window.location='hotel-search.php?search=search'">View Details</button>
              <span class="heading">COPTHORNE ORCHID HOTEL</span></div>
          </li><li>
            <div class="div"><img src="http://aatg.work/my/upload/2016-10-24 13:21:27rainbow.jpg">
              <button class="btn btn-warning btn-xs btn-view" onClick="window.location='hotel-search.php?search=search'">View Details</button>
              <span class="heading">RAINBOW PARADISE BEACH RESORT</span></div>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <div class="row trending-projects">
    <div class="container text-center">
      <h1 class="headings">Our Daily Departure Tours </h1>
      <div class="row">
      <?php
       $d=date('Y/m/d');
      ?>
        <div  class="trending">
          <div class="col-sm-3">
            <div class="divs"><a href="tours.php?type=PVT&date_from=<?php echo $d; ?>&adult=2&child=0"><img src="http://aatg.work/sms/myo/upload/2016-07-27 17:38:55heritagetour.jpg"> 
              <h5 class="location-name">PENANG HERITAGE TOUR</h5></a>
             </div>
            </div><div class="col-sm-3">
            <div class="divs"><a href="tours.php?type=PVT&date_from=<?php echo $d; ?>&adult=2&child=0"><img src="http://aatg.work/sms/myo/upload/2016-07-27 17:40:22hillandtemple.jpg"></a>
              <h5 class="location-name">PENANG HILL & TEMPLE TOUR</h5>
             </div>
            </div><div class="col-sm-3">
            <div class="divs"><a href="tours.php?type=PVT&date_from=<?php echo $d; ?>&adult=2&child=0"><img src="http://aatg.work/sms/myo/upload/2016-07-27 17:41:42scenicnight.jpg"></a>
              <h5 class="location-name">PENANG SCENIC NIGHT TOUR</h5>
             </div>
            </div><div class="col-sm-3">
            <div class="divs"><a href="tours.php?type=PVT&date_from=<?php echo $d; ?>&adult=2&child=0"><img src="http://aatg.work/sms/myo/upload/2016-07-27 17:37:46penangcitytour.jpg"></a>
              <h5 class="location-name">PENANG CITY TOUR</h5>
             </div>
            </div>
            
            <!--<div class="col-sm-3">
            <div class="divs"><a href="tours.php"><img src="images/trending4.jpg"> </a>
              <h5 class="location-name">TOURIST ATTRACTIONS</h5>
             </div>
            </div><div class="col-sm-3">
            <div class="divs"><a href="tours.php"><img src="images/trending5.jpg"> </a>
              <h5 class="location-name">TOURIST ATTRACTIONS</h5>
             </div>
            </div><div class="col-sm-3">
            <div class="divs"><a href="list-page.html"><img src="images/trending6.jpg"> </a>
              <h5 class="location-name">TOURIST ATTRACTIONS</h5>
             </div>
            </div>
            
            <div class="col-sm-3">
            <div class="divs"><a href="list-page.html"><img src="images/trending7.jpg"> </a>
              <h5 class="location-name">TOURIST ATTRACTIONS</h5>
             </div>
            </div>-->
          
        </div>
      </div>
      
   
      <h1 class="headings">Pre - Post Event Surprises</h1>
      <div class="row">
        <div  class="trending">
          <div class="col-sm-3">
            <div class="divs"><a href="tours.php"><img src="images/kl.jpg"> </a>
              <h5 class="location-name">KUALA LUMPUR</h5>
             </div>
            </div><div class="col-sm-3">
            <div class="divs"><a href="tours.php"><img src="images/lg.jpg"> </a>
              <h5 class="location-name">LANGKAWI</h5>
             </div>
            </div><div class="col-sm-3">
            <div class="divs"><a href="tours.php"><img src="images/cm.jpg"> </a>
              <h5 class="location-name">CAMEROON HIGHLAND</h5>
             </div>
            </div><div class="col-sm-3">
            <div class="divs"><a href="tours.php"><img src="images/jh.jpg"> </a>
              <h5 class="location-name">JOHOR BAHRU</h5>
             </div>
            </div>
            
            <!--<div class="col-sm-3">
            <div class="divs"><a href="tours.php"><img src="images/trending4.jpg"> </a>
              <h5 class="location-name">TOURIST ATTRACTIONS</h5>
             </div>
            </div><div class="col-sm-3">
            <div class="divs"><a href="tours.php"><img src="images/trending5.jpg"> </a>
              <h5 class="location-name">TOURIST ATTRACTIONS</h5>
             </div>
            </div><div class="col-sm-3">
            <div class="divs"><a href="list-page.html"><img src="images/trending6.jpg"> </a>
              <h5 class="location-name">TOURIST ATTRACTIONS</h5>
             </div>
            </div>
            
            <div class="col-sm-3">
            <div class="divs"><a href="list-page.html"><img src="images/trending7.jpg"> </a>
              <h5 class="location-name">TOURIST ATTRACTIONS</h5>
             </div>
            </div>-->
          
        </div>
      </div>
      
    </div>
  </div>
		
		
        <div class="row builders">
            <div class="container">
            <div class="col-sm-10 col-sm-offset-1">
                <div class="marquee" id="mycrawler2">
                    <ul class="list-inline">
                        <li>
                            <a href="#"><img src="images/c1.jpg"></a>
                        </li>
                        <li>
                            <a href="#"><img src="images/c2.jpg"></a>
                        </li>
                        <li>
                            <a href="#"><img src="images/c3.jpg"></a>
                        </li>
                        <li>
                            <a href="#"><img src="images/c4.jpg"></a>
                        </li>
                        <li>
                            <a href="#"><img src="images/c5.jpg"></a>
                        </li>
                        <li>
                            <a href="#"><img src="images/c6.jpg"></a>
                        </li>
                        <li>
                            <a href="#"><img src="images/c3.jpg"></a>
                        </li>
                    </ul>
                </div>
                </div>
            </div>
        </div>

        <?php include "include/footer.php"; ?>
      
        <!--  <div class="row social text-center ">
    <div class="container">
      <div class="col-md-7 text-right">
       
      </div>
      <div class="col-md-4 text-right small"><br>
        <br>
       </div>
    </div>
  </div> -->
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="js/classie.js"></script>
    <script src="js/parallax.js"></script>
    <script src="js/cbpViewModeSwitch.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip();
    });
    </script>
    <script src="js/crawler.js"></script>
    <script type="text/javascript">
    marqueeInit({
        uniqueid: 'mycrawler2',
        style: {
            'padding': '9px 0 0',
            'width': '100%',
            'background': ' ',
            'border': 'none',
            'color': '#0284cf',
            'font-size': '13px',
        },
        inc: 5, //speed - pixel increment for each iteration of this marquee's movement
        mouse: 'cursor driven', //mouseover behavior ('pause' 'cursor driven' or false)
        moveatleast: 2,
        neutral: 200,
        persist: true,
        savedirection: true
    });
    </script>
    <script>
    $('#nav').affix({
        offset: {
            top: $('.search').height()
        }
    });
    </script>
    <script type="text/javascript">
    function toggleIcon(e) {
        $(e.target)
            .prev('.panel-heading')
            .find(".more-less")
            .toggleClass('glyphicon-plus glyphicon-minus');
    }
    $('.panel-group').on('hidden.bs.collapse', toggleIcon);
    $('.panel-group').on('shown.bs.collapse', toggleIcon);
    </script>
    <script>
    $('#date_from').datepicker({
        inline: true,
        firstDay: 1,
        showOtherMonths: true,
        // dayNamesMin: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
        minDate: '0',
        maxDate: '30/11/2019',
        dateFormat: 'yy/mm/dd',
    });
    $('#date_to').datepicker({
        inline: true,
        firstDay: 1,
        showOtherMonths: true,
        // dayNamesMin: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
        minDate: '0',
        maxDate: '30/11/2019',
        dateFormat: 'yy/mm/dd',
    });
    </script>
</body>

</html>