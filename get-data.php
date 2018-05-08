<?php
  include("connect.php");
  if(isset($_POST['numCurrent'])){
    $numCurrent = $_POST['numCurrent'];
    $numLimit = 4;
    $sql = "select product_id, name, price, image, description, category_name from products p join categories c on p.category_id = c.category_id limit ".$numCurrent." , ".$numLimit;
    $result = mysqli_query($conn, $sql);
    $html = '';
    while($row = mysqli_fetch_array($result)){
      $category_name = $row['category_name'];
      $img = $row['image'];
      $id = $row['product_id'];
      $name = $row['name'];
      $price = $row['price'];
      $html .= '<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item '.$category_name.'"';
        $html .= '<div class="block2">';
          $html .= '<div class="block2-pic hov-img0">';
            $html .= '<img src="images/'.$img.'" alt="IMG-PRODUCT">';
            $html .= '<a href="#" data-id="'.$id.'" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
              Quick View </a>';
          $html .= '</div>';

          $html .= '<div class="block2-txt flex-w flex-t p-t-14">';
            $html .= '<div class="block2-txt-child1 flex-col-l ">';
              $html .= '<a href="product-detail.php" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">'.$name.'</a>';

              $html .= '<span class="stext-105 cl3">$'.$price.'</span>';
            $html .= '</div>';

            $html .= '<div class="block2-txt-child2 flex-r p-t-3">';
              $html .= '<a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">';
                $html .= '<img class="icon-heart1 dis-block trans-04" src="images/icons/icon-heart-01.png" alt="ICON">';
                $html .= '<img class="icon-heart2 dis-block trans-04 ab-t-l" src="images/icons/icon-heart-02.png" alt="ICON">';
              $html .= '</a>';
            $html .= '</div>';

          $html .= '</div>';
        $html .= '</div>';
      $html .= '</div>';
    }
  echo $html;
  }
 ?>

