<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">

    <title>Document</title>

    <style>

        body {

            background:rgb(12, 12, 12);

            padding: 2em;

            text-align: left;

            color: #ffffff;

            font-family: Arial, Helvetica, sans-serif;

        }

        li {

            padding: 1em;
            
        }

    </style>

</head>

<body>

    <h1>My Tasks -</h1>

    <h2>First Task:</h2>

    <ul>

        <li>

            <strong>Task Name: </strong> <?= $task['title']; ?>

        </li>

        <li>

            <strong>Due Date: </strong> <?= $task['due']; ?>

        </li>

        <li>

            <strong>Student Name: </strong> <?= $task['assigned to']; ?>

        </li>

        <li>

            <strong>Status: </strong> 

            <?php if ($task['completed']) : ?>

                <span class="icon">✅</span>

            <?php else : ?>

                <span class="icon">⛔</span>

            <?php endif; ?>

        </li> 

        <li>

            <strong>Is Graded: </strong> 

            <?php if ($task['graded']) : ?>

                <span class="icon">✅</span>

            <?php else : ?>

                <span class="icon">⛔</span>

            <?php endif; ?>

        </li> 
            
    </ul>

    <h2>Second Task:</h2>

    <ul>

        <li>

            <strong>Task Name: </strong> <?= $task2['title']; ?>

        </li>

        <li>

            <strong>Due Date: </strong> <?= $task2['due']; ?>

        </li>

        <li>

            <strong>Student Name: </strong> <?= $task2['assigned to']; ?>

        </li>

        <li>

            <strong>Status: </strong> 

            <?php if (! $task2['completed']) : ?>

                <span class="icon">⛔</span>

            <?php else : ?>

                <span class="icon">✅</span>

            <?php endif; ?>

        </li> 

        <li>

            <strong>Is Graded: </strong> 

            <?php if (! $task2['graded']) : ?>

                <span class="icon">⛔</span>

            <?php else : ?>

                <span class="icon">✅</span>

            <?php endif; ?>

        </li> 
            
    </ul>

</body>

</html>