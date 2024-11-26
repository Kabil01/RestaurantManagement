<?php

if (!isset($_COOKIE["type"])) {
    header("location: login.php");
}

require 'db.php';
$sql1 = "SELECT * FROM staff WHERE position='Manager' ORDER BY salary";
$sql2 = "SELECT * FROM staff WHERE position='Cashier' ORDER BY salary";
$sql3 = "SELECT * FROM staff WHERE position='Chef' ORDER BY salary";
$sql4 = "SELECT * FROM staff WHERE position='Waiter' ORDER BY salary";
$sql5 = "SELECT * FROM staff WHERE position='Busboy' ORDER BY salary";

$statement1 = $connection->prepare($sql1);
$statement1->execute();
$managers = $statement1->fetchAll(PDO::FETCH_OBJ);

$statement2 = $connection->prepare($sql2);
$statement2->execute();
$cashiers = $statement2->fetchAll(PDO::FETCH_OBJ);

$statement3 = $connection->prepare($sql3);
$statement3->execute();
$chefs = $statement3->fetchAll(PDO::FETCH_OBJ);

$statement4 = $connection->prepare($sql4);
$statement4->execute();
$waiters = $statement4->fetchAll(PDO::FETCH_OBJ);

$statement5 = $connection->prepare($sql5);
$statement5->execute();
$busboys = $statement5->fetchAll(PDO::FETCH_OBJ);
?>
<?php require 'header.php'; ?>

<div class="container">
    <div class="jumbotron mt-5 text-center">
        <h1>Restaurant</h1>
        <p>A Taste of Excellence in Every Bite</p>
    </div>
    <div class="card mt-5 mb-5 bg-light">
        <div class="card-header">
            <h2>Our shining stars (Ranking)</h2>
        </div>
        <div class="card-body">
            <div align="center">
                <!-- Managers Section -->
                <div class="category-section">
                    <h2>Managers</h2>
                    <ul class="list-unstyled">
                        <?php foreach ($managers as $manager): ?>
                            <li><h4><?= htmlspecialchars($manager->name); ?></h4></li>
                        <?php endforeach; ?>
                    </ul>
                    <hr>
                </div>

                <!-- Chefs Section -->
                <div class="category-section">
                    <h2>Chefs</h2>
                    <ul class="list-unstyled">
                        <?php foreach ($chefs as $chef): ?>
                            <li><h4><?= htmlspecialchars($chef->name); ?></h4></li>
                        <?php endforeach; ?>
                    </ul>
                    <hr>
                </div>

                <!-- Cashiers Section -->
                <div class="category-section">
                    <h2>Cashiers</h2>
                    <ul class="list-unstyled">
                        <?php foreach ($cashiers as $cashier): ?>
                            <li><h4><?= htmlspecialchars($cashier->name); ?></h4></li>
                        <?php endforeach; ?>
                    </ul>
                    <hr>
                </div>

                <!-- Waiters Section -->
                <div class="category-section">
                    <h2>Waiters</h2>
                    <ul class="list-unstyled">
                        <?php foreach ($waiters as $waiter): ?>
                            <li><h4><?= htmlspecialchars($waiter->name); ?></h4></li>
                        <?php endforeach; ?>
                    </ul>
                    <hr>
                </div>

                <!-- Busboys Section -->
                <div class="category-section">
                    <h2>Busboys</h2>
                    <ul class="list-unstyled">
                        <?php foreach ($busboys as $busboy): ?>
                            <li><h4><?= htmlspecialchars($busboy->name); ?></h4></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require 'footer.php'; ?>
