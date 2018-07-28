<?php
//check if form is submitted
if(isset($_POST['add_item'])) {

    $file = file_get_contents("./todo2.json");
    echo "This should work". $file;
    $json_content = json_decode($file);
    $todoItem = $_POST['todo_item'];

    //check for an existing item
    $itemExist = false;
    for ($i = 0 ; $i < count($json_content->items); $i++) {
        if($json_content->items[$i]->title == $todoItem) {
            //Item exists. don't save. return
            $itemExist = true;
            break;   
        }
    } 

    if ($itemExist == false) {
        //item doesn't exist in items array, let's add it.
        array_push($json_content->items, [
            "title" => $todoItem,
            "date_created" => date('d-m-Y')
        ]);
        //update and save file
        // file_put_contents("./todo.json", json_encode($json_content));
        file_put_contents("./todo2.json", json_encode($json_content));
        echo "<h1>Todo Item added!!!</h1>";
    } else {
        header("Location: index.php?err=item_exists");
        return;
            
    }
}
?>

