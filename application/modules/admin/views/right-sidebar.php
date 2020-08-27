<!--sidebar start-->
<?php
echo $urlCont =$this->router->fetch_class(); 
$url =$this->router->fetch_class()."/".$this->router->fetch_method();
?>

<aside>
  <div id="sidebar"  class="nav-collapse "> 
    <!-- sidebar menu start-->
    
    <ul class="sidebar-menu" id="nav-accordion">
      <p class="centered"><a href="<?php echo base_url(); ?>admin/user/edit/<?php echo getCurUserID();?>/0"><img src="<?php echo base_url(); ?>assets/img/ui-sam.jpg" alt="Whole You" class="img-circle" width="60"></a></p>
      <h5 class="centered"><?php echo userNameFromId(getCurUserID()); ?></h5>
      <li class="mt partation"><span>Site Admin Panel</span> </li>
      <li class="mt"> <a <?php if($url=="home/index") echo "class='active'" ?> href="<?php echo ADMIN_URL; ?>"> <i class="fa fa-dashboard"></i> <span>Dashboard</span> </a> </li>
  
 
      <li class="sub-menu"> <a href="javascript:;" <?php if($urlCont=="hotelmaster") echo "class='active'" ?> > <i class="fa fa-flag"></i> <span>Hotel Master</span> </a>
        <ul class="sub">
          <li><a  href="<?php echo ADMIN_URL; ?>hotelmaster/listing" <?php if($url=="admin/hotelmaster/listing") echo "class='white_class'" ?> >Hotel List</a></li>
          <li><a  href="<?php echo ADMIN_URL; ?>hotelmaster" <?php if($url=="admin/hotelmaster") echo "class='white_class'" ?> >Add Hotel</a></li>
        </ul>
      </li>
 
      <li class="sub-menu"> <a href="javascript:;" <?php if($urlCont=="apartmentmaster") echo "class='active'" ?> > <i class="fa fa-flag"></i> <span>Apartment Master</span> </a>
        <ul class="sub">
          <li><a  href="<?php echo ADMIN_URL; ?>apartmentmaster/listing" <?php if($url=="admin/apartmentmaster/listing") echo "class='white_class'" ?> >Apartment List</a></li>
          <li><a  href="<?php echo ADMIN_URL; ?>apartmentmaster" <?php if($url=="admin/apartmentmaster") echo "class='white_class'" ?> >Add Apartment</a></li>
        </ul>
      </li>
 
      <li class="sub-menu"> <a href="javascript:;" <?php if($urlCont=="page") echo "class='active'" ?> > <i class="fa fa-book"></i> <span>Hotel Tariff Master</span> </a>
        <ul class="sub">
          <!--<li><a  href="<?php echo ADMIN_URL; ?>hoteltariff/listing" <?php if($url=="admin/hoteltariff/listing") echo "class='white_class'" ?> >Hotel Tariff List</a></li>-->
          <li><a  href="<?php echo ADMIN_URL; ?>hoteltariff" <?php if($url=="admin/hoteltariff") echo "class='white_class'" ?> >Add Hotel Tariff</a></li>
        </ul>
      </li>
   
      <li class="sub-menu"> <a href="javascript:;" <?php if($urlCont=="page") echo "class='active'" ?> > <i class="fa fa-book"></i> <span>Apartment Tariff Master</span> </a>
        <ul class="sub">
          <!--<li><a  href="<?php echo ADMIN_URL; ?>apartmenttariff/listing" <?php if($url=="admin/apartmenttariff/listing") echo "class='white_class'" ?> >Apartment Tariff List</a></li>-->
          <li><a  href="<?php echo ADMIN_URL; ?>apartmenttariff" <?php if($url=="admin/apartmenttariff") echo "class='white_class'" ?> >Add Apartment Tariff</a></li>
        </ul>
      </li>
    
    <li class="sub-menu"> <a href="javascript:;" <?php if($urlCont=="roomcategory") echo "class='active'" ?> > <i class="fa fa-book"></i> <span>Room Category Master</span> </a>
        <ul class="sub">
          <li><a  href="<?php echo ADMIN_URL; ?>roomcategory/listing" <?php if($url=="admin/roomcategory/listing") echo "class='white_class'" ?> >Room Category List</a></li>
       <li><a  href="<?php echo ADMIN_URL; ?>roomcategory" <?php if($url=="admin/roomcategory") echo "class='white_class'" ?> >Add Room Category</a></li>
         </ul>
      </li>
    
    <li class="sub-menu"> <a href="javascript:;" <?php if($urlCont=="apartmentcategory") echo "class='active'" ?> > <i class="fa fa-book"></i> <span>Apartment Category Master</span> </a>
        <ul class="sub">
          <li><a  href="<?php echo ADMIN_URL; ?>apartmentcategory/listing" <?php if($url=="admin/apartmentcategory/listing") echo "class='white_class'" ?> >Apartment Category List</a></li>
       <li><a  href="<?php echo ADMIN_URL; ?>apartmentcategory" <?php if($url=="admin/apartmentcategory") echo "class='white_class'" ?> >Add Apartment Category</a></li>
         </ul>
      </li>
	  
	   <li class="sub-menu"> <a href="javascript:;" <?php if($urlCont=="roe") echo "class='active'" ?> > <i class="fa fa-book"></i> <span>Roe Master</span> </a>
        <ul class="sub">
          <li><a  href="<?php echo ADMIN_URL; ?>roe/listing" <?php if($url=="admin/roe/listing") echo "class='white_class'" ?> >Roe List</a></li>
		   <li><a  href="<?php echo ADMIN_URL; ?>roe" <?php if($url=="admin/roe") echo "class='white_class'" ?> >Add Roe</a></li>
         </ul>
      </li>
	  
	  <li class="sub-menu"> <a href="javascript:;" <?php if($urlCont=="transfermaster") echo "class='active'" ?> > <i class="fa fa-book"></i> <span>Transfer Master</span> </a>
        <ul class="sub">
          <li><a  href="<?php echo ADMIN_URL; ?>transfermaster/listing" <?php if($url=="admin/transfermaster/listing") echo "class='white_class'" ?> >Transfer List</a></li>
		   <li><a  href="<?php echo ADMIN_URL; ?>transfermaster" <?php if($url=="admin/transfermaster") echo "class='white_class'" ?> >Add Transfer</a></li>
       <li><a  href="<?php echo ADMIN_URL; ?>transfermaster/searchtransfer" <?php if($url=="admin/transfermaster/searchtransfer") echo "class='white_class'" ?> >Add Transfer Search</a></li>
       <li><a  href="<?php echo ADMIN_URL; ?>transfermaster/searchlisting" <?php if($url=="admin/transfermaster/searchlisting") echo "class='white_class'" ?> >Transfer Search List</a></li>
         </ul>
      </li>

       <li class="sub-menu"> <a href="javascript:;" <?php if($urlCont=="locationmaster") echo "class='active'" ?> > <i class="fa fa-book"></i> <span>Location Master</span> </a>
        <ul class="sub">
          <li><a  href="<?php echo ADMIN_URL; ?>locationmaster/listing" <?php if($url=="admin/locationmaster/listing") echo "class='white_class'" ?> >Location List</a></li>
       <li><a  href="<?php echo ADMIN_URL; ?>locationmaster" <?php if($url=="admin/locationmaster") echo "class='white_class'" ?> >Add Location</a></li>
         </ul>
      </li>
	  
	  <li class="sub-menu"> <a href="javascript:;" <?php if($urlCont=="tourmaster") echo "class='active'" ?> > <i class="fa fa-book"></i> <span>Tour Master</span> </a>	
    	 <ul class="sub">	
       		<li><a  href="<?php echo ADMIN_URL; ?>tourmaster/listing" <?php if($url=="admin/tourmaster/listing") echo "class='white_class'" ?> >Tour List</a></li>	
          <li><a  href="<?php echo ADMIN_URL; ?>tourmaster" <?php if($url=="admin/tourmaster") echo "class='white_class'" ?> >Add Tour</a></li>	
        </ul>
    </li>	

    <li class="sub-menu"> <a href="javascript:;" <?php if($urlCont=="emailtemplate") echo "class='active'"; ?> > <i class="glyphicon glyphicon-envelope"></i> <span>Mailer Template</span> </a>  
      <ul class="sub"> 
        <li><a  href="<?php echo ADMIN_URL; ?>site/emailtemplate" <?php if($url=="emailtemplate") echo "class='white_class'" ?> >Send Template</a></li>
      </ul>
    </li>         
	  
 </ul>
       
    <!-- sidebar menu end--> 
  </div>
</aside>
<!--sidebar end--> 
