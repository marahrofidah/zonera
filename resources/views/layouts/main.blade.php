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
            --bg-color: #f8f8f7;
            --table-beige: #cbc0b2;
            --accent-wine: #550b14;
            --muted-brown: #7e6961;
        }
        body { 
            background-color: var(--bg-color);
            font-family: 'Quicksand', sans-serif;
            color: var(--muted-brown);
            overflow-x: hidden;
        }
        /* Navbar ala Dock di Bawah */
        .bottom-nav {
            position: fixed;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            background: rgba(203, 192, 178, 0.8); /* Beige dengan transparansi */
            backdrop-filter: blur(10px);
            padding: 10px 30px;
            border-radius: 50px;
            display: flex;
            gap: 25px;
            border: 1px solid rgba(126, 105, 97, 0.2);
            z-index: 1000;
            box-shadow: 0 50px 50px rgba(0,0,0,0.05);
        }
        .nav-link {
            transition: all 0.3s ease;
            font-weight: 600;
            font-size: 0.9rem;
            color: var(--muted-brown);
        }
        .nav-link:hover {
            color: var(--accent-wine);
            transform: translateY(-5px);
        }
    </style>
</head>
<body class="antialiased">

    @yield('content')

    <nav class="bottom-nav">
        <a href="/" class="nav-link">Home</a>
        <a href="/about" class="nav-link">About</a>
        <a href="/library" class="nav-link">Library</a>
        <a href="/gallery" class="nav-link">Gallery</a>
        <a href="/contact" class="nav-link">Contact</a>
        <a href="/app" class="nav-link font-bold text-wine">App</a>
    </nav>

</body>
</html>