<!DOCTYPE html>
<html lang="en">

<head>
    <title>Ranter - Anonymous Feedback System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background: linear-gradient(to right, #1e3c72, #2a5298);
            color: #fff;
            line-height: 1.6;
            text-align: center;
        }

        header {
            padding: 40px 20px;
            background: rgba(0, 0, 0, 0.5);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        }

        header h1 {
            margin: 0;
            font-size: 3rem;
            letter-spacing: 2px;
        }

        .tagline {
            font-size: 1.5rem;
            margin-top: 10px;
        }

        .container {
            padding: 40px 20px;
            max-width: 1000px;
            margin: 0 auto;
        }

        .section {
            margin: 40px 0;
        }

        .section h2 {
            font-size: 2rem;
            margin-bottom: 20px;
        }

        .section p {
            font-size: 1.2rem;
            padding: 0 10px;
        }

        .btn {
            display: inline-block;
            padding: 12px 24px;
            margin: 20px 10px;
            font-size: 18px;
            color: white;
            text-decoration: none;
            background: #4CAF50;
            border-radius: 8px;
            transition: background 0.3s ease;
        }

        .btn:hover {
            background: #45a049;
        }

        .exciting-lines {
            font-style: italic;
            margin: 20px 0;
            font-size: 1.3rem;
            color: #FFD700;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            header h1 {
                font-size: 2.2rem;
            }

            .tagline {
                font-size: 1.2rem;
            }

            .section h2 {
                font-size: 1.6rem;
            }

            .section p {
                font-size: 1rem;
            }

            .btn {
                padding: 10px 20px;
                font-size: 16px;
            }

            .exciting-lines {
                font-size: 1.1rem;
            }
        }

        @media (max-width: 480px) {
            header h1 {
                font-size: 1.8rem;
            }

            .tagline {
                font-size: 1rem;
            }

            .section h2 {
                font-size: 1.4rem;
            }

            .section p {
                font-size: 0.9rem;
            }

            .btn {
                padding: 8px 16px;
                font-size: 14px;
            }

            .exciting-lines {
                font-size: 1rem;
            }
        }
    </style>
</head>

<body>

    <?php include 'nav_bar.php'; ?>

    <header>
        <h1>Welcome to Ranter</h1>
        <p class="tagline">Your Voice Matters – Rant Freely, Stay Anonymous!</p>
    </header>

    <div class="container">

        <div class="exciting-lines">
            🌟 "Got Something to Say? Rant It Out!"<br>
            🚀 "No Judgment – Just Pure, Honest Rants!"<br>
            💬 "Your Rant, Our Platform – Speak Up Today!"
        </div>

        <div class="section">
            <h2>About Ranter</h2>
            <p>
                Ranter is your anonymous platform to express thoughts, frustrations, and ideas.
                Whether you're a student, an employee, or someone with something to say – your voice deserves to be heard!
            </p>
        </div>

        <div class="section">
            <h2>Why Use Ranter?</h2>
            <p>
                ✅ Completely Anonymous – Your Identity is Safe! <br>
                ✅ Easy & Fast – Share Your Rant in Seconds! <br>
                ✅ No Filters – Let It All Out! <br>
                ✅ Public Rants – Browse and Relate to Others!
            </p>
        </div>

        <div class="section">
            <h2>How It Works?</h2>
            <p>
                1️⃣ Choose a Category (Work, Life, College – You Name It) <br>
                2️⃣ Rant Freely – No Names, No Worries <br>
                3️⃣ View All Rants – See What Others Are Saying!
            </p>
        </div>

        <a href="home.php" class="btn">Submit a Rant</a>
        <a href="view_feedback.php" class="btn">View Rants</a>
    </div>

    <?php include "footer.php"; ?>

</body>

</html>
