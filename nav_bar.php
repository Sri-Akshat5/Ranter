<style>
    /* Navbar styling */
    .navbar {
        width: 100%;
        background: rgba(0, 0, 0, 0.8);
        padding: 12px 40px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        position: fixed;
        top: 0;
        left: 0;
        z-index: 1000;
    }

    /* Logo styling */
    .navbar h1 {
        margin: 0;
        font-size: 30px;
        color: orange;
        cursor: pointer; /* Makes the logo clickable */
    }

    /* Navigation links (desktop view) */
    .nav-links {
        display: flex;
        gap: 20px;
        padding-right: 7rem;
    }

    .nav-links a {
        color: #fff;
        text-decoration: none;
        font-size: 18px;
        transition: color 0.3s ease;
    }

    .nav-links a:hover {
        color: #4CAF50;
    }

    /* Hamburger menu (hidden by default) */
    .hamburger {
        display: none;
        flex-direction: column;
        cursor: pointer;
    }

    .hamburger div {
        width: 30px;
        height: 3px;
        background: #fff;
        margin: 5px 0;
        transition: transform 0.3s ease, opacity 0.3s ease;
    }

    /* Active hamburger animation */
    .hamburger.active div:nth-child(1) {
        transform: translateY(8px) rotate(45deg);
    }

    .hamburger.active div:nth-child(2) {
        opacity: 0; /* Hide middle bar */
    }

    .hamburger.active div:nth-child(3) {
        transform: translateY(-8px) rotate(-45deg);
    }

    /* Adjust body to account for fixed navbar */
    body {
        padding-top: 80px; /* Prevent content from overlapping navbar */
        margin: 0;
        box-sizing: border-box;
    }

    /* Responsive Design */
    @media (max-width: 1024px) {
        .nav-links {
            padding-right: 3rem; /* Reduce right padding on medium screens */
        }
    }

    @media (max-width: 768px) {
        /* Mobile-specific styles */
        .nav-links {
            flex-direction: column;
            position: absolute;
            top: 70px;
            left: 0;
            width: 100%;
            background: rgba(0, 0, 0, 0.9);
            padding: 20px 0;
            gap: 15px;
            text-align: center;
            display: none; /* Hide links by default */
        }

        /* Show nav links when active */
        .nav-links.active {
            display: flex;
        }

        /* Display hamburger menu */
        .hamburger {
            display: flex;
            padding: 20px;
        }

        .navbar h1 {
            font-size: 26px; /* Slightly smaller logo */
        }

        .nav-links a {
            font-size: 16px; /* Smaller font for links */
        }
    }

    @media (max-width: 480px) {
        .navbar {
            padding: 12px 5px; /* Reduce padding for very small screens */
        }
        
        .navbar h1 {
            font-size: 22px; /* Further reduce logo size */
        }

        .hamburger div {
            width: 20px;
             /* Smaller hamburger icon */
        }

        .nav-links a {
            font-size: 14px; /* Adjust link size for small screens */
        }
    }
</style>

<!-- Navbar -->
<div class="navbar">
    <h1 onclick="window.location.href='index.php'">Ranter</h1>

    <!-- Hamburger Menu -->
    <div class="hamburger" id="hamburger" onclick="toggleMenu()">
        <div></div>
        <div></div>
        <div></div>
    </div>

    <!-- Navigation Links -->
    <div class="nav-links" id="navLinks">
        <a href="index.php">Home</a>
        <a href="home.php">Submit Rant</a>
        <a href="view_feedback.php">View Rant</a>
        <a href="admin/index.php">Admin</a>
    </div>
</div>

<!-- JavaScript for Menu Toggle -->
<script>
    function toggleMenu() {
        const navLinks = document.getElementById('navLinks');
        const hamburger = document.getElementById('hamburger');
        navLinks.classList.toggle('active');
        hamburger.classList.toggle('active'); // Toggle hamburger animation
    }
</script>
