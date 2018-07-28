<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Todo</title>

    <style>
        body {
            background: #b0ebe6;
            font-family: "Roboto", sans-serif;
        }

        .wrapper {
            max-width: 300px;
            margin: 0 auto;
            padding: 20px 15px;
            align-content: center;
            background: #fff;
        }

        .tx {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="tx">
            <h1>ToDo App</h1>
            <form action="todo.php" method="POST">
                <input type="text" name="todo_item" placeholder="Enter todo item...">
                <input type="submit" name="add_item" value="Add Item" />
            </form>
        </div>
        <div class="todo-items">
            <ul>
            <?php
                $file = file_get_contents("./todo2.json");
                $json_content = json_decode($file);

                for ($i = 0; $i < sizeof($json_content->items); $i++) {
                    //if ($json_content->items[$i]->status == "open") {
                    echo "<li>".$json_content->items[$i]->title . " - " . $json_content->items[$i]->date_created;"<li><br>";
                    //}
                }
            ?>
<!--
            </ul>
        </div>
    </div>
</body>

</html>
