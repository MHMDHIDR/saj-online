<?php
	// Function to Paginate the records from any table.
	function paginator($dataSelection, $table, $where1, $where2, $order, $pageTo, $inPage) {
		global $con, $stmt, $paginationCtrls, $lastPage;
		// Getting the rows number of the table
		$stmt = $con->prepare("SELECT * FROM $table $where1");
	  $stmt->execute();
	  // Assigning rows number of the specified table
	  $rowCount = count($stmt->fetchAll());

		// Get the page number and make sure its an interger
		$p = $_GET['page'];
		$page = isset($p) ? preg_replace('#[^0-9]#', '', $p) : 1;
		// Per Page records
		$perPage = $inPage;
		// Last Page Number
		$lastPage = ceil($rowCount / $perPage);
		/*
			Checking if the page number is less than 1 then make it one, and if the page number is greater than the last page number, then make it equal to the last page number.
		*/
		if($page < 1) {
			$page = 1;
		} elseif($page > $lastPage) {
			$page = $lastPage;
		}
		// This sets the range of rows to $stmt for the chosen $page.
		$limit = 'LIMIT ' . ($page - 1) * $perPage . ',' . $perPage;
		// This is your $stmt again, it is for grabbing just one page worth of rows by applying $limit to it.
		$stmt = $con->prepare("SELECT $dataSelection FROM $table $where2 ORDER BY $order $limit");
		// Establish the $paginationCtrls variable.
		$paginationCtrls = '';
		// Show the pagination if the rows numbers is worth displaying 
		if($lastPage != 1) {
			/*
				First we check if we are on page one. If yes then we don't need a link to 
				the previous page or the first page so we do nothing. If we aren't then we
				generate links to the first page, and to the previous pages.
	   	*/
			if ($page > 1) {
				$previous = $page - 1;
				// Concatenate the link to the variable
				$paginationCtrls .= '
				<li>
					<a href="'.$pageTo.'page='.$previous.'" aria-label="Previous">
						<span aria-hidden="true">&laquo;</span>
					</a>
				</li>';
				// Render clickable number links that should appear on the left of the target (current) page number
				for($i = $page - 4; $i < $page; $i++) {
					if($i > 0) {
						// Concatenate the link to the variable
						$paginationCtrls .= '
						<li>
							<a href="'.$pageTo.'page='.$i.'">
								'.$i.'
							</a>
						</li>';
					}
				}
			}
			// Render the target (current) page number, but without it being a clickable link
			// Concatenate the link to the variable
			$paginationCtrls .= '
			<li class="active">
				<a>
					'.$page.'
				</a>
			</li>';
			// Render clickable number links that should appear on the right of the target (current) page number
			for($i = $page + 1; $i <= $lastPage; $i++) {
				// Concatenate the link to the variable
				$paginationCtrls .= '
				<li>
					<a href="'.$pageTo.'page='.$i.'">
						'.$i.'
					</a>
				</li>';
				// if the loop runs for tims then break (stop) it.
				if($i >= $page + 4) {
					break;
				}
			}
			// This does the same as above, only checking if we are on the last page, if not then generating the "Next"
	    if ($page != $lastPage) {
        $next = $page + 1;
        // Concatenate the link to the variable
        $paginationCtrls .= '
        <li>
	        <a href="'.$pageTo.'page='.$next.'" aria-label="Next">
	        	<span aria-hidden="true">
	        		&raquo;
	        	</span>
	        </a>
        </li>';
	    }
		}
	}