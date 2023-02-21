<?php
class log extends common {
    function __construct() {
        $this->checklogin();
        $this->table_prefix();
        parent:: __construct();
        $this->checklog();
    }
    function checklog() {
        $sql = "SET sql_notes = 0;";
        $this->m->query($sql);
        //$sql = "DROP TABLE {$this->prefix}log;";
        //$this->m->query($sql);
        $sql = "CREATE TABLE IF NOT EXISTS {$this->prefix}log (id_log INT NOT NULL AUTO_INCREMENT, type VARCHAR(1), date DATETIME DEFAULT NULL, 
                `previous` text DEFAULT NULL, `current` text DEFAULT NULL, `change` text DEFAULT NULL, PRIMARY KEY (id_log));";
        $this->m->query($sql);
        $sql = "SET sql_notes = 1;";
        $this->m->query($sql);
    }
    function master() {
        $_REQUEST['start_date'] = $sdate = isset($_REQUEST['start_date']) ? $_REQUEST['start_date'] : date("Y-m-01");
        $_REQUEST['end_date'] = $edate = isset($_REQUEST['end_date']) ? $_REQUEST['end_date'] : date("Y-m-d");

        $sql = "SELECT * FROM {$this->prefix}log WHERE (date >= '$sdate' AND date <= '$edate') AND type='H' ORDER BY date, id_log";
        $data = $this->m->sql_getall($sql);
        $this->sm->assign("log", $data);
    }
    function booking() {
        $_REQUEST['start_date'] = $sdate = isset($_REQUEST['start_date']) ? $_REQUEST['start_date'] : date("Y-m-01");
        $_REQUEST['end_date'] = $edate = isset($_REQUEST['end_date']) ? $_REQUEST['end_date'] : date("Y-m-d");

        $sql = "SELECT * FROM {$this->prefix}log WHERE (date >= '$sdate' AND date <= '$edate') AND type='B' ORDER BY date, id_log";
        $data = $this->m->sql_getall($sql);
        $this->sm->assign("log", $data);
    }
    function voucher() {
        $_REQUEST['start_date'] = $sdate = isset($_REQUEST['start_date']) ? $_REQUEST['start_date'] : date("Y-m-01");
        $_REQUEST['end_date'] = $edate = isset($_REQUEST['end_date']) ? $_REQUEST['end_date'] : date("Y-m-d");

        $sql = "SELECT * FROM {$this->prefix}log WHERE (date(date) >= '$sdate' AND date(date) <= '$edate') AND type='V' ORDER BY date, id_log";
        $data = $this->m->sql_getall($sql);
        $this->sm->assign("log", $data);
    }
}
?>