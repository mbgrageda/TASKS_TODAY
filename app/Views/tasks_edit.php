<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Task - Tasks for Today</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            margin: 0;
            padding: 40px;
        }

        .container {
            max-width: 600px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);
        }

        h1 {
            margin-top: 0;
        }

        label {
            display: block;
            margin-top: 15px;
            margin-bottom: 6px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            margin-top: 20px;
            padding: 11px 20px;
            border: none;
            border-radius: 5px;
            background: #333;
            color: white;
            cursor: pointer;
        }

        button:hover {
            background: #555;
        }

        .back {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            color: #333;
        }

        .errors {
            background: #f8d7da;
            color: #842029;
            padding: 12px;
            border-radius: 5px;
            margin-bottom: 15px;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>Edit Task</h1>

    <?php if (session()->getFlashdata('errors')): ?>
        <div class="errors">
            <?php foreach (session()->getFlashdata('errors') as $error): ?>
                <div><?= esc($error) ?></div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <form action="<?= site_url('tasks/update/' . $task['id']) ?>" method="post">

        <?= csrf_field() ?>

        <label for="title">Task Title</label>
        <input
            type="text"
            id="title"
            name="title"
            value="<?= old('title', $task['title']) ?>"
            required
        >

        <label for="task_date">Task Date</label>
        <input
            type="date"
            id="task_date"
            name="task_date"
            value="<?= old('task_date', $task['task_date']) ?>"
            required
        >

        <button type="submit">Update Task</button>

    </form>

    <a href="<?= site_url('/tasks') ?>" class="back">
        ← Back to Task List
    </a>

</div>

</body>
</html>