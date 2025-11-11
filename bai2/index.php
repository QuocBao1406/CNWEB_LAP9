<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OOP with PHP</title>
    <link href="style.css" rel="stylesheet">
    <script>
        function ajax() {
            var obj = document.getElementById('info');
            obj.style.display='block';
            value = document.getElementById('chon').value;
            var xml =  new XMLHttpRequest();

            xml.onreadystatechange = function () {
                if(xml.readyState == 4) {
                    obj.innerHTML = xml.responseText;
                }
            }
            url = "showTable.php?chon="+value;
            xml.open("GET", url, true);
            xml.send();
        }
    </script>
</head>
<body>
    <h1>OOP with PHP</h1>
    <select id="chon" onChange="ajax();">
        <option value="">Chọn</option>
        <option value="giaovien">Giáo viên</option>
        <option value="sinhvien">Sinh viên</option>
        <option value="hocphan">Học phần</option>
    </select>
    <hr>
    <div id="info" style="display: none;"></div>
</body>
</html>