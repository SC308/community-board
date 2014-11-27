&nbsp;&nbsp;Store: <select>
	
	<?php
	$stores = Store::getAllStores();
	
	foreach($stores as $store){
		echo "<option value='".$store->id."'>".$store->store_name."</option>";
	}
	?>
</select>