<?php
	global $wpdb;
   	$getFeedbacklistQuery ="SELECT * FROM feedback_crud";
   	$FeedbackListData = $wpdb->get_results($getFeedbacklistQuery);
    //print_r($FeedbackListData);
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  <div class="container">
  	<div class="col-md-8 mx-auto">
<table border = "1">
	<tr>
		<th>sno</th>
		<th>FirstName</th>
		<th>Lastname</th>
		<th>Email</th>
		<th>Subject</th>
		<th>Message</th>
	</tr>
	<?php
		$sn = 1; 
   foreach ($FeedbackListData as $feedData) {?>
   	<tr>
   		<td><?php echo $sn++; ?></td>
		<td><?php echo $feedData->firstname; ?></td>
		<td><?php echo $feedData->lastname; ?></td>
		<td><?php echo $feedData->user_email; ?></td>
		<td><?php echo $feedData->subject; ?></td>
		<td><?php echo $feedData->message;?></td>
	</tr>
	<?php } ?>
</table>
</div>
</div>

  