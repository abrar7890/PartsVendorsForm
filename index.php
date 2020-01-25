<html>

	<head>

		<style>
			body{
				margin-left: 40em; 
			    padding:0;
			    text-align:center;
			    border: 2px solid black;
				margin-top: 20px;
				width: 350px;
				height: 500px;
			}
			h1{
				font-weight: bold;
				text-decoration: underline;
				text-align: center;
			}
			input{
				margin: 10px auto;
			}
		</style>
		<h1>Menu Page</h1>
	</head>

	<body>
			<p>To add info to Vendors Table Click Add info to Vendors</p>
			<p>To add info to Parts Table Click Add info to Parts</p>
			<p>To display all Parts and Vendors information Click List Parts and Vendors</p>
			<input type="button" value="Add info to Vendors" onclick="location='vendors.php'"/><br><br>
			
			<input type="button" value="Add info to Parts" onclick="location='parts.php'"/><br><br>
			
			<input type="button" value="List Parts and Vendors" onclick="location='fetchTables.php'"/><br><br>
	</body>

</html>