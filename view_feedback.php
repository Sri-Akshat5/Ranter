<!DOCTYPE html>
<html lang="en">

<head>
    <title>View Feedback - Anonymous Feedback System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /* Base Styles */
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(to right, #1e3c72, #2a5298);
            color: #fff;
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            min-height: 100vh;
            text-align: center;
        }

        h2 {
            margin: 20px 0;
            font-size: 2.5rem;
            color: #4CAF50;
        }

        /* Table Container */
        .table-container {
            width: 90%;
            max-width: 1000px;
            overflow-x: auto; /* Allow horizontal scroll on small screens */
            margin-top: 20px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
            border-radius: 12px;
        }

        /* Table Styles */
        table {
            width: 100%;
            border-collapse: collapse;
            background: #737E82;
            border-radius: 12px;
            overflow: hidden;
        }

        thead {
            background: #4CAF50;
        }

        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #fff;
            word-wrap: break-word; /* Ensure long text wraps */
        }

        th {
            color: #fff;
            font-size: 1.2rem;
        }

        td {
            color: #fff;
            font-size: 1rem;
        }

        tr:hover {
            background: rgba(255, 255, 255, 0.1);
            transition: background 0.3s ease;
        }

        /* Links */
        a {
            color: #4CAF50;
            text-decoration: none;
            font-size: 1.3rem;
            margin-top: 2rem;
            display: inline-block;
            transition: color 0.3s ease;
        }

        a:hover {
            text-decoration: underline;
            color: #45a049;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            h2 {
                font-size: 2rem;
            }

            th, td {
                padding: 10px;
                font-size: 0.9rem; /* Adjust text size */
            }

            a {
                font-size: 1rem;
            }
        }

        @media (max-width: 480px) {
            h2 {
                font-size: 1.8rem;
            }

            th, td {
                padding: 8px;
                font-size: 0.8rem;
            }

            a {
                font-size: 0.9rem;
            }
        }
    </style>
</head>

<body>

    <?php include 'nav_bar.php'; ?>

    <h2>Anonymous Rants</h2>

    <!-- Table Container -->
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Category</th>
                    <th>Rants</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'config.php';
                try {
                    $stmt = $pdo->query("SELECT category, message FROM feedbacks ORDER BY id DESC");
                    if ($stmt->rowCount() > 0) {
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            echo "<tr>
                                    <td>" . htmlspecialchars($row['category']) . "</td>
                                    <td>" . htmlspecialchars($row['message']) . "</td>
                                  </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='2'>No rants available.</td></tr>";
                    }
                } catch (PDOException $e) {
                    echo "<tr><td colspan='2'>Error fetching rants. Please try again later.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Submit More Rants Link -->
    <a href="index.php">Submit More Rants</a>

    <?php include 'footer.php'; ?>

</body>

</html>
