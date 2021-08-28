<?php
	function getData($field, $table, $dataTitle, $orderby, $limit = 5, $emptMsg, $lastArts) {
		global $con;
		// Select Query
		$getData = $con->prepare('SELECT '.$field.' FROM '.$table.' ORDER BY '.$orderby.' LIMIT '.$limit.'');
		$getData->execute();
		$data = $getData->fetchAll();
		// Looping inside the array
		if(!empty($data)) {
			foreach ($data as $datum) { ?>
			<li>
				<?php if($lastArts == true): ?>
					<a href="../articles?id=<?php echo $datum["art_id"] ?>">
						<?php chkTxtDir($datum[$dataTitle]) ?>
					</a>
				<?php else: ?>
					<a style="color:#000">
						<?php chkTxtDir($datum[$dataTitle]) ?>
					</a>
				<?php endif ?>
			</li>	
<?php }
		} else {
			echo 
			'<h4 class="note note-warning text-center">
				'.$emptMsg.'
			</h4>';
		}
	}