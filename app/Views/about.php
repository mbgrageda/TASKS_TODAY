<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title) ?></title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            margin: 0;
            color: #333;
        }

        nav {
            background: #222;
            padding: 15px;
            text-align: center;
        }

        nav a {
            color: white;
            text-decoration: none;
            margin: 0 15px;
        }

        .container {
            width: 80%;
            max-width: 600px;
            margin: 40px auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            text-align: center;
        }
    </style>
</head>

<body>

<nav>
    <a href="/">Today</a>
    <a href="/tasks">All Tasks</a>
    <a href="/profile">Profile</a>
    <a href="/about">About</a>
</nav>

<div class="container">

    <h1>About</h1>

    <p>Tasks for Today Management System</p>

    <p>
        Developed by <strong>Marco Angelo B. Grageda</strong>
    </p>

    <p>
        IT0049 Web System Technologies
    </p>

</div>

</body>
</html>