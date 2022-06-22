<?php
class report extends common {
    function __construct() {
        $this->checklogin();
        $this->table_prefix();
        parent:: __construct();
    }
    function gst() {
        $_REQUEST['start_date'] = $sdate = isset($_REQUEST['start_date']) ? $_REQUEST['start_date'] : date("Y-m-01");
        $_REQUEST['end_date'] = $edate = isset($_REQUEST['end_date']) ? $_REQUEST['end_date'] : date("Y-m-d");

        $sql = "SELECT id_taxmaster AS id, tax_per AS name FROM {$this->prefix}taxmaster";
        $tax = $this->m->getall($this->m->query($sql), 2, "name", "id");
        $this->sm->assign("tax", $tax);

        $sql = "SELECT * FROM {$this->prefix}reservation WHERE (date >= '$sdate' AND date <= '$edate') ORDER BY date";
        $data = $this->m->sql_getall($sql);
        $this->sm->assign("data", $data);
    }
    function room() {
        $_REQUEST['start_date'] = $sdate = isset($_REQUEST['start_date']) ? $_REQUEST['start_date'] : date("Y-m-01");
        $_REQUEST['end_date'] = $edate = isset($_REQUEST['end_date']) ? $_REQUEST['end_date'] : date("Y-m-d");
        $sql = "SELECT r.*, SUM(m.amount) AS recv, GROUP_CONCAT(m.no) AS mrs FROM {$this->prefix}reservation r 
                    LEFT JOIN {$this->prefix}mr m ON r.id_reservation=m.id_reservation AND m.cancel_date IS NULL
                WHERE (r.date >= '$sdate' AND r.date <= '$edate') GROUP BY r.id_reservation ORDER BY r.date";
        $data = $this->m->sql_getall($sql);
        $this->sm->assign("data", $data);
    }
    function collection() {
        $_REQUEST['start_date'] = $sdate = isset($_REQUEST['start_date']) ? $_REQUEST['start_date'] : date("Y-m-01");
        $_REQUEST['end_date'] = $edate = isset($_REQUEST['end_date']) ? $_REQUEST['end_date'] : date("Y-m-d");
        $sql = "SELECT r.roomnumber, r.name, m.* FROM {$this->prefix}mr m, {$this->prefix}reservation r
                WHERE m.id_reservation=r.id_reservation AND (m.date >= '$sdate' AND m.date <= '$edate') AND m.cancel_date IS NULL ORDER BY m.date DESC";
        $this->sm->assign("mr", $this->m->getall($this->m->query($sql)));

        $sql = "SELECT m.type, SUM(m.amount) AS amount FROM {$this->prefix}mr m, {$this->prefix}reservation r
                WHERE m.id_reservation=r.id_reservation AND (m.date >= '$sdate' AND m.date <= '$edate') AND m.cancel_date IS NULL GROUP BY 1 ORDER BY m.type DESC";
        $this->sm->assign("summary", $this->m->getall($this->m->query($sql)));
    }
    function user() {
        $_REQUEST['start_date'] = $sdate = isset($_REQUEST['start_date']) ? $_REQUEST['start_date'] : date("Y-m-01");
        $_REQUEST['end_date'] = $edate = isset($_REQUEST['end_date']) ? $_REQUEST['end_date'] : date("Y-m-d");
        $sql = "SELECT * FROM {$this->prefix}reservation WHERE (date >= '$sdate' AND date <= '$edate') ORDER BY date";
        $data = $this->m->sql_getall($sql);
        $this->sm->assign("data", $data);
    }
    function pay() {
        $_REQUEST['start_date'] = $sdate = isset($_REQUEST['start_date']) ? $_REQUEST['start_date'] : date("Y-m-01");
        $_REQUEST['end_date'] = $edate = isset($_REQUEST['end_date']) ? $_REQUEST['end_date'] : date("Y-m-d");
        $sql = "SELECT * FROM {$this->prefix}reservation WHERE (date >= '$sdate' AND date <= '$edate') ORDER BY date";
        $data = $this->m->sql_getall($sql);
        $this->sm->assign("data", $data);
    }
    function entry() {
        $_REQUEST['start_date'] = $sdate = isset($_REQUEST['start_date']) ? $_REQUEST['start_date'] : date("Y-m-01");
        $_REQUEST['end_date'] = $edate = isset($_REQUEST['end_date']) ? $_REQUEST['end_date'] : date("Y-m-d");
        $sql = "SELECT * FROM {$this->prefix}reservation WHERE (date(create_date) >= '$sdate' AND date(create_date) <= '$edate') ORDER BY create_date";
        $data = $this->m->sql_getall($sql);
        $this->sm->assign("data", $data);
    }
    function discount() {
        $_REQUEST['start_date'] = $sdate = isset($_REQUEST['start_date']) ? $_REQUEST['start_date'] : date("Y-m-01");
        $_REQUEST['end_date'] = $edate = isset($_REQUEST['end_date']) ? $_REQUEST['end_date'] : date("Y-m-d");
        $sql = "SELECT * FROM {$this->prefix}reservation WHERE (date(create_date) >= '$sdate' AND date(create_date) <= '$edate') AND discount>0 ORDER BY date";
        $data = $this->m->sql_getall($sql);
        $this->sm->assign("data", $data);
    }
    function roomdet() {
        $_REQUEST['start_date'] = $sdate = isset($_REQUEST['start_date']) ? $_REQUEST['start_date'] : date("Y-m-01");
        $_REQUEST['end_date'] = $edate = isset($_REQUEST['end_date']) ? $_REQUEST['end_date'] : date("Y-m-d");
        $sql = "SELECT * FROM {$this->prefix}reservation WHERE (date(create_date) >= '$sdate' AND date(create_date) <= '$edate') ORDER BY date";
        $data = $this->m->sql_getall($sql);
        $this->sm->assign("data", $data);
    }
    function due() {
        $_REQUEST['start_date'] = $sdate = isset($_REQUEST['start_date']) ? $_REQUEST['start_date'] : date("Y-m-d");
        $sql = "SELECT id_reservation, SUM(amount) AS total FROM {$this->prefix}food GROUP BY 1";
        $food = $this->m->sql_getall($sql, 2, "total", "id_reservation");
        $sql = "SELECT id_reservation, SUM(amount) AS total FROM {$this->prefix}other GROUP BY 1";
        $other = $this->m->sql_getall($sql, 2, "total", "id_reservation");
        $sql = "SELECT id_reservation, SUM(amount) AS total FROM {$this->prefix}mr WHERE cancel_date IS NULL GROUP BY 1";
        $mr = $this->m->sql_getall($sql, 2, "total", "id_reservation");
        $start = "2021-09-01";
        $sql = "SELECT id_reservation, no, grcno, billno, date, name, roomnumber, daysstay, total, 0 AS foodtotal, 0 AS othertotal, 0 AS mrtotal
                FROM {$this->prefix}reservation WHERE (date>='$start' AND date<='$sdate') AND billno IS NOT NULL ORDER BY date";
        $data = $this->m->sql_getall($sql);
        foreach ($data as $k => $v) {
            $id = $v['id_reservation'];
            $data[$k]['foodtotal'] = isset($food[$id]) ? $food[$id] : 0;
            $data[$k]['othertotal'] = isset($other[$id]) ? $other[$id] : 0;
            $data[$k]['mrtotal'] = isset($mr[$id]) ? $mr[$id] : 0;
            $data[$k]['due'] = $data[$k]['total'] + $data[$k]['othertotal'] + $data[$k]['foodtotal'] - $data[$k]['mrtotal'];
        }
        $this->sm->assign("data", $data);
    }

    function gstnew() {
        $_REQUEST['start_date'] = $sdate = isset($_REQUEST['start_date']) ? $_REQUEST['start_date'] : date("Y-m-01");
        $_REQUEST['end_date'] = $edate = isset($_REQUEST['end_date']) ? $_REQUEST['end_date'] : date("Y-m-d");

        $sql = "SELECT id_taxmaster AS id, tax_per AS name FROM {$this->prefix}taxmaster";
        $tax = $this->m->getall($this->m->query($sql), 2, "name", "id");

        $sql = "SELECT id_reservation, id_taxmaster, SUM(goodsvalue) AS goodsvalue, SUM(gstamount) AS gstamount, SUM(amount) AS total FROM {$this->prefix}food GROUP BY 1,2";
        $food = $this->m->sql_getall($sql, 1, "", "id_reservation", "id_taxmaster");

        $sql = "SELECT id_reservation, id_taxmaster, SUM(goodsvalue) AS goodsvalue, SUM(gstamount) AS gstamount, SUM(amount) AS total FROM {$this->prefix}other GROUP BY 1,2";
        $other = $this->m->sql_getall($sql, 1, "", "id_reservation", "id_taxmaster");

        $sql = "SELECT * FROM {$this->prefix}reservation WHERE (date >= '$sdate' AND date <= '$edate') ORDER BY date";
        $data = $this->m->sql_getall($sql);
        foreach ($data as $k => $v) {
            $stay = $v['daysstay'] ? $v['daysstay'] : 1;
            $data[$k]['discount'] = 0;
            if ($v['json']) {
                $json = json_decode($v['json']) ;
                foreach ($json as $value) {
                    $gst = intval($value->gst_per);
                    @$data[$k]["goodsamount_".$gst] += (($value->price - $value->discount)*$stay) ;
                    @$data[$k]["sgst_".$gst] += ($value->gstamt*$stay/2);
                    @$data[$k]["cgst_".$gst] += ($value->gstamt*$stay/2);
                    $data[$k]['rent'] += $value->price*$stay;
                    $data[$k]['discount'] += $value->discount*$stay;
                }
            }
        }
        $this->sm->assign("data", $data);
    }
}
