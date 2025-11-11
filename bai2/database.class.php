<?php
class DAO {
    private $connect;
    function __construct($user, $password, $db) {
        $host='localhost';
        $this->connect = mysqli_connect($host, $user, $password, $db);
    }

    public function query($sql) {
        mysqli_query($this->connect, "set names 'utf8' ");
        $rs = mysqli_query($this->connect, $sql);
        return $rs;
    }

    function table($sql, $header) {
        $rs = $this->query($sql);
        $fieldinfo = mysqli_fetch_fields($rs);
        $str = "<table><tr>";
        foreach ($fieldinfo as $val) {
            $name = $val->name;
            $str.="<th> . $name . </th>";
        }
        $str.="</tr>";
        while($r = mysqli_fetch_array($rs)) {
            $str.="<tr>";
            foreach ($fieldinfo as $val) {
                $name=$val->name;
                $str.="<td> . $r[$name] . </td>";
            }
            $str.="</tr>";
        }
        $str.="</table>";
        echo "<h3>{$header}</h3>";
        echo $str;
    }
}
?>