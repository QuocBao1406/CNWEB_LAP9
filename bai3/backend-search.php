<?php
$link = mysqli_connect("localhost", "root", "", "udn");

if ($link === false) {
    die("ERROR: Không thể kết nối" . mysqli_connect_error());
}

if (isset($_REQUEST["term"])) {
    $sql = "SELECT * FROM hocphan WHERE tenhp LIKE ?";

    if($stmt = mysqli_prepare($link, $sql)) {
        mysqli_stmt_bind_param($stmt, "s", $param_term);

        $param_term = $_REQUEST["term"] . '%';

        if(mysqli_stmt_execute($stmt)) {
            $result = mysqli_stmt_get_result($stmt);

            if(mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                    echo "<p>" . $row['tenhp'] . "</p>";
                }
            } else {
                echo "<p>Không tìm thấy kết quả nào</p>";
            }
        } else {
            echo "ERROR: Không thể thực thi câu lệnh $sql" . mysqli_error($link);
        }
    }
    mysqli_stmt_close($stmt);
}
mysqli_close($link);
?>