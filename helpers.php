<?php

if (! function_exists('dd')) {
    function dd(...$data)
    {
        foreach ($data as $d) {
            var_dump($d);
        }
    }
}

function file_get(){
    return json_decode(file_get_contents(JSON_FILE_SRC), true);
}

function file_put($data){
    file_put_contents(JSON_FILE_SRC, json_encode(array_values($data), JSON_PRETTY_PRINT)) or die("File edit failed.");
    
}

function file_get_b(){
    return json_decode(file_get_contents(BUDGET_FILE_SRC), true);
}

function file_put_b($data){
    file_put_contents(BUDGET_FILE_SRC, json_encode(array_values($data), JSON_PRETTY_PRINT)) or die("File edit failed.");
    
}

function get_next_id() : int{
    $file_data = file_get();
    $total_data = count($file_data);

    if($total_data === 0) return 1;

    return intval($file_data[$total_data - 1]['id']) + 1;
}

function get_next_id_b() : int{
    $file_data = file_get_b();
    $total_data = count($file_data);

    if($total_data === 0) return 1;

    return intval($file_data[$total_data - 1]['id']) + 1;
}
