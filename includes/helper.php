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

// var_dump(db_update('users', ['name' => 'ahmed2', 'email' => 'ahmed2@test.com'], 1));


/**
 * Delete function
 * @param string $table
 * @param int $id
 * 
 */

if (!function_exists('db_delete')) {
    function db_delete(string $table, int $id)
    {
        global $conn;
        $query = mysqli_query($conn, "delete from $table where id = $id");
        return $query;
    }
}

/**
 * find by id function
 * @param string $table
 * @param int $id
 * @return array as assoc
 */
if (!function_exists('db_find_by_id')) {
    function db_find_by_id(string $table, int $id)
    {
        global $conn;
        $query = mysqli_query($conn, "select * from $table where id = $id");
        $data = mysqli_fetch_assoc($query);
        return $data;
    }
}

/**
 * find first function
 * @param string $table
 * @param string $query_column
 * @return array as assoc
 */

if (!function_exists('db_find_first')) {
    function db_find_first(string $table, string $query_column)
    {
        global $conn;
        $query = mysqli_query($conn, "select * from $table $query_column");
        $data = mysqli_fetch_assoc($query);
        return $data;
    }
}

var_dump(db_find_first('users', "where name = 'ahmed2'"));
