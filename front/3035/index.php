<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Page</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>

    <div class="type-3035">
        <div class="container">
            <div class="product-wrapper">

                <div class="product-image">
                    <img src="img/flying-ninja.jpg" alt="Flying Ninja">
                </div>

                <div class="product-details">
                    <h2>Flying Ninja</h2>
                    <p class="price">
                        <del>$15.00</del> <span>$12.00</span>
                    </p>
                    <p>
                        Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.
                        Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante.
                    </p>

                    <div class="quantity-cart">
                        <input type="number" value="1" min="1">
                        <button>Add to Cart</button>
                    </div>
                </div>
            </div>

            <div class="tabs">
                <div class="tab">
                    <button class="active" onclick="openTab(event, 'description')">Description</button>
                    <button onclick="openTab(event, 'reviews')">Reviews (0)</button>
                </div>

                <div id="description" class="tab-content active">
                    <h5>Product Description</h5>
                    <p>
                        Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.
                        Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero
                        sit
                        amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.
                    </p>
                </div>

                <div id="reviews" class="tab-content">
                    <h5>Reviews</h5>
                    <p>No reviews yet.</p>
                </div>
            </div>
        </div>
    </div>

    <script src="js/scripts.js"></script>
</body>

</html>