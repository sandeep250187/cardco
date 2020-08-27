<?php include "include/header.php"; ?>
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

						sel.options.add(new Option('Please Select',''));

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
	
        <div class="row banner banner1">
            <div class="col-sm-8 col-sm-offset-2">
                <div class="transfer-search">
                    <div>
                        <ul class="nav nav-tabs nav-justified">
                            <li class="active"><a href="#A" data-toggle="tab">Transfers</a></li>
                            <li><a  href="#B" data-toggle="tab">Tours Tickets</a></li>
                        </ul>
                        <!-- Tab panes -->
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="A">
                            <form name="input1" action="transfer-list.php" method="POST">
                                <div class="selection clearfix">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="styled-select-small"> <label>Pattern:</label>
                                                <select name="pattern" required="" class="form-control" >
                                                    <!-- <select name="pattern" id="state" style="width:110px;" onchange="getCurrencyCode('find_ccode4.php?q='+this.value,'vehicleid');"> -->
                                                    <!--   <option value="">Select Country</option>-->
                                                  <option value="">Transfer Pattern</option>	   <option value="A">Arrival</option>	   <option value="D">Departure</option>	       <option value="I">Internal</option>      
                                                    <!-- <option value="Malaysia">Malaysia</option>-->
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6"> 
                                            <div class="styled-select-small"><label>Transfer Type:</label>
                                                <select name="ttype" required="" class="form-control" id="city" onchange="getCurrencyCode('find_ccode444.php?q='+this.value,'vehicleid');">
                                                    <option value="">Transfer Type</option>													 <option value="P">Private</option>	   <option value="S">Shared</option>	   <option value="H">Hourly</option>	              
                                                </select>
                                              
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="styled-select-small"><label>Pickup From:</label>
                                               <select name="pfa" id="city5" class="form-control"    >       <option value="">Please Select</option>	   <option value="1">Airport</option>	    <option value="2">Coach station</option>		<option value="3">Railway Station</option>	               </select> 
                                            </div>
                                        </div>
                                        <div class="col-sm-6" id="seat5">
                                            <div class="styled-select-small"><label>Drop To:</label>
                                               <select name="dta" id="city5" class="form-control"  onchange="getCurrencyCode('find_ccode30.php?q='+this.value,'locationf');" >       <option value="">Please Select</option>	   <option value="1">Hotel</option>	   	   <option value="2">Venue</option>       </select> 
                                            </div>
                                        </div>
                                    </div>
									
									
									
									
									
									
									
									
									
									
									
									 <div class="row">

                                        <div class="col-sm-6" id="seat51">

                                            <div class="styled-select-small">

                                             <label>No Of Seat / Vehicle</label>

                                                <select name="pax" required="" class="form-control" id="vehicleid">

                                                    <option value="0">Please Select Seat</option>

                                                    <!--   <option value="1">1</option> -->

                                                    <option value="2">2</option>

                                                    <option value="3">3</option>

                                                    <option value="4">4</option>

                                                    <option value="5">5</option>

                                                    <option value="6">6</option>

                                                    <option value="7">7</option>

                                                    <option value="8">8</option>

                                                    <option value="9">9</option>

                                                    <option value="10">10</option>

                                                    <option value="11">11</option>

                                                    <option value="12">12</option>

                                                    <!-- <option value="13">13</option>-->

                                                </select>

                                            </div>

                                        </div>

                                        <div class="col-sm-6">

                                           

                                            <div class="styled-select-small">

                                             <label>Service Date:</label>

                                                <input type="text" name="cd" autocomplete="off" required="" id="mydate" value="11 Aug 2017" readonly="" class="form-control hasDatepicker">

                                            </div>

                                        </div><div class="col-sm-12 text-center"><br><div class="book-now offer">

                                        <button type="submit" class="btn btn-primary  btn-search">Search Transfer</button>

                                    </div></div>

                                    </div>
									
									
									
									
									
									
									
									
									
									
									
									
									
									
									
									
									
									
									
									
									
									
									
									
									
									
									
									
                                    <div class="row">
                                        <div class="col-sm-6" id="seat51">
                                            <div class="styled-select-small">
                                             <label>No Of Seat / Vehicle</label>
                                                <select name="pax" required="" class="form-control" id="vehicleid">
                                                    <option value="0">Please Select Seat</option>
                                                    <!--   <option value="1">1</option> -->
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                    <option value="7">7</option>
                                                    <option value="8">8</option>
                                                    <option value="9">9</option>
                                                    <option value="10">10</option>
                                                    <option value="11">11</option>
                                                    <option value="12">12</option>
                                                    <!-- <option value="13">13</option>-->
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                           
                                            <div class="styled-select-small">
                                             <label>Service Date:</label>
                                                <input type="text" name="cd" autocomplete="off" required="" id="mydate" value="11 Aug 2017" readonly="" class="form-control hasDatepicker">
                                            </div>
                                        </div><div class="col-sm-12 text-center"><br><div class="book-now offer">
                                        <button type="submit" class="btn btn-primary  btn-search">Search Transfer</button>
                                    </div></div>
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
                                       <button type="submit" class="btn btn-primary btn-block btn-search">Search Tours</button>
                                        
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
        <div class="row builders">
            <div class="container">
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
        </div><?php include "include/footer.php"; ?>
      
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