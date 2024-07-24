<?php
if (!function_exists('db_create')) {
    function db_create(string $table, array $data)
    {
        global $conn;
        $sql = 'INSERT INTO ' . $table;
        $columns = "";
        $values = "";
        foreach ($data as $key => $value) {
            $columns .= $key . ',';
            $values .= " '" . $value . "',";
        }

        $columns = rtrim($columns, ",");
        $values = rtrim($values, ",");

        $sql .= "(" . $columns . ") VALUES (" . $values . ")";
        // echo $sql ;
        mysqli_query($conn, $sql);
        $id = mysqli_insert_id($conn);
        $first = mysqli_query($conn, "select * from $table where id = $id");
        mysqli_close($conn);
        return mysqli_fetch_assoc($first);
    }
}

var_dump(db_create('users', ['name' => 'mostafa', 'email' => 'mostafa@test.com']));
