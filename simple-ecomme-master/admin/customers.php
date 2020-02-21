<?php 
include_once 'customer-data.php'; 
  include_once 'header.php'; ?>
  <div class="col-md-12">
    <?php
    if(isset($users) && count($users)>0)
    {
    ?>
    <table class="table table-hover products-table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Customer Name</th>
          <th>Email</th>
          <th>Created at</th>
          <th>Updated at</th>
          
        </tr>
      </thead>
      <tbody>
        <?php
          foreach ($users as $user) {
        ?>
          <tr>
            <td><?php echo $user->user_id; ?></td>
            <td><?php echo $user->user_name; ?></td>
            <td><?php echo $user->user_email; ?></td>
            <td><?php echo $user->created_at; ?></td>
            <td><?php echo $user->updated_at; ?></td>
            
          </tr>
        <?php
          }
        ?>
      </tbody>
    </table>
    <?php
    }
    else { ?>
      <div class="alert alert-warning"><strong>Oh my!</strong> Didn't find any orders, please add some.</div>
    <?php
    }
    ?>
  </div><!-- /col-md-10 -->