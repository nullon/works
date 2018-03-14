<?php

if($_POST["action"]){action();}

?>

<form method="post" action="" enctype="multipart/form-data">
    <button name="action" value="insert">INSERT</button>
    <button name="action" value="update">UPDATE</button>
    <button name="action" value="delete">DELETE</button>
</form>

<?php

exit;

function action(){
    $pages = [
        "insert",
        "update",
        "delete",
    ];
    if(in_array($_POST["action"],$pages)){
        $exec = "sql_".$_POST["action"];
        $exec();
    }
}

function sql_insert(){
    $query = "INSERT table VALUES ();";
    echo $query;
}

function sql_update(){
    $query = "UPDATE table SET column = NEW WHERE id = 0;";
    echo $query;
}

function sql_delete(){
    $query = "DELETE FROM table WHERE ID = 0;";
    echo $query;
}
