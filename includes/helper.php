<?php

/**
 * Insert function
 * @param string $table
 * @param array $data
 * @return array as assoc
 */
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

// var_dump(db_create('users', ['name' => 'ahmed', 'email' => 'ahmed@test.com']));
// var_dump(db_create('users', ['name' => 'mostafa', 'email' => 'mostafa@test.com']));
/**
 * Update function
 * @param string $table 
 * @param array $data
 * @param int $id
 * @return array as assoc
 */

if (!function_exists('db_update')) {
    function db_update(string $table, array $data, int $id)
    {
        global $conn;
        $sql = "UPDATE $table set ";
        $set = "";
        // $values = "";
        foreach ($data as $key => $value) {
            $set .= "$key = '$value',";
            // $values .= " '" . $value . "',";
        }

        $set = rtrim($set, ",");
        // $values = rtrim($values, ",");

        $sql .= "$set where id = $id";
        // echo $sql;
        mysqli_query($conn, $sql);

        $first = mysqli_query($conn, "select * from $table where id = $id");
        mysqli_close($conn);
        return mysqli_fetch_assoc($first);
    }
}

var_dump(db_update('users', ['name' => 'ahmed2', 'email' => 'ahmed2@test.com'], 1));
