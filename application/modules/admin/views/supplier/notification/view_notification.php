<?php 
$this->load->view('supplier/header');
$this->load->view('supplier/right-sidebar');
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
            <h3><i class="fa fa-angle-right"></i> Notification List</h3>
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
                                            <th>Event Name</th>
                                            <th>Notification</th>
                                             <th><i class=" fa fa-edit"></i> Action</th>
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
                                        <td data-title="Event Name">
                                            <?php
                                                 $evt = unserialize($pages[0]['event_id']);
                                                $events = "";
                                                foreach ($evt as $value) {
                                                    $event = showEvents($value);
                                                    if($events == ""){
                                                        $events = $event[0]['name'];
                                                    }
                                                    else
                                                    {
                                                    $events = $events . ", " . $event[0]['name'];
                                                }
                                            }
                                                    echo $events.".";

                                            ?>
                                        </td>
                                        <td data-title="Notification">
                                            <?php echo $row['notification'] ; ?>
                                        </td>
                                        <td data-title="Action">
                                            <a class="btn btn-default btn-xs"  href="<?php echo SUPPLIER_URL. "notification/view/".$row['id']."/".($page-1);?>" title="View" ><i class="fa fa-eye"></i></a>

                                             <?php  if($row['status']==1){?>
                                                <a href="<?php echo base_url() ."supplier/notification/status/".$row['id']."/0 ";?>" class="btn btn-success btn-xs" title="Enable" onclick="return confirm('Are you sure you want to disable <?php $row['id'] ; ?>?');"> <i class="fa fa-check"></i></a>
                                            <?php } else { ?>
                                             <a class="btn btn-warning btn-xs" href="<?php echo base_url() ."supplier/notification/status/".$row['id']."/1 ";?>" title="Disable" onclick="return confirm('Are you sure you want to enable <?php echo $row['id'] ; ?>?');"> <i class="fa fa-check"></i></a>
                                            <?php } ?>

                                            <a class="btn btn-primary btn-xs" href="<?php echo base_url() ."supplier/notification/edit/".$row['id']; ?>" onclick="return confirm('Are you sure you want to edit <?php echo $row['id'] ; ?>?');" title="Edit"><i class="fa 
                                                fa-pencil"></i>
                                            </a>

                                            <a class="btn btn-danger btn-xs" href="<?php echo base_url(). "supplier/notification/delete/".$row['id'];  ?>" onclick="return confirm('Are you sure you want to remove this page?');" title="Remove"><i class="fa fa-trash-o "    ></i>
                                            </a>
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
$this->load->view('supplier/footer');
?>
