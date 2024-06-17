<?php

$database = new mysqli('mysql_db', 'root', 'rootpass', 'dictionary');
    
    if (!$database)
    { 
        echo "Error";
        exit; 
    }

$query = "SELECT article_id, term, def_name FROM dict_articles, definitions where dict_articles.definition = definitions.def_id";

$result = mysqli_query($database, $query);

$num_rows = mysqli_num_rows($result);
    echo "<h3>Термины: ".$num_rows."</h3>";

    for ($i=0; $i<$num_rows; $i++){ 
        $row = mysqli_fetch_array($result);
        
        echo "
        <li><b>$row[term]</b> - $row[def_name]</li><br>";
    } 
?>
