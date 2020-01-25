<div class="<?php

	include("connection.php");

	function FillVendorTable()
	{

		$tableBodyText = "";


		$querySelect = "SELECT * FROM Vendors";
		$connection = ConnectToDatabase();
		$preparedQuerySelect = $connection -> prepare($querySelect);
		$preparedQuerySelect -> execute();

		while ($row = $preparedQuerySelect -> fetch())
		{

			$vendorNo = number_format($row['VendorNo'],0);
			$vendorName = $row['VendorName'];
			$address1 = $row['Address1'];
			$address2 = $row['Address2'];
			$city = $row['City'];
			$province = $row['Prov'];
			$postcode = $row['PostCode'];
			$country = $row['Country'];
			$phone = $row['Phone'];
			$fax = $row['Fax'];

			$tableBodyText .= "<tr>";
			$tableBodyText .= "<td>$vendorNo</td>";
			$tableBodyText .= "<td class='text'>$vendorName</td>";
			$tableBodyText .= "<td>$address1</td>";
			$tableBodyText .= "<td>$address2</td>";
			$tableBodyText .= "<td>$city</td>";
			$tableBodyText .= "<td>$province</td>";
			$tableBodyText .= "<td>$postcode</td>";
			$tableBodyText .= "<td>$country</td>";
			$tableBodyText .= "<td>$phone</td>";
			$tableBodyText .= "<td>$fax</td>";
			$tableBodyText .= "</tr>";

		}
		echo $tableBodyText;
	}


	function CreateVendorTableHeader()
	{
		$text = "<tr id='tableHeader'>";
		$text .= "<th>Vendor No</th>";
		$text .= "<th>Vendor Name</th>";
		$text .= "<th>Address1</th>";
		$text .= "<th>Address2</th>";
		$text .= "<th>City</th>";
		$text .= "<th>Province</th>";
		$text .= "<th>Post Code</th>";
		$text .= "<th>Country</th>";
		$text .= "<th>Phone</th>";
		$text .= "<th>Fax</th>";
		$text .= "</tr>";

		echo $text;
    }
    function FillPartTable()
	{

		$tableBodyText = "";


		$querySelect = "SELECT * FROM Parts";
		$connection = ConnectToDatabase();
		$preparedQuerySelect = $connection -> prepare($querySelect);
		$preparedQuerySelect -> execute();

		while ($row = $preparedQuerySelect -> fetch())
		{
            $partID = number_format($row['PartID'],0);
			$vendorNo = number_format($row['VendorNo'],0);
			$description= $row['Description'];
			$onHand = $row['OnHand'];
			$onOrder = $row['OnOrder'];
			$cost = $row['Cost'];
			$listprice = $row['ListPrice'];

            $tableBodyText .= "<tr>";
            $tableBodyText .= "<td>$partID</td>";
			$tableBodyText .= "<td>$vendorNo</td>";
			$tableBodyText .= "<td>$description</td>";
			$tableBodyText .= "<td>$onHand</td>";
			$tableBodyText .= "<td>$onOrder</td>";
			$tableBodyText .= "<td>$cost</td>";
			$tableBodyText .= "<td>$listprice</td>";
			$tableBodyText .= "</tr>";

		}
		echo $tableBodyText;
	}
    function CreatePartTableHeader()
	{
		$text = "<tr id='tableHeader'>";
		$text .= "<th>Part ID</th>";
		$text .= "<th>Vendor No</th>";
		$text .= "<th>Description</th>";
		$text .= "<th>On Hand</th>";
		$text .= "<th>On Order</th>";
		$text .= "<th>Cost</th>";
		$text .= "<th>List Price</th>";
		$text .= "</tr>";

		echo $text;
	}

?>



