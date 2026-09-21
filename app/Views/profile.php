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
        }

        .profile-item {
            margin: 15px 0;
        }

        .label {
            font-weight: bold;
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

    <h1>Profile</h1>

    <?php if ($user): ?>

        <div class="profile-item">
            <span class="label">Username:</span>
            <?= esc($user['username']) ?>
        </div>

        <div class="profile-item">
            <span class="label">Full Name:</span>
            <?= esc($user['full_name']) ?>
        </div>

        <div class="profile-item">
            <span class="label">Email:</span>
            <?= esc($user['email']) ?>
        </div>

    <?php else: ?>

        <p>No user found.</p>

    <?php endif; ?>

</div>

</body>
</html>