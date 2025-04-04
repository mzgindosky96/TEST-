<!DOCTYPE html>
<html>
<head>
    <!-- Your existing CSS here -->
</head>
<body>
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
    </div>
</body>
</html>
