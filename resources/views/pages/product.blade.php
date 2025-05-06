<!-- File contoh, tidak di pakai dalam PBL -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <title>Product | Bloomify</title>
    <style>
        /* Mengubah warna button */
        .btn-pink {
            background-color: #ff69b4; /* Warna Pink */
            color: white;
            border: none;
        }

        .btn-pink:hover {
            background-color: #ff85c1;
        }

        .btn-purple {
            background-color: #6a0dad; /* Warna Ungu */
            color: white;
            border: none;
        }

        .btn-purple:hover {
            background-color: #8a2be2;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light p-3">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Bloomify</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item"><a class="nav-link" href="/home">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="/product">Product</a></li>
                    <li class="nav-item"><a class="nav-link" href="/about">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="/contact">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Product Section -->
    <div class="container mt-5">
        <h2>Our Bouquet Collection</h2>
        <div class="row mt-4">
            <!-- Contoh Produk 1 -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Rose Bouquet</h5>
                        <p class="card-text">Price: Rp 150.000</p>
                        <a href="#" class="btn btn-pink">View Details</a>
                    </div>
                </div>
            </div>

            <!-- Contoh Produk 2 -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Lily Bouquet</h5>
                        <p class="card-text">Price: Rp 170.000</p>
                        <a href="#" class="btn btn-purple">View Details</a>
                    </div>
                </div>
            </div>

            <!-- Contoh Produk 3 -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Sunflower Bouquet</h5>
                        <p class="card-text">Price: Rp 120.000</p>
                        <a href="#" class="btn btn-pink">View Details</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="text-center mt-5 p-3 bg-light">
        <div>©2025 by Bloomify</div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>