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
            max-width: 900px;
            margin: 40px auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .task {
            border: 1px solid #ddd;
            padding: 15px;
            margin-bottom: 10px;
            border-radius: 6px;
        }

        .completed {
            background: #e8f5e9;
        }

        .pending {
            background: #fff8e1;
        }

        .status {
            font-size: 13px;
            font-weight: bold;
            text-transform: uppercase;
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

    <h1>Today's Tasks</h1>

    <p><?= date('F d, Y') ?></p>

    <?php if (!empty($tasks)): ?>

        <?php foreach ($tasks as $task): ?>

            <div class="task <?= esc($task['status']) ?>">

                <strong><?= esc($task['title']) ?></strong>

                <p class="status">
                    Status: <?= esc($task['status']) ?>
                </p>

            </div>

        <?php endforeach; ?>

    <?php else: ?>

        <p>No tasks scheduled for today.</p>

    <?php endif; ?>

</div>

</body>
</html>