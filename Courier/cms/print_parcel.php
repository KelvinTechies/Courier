 <!-- Google Font: Source Sans Pro -->
 <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link href="../css/o.css" rel="stylesheet" type="text/css">  
  <link rel="stylesheet" href="assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- DataTables -->
  <link rel="stylesheet" href="assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
   <!-- Select2 -->
  <link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
   <!-- SweetAlert2 -->
  <link rel="stylesheet" href="assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="assets/plugins/toastr/toastr.min.css">
  <!-- dropzonejs -->
  <link rel="stylesheet" href="assets/plugins/dropzone/min/dropzone.min.css">
  <!-- DateTimePicker -->
  <link rel="stylesheet" href="assets/dist/css/jquery.datetimepicker.min.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Switch Toggle -->
  <link rel="stylesheet" href="assets/plugins/bootstrap4-toggle/css/bootstrap4-toggle.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="assets/dist/css/styles.css">
	<script src="assets/plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="assets/plugins/jquery-ui/jquery-ui.min.js"></script>

<?php
include 'db_connect.php';
$ref = $_GET['id'];
$qry = $conn->query("SELECT * FROM parcels where reference_number = '$ref' ")->fetch_array();
if ($qry) {

foreach($qry as $k => $v){
	$$k = $v;
}
if($to_branch_id > 0 || $from_branch_id > 0){
	$to_branch_id = $to_branch_id  > 0 ? $to_branch_id  : '-1';
	$from_branch_id = $from_branch_id  > 0 ? $from_branch_id  : '-1';
$branch = array();
 $branches = $conn->query("SELECT *,concat(street,', ',city,', ',state,', ',zip_code,', ',country) as address FROM branches where id in ($to_branch_id,$from_branch_id)");
    while($row = $branches->fetch_assoc()):
    	$branch[$row['id']] = $row['address'];
	endwhile;
}
?>
<div class='font-weight-bold'>
<div class='mb-2 '>
          <div class="">
            <img src="../img/Express-Logistics3.png" alt="" width='' height='70px'>
          </div>
       <!-- <div class="col-lg-8">
         <b class="text "><span class="fontbig">Cargo PC </sapn><br><span class="text2"> Delivery Online</span></b>
       </div> -->
    </div>


     <div class="feature-box icon-square ">
                            
                            <div class="text d-flex justify-content-around">
                                <p> Address: <i class="fa fa-map-marker"></i> 3754 Heavner Court, New York, United States<br>
                                   <p>Phone: <i class="fa fa-phone"></i> +(321)999-0227</p>
                                    <p>Email:<i class="fa fa-envelope"></i> email@express-Logistics.co
                                </p>
                                </div>
                                </div>
    <h1 class='text-center text-danger'>Invoice</h1>
 <table width='100%' border='1'>
   <tr>
     <th class='font-weight-bold'>Sender</th>
     <th class='font-weight-bold'>Receiver</th>
     <th class='font-weight-bold'>Origin</th>
     <th class='font-weight-bold'>Destination</th>
   </tr>
   <tr>
     <td class='font-weight-bold'><?php echo ucwords($sender_name) ?></td>
     <td class='font-weight-bold'><?php echo ucwords($recipient_name) ?></td>
    <td class='font-weight-bold'> <?php echo ucwords($sender_address) ?> </td>
    <td class='font-weight-bold'> <?php echo ucwords($recipient_address) ?></td>
    <td class='font-weight-bold'>
   </tr>
   <!-- <tr>
     <td colspan="2">
       <h5>Origin:</h5><p>
       <?php echo ucwords($sender_address) ?> 
       <br>
       <?php echo ucwords($sender_contact) ?>
          </p>
     </td>
     <td colspan="2">
<h5>Destination:</h5><p>
<?php echo ucwords($recipient_address) ?>
<br>
<?php echo ucwords($recipient_email) ?>
<br>
<?php echo ucwords($recipient_contact) ?>
          </p>
     </td>
   -->
</table>
   <p><b>Shipment Details</b></p>
   <table width='100%' border='1'>
     <tr>
     <th class='font-weight-bold'>Tracking Id</th>
     <th class='font-weight-bold'>Product</th>
     <!-- <th class='font-weight-bold'>Shipment Mode</th>      -->
     <th class='font-weight-bold'>Weight</th>
     <th class='font-weight-bold'>Status</th>
     <th class='font-weight-bold'>Pick up Date</th>
     <th class='font-weight-bold'>Delivery Date</th>
     </tr>

     <tr>
    <td class='font-weight-bold'> <?php echo $reference_number ?>  </td> 
    <td class='font-weight-bold'><?php echo ucwords($from_branch_id) ?>
						<?php if($type == 2): ?>
							<dt>Nearest Branch to Recipient for Pickup:</dt>
							<dd><?php echo ucwords($branch[$to_branch_id]) ?>
						<?php endif; ?></td>  
     <td class='font-weight-bold'> <?php echo $weight ?></td>
     <td class='font-weight-bold'><?php
     switch ($status) {
         case '1':
             echo "<span class='badge badge-pill badge-info'> Collected</span>";
             break;
         case '2':
             echo "<span class='badge badge-pill badge-info'> Shipped</span>";
             break;
         case '3':
             echo "<span class='badge badge-pill badge-primary'> In-Transit</span>";
             break;
         case '4':
             echo "<span class='badge badge-pill badge-primary'> Arrived At Destination</span>";
             break;
         case '5':
             echo "<span class='badge badge-pill badge-primary'> Out for Delivery</span>";
             break;
         case '6':
             echo "<span class='badge badge-pill badge-primary'> Ready to Pickup</span>";
             break;
         case '7':
             echo "<span class='badge badge-pill badge-success'>Delivered</span>";
             break;
         case '8':
             echo "<span class='badge badge-pill badge-success'> Picked-up</span>";
             break;
         case '9':
             echo "<span class='badge badge-pill badge-danger'> Unsuccessfull Delivery Attempt</span>";
             break;
         
         default:
             echo "<span class='badge badge-pill badge-info'> Item Accepted by Courier</span>";
             
             break;
     }

     ?> </td>
       <td class='font-weight-bold'><?php echo $pickup ?></td>
       <td class='font-weight-bold'><?php echo $length ?></td>
     </tr>
   </table>
<p><b>Item Details</b></p>
<table width='100%' border='1'>
  <tr>
    <th class='font-weight-bold'>Description</th>
    <th class='font-weight-bold'>Delivery Type</th>
    <th class='font-weight-bold'>Quantity</th>
    <th class='font-weight-bold'>Weight</th>
    <th class='font-weight-bold'>Currency</th>
  </tr>

  <tr>
  <td class='font-weight-bold'> The reciever should be  aware  that he/she haveto pay for  the  Clearance and delivery</td>
  <td class='font-weight-bold'><?php echo $type == 1 ? "<span class='badge badge-primary'>Deliver to Recipient</span>":"<span class='badge badge-info'>Pickup</span>" ?></td>
  <td class='font-weight-bold'> <?php echo $height ?></td>
     <td class='font-weight-bold'> <?php echo $weight ?></td>
     <td class='font-weight-bold'>USD</td>
  
  </tr>
  </table>
   
<p><b>Shipment Charges</b></p>
<table width='100%' border='1'>
  <tr>
    <th class='font-weight-bold'>Shipping Cost</th>
    <th class='font-weight-bold'>Quantity</th>    
    <th class='font-weight-bold'>Tax(vat)%</th>
    <th class='font-weight-bold'>Price</th>
  </tr>

  <tr>
  <td class='font-weight-bold'>$<?php echo number_format($price,2) ?></td>
    
    <td class='font-weight-bold'><?php echo $height  ?></td>
  <td class='font-weight-bold'> <?php echo $width?></td>    
  <td class='font-weight-bold'>$<?php echo number_format($price * $height, 2) ?></td>
  </tr>
  </table>

<div id=''>
<!-- <table class='mt-3'>
<td colspan='2'>
       <img src="../img/sku.jpg" alt="" id="img" width="70%"> <br>
       <p class="text-center"> 
       <b>CP<?php echo explode('/',$reference_number)[0] ?></b> <br>
       <small>Account Copy</small>
       </p>
   </td>

</table> -->

<div class='mb-2 '>
          <div class="">
            <img src="../img/bg/visa.png" alt="" width='300px' height='150px'>
          </div>
       <!-- <div class="col-lg-8">
         <b class="text "><span class="fontbig">Cargo PC </sapn><br><span class="text2"> Delivery Online</span></b>
       </div> -->
    </div>
    <div class='mb-2 mr-3' style='float:right'>
          <div class="">
    Sign:
           
            <img src="../img/bg/signature (3)'p;.png" alt="" width='200px' height='40px'>
          </div>
       <!-- <div class="col-lg-8">
         <b class="text "><span class="fontbig">Cargo PC </sapn><br><span class="text2"> Delivery Online</span></b>
       </div> -->
    </div>

</div>
<div class="modal-footer display p-0 m-0 col-lg-12">
     <button type="button" class="btn btn-warning printbtn col-lg-12"><i class="fa fa-print"></i></button>
</div>
</div>


<style>
	#uni_modal .modal-footer{
		display: none
	}
	#uni_modal .modal-footer.display{
		display: flex
	}
</style>
<noscript>
	<style>
		table.table{
			width:100%;
			border-collapse: collapse;
		}
		table.table tr,table.table th, table.table td{
			border:1px solid;
		}
		.text-cnter{
			text-align: center;
		}
	</style>
	<h3 class="text-center"><b>Student Result</b></h3>
</noscript>
<script>
	 printbtn = document.querySelector('.printbtn')
    //  print = document.querySelector('.print')
     printbtn.onclick = () => {
        printbtn.style='display:none;'
        window.print()
     }
</script>
<?php
}else{
	echo "<h1 class='text-center'>Invalid Tracking Id</h1>";
}
?>
