<?php
class reservation extends common {
    function __construct() {
        $this->checklogin();
        $this->table_prefix();
        parent:: __construct();
    }
    function insert() {
        $_SESSION['msg'] = "This option not used any more.";
        $this->redirect("index.php?module=reservation&func=listing");
    }
    function update() {
        $_SESSION['msg'] = "This option not used any more.";
        $this->redirect("index.php?module=reservation&func=listing");
    }
    function edit() {
        $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : "0";
        $sql = "SELECT id_taxmaster AS id, tax_per AS name FROM taxmaster";
        $tax = $this->m->getall($this->m->query($sql), 2, "name", "id");
        $this->sm->assign("tax", $tax);
        $sql = "SELECT id_roomtype AS id, name FROM roomtype ORDER BY name";
        $rt = $this->m->getall($this->m->query($sql), 2, "name", "id");
        $this->sm->assign("rt", $rt);
        $sql = "SELECT id_corporate AS id, name FROM corporate ORDER BY name";
        $rt = $this->m->getall($this->m->query($sql), 2, "name", "id");
        $this->sm->assign("cor", $rt);
        $sql = $this->create_select("reservation", "id_reservation='{$id}'");
        $data = $this->m->fetch_assoc($sql);
        $this->sm->assign("data", $data);
    }
    function editinfo() {
        $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : "0";
        $sql = $this->create_select("reservation", "id_reservation='{$id}'");
        $data = $this->m->fetch_assoc($sql);
        $this->sm->assign("data", $data);
    }
    function listing() {
        $limit = $wcond = " ";
        if (@$_REQUEST['start_date'] && @$_REQUEST['end_date']) {
            $wcond .= " AND date BETWEEN '{$_REQUEST['start_date']}' AND '{$_REQUEST['end_date']}' ";
        } else {
            $limit = " LIMIT 20 ";
        }
        $sql = "SELECT * FROM reservation WHERE cancel_by=0 $wcond ORDER BY date DESC, no $limit";
        $data = $this->m->getall($this->m->query($sql));
        $this->sm->assign("rooms", $data);
    }
    function cancellist() {
        $sql = "SELECT r.*, u.name AS uname FROM reservation r, user u
            WHERE r.cancel_by=u.id_user AND r.cancel_by ORDER BY cancel_date, cin, name";
        $data = $this->m->getall($this->m->query($sql));
        $this->sm->assign("rooms", $data);
    }
    function mrlist() {
        $limit = $wcond = " ";
        if (@$_REQUEST['start_date'] && @$_REQUEST['end_date']) {
            $wcond .= " AND m.date BETWEEN '{$_REQUEST['start_date']}' AND '{$_REQUEST['end_date']}' ";
        } else {
            $limit = " LIMIT 20 ";
        }
        $sql = "SELECT r.roomnumber, r.name, m.* FROM mr m, reservation r WHERE m.id_reservation=r.id_reservation AND m.mrtype!='B' $wcond
                UNION ALL
                SELECT r.roomnumber, r.name, m.* FROM mr m, banquet r WHERE m.id_reservation=r.id_banquet AND m.mrtype='B' $wcond
                ORDER BY date DESC $limit";
        $data = $this->m->getall($this->m->query($sql));
        $this->sm->assign("mr", $data);
    }
    function addmr() {
        $sql = "SELECT MAX(no*1) AS no FROM mr m";
        $data = $this->m->getall($this->m->query($sql));
        $data[0]['no']=($data[0]['no']*1)+1;
        $this->sm->assign("data", $data[0]);
    }
    function savemr() {
        $data = $_REQUEST['mr'];
        $data['id_user'] = $_SESSION['id_user'];
        $data['ip'] = $_SERVER['REMOTE_ADDR'];
        $this->m->query($this->create_insert("mr", $data));
        $_SESSION['msg'] = "MR Successfully Saved.";
        $this->redirect("index.php?module=reservation&func=listing");
    }
    function printmr() {
        $id = $_REQUEST['id'];
        $sql = "SELECT r.roomnumber, r.name, r.address, r.phone, r.email, m.*, u.name AS username FROM mr m LEFT JOIN user u ON m.id_user=u.id_user, reservation r 
            WHERE m.id_reservation=r.id_reservation AND m.id='$id' ORDER BY m.date DESC";
        $data = $this->m->getall($this->m->query($sql));
        $data[0]['w'] = $this->convert_number($data[0]['amount']);
        $this->sm->assign("data", $data[0]);
    }
    function addfood() {
        $sql = "SELECT id_taxmaster AS id, tax_per AS name FROM taxmaster";
        $tax = $this->m->getall($this->m->query($sql), 2, "name", "id");
        $this->sm->assign("tax", $tax);
    }
    function savefood() {
        $data = $_REQUEST['food'];
        $data['id_user'] = $_SESSION['id_user'];
        $data['ip'] = $_SERVER['REMOTE_ADDR'];
        $this->m->query($this->create_insert("food", $data));
        $_SESSION['msg'] = "Food Bill Successfully Saved.";
        $this->redirect("index.php?module=reservation&func=listing");
    }
    function foodlist() {
        $sql = "SELECT r.roomnumber, r.name, m.* FROM food m, reservation r 
                WHERE m.id_reservation=r.id_reservation ORDER BY m.date DESC";
        $data = $this->m->getall($this->m->query($sql));
        $this->sm->assign("food", $data);
    }
    function addother() {
        $sql = "SELECT id_taxmaster AS id, tax_per AS name FROM taxmaster";
        $tax = $this->m->getall($this->m->query($sql), 2, "name", "id");
        $this->sm->assign("tax", $tax);
    }
    function saveother() {
        $data = $_REQUEST['other'];
        $data['id_user'] = $_SESSION['id_user'];
        $data['ip'] = $_SERVER['REMOTE_ADDR'];
        $this->m->query($this->create_insert("other", $data));
        $_SESSION['msg'] = "Other Bill Successfully Saved.";
        $this->redirect("index.php?module=reservation&func=listing");
    }
    function otherlist() {
        $sql = "SELECT r.roomnumber, r.name, m.* FROM other m, reservation r WHERE m.id_reservation=r.id_reservation ORDER BY m.date DESC";
        $data = $this->m->getall($this->m->query($sql));
        $this->sm->assign("other", $data);
    }
    function bdashboard() {
        $date = $_REQUEST['date'] = (isset($_REQUEST['date'])) ? $_REQUEST['date'] : date('Y-m-d');
    }
    function getbooking() {
        ob_clean();
        $month = $_REQUEST['month']+1;
        $year = $_REQUEST['year'];
        if ($month>12) {
            $year = $year+1;
            $month = $month-12;
        }
        $sdate = "$year-$month-01";
        $month = $month+2;
        if ($month>12) {
            $year = $year+1;
            $month = $month-12;
        }
        $edate = date("Y-m-t", strtotime("$year-$month-01"));
        $sql = "SELECT date, group_concat(roomnumber) AS roomnumber FROM reservation WHERE (date BETWEEN '$sdate' AND '$edate') AND !cancel_by GROUP BY date";
        $data1 = $this->m->getall($this->m->query($sql));
        $data = array();
        foreach($data1 as $k => $v) {
            $dt = date("j-n", strtotime($v['date']));
            $rooms = ",".$v['roomnumber'].",";
            if (strpos($rooms, ",1,") !== false) {
                $data["$dt-1"] = '1';
            }
            if (strpos($rooms, ",2,") !== false) {
                $data["$dt-2"] = '1';
            }
        }
        echo json_encode($data);
        exit;
    }
    function showguest() {
        ob_clean();
        $room = ",".$_REQUEST['room'].",";
        $date = $_REQUEST['date'] ? $_REQUEST['date'] : date("Y-m-d");
        $sql = "SELECT no, date, roomnumber, person, daysstay, name, mobile, address, discount, gstamt, total FROM reservation 
                WHERE date='$date' AND concat(',',roomnumber,',') LIKE '%$room%' AND !cancel_by AND depature_date IS NULL";
        $data = $this->m->fetch_assoc($sql);
        echo json_encode($data);
        exit;
    }
    function getguestdetails() {
        $mobile = isset($_REQUEST['mobile']) ? trim($_REQUEST['mobile']) : "";
        $sql = "SELECT * FROM reservation WHERE mobile='$mobile'";
        $data = $this->m->fetch_assoc($sql);
        ob_clean();
        echo json_encode($data);
        exit;
    }
    function dashboard() {
        if (isset($_REQUEST['date'])) {
            $date = $_REQUEST['date'];
        } else {
            $date = $_REQUEST['date'] = date('Y-m-d');
        }
        $sql = "SELECT * FROM rooms ORDER BY name";
        $rooms = $this->m->getall($this->m->query($sql));
        $this->sm->assign("rooms", $rooms);

        $sql = "SELECT group_concat(roomnumber) AS roomnumber FROM reservation 
                WHERE date='{$date}' AND (time='' OR time IS NULL) AND !cancel_by";
        $data = $this->m->fetch_assoc($sql);
        $data = $this->m->fetch_assoc($sql);
        $data['roomnumber'] = str_replace(".", ",", $data['roomnumber']);
        $data['roomnumber'] = str_replace(";", ",", $data['roomnumber']);
        $data['roomnumber'] = str_replace(":", ",", $data['roomnumber']);
        $rroom =  explode(',', $data['roomnumber']);
        $this->sm->assign("reserve", array_flip($rroom));

        $sql = "SELECT group_concat(roomnumber) AS roomnumber FROM reservation 
                WHERE (('{$date}' BETWEEN date AND depature_date) OR (date <= '{$date}' AND depature_date IS NULL)) AND !cancel_by";
        $data = $this->m->fetch_assoc($sql);
        $data['roomnumber'] = str_replace(".", ",", $data['roomnumber']);
        $data['roomnumber'] = str_replace(";", ",", $data['roomnumber']);
        $data['roomnumber'] = str_replace(":", ",", $data['roomnumber']);
        $aroom =  explode(',', $data['roomnumber']);
        $this->sm->assign("data", array_flip($aroom));
    }
    function changeroom() {
        $id = $_REQUEST['id'];
        $sql = "SELECT * FROM rooms ORDER BY name";
        $rooms = $this->m->getall($this->m->query($sql));
        $this->sm->assign("rooms", $rooms);
        $sql = "SELECT * FROM reservation WHERE id_reservation='{$id}'";
        $data = $this->m->fetch_assoc($sql);
        $this->sm->assign("guest", $data);
        $data['roomnumber'] = str_replace(".", ",", $data['roomnumber']);
        $data['roomnumber'] = str_replace(";", ",", $data['roomnumber']);
        $data['roomnumber'] = str_replace(":", ",", $data['roomnumber']);
        $aroom =  explode(',', $data['roomnumber']);
        $this->sm->assign("roomnumber", $data['roomnumber'].",");
        $this->sm->assign("data", array_flip($aroom));
    }
    function checkno() {
        ob_clean();
        $no = isset($_REQUEST['no']) ? trim($_REQUEST['no']) : "";
        $type = isset($_REQUEST['type']) ? $_REQUEST['type'] : "reservation";
        $sql = "SELECT COUNT(*) AS cnt FROM {$this->prefix}{$type} WHERE no='$no'";
        $data = $this->m->fetch_assoc($sql);
        echo ($no=='' || $data['cnt']);
        exit;
    }
    function checkin() {
        $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : "0";
        $sql = "SELECT id_taxmaster AS id, tax_per AS name FROM taxmaster";
        $tax = $this->m->getall($this->m->query($sql), 2, "name", "id");
        $this->sm->assign("tax", $tax);
        $sql = "SELECT id_roomtype AS id, name FROM roomtype ORDER BY name";
        $rt = $this->m->getall($this->m->query($sql), 2, "name", "id");
        $this->sm->assign("rt", $rt);
        if ($id) {
            $sql = $this->create_select("reservation", "id_reservation='{$id}'");
            $data = $this->m->fetch_assoc($sql);
        } else {
            $sql = "SELECT max(no*1) AS no, max(grcno*1) AS grcno FROM reservation";
            $data = $this->m->fetch_assoc($sql);
            $data['no'] = $data['no'] + 1;
            $data['grcno'] = $data['grcno'] + 1;
        }
        $this->sm->assign("data", $data);
        if ($_SESSION['is_admin']!=1 && $id) {
            $this->sm->assign("page", "reservation/checkinsmall.tpl.html");
        }
    }
    function getroomprice() {
        $rooms = $_REQUEST['rooms'];
        $rooms = str_replace(".", ",", $rooms);
        $rooms = str_replace(";", ",", $rooms);
        $rooms = str_replace(":", ",", $rooms);
        $sql = "SELECT r.name, t.id_taxmaster, t.price, x.tax_per 
                FROM rooms r, roomtype t, taxmaster x
                WHERE r.status=0 AND r.id_roomtype=t.id_roomtype AND t.id_taxmaster=x.id_taxmaster AND r.name in ($rooms) ORDER BY r.id_rooms";
        $data = $this->m->getall($this->m->query($sql));
        ob_clean();
        echo json_encode($data);
        exit;
    }
    function checkinupdateinsert() {
        $data = $_REQUEST['t'];
        $room = $_REQUEST['room'];
        $data['id_create'] = $_SESSION['id_user'];
        $data['create_date'] = date("Y-m-d");
        $data['json'] = json_encode($room);
        if ($_FILES) {
            $tmpname = $_FILES['t']['tmp_name']['id_proof_upload'];
            $name = addslashes($_FILES['t']['name']['id_proof_upload']);
            $name = "uploads/".date("dmY_Hi")."_".str_replace(" ", "", $name);
            $this->pr($name);
            move_uploaded_file($tmpname, $name);
            $data['id_proof_upload'] = $name;
        }
        foreach ($room as $v) {
            $rid = $v['name'];
            //$sql = "UPDATE rooms SET status=3 WHERE name='$rid'";
            //$this->m->query($sql);
        }
        $sql = $this->create_insert("reservation", $data);
        $this->m->query($sql);
        $_SESSION['msg'] = "Guest Registration Added Successfully.";
        $this->redirect("index.php?module=reservation&func=listing");
    }
    function checkinupdate() {
        $data = $_REQUEST['t'];
        $data['id_modify'] = $_SESSION['id_user'];
        $data['modify_date'] = date("Y-m-d");
        $room = $_REQUEST['room'];
        $data['json'] = json_encode($room);
        
        $id = $_REQUEST['id'];
        $prev = $this->m->fetch_assoc( "SELECT * FROM reservation WHERE id_reservation='$id'" );
        $this->register_log($prev, $data, "B");
        
        $sql = $this->create_update("reservation", $data, "id_reservation='$id'");
        $this->m->query($sql);
        $_SESSION['msg'] = "Guest Registration Updated Successfully.";
        $this->redirect("index.php?module=reservation&func=listing");
    }
    function checkout() {
        $sql = "SELECT * FROM reservation WHERE cancel_by=0 AND depature_date IS NULL ORDER BY no DESC, name";
        $data = $this->m->getall($this->m->query($sql));
        $this->sm->assign("rooms", $data);
    }
    function checkoute() {
        $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : "0";
        $sql = "SELECT * FROM reservation WHERE cancel_by=0 AND depature_date IS NULL AND id_reservation='{$id}'";
        $data = $this->m->fetch_assoc($sql);
        $this->sm->assign("data", $data);
    }
    function savecheckout() {
        $data = $_REQUEST['t'];
        $id=$_REQUEST['id'];
        $sql = "SELECT roomnumber FROM reservation WHERE cancel_by=0 AND depature_date IS NULL AND id_reservation='{$id}'";
        $roomnumbers = $this->m->fetch_assoc($sql);
        $room = explode(',', $roomnumbers['roomnumber']);
        foreach ($room as $rname) {
            $sql = "UPDATE rooms SET status=1 WHERE name='$rname'";
            $this->m->query($sql);
        }
        $data['id_modify'] = $_SESSION['id_user'];
        $data['modify_date'] = date("Y-m-d");
        $sql = "SELECT max(billno) AS billno FROM reservation";
        $bill = $this->m->fetch_assoc($sql);
        $data['billno'] = $bill['billno'] + 1;

        $sql = $this->create_update("reservation", $data, "id_reservation='{$id}'");
        $this->m->query($sql);
        $_SESSION['msg'] = "Room Checkout Updated Successfully.";
        $this->redirect("index.php?module=reservation&func=checkout");
    }
    function cancelmr() {
        if (isset($_REQUEST['id'])) {
            if (!isset($_REQUEST['save'])) {
                return;
            } else {
                $id = $_REQUEST['id'];
                $data['cancel_reason'] = $_REQUEST['reason'];
                $data['cancel_by'] = $_SESSION['id_user'];
                $data['cancel_date'] = date("Y-m-d");
                $sql = $this->create_update("mr", $data, "id='$id'");
                $this->m->query($sql);
                $_SESSION['msg'] = "MR Cancellation Successfully.";
            }
        } else {
            $_SESSION['msg'] = "MR not found for Cancellation.";
        }
        $this->redirect("index.php?module=reservation&func=mrlist");
    }
    function printroom() {
        $id = $_REQUEST['id'];
        $noother = isset($_REQUEST['noother']) ?  $_REQUEST['noother'] : 0;
        if ($noother!=1) {
            $sql = "SELECT id_reservation, SUM(goodsvalue) AS ogoodsvalue, MAX(gstper) AS ogstpep, SUM(gstamount) AS ogstamount, SUM(amount) AS oamount
                    FROM other WHERE id_reservation='{$id}'";
            $data = $this->m->fetch_assoc($sql);
            $this->sm->assign("other", $data);
            $sql = "SELECT id_reservation, SUM(goodsvalue) AS fgoodsvalue, MAX(gstper) AS fgstpep, SUM(gstamount) AS fgstamount, SUM(amount) AS famount
                    FROM food WHERE id_reservation='{$id}'";
            $data = $this->m->fetch_assoc($sql);
            $this->sm->assign("food", $data);
        }
        $sql = "SELECT id_reservation, GROUP_CONCAT(no) AS nos, SUM(amount) AS total  FROM mr WHERE id_reservation='{$id}' AND cancel_date IS NULL ";
        $data = $this->m->fetch_assoc($sql);
        $this->sm->assign("mr", $data);

        $sql = "SELECT r.*, u.name AS username FROM reservation r LEFT JOIN user u ON r.id_create=u.id_user  WHERE r.id_reservation='{$id}'";
        $data = $this->m->fetch_assoc($sql);
        $json = json_decode($data['json']);
        $t = array();
        foreach ($json as $value) {
            if ($value->name==1 || $value->name==2) {
                $gst = 'ban';
            } else {
                $gst = intval($value->tax_per);
            }
            @$t[$gst]['rooms'] .= $value->name." ";
            @$t[$gst]['gst_per'] = $value->tax_per;
            $value->discount = $value->discount ? $value->discount : 0;
            @$t[$gst]['withtax'] += ($value->price - $value->discount) * @$data['daysstay'];
            $p = round((($value->price - $value->discount)*$data['daysstay']) * $value->tax_per / 100,2);
            @$t[$gst]['gstamt'] += $p;
            @$t[$gst]['total'] += $value->total;
        }
        $data['json'] = $t;
        $data['w'] = $this->convert_number($data['total']);
        $this->sm->assign("data", $data);
    }
    function savechangedroom() {
        $id = $_REQUEST['id'];
        $sql = "SELECT roomnumber FROM reservation WHERE cancel_by=0 AND depature_date IS NULL AND id_reservation='{$id}'";
        $roomnumbers = $this->m->fetch_assoc($sql);
        $room = explode(',', $roomnumbers['roomnumber']);
        foreach ($room as $rname) {
            $sql = "UPDATE rooms SET status=0 WHERE name='$rname'";
            $this->m->query($sql);
        }
        $data['roomnumber'] = trim($_REQUEST['newid'], ",");
        $data['id_modify'] = $_SESSION['id_user'];
        $data['modify_date'] = date("Y-m-d");
        $sql = $this->create_update("reservation", $data, "id_reservation='{$id}'");
        $this->m->query($sql);
        $_SESSION['msg'] = "Change Room Updated Successfully.";
        $this->redirect("index.php?module=reservation&func=listing");
    }
    function updatejson() {
        $sql = "SELECT * FROM reservation WHERE json='' OR json IS NULL ORDER BY id_reservation";
        $this->pr($sql);
        $reservation = $this->m->getall($this->m->query($sql));
        $this->pr($reservation);
        foreach ($reservation as $v) {
            $id = $v['id_reservation'];
            $days = $v['daysstay'] ? $v['daysstay'] : 1;
            $t[0]['name'] = $v['roomnumber'];
            $t[0]['tax_per'] = $t[0]['gst_per'] = $v['withtax'] ? 12.00 : 0;
            $t[0]['price'] = round($v['withtax']/$days,2);
            $t[0]['discount'] = 0;
            $t[0]['gstamt'] = $v['gstamt'];;
            $t[0]['total'] = $v['total'];
            $json = json_encode($t);
            $sql = "UPDATE reservation SET json='{$json}' WHERE id_reservation='{$id}'";
            $this->pr($sql);
            $this->m->query($sql);
        }
        exit;
    }
    function cancel() {
        if (isset($_REQUEST['id'])) {
            $id = $_REQUEST['id'];
            if (!isset($_REQUEST['save'])) {
                $sql = "SELECT r.*, SUM(m.amount) AS amount_paid FROM reservation r LEFT JOIN mr m
                        ON r.id_reservation=m.id_reservation
                         WHERE r.id_reservation='$id'";
                $data = $this->m->getall($this->m->query($sql));
                $this->sm->assign("rooms", $data);
                return;
            }
            $sql = "SELECT json, roomnumber FROM reservation WHERE cancel_by=0 AND depature_date IS NULL AND id_reservation='{$id}'";
            $roomnumbers = $this->m->fetch_assoc($sql);
            $room = explode(',', $roomnumbers['roomnumber']);
            $json = $roomnumbers['json'];
            foreach ($room as $rname) {
                $sql = "UPDATE rooms SET status=0 WHERE name='$rname'";
                $this->m->query($sql);
            }    
            $data['date'] = $_REQUEST['cancel_date'];
            $data['no'] = $this->getlastno($data['date'], $id);
            $data['completion'] = 1;
            $data['cancel_by'] = $_SESSION['id_user'];
            $data['cancel_date'] = $_REQUEST['cancel_date'];
            $data['cancel_reason'] = $_REQUEST['reason'];
            $refund_amount = $_REQUEST['refund_amount'];
            if ($refund_amount>0) {
                $gstper = 18;
                $data['total'] = $data['refund_amount'] = $refund_amount;
                $beforegst = round($refund_amount/(100+$gstper)*100,2);
                $data['gstamt'] = $data['total'] - $beforegst;
                $data['bookingjson'] = $json;
                $data['json'] = '[{"name":"1","tax_per":"'.$gstper.'","price":"'.$beforegst.'","discount":"0","gstamt":"'.$data['gstamt'].'","total":"'.$data['total'].'"}]';
                //[{"name":"1","tax_per":"18","price":"28898.31","discount":"0","gstamt":"5201.70","total":"34100.01"}]
            }
            $sql = $this->create_update("reservation", $data, "id_reservation='$id'");
            $this->m->query($sql);

            $prev = $this->m->fetch_assoc("SELECT * FROM reservation WHERE id_reservation='$id'");
            $this->register_log($prev, $data, "B");
            $_SESSION['msg'] = "Booking Cancellation Successfully.";
        } else {
            $_SESSION['msg'] = "Booking not found for Cancellation.";
        }
        $this->redirect("index.php?module=reservation&func=listing");
    }
    function completion() {
        $sql = "SHOW COLUMNS FROM reservation LIKE 'completion'";
        $uid = $this->m->num_rows( $this->m->query( $sql ) ) == 0 ? 0 : 1;
        if ( $uid != 1 ) {
            $sql = "ALTER TABLE reservation ADD `completion` TINYINT NULL DEFAULT '0';";
            $this->m->query($sql);
            $sql = "UPDATE reservation SET completion='1' WHERE date<'2023-04-01'";
            $this->m->query($sql);
        }
        $sql = "SELECT * FROM reservation WHERE completion=0 AND cancel_date IS NULL ORDER BY date, id_reservation";
        $data = $this->m->getall($this->m->query($sql));
        $this->sm->assign("noncomplete", $data);
    }    
    function completion_save() {
        $id = $_REQUEST['id'];
        $sql = "SELECT * FROM reservation WHERE id_reservation='$id' LIMIT 1";
        $data = $this->m->getall($this->m->query($sql));
        $date = $data[0]['date'];
        $lastno = $this->getlastno($date, $id);
        $sql = "UPDATE reservation SET no='$lastno', completion=1 WHERE id_reservation='$id'";
        $this->m->query($sql);
        $_SESSION['msg'] = "Bill No. $lastno updated for completed Booking.";
        $this->redirect("index.php?module=reservation&func=completion");
    }
    function getlastno() {
	$s = date("y", strtotime($_SESSION['sdate']));
	$e = date("y", strtotime($_SESSION['edate']));
	$se = "/$s-$e";
        $sql = "SELECT * FROM reservation WHERE no LIKE 'YG%' ORDER BY date DESC LIMIT 1";
        $data = $this->m->getall($this->m->query($sql));
        $lastno = @$data[0]['no'];
        if (!$lastno) {
            $lastno = "YG001/$se";
        } else {
            $lastno = str_replace("YG","", $lastno);
            $lastno = str_replace($se,"", $lastno);
            $lastno = $lastno*1 + 1;
            $lastno = "YG".sprintf('%03d', $lastno)."$se";
	}
        return $lastno;
    }
}
?>
