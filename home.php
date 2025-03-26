<!DOCTYPE html>
<html lang="en">

<head>
    <title>Ranter - Anonymous Feedback System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /* Base Styles */
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(to right, #1e3c72, #2a5298);
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            flex-direction: column;
        }

        .container {
            background: rgba(0, 0, 0, 0.8);
            padding: 25px;
            border-radius: 16px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.4);
            max-width: 500px;
            width: 90%;
            text-align: center;
            animation: fadeIn 0.5s ease-in-out;
        }

        h2 {
            margin-bottom: 20px;
            font-size: 32px;
            color: #4CAF50;
        }

        input,
        textarea,
        button {
            width: 100%;
            padding: 12px;
            margin: 12px 0;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            box-sizing: border-box;
        }

        input,
        textarea {
            background: #fff;
            color: #333;
        }

        textarea {
            resize: none;
            height: 120px;
        }

        button {
            background: #4CAF50;
            color: white;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        button:hover {
            background: #45a049;
        }

        a {
            display: inline-block;
            color: #4CAF50;
            text-decoration: none;
            font-size: 18px;
        }

        a:hover {
            text-decoration: underline;
        }

        .message {
            margin-top: 20px;
            font-size: 18px;
        }

        /* Fade-In Animation */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Responsive Design */
        @media (max-width: 600px) {
            body {
                padding: 15px;
            }

            .container {
                padding: 20px;
                max-width: 100%;
            }

            h2 {
                font-size: 28px;
            }

            input,
            textarea,
            button {
                font-size: 14px;
                padding: 10px;
                margin: 8px 0;
            }

            a {
                font-size: 16px;
            }
        }

        @media (max-width: 400px) {
            h2 {
                font-size: 24px;
            }

            input,
            textarea,
            button {
                font-size: 12px;
                padding: 8px;
            }

            a {
                font-size: 14px;
            }
        }
    </style>
</head>

<body>

    <?php include 'nav_bar.php'; ?>

    <?php
    include 'config.php';
    $message = "";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $category = trim($_POST['category']);
        $messageContent = trim($_POST['message']);

        if (!empty($category) && !empty($messageContent)) {
            try {
                $stmt = $pdo->prepare("INSERT INTO feedbacks (category, message) VALUES (:category, :message)");
                $stmt->execute(['category' => $category, 'message' => $messageContent]);
                $message = "✅ Rant submitted successfully!";
            } catch (PDOException $e) {
                $message = "❌ Error submitting rant. Please try again!";
            }
        } else {
            $message = "⚠️ Both category and message are required.";
        }
    }
    ?>

    <div class="container" id="submit">
        <h2>Submit Your Rant</h2>

        <?php if (!empty($message)) : ?>
            <p class="message"><?php echo htmlspecialchars($message); ?></p>
        <?php endif; ?>

        <form id="feedbackForm" action="" method="POST">
            <input type="text" name="category" placeholder="Enter Category (e.g., College/Department/Other)" required>
            <textarea name="message" rows="5" placeholder="Enter your rant here..." required></textarea>
            <button type="submit">Submit Rant</button>
        </form>

        <a href="view_feedback.php">View Rants</a>
    </div>

    <?php include "footer.php"; ?>

</body>

</html>
