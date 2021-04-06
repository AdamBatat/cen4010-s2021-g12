<?php
//insert.php;
$value = $_POST["first_name"];
echo $value;
if(isset($_POST["first_name"]))
{
 $connect = new PDO("mysql:host=localhost;dbname=principles", "root", ""); $order_id = rand();
 for($count = 0; $count < count($_POST["first_name"]); $count++)
 {  
  $query = "INSERT INTO users 
  (order_id, first_name, last_name, email) 
  VALUES (:order_id, :first_name, :last_name, :email)
  ";
  $statement = $connect->prepare($query);
  $statement->execute(
   array(
    ':order_id'   => $order_id,
    ':first_name'  => $_POST["first_name"][$count], 
    ':last_name' => $_POST["last_name"][$count], 
    ':email'  => $_POST["email"][$count],

   )
  );
 }
 $result = $statement->fetchAll();
 if(isset($result))
 {
  echo 'ok';
 }
}
?>
