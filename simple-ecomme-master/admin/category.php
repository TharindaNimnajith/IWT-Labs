<?php
include_once 'category-data.php'; ?>
 <?php include_once 'header.php'; ?>
  <div >

    <a href="add_category.php"> + Add New Category </a>
     
  <div >
    <?php
    if(isset($categories) && count($categories)>0)
    {
    ?>
    <table class="table table-hover">
      <thead>
        <tr>
          <th>Category Name</th>
          <th>Category Description</th>
          <th class="text-center">Products</th>
          <th class="text-center">Delete</th>
        </tr>
      </thead>
      <tbody>
        <?php
          foreach ($categories as $category) {
        ?>
          <tr>
            <td><?php echo $category->cat_name ?></td>
            <td><?php echo $category->cat_description ?></td>
            <td class="text-center"><?php echo $category->product_count ?></td>
            <td class="text-center"><a href="category-data.php?delete=<?php echo $category->cat_id ?>"><span class="glyphicon glyphicon-trash"> </span></a></td>
          </tr>
        <?php
          }
        ?>
      </tbody>
    </table>
    <?php
    }
    else { ?>
      <div class="alert alert-warning"><strong>Oh my!</strong> Didn't find any categories, please add some.</div>
    <?php
    }
    ?>
  </div><!-- /col-md-10 -->