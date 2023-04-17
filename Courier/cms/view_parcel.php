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


 <link href="css/os.css" rel="stylesheet" type="text/css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<div class="container-fluid text-dark">
	<div class="col-lg-12">
		<div class="row">
			<div class="col-md-12">
				<div class="callout callout-info">
					<dl>
						<dt>Tracking Number:</dt>
						<dd> <h4><b class='text-dark'><?php echo $reference_number ?></b></h4></dd>
					</dl>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="callout callout-info">
					<b class="border-bottom border-primary">Sender Information</b>
					<dl>
						<dt>Name:</dt>
						<dd><?php echo ucwords($sender_name) ?></dd>
						<dt>Address:</dt>
						<dd><?php echo ucwords($sender_address) ?></dd>
						<dt>Phone Number:</dt>
						<dd><?php echo ucwords($sender_contact) ?></dd>
						<dt>Email Address:</dt>
						<dd><?php echo ucwords($sender_email) ?></dd>
					</dl>
				</div>
				<div class="callout callout-info">
					<b class="border-bottom border-primary">Recipient Information</b>
					<dl>
						<dt>Name:</dt>
						<dd><?php echo ucwords($recipient_name) ?></dd>
						<dt>Address:</dt>
						<dd><?php echo ucwords($recipient_address) ?></dd>
						<dt>Phone Number:</dt>
						<dd><?php echo ucwords($recipient_contact) ?></dd>
						<dt>Email Address:</dt>
						<dd><?php echo ucwords($recipient_email) ?></dd>
					</dl>
				</div>
			</div>
			<div class="col-md-6">
				<div class="callout callout-info">
					<b class="border-bottom border-primary">Parcel Details</b>
						<div class="row">
							<div class="col-sm-6">
								<dl>
									<dt>Weight:</dt>
									<dd><?php echo $weight ?></dd>
									<dt>Quantity:</dt>
									<dd><?php echo $height ?></dd>
									<dt>Current Country:</dt>
									<dd><marquee class=" text-success"><b><?php echo $country ?></marquee></b> </dd>
									<dt>Price:</dt>
									<dd>$<?php echo number_format($price, 2) ?></dd>
									<dt>Total Price:</dt>
									<dd class='badge badge-success'>$<?php echo number_format($price * $height, 2) ?></dd>
								</dl>	
							</div>
							<div class="col-sm-6">
								<dl>
									<dt>Local Sales Tax(%):</dt>
									<dd><?php echo $width ?></dd>
									<dt>Sent Date:</dt>
									<dd><?php echo $length ?></dd>
									<dt>Type:</dt>
									<dd><?php echo $type == 1 ? "<span class='badge badge-primary'>Deliver to Recipient</span>":"<span class='badge badge-info'>Pickup</span>" ?></dd>
								</dl>	
							</div>
						</div>
					<dl>
						<dt>Product:</dt>
						<dd><?php echo ucwords($from_branch_id) ?></dd>
						<?php if($type == 2): ?>
							<dt>Nearest Branch to Recipient for Pickup:</dt>
							<dd><?php echo ucwords($branch[$to_branch_id]) ?></dd>
						<?php endif; ?>
						<dt>Status:</dt>
						<dd>
						<div class="dd">

						     <div class="text">
											<?php
									switch(ucwords($Transportation)){
										case 'Sorting Center':
									echo "<div id='mydiv'><i class='myic fas fa-shopping-cart icon-light'></i><div class='myp'><p class=''>Your Package is in the Sorting Center</p></div></div>";
									break;
										case 'Air':
									echo "<div id='mydiv'><i class='myic fa-sharp fa-solid fa-plane-departure icon-light'></i><div class='myp'><p class=''>On air</p></div></div>";
									break;
										case 'Airport':
									echo "<div id='mydiv'><i class='myic fa-sharp fa-solid fa-plane-arrival icon-light'></i><div class='myp'><p class=''>Your Package is in the Airport</p></div></div>";
									break;
										case 'Custom':
									echo "<div id='mydiv'><i class='myic fa-solid fa-user-nurse icon-light'></i><div class='myp'><p class=''>Your Package is in Custom's Clearance</p></div></div>";
									break;
									default:
									echo "<i class='myic fa-solid fa-truck-front icon-light'></i><div class='myp'><p class=''>Your Package is Moving to Destination</p></div></div>";
									
									break;
									}
								
									?>
                                                <!-- <h3>Air<br>
                                                    Freight</h3>
                                                <p>Simply put, air freight is one of the best methods for efficient and time-sensitive modes of transport of cargo from one place to another.</p> -->
                                            </div>
                                            </div>
                                            <!-- </div> -->
											
							<?php 
							// switch ($status) {
							// 	case '1':
							// 		echo "<span class='badge badge-pill badge-info'> Collected</span>";
							// 		break;
							// 	case '2':
							// 		echo "<span class='badge badge-pill badge-info'> Shipped</span>";
							// 		break;
							// 	case '3':
							// 		echo "<span class='badge badge-pill badge-primary'> In-Transit</span>";
							// 		break;
							// 	case '4':
							// 		echo "<span class='badge badge-pill badge-primary'> Arrived At Destination</span>";
							// 		break;
							// 	case '5':
							// 		echo "<span class='badge badge-pill badge-primary'> Out for Delivery</span>";
							// 		break;
							// 	case '6':
							// 		echo "<span class='badge badge-pill badge-primary'> Ready to Pickup</span>";
							// 		break;
							// 	case '7':
							// 		echo "<span class='badge badge-pill badge-success'>Delivered</span>";
							// 		break;
							// 	case '8':
							// 		echo "<span class='badge badge-pill badge-success'> Picked-up</span>";
							// 		break;
							// 	case '9':
							// 		echo "<span class='badge badge-pill badge-danger'> Unsuccessfull Delivery Attempt</span>";
							// 		break;
								
							// 	default:
							// 		echo "<span class='badge badge-pill badge-info'> Item Accepted by Courier</span>";
									
							// 		break;
							// }

							?>
							<span class="btn badge badge-primary bg-gradient-primary" id='update_status'><i class="fa fa-edit"></i> Update Status</span>
						</dd>

					</dl>
				</div>
			</div>
		</div>
	</div>
	<iframe width='100%' height='500' src='https://www.google.com/maps?q=<?php echo $latitude;?>, <?php echo $longitude;?>&output=embed'></iframe>
	
</div>
<div class="modal-footer display p-0 m-0">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/fontawesome.min.css" integrity="sha512-giQeaPns4lQTBMRpOOHsYnGw1tGVzbAIHUyHRgn7+6FmiEgGGjaG0T2LZJmAPMzRCl+Cug0ItQ2xDZpTmEc+CQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

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
	$('#update_status').click(function(){
		uni_modal("Update Status of: <?php echo $reference_number ?>","manage_parcel_status.php?id=<?php echo $id ?>&cs=<?php echo $status ?>","")
	})
</script>
<?php
}else{
	echo "<h1 class='text-center'>Invalid Tracking Id</h1>";
}
?>