<?php

if(!isset($_COOKIE["type"]))
{
 header("location: login.php");
}


require 'db.php';
$sql = "SELECT S.name, Y.nooforders  from staff S, (SELECT ordertakenby, COUNT (ordertakenby) nooforders from orderdetails group by ordertakenby) as Y where Y.ordertakenby=S.employeeid";
$statement = $connection->prepare($sql);
$statement->execute();
$menu = $statement->fetchAll(PDO::FETCH_OBJ);
 ?>
<?php require 'header.php'; ?>
<div class="container">
  <div class = "jumbotron mt-5 text-center">
    <h1>Restaurant</h1>
    <p>A Taste of Excellence in Every Bite</p>
  </div>
  <div class="card mt-5 mb-5 bg-light">
    <div class="card-header">
      <h2>No. of orders taken by each employee (waiter)</h2>
    </div>
    <div class="card-body">
      <table class="table table-bordered table-hover">
        <tr class="bg-secondary text-light">
          <th>Name</th>
          <th>No of Orders</th>
          
        </tr>
        <?php foreach($menu as $item): ?>
          <tr>
            <td><?= htmlspecialchars($item->name); ?></td>
            <td><?= htmlspecialchars($item->nooforders); ?></td>
            
          </tr>
        <?php endforeach; ?>
      </table>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>
