<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
  <title>My Cart | Handloom Weavers</title>
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
  <header>
    <div class="logo">Handloom Weavers</div>
    <nav>
      <ul>
        <li><a href="index.html">Home</a></li>
        <li><a href="products.html">Products</a></li>
        <li><a href="cart.php" class="active">My Cart</a></li>
        <li><a href="about.html">About</a></li>
        <li><a href="contact.html">Contact</a></li>
      </ul>
    </nav>
  </header>

  <section class="products-section">
    <h2>🛍️ Your Shopping Cart</h2>
    <?php
    if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
        echo "<table style='margin:20px auto; border-collapse:collapse; width:80%;'>";
        echo "<tr style='background:#008080; color:white;'><th>Product</th><th>Price</th></tr>";
        $total = 0;
        foreach ($_SESSION['cart'] as $item) {
            echo "<tr style='text-align:center; border-bottom:1px solid #ccc;'>
                    <td>{$item['name']}</td>
                    <td>₹{$item['price']}</td>
                  </tr>";
            $total += $item['price'];
        }
        echo "<tr style='font-weight:bold;'><td>Total</td><td>₹$total</td></tr>";
        echo "</table>";
    } else {
        echo "<p>Your cart is empty.</p>";
    }
    ?>
  </section>
</body>
</html>
