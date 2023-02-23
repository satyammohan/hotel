<?php
class log extends common {
    function __construct() {
        $this->checklogin();
        $this->table_prefix();
        parent:: __construct();
    }
    function create_log() {
        $sql = "SET sql_notes = 0;";
        $this->m->query($sql);
        //$sql = "DROP TABLE {$this->prefix}log;";
        //$this->m->query($sql);
        $sql = "CREATE TABLE IF NOT EXISTS {$this->prefix}log (id_log INT NOT NULL AUTO_INCREMENT, type VARCHAR(1), date DATETIME DEFAULT NULL, 
                `previous` text DEFAULT NULL, `current` text DEFAULT NULL, `change` text DEFAULT NULL, PRIMARY KEY (id_log));";
        $this->m->query($sql);
        $sql = "ALTER TABLE `user` ADD `is_approve` TINYINT(1) NULL DEFAULT '0' AFTER `email`";
        $this->m->query($sql);
        $sql = "ALTER TABLE {$this->prefix}head ADD `approve` TINYINT(1) NULL DEFAULT '0'";
        $this->m->query($sql);
        $sql = "ALTER TABLE {$this->prefix}voucher ADD `approve` TINYINT(1) NULL DEFAULT '0'";
        $this->m->query($sql);
        $sql = "ALTER TABLE {$this->prefix}reservation ADD `approve` TINYINT(1) NULL DEFAULT '0'";
        $this->m->query($sql);
        $sql = "ALTER TABLE {$this->prefix}mr ADD `approve` TINYINT(1) NULL DEFAULT '0'";
        $this->m->query($sql);        

        $sql = "SET sql_notes = 1;";
        $this->m->query($sql);
        $_SESSION['msg'] = "Logs Created.";
        $this->redirect("index.php");
    }
    function booking() {
        $_REQUEST['start_date'] = $sdate = isset($_REQUEST['start_date']) ? $_REQUEST['start_date'] : date("Y-m-01");
        $_REQUEST['end_date'] = $edate = isset($_REQUEST['end_date']) ? $_REQUEST['end_date'] : date("Y-m-d");

        $sql = "SELECT * FROM {$this->prefix}log WHERE (date(date) >= '$sdate' AND date(date) <= '$edate') AND type='B' ORDER BY date, id_log";
        $data = $this->m->sql_getall($sql);
        $this->sm->assign("log", $data);
    }
    function voucher() {
        $_REQUEST['start_date'] = $sdate = isset($_REQUEST['start_date']) ? $_REQUEST['start_date'] : date("Y-m-01");
        $_REQUEST['end_date'] = $edate = isset($_REQUEST['end_date']) ? $_REQUEST['end_date'] : date("Y-m-d");

        $sql = "SELECT CONCAT(name, ' ', address1, ' ',address2) AS name, id_head AS id FROM {$this->prefix}head ";
        $head = $this->m->sql_getall( $sql, 2, 'name', 'id' );
        $this->sm->assign( 'head', $head );

        $sql = "SELECT * FROM {$this->prefix}log WHERE (date(date) >= '$sdate' AND date(date) <= '$edate') AND type='V' ORDER BY date, id_log";
        $data = $this->m->sql_getall($sql);
        $this->sm->assign("log", $data);
    }
    function mr() {
        $_REQUEST['start_date'] = $sdate = isset($_REQUEST['start_date']) ? $_REQUEST['start_date'] : date("Y-m-01");
        $_REQUEST['end_date'] = $edate = isset($_REQUEST['end_date']) ? $_REQUEST['end_date'] : date("Y-m-d");
        $wcond = " AND m.cancel_date BETWEEN '$sdate' AND '$edate' ";
        $sql = "SELECT r.roomnumber, r.name, m.* FROM {$this->prefix}mr m, {$this->prefix}reservation r WHERE m.id_reservation=r.id_reservation AND m.mrtype!='B' $wcond
            UNION ALL
            SELECT r.roomnumber, r.name, m.* FROM {$this->prefix}mr m, {$this->prefix}banquet r WHERE m.id_reservation=r.id_banquet AND m.mrtype='B' $wcond
            ORDER BY date DESC";
        $data = $this->m->getall($this->m->query($sql));
        $this->sm->assign("mr", $data);
    }
}
?>