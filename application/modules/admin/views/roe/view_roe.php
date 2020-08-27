<?php 
$this->load->view('admin/header');
$this->load->view('admin/right-sidebar');
?>
<style type="text/css">
body, html {
    margin:0;
    padding;
    height:100%
}

a {
    font-size:1.25em;
}

#content {
    padding:25px;
}

#fade {
    display: none;
    position:absolute;
    top: 0%;
    left: 0%;
    width: 100%;
    height: 100%;
    background-color: #ababab;
    z-index: 1001;
    -moz-opacity: 0.8;
    opacity: .70;
    filter: alpha(opacity=80);
}

#modal {
    display: none;
    position: absolute;
    top: 45%;
    left: 45%;
    width: 64px;
    height: 64px;
    padding:30px 15px 0px;
    border: 3px solid #ababab;
    box-shadow:1px 1px 10px #ababab;
    border-radius:20px;
    background-color: white;
    z-index: 1002;
    text-align:center;
    overflow: auto;
}

#results {
    font-size:1.25em;
    color:red
}
</style>
    <link href="<?php echo base_url(); ?>assets/css/table-responsive.css" rel="stylesheet">
    <!--middle contaen-->
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            <h3><i class="fa fa-angle-right"></i>Roe Master</h3>
            <div class="content-panel">
            <?php
				echo showmsg($this->session->flashdata('msg'));
			?>
            
             <div id="fade"></div>
        <div id="modal">
            <img id="loader" src="loader.gif" />
        </div>        
                            <section id="no-more-tables">
                                <table class="table table-bordered table-striped table-condensed cf">
                                    <thead class="cf">
                                        <tr>
                                            <th>SL#</th>
                                            <th>USD</th>
                                            <th>THB</th>
                                             <th>AUD</th>
											 <th>CNY</th>
                                             <th>INR</th>
                                             <th>AED</th>
                                             <th>ROE Date</th>
                                             <th>Action</th>
                                            <!--<th><i class=" fa fa-edit"></i> Action</th>-->
                                        </tr>
                                    </thead>
                                    <?php 
				                        if(is_array($pages)){

                                    ?>
                                        <?php $i=++$page;?>
                                            <tbody>
                                                <?php 
				 
				      foreach($pages as $row){ ?>
                        <tr>
                            <td data-title="SL#">
                                <?php echo $i ; ?>
                            </td>
                            <td data-title="MYR To USD">
                                 <?php echo $row['usd'] ; ?>
                            </td>

                            <td data-title="MYR To THB">
                                <?php echo $row['THB'] ; ?>
                            </td>
                             <td data-title="MYR To AUD">
                                
                                 <?php echo $row['AUD'] ; ?>
    							                                                          
                            </td>
                             <td data-title="MYR To CNY">                                
                                 <?php echo $row['CNY'] ; ?>                                                                                                     </td>
                            <td data-title="MYR To INR">
                                <?php echo $row['inr'] ; ?>
                            </td>
                            <td data-title="MYR To AED">
                                <?php echo $row['aed'] ; ?>
                            </td> 
                            <td data-title="ROE Date">
                                <?php echo $row['roe_date'] ; ?>
                            </td> 
                              <td data-title="Action">
                                <!-- class="btn btn-default btn-xs"  href="<?php echo ADMIN_URL. "roe/view/".$row['id']."/".($page-1);?>" title="View" ><i class="fa fa-eye"></i></a>-->
                            <?php 
                              $dt=date('Y/m/d');
                              if($row['roe_date']==$dt)
                              {
                            ?>
                                    <a class="btn btn-primary btn-xs" href="<?php echo base_url() ."admin/roe/edit/".$row['id']; ?>" onclick="return confirm('Are you sure you want to edit <?php echo $row['id'] ; ?>?');" title="Edit"><i class="fa fa-pencil"></i></a>
                                                            <!---end edit page---->
                                                            <!---status----->
                                    
                                                                        <!----end status------>
                                 <!----delete------>
                                <a class="btn btn-danger btn-xs" href="<?php echo base_url(). "admin/roe/delete/".$row['id'];  ?>" onclick="return confirm('Are you sure you want to delete<?php echo $row['id'] ; ?>  ?');" title="Remove"><i class="fa fa-trash-o "></i></a>
                            <?php 
                        }
                         else
                         {
                            echo "N/A";
                         } ?>
                                                                        <!----end delete------>
                            </td>
                        </tr>
                             <?php $i++; } ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td colspan="15">
                                                        <div class="pagination custom_pagination">
                                                            <?php echo $links; ?>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php }else{ ?>
                                                    <tr>
                                                        <td colspan="15">Record not available.</td>
                                                    </tr>
                                                    <?php  } ?>
                                </table>
                            </section>
                        </div>
                        </div>
                        <!-- /content-panel -->
                    </div>
                    <!-- /col-lg-12 -->
                </div>
                <!-- /row -->
        </section>
        <! --/wrapper -->
    </section>
    <!-- /MAIN CONTENT -->
    <!--main content end-->
    <!--content end-->
 <script>
	
	function openModal() {
        document.getElementById('modal').style.display = 'block';
        document.getElementById('fade').style.display = 'block';
}

function closeModal() {
    document.getElementById('modal').style.display = 'none';
    document.getElementById('fade').style.display = 'none';
}

	function updatepriority(id,val)
		{
			openModal();
			//alert(val);
			var xmlhttp;
			if(navigator.appName=="Microsoft Internet Explorer")
				{ 
					xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
				}
			else
				{
					xmlhttp = new XMLHttpRequest();
				}
			
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			closeModal();
            }
        }
        xmlhttp.open("GET", "priority/?p="+val+"&id="+id, true);
        xmlhttp.send();
		
		}
				
		
</script>

<!--content end-->
<?php 
$this->load->view('admin/footer');
?>
