<!DOCTYPE html>
<html lang="en">
<head>
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-3032189625676969"
     crossorigin="anonymous"></script>
    <meta name="google-adsense-account" content="ca-pub-3032189625676969">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Baroshka Sa'din Market</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<header>
    <h1>Baroshka Sa'din Market</h1>
    <nav>
        <a href="#prices">Prices</a>
        <a href="#weather">Weather</a>
        <a href="#upload-gallery">Gallery</a>
        <a href="#map">Map</a>
    </nav>
</header>

<marquee behavior="scroll" direction="left">Itunes Card Google Play card Korek{5,000-1,000-3,000-10,000} Zain Asiacell Fastlink Availble Now in Market</marquee>


<!-- Add this after the marquee -->
<section>
 <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #f5f6fa;
            padding: 2rem;
        }

        #item-form {
            max-width: 600px;
            margin: 2rem auto;
            padding: 2rem;
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        input, textarea, button {
            width: 100%;
            padding: 0.8rem;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-size: 1rem;
            transition: border-color 0.3s ease;
        }

        input:focus, textarea:focus {
            border-color: #3498db;
            outline: none;
        }

        button {
            background-color: #3498db;
            color: white;
            border: none;
            cursor: pointer;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #2980b9;
        }

        h3 {
            text-align: center;
            margin: 2rem 0;
            color: #2c3e50;
            font-size: 2rem;
        }

        .items-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .item-card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .item-card:hover {
            transform: translateY(-5px);
        }

        .item-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-bottom: 3px solid #3498db;
        }

        .item-info {
            padding: 1.5rem;
        }

        .item-info h4 {
            color: #2c3e50;
            margin-bottom: 0.5rem;
            font-size: 1.2rem;
        }

        .item-info p {
            color: #7f8c8d;
            margin-bottom: 1rem;
            line-height: 1.4;
        }

        .item-price {
            color: #27ae60;
            font-weight: bold;
            font-size: 1.3rem;
            margin-bottom: 1rem;
        }

        .delete-form {
            display: flex;
            gap: 0.5rem;
            margin-top: 1rem;
        }

        .delete-form input[type="password"] {
            flex: 1;
            padding: 0.5rem;
            font-size: 0.9rem;
        }

        .delete-form button {
            background-color: #e74c3c;
            padding: 0.5rem 1rem;
            width: auto;
        }

        .delete-form button:hover {
            background-color: #c0392b;
        }

        .posted-date {
            display: block;
            color: #95a5a6;
            font-size: 0.8rem;
            margin-top: 1rem;
        }

        @media (max-width: 768px) {
            body {
                padding: 1rem;
            }
            
            #item-form {
                padding: 1rem;
            }
            
            .items-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
    <form id="item-form" action="post_item.php" method="POST" enctype="multipart/form-data">
        <input type="text" name="item_name" placeholder="Item Name" required>
        <textarea name="item_description" placeholder="Item Description" required></textarea>
        <input type="number" name="item_price" placeholder="Price in IQD" required>
        <input type="password" name="secret_code" placeholder="Secret Posting Code" required>
        <input type="file" name="item_image" accept="image/*" required>
        <button type="submit">Post Item</button>
    </form>

    <h3>Latest Market Items</h3>
    <div id="items-list" class="items-grid">
        <?php
        $conn = new mysqli("localhost", "root", "", "market_db");
        $result = $conn->query("SELECT * FROM items ORDER BY posted_date DESC");
        
        while ($row = $result->fetch_assoc()) {
            echo '<div class="item-card">
                <img src="'.$row["image_path"].'" class="item-image">
                <div class="item-info">
                    <h4>'.$row["name"].'</h4>
                    <p>'.$row["description"].'</p>
                    <div class="item-price">'.number_format($row["price"]).' IQD</div>
                    <small>Posted: '.$row["posted_date"].'</small>
                    <form method="POST" action="delete_item.php">
                        <input type="hidden" name="item_id" value="'.$row["id"].'">
                        <input type="password" name="secret_code" placeholder="Secret Code" required>
                        <button type="submit">Delete</button>
                    </form>
                </div>
            </div>';
        }
        ?>
    
    </section>

<section id="prices">
    <h2>Today's Market Prices</h2>
    <div class="price-table-container">
        <table>
            <tr>
                <th>Barham</th>
                <th>Bha</th>
            </tr>
            <tr>
                <td>xiar (1kilo)</td>
                <td>1,250</td>
            </tr>
            <tr>
                <td>bajank (1kilo)</td>
                <td>1,250</td>
            </tr>
            <tr>
                <td>pivaz (1kilo)</td>
                <td>1,000</td>
            </tr>
            <tr>
                <td>dll</td>
                <td>2,000</td>
            </tr>
            <tr>
                <td>melak</td>
                <td>3,500</td>
            </tr>
            <tr>
                <td>singe behasti(2kilo)</td>
                <td>12,000</td>
            </tr>
            <tr>
                <td>singe bhasti(1kilo)</td>
                <td>4,000</td>
            </tr>
            <tr>
                <td>chang(1kilo)</td>
                <td>4,000</td>
            </tr>
        </table>
    </div>
</section>

<section id="weather">
    <div class="weather-container">
        <h2>Baroshke Weather</h2>
        <div class="weather-details">
            <!-- Weather cards will be dynamically inserted here -->
        </div>
    </div>
</section>

<section id="upload-gallery">
   
</section>

<section id="map">
    <h2>Nav U Nishan</h2>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d676.2694218434772!2d43.07738791773344!3d37.06669808670068!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4008c30061a3ec1f%3A0x76d2ec4e6d152d4f!2z2KjblSDYsdmI2LTaqdin2LPYudiv24zZhiDZhdin2LHZg9uO2Ko!5e0!3m2!1sar!2siq!4v1742573259399!5m2!1sar!2siq" 
            width="100%" 
            height="500" 
            style="border:0;" 
            allowfullscreen="" 
            loading="lazy" 
            referrerpolicy="no-referrer-when-downgrade">
    </iframe>
</section>

<section id="visitor-counter">
    <h2>Visitor Counter</h2>
    <p>Total Visitors: <span id="total-visitors">0</span></p>
    <p>Online Now: <span id="online-count">0</span></p>
</section>

<footer>
    <div class="footer-content">
        <h2>About Us & Location</h2>
        <p>Welcome to Baroshka Sa'din Market! We offer a wide variety of fresh produce, groceries, and household items at competitive prices. Our mission is to provide quality products and excellent customer service to our community.</p>
        <p>We are located at Baste Road, Duhok, Iraq. Come visit us for all your shopping needs!</p>
        <p>Email: <a href="mailto:baroshkasaadinmarket@gmail.com">baroshkasaadinmarket@gmail.com</a></p>
        <p>Phone: <a href="tel:+9647518865929">+9647518865929</a></p>
    </div>
    <p>&copy; 2025 Baroshka Sa'din Market. All rights reserved.</p>
</footer>

<script src="script.js"></script>
</body>
</html>
