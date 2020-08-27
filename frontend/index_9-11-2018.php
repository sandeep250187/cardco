 <?php include "include/header.php";  
  include "../test2.php";
 $d=date('Y/m/d');
 $out1='2018/09/01';
 $start1 = strtotime($d);
  $end1 = strtotime($out1);
  $d1 = ceil(abs($end1 - $start1) / 86400); 
  $d2=$d1+30; 
$date_cin= date('Y/m/d', strtotime($d . ' +'.$d1.' day'));
 $date_cout= date('Y/m/d', strtotime($d . ' +'.($d1+1).' day'));
 

 ?>

<div class="row home">
<div class="input">
  <div class="container">
    <form name="frm" action="hotel-search-wout-apmg.php" method="POST" class="searchs">
      <input name="by" type="hidden" value="1"/>
      <h4>Search Hotel</h4>
      <ul class="list-inline">
        <li>
          <label>Location</label>
          <div class="location">
          <select type="search" class="form-control searchbox">
            <option>Penang</option>
          </select>
        </div>
        </li>
        <li>
          <label>CheckIn Date</label>
          <div class="dates">
          <input type="text" value="<?php echo $date_cin; ?>" class="form-control" autocomplete="off" id="from-date" name="cd">
        </div>
        </li>
        <li>
          <label>CheckOut Date </label>
          <div class="dates">
          <input type="text" value="<?php echo $date_cout; ?>" class="form-control" autocomplete="off" id="to-date" name="cod">
        </div>
        </li>
       <!-- <li>
          <label>No Of Night</label>
          <div class="selects">
          <select type="night" name="night" class="form-control searchbox1">
            <?php             for($i=1;$i<14;$i++)              {             ?>
            <option value="<?php echo $i; ?>" <?php echo ($_POST['night']==$i)?'selected="selected"' : '' ?> ><?php echo $i; ?></option>
            <?php             }          ?>
          </select>
        </div>
        </li>-->
        <li>
          <label>Adult</label>
          <div class="selects">
          <select type="search" name="adult" class="form-control searchbox1" required>
            <?php             for($i=2;$i<14;$i++)              {             ?>
            <option value="<?php echo $i; ?>" <?php echo ($_POST['adult']==$i)?'selected="selected"' : '' ?> ><?php echo $i; ?></option>
            <?php             }          ?>
          </select>
        </div>
        </li>
        <li>
          <label>Child</label>
          <div class="selects">
          <select type="search" name="child" class="form-control searchbox1" required>
            <?php             for($i=0;$i<14;$i++)              {             ?>
            <option value="<?php echo $i; ?>" <?php echo ($_POST['child']==$i)?'selected="selected"' : '' ?> ><?php echo $i; ?></option>
            <?php             }          ?>
          </select>
        </div>
        </li>
       
        <li>
          <label>No. Of Rooms</label>
          <div class="selects">
          <select type="search" name="room" class="form-control searchbox1" required>
            <?php             for($i=1;$i<14;$i++)              {             ?>
            <option value="<?php echo $i; ?>" <?php echo ($_POST['room']==$i)?'selected="selected"' : '' ?> ><?php echo $i; ?></option>
            <?php             }          ?>
          </select>
        </div>
        </li>
        <li>
          <label>&nbsp;</label>
          <button class="btn btn-primary btn-block btn-search" name="search">Search</button>
        </li>
      </ul>
    </form>
  </div>
  </div>
  <div id="carousel-example" class="carousel slide carousel-fade" data-ride="carousel"> 
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#carousel-example" data-slide-to="0" class="active"></li>
      <li data-target="#carousel-example" data-slide-to="1"></li>
      <li data-target="#carousel-example" data-slide-to="2"></li>
    </ol>
    
    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active"> <img src="images/banner.jpg" alt="..."> </div>
      <div class="item"> <img src="images/banner1.jpg" alt="..."> </div>
      <div class="item"> <img src="images/banner2.jpg" alt="..."> </div>
    </div>
    
    <!-- Controls --> 
    <a class="left carousel-control" href="#carousel-example" role="button" data-slide="prev"> <span class="sr-only">Previous</span><i class="glyphicon glyphicon-chevron-left"></i> </a> <a class="right carousel-control" href="#carousel-example" role="button" data-slide="next"> <span class="sr-only">Next</span><i class="glyphicon glyphicon-chevron-right"></i> </a> </div>
</div>
 

<div class="row builders">
  <div class="container">
    <div class="col-sm-10 col-sm-offset-1">
      <div class="marquee" id="mycrawler2">
        <ul class="list-inline">
          <li><a href="#"><img src="images/c1.jpg"></a></li>
          <li><a href="#"><img src="images/c2.jpg"></a></li>
          <li><a href="#"><img src="images/c3.jpg"></a></li>
          <li><a href="#"><img src="images/c4.jpg"></a></li>
          <li><a href="#"><img src="images/c5.jpg"></a></li>
          <li><a href="#"><img src="images/c6.jpg"></a></li>
          <li><a href="#"><img src="images/c3.jpg"></a></li>
        </ul>
      </div>
    </div>
  </div>
</div>
<?php include "include/footer.php"; ?>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> 
<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/owl.carousel.js"></script> 
<script type="text/javascript">
        $(document).ready(function () {
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
<script>

$(document).ready(function () {
    
        $("#from-date").datepicker({
       minDate:<?php echo $d1;  ?>,
       maxDate:<?php echo $d2;  ?>,
       dateFormat: "yy/mm/dd",
           // minDate: 0,
            onSelect: function (date) {
                var date2 = $('#from-date').datepicker('getDate');
                date2.setDate(date2.getDate() + 1);
                $('#to-date').datepicker('setDate', date2);
                //sets minDate to dt1 date + 1
                $('#to-date').datepicker('option', 'minDate', date2);
                 setTimeout(function(){
            $( "#to-date" ).datepicker('show');
        }, 16);  
            }
        });
        $('#to-date').datepicker({
             minDate:<?php echo $d1;  ?>,
        maxDate:<?php echo $d2;  ?>,
       dateFormat: "yy/mm/dd",
            onClose: function () {
                var dt1 = $('#from-date').datepicker('getDate');
                console.log(dt1);
                var dt2 = $('#to-date').datepicker('getDate');
                if (dt2 <= dt1) {
                    var minDate = $('#to-date').datepicker('option', 'minDate');
                    $('#to-date').datepicker('setDate', minDate);
                }
            }
        });
    });

 
    </script>
</body>
</html>
