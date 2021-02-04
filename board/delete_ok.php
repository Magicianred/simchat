<!DOCTYPE html>
<html>
<head>
        <meta charset = "utf-8">
</head>
<body style = "background-color: #292a2d;">
<?php
if ($_GET['code']) {

        if ($_GET['passwd']) {
                $code = $_GET['code'];
                $conn = mysqli_connect("localhost","simchat","","simchat");
                $encoding = "set names utf8;";
                $set_encoding = mysqli_query($conn, $encoding);
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
                                alert('삭제되었습니다.');
                                window.location.href = './';
                        </script>
                        ";
                } else {
                        echo "
                        <script>
                                alert('비밀번호가 일치하지 않습니다.');
                                history.back();
                        </script>
                        ";
                }

        } else {
                echo "
                <script>
                        alert('비밀번호를 입력하세요.');
                        history.back();
                </script>
                ";
        }
} else {
        echo "
        <script>
                alert('삭제할 게시물이 없습니다.');
                history.back();
        </script>
        ";
}
?>
</body>
</html>
