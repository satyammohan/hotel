<?php
class banquet extends common {
    function __construct() {
        $this->checklogin();
        $this->table_prefix();
        parent:: __construct();
    }
    function insert() {
        $data = $_REQUEST['t'];
        $sql = $this->create_insert("{$this->prefix}banquet", $data);
        $this->m->query($sql);
        $_SESSION['msg'] = "Record Successfully Inserted";
        $this->redirect("index.php?module=banquet&func=listing");
    }
    function update() {
        $data = $_REQUEST['t'];
        $sql = $this->create_update("{$this->prefix}banquet", $data, "id_banquet='{$_REQUEST['id']}'");
        $this->m->query($sql);
        $_SESSION['msg'] = "Record Successfully Updated";
        $this->redirect("index.php?module=banquet&func=listing");
    }
    function edit() {
        $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : "0";
        $sql = $this->create_select("{$this->prefix}banquet", "id_banquet='{$id}'");
        $data = $this->m->fetch_assoc($sql);
        $this->sm->assign("data", $data);
    }
    function listing() {
        $sql = "SELECT * FROM {$this->prefix}banquet ORDER BY date";
        $data = $this->m->getall($this->m->query($sql));
        $this->sm->assign("rooms", $data);
    }
}
?>