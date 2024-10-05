<?php

page();

exit;

function page(){
    $pages = [
        "index",
        "about",
        "link",
    ];

    if(in_array($_GET["p"],$pages)){
        $exec = "page_".$_GET["p"];
        $exec();
    }
}

function page_index(){
?>
    <h1>Title</h1>
    <p>This is INDEX.</p>
<?php
}

function page_about(){
?>
    <h2>About<h2>
<?php
}

function page_link(){
?>
    <h2>Link</h2>
    <ul>
        <li><a href="?p=index">INDEX</a></li>
        <li><a href="?p=about">ABOUT</a></li>
        <li><a href="?p=link">LINK</a></li>
    </ul>
<?php
}
//EOF
//EOF