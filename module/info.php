<?php

class info extends common {

    function __construct() {
        $this->checklogin();
        $this->table_prefix();
        parent:: __construct();
    }
    function date_format($date) {
        list($y, $m, $d) = preg_split('/[\/.-]/', $date);
        $new_date = "$d-$m-$y";
        return $new_date;
    }
    function ddslick() {
        $name = $_REQUEST['name'];
        $sql = "SELECT * FROM info WHERE name='$name' AND !status ORDER BY name, start_date DESC";
        $res = $this->m->sql_getall($sql);
        $ddata = array();
        foreach ($res as $v) {
            $sdt = $this->date_format($v['start_date']);
            $edt = $this->date_format($v['end_date']);
            $ddata[] = array("text" => "{$sdt}---{$edt}", "value" => "{$v['id_info']}");
        }
        echo json_encode($ddata);
        exit;
    }
    function prefix() {
        $_SESSION['id_info'] = $_REQUEST['id'];
        $_SESSION['sid'] = $_REQUEST['index'];
        $_SESSION['yselect'] = $_REQUEST['yindex'];
        $_SESSION['cname'] = "<font size='+1'>" . $_REQUEST['cname'] . "</font>";
        $_SESSION['companyname'] = $_REQUEST['cname'];
        $sql = "SELECT * FROM info WHERE id_info='{$_REQUEST['id']}'";
        $res = $this->m->fetch_assoc($sql);
        foreach ($res as $k => $v) {
            $_SESSION[$k] = $v;
        }
        $_SESSION['sdate'] = $res['start_date'];
        $_SESSION['edate'] = $res['end_date'];
        $_SESSION['fyear'] = $this->date_format($res['start_date']) . "........... " . $this->date_format($res['end_date']);

        $auto = isset($_SESSION['config']['AUTOBACKUP']) ? $_SESSION['config']['AUTOBACKUP'] : 0;
        if ($auto==1) {
            include "util.php";
            $util = new util();
            $_SESSION['msg'] = $util->auto_backup();
        }
        $this->redirect("index.php");
    }
    function unset_prefix() {
        unset($_SESSION['id_info']);
        unset($_SESSION['cname']);
        unset($_SESSION['companyname']);
        unset($_SESSION['phone']);
        unset($_SESSION['fyear']);
        unset($_SESSION['sdate']);
        unset($_SESSION['edate']);
        unset($_SESSION['gstdate']);
        unset($_SESSION['address']);
        unset($_SESSION['tin']);
        $this->redirect("index.php?module=user&func=_default");
    }
    function insert() {
        $data = $_REQUEST['info'];
        $data['start_date'] = $this->format_date($data['start_date']);
        $data['end_date'] = $this->format_date($data['end_date']);
        $data['gstdate'] = $this->format_date($data['gstdate']);
        $sql = $this->create_insert("`info`", $data);
        $res = $this->m->query($sql);
        $_SESSION['msg'] = "Record Successfully Inserted";
        $this->redirect("index.php?module=info&func=listing");
    }
    function edit() {
        $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : "0";
        $sql = $this->create_select("`info`", "id_info='{$id}'");
        $data = $this->m->fetch_assoc($sql);
        $this->sm->assign("data", $data);
        $this->sm->assign("page", "info/add.tpl.html");
    }
    function update() {
        $data = $_REQUEST['info'];
        $data['start_date'] = $this->format_date($data['start_date']);
        $data['end_date'] = $this->format_date($data['end_date']);
        $data['gstdate'] = $this->format_date($data['gstdate']);
	    $this->addfield('tradename', 'info', 'ADD `tradename` varchar(100)');
        $this->addfield('pincode', 'info', 'ADD `pincode` varchar(10)');
        $this->addfield('statecode', 'info', 'ADD `statecode` varchar(2)');
        $res = $this->m->query($this->create_update("info", $data, "id_info='{$_REQUEST['id']}'"));
        $_SESSION['msg'] = "Record Successfully Updated";
        $this->redirect("index.php?module=info&func=listing");
    }
    function delete() {
        $_SESSION['msg'] = "This feature is disabled.";
        $this->redirect("index.php?module=info&func=listing");
        exit;
        $sql = "SELECT * FROM infO WHERE id_info={$_REQUEST['id']}";
        $data = $this->m->fetch_assoc($sql);
        $tbl = strtolower($data['prefix']) . '__';
        $sql = "SELECT CONCAT( 'DROP TABLE  IF EXISTS ', GROUP_CONCAT( table_name ) , ';' ) AS statement ";
        $sql.=" FROM information_schema.tables WHERE table_name LIKE '$tbl%'";
        $res1 = $this->m->sql_getall($sql);
        $drop = $res1[0]['statement'];
        if ($drop != '') {
            $this->m->query($drop);
            $this->m->query("DROP VIEW {$tbl}ledger;DROP VIEW {$tbl}product_ledger;DROP VIEW {$tbl}product_ledger_summary;DROP VIEW {$tbl}tb;");
        }
        $res = $this->m->query($this->create_delete("info", "id_info='{$_REQUEST['id']}'"));
        $_SESSION['msg'] = "Record Successfully Deleted";
        $this->redirect("index.php?module=info&func=listing");
    }
    function listing() {
        if (isset($_SESSION['is_admin']) && $_SESSION['is_admin'] != 1) {
            $_SESSION['msg'] = "Your are not Authorised to set Permissions.";
            $this->redirect("index.php");
        }
        if (isset($_REQUEST['status'])) {
            ($_REQUEST['status'] == 2) ? $wcond = "" : $wcond = " WHERE status = " . $_REQUEST['status'];
        } else {
            $_REQUEST['status'] = 0;
            $wcond = "WHERE status ={$_REQUEST['status']}";
        }
        $info = $this->m->getall($this->m->query("SELECT * FROM `info` $wcond ORDER BY name, `start_date`"));
        $this->sm->assign("info", $info);
        $this->sm->assign("page", "info/listing.tpl.html");
    }
    function newyear() {
        $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : "0";
        $sql = $this->create_select("`info`", "id_info='{$id}'");
        $data = $this->m->fetch_assoc($sql);
        $this->sm->assign("data", $data);
        $this->sm->assign("page", "info/newyear.tpl.html");
    }
    function insertyr() {
        $data = $_REQUEST['info'];
        $sql = $this->m->query($this->create_select("`info`", "prefix='" . $data['newprefix']) . "'");
        $res = $this->m->getall($sql);
        if (count($res)) {
            $_SESSION['msg'] = "<b>{$data['prefix']}</b>. already created.";
            $this->redirect("index.php");
        }
        $newpf = $data['prefix'];
        $tables = array();
        $result = mysql_query('SHOW FULL TABLES WHERE Table_Type = "BASE TABLE"');
        while ($row = mysql_fetch_row($result)) {
            if (strpos($row[0], $newpf) === 0)
                $tables[] = $row[0];
        }
        $master = array("agreement", "area", "book", "corporate", "group", "head", "partner", "rooms", "roomtype", "taxmaster");
        $master = array("group", "head");
        foreach ($tables as $v) {
            $m = explode("__", $v);
            $nv = $data['newprefix'] . "__" . $m[1];
            if (in_array($m[1], $master)) {
                $sql = "CREATE TABLE $nv (SELECT * FROM $v)";
            } else {
                $sql = "CREATE TABLE $nv (SELECT * FROM $v WHERE id_{$m[1]}=0)";
            }
            mysql_query($sql);
        }
        $data['id_info'] = 0;
        $data['start_date'] = $this->format_date($data['newstart_date']);
        $data['end_date'] = $this->format_date($data['newend_date']);
        $data['prefix'] = $data['newprefix'];
        unset($data['newprefix']);
        unset($data['newstart_date']);
        unset($data['newend_date']);
        unset($data['opt']);
        $this->m->query($this->create_insert("`info`", $data));
        $_SESSION['msg'] = "Record Successfully Inserted";
        $this->redirect("index.php?module=info&func=listing");
    }
}
?>