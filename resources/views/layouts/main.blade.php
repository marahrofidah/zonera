<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zonera - Virtual Study</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg-color: #F0E8FF;
            --primary-pink: #E63E88;
            --primary-blue: #384D95;
            --accent-white: #FFFFFF;
            --text-blue: #384D95;
        }
        body { 
            background-color: var(--bg-color);
            font-family: 'Quicksand', sans-serif;
            color: var(--text-blue);
            overflow-x: hidden;
        }
        /* Navbar ala Dock di Bawah */
        .bottom-nav {
            position: fixed;
            bottom: 24px;
            left: 50%;
            transform: translateX(-50%);
            background: var(--primary-pink);
            backdrop-filter: blur(15px);
            padding: 16px 40px;
            border-radius: 60px;
            display: flex;
            gap: 40px;
            border: 2px solid var(--primary-pink);
            z-index: 1000;
            box-shadow: 0 8px 32px rgba(230, 62, 136, 0.2);
        }
        .nav-link {
            transition: all 0.3s ease;
            font-weight: 600;
            font-size: 1rem;
            color: var(--accent-white);
            padding: 8px 16px;
            border-radius: 50px;
            display: flex;
            align-items: center;
            gap: 8px;
            white-space: nowrap;
        }
        .nav-link img {
            width: 24px;
            height: 24px;
            object-fit: contain;
        }
        .nav-link:hover {
            color: var(--accent-white);
            background-color: var(--primary-blue);
            transform: translateY(-3px);
            border-radius: 50px;
            padding: 10px 48px 10px 24px;
        }
        .nav-link.active {
            color: var(--accent-white);
            background-color: var(--primary-blue);
            padding: 10px 48px 10px 24px;
        }
        .nav-link.active:hover {
            transform: translateY(-3px) scale(1.05);
        }
    </style>
</head>
<body class="antialiased">

    @yield('content')

    <nav class="bottom-nav">
        <a href="/" class="nav-link">
            <img src="/images/icons/nav-home.png" alt="Home">
            <span>Home</span>
        </a>
        <a href="/about" class="nav-link">
            <img src="/images/icons/nav-about.png" alt="About">
            <span>About</span>
        </a>
        <a href="/library" class="nav-link">
            <img src="/images/icons/nav-library.png" alt="Library">
            <span>Library</span>
        </a>
        <a href="/calendar" class="nav-link">
            <img src="/images/icons/nav-calendar.png" alt="Calendar">
            <span>Calendar</span>
        </a>
        <a href="/contact" class="nav-link">
            <img src="/images/icons/nav-contact.png" alt="Contact">
            <span>Contact</span>
        </a>
        <a href="/app" class="nav-link active" style="background-color: var(--primary-blue); color: var(--accent-white);">
            <img src="/images/icons/nav-app.png" alt="App">
            <span>App</span>
        </a>
    </nav>

</body>
</html>