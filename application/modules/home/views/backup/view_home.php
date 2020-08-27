<?php  
$this->load->view('home/header');
?>
<div class="row slider">
    <div id="carousel-example" class="carousel slide carousel-fade" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#carousel-example" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example" data-slide-to="1"></li>
            <li data-target="#carousel-example" data-slide-to="2"></li>
        </ol>
        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <div class="carousel-item active"> <img src="<?php echo base_url(); ?>assets/images_home/banner.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption ">
                    <a href="#"> Enjoy up to 65% off with member-only rates. Tell me more</a>
                </div>
            </div>
            <div class="carousel-item"> <img src="<?php echo base_url(); ?>assets/images_home/banner1.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption ">
                    <a href="#">  Enjoy up to 65% off with member-only rates. Tell me more</a>
                </div>
            </div>
            <div class="carousel-item"> <img src="<?php echo base_url(); ?>assets/images_home/banner2.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption ">
                    <a href="#">  Enjoy up to 65% off with member-only rates. Tell me more</a>
                </div>
            </div>
            <div class="carousel-item"> <img src="<?php echo base_url(); ?>assets/images_home/banner3.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption ">
                    <a href="#">  Enjoy up to 65% off with member-only rates. Tell me more</a>
                </div>
            </div>
            <div class="carousel-item"> <img src="<?php echo base_url(); ?>assets/images_home/banner4.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption ">
                    <a href="#">  Enjoy up to 65% off with member-only rates. Tell me more</a>
                </div>
            </div>
            <div class="carousel-item"> <img src="<?php echo base_url(); ?>assets/images_home/banner5.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption ">
                    <a href="#">  Enjoy up to 65% off with member-only rates. Tell me more</a>
                </div>
            </div>
        </div>
        <div class="search-box">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 offset-md-1">
                        <div class="transfer-search">
                            <div class="col-md-8 offset-md-2 p-0">
                                <ul class="nav nav-tabs nav-fill" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a href="<?php echo base_url();?>hotels" class="nav-item nav-link active" data-toggle="tab"><i class="fa fa-hotel"></i><span class="d-none d-sm-block"> Hotel</span></a>
                                    </li>
                                    <!-- <li class="nav-item">
                                        <a href="#flights" class="nav-item nav-link" data-toggle="tab"><i class="fa fa-plane"></i> <span class="d-none d-sm-block">Flight</span></a>
                                    </li> -->
                                    <li class="nav-item">
                                        <a href="#cruise" class="nav-item nav-link" data-toggle="tab"><i class="fa fa-ship"></i> <span class="d-none d-sm-block">Cruise</span></a>
                                    </li>
                                     <li class="nav-item">
                                        <a href="#tours" class="nav-item nav-link" data-toggle="tab"><i class="fa fa-home"></i> <span class="d-none d-sm-block">Tours</span></a>
                                    </li>
                                   <li class="nav-item">
                                        <a href="<?php echo base_url();?>transfer" class="nav-item nav-link" data-toggle="tab"><i class="fa fa-car"></i> <span class="d-none d-sm-block">Transfers</span></a>
                                    </li> 
                                   <!--  <li class="nav-item">
                                        <a href="#package" class="nav-item nav-link" data-toggle="tab"><i class="fa fa-suitcase"></i> <span class="d-none d-sm-block">Packages</span></a>
                                    </li> -->
                                    <li class="nav-item">
                                        <a href="#activities" class="nav-item nav-link" data-toggle="tab"><i class="fa fa-ticket"></i> <span class="d-none d-sm-block">Activities</span></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-content" id="myTabContent">
                                <!-- Tab panes -->
                                <div class="tab-pane fade show active" id="hotel" role="tabpanel" aria-labelledby="hotel-tabs">
                                    <form class="form_hotel" id="form_hotel" method="POST" action="<?php echo base_url(); ?>hotels">
                                        <input name="by" type="hidden" value="1"/>
                                        <div class="selection clearfix">
                                            <div class="row">
                                                <div class="col-sm-3 pr-1 pl-1">
                                                    <div class="styled-select-small">
                                                        <div class="position-absolute"><i class="fa fa-search"></i></div>
                                                        <input type="text" placeholder="Where are you going?" class="form-control" name="place">
                                                        
                                                    </div>
                                                </div>
                                                <div class="col-sm-3 pr-1 pl-1">
                                                    <div class="styled-select-small">
                                                        <div class="position-absolute"><i class="fa fa-calendar"></i></div>
                                                        <input type="text" id="datepicker" class="form-control" name="from"   placeholder="Date" autocomplete="off">
                                                    </div>
                                                </div>
                                                <div class="col-sm-3 pr-1 pl-1">
                                                    <div class="styled-select-small">
                                                        <div class="position-absolute"><i class="fa fa-user"></i></div>
                                                        <input type="text" class="form-control" name="roomGuest" placeholder="2 Room 6 Guest">
                                                    </div>
                                                </div>
                                                <div class="col-sm-3 pr-1 pl-1">
                                                    <button type="submit"  name="search" class="btn btn-primary btn-search search-transfer  btn-block"> <i class="fa fa-search"></i> Find Hotel</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!--<div class="tab-pane fade" id="flights" role="tabpanel" aria-labelledby="flights-tabs">
                                    <form name="input1" action="transfer-list.php" method="POST">
                                        <div class="selection clearfix">
                                            <div class="row">
                                                <div class="col-sm-3 pr-1 pl-1">
                                                    <div class="styled-select-small">
                                                        <div class="position-absolute"><i class="fa fa-search"></i></div>
                                                        <input type="search" placeholder="Departure City" class="form-control" name="">
                                                    </div>
                                                </div>
                                                <div class="col-sm-3 pr-1 pl-1">
                                                    <div class="styled-select-small">
                                                        <div class="position-absolute"><i class="fa fa-search"></i></div>
                                                        <input type="search" placeholder="Destination" class="form-control" name="">
                                                    </div>
                                                </div>
                                                <div class="col-sm-3 pr-1 pl-1">
                                                    <div class="styled-select-small">
                                                        <div class="position-absolute"><i class="fa fa-calendar"></i></div>
                                                        <input type="text" class="form-control" id="flightdate" placeholder="Departure Date" name="">
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="row">
                                                        <div class="col-sm-6 pr-1 pl-1">
                                                            <div class="styled-select-small">
                                                                <div class="position-absolute"><i class="fa fa-user"></i></div>
                                                                <select name="ttype" required="" class="form-control">
                                                                    <option value="">Adult</option>
                                                                    <option value="PVT">1</option>
                                                                    <option value="SIC">2</option>
                                                                    <option value="HOURLY">3</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 pr-1 pl-1">
                                                            <div class="styled-select-small">
                                                                <div class="position-absolute"><i class="fa fa-user"></i></div>
                                                                <select name="seat" required="" class="form-control" id="vehicleid">
                                                                    <option value="0">Child</option>
                                                                    <option value="0">0</option>
                                                                    <option value="1">1</option>
                                                                    <option value="13">2</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-2 pr-1 pl-1">
                                                    <div class="styled-select-small">
                                                        <div class="position-absolute"><i class="fa fa-bars"></i></div>
                                                        <select name="dp" required="" class="form-control" id="location">
                                                            <option value="">Economy</option>
                                                            <option value="">Business</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-7 pr-1 pl-1">
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" id="customRadioInline1" name="customRadioInline1" class="custom-control-input">
                                                        <label class="custom-control-label" for="customRadioInline1">Round Trip</label>
                                                    </div>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" id="customRadioInline2" name="customRadioInline1" class="custom-control-input">
                                                        <label class="custom-control-label" for="customRadioInline2">One Way</label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3 pr-1 pl-1">
                                                    <button type="submit" name="submit" class="btn btn-primary btn-search search-transfer  btn-block"> <i class="fa fa-plane"></i> Search Flight</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>-->
                                <div class="tab-pane fade" id="cruise">
                                    <form name="input1" action="transfer-list.php" method="POST">
                                        <div class="selection clearfix">
                                            <div class="row">
                                                <div class="col-sm-3 pr-1 pl-1">
                                                    <select name="dp" required="" class="form-control" id="location">
                                                        <option value="">Select Destination</option>
                                                        <option value="">Business</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-2 pr-1 pl-1">
                                                    <select name="dp" required="" class="form-control" id="location">
                                                        <option value="">Select Month</option>
                                                        <option value="">Business</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-2 pr-1 pl-1">
                                                    <select name="dp" required="" class="form-control" id="location">
                                                        <option value="">Select Length</option>
                                                        <option value="">Business</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-2 pr-1 pl-1">
                                                    <select name="dp" required="" class="form-control" id="location">
                                                        <option value=""> Cruiseline</option>
                                                        <option value="">Business</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-3 pr-1 pl-1">
                                                    <button type="submit" name="submit" class="btn btn-primary btn-search search-transfer  btn-block"> <i class="fa fa-search"></i> Search</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                 <div class="tab-pane fade" id="tours" role="tabpanel" aria-labelledby="homes-tab">
                                    <form name="input1" action="transfer-list.php" method="POST">
                                        <div class="selection clearfix">
                                            <div class="row">
                                                <div class="col-sm-3 pr-1 pl-1">
                                                    <div class="styled-select-small">
                                                        <div class="position-absolute"><i class="fa fa-search"></i></div>
                                                        <input type="text" placeholder="Where are you going?" class="form-control" name="">
                                                    </div>
                                                </div>
                                                <div class="col-sm-3 pr-1 pl-1">
                                                    <div class="styled-select-small">
                                                        <div class="position-absolute"><i class="fa fa-calendar"></i></div>
                                                        <input type="text" id="datepicker" class="form-control" placeholder="date" name="">
                                                    </div>
                                                </div>
                                                <div class="col-sm-3 pr-1 pl-1">
                                                    <div class="styled-select-small">
                                                        <div class="position-absolute"><i class="fa fa-user"></i></div>
                                                        <input type="text" class="form-control" name="" placeholder="Pax">
                                                    </div>
                                                </div>
                                                <div class="col-sm-3 pr-1 pl-1">
                                                    <button type="submit" name="submit" class="btn btn-primary btn-search search-transfer  btn-block"> <i class="fa fa-search"></i> Find Vaccation Homes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div> 
                                 <div class="tab-pane fade" id="transfer">
                                    <form name="input1" action="transfer-list.php" method="POST">
                                        <div class="selection clearfix">
                                            <div class="row">
                                                <div class="col-sm-5">
                                                    <div class="row">
                                                        <div class="col-sm-6 pr-1 pl-1">
                                                            <div class="styled-select-small">
                                                                <div class="position-absolute"><i class="fa fa-search"></i></div>
                                                                 <select name="pickup" required="" class="form-control" placeholder="Pickup From">
																    <option value="">Airpot</option>
                                                                    <option value="">Coach Station</option>
                                                                    <option value="PVT">Railway Station</option>
                                                                    <option value="SIC">Kuala Lumpur</option>
                                                                    <option value="HOURLY">IPOH</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 pr-1 pl-1">
                                                            <div class="styled-select-small">
                                                                <div class="position-absolute"><i class="fa fa-search"></i></div>
                                                                <input type="search" class="form-control" placeholder="Drop To" name="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-7">
                                                    <div class="row">
                                                        <div class="col-sm-4 pr-1 pl-1">
                                                            <div class="styled-select-small">
                                                                <div class="position-absolute"><i class="fa fa-calendar"></i></div>
                                                                <input type="text" class="form-control" name="serviceDate" placeholder="Service Date">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-2 pr-1 pl-1">
                                                            <div class="styled-select-small">
                                                                <select name="ttype" required="" class="form-control" placeholder="No. of vehicle">
                                                                    <option value="">0</option>
                                                                    <option value="PVT">1</option>
                                                                    <option value="SIC">2</option>
                                                                    <option value="HOURLY">3</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                          <div class="col-sm-3 pr-1 pl-1">
                                                            <button type="submit" name="submit" class="btn btn-primary btn-search search-transfer  btn-block">Search</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                               
                                <div class="tab-pane fade" id="package" role="tabpanel" aria-labelledby="homes-tab">
                                    <form name="input1" action="transfer-list.php" method="POST">
                                        <div class="selection clearfix">
                                            <div class="row">
                                                <div class="col-sm-3 pr-1 pl-1">
                                                    <div class="styled-select-small">
                                                        <div class="position-absolute"><i class="fa fa-search"></i></div>
                                                        <input type="text" placeholder="Where are you going?" class="form-control" name="">
                                                    </div>
                                                </div>
                                                <div class="col-sm-3 pr-1 pl-1">
                                                    <div class="styled-select-small">
                                                        <div class="position-absolute"><i class="fa fa-search"></i></div>
                                                        <input type="text" id="datepicker" class="form-control" name="">
                                                    </div>
                                                </div>
                                                <div class="col-sm-3 pr-1 pl-1">
                                                    <div class="styled-select-small">
                                                        <div class="position-absolute"><i class="fa fa-calendar"></i></div>
                                                        <input type="text" class="form-control" name="">
                                                    </div>
                                                </div><div class="col-sm-3 pr-1 pl-1">
                                                <div class="styled-select-small">
                                                    <div class="position-absolute"><i class="fa fa-user"></i></div>
                                                    <input type="text" class="form-control" name="">
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-9 pr-1 pl-1">
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="customRadioInline1" name="customRadioInline1" class="custom-control-input">
                                                    <label class="custom-control-label" for="customRadioInline1">Flight + Hotel+ Car</label>
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="customRadioInline2" name="customRadioInline1" class="custom-control-input">
                                                    <label class="custom-control-label" for="customRadioInline2">Flight + Hotel</label>
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="customRadioInline3" name="customRadioInline1" class="custom-control-input">
                                                    <label class="custom-control-label" for="customRadioInline3">Flight + Car</label>
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="customRadioInline4" name="customRadioInline1" class="custom-control-input">
                                                    <label class="custom-control-label" for="customRadioInline4">Hotel + Car</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-3 pr-1 pl-1">
                                                <button type="submit" name="submit" class="btn btn-primary btn-search search-transfer  btn-block"> <i class="fa fa-search"></i> Find Packages</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="activities" role="tabpanel" aria-labelledby="homes-tab">
                                <form name="input1" action="transfer-list.php" method="POST">
                                    <div class="selection clearfix">
                                        <div class="row">
                                            <div class="col-sm-6 pr-1 pl-1">
                                                <div class="styled-select-small">
                                                    <div class="position-absolute"><i class="fa fa-search"></i></div>
                                                    <input type="text" placeholder="Where are you going?" class="form-control" name="">
                                                </div>
                                            </div>
                                            <div class="col-sm-3 pr-1 pl-1">
                                                <div class="styled-select-small">
                                                    <div class="position-absolute"><i class="fa fa-calendar"></i></div>
                                                    <input type="text" id="datepicker" class="form-control" name="">
                                                </div>
                                            </div>
                                            <div class="col-sm-3 pr-1 pl-1">
                                                <button type="submit" name="submit" class="btn btn-primary btn-search search-transfer  btn-block"> <i class="fa fa-search"></i> Find Activities</button>
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
    </div>
</div>
</div>
<div class="row offers">
 
<div class="container ">
    <div class="section_title text-center">
        <h2 class="title_color">Hotel Accomodation</h2>
        <p>We all live in an age that belongs to the young at heart. Life that is becoming extremely fast, </p>
    </div>
    <div class="tiles">
        <a class="tile" href="#">
            <img src="<?php echo base_url(); ?>assets/images_home/penang1.jpg"/>
            <div class="details"><span class="title">Save Up to 65% With Last Minute Travel Club</span><span class="info">Save more with exclusive discounts that only members have access to. Plus, gain access to our loyalty program, where you can earn points toward a free hotel stay!<br>
            <button type="" class="btn btn-danger btn-sm">Join Now</button>
        </span>
    </div>
</a>
<a class="tile" href="#">
    <img src="<?php echo base_url(); ?>assets/images_home/penang2.jpg"/>
    <div class="details"><span class="title">Save Up to 65% With Last Minute Travel Club</span><span class="info">Save more with exclusive discounts that only members have access to. Plus, gain access to our loyalty program, where you can earn points toward a free hotel stay!<br>
    <button type="" class="btn btn-danger btn-sm">Join Now</button>
</span>
</div></a>
<a class="tile" href="#">
<img src="<?php echo base_url(); ?>assets/images_home/penang3.jpg"/>
<div class="details"><span class="title">Save Up to 65% With Last Minute Travel Club</span><span class="info">Save more with exclusive discounts that only members have access to. Plus, gain access to our loyalty program, where you can earn points toward a free hotel stay!<br>
<button type="" class="btn btn-danger btn-sm">Join Now</button>
</span>
</div>
</a>
<a class="tile" href="#">
<img src="<?php echo base_url(); ?>assets/images_home/penang4.jpg"/>
<div class="details"><span class="title">Save Up to 65% With Last Minute Travel Club</span><span class="info">Save more with exclusive discounts that only members have access to. Plus, gain access to our loyalty program, where you can earn points toward a free hotel stay!<br>
<button type="" class="btn btn-danger btn-sm">Join Now</button>
</span>
</div>
</a>
</div>
</div>
</div>
<div class="row popular">
<div class="container ">
<div class="text-center">
<h1>Popular Tour Packages</h1>
</div>
<div class="grid row">
<div class="col-sm-4">
<figure class="effect-box "> <img src="<?php echo base_url(); ?>assets/images_home/trending1.jpg" alt="img13">
<figcaption>
<h2>Attractions  <br>
<span>PENANG DELIGHTZ</span></h2>
<p>Capitalising on our experience of working in the hotel and tourism industry, we have built up a network of contacts which provide us with key information</p>
<a href="#">View more</a> </figcaption>
</figure>
</div>
<div class="col-sm-4">
<figure class="effect-box"> <img src="<?php echo base_url(); ?>assets/images_home/trending2.jpg" alt="img13">
<figcaption>
<h2>(Penang Attractions)   <br>
<span>PENANG HILL TRANQUILITY </span></h2>
<p>Hotel operator management / franchise agreements are detailed contracts. Hotel management companies do not invest in the scheme. </p>
<a href="#">View more</a> </figcaption>
</figure>
</div>
<div class="col-sm-4">
<figure class="effect-box"> <img src="<?php echo base_url(); ?>assets/images_home/trending3.jpg" alt="img13">
<figcaption>
<h2>(Penang Attractions)   <br>
<span>GEORGETOWN TOUR </span></h2>
<p>Operating a hotel’s development under an established brand stimulates the overall perception of the hotel among the clientele. </p>
<a href="#">View more</a> </figcaption>
</figure>
</div>
<div class="col-sm-4">
<figure class="effect-box"> <img src="<?php echo base_url(); ?>assets/images_home/trending4.jpg" alt="img13">
<figcaption>
<h2>Attractions <br>
<span>PENANG City Tour </span></h2>
<p>As an owner or operator of hotels in various locations, you may have asked yourself:” Why do some hotels perform well and others not so well?”</p>
<a href="#">View more</a> </figcaption>
</figure>
</div>
<div class="col-sm-4">
<figure class="effect-box"> <img src="<?php echo base_url(); ?>assets/images_home/trending5.jpg" alt="img13">
<figcaption>
<h2>Attractions <br>
<span>entopia penang </span></h2>
<p>As an owner or operator of hotels in various locations, you may have asked yourself:” Why do some hotels perform well and others not so well?”</p>
<a href="#">View more</a> </figcaption>
</figure>
</div>
<div class="col-sm-4">
<figure class="effect-box"> <img src="<?php echo base_url(); ?>assets/images_home/trending6.jpg" alt="img13">
<figcaption>
<h2>(Penang Attractions)   <br>
<span>Cruise Tour </span></h2>
<p>With our international exposure and experience in developing hotels all over the country, we offer the developer or investor a concept suited ..</p>
<a href="#">View more</a> </figcaption>
</figure>
</div>
</div>
</div>
</div>
<div class="row why-withus">
<div class="container ">
<div class="text-center">
<h3 class="heading text-white text-uppercase">The best discounted hotels in the world</h3>
<div class="text-center why-us">
<div class="row">
<div class="col-sm-4">
<div class="card">
<div class="card-body">
<i class="fa fa-trophy fa-3x"></i>
<h4>Best Travel Agent from 2013 to 2016</h4>
<p>Voted by TTG Travel Awards</p>
</div>
</div>
</div>
<div class="col-sm-4">
<div class="card">
<div class="card-body">
<i class="fa fa-hotel fa-3x"></i>
<h4>Hotels</h4>
<p>Choice of over 200,000 hotels worldwide</p>
</div>
</div>
</div>
<div class="col-sm-4">
<div class="card">
<div class="card-body">
<i class="fa fa-rupee fa-3x"></i>
<h4>Best Price Guarantee</h4>
<p>Guarantee Best Price on all our hotels</p>
</div>
</div>
</div>
</div>
<div class="row">
<div class="col-sm-4">
<div class="card">
<div class="card-body">
<i class="fa fa-plane fa-3x"></i>
<h4>Best Air Travel Partner</h4>
<p>Multi Departure Points and 500 Airlines to choose from</p>
</div>
</div>
</div>
<div class="col-sm-4">
<div class="card">
<div class="card-body">
<i class="fa fa-suitcase fa-3x"></i>
<h4>Packages</h4>
<p>All inclusive Flight + Hotel + Tour Packages with instant confirmation</p>
</div>
</div>
</div>
<div class="col-sm-4">
<div class="card">
<div class="card-body">
<i class="fa fa-phone fa-3x"></i>
<h4>Operation & Customer Service</h4>
<p>19 offices throughout Asia, Middle East and Europe</p>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<!--<div class="row payment-partner">
<div class="container ">
<div class="text-center">
<h4 class="heading">Official Payment Partner</h4>
<div class="text-center">
<ul class="list-inline partners-payment">
<li class=" list-inline-item">
<a href="#"><img class="shadow" src="images_home/p1.png"></a></li>
<li class="list-inline-item">
<a href="#"><img class="shadow" src="images_home/p2.png"></a></li>
<li class="list-inline-item">
<a href="#"><img class="shadow" src="images_home/p3.png"></a></li>
<li class="list-inline-item">
    <a href="#"><img class="shadow" src="images_home/p4.png"></a></li>
    <li class="list-inline-item">
        <a href="#"><img class="shadow" src="images_home/p5.png"></a> </li>
        <li class="list-inline-item">
            <a href="#"><img class="shadow" src="images_home/p6.png"></a></li>
            <li class="list-inline-item">
                <a href="#"><img class="shadow" src="images_home/p7.png"></a></li>
            </ul>
        </div>
    </div>
</div>
</div>
<div class="row builders">
<div class="container">
    <div class="text-center">
        <h4 class="text-center heading">Domestic & International Hotel Partners</h4>
        <div class="owl-carousel" id="hotelpartner">
            <a href="#" class="shadow-sm"><img src="images_home/c1.jpg"></a>
            <a href="#" class="shadow-sm"><img src="images_home/c2.jpg"></a>
            <a href="#" class="shadow-sm"><img src="images_home/c3.jpg"></a>
            <a href="#" class="shadow-sm"><img src="images_home/c4.jpg"></a>
            <a href="#" class="shadow-sm"><img src="images_home/c5.jpg"></a>
            <a href="#" class="shadow-sm"><img src="images_home/c6.jpg"></a>
            <a href="#" class="shadow-sm"><img src="images_home/c3.jpg"></a>
            <a href="#" class="shadow-sm"><img src="images_home/c1.jpg"></a>
            <a href="#" class="shadow-sm"><img src="images_home/c2.jpg"></a>
            <a href="#" class="shadow-sm"><img src="images_home/c3.jpg"></a>
            <a href="#" class="shadow-sm"><img src="images_home/c4.jpg"></a>
            <a href="#" class="shadow-sm"><img src="images_home/c5.jpg"></a>
            <a href="#" class="shadow-sm"><img src="images_home/c6.jpg"></a>
            <a href="#" class="shadow-sm"><img src="images_home/c3.jpg"></a>
        </div>
    </div>
</div>
</div>
-->
<div class="row" id="subscribe">
<div class="container">
    <div class="col text-center">
        <h1>Join Penang Tours Travel Club Now and Start Saving!</h1>
        <button type="submit" class="btn btn-primary border-0 btn-lg">Learn More</button>
    </div>
</div>
</div>
<div class="row">
<div class="panels">
    <a href="#" class="panel">
        <div class="panel__content" style="background-image: url(https://www.cruiseindustrynews.com/images/stories/wire/2015/dec/ovation_penang.JPG);">
            <h3 class="panel__title">Cruise Tour, Penang</h3>
        </div>
    </a>
    <a href="#" class="panel">
        <div class="panel__content" style="background-image: url(https://www.gettingstamped.com/wp-content/uploads/2017/06/Reasons-to-visit-Georgetown-Penang-Malaysia-5.jpg)">
            <h3 class="panel__title">Georgetown</h3>
        </div>
    </a>
    <a href="#" class="panel">
        <div class="panel__content" style="background-image: url(http://static.asiawebdirect.com/m/kl/portals/penang-ws/homepage/penang-attractions/pagePropertiesImage/penang-attractions.jpg.jpg)">
            <h3 class="panel__title">Penang Attraction</h3>
        </div>
    </a>
    <a href="#" class="panel">
        <div class="panel__content" style="background-image: url(http://www.mytourplaces.com/wp-content/uploads/2018/02/pe.jpg); background-position: 46% center;">
            <h3 class="panel__title">Penang Hill</h3>
        </div>
    </a>
</div>
<div class="panels">
    <a href="#" class="panel">
        <div class="panel__content" style="background-image: url(https://unsplash.it/1100/1100/?image=760);">
            <h3 class="panel__title">A</h3>
        </div>
    </a>
    <a href="#" class="panel">
        <div class="panel__content" style="background-image: url(https://wwwonlypenangcom-us1g3rpggiefuu4p8.stackpathdns.com/wp-content/uploads/2016/12/penang-skywalk-night.jpg)">
            <h3 class="panel__title">B</h3>
        </div>
    </a>
    <a href="#" class="panel">
        <div class="panel__content" style="background-image: url(https://i.ytimg.com/vi/_lmtgxxh8FE/maxresdefault.jpg)">
            <h3 class="panel__title">C</h3>
        </div>
    </a>
</div>
<div class="panels">
    <a href="#" class="panel">
        <div class="panel__content" style="background-image: url(https://unsplash.it/1100/1100/?image=760);">
            <h3 class="panel__title">A</h3>
        </div>
    </a>
    <a href="#" class="panel">
        <div class="panel__content" style="background-image: url(https://wwwonlypenangcom-us1g3rpggiefuu4p8.stackpathdns.com/wp-content/uploads/2016/12/penang-skywalk-night.jpg)">
            <h3 class="panel__title">B</h3>
        </div>
    </a>
    <a href="#" class="panel">
        <div class="panel__content" style="background-image: url(https://i.ytimg.com/vi/_lmtgxxh8FE/maxresdefault.jpg)">
            <h3 class="panel__title">C</h3>
        </div>
    </a>
    <a href="#" class="panel">
        <div class="panel__content" style="background-image: url(https://avatars.mds.yandex.net/get-pdb/245485/ddaa1518-0234-4acb-90f7-1332cab06f1c/s1200); background-position: 46% center;">
            <h3 class="panel__title">D</h3>
        </div>
    </a>
    <a href="#" class="panel">
        <div class="panel__content" style="background-image: url(https://media.timeout.com/images/101771783/image.jpg); background-position: 46% center;">
            <h3 class="panel__title">E</h3>
        </div>
    </a>
</div>
</div>

<?php $this->load->view('home/footer'); ?>

 
