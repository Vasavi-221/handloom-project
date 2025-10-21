<?php
session_start();

// Initialize cart array if not set
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Get product info from POST request
if (isset($_POST['product_name']) && isset($_POST['product_price'])) {
    $product = [
        'name' => $_POST['product_name'],
        'price' => $_POST['product_price']
    ];

    // Add product to cart session
    $_SESSION['cart'][] = $product;
    echo "<script>alert('Product added to cart!'); window.history.back();</script>";
} else {
    echo "<script>alert('Invalid product details!'); window.history.back();</script>";
}
?>
