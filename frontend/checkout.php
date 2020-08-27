 <?php
 include "include/header.php"; 
 $dt=date('Y/m/d H:i:s');

if(isset($_POST['save']))
{
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$email=$_POST['email'];
	
	$s=mysql_query("select email from apmg_signup where email='$email'");
	$num=mysql_num_rows($s);
	if($num!='0')
	{
		echo "<script>";
		echo "alert('Entered Email Is Already Exists!!!')";
		echo "</script>";
		echo "<script>window.location='register.php'</script>";
		exit();
	}
  
   
	
	$mobile=$_POST['mobile'];
	$password=$_POST['pswd'];
	$cpassword=$_POST['cpswd'];
	if($password!=$cpassword)
	{
		echo "<script>";
		echo "alert('Password Is Not Matched!!!')";		
		echo "</script>";
		echo "<script>window.location='register.php'</script>";
		exit();
	}
	else
	{
	
	$insert=mysql_query("insert into apmg_signup (first_name,last_name,email,mobile,password,created_date)values('$fname','$lname','$email','$mobile','$password','$dt')");
	
	echo "<script>";
	echo "alert('You Have Registered Successfully!!!')";
	echo "</script>";
	echo "<script>window.location='login.php'</script>";
}
}

 ?>
 <html>
 <title>Register</title>
 <head>
 <script type="text/javascript" src="http://www.technicalkeeda.com/js/javascripts/plugin/jquery.js"></script>
    <script type="text/javascript" src="http://www.technicalkeeda.com/js/javascripts/plugin/jquery.validate.js"></script>
    <script>
    function validatePassword() {
        var validator = $("#loginForm").validate({
            rules: {
                password: "required",
                confirmpassword: {
                    equalTo: "#password"
                }
            },
            messages: {
                password: " Enter Password",
                confirmpassword: " Enter Confirm Password Same as Password"
            }
        });
        if (validator.form()) {
            alert('Sucess');
        }
    }
 
    </script>
 </head>
 <body>
 
        <div class="row banner banner1"> 
 <div class="text-center">
                    <h2 class="heading text-white">Checkout </h2>
                </div>
</div>

         <div class="row bg-grey gap">
           
 <div class="container">
                <div class="row">
              
        
                    <h4 class="text-uppercase text-center">
         <strong>CHECKOUT</strong>
            <strong>OF ORDER CODE: <b style="color:red">AG0062</b></strong> 
            </h4>
                    <div class="table-responsive">
                        <table class="table cart-table">
                            <tbody>
                                <tr>
                                    <th>Destination</th>
                                    <th>Date / Time</th>
                                    <th><strong>DESCRIPTION</strong></th>
                                    <th><strong> Pick up from</strong></th>
                                    <th><strong> Drop to</strong></th>
                                    <th><strong>No Of Pax / Vehicle</strong></th>
                                    <th align="right">Rate Per Pax / Vehicle</th>
                                    <th align="right"><strong class="pull-right">Subtotal</strong></th>
                                </tr>
                                <tr>
                                    <td class="">Singapore</td>
                                    <td class="">2017/09/30 (06:30)</td>
                                    <td class="">
                                        <ul class="product_list_widget1 list-unstyled">
                                            <li class="product-text"> Hotel lobby To Hotel lobby (Inter transfer) (PVT)
                                            </li>
                                        </ul>
                                    </td>
                                    <input type="hidden" name="ser_id[]" value="64">
                                    <td>
                                        <input type="text" name="source[]" class="form-control" placeholder="Pickup Full Address" id="source1" required=""> </td>
                                    <td>
                                        <input class="form-control" type="text" name="dest[]" id="dest1" placeholder="Drop Full Address" required=""> </td>
                                    <td align="center">
                                        <!--<input type="number" class="form-control" name="number" id="number">-->
                                        1 CAR </td>
                                    <td>SGD 42 (Per Vehicle) </td>
                                    <td align="right"><strong>SGD 42</strong></td>
                                </tr>
                                
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            <div class="row ">
                <hr>
   <h4 class="page-header"> Guest Details </h4>
                    <div class="col-md-8">
                        <div class="row ">
                          
                            <div class="form-horizontal">
                                <div class="form-group">
                                    <div class="col-md-4"> Guest Name*
                                        <input type="text" name="gname" placeholder="Enter Name" class="form-control" required="">
                                    </div>
                                    <div class="col-md-4"> Country Code *
                                        <select name="country_code" required="" class="form-control" style="width:200px;;">
                                            <option value="1">Abkhazia (+7840)</option>
                                            <option value="2">Afghanistan (+93)</option>
                                            <option value="3">Albania (+355)</option>
                                            <option value="4">Algeria (+213)</option>
                                            <option value="5">American Samoa (+1684)</option>
                                            <option value="6">ANAC Satellite (+857)</option>
                                            <option value="7">Andorra (+376)</option>
                                            <option value="8">Angola (+244)</option>
                                            <option value="9">Anguilla (+1264)</option>
                                            <option value="10">Antigua and Barbuda (+1268)</option>
                                            <option value="11">Argentina (+54)</option>
                                            <option value="12">Armenia (+374)</option>
                                            <option value="13">Aruba (+297)</option>
                                            <option value="14">Ascension (+247)</option>
                                            <option value="15">Australia (+61)</option>
                                            <option value="16">Australian External Territories (+672)</option>
                                            <option value="17">Austria (+43)</option>
                                            <option value="18">Azerbaijan (+994)</option>
                                            <option value="19">Bahamas (+1242)</option>
                                            <option value="20">Bahrain (+973)</option>
                                            <option value="21">Bangladesh (+880)</option>
                                            <option value="22">Barbados (+1246)</option>
                                            <option value="23">Barbuda (+1268)</option>
                                            <option value="24">Belarus (+375)</option>
                                            <option value="25">Belgium (+32)</option>
                                            <option value="26">Belize (+501)</option>
                                            <option value="27">Benin (+229)</option>
                                            <option value="28">Bermuda (+1441)</option>
                                            <option value="29">Bhutan (+975)</option>
                                            <option value="30">Bolivia (+591)</option>
                                            <option value="31">Bosnia and Herzegovina (+387)</option>
                                            <option value="32">Botswana (+267)</option>
                                            <option value="33">Brazil (+55)</option>
                                            <option value="34">British Indian Ocean Territory (+246)</option>
                                            <option value="35">British Virgin Islands (+1284)</option>
                                            <option value="36">Brunei (+673)</option>
                                            <option value="37">Bulgaria (+359)</option>
                                            <option value="38">Burkina Faso (+226)</option>
                                            <option value="39">Burundi (+257)</option>
                                            <option value="40">Cambodia (+855)</option>
                                            <option value="41">Cameroon (+237)</option>
                                            <option value="42">Canada (+1)</option>
                                            <option value="43">Cape Verde (+238)</option>
                                            <option value="44">Cayman Islands (+1345)</option>
                                            <option value="45">Central African Republic (+236)</option>
                                            <option value="46">Chad (+235)</option>
                                            <option value="47">Chatham Island (New Zealand) (+64)</option>
                                            <option value="48">Chile (+56)</option>
                                            <option value="49">China (+86)</option>
                                            <option value="50">Christmas Island (+61)</option>
                                            <option value="51">Cocos-Keeling Islands (+61)</option>
                                            <option value="52">Colombia (+57)</option>
                                            <option value="53">Comoros (+269)</option>
                                            <option value="54">Congo (+242)</option>
                                            <option value="55">Congo - Brazzaville (+242)</option>
                                            <option value="57">Congo - Kinshasa (+243)</option>
                                            <option value="56">Congo, Dem. Rep. of (Zaire) (+243)</option>
                                            <option value="58">Cook Islands (+682)</option>
                                            <option value="59">Costa Rica (+506)</option>
                                            <option value="61">Croatia (+385)</option>
                                            <option value="62">Cuba (+53)</option>
                                            <option value="63">Cuba (Guantanamo Bay) (+5399)</option>
                                            <option value="64">Cura?ao (+599)</option>
                                            <option value="65">Cyprus (+357)</option>
                                            <option value="66">Czech Republic (+420)</option>
                                            <option value="67">Denmark (+45)</option>
                                            <option value="68">Diego Garcia (+246)</option>
                                            <option value="69">Djibouti (+253)</option>
                                            <option value="70">Dominica (+1767)</option>
                                            <option value="71">Dominican Republic (+1809)</option>
                                            <option value="72">East Timor (+670)</option>
                                            <option value="73">Easter Island (+56)</option>
                                            <option value="74">Ecuador (+593)</option>
                                            <option value="75">Egypt (+20)</option>
                                            <option value="76">El Salvador (+503)</option>
                                            <option value="77">Ellipso (Mobile Satellite servic (+8812)</option>
                                            <option value="78">EMSAT (Mobile Satellite service) (+88213)</option>
                                            <option value="79">Equatorial Guinea (+240)</option>
                                            <option value="80">Eritrea (+291)</option>
                                            <option value="81">Estonia (+372)</option>
                                            <option value="82">Ethiopia (+251)</option>
                                            <option value="83">Falkland Islands (+500)</option>
                                            <option value="84">Faroe Islands (+298)</option>
                                            <option value="85">Fiji (+679)</option>
                                            <option value="86">Finland (+358)</option>
                                            <option value="87">France (+33)</option>
                                            <option value="88">French Antilles (+596)</option>
                                            <option value="89">French Guiana (+594)</option>
                                            <option value="90">French Polynesia (+689)</option>
                                            <option value="91">Gabon (+241)</option>
                                            <option value="92">Gambia (+220)</option>
                                            <option value="93">Georgia (+995)</option>
                                            <option value="94">Germany (+49)</option>
                                            <option value="95">Ghana (+233)</option>
                                            <option value="96">Gibraltar (+350)</option>
                                            <option value="97">Global Mobile Satellite System ( (+881)</option>
                                            <option value="98">Globalstar (Mobile Satellite Ser (+8818)</option>
                                            <option value="99">Greece (+30)</option>
                                            <option value="100">Greenland (+299)</option>
                                            <option value="101">Grenada (+1473)</option>
                                            <option value="102">Guadeloupe (+590)</option>
                                            <option value="103">Guam (+1671)</option>
                                            <option value="104">Guantanamo Bay (+5399)</option>
                                            <option value="105">Guatemala (+502)</option>
                                            <option value="106">Guinea (+224)</option>
                                            <option value="107">Guinea-Bissau (+245)</option>
                                            <option value="108">Guyana (+592)</option>
                                            <option value="109">Haiti (+509)</option>
                                            <option value="110">Honduras (+504)</option>
                                            <option value="111">Hong Kong (+852)</option>
                                            <option value="112">Hungary (+36)</option>
                                            <option value="113">Iceland (+354)</option>
                                            <option value="114">ICO Global (Mobile Satellite Ser (+8810)</option>
                                            <option value="115" selected="selected">India (+91)</option>
                                            <option value="116">Indonesia (+62)</option>
                                            <option value="117">Inmarsat SNAC (+870)</option>
                                            <option value="118">International Freephone Service (+800)</option>
                                            <option value="119">International Shared Cost Servic (+808)</option>
                                            <option value="120">Iran (+98)</option>
                                            <option value="121">Iraq (+964)</option>
                                            <option value="122">Ireland (+353)</option>
                                            <option value="123">Iridium (Mobile Satellite servic (+8816)</option>
                                            <option value="124">Israel (+972)</option>
                                            <option value="125">Italy (+39)</option>
                                            <option value="60">Ivory Coast (+225)</option>
                                            <option value="126">Jamaica (+1876)</option>
                                            <option value="127">Japan (+81)</option>
                                            <option value="128">Jordan (+962)</option>
                                            <option value="129">Kazakhstan (+76)</option>
                                            <option value="130">Kenya (+254)</option>
                                            <option value="131">Kiribati (+686)</option>
                                            <option value="134">Kuwait (+965)</option>
                                            <option value="135">Kyrgyzstan (+996)</option>
                                            <option value="136">Laos (+856)</option>
                                            <option value="137">Latvia (+371)</option>
                                            <option value="138">Lebanon (+961)</option>
                                            <option value="139">Lesotho (+266)</option>
                                            <option value="140">Liberia (+231)</option>
                                            <option value="141">Libya (+218)</option>
                                            <option value="142">Liechtenstein (+423)</option>
                                            <option value="143">Lithuania (+370)</option>
                                            <option value="144">Luxembourg (+352)</option>
                                            <option value="145">Macau SAR China (+853)</option>
                                            <option value="146">Macedonia (+389)</option>
                                            <option value="147">Madagascar (+261)</option>
                                            <option value="148">Malawi (+265)</option>
                                            <option value="149">Malaysia (+60)</option>
                                            <option value="150">Maldives (+960)</option>
                                            <option value="151">Mali (+223)</option>
                                            <option value="152">Malta (+356)</option>
                                            <option value="153">Marshall Islands (+692)</option>
                                            <option value="154">Martinique (+596)</option>
                                            <option value="155">Mauritania (+222)</option>
                                            <option value="156">Mauritius (+230)</option>
                                            <option value="157">Mayotte (+262)</option>
                                            <option value="158">Mexico (+52)</option>
                                            <option value="159">Micronesia (+691)</option>
                                            <option value="160">Midway Island (+1808)</option>
                                            <option value="161">Moldova (+373)</option>
                                            <option value="162">Monaco (+377)</option>
                                            <option value="163">Mongolia (+976)</option>
                                            <option value="164">Montenegro (+382)</option>
                                            <option value="165">Montserrat (+1664)</option>
                                            <option value="166">Morocco (+212)</option>
                                            <option value="167">Mozambique (+258)</option>
                                            <option value="168">Myanmar (+95)</option>
                                            <option value="169">Namibia (+264)</option>
                                            <option value="170">Nauru (+674)</option>
                                            <option value="171">Nepal (+977)</option>
                                            <option value="172">Netherlands (+31)</option>
                                            <option value="173">Netherlands Antilles (+599)</option>
                                            <option value="174">Nevis (+1869)</option>
                                            <option value="175">New Caledonia (+687)</option>
                                            <option value="176">New Zealand (+64)</option>
                                            <option value="177">Nicaragua (+505)</option>
                                            <option value="178">Niger (+227)</option>
                                            <option value="179">Nigeria (+234)</option>
                                            <option value="180">Niue (+683)</option>
                                            <option value="181">Norfolk Island (+672)</option>
                                            <option value="132">North Korea (+850)</option>
                                            <option value="182">Northern Mariana Islands (+1670)</option>
                                            <option value="183">Norway (+47)</option>
                                            <option value="184">Oman (+968)</option>
                                            <option value="185">Pakistan (+92)</option>
                                            <option value="186">Palau (+680)</option>
                                            <option value="187">Palestinian territories (+970)</option>
                                            <option value="188">Panama (+507)</option>
                                            <option value="189">Papua New Guinea (+675)</option>
                                            <option value="190">Paraguay (+595)</option>
                                            <option value="191">Peru (+51)</option>
                                            <option value="192">Philippines (+63)</option>
                                            <option value="193">Poland (+48)</option>
                                            <option value="194">Portugal (+351)</option>
                                            <option value="195">Puerto Rico (+1787)</option>
                                            <option value="196">Qatar (+974)</option>
                                            <option value="197">R?union (+262)</option>
                                            <option value="198">Romania (+40)</option>
                                            <option value="199">Russia (+7)</option>
                                            <option value="200">Rwanda (+250)</option>
                                            <option value="210">S?o Tom? and Pr?ncipe (+239)</option>
                                            <option value="201">Saint Barth?lemy (+590)</option>
                                            <option value="202">Saint Helena (+290)</option>
                                            <option value="203">Saint Kitts and Nevis (+1869)</option>
                                            <option value="204">Saint Lucia (+1758)</option>
                                            <option value="205">Saint Martin (+590)</option>
                                            <option value="206">Saint Pierre and Miquelon (+508)</option>
                                            <option value="207">Saint Vincent and the Grenadines (+1784)</option>
                                            <option value="208">Samoa (+685)</option>
                                            <option value="209">San Marino (+378)</option>
                                            <option value="211">Saudi Arabia (+966)</option>
                                            <option value="212">Senegal (+221)</option>
                                            <option value="213">Serbia (+381)</option>
                                            <option value="214">Seychelles (+248)</option>
                                            <option value="215">Sierra Leone (+232)</option>
                                            <option value="216">Singapore (+65)</option>
                                            <option value="217">Sint Maarten (+599)</option>
                                            <option value="218">Slovakia (+421)</option>
                                            <option value="219">Slovenia (+386)</option>
                                            <option value="220">Solomon Islands (+677)</option>
                                            <option value="221">Somalia (+252)</option>
                                            <option value="222">South Africa (+27)</option>
                                            <option value="223">South Georgia and the South Sand (+500)</option>
                                            <option value="133">South Korea (+82)</option>
                                            <option value="224">Spain (+34)</option>
                                            <option value="225">Sri Lanka (+94)</option>
                                            <option value="226">Sudan (+249)</option>
                                            <option value="227">Suriname (+597)</option>
                                            <option value="228">Swaziland (+268)</option>
                                            <option value="229">Sweden (+46)</option>
                                            <option value="230">Switzerland (+41)</option>
                                            <option value="231">Syria (+963)</option>
                                            <option value="232">Taiwan (+886)</option>
                                            <option value="233">Tajikistan (+992)</option>
                                            <option value="234">Tanzania (+255)</option>
                                            <option value="235">Thailand (+66)</option>
                                            <option value="236">Thuraya (Mobile Satellite servic (+88216)</option>
                                            <option value="237">Timor-Leste (+670)</option>
                                            <option value="238">Togo (+228)</option>
                                            <option value="239">Tokelau (+690)</option>
                                            <option value="240">Tonga (+676)</option>
                                            <option value="241">Trinidad and Tobago (+1868)</option>
                                            <option value="242">Tunisia (+216)</option>
                                            <option value="243">Turkey (+90)</option>
                                            <option value="244">Turkmenistan (+993)</option>
                                            <option value="245">Turks and Caicos Islands (+1649)</option>
                                            <option value="246">Tuvalu (+688)</option>
                                            <option value="254">U.S. Virgin Islands (+1340)</option>
                                            <option value="247">Uganda (+256)</option>
                                            <option value="248">Ukraine (+380)</option>
                                            <option value="249">United Arab Emirates (+971)</option>
                                            <option value="250">United Kingdom (+44)</option>
                                            <option value="251">United States (+1)</option>
                                            <option value="252">Universal Personal Telecommunica (+878)</option>
                                            <option value="253">Uruguay (+598)</option>
                                            <option value="255">Uzbekistan (+998)</option>
                                            <option value="256">Vanuatu (+678)</option>
                                            <option value="257">Vatican (+39066)</option>
                                            <option value="258">Venezuela (+58)</option>
                                            <option value="259">Vietnam (+84)</option>
                                            <option value="260">Wake Island (+1808)</option>
                                            <option value="261">Wallis and Futuna (+681)</option>
                                            <option value="262">Yemen (+967)</option>
                                            <option value="263">Zambia (+260)</option>
                                            <option value="264">Zanzibar (+255)</option>
                                            <option value="265">Zimbabwe (+263)</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4"> Phone *
                                        <input type="number" maxlength="13" name="gmobile" placeholder="Mobile Number" size="13" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <!--Service Starting Date *
                    <input type="text" name="cd" required="" id="mydate" value="28 Sep 2017" readonly="readonly" class="form-control6">  -->
                                    </div>
                                    <div class="col-md-6">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="right-sidebar shopping-cart-total">
                            <table class="table total-order small">
                                <tbody>
                                    <tr>
                                        <th>Item</th>
                                        <th align="right" style="text-align:right;">Price (SGD)</th>
                                    </tr>
                                    <tr>
                                        <td>Total</td>
                                        <td align="right"><strong> SGD 42</strong></td>
                                    </tr>
                         
                                    <tr class="heads">
                                        <td><strong>Order Total</strong></td>
                                        <td align="right"><strong>SGD 42              <input type="hidden" value="42" name="net"></strong></td>
                                    </tr>
                                </tbody>
                            </table>
                            <hr>
                            <h4 class="text-uppercase text-muted text-center"><strong>Payment Methods</strong></h4>
                            <ul class="list-unstyled payment-method">
                                <li></li>
                                <hr>
                                <li>
                                    <label class="radio-inline">
                                        <input type="radio" name="p_method" value="1" required=""> Use Apollo Credit From Your Account</label>
                                </li>
                                <li>
                                    <label class="radio-inline">
                                        <input type="radio" name="p_method" value="2" required=""> Pay Online</label>
                                </li>
                            </ul>
                            <hr>
                            <p>
                                <label class="checkbox-inline">
                                    <!-- <input type="checkbox"  onchange="window.location.href='https://apollogo.net/terms-conditions.php?pn=checkout.php'" required> -->
                                    <input type="checkbox" id="finRot" name="con" value="" required="">
                                    <a href="#" data-toggle="modal" data-target="#myModal1">  I have read and accept the terms &amp; conditions </a></label>
                            </p>
                            <!-- Modal -->
                            <div class="modal fade" id="myModal1" role="dialog">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                           <h4> Terms & Conditions</h4>
                                        </div>
                                        <div class="modal-body">
                                            <!-- Modal content-->
                                            <div class="small">
                                                <!-- Modal -->
                                                <div class="table-responsive">
                                                    <table class="table cart-table">
                                                        <tbody>
                                                            <tr>
                                                                <td class="">
                                                                    <h4>Cancellation Policy</h4> • 30% cancellation charge will be imposed if notification is less than 48 hours
                                                                    <br> • 20% cancellation charge will be imposed if notification is more than 48 hours
                                                                    <h4>Disclaimer/Rules &amp; Regulations</h4> • All tickets are non-transferable and non-exchangeable.
                                                                    <br> • Credit will not be refunded for any unused tickets and cannot be used to redeem future purchases.
                                                                    <br> • Your credit card will be charged regardless whether or not the ticket is used once you purchase the attractions ticket.
                                                                    <br> • By completing the purchase, you must read and accept the User Agreement.
                                                                    <br> • You are responsible for ensuring compliance with the immigration, custom or any other legal requirements of the countries of your destination. Kindly ensure that for International destinations you possess a valid passport with at least six (6) months validity and the applicable valid visas.
                                                                    <br> • Although we will exercise every safety precaution, the Company will not be held responsible for any personal injury or mishap that may occur during the rides.
                                                                    <br>
                                                                    <h4>Terms of Use</h4> Disclaimer of Warranties and Liability The Contents of this website are provided on an “as is” basis without warranties of any kind. The COMPANY is not responsible for any errors or omissions, or for the results obtained or consequences arising from the use of any of the Contents, or for the authenticity or integrity of any transactions or communications made through this website.
                                                                    <br>
                                                                    <br> To the fullest extent permitted by law, the COMPANY does not make any representations or warranties whatsoever and hereby disclaim any and all warranties including express, implied and/or statutory warranties of any kind to you or any third party, whether arising from usage or custom or trade or by operation of law or otherwise, including but not limited to the following:
                                                                    <br>
                                                                    <br> • Any representations or warranties as to the accuracy, completeness, correctness, reliability, currency, timeliness, non-infringement, title, merchantability, quality or fitness for any particular purpose of the Contents of this website; and
                                                                    <br>
                                                                    <br> The COMPANY shall also not be liable to you or any third party for any loss, injury, claims, actions, costs, expenses or other damage of any kind, whatsoever and howsoever caused, including but not limited to any direct, indirect, punitive, special or consequential damages, loss of income, revenue or profits, lost or damaged data, or damage to your computer, software, modem, telephone or other property, howsoever
                                                                    <br>
                                                                    <br> Further, the COMPANY shall not be liable for damages, losses, injuries, claims, actions, costs and/or expenses of any kind arising from its failure or delay in performing any or all of its obligations if such failure or delay is due to circumstances or causes beyond its reasonable control.
                                                                    <br>
                                                                    <h4>Indemnity</h4> You hereby agree to indemnify COMPANY and hold COMPANY harmless from and against any and all claims, losses, liabilities, costs and expenses (including but not limited to legal costs and expenses on a full indemnity basis) made against or suffered or incurred by COMPANY and/or the Administration Body arising directly or indirectly out of:
                                                                    <br> a. your access to or use of this website; or
                                                                    <br> b. your breach of any of these Terms and Conditions of Use.
                                                                    <br>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <div class="col-sm-4" align="center"></div>
                                                                    <div class="col-sm-3" align="center">
                                                                        <button type="button" class="btn btn-block text-uppercase btn-primary login" onclick="document.getElementById('finRot').checked=!document.getElementById('finRot').checked;" data-dismiss="modal" aria-label="Close">Continue <i class="fa fa-arrow-right"></i> </button>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <button type="submit" class="btn btn-block btn-primary login" name="book">Place Order</button>
                        </div>
                    </div>
                </div>
            </div>  </div>

      


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
