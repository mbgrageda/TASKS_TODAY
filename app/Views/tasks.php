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

        .actions {
            margin-top: 15px;
        }

        .edit-button,
        .archive-button {
            display: inline-block;
            padding: 8px 14px;
            border: none;
            border-radius: 5px;
            color: white;
            text-decoration: none;
            cursor: pointer;
            font-size: 14px;
        }

        .edit-button {
            background: #333;
        }

        .edit-button:hover {
            background: #555;
        }

        .archive-button {
            background: #8b0000;
        }

        .archive-button:hover {
            background: #b00000;
        }

        .success {
            background: #d1e7dd;
            color: #0f5132;
            padding: 12px;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .no-tasks {
            text-align: center;
            color: #777;
            padding: 20px;
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

    <h1>All Tasks</h1>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="success">
            <?= esc(session()->getFlashdata('success')) ?>
        </div>
    <?php endif; ?>

    <?php if (empty($tasks)): ?>

        <div class="no-tasks">
            No tasks available.
        </div>

    <?php else: ?>

        <?php foreach ($tasks as $task): ?>

            <div class="task <?= esc($task['status']) ?>">

                <strong><?= esc($task['title']) ?></strong>

                <p>
                    Date: <?= esc($task['task_date']) ?>
                </p>

                <p class="status">
                    Status: <?= esc($task['status']) ?>
                </p>

                <?php if (session()->get('logged_in')): ?>

                    <div class="actions">

                        <a
                            href="<?= site_url('tasks/edit/' . $task['id']) ?>"
                            class="edit-button"
                        >
                            Edit
                        </a>

                        <form
                            action="<?= site_url('tasks/delete/' . $task['id']) ?>"
                            method="post"
                            style="display: inline;"
                            onsubmit="return confirm('Are you sure you want to archive this task?');"
                        >

                            <?= csrf_field() ?>

                            <button
                                type="submit"
                                class="archive-button"
                            >
                                Archive
                            </button>

                        </form>

                    </div>

                <?php endif; ?>

            </div>

        <?php endforeach; ?>

    <?php endif; ?>

</div>

</body>
</html>