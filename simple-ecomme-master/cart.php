<?php
session_start();
 require_once('config.php');
if(isset($_GET['clear'])) 
{
  if ($_GET[clear]) 
  {
    unset($_SESSION['CART']);
    $_SESSION['MSGS'] = array('Your cart has been emptied.');
    session_write_close();
    header("location: cart.php");
    exit();
  }
}

if ( isset($_GET['del']) ) 
{
  foreach($_SESSION['CART'] as $cart_item_ID => $cart_item)
  {
      if($cart_item['pd_id'] == $_GET['del']){
        unset($_SESSION['CART'][$cart_item_ID]);
        $_SESSION['MSGS'] = array('Item remove from your cart.');
        session_write_close();
        header("location: cart.php");
        exit();
      }
  }
}

if(isset($_GET['add']) )
{
  //Include database connection details
 
  $product;
  $sql="SELECT *
            FROM `tbl_product`
            WHERE `pd_id`=".$_GET['add']." LIMIT 1";
           
   $res=mysqli_query($link,$sql);
  $product = mysqli_fetch_assoc($res);




  if(!isset( $_SESSION['CART']) ) $_SESSION['CART'] = array();

  if(!in_array($product, $_SESSION['CART']))
  {
    array_push($_SESSION['CART'], $product );
    $_SESSION['MSGS'] = array('Item added to your cart.');
    session_write_close();
    header("location: cart.php");
    exit();
  }
  else
  {
    $_SESSION['ERR_MSGS'] = array('Item is already added to your cart.');
    session_write_close();
    header("location: cart.php");
    exit();
  }
}// if GET is there
?>
<?php
include 'includes/header.php';
include 'includes/nav.php';
?>
<div id="main">
  <header class="container">
    <h3 class="page-header">Cart</h3>
  </header>
  <div class="container">
    <?php if( isset($_SESSION['CART']) && count($_SESSION['CART']) > 0 )  { ?>
    <div class="table-responsive">
      <table class="table products-table">
      <thead>
        <tr>
          <th>Preview</th>
          <th>Name</th>
          <th>Description</th>
          <th class="text-center">Category</th>
          <th width="100" class="text-center">Price</th>
          <th class="text-center">Remove</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $_SESSION['total'] = 0;
        foreach ($_SESSION['CART'] as $item) {

        $sql="SELECT cat_name FROM TBL_category WHERE cat_id=".$item['cat_id']; 
        $cat=mysqli_query($link,$sql);
        $catname=mysqli_fetch_assoc($cat);
          $_SESSION['total'] += $item['pd_price'];
          ?>
          <tr>
            <td><img style="max-width:140px;" src="img/uploads/<?php echo $item['pd_image'] ?>" alt="<?php echo $item['pd_name'] ?>"></td>
            <td><?php echo $item['pd_name'] ?></td>
            <td><?php echo $item['pd_description'] ?  $item['pd_description'] : '<span class="text-muted">No description</span>'; ?></td>
            <td class="text-center"><?php echo $catname['cat_name']; ?></td>
            <?php setlocale(LC_MONETARY,'en_US'); ?>
            <td class="text-center">Rs <?php echo $item['pd_price']; ?></td>
            <td class="text-center"><a href="cart.php?del=<?php echo $item['pd_id'] ?>"><span class="glyphicon glyphicon-trash" onclick="return confirm('Are you sure you want to delete this item from you cart?');"> </span></a></td>
          </tr>
          <?php
        }
        ?>
        <tr>
          <td colspan="3"></td>
          <td>
            <h4>Total:</h4>
          </td>
          <td colspan="2" class="text-info">
           Rs <?php echo $_SESSION['total']; ?>
          </td>
        </tr>
      </tbody>
    </table>
    </div>
    <div class="pull-right">
      <a href="cart.php?clear=true" class="btn btn-default">Clear <span class="glyphicon glyphicon-shopping-cart"></span></a> 
      <a href="order.php" class="btn btn-primary">Place Order</a>     
    </div>
    
    <?php 
    } // check count of cart
    else
    {
      echo '<div class="alert alert-info">Oh no! Add something to your cart from the Store.</div>';
    }
    ?>
  </div>
</div>
<?php
include 'includes/footer.php';
?>