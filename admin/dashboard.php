<?php
include '../config.php';
session_start();

// Redirect if not logged in
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: index.php');
    exit();
}

// Fetch feedbacks from the database (including category)
$feedbacks = $pdo->query("SELECT id, category, message, submitted_at FROM feedbacks ")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>  
    <title>Admin Dashboard | Ranter System</title>
    <style>
        /* General Styling */
        body {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            background: linear-gradient(to right, #1e3c72, #2a5298);
            color: #333;
            line-height: 1.6;
        }

        /* Navbar Styling */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            background: linear-gradient(135deg, #2C5364, #203A43);
            color: white;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .navbar h2 {
            margin: 0;
            font-size: 28px;
        }

        .navbar a {
            text-decoration: none;
            color: white;
            font-size: 18px;
            padding: 8px 16px;
            background: #4CAF50;
            border-radius: 8px;
            transition: background 0.3s ease;
        }

        .navbar a:hover {
            background: #45a049;
        }

        /* Dashboard Container */
        .container {
            max-width: 1200px;
            margin: 40px auto;
            padding: 20px;
            background: white;
            border-radius: 16px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            animation: fadeIn 0.8s ease-in-out;
        }

        h3 {
            margin-top: 0;
            font-size: 24px;
            color: #2C5364;
            text-align: center;
        }

        /* Table Styling */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 16px;
            text-align: left;
        }

        th {
            background: #2C5364;
            color: white;
            font-weight: bold;
        }

        td {
            background: #fff;
            border-bottom: 1px solid #ddd;
        }

        tr:hover td {
            background: #f1f1f1;
        }

        /* Empty State */
        .empty {
            text-align: center;
            font-size: 20px;
            color: #888;
            margin-top: 20px;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .navbar {
                flex-direction: column;
                text-align: center;
            }

            .navbar h2 {
                margin-bottom: 10px;
            }

            th, td {
                padding: 12px;
                font-size: 14px;
            }
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <div class="navbar">
        <h2>📊 Admin Dashboard</h2>
        <a href="logout.php">Logout</a>
    </div>

    <!-- Dashboard Container -->
    <div class="container">
        <h3>📩 Rants Submissions</h3>

        <?php if (count($feedbacks) === 0): ?>
            <p class="empty">No Rant available yet!</p>
        <?php else: ?>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Category</th>
                        <th>Rant</th>
                        <th>Submitted At</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($feedbacks as $feedback): ?>
                        <tr>
                            <td><?= htmlspecialchars($feedback['id']); ?></td>
                            <td><?= htmlspecialchars($feedback['category']); ?></td>
                            <td><?= nl2br(htmlspecialchars($feedback['message'])); ?></td>
                            <td><?= htmlspecialchars($feedback['submitted_at']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
<?php include "../footer.php" ?>
</body>

</html>
