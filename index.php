<?php include 'connect.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/main.css">
  <title>test</title>
</head>

<body>
  <?php
  $getAll = $con->prepare("SELECT count FROM products"); // or by ASC
  $getAll->execute();
  $all = $getAll->fetchAll();
  foreach ($all as $l) {
    break;
  }
  $limit = $l['count'];
  $getAll = $con->prepare("SELECT * FROM products ORDER BY DATE_CREATE DESC LIMIT $limit"); // or by ASC
  $getAll->execute();
  $all = $getAll->fetchAll();
  //print_r($all);
  $do = isset($_GET['do']) ? $_GET['do'] : 'Manage';
  /*
 =====================================
 ==== **** Start Manage Page **** ====
 =====================================
 */
  if ($do == 'Manage') {

  ?>
    <form class="" action="?do=Insert" method="POST">
      <div>
        <h2>Latest Items <?php echo $l['count']; ?></h2>
        <table>
          <tr>
            <td>Product ID</td>
            <td>Product Name</td>
            <td>Product Price</td>
            <td>Product Article</td>
            <td>Product Quantity</td>
            <td>Date Create</td>
          </tr>
          <?php
          foreach ($all as $item) { ?>
            <td><span class="rr">Скрыть</span></td>
            <div class="full-view">
              <tr>
                <td><?php echo $item['PRODUCT_ID'] ?></td>
                <td><?php echo $item['PRODUCT_NAME'] ?></td>
                <td><?php echo "$ " . $item['PRODUCT_PRICE'] ?></td>
                <td><?php echo $item['PRODUCT_ARTICLE'] ?></td>
                <td><?php echo $item['PRODUCT_QUANTITY'] ?></td>
                <td><?php echo $item['DATE_CREATE'] ?></td>
              </tr>
            </div>
          <?php } ?>
          <tr>
            <td><input type="text" name="PRODUCT_ID"></td>
            <td><input type="text" name="PRODUCT_NAME"></td>
            <td><input type="text" name="PRODUCT_PRICE"></td>
            <td><input type="text" name="PRODUCT_ARTICLE"></td>
            <td><input type="text" name="PRODUCT_QUANTITY"></td>
            <td>
              <a href="index.php?do=inc">
                <button type="button"> - </button>
              </a>
              <a href="index.php?do=dec">
                <button type="button"> + </button>
              </a>
            </td>
          </tr>
        </table>
        <input type="submit" value="Add New Item" class="" />
      </div>
    </form>
  <?php
    /*
=====================================
==== **** Insert Items Page **** ====
=====================================
*/
  } elseif ($do == "Insert") {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Get Variables From The Form
      $P_ID         = filter_var($_POST['PRODUCT_ID'],FILTER_SANITIZE_NUMBER_INT);
      $P_NAME       = filter_var($_POST['PRODUCT_NAME'],FILTER_SANITIZE_STRING);
      $P_PRICE      = filter_var($_POST['PRODUCT_PRICE'],FILTER_SANITIZE_NUMBER_INT);
      $P_ARTICLE    = filter_var($_POST['PRODUCT_ARTICLE'],FILTER_SANITIZE_STRING);
      $P_QUANTITY   = filter_var($_POST['PRODUCT_QUANTITY'],FILTER_SANITIZE_NUMBER_INT);
      // Insert Userinfo In Database
      $stmt = $con->prepare("INSERT INTO products(PRODUCT_ID, PRODUCT_NAME, PRODUCT_PRICE, PRODUCT_ARTICLE, PRODUCT_QUANTITY, DATE_CREATE) 
                                        VALUES(:P_ID, :P_NAME, :P_PRICE, :P_ARTICLE, :P_QUANTITY, now())");
      $stmt->execute(array(
        'P_ID'       => $P_ID,
        'P_NAME'     => $P_NAME,
        'P_PRICE'    => $P_PRICE,
        'P_ARTICLE'  => $P_ARTICLE,
        'P_QUANTITY' => $P_QUANTITY

      ));
      header('Location: index.php');
    }
  }
  /*
=====================================
==== **** inc Items Page **** ====
=====================================
*/ elseif ($do == 'inc') {
    $limit = $limit - 1;
    echo $limit;
    if ($limit > 0) {
      $stmt = $con->prepare("UPDATE products SET count = ? ");
      $stmt->execute(array($limit));
      header('Location: index.php');
    } else {
      header('Location: index.php');
    }
  }
  /*
=====================================
==== **** dec Items Page **** ====
=====================================
*/ elseif ($do == 'dec') {
    $limit = $limit + 1;
    echo $limit;

    $stmt = $con->prepare("UPDATE products SET count = ? ");
    $stmt->execute(array($limit));
    header('Location: index.php');
  }
  ?>
  <script src="js/jquery-3.5.1.min.js"></script>
  <script src="js/main.js"></script>
</body>

</html>