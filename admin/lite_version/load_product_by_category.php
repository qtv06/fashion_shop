<?php
  include "../../connect.php";
  if(isset($_GET['categroy_id_load'])){
    $category_id = $_GET['categroy_id_load'];
    $qr = "select product_id,name,price,quantity,description,image,created_at,category_name from products p inner join categories c on p.category_id = c.category_id where p.category_id = $category_id order by created_at DESC";
    if($result = mysqli_query($conn,$qr)){
      $i = 1;
      while($row = mysqli_fetch_array($result)){
    ?>
    <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $row['product_id']; ?></td>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['price']; ?></td>
        <td><?php echo $row['quantity']; ?></td>
        <td><?php echo $row['description']; ?></td>
        <td><?php echo $row['category_name']; ?></td>
        <td><img src="../../images/<?php echo $row['image']; ?>" alt="" width="150" height="160"></td>
        <td><?php echo $row['created_at']; ?></td>
        <td><a href="edit-product.php?product_id=<?php echo $row['product_id']; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
        <a href="delete-product.php?product_id=<?php echo $row['product_id']; ?>"><i class="fa fa-trash-o" style="color: red;" aria-hidden="true"></i></a></td>
    </tr>
    <?php
      $i += 1;}
    }else{
      echo "Product is empty!";
    }
  }
?>
