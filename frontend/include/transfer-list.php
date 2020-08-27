<?php include "include/header.php"; ?>
        <div class="row banner banner1 text-center"><p>&nbsp;</p>
<h1 class="headings text-center text-white">Book Transfer</h1>
            <!-- 
            <div class="input">
                <ul class="list-unstyled">
                    <li>
                        <select type="search" class="form-control searchbox">
                            <option>Select Pattern</option>
                        </select>
                    </li>
                    <li>
                        <select type="search" class="form-control searchbox1">
                            <option>Pickup From</option>
                        </select>
                    </li>
                    <li>
                        <select type="search" class="form-control searchbox1">
                            <option>Drop To</option>
                        </select>
                    </li>
                    <li>
                        <select type="search" class="form-control searchbox1">
                            <option>Transfer Type</option>
                        </select>
                    </li>
                    <li>
                        <input type="text" id="date_from" class="form-control" name="" placeholder="Service Date">
                    </li>
                    <li>
                        <button class="btn btn-primary btn-block btn-search">Search</button>
                    </li>
                </ul>
            </div> -->
        </div>
        <div class="row bg-grey gap1">
            <div class="container">
                <div class="row">
                    <div class="col-sm-3 ">
                        <div class="filter shuttle-widget">
                            <!--  <h4 class="text-center">Search Transfer</h4> -->
                            <div class="tops">
                                <div><span class="old-price">From <del><span style="font-size:smaller;">SGD</span> $20</del>
                                    </span>
                                </div>
                                <div class="new-price"><span style="font-size:smaller;">SGD</span> $10</div>
                                <div class="offer">Save SGD 10 Per Person. </div>
                            </div>
                            <ul class="list-unstyled">
                                <li>
                                    <select type="search" class="form-control searchbox">
                                        <option>Select Country</option>
                                    </select>
                                </li>
                                <li>
                                    <select type="search" class="form-control searchbox">
                                        <option>Select City</option>
                                    </select>
                                </li>
                                <li>
                                    <select type="search" class="form-control searchbox">
                                        <option>Select Pattern</option>
                                    </select>
                                </li>
                                <li>
                                    <select type="search" class="form-control searchbox1">
                                        <option>No. of Adult</option>
                                    </select>
                                </li>
                                <li>
                                    <select type="search" class="form-control searchbox1">
                                        <option>No. of Child</option>
                                    </select>
                                </li>
                                 
                                <li>
                                    <input type="text" id="date_from" class="form-control" name="" placeholder="Service Date">
                                </li>
                                <li>
                                    <button class="btn btn-primary btn-block btn-search">Search</button>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-9">
                        <!-- <div class="text-center">
                            <h4 class="head">Book Transfers</h4>
                        </div> -->
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingOne">
                                    <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        <i class="more-less glyphicon glyphicon-plus"></i>
                       FROM CRUISE/FERRY POINT (HARBOUR FRONT)
                    </a>
                </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                    <div class="panel-body">
                                        <div class="table-responsive">
                                            <table class="table table-condensed table-bordered table-hover">
                                                <tr>
                                                    <th>Transfer Name</th>
                                                    <th>Time (24Hr) </th>
                                                    <th>Date</th>
                                                    <th>Pax</th>
                                                    <th>Per Pax</th>
                                                    <th>Action</th>
                                                </tr>
                                                <tr>
                                                    <td>Cruise Terminal (Harbour Front) To city Hotel <a href="#" data-toggle="modal" data-target="#mymodal"><i class="fa fa-info-circle"></i></a> </td>
                                                    <td>
                                                        <select class="form-control input-sm">
                                                            <option>Select</option>
                                                        </select>
                                                    </td>
                                                    <td>11th Aug 2017</td>
                                                    <td>4</td>
                                                    <td>SGD 12</td>
                                                    <td>
                                                        <button type="button" class="btn btn-success btn-xs">Buy</button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Cruise Terminal (Harbour Front) To city Hotel <a href="#" data-toggle="modal" data-target="#mymodal"><i class="fa fa-info-circle"></i></a> </td>
                                                    <td>
                                                        <select class="form-control input-sm">
                                                            <option>Select</option>
                                                        </select>
                                                    </td>
                                                    <td>11th Aug 2017</td>
                                                    <td>4</td>
                                                    <td>SGD 12</td>
                                                    <td>
                                                        <button type="button" class="btn btn-success btn-xs">Buy</button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Cruise Terminal (Harbour Front) To city Hotel <a href="#" data-toggle="modal" data-target="#mymodal"><i class="fa fa-info-circle"></i></a> </td>
                                                    <td>
                                                        <select class="form-control input-sm">
                                                            <option>Select</option>
                                                        </select>
                                                    </td>
                                                    <td>11th Aug 2017</td>
                                                    <td>4</td>
                                                    <td>SGD 12</td>
                                                    <td>
                                                        <button type="button" class="btn btn-success btn-xs">Buy</button>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingTwo">
                                    <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        <i class="more-less glyphicon glyphicon-plus"></i>
                       FROM COACH STATION (GOLDEN MILES)
                    </a>
                </h4>
                                </div>
                                <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                    <div class="panel-body">
                                        <div class="table-responsive">
                                            <table class="table table-condensed table-bordered table-hover">
                                                <tr>
                                                    <th>Transfer Name</th>
                                                    <th>Time (24Hr) </th>
                                                    <th>Date</th>
                                                    <th>Pax</th>
                                                    <th>Per Pax</th>
                                                    <th>Action</th>
                                                </tr>
                                                <tr>
                                                    <td>Cruise Terminal (Harbour Front) To city Hotel <a href="#" data-toggle="modal" data-target="#mymodal"><i class="fa fa-info-circle"></i></a> </td>
                                                    <td>
                                                        <select class="form-control input-sm">
                                                            <option>Select</option>
                                                        </select>
                                                    </td>
                                                    <td>11th Aug 2017</td>
                                                    <td>4</td>
                                                    <td>SGD 12</td>
                                                    <td>
                                                        <button type="button" class="btn btn-success btn-xs">Buy</button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Cruise Terminal (Harbour Front) To city Hotel <a href="#" data-toggle="modal" data-target="#mymodal"><i class="fa fa-info-circle"></i></a> </td>
                                                    <td>
                                                        <select class="form-control input-sm">
                                                            <option>Select</option>
                                                        </select>
                                                    </td>
                                                    <td>11th Aug 2017</td>
                                                    <td>4</td>
                                                    <td>SGD 12</td>
                                                    <td>
                                                        <button type="button" class="btn btn-success btn-xs">Buy</button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Cruise Terminal (Harbour Front) To city Hotel <a href="#" data-toggle="modal" data-target="#mymodal"><i class="fa fa-info-circle"></i></a> </td>
                                                    <td>
                                                        <select class="form-control input-sm">
                                                            <option>Select</option>
                                                        </select>
                                                    </td>
                                                    <td>11th Aug 2017</td>
                                                    <td>4</td>
                                                    <td>SGD 12</td>
                                                    <td>
                                                        <button type="button" class="btn btn-success btn-xs">Buy</button>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingThree">
                                    <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        <i class="more-less glyphicon glyphicon-plus"></i>
                         FROM CHANGI AIRPORT
                    </a>
                </h4>
                                </div>
                                <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                    <div class="panel-body">
                                        <div class="table-responsive">
                                            <table class="table table-condensed table-bordered table-hover">
                                                <tr>
                                                    <th>Transfer Name</th>
                                                    <th>Time (24Hr) </th>
                                                    <th>Date</th>
                                                    <th>Pax</th>
                                                    <th>Per Pax</th>
                                                    <th>Action</th>
                                                </tr>
                                                <tr>
                                                    <td>Cruise Terminal (Harbour Front) To city Hotel <a href="#" data-toggle="modal" data-target="#mymodal"><i class="fa fa-info-circle"></i></a> </td>
                                                    <td>
                                                        <select class="form-control input-sm">
                                                            <option>Select</option>
                                                        </select>
                                                    </td>
                                                    <td>11th Aug 2017</td>
                                                    <td>4</td>
                                                    <td>SGD 12</td>
                                                    <td>
                                                        <button type="button" class="btn btn-success btn-xs">Buy</button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Cruise Terminal (Harbour Front) To city Hotel <a href="#" data-toggle="modal" data-target="#mymodal"><i class="fa fa-info-circle"></i></a> </td>
                                                    <td>
                                                        <select class="form-control input-sm">
                                                            <option>Select</option>
                                                        </select>
                                                    </td>
                                                    <td>11th Aug 2017</td>
                                                    <td>4</td>
                                                    <td>SGD 12</td>
                                                    <td>
                                                        <button type="button" class="btn btn-success btn-xs">Buy</button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Cruise Terminal (Harbour Front) To city Hotel <a href="#" data-toggle="modal" data-target="#mymodal"><i class="fa fa-info-circle"></i></a> </td>
                                                    <td>
                                                        <select class="form-control input-sm">
                                                            <option>Select</option>
                                                        </select>
                                                    </td>
                                                    <td>11th Aug 2017</td>
                                                    <td>4</td>
                                                    <td>SGD 12</td>
                                                    <td>
                                                        <button type="button" class="btn btn-success btn-xs">Buy</button>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- panel-group -->
                    </div>
                    <div class="modal fade" id="mymodal">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        <span class="sr-only">Close</span>
                                    </button>
                                    <h4 class="modal-title">Things to Remember</h4>
                                </div>
                                <div class="modal-body">
                                    <ul>
                                        <li>
                                            “Shared” refers to sharing vehicle with other guests.</li>
                                        <li>
                                            “Private” refers to the service by a private vehicle.</li>
                                        <li>
                                            If you are not finding your suitable timings in Shared transfers you may choose Private.</li>
                                        <li>
                                            Baggage Policy - 01 Bag per passenger. </li>
                                        <li>
                                            All our drivers are english spoken. </li>
                                        <li>
                                            Capacity of Vans - 9 pax with luggage / 12 with out luggage.
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    <!-- /.modal -->
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