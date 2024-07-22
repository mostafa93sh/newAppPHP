<?php
if(!function_exists('db_create')){
    function db_create($table,array $data){
        global $conn;
        $sql = 'INSERT INTO '.$table;
        $columns="";
        $values="";
        foreach($data as $key=>$value){
            $columns.=$key.',';
            $values.=" '".$value."',";

        }

        $columns = rtrim($columns,",");
        $values = rtrim($values,",");

        $sql .= "(".$columns.") VALUES (".$values.")";
        echo $sql ;
        // $query = mysqli_query($conn , $sql);
    }
}

db_create('users',['name'=>'ahmed','email'=>'ahmed@test.com'] );