<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zonera - Virtual Study</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { 
            background-color: #f8f8f7; /* Off-white */
            color: #7e6961; /* Muted Brown */
        }
        .bg-beige { background-color: #cbc0b2; }
        .text-wine { color: #550b14; }
        .isometric-card {
            border-radius: 20px;
            transition: all 0.3s ease;
            box-shadow: 8px 8px 0px #cbc0b2;
        }
        .isometric-card:hover { transform: translate(-4px, -4px); box-shadow: 12px 12px 0px #7e6961; }
    </style>
</head>
<body class="antialiased">
    <nav class="p-6 flex justify-between items-center">
        <h1 class="text-2xl font-bold text-wine">zonera</h1>
        <div class="space-x-6">
            <a href="/">Home</a>
            <a href="/library">Library</a>
            <a href="/app" class="bg-wine text-white px-4 py-2 rounded-full">Mulai Belajar</a>
        </div>
    </nav>

    @yield('content')
</body>
</html>