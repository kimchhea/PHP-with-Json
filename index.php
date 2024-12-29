<?php

$file = './products.json';
$products = json_decode(file_get_contents($file), true);

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the data input and sanitize it
    $productName = htmlspecialchars($_POST['productName']);
    $price = $_POST['price'];
    $stock = $_POST['stock'];

    // Add the new product to the array
    $products[$productName] = [
        'price' => $price,
        'stock' => $stock
    ];

    // Post the new product JSON file
    file_put_contents($file, json_encode($products), true);
}

// Function to determine stock status
function getStockStatus($stock)
{
    if ($stock > 10) {
        echo "In Stock";
    } elseif ($stock > 0 && $stock <= 10) {
        echo "Low Stock";
    } else {
        echo "Out of Stock";
    }
}

// Calculate the average price of products
function calculateTotalPrice($products)
{
    $totalPrice = 0;
    foreach ($products as $product) {
        $totalPrice += $product['price'];
    }
    return $totalPrice;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Product Inventory Management</title>
    <style>
        body {
            background-color: #f8f9fa;
        }

        .results-table {
            margin: 20px auto;
            max-width: 800px;
            background-color: #ffffff;
            border-radius: 0.5rem;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .form-container {
            margin: 20px auto;
            max-width: 500px;
            background-color: #ffffff;
            border-radius: 0.5rem;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="text-center mb-4">Product Inventory Management</h1>
        <div class="form-container">
            <h5>Add New Product</h5>
            <form method="POST">
                <div class="mb-3">
                    <label for="productName" class="form-label">Product Name</label>
                    <input type="text" class="form-control" id="productName" name="productName" placeholder="Enter product name" required>
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="number" class="form-control" id="price" name="price" placeholder="Enter product price" required min="0" step="0.01">
                </div>
                <div class="mb-3">
                    <label for="stock" class="form-label">Stock Quantity</label>
                    <input type="number" class="form-control" id="stock" name="stock" placeholder="Enter stock quantity" required min="0">
                </div>
                <button type="submit" class="btn btn-primary">Add Product</button>
            </form>
        </div>

        <div class="results-table">
            <h5>Product List</h5>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Product Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Stock Quantity</th>
                        <th scope="col">Stock Status</th>
                    </tr>
                </thead>
                <tbody>
                   <?php foreach ($products as $key => $product) { ?>
                     <tr>
                         <td><?= htmlspecialchars($key); ?></td>
                         <td><?= htmlspecialchars($product['price']) . " $"; ?></td>
                         <td><?= htmlspecialchars($product['stock']); ?></td>
                         <td><?php getStockStatus($product['stock']) ?></td>
                     </tr>
                   <?php } ?>

                </tbody>
            </table>
            <!-- Display the total price here -->
            <h5><?= "Total Price : " . calculateTotalPrice($products) . " $"; ?></h5>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
