<?php 

include('connection.php');

$errors = '';

if (!empty($_POST)) {
  //validations for mandatory field checked if the values are set or not, if set then further check datatype is correct
  if (isset($_POST['vendorno'])) {
    $vendorno=$_POST['vendorno'];
    if (is_numeric($vendorno)) {
      $vendorno = (int)$vendorno;
      if($vendorno == 0){
        $errors .= 'Vendor Number cant be zero.<br/>';
      }
    }
    else
    {
        $errors .= 'Vendor Number should be a number.<br/>';
    }
  }
  else
  {
    $errors .= 'Vendor Number is required <br>';
  }

  if (isset($_POST['description'])) {
    $description = $_POST['description'];
  }
  else
  {
    $errors .= 'Description is required <br>';
  }

  if (isset($_POST['onhand'])) {
    $onhand = $_POST['onhand'];

    if (is_numeric($onhand)) {
      $onhand = (int)$onhand;
      if($onhand == 0){
        $errors .= 'On Hand amount cant be zero.<br/>';
      }
    }else
    {
        $errors .= 'On Hand amount should be a number.<br/>';
    }
  }
  else
  {
    $errors .= 'On hand quantity is required <br>';
  }

  if (isset($_POST['onorder'])) {
      $onorder = $_POST['onorder'];
      if (is_numeric($onorder)) {
        $onorder = (int)$onorder;
        if($onorder == 0){
          $errors .= 'On Order amount cant be zero.<br/>';
        }
      }else{
          $errors .= 'On Order amount should be a number.<br/>';
      }
  }
  else
  {
    $errors .= 'On order quantity is required <br>';
  }

  if (isset($_POST['cost'])) {
    $cost = $_POST['cost'];
      if (is_numeric($cost)) {
        $cost = (double)$cost;
        if($cost == 0){
          $errors .= 'Cost cant be zero.<br/>';
        }
      }
      else
      {
          $errors .= 'Cost should be a number.<br/>';
      }
  }
  else
  {
    $errors .= 'Cost is required <br>';
  }

  if (isset($_POST['listprice'])) {
    $listprice =$_POST['listprice'];
      if (is_numeric($listprice)) {
        $listprice = (double)$listprice;
        if($listprice == 0){
          $errors .= 'List Price cant be zero.<br/>';
        }
      }
      else
      {
          $errors .= 'List Price should be a number.<br/>';
      }
  }
  else
  {
    $errors .= 'List price is required <br>';
  }

  //only execute a query when all validations are true
  if(trim($errors) == '')
  {
  
  $connection=ConnectToDatabase();
  $sql = "insert into Parts (VendorNo,  Description, OnHand, OnOrder, Cost, ListPrice) VALUES ('$vendorno', '$description', '$onhand', '$onorder', '$cost', '$listprice')";

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
  
<h1>PARTS</h1>
<form name="myform" method="Post" onsubmit=""  action="" >       <!-- return formSubmit(); if you remove htis js file will not execute to do validations-->
    <label>PART ID:</label>
    <input id="partid"  type="autonumber" name="partid"><br/>

    <label>VENDOR NUMBER:</label>
    <input id="vendorno"  type="number" name="vendorno"><br/>

    <label>DESCRIPTION:</label>
    <input id="description"  type="description" name="description"><br/>

    <label>ON HAND:</label>
    <input id="onhand"  type="number" name="onhand"><br/>

    <label>ON ORDER:</label>
    <input id="onorder" type="number" name="onorder"><br/>

    <label>COST:</label>
    <input id="cost"  type="number" name="cost"><br/>

    <label>LIST PRICE:</label>
    <input id="listprice" type="number" name="listprice"><br/>
    
    <br/><br/>

    <input type="submit" value="SUBMIT">
    <p id="errors"></p>
  </form>  
  
  <div class="formData">
  <?php if (trim($errors) != ''): ?>
    <?php echo "<p align='left'> <font color=red  size='3pt'>ERROR: Please fix these errors to proceed further:<br></font>  $errors </p>"?>
    <?php elseif ( ! empty($_POST)): ?>
                Vendor Number: <?php echo $vendorno; ///display a summary of part ?> <br>    
                On Hand: <?php echo $onhand; ?><br>
                On Order: <?php echo $onorder; ?><br>
                Cost: $<?php echo $cost; ?><br>
                List Price: $<?php echo $listprice; ?><br>


  <?php else: ?>
    <p id="formResult">This is where the form data will show up.</p>
  <?php endif; ?>



  </div>
</body>
</html>

