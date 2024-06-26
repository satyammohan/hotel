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

        $sql = "SELECT id_taxmaster AS id, tax_per AS name FROM taxmaster";
        $tax = $this->m->getall($this->m->query($sql), 2, "name", "id");
        $this->sm->assign("tax", $tax);

        $sql = "SELECT * FROM reservation WHERE (depature_date >= '$sdate' AND depature_date <= '$edate') ORDER BY depature_date";
        $data = $this->m->sql_getall($sql);
        $this->sm->assign("data", $data);
    }
    function room() {
        $_REQUEST['start_date'] = $sdate = isset($_REQUEST['start_date']) ? $_REQUEST['start_date'] : date("Y-m-01");
        $_REQUEST['end_date'] = $edate = isset($_REQUEST['end_date']) ? $_REQUEST['end_date'] : date("Y-m-d");
        $sql = "SELECT r.*, SUM(m.amount) AS recv, GROUP_CONCAT(m.no) AS mrs FROM reservation r 
                    LEFT JOIN mr m ON r.id_reservation=m.id_reservation AND m.cancel_date IS NULL
                WHERE (r.date >= '$sdate' AND r.date <= '$edate') AND (r.cancel_date IS NULL OR r.refund_amount!=0) GROUP BY r.id_reservation ORDER BY r.date";
        $data = $this->m->sql_getall($sql);
        $this->sm->assign("data", $data);
    }
    function collection() {
        $_REQUEST['start_date'] = $sdate = isset($_REQUEST['start_date']) ? $_REQUEST['start_date'] : date("Y-m-d");
        $_REQUEST['end_date'] = $edate = isset($_REQUEST['end_date']) ? $_REQUEST['end_date'] : date("Y-m-d");
        $sql = "SELECT r.roomnumber, r.name, r.mobile, m.* FROM mr m, reservation r
                WHERE m.id_reservation=r.id_reservation AND (m.date >= '$sdate' AND m.date <= '$edate') AND m.cancel_date IS NULL 
		ORDER BY m.date DESC, m.no DESC";
        $this->sm->assign("mr", $this->m->getall($this->m->query($sql)));

        $sql = "SELECT m.type, SUM(m.amount) AS amount FROM mr m, reservation r
                WHERE m.id_reservation=r.id_reservation AND (m.date >= '$sdate' AND m.date <= '$edate') AND m.cancel_date IS NULL GROUP BY 1 ORDER BY m.type DESC";
        $this->sm->assign("summary", $this->m->getall($this->m->query($sql)));
    }
    function user() {
        $_REQUEST['start_date'] = $sdate = isset($_REQUEST['start_date']) ? $_REQUEST['start_date'] : date("Y-m-01");
        $_REQUEST['end_date'] = $edate = isset($_REQUEST['end_date']) ? $_REQUEST['end_date'] : date("Y-m-d");
        $sql = "SELECT * FROM reservation WHERE (date >= '$sdate' AND date <= '$edate') ORDER BY date";
        $data = $this->m->sql_getall($sql);
        $this->sm->assign("data", $data);
    }
    function pay() {
        $_REQUEST['start_date'] = $sdate = isset($_REQUEST['start_date']) ? $_REQUEST['start_date'] : date("Y-m-01");
        $_REQUEST['end_date'] = $edate = isset($_REQUEST['end_date']) ? $_REQUEST['end_date'] : date("Y-m-d");
        $sql = "SELECT * FROM reservation WHERE (date >= '$sdate' AND date <= '$edate') ORDER BY date";
        $data = $this->m->sql_getall($sql);
        $this->sm->assign("data", $data);
    }
    function entry() {
        $_REQUEST['start_date'] = $sdate = isset($_REQUEST['start_date']) ? $_REQUEST['start_date'] : date("Y-m-01");
        $_REQUEST['end_date'] = $edate = isset($_REQUEST['end_date']) ? $_REQUEST['end_date'] : date("Y-m-d");
        $sql = "SELECT * FROM reservation WHERE (date(create_date) >= '$sdate' AND date(create_date) <= '$edate') ORDER BY create_date";
        $data = $this->m->sql_getall($sql);
        $this->sm->assign("data", $data);
    }
    function discount() {
        $_REQUEST['start_date'] = $sdate = isset($_REQUEST['start_date']) ? $_REQUEST['start_date'] : date("Y-m-01");
        $_REQUEST['end_date'] = $edate = isset($_REQUEST['end_date']) ? $_REQUEST['end_date'] : date("Y-m-d");
        $sql = "SELECT * FROM reservation WHERE (date(est_depature_date) >= '$sdate' AND date(est_depature_date) <= '$edate') AND discount>0 ORDER BY date";
        $data = $this->m->sql_getall($sql);
        $this->sm->assign("data", $data);
    }
    function roomdet() {
        $_REQUEST['start_date'] = $sdate = isset($_REQUEST['start_date']) ? $_REQUEST['start_date'] : date("Y-m-01");
        $_REQUEST['end_date'] = $edate = isset($_REQUEST['end_date']) ? $_REQUEST['end_date'] : date("Y-m-d");
        $sql = "SELECT * FROM reservation WHERE (date(create_date) >= '$sdate' AND date(create_date) <= '$edate') AND (cancel_date IS NULL OR refund_amount!=0) ORDER BY date";
        $data = $this->m->sql_getall($sql);
        $this->sm->assign("data", $data);
    }
    function due() {
        $_REQUEST['start_date'] = $sdate = isset($_REQUEST['start_date']) ? $_REQUEST['start_date'] : date("Y-m-d");
        $sql = "SELECT id_reservation, SUM(amount) AS total FROM food GROUP BY 1";
        $food = $this->m->sql_getall($sql, 2, "total", "id_reservation");
        $sql = "SELECT id_reservation, SUM(amount) AS total FROM other GROUP BY 1";
        $other = $this->m->sql_getall($sql, 2, "total", "id_reservation");
        $sql = "SELECT id_reservation, SUM(amount) AS total FROM mr WHERE cancel_date IS NULL GROUP BY 1";
        $mr = $this->m->sql_getall($sql, 2, "total", "id_reservation");
        $sql = "SELECT id_reservation, no, type, grcno, billno, date, name, roomnumber, daysstay, total, 0 AS foodtotal, 0 AS othertotal, 0 AS mrtotal
                FROM reservation WHERE date <= '$sdate' AND cancel_date IS NULL ORDER BY date";
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

        $sql = "SELECT id_taxmaster AS id, tax_per AS name FROM taxmaster";
        $tax = $this->m->getall($this->m->query($sql), 2, "name", "id");

        $sql = "SELECT id_reservation, id_taxmaster, SUM(goodsvalue) AS goodsvalue, SUM(gstamount) AS gstamount, SUM(amount) AS total FROM food GROUP BY 1,2";
        $food = $this->m->sql_getall($sql, 1, "", "id_reservation", "id_taxmaster");

        $sql = "SELECT id_reservation, id_taxmaster, SUM(goodsvalue) AS goodsvalue, SUM(gstamount) AS gstamount, SUM(amount) AS total FROM other GROUP BY 1,2";
        $other = $this->m->sql_getall($sql, 1, "", "id_reservation", "id_taxmaster");

        $sql = "SELECT *, 'Room' AS rtype FROM reservation WHERE (date >= '$sdate' AND date <= '$edate') 
                AND completion=1 ORDER BY date, no";
        $data = $this->m->sql_getall($sql);
        foreach ($data as $k => $v) {
            $stay = $v['daysstay'] ? $v['daysstay'] : 1;
            $data[$k]['discount'] = 0;
            if ($v['json']) {
                $json = json_decode($v['json']);
                foreach ($json as $value) {
                    $gst = intval($value->tax_per);
                    $discount = $value->discount ? $value->discount : 0;
		            $p = round((($value->price - $discount)*$stay) * $gst / 100,2);
                    @$data[$k]["goodsamount_".$gst] += (($value->price - $discount)*$stay) ;
                    @$data[$k]["sgst_".$gst] += ($p/2);
                    @$data[$k]["cgst_".$gst] += ($p/2);
                    $data[$k]['rent'] += $value->price*$stay;
                    $data[$k]['discount'] += $discount*$stay;
                }
            }
        }
        $sql = "SELECT * FROM banquet WHERE cancel_date IS NULL";
        $banquet = $this->m->sql_getall($sql);
        foreach ($banquet as $k => $v) {
            @$v['daysstay'] = 1;
            @$v['billno'] = $v['no'];
            @$v['depature_date'] = $v['date'];
            @$v['rtype'] = "Banquet";
            $gst = intval($v['tax_per']);
            @$v["goodsamount_".$gst] += $v['goodsvalue'];
            $v["cgst_".$gst] = $v["sgst_".$gst] = ($v['gstamount']/2);
            @$v['rent'] += $v['amount'];
            @$v['discount'] += $v['discamt'];
            $data[] = $v;
        }
        
        $this->sm->assign("data", $data);
    }
    function error() {
        $_REQUEST['start_date'] = $sdate = isset($_REQUEST['start_date']) ? $_REQUEST['start_date'] : date("Y-m-01");
        $_REQUEST['end_date'] = $edate = isset($_REQUEST['end_date']) ? $_REQUEST['end_date'] : date("Y-m-d");
        $sql = "SELECT * FROM reservation WHERE (depature_date >= '$sdate' AND depature_date <= '$edate') AND cancel_date IS NULL ORDER BY depature_date, billno";
        $data = $this->m->sql_getall($sql);
        foreach ($data as $k => $v) {
            $stay = $v['daysstay'] ? $v['daysstay'] : 1;
            $data[$k]['discount'] = 0;
            if ($v['json']) {
                $json = json_decode($v['json']) ;
                foreach ($json as $value) {
                    $gst = intval($value->gst_per);
                    $discount = $value->discount ? $value->discount : 0;
		            $p = round((($value->price - $discount)*$stay) * $gst / 100,2);
                    @$data[$k]["goodsamount_".$gst] += (($value->price - $discount)*$stay) ;
                    @$data[$k]["gst_".$gst] += $p;
                    $data[$k]['rent'] += $value->price*$stay;
                    $data[$k]['discount'] += $discount*$stay;
                }
            }
        }
        $this->sm->assign("data", $data);
    }
    

    function inout() {
        $_REQUEST['start_date'] = $sdate = isset($_REQUEST['start_date']) ? $_REQUEST['start_date'] : date("Y-m-01");
        $_REQUEST['end_date'] = $edate = isset($_REQUEST['end_date']) ? $_REQUEST['end_date'] : date("Y-m-d");
        $_REQUEST['in'] = $in = isset($_REQUEST['in']) ? $_REQUEST['in'] : "09:00";
        $_REQUEST['out'] = $out = isset($_REQUEST['out']) ? $_REQUEST['out'] : "11:00";

        $sql = "SELECT *, 'Room' AS rtype FROM reservation WHERE (depature_date >= '$sdate' AND depature_date <= '$edate') AND cancel_date IS NULL ORDER BY depature_date, billno";
        $data = $this->m->sql_getall($sql);
        foreach ($data as $k => $v) {
            $stay = $v['daysstay'] ? $v['daysstay'] : 1;

            $date1=date_create($v['date']);
            $date2=date_create($v['depature_date']);
            $days_diff=date_diff($date2,$date1);
            $days = $days_diff->d;


            $intime = date_create($v['date']." ".$v['time']);
            $outtime = date_create($v['depature_date']." ".$v['depature_time']);
            $cintime = date_create($v['date']." ".$in);
            $couttime = date_create($v['depature_date']." ".$out);

            if ( $intime < $cintime) {
                $data[$k]['time'] = "<font class='bg-danger'>".$v['time']."</font>";
                // $this->pr($intime);
                // $this->pr($cintime);
                // echo "in time is less";
                ++$days;
            }
            if ( $outtime > $couttime) {
                $data[$k]['depature_time'] = "<font class='bg-danger'>".$v['depature_time']."</font>";
                // $this->pr($outtime);
                // $this->pr($couttime);
                // echo "out time is greater";
                ++$days;
            }
            $data[$k]['actual'] = $days;

            $data[$k]['discount'] = 0;
            if ($v['json']) {
                $json = json_decode($v['json']) ;
                foreach ($json as $value) {
                    $gst = intval($value->gst_per);
                    $discount = $value->discount ? $value->discount : 0;
		            $p = round((($value->price - $discount)*$stay) * $gst / 100,2);
                    @$data[$k]["goodsamount_".$gst] += (($value->price - $discount)*$stay) ;
                    @$data[$k]["sgst_".$gst] += ($p/2);
                    @$data[$k]["cgst_".$gst] += ($p/2);
                    $data[$k]['rent'] += $value->price*$stay;
                    $data[$k]['discount'] += $discount*$stay;
                }
            }
        }
        $this->sm->assign("data", $data);
    }
    function mgm_mrdetail() {
        $_REQUEST['start_date'] = $sdate = isset($_REQUEST['start_date']) ? $_REQUEST['start_date'] : date("Y-m-01");
        $_REQUEST['end_date'] = $edate = isset($_REQUEST['end_date']) ? $_REQUEST['end_date'] : date("Y-m-d");
        $sql = "SELECT r.roomnumber, r.name, r.mobile, r.cancel_date AS rcancel_date, m.* FROM mr m, reservation r 
                    WHERE m.id_reservation=r.id_reservation AND m.mrtype!='B' AND  (date(m.date) >= '$sdate' AND date(m.date) <= '$edate')
                UNION ALL
                SELECT r.roomnumber, r.name, '' AS mobile, r.cancel_date AS rcancel_date, m.* FROM mr m, banquet r 
                    WHERE m.id_reservation=r.id_banquet AND m.mrtype='B' AND  (date(m.date) >= '$sdate' AND date(m.date) <= '$edate')
                ORDER BY date ASC";
        $data = $this->m->getall($this->m->query($sql));
        $this->sm->assign("mr", $data);
    }
    function error_mr() {
        $_REQUEST['start_date'] = $sdate = $_SESSION['sdate'];
        $_REQUEST['end_date'] = $edate = $_SESSION['edate'];
        $sql = "SELECT r.roomnumber, r.name, r.mobile, m.* FROM mr m, reservation r 
                    WHERE m.id_reservation=r.id_reservation AND m.mrtype!='B' AND  (date(m.date) >= '$sdate' AND date(m.date) <= '$edate')
                UNION ALL
                SELECT r.roomnumber, r.name, '' AS mobile, m.* FROM mr m, banquet r 
                    WHERE m.id_reservation=r.id_banquet AND m.mrtype='B' AND  (date(m.date) >= '$sdate' AND date(m.date) <= '$edate')
                ORDER BY date ASC";
        $data = $this->m->getall($this->m->query($sql));

        $noorder = $sl = $missing = array();
        $start = 1;
        foreach ($data as $k => $v) {
            $sl[$v['no']] = $v['date'];
        }
        $pno = 2;
        foreach ($sl as $k => $v) {
            if ($k!=$pno+1) {
                $noorder[$k] = $v;
            }
            $pno = $k;
        }

        ksort($sl);
        for ($i=1; $i<=count($sl); $i++) {
            if (!isset($sl[$i])) {
                $missing[] = $i;
            }
        }
        $this->sm->assign("missing", $missing);
        $this->sm->assign("noorder", $noorder);
    }
    function mgm_roomdetail() {
        $_REQUEST['start_date'] = $sdate = isset($_REQUEST['start_date']) ? $_REQUEST['start_date'] : date("Y-m-01");
        $_REQUEST['end_date'] = $edate = isset($_REQUEST['end_date']) ? $_REQUEST['end_date'] : date("Y-m-d");
        $sql = "SELECT * FROM reservation 
                WHERE (date(date) >= '$sdate' AND date(date) <= '$edate') AND cancel_date IS NULL ORDER BY date";
        $data = $this->m->sql_getall($sql);
        $this->sm->assign("data", $data);
      
    }
    function error_bill() {
        $_REQUEST['start_date'] = $sdate = $_SESSION['sdate'];
        $_REQUEST['end_date'] = $edate = $_SESSION['edate'];
        $sql = "SELECT * FROM reservation
                    WHERE (date(date) >= '$sdate' AND date(date) <= '$edate')
                ORDER BY date ASC";
        $data = $this->m->getall($this->m->query($sql));

        $noorder = $sl = $missing = array();
        $start = 1;
        foreach ($data as $k => $v) {
            $sl[$v['no']] = $v['date'];
        }
        $pno = 2;
        foreach ($sl as $k => $v) {
            if ($k!=$pno+1) {
                $noorder[$k] = $v;
            }
            $pno = $k;
        }

        ksort($sl);
        for ($i=1; $i<=count($sl); $i++) {
            if (!isset($sl[$i])) {
                $missing[] = $i;
            }
        }
        $this->sm->assign("missing", $missing);
        $this->sm->assign("noorder", $noorder);
    }
    function advcustomer() {
        $_REQUEST['start_date'] = $sdate = isset($_REQUEST['start_date']) ? $_REQUEST['start_date'] : date("Y-m-01");
        $sql = "SELECT r.roomnumber, r.name, r.mobile, r.date AS rdate, r.total, m.* FROM mr m, reservation r 
                    WHERE m.id_reservation=r.id_reservation AND m.mrtype!='B' AND date(m.date) <= '$sdate' AND date(r.date) > '$sdate' AND r.cancel_date IS NULL AND m.cancel_date IS NULL
                ORDER BY m.date ASC";
        $data = $this->m->getall($this->m->query($sql));
        $this->sm->assign("mr", $data);
    }
}
?>
