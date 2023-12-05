<?php

class MSS_Useful
{


    static function log($data, $clean_log = false)
    {
        // Place the log on wp root
        // $logs_dir = ABSPATH . "log/WPB_".basename(WPB_PATH);

        // Place the log on plugin folder
        $logs_dir = MSS_PATH;

        if (!is_dir($logs_dir)) {
            mkdir($logs_dir, 0755, true);
        }

        $date = date("Y-m-d");
        $file_name = $logs_dir . '/' . $date . ".json";

        if ($clean_log)
            $obj = fopen($file_name, 'w');
        else $obj = fopen($file_name, 'a');

        $data = json_encode($data);

        fwrite($obj, $data);
        fwrite($obj, "\n\n");

        fclose($obj);
    }

}
