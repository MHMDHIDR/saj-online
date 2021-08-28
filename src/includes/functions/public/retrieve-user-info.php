<?php
	/* Function fo Retrieving the User Info in Unapproved Articles Page */
	function retrieveUserInfo($userName) {
		global $con;
		$stmt = $con->prepare('SELECT * FROM saj_members WHERE mem_uname = ?');
		$stmt->execute(array($userName));
		$rows = $stmt->fetchAll();
		foreach ($rows as $row) { ?>
		<div class="userInfo">
			<div class="name">
				Name: <?php echo $row['mem_uname'] ?>
			</div>  
			<div class="email">
				Email: <?php echo $row['mem_email'] ?>
			</div>
			<div class="phone">
				Phone: <?php echo $row['mem_phone'] ?>				
			</div>
		</div>
<?php }
	}