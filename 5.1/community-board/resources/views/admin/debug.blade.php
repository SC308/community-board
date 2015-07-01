<?php if($storedetails[0]->debug == 1) { ?>
<div class="panel panel-warning">
	<div class="panel-heading"><h3 class="panel-title">Debug</h3></div>
	<div class="panel-body">
		<b class="debug">User Info:</b>
		<b>user</b> {{ Confide::user()->username }}
		<b>email</b> {{ Confide::user()->email }}
		<b>store number</b> {{ Confide::user()->store_id }}
		<b>store data id</b> <?php echo $storedetails[0]->id; ?>	        

		<h1>User</h1>
		<pre>
			<?php
			var_dump(Confide::user());
			?>
		</pre>
	</div>
</div>
<?php	} ?>