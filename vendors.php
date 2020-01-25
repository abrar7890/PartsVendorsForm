<?php 
  $errors = '';
if (!empty($_POST)) {
  //use isset function to check if the values for name,email,etc is set or not

  if (isset($_POST['vendorno'])) {
    $vendorno=$_POST['vendorno'];
  }
  if (isset($_POST['vendorname'])) {
    $vendorname=$_POST['vendorname'];
  }
  if (isset($_POST['address1'])) {
    $address1 = $_POST['address1'];
  }
  if (isset($_POST['address2'])) {
    $address2 = $_POST['address2'];
  }
  else{
    $address2 = "";
  }
  

  if (isset($_POST['city'])) {
      $city = $_POST['city'];
  }
  if (isset($_POST['province'])) {
      $province = $_POST['province'];
  } 
  if (isset($_POST['postcode'])) {
    $postcode = $_POST['postcode'];
  }
  if (isset($_POST['country'])) {
      $country = $_POST['country'];
  }
  if (isset($_POST['phone'])) {
    $phone = $_POST['phone'];
  }
  if (isset($_POST['fax'])) {
    $fax = $_POST['fax'];
  }
  else{
    $fax = "";
  }

  //validate them as mandatory fields

  if(trim($vendorname) == '')
  {
    $errors .= 'Vendor Name is required <br>';
  }
  else{
    if (is_numeric($vendorno)) {
      $vendorno = (int)$vendorno;
      if($vendorno == 0){
        $errors .= 'Vendor number cant be zero.<br/>';
      }
    }
    else{
        $errors .= 'Vendor number should be a number.<br/>';
    }
  }
  if(trim($address1) == '')
  {
    $errors .= 'Address1 is required <br>';
  }
  if(trim($city) == '')
  {
    $errors .= 'City is required <br>';
  }
  if(trim($postcode) == '')
  {
    $errors .= 'Postcode is required <br>';
  }
  if(trim($country) == '')
  {
    $errors .= 'Country is required <br>';
  }
  if(trim($phone) == '')
  {
    $errors .= 'Phone is required <br>';
  }
  
  

  if(trim($errors) == '')
  {
  
      include('connection.php');
      $sql = "insert into Vendors ( VendorNo, VendorName, Address1, Address2, City, Prov, PostCode, Country, Phone, Fax) VALUES ('$vendorno', '$vendorname', '$address1', '$address2', '$city', '$province', '$postcode', '$country', '$phone', '$fax')";


    $connection = ConnectToDatabase();

    $preparedSQL = $connection->prepare($sql);

    $preparedSQL->execute();
    if ($preparedSQL->execute()){
      echo '<script language="javascript">';
      echo 'alert("Successfully inserted to database")';
      echo '</script>';
    }
    else{
        echo '<script language="javascript">';
        echo 'alert("Some Problems,Try again later")';
        echo '</script>';
    }
  }
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Bilbo+Swash+Caps" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css?family=Kalam" rel="stylesheet"> 
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<h1>VENDORS</h1>
  <form name="myform" method="Post" onsubmit="return formSubmit();"  action="" >       <!-- return formSubmit(); if you remove htis js file will not execute to do validations-->
  <label>VENDOR NUMBER:</label>
  <input id="vendorno"  type="text" name="vendorno"><br/>

  <label>VENDOR NAME:</label>
  <input id="vendorname"  type="text" name="vendorname"><br/>

  <label>ADDRESS1:</label>
  <input id="address1"  type="text" name="address1"><br/>

  <label>ADDRESS2:</label>
  <input id="address2"  type="text" name="address2"><br/>

  <label>CITY:</label>
  <input id="city" type="text" name="city"><br/>

  <label>PROVINCE:</label>
  <select name="province" id="province">
            <option value="Ontario" selected>Ontario</option>
            <option value="Quebec">Quebec</option>
            <option value="British Columbia">British Columbia</option>
            <option value="Alberta">Alberta</option>
            <option value="Manitoba">Manitoba</option>
            <option value="New-Brunswick">New-Brunswick</option>
            <option value="Newfoundland and Labrador">Newfoundland and Labrador</option>
            <option value="Northwest Territories">Northwest Territories</option>
            <option value="Nova Scotia">Nova Scotia</option>
            <option value="Nunavut">Nunavut</option>
            <option value="Prince Edward Island">Prince Edward Island (PEI)</option>
            <option value="Yukon">Yukon</option>
            <option value="Saskatchewan">Saskatchewan</option>
        </select><br/><br/>

  <label>POST CODE:</label>
  <input id="postcode" type="text" name="postcode"><br/>

  <label>COUNTRY:</label>
  <input id="country" type="text" name="country"><br/>

  <label>PHONE:</label>
  <input id="phone" type="text" name="phone"><br/>

  <label>FAX:</label>
  <input id="fax" type="text" name="fax"><br/>
  
  <br/><br/>

  <input type="submit" value="SUBMIT">
  <p id="errors"></p>
  </form>  

  <div class="formData">
  <?php if (trim($errors) != ''): ?>
    <?php echo "<p align='left'> <font color=red  size='3pt'>ERROR: Please fix these errors to proceed further:<br></font>  $errors </p>"?>
    <?php elseif (!empty($_POST)):  ?>
                Vendor Number: <?php echo $vendorno; ?> <br>
                Vendor Name: <?php echo $vendorname; ?><br>
                Adress1: <?php echo $address1; ?><br>
                Adress2: <?php echo $address2; ?><br>
                City: <?php echo $city; ?><br>
                Province: <?php echo $province; ?><br>
                Post Code: <?php echo $postcode; ?><br>
                Country: <?php echo $country; ?><br>
                Phone: <?php echo $phone; ?><br>
                Fax: <?php echo $fax; ?><br>
  
<?php else: ?>
    <p class="formResult">This is where the form data will show up.</p>
    <?php endif; ?>
  </div>
</body>
</html>




