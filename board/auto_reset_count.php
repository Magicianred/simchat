<?php
        $datefilename = "dateinfo.txt";
        $date = date("d");

        if (file_exists('./'.$datefilename)) {
                $date_old = file_get_contents('./'.$datefilename);
        } else {
                file_put_contents((string)'./'.$datefilename, (int)$date);
                exit;
        }

        if ((int)$date_old != (int)$date) {
                unlink('./'.$datefilename);
                file_put_contents((string)'./'.$datefilename, (int)$date);

                include "../func/db.php";
                $conn = mysqli_connect("$hostname","$dbuserid","$dbpasswd","simchat");
                $reset_sql = "delete from numlike where code != 0";
                $dbrenew = mysqli_query($conn, $reset_sql);
        }
?>
