<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>CSVファイルをテーブルに出力する。</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
</head>
<body>
<?php
if(file_exists($_FILES["file"]["tmp_name"])){echo '<div class="container">';write_table(csv_to_array(mb_convert_encoding(file_get_contents($_FILES["file"]["tmp_name"]),"UTF-8","SJIS")));echo '</div>';}
else{
?>
    <div class="container">
        <h1>CSVファイルをテーブルに出力する。</h1>
        <form class="form-inline" method="post" action="" enctype="multipart/form-data">
            <div class="form-group">
                <input type="file" accept=".csv" name="file" />
            </div>
            <div class="form-group">
                <input type="submit" value="アップロード" />
            </div>
        </form>
        <div class="row">
            <p>
                ※アップロードしたファイルはサーバーには保存されませんが、暗号化されていない通信では傍受される可能性があります。<br />
                そのため、個人情報などを含むデータのアップロードは推奨されません。
            </p>
        </div>
    </div>
    <?php
    }
    ?>
</body>
</html>
<?php
exit;
function csv_to_array ($str){
    $return = [];
    $array = explode("\n",$str);
    array_pop($array);
    foreach($array as $value){array_push($return,explode(",",$value));}
    return $return;
}
function write_table($array){
    echo '<table class="table table-bordered table-condensed">';
    foreach($array as $row):
        echo "<tr>";
        foreach($row as $data):
            echo "<td>".$data."</td>";
        endforeach;
        echo "</tr>";
    endforeach;
    echo '</table>';
}
