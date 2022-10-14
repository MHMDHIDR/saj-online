<?php
	function getHomeSidebarData($column, $column2, $table, $where, $order_by, $limit, $linkTo, $get, $get2, $errMsg) {
		global $con;
		
		$stmt = $con->prepare('SELECT '.$column.', '.$column2.' FROM '.$table.' '.$where.' ORDER BY '.$order_by.' LIMIT '.$limit.'');
		$stmt->execute();
		$rows = $stmt->fetchAll();
		if(!empty($rows)) {
			foreach ($rows as $row) { echo 
				'<li>
					<a href="'.$linkTo.'?'.$get.'='.$row[$column2].$get2.'">';
						chkTxtDir($row[$column]);
					echo '</a>
				</li>';
			}
		} else {
			echo "<div class='note note-primary text-center'>".$errMsg."</div>";
		}
	}