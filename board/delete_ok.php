<!DOCTYPE html>
<html>
<head>
        <meta charset = "utf-8">
</head>
<body style = "background-color: #292a2d;">
<?php
if ($_GET['code']) {

        if ($_GET['passwd']) {
				
				include '../func/db.php';
                $code = $_GET['code'];
                $conn = mysqli_connect("$hostname","$dbuserid","$dbpasswd","simchat");
                require_once '../func/encoding.php';
                $sql = "select * from board where code=$code;";
                $result = mysqli_query($conn, $sql);

                while ($info = mysqli_fetch_array($result)) {
                        $ori_passwd = $info['password'];
                }

                if ($_GET['passwd'] == $ori_passwd) {
                        $dsql = "delete from board where code=$code";
                        $del_confirm = mysqli_query($conn, $dsql);
                        echo "
                        <script>
                                alert('Confirm');
                                window.location.href = './';
                        </script>
                        ";
                } else {
                        echo "
                        <script>
                                alert('password does not match');
                                history.back();
                        </script>
                        ";
                }

        } else {
                echo "
                <script>
                        alert('enter your password');
                        history.back();
                </script>
                ";
        }
} else {
        echo "
        <script>
            history.back();
        </script>
        ";
}
?>
</body>
</html>
