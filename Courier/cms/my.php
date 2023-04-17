 <!-- Google Font: Source Sans Pro -->
 <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
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
// 	$from_branch_id = $from_branch_id  > 0 ? $from_branch_id  : '-1';
// $branch = array();
//  $branches = $conn->query("SELECT *,concat(street,', ',city,', ',state,', ',zip_code,', ',country) as address FROM branches where id in ($to_branch_id,$from_branch_id)");
//     while($row = $branches->fetch_assoc()):
//     	$branch[$row['id']] = $row['address'];
// 	endwhile;
}
?>
 <table class="table table-bordered">
   
   <tr>
   <td colspan='1'>
       <div class='logoarea row p-2'>
          <div class="col-lg-3">
            <img src="../img/logo.png" alt="" width='50px'>
          </div>
       <div class="col-lg-8">
         <b class="text "><span class="fontbig">Cargo PC </sapn><br><span class="text2"> Delivery Online</span></b>
       </div>
    </div>
   </td>
   <td colspan='2'>
       <img src="../img/sku.jpg" alt="" id="img" width="100%"> <br>
       <p class="text-center"> 
       <b>CP<?php echo explode('/',$reference_number)[1] ?></b> <br>
       <small>Account Copy</small>
       </p>
   </td>
  
     <td>
       <p>Pick up <br> Date: <br> <?php echo $pickup ?></p>
       <hr style="padding:30px">
       <p>Carrier: <br> CPCD</p>
     </td>
     <td>
       <p>Delivery <br> Date: <br> <?php echo $length ?></p>
       <hr style="padding:30px">
       <p>Carrier Reference No: <br> <?php echo $reference_number ?></p>
     </td>
    
   
   </tr>
   <tr>
     <td><b>Shipper</b></td>
     <td><?php echo ucwords($sender_name) ?></td>
     <td><b>Reciver</b></td>
     <td><?php echo ucwords($recipient_name) ?></td>
     <td>Status: <?php
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

   </tr>
   <tr>
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
     <td rowspan="3"> <b>Comment:</b> <br>
       The reciever should be <br> aware  that he/she have <br>to pay 
       for  the  Clearance and delivery 
     </td>
   </tr>
   <tr>
     <td >Delivery Type: <br>
     <?php echo $type == 1 ? "<span class='badge badge-primary'>Deliver to Recipient</span>":"<span class='badge badge-info'>Pickup</span>" ?>
    </td>
     <td colspan="2"> <b>Product:</b>  <br>
     <?php echo ucwords($from_branch_id) ?>
						<?php if($type == 2): ?>
							<dt>Nearest Branch to Recipient for Pickup:</dt>
							<dd><?php echo ucwords($branch[$to_branch_id]) ?>
						<?php endif; ?></td>
                        <td >Weight:<br> <?php echo $weight ?></td>
   </tr>
   <tr>
   <td >Local Sales Tax(%): <br> <?php echo $width ?></td>
     <td colspan="2">Insurance: <br>
     <?php echo $height ?></td>
     <td>price: <br> $<?php echo number_format($price,2) ?></td>
   </tr>
</table>


<div class="modal-footer display p-0 m-0 col-lg-12">
     <button type="button" class="btn btn-warning printbtn col-lg-12"><i class="fa fa-print"></i></button>
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
