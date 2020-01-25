<html>

	<head>
		
		<?php

			require("tableData.php");

		?>
		<link rel="stylesheet" type="text/css" href="assignment4.css" />
	</head>

	<body>

		<table>
			
			<h1>Parts<h1>
			<?php
				
                CreatePartTableHeader();
				FillPartTable();

			?>
			

		</table>

		<br/><br/>
		
		<table>
		<h2>Vendors</h2>
			<?php
				CreateVendorTableHeader();
				FillVendorTable();
			?>
			

		</table>
		

	</body>

</html>
