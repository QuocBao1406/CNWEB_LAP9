<!doctype html>
<html>
    <link>
        <meta charset="utf-8">
        <title>Ajax- Danh sách lớp</title>
        <link href="style/style.css" rel="stylesheet"></link>
        <script>
            function sendajax() {
                lop=document.getElementById('lop').value;
                objds=document.getElementById('ds');
                xml=new XMLHttpRequest();
                xml.onreadystatechange=function() {
                    if(xml.readyState == 4) {
                        objds.innerHTML=xml.responseText;
                    }
                }
                url='ds.php?lop='+lop;
                xml.open('GET', url, true);
                xml.send();
            }
        </script>
    </head>
    <body>
        <h3>In danh sách theo từng lớp</h3>
        <?php
            include('inc/connect.inc');

            function initClass($connect) {
                $sql="SELECT DISTINCT lop FROM sinhvien";
                $rs = mysqli_query($connect, $sql);
                $str = "Chọn lớp: <select id=lop onChange='sendajax();'>";
                while ($row = mysqli_fetch_array($rs)) {
                    $str.="<option value={$row['lop']}>{$row['lop']}</option>";
                }

                echo $str."</select>";
            }
        
            initClass($connect);
        ?>

        <hr>
        <div id="ds">Danh sách</div>
    </body>
</html>