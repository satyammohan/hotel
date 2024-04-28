<?php

class common {

    function __construct() {
        global $smarty;
        $this->sm = $smarty;
        $n = func_num_args();
        for ($i = 0; $i < $n; $i += 2) {
            $this->{func_get_arg($i)} = func_get_arg($i + 1);
        }
        $this->m = new database();
        $this->ini = parse_ini_file("config/site.ini", true);
        $smarty->assign("ini", $this->ini);
        //echo "<b>common default</b></br>";
        $module = isset($_REQUEST['module']) ? $_REQUEST['module'] : "";
        $func = isset($_REQUEST['func']) ? $_REQUEST['func'] : "";
        $tpl = "{$module}/{$func}.tpl.html";
        if (!$smarty->templateExists($tpl)) {
            $tpl = "default.tpl.html";
        }
        $smarty->assign("page", $tpl);
    }

    function _default() {
        
    }

    function table_prefix() {
        if (isset($_SESSION['prefix'])) {
            $this->prefix = $_SESSION['prefix'] . "__";
        }
        return;
    }

    function create_select($tbl, $cond) {
        $sql = "SELECT * FROM $tbl";
        if ($cond) {
            $sql .= " WHERE $cond ";
        }
        return $sql;
    }

    function create_delete($tbl, $cond) {
        $sql = "DELETE FROM `$tbl`";
        if ($cond) {
            $sql .= " WHERE $cond ";
        }
        return $sql;
    }

    function create_insert($tbl, $arr) {
        $key = array_keys($arr);
        $val = array_values($arr);
        $sql = "INSERT INTO $tbl (`";
        $sql .= implode("`, `", $key);
        $sql .= "`) VALUES ('";
        $sql .= implode("', '", $val);
        $sql .= "')";
        return $sql;
    }

    function create_update($tbl, $arr, $cond) {
        $sql = "UPDATE `$tbl` SET ";
        $fld = array();
        foreach ($arr as $k => $v) {
            $fld[] = "`$k` = '$v'";
        }
        $sql .= implode(", ", $fld);
        $sql .= " WHERE " . $cond;
        return $sql;
    }

    function redirect($url) {
        header("location:$url");
        exit;
    }

    function checklogin() {
        if (isset($_SESSION['id_user'])) {
            return;
        }
        $_SESSION['msg'] = "Please Login to access this Page.";
        $this->redirect("index.php");
    }

    function format_date($date) {
        if (empty($date))
            return "";
        list($d, $m, $y) = preg_split('/[\/.-]/', $date);
        $new_date = "$y-$m-$d";
        return $new_date;
    }

    function format_ymd($date) {
        if (empty($date))
            return "";
        list($y, $m, $d) = preg_split('/[\/.-]/', $date);
        $new_date = "$d-$m-$y";
        return $new_date;
    }

    function pr($data) {
        print "<pre>";
        print_r($data);
        print "</pre>";
    }

    function update_flag() {
        if (($_REQUEST['table'] == 'info') || ($_REQUEST['table'] == 'user') || ($_REQUEST['table'] == 'template')) {
            $tbl = $_REQUEST['table'];
        } else {
            $tbl = $this->prefix . $_REQUEST['table'];
        }
        $sql = "UPDATE `{$tbl}` SET status='{$_REQUEST['row_status']}' WHERE `id_{$_REQUEST['table']}`='{$_REQUEST['id']}'";
        $this->m->query($sql);
        if ($_REQUEST['list_status'] != 2) {
            $status = $_REQUEST['list_status'];
        } else {
            $status = 2;
        }
        $this->redirect($_SERVER['HTTP_REFERER']);
    }
    function convert_number($number) {
        $no = floor($number);
        $decimal = round($number - $no, 2) * 100;
        $decimal_part = $decimal;
        $hundred = null;
        $hundreds = null;
        $digits_length = strlen($no);
        $decimal_length = strlen($decimal);
        $i = 0;
        $str = array();
        $str2 = array();
        $words = array(0 => '', 1 => 'one', 2 => 'two',
            3 => 'three', 4 => 'four', 5 => 'five', 6 => 'six',
            7 => 'seven', 8 => 'eight', 9 => 'nine',
            10 => 'ten', 11 => 'eleven', 12 => 'twelve',
            13 => 'thirteen', 14 => 'fourteen', 15 => 'fifteen',
            16 => 'sixteen', 17 => 'seventeen', 18 => 'eighteen',
            19 => 'nineteen', 20 => 'twenty', 30 => 'thirty',
            40 => 'forty', 50 => 'fifty', 60 => 'sixty',
            70 => 'seventy', 80 => 'eighty', 90 => 'ninety');
        $digits = array('', 'hundred','thousand','lakh', 'crore');
        
        while( $i < $digits_length ) {
            $divider = ($i == 2) ? 10 : 100;
            $number = floor($no % $divider);
            $no = floor($no / $divider);
            $i += $divider == 10 ? 1 : 2;
            if ($number) {
                $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
                $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
                $str [] = ($number < 21) ? $words[$number].' '. $digits[$counter]. $plural.' '.$hundred:$words[floor($number / 10) * 10].' '.$words[$number % 10]. ' '.$digits[$counter].$plural.' '.$hundred;
            } else $str[] = null;
        }

        $d = 0;
        while( $d < $decimal_length ) {
            $divider = ($d == 2) ? 10 : 100;
            $decimal_number = floor($decimal % $divider);
            $decimal = floor($decimal / $divider);
            $d += $divider == 10 ? 1 : 2;
            if ($decimal_number) {
                $plurals = (($counter = count($str2)) && $decimal_number > 9) ? 's' : null;
                $hundreds = ($counter == 1 && $str2[0]) ? ' and ' : null;
                @$str2 [] = ($decimal_number < 21) ? $words[$decimal_number].' '. $digits[$decimal_number]. $plural.' '.$hundred:$words[floor($decimal_number / 10) * 10].' '.$words[$decimal_number % 10]. ' '.$digits[$counter].$plural.' '.$hundred;
            } else $str2[] = null;
        }
        
        $Rupees = implode('', array_reverse($str));
        $paise = implode('', array_reverse($str2));
        $paise = ($decimal_part > 0) ? $paise . ' Paise' : '';
        $str = ($Rupees ? $Rupees . 'Rupees ' : '') . $paise;
        $str = ucwords(str_replace("  ", " ", $str));
        return $str;
    }

    function convert_number_old($number) {
//A function to convert numbers into Indian readable words with Cores, Lakhs and Thousands.
        $words = array(
            '0' => '', '1' => 'one', '2' => 'two', '3' => 'three', '4' => 'four', '5' => 'five',
            '6' => 'six', '7' => 'seven', '8' => 'eight', '9' => 'nine', '10' => 'ten',
            '11' => 'eleven', '12' => 'twelve', '13' => 'thirteen', '14' => 'fouteen', '15' => 'fifteen',
            '16' => 'sixteen', '17' => 'seventeen', '18' => 'eighteen', '19' => 'nineteen', '20' => 'twenty',
            '30' => 'thirty', '40' => 'fourty', '50' => 'fifty', '60' => 'sixty', '70' => 'seventy',
            '80' => 'eighty', '90' => 'ninty');

        //First find the length of the number
        //divide number from decimal point
        $originalnum = explode('.', $number);
        $number_length = strlen($originalnum[0]);
        $originalnum[1] = isset($originalnum[1]) ? $originalnum[1] : 0;
        $paisa_length = strlen($originalnum[1]);
        //Initialize an empty array
        $number_array = array(0, 0, 0, 0, 0, 0, 0, 0, 0);
        $paisa_array = array(0, 0);
        $received_number_array = array();
        $paisa_number_array = array();

        //Store all received numbers into an array
        for ($i = 0; $i < $number_length; $i++) {
            $received_number_array[$i] = substr($originalnum[0], $i, 1);
        }

        for ($i = 0; $i < $paisa_length; $i++) {
            $paisa_number_array[$i] = substr($originalnum[1], $i, 1);
        }

        //Populate the empty array with the numbers received - most critical operation
        for ($i = 9 - $number_length, $j = 0; $i < 9; $i++, $j++) {
            $number_array[$i] = $received_number_array[$j];
        }

        for ($i = 2 - $paisa_length, $j = 0; $i < 2; $i++, $j++) {
            $paisa_array[$i] = $paisa_number_array[$j];
        }
        $number_to_words_string = "";
        $paisa_to_string = "";
        //Finding out whether it is teen ? and then multiplying by 10, example 17 is seventeen, so if 1 is preceeded with 7 multiply 1 by 10 and add 7 to it.
        for ($i = 0, $j = 1; $i < 9; $i++, $j++) {
            if ($i == 0 || $i == 2 || $i == 4 || $i == 7) {
                if ($number_array[$i] == "1") {
                    $number_array[$j] = 10 + $number_array[$j];
                    $number_array[$i] = 0;
                }
            }
        }

        for ($i = 0, $j = 1; $i < 2; $i++, $j++) {
            if ($i == 0 || $i == 2) {
                if ($paisa_array[$i] == "1") {
                    $paisa_array[$j] = 10 + $paisa_array[$j];
                    $paisa_array[$i] = 0;
                }
            }
        }

        $value = "";
        for ($i = 0; $i < 9; $i++) {
            if ($i == 0 || $i == 2 || $i == 4 || $i == 7) {
                $value = $number_array[$i] * 10;
            } else {
                $value = $number_array[$i];
            }
            if ($value != 0) {
                $number_to_words_string.= $words["$value"] . " ";
            }
            if ($i == 1 && $value != 0) {
                $number_to_words_string.= "Crores ";
            }
            if ($i == 3 && $value != 0) {
                $number_to_words_string.= "Lakhs ";
            }
            if ($i == 5 && $value != 0) {
                $number_to_words_string.= "Thousand ";
            }
            if ($i == 6 && $value != 0) {
                $number_to_words_string.= "Hundred ";
            }
        }
        if ($number_length > 9) {
            $number_to_words_string = "Sorry This does not support more than 99 Crores";
        }
        $value1 = "";
        for ($i = 0; $i < 2; $i++) {
            if ($i == 0 || $i == 2) {
                $value1 = $paisa_array[$i] * 10;
            } else {
                $value1 = $paisa_array[$i];
            }
            if ($value1 != 0) {
                $paisa_to_string.= $words["$value1"] . " ";
            }
        }
        if ($paisa_length > 2) {
            $paisa_to_string = "Sorry This does not support more than 99 Paisa";
        }
        if ($paisa_to_string == '') {
            $paisa = "Only.";
        } else {
            $paisa = " and " . $paisa_to_string . "paisa  Only.";
        }
        return ucwords(strtolower("" . $number_to_words_string) . $paisa);
    }

    function set_permission() {
        if ($_SESSION['is_admin'])
            return;
        $id = $_SESSION["id_user"];
        $sql = "SELECT a.*, mp.permission FROM (SELECT u.id_user, u.name AS username, m.id_module, m.name AS modulename, 
            p.id_permission, p.name AS permissionname FROM user u, module m, permission p WHERE u.id_user={$id}) AS a 
            LEFT JOIN module_map mp ON a.id_user=mp.id_user AND a.id_module=mp.id_module AND a.id_permission=mp.id_permission
            ORDER BY a.username, a.modulename";
        $data = array();
        $rs = $this->m->query($sql);
        while ($row = $this->m->movenexta($rs)) {
            $module = strtoupper($row['modulename']);
            $permissionname = strtoupper($row['permissionname']);
            $permission = $row['permission'];
            $data[$module][$permissionname] = $permission;
        }
        $_SESSION['permission'] = $data;
    }

    function get_permission($module, $per) {
        if ($_SESSION['is_admin'])
            return;
        $module = strtoupper($module);
        $per = strtoupper($per);
        $v = $_SESSION['permission'][$module][$per];
        if ($v != 1) {
            $_SESSION['msg'] = "*****Access Denied for Module $module and operation $per.*****";
            $this->redirect('index.php');
        }
    }
    function addfield($fld, $tbl, $qstring) {
        $sql = "SHOW COLUMNS FROM {$tbl} LIKE '{$fld}'";
        $uid = $this->m->num_rows($this->m->query($sql)) == 0 ? 0 : 1;
        if ($uid == 0) {
            $sql = "ALTER TABLE `{$tbl}` {$qstring}";
            $this->m->query($sql);
        }
    }
    function startdate() {
        if (date() >= $_SESSION['sdate'] AND date() <= $_SESSION['edate']) {
            $dt = $this->format_date(isset($_REQUEST['start_date']) ? $_REQUEST['start_date'] : date("01/m/Y"));
        } else {
            $dt = $this->format_date(isset($_REQUEST['start_date']) ? $_REQUEST['start_date'] : date("01/m/Y"));
        }
        return $dt;
    }
    function getstartdate() {
        $rd = isset($_REQUEST['start_date']) ? $_REQUEST['start_date'] : date("01/m/Y");
        if (!($rd>=$_SESSION['start_date'] AND $rd>=$_SESSION['end_date']) ) {
            // $rd = date("Y/m/01", strtotime($_SESSION['end_date']));
        }
        // $_REQUEST['start_date'] = $rd = $this->format_date($rd);
        $rd = $this->format_date($rd);
        return $rd;
    }    
    function getenddate() {
        $rd = isset($_REQUEST['end_date']) ? $_REQUEST['end_date'] : date("d/m/Y");
        if (!($rd>=$_SESSION['start_date'] AND $rd>=$_SESSION['end_date']) ) {
            // $rd = $_SESSION['end_date'];
        }
        // $_REQUEST['end_date'] = $rd = $this->format_date($rd);
        $rd = $this->format_date($rd);
        return $rd;
    }
    function approve() {
        if ($_SESSION['is_approve']==1) {
            $tbl = $_REQUEST['table'];
            $this->get_permission( $tbl, 'UPDATE' );
            $id = $_REQUEST['id'];
            $fld = isset($_REQUEST['fld']) ? $_REQUEST['fld'] : "id_{$tbl}";
            $sql = "UPDATE {$this->prefix}{$tbl} SET approve=1 WHERE $fld='$id'";
            $this->m->query( $sql );
            $_SESSION[ 'msg' ] = 'This entry is Approved.';
        } else {
            $_SESSION[ 'msg' ] = 'You do not have Permission to perform this operation.';
        }
        $url = $_SERVER['HTTP_REFERER'];
        $this->redirect( $url );
    }
    function unapprove() {
        if ($_SESSION['is_approve']==1) {
            $tbl = $_REQUEST['table']; 
            $this->get_permission( $tbl, 'UPDATE' );
            $id = $_REQUEST['id'];
            $fld = isset($_REQUEST['fld']) ? $_REQUEST['fld'] : "id_{$tbl}";
            $sql = "UPDATE {$this->prefix}{$tbl} SET approve=NULL WHERE $fld='$id'";
            $this->m->query( $sql );
            $_SESSION[ 'msg' ] = 'This entry is Un-approved.';
        } else {
            $_SESSION[ 'msg' ] = 'You do not have Permission to perform this operation.';
        }
        $url = $_SERVER['HTTP_REFERER'];
        $this->redirect( $url );
    }
    function register_log($p, $c, $type) {
        if ($type=="V") {
            $flds = "date,id_head_debit,id_head_credit,total,ref1,memo,id_create,no";
        }
        if ($type=="H") {
            $flds = "";
        }
        if ($type=="B") {
            $flds = "";
        }
        if ($flds) {
            $flds = explode(",", $flds);
            foreach ($flds as $v) {
                $pv[$v] = $p[$v];
            }
            $p = $pv;
            $d = array_diff($p, $c);
            $d = addslashes(implode(",", array_keys($d)));
        } else {
            $d = addslashes(implode(",", array_keys($c)));
        }
        $p = addslashes(json_encode($p));
        $c = addslashes(json_encode($c));
        $sql = "INSERT INTO log (date, type, `previous`, `current`, `change`) VALUES (NOW(), '$type', '$p', '$c', '$d') ";
        $this->m->query( $sql );
    }
    function getfinancialyear($sdate, $edate) {
        $sql = "SELECT * FROM info WHERE start_date<='$sdate' ORDER BY start_date DESC LIMIT 1";
        $data = $this->m->getall($this->m->query($sql));
        //pr($sdate."----".$edate);  pr($sql);  pr($data);
        if (!$data[0]['prefix']) {
            $sql = "SELECT * FROM info ORDER BY start_date DESC LIMIT 1";
            $data = $this->m->getall($this->m->query($sql));
        }
        return $data[0]['prefix'];
    }
}
function pr($data) {
    print "<pre>";
    print_r($data);
    print "</pre>";
}
?>