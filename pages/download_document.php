<?php
if (isset($_GET['download_id'])) {
    $download_id = $_GET['download_id'];
    $sql = "SELECT * FROM download_page WHERE id=$download_id";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_assoc($result);
    $file = $row['file'];
    $filepath = 'sese.pdf';
    // if (file_put_contents(basename($filepath), file_get_contents($filepath)))
    //     {
    //         echo "File downloaded successfully";
    //     }
    //     else
    //     {
    //         echo "File downloading failed.";
    //    }
    if (file_exists($filepath)){
        // ob_end_clean();
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="'.basename($filepath).'"');
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control:must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($filepath));
        flush(); // Flush system output buffer
        readfile($filepath);
        die();
        // Now update downloads count
        // $newCount = $file['downloads'] + 1;
        // $updateQuery = "UPDATE files SET downloads=$newCount WHERE id=$id";
        // mysqli_query($conn, $updateQuery);
        // exit;
    }else{
        http_response_code(404);
        die();
    }
}
// if(file_exists($filepath)) {
//     header('Content-Description: File Transfer');
//     header('Content-Type: application/octet-stream');
//     header('Content-Disposition: attachment; filename="'.basename($filepath).'"');
//     header('Expires: 0');
//     header('Cache-Control: must-revalidate');
//     header('Pragma: public');
//     header('Content-Length: ' . filesize($filepath));
//     flush(); // Flush system output buffer
//     readfile($filepath);
//     die();
// } else {
//     http_response_code(404);
//     die();
// }
// } else {
// die("Invalid file name!");
// }
// }