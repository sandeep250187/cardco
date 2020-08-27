<?php include "include/header.php"; ?>
        <div class="row banner banner1">
           
     
            <div class="container">
               
                 <div class="col-sm-8 col-sm-offset-2">
                <div class="transfer-search">
                <div> <div class="row text-center">
                    <h1 class="headings">Book Tours</h1>
                </div>
                            <div class="form-horizontal well-lg">
                                <form name="register" id="register" method="post" action="#" novalidate="novalidate">
                                    <div class="form-group">
                                        <div class="col-sm-4">
                                            <label class="">Web ID</label>
                                            <div class="form-control-static">
                                                <strong class="text-warning">WMTS0028</strong>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="inputEmail">Country</label>
                                            <div class="form-control-static">
                                                <strong class="text-warning">Malaysia</strong>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="inputEmail">City</label>
                                            <div class="form-control-static">
                                                <strong class="text-warning">Penang</strong>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h4>Guest Details</h4>
                                        <div class="col-md-6">
                                            <label for="inputPassword">Guest Name</label>
                                            <input type="email" name="email" class="form-control" id="email" placeholder="Email">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputPassword">Nationality</label>
                                            <input type="tel" name="phone" class="form-control" id="phone" placeholder="Phone">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h4>Booking Details</h4>
                                        <div class="col-md-6">
                                            <label for="inputEmail">Availability</label>
                                            <input type="text" class="form-control" value="Available" disabled="">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputEmail">Tour Name</label>
                                            <input type="text" class="form-control" value="Tour name" disabled="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-6">
                                            <label for="inputEmail">Transfer Type</label>
                                            <input type="text" class="form-control" value="Shared" disabled="">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputEmail">No of Adult</label>
                                            <input type="text" class="form-control" value="2" disabled="">
                                        </div>
                                    </div> <div class="form-group">
                                        <div class="col-md-6">
                                            <label for="inputEmail">No of Child </label>
                                            <input type="text" class="form-control" value="0" disabled="">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputEmail">Departure Time(24 Hour)</label>
                                            <input type="text" class="form-control" value="2" disabled="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-6">
                                            <label for="inputPassword">Pick Up Date</label>
                                            <input type="date"  class="form-control">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputPassword">Pick Up From</label>
                                            <select class="form-control"><option>-select-</option></select>
                                        </div>
                                    </div>
                                    <div class="form-group text-right">
                                    <hr>
                                   <div class="col-sm-6">
                                  <h4> Total Cost: <span class="text-warning">MYR 890.00</span></h4>
                                   </div>
                                        <div class="col-sm-6">
                                             <button type="button" class="btn btn-primary book-now">Book Now</button>  
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
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
    <!-- Compiled and minified JavaScript -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js"></script>
 -->
</body>

</html>
