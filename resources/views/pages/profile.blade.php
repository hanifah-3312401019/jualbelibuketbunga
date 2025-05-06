<!-- File contoh tidak di pakai dalam PBL -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="assets/css/profile.css" />
    <title>Profile | PureBeauty</title>
</head>
<body>
    <div class="top-bar d-flex justify-content-between align-items-center p-3">
        <h2 class="site-name">PureBeauty</h2>
        <h3 class="tagline text-center mx-auto">Skin Protection</h3>
    </div>
    
    <nav class="navbar navbar-expand-lg navbar-light p-2">
        <div class="container-fluid">
            <div class="search-container d-flex align-items-center">
                <form action="shop.html" method="GET" class="d-flex align-items-center w-100">
                    <i class="bi bi-search"></i>
                    <input class="form-control me-2 border-0" type="search" name="keyword" placeholder="Search..." />
                </form>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item"><a class="nav-link" href="home.html">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="shop.html">Shop</a></li>
                    <li class="nav-item"><a class="nav-link" href="about.html">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="contact.html">Contact</a></li>
                </ul>
                <div class="d-flex align-items-center ms-auto">
                    <i class="bi bi-person me-2"></i>
                    <a href="login.html" class="me-4">Log In</a>
                    <a href="cart.html"><i class="bi bi-bag"></i></a>
                </div>
            </div>
        </div>
    </nav>
    
    <div class="profile-container">
        <aside class="sidebar">
            <div class="user-info">
                <img src="assets/img/person-circle.svg" alt="Profile Picture" class="editable-profile-picture">
                <p>Your Name</p>
            </div>
            <nav class="menu">
                <ul>
                    <li>
                        <div><i class="fa-solid fa-user"></i> My Account</div>
                        <ul class="submenu">
                            <li><a href="profile.html">Profile</a></li>
                            <li><a href="change_pw.html">Change Password</a></li>
                        </ul>
                    </li>
                    <li><a href="{{ route('history.order') }}">Order History</a></li>
                </ul>
            </nav>
        </aside>
        <main class="profile-content">
            <h2>My Profile</h2>
            <form class="profile-form">
                <div class="profile-picture-section">
                    <img src="assets/img/person-circle.svg" alt="Profile Picture" class="editable-profile-picture">
                    <input type="file" id="profile_picture" name="profile_picture" accept="image/*">
                </div>
                <label for="name">Name</label>
                <input type="text" id="name" name="name" required>
                <label for="phone">Phone Number</label>
                <input type="tel" id="phone" name="phone" pattern="[0-9]+" required>
                <label for="address">Address</label>
                <textarea id="address" name="address" required></textarea>
                <button type="submit" class="save-button">Save</button>
            </form>
        </main>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
<footer>
    <div class="footer-container">
        <div class="footer-left">
            <h2>THANK YOU</h2>
            <p>For Visiting Our Website</p>
            <div class="copyright">
                <span>&copy;2024 by PureBeauty</span>
            </div>
        </div>
        <div class="footer-middle">
            <ul>
                <li><a href="about.html">ABOUT</a></li>
                <li><a href="history_ord.html">SHIPPING & RETURNS</a></li>
                <li><a href="contact.html">CONTACT</a></li>
            </ul>
        </div>
        <div class="footer-right">
            <ul>
                <li><a href="#">INSTAGRAM</a></li>
                <li><a href="#">TWITTER</a></li>
                <li><a href="#">EMAIL</a></li>
            </ul>
        </div>
    </div>
</footer>
</html>
