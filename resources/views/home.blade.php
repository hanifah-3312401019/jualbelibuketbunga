<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>HOME | Skincare Store</title>
</head>

<body>
    <!-- Nama toko -->
    <div>
        <h2>PureBeauty</h2>
        <h3>Skin Protection</h3>
    </div>
    <nav>
        <form action="shop.php" method="GET">
            <input type="search" name="keyword" placeholder="Search..." />
            <button type="submit">Search</button>
        </form>

        <ul>
            <li><a href="home.php">Home</a></li>
            <li><a href="shop.php">Shop</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="contact.php">Contact</a></li>
        </ul>

        <div>
            <?php if (isset($_SESSION['username'])): ?>
                <a href="profile.php">My Account</a>
                <a href="history_ord.php">History Order</a>
                <a href="logout.php">Logout</a>
            <?php else: ?>
                <a href="login.php">Log In</a>
            <?php endif; ?>
            <a href="cart.php">Cart</a>
        </div>
    </nav>

    <!-- Banner -->
    <div>
        <p>TEMUKAN KEINDAHANMU YANG SESUNGGUHNYA</p>
        <h1>“We Repair Your Skin Barrier”</h1>
        <a href="shop.php">SHOP NOW ></a>
    </div>

    <!-- New Arrivals Section -->
    <section>
        <h2>New Arrivals</h2>
        <div>
            <?php if (!empty($products) && is_array($products) && count($products) > 0): ?>
                <?php foreach ($products as $product): ?>
                    <div>
                        <h3><?= htmlspecialchars($product['nama_produk']) ?></h3>
                        <a href="detail_produk.php?id=<?= $product['id_produk'] ?>">Shop Now</a>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Produk belum tersedia.</p>
            <?php endif; ?>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div>
            <h2>THANK YOU</h2>
            <p>For Visiting Our Website</p>
            <span>©2024 by PureBeauty</span>
        </div>

        <div>
            <ul>
                <li><a href="about.php">ABOUT</a></li>
                <li><a href="history_ord.php">SHIPPING & RETURNS</a></li>
                <li><a href="contact.php">CONTACT</a></li>
            </ul>
        </div>

        <div>
            <ul>
                <li><a href="#">INSTAGRAM</a></li>
                <li><a href="#">TWITTER</a></li>
                <li><a href="#">EMAIL</a></li>
            </ul>
        </div>
    </footer>
</body>
</html>