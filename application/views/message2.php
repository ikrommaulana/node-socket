<html>
<head>
	<title>Realtime Notification using Socket.IO in Codeigniter</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<style>
		h3{
		font-family: Verdana;
		font-size: 18pt;
		font-style: normal;
		font-weight: bold;
		color:red;
		text-align: center;
		}
	</style>
	<h3>Realtime Notification using Socket.IO in Codeigniter</h3>
	<div class="container">
		<div style="float:right;"><p><h4>Messages: <b><span id="msgcount"></span></b></h4></p></div>
		<table class="table">
			<thead>
				<tr>
					<th>Date</th>
					<th>Message</th>
				</tr>
			</thead>
			<tbody id="message-tbody">
			<?php foreach($allMsgs as $row){ ?>
				<tr><td><?php echo $row['date']; ?></td><td><?php echo $row['msg']; ?></td></tr>
			<?php } ?>
			</tbody>
		</table>
	</div>
	<script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js');?>"></script>
	<script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>
	<script src="<?php echo base_url('node_modules/socket.io-client/dist/socket.io.js');?>"></script>
	<script>

	var socket = io.connect( 'http://'+window.location.hostname+':3000' );
	socket.on( 'new_message', function( data ) {
		$("#message-tbody").prepend('<tr><td>'+data.date+'</td><td>'+data.message+'</td></tr>');
		$("#msgcount").text(data.msgcount);
	});
	</script>
</body>
</html>