<?php 

include_once 'products-data.php'; ?>
 <?php include_once 'header.php'; ?>

   <div class="col-md-10">
    <a href="add_product.php">+ Add New Product</a>
    <?php
    if(isset($products) && count($products)>0)
    {
    ?>
    <table class="table table-hover products-table">
      <thead>
        <tr>
          <th>Product Name</th>
          <th>Image</th>
          <th>Product Description</th>
          <th>Category</th>
          <th class="text-center">Price</th>
          <th class="text-center">Quantity</th>
          <th class="text-center">Delete</th>
        </tr>
      </thead>
      <tbody>
        <?php
          foreach ($products as $product) {
        ?>
          <tr>
            <td><?php echo $product->pd_name ?></td>
            <td><img src="../img/uploads/<?php echo $product->pd_image ?>" alt="<?php echo $product->pd_name ?>" style="max-width:140px;"></td>
            <td><?php echo $product->pd_description ?></td>
            <td><?php echo $product->cat_name ?></td>
            <td class="text-center">Rs <?php echo $product->pd_price ?></td>
            <td class="text-center"><?php echo $product->pd_qty ?></td>
            <td class="text-center"><a href="products-data.php?delete=<?php echo $product->pd_id ?>"><span class="glyphicon glyphicon-trash"> </span></a></td>
          </tr>
        <?php
          }
        ?>
      </tbody>
    </table>
    <?php
    }
    else { ?>
      <div class="alert alert-warning"><strong>Oh my!</strong> Didn't find any products, please add some.</div>
    <?php
    }
    ?>
  </div><!-- /col-md-10 -->