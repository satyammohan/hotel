<?php

class accounts extends common {

    function __construct() {
        $this->checklogin();
        $this->table_prefix();
        parent:: __construct();
    }

    function _default() {
        $this->sm->assign( 'page', 'common/comming.tpl.html' );
    }
    function balance() {
        $startdate = $_SESSION[ 'start_date' ];
        $sdate = $_REQUEST[ 'start_date' ] = isset( $_REQUEST[ 'start_date' ] ) ? $_REQUEST[ 'start_date' ] : date( 'Y-m-d' );
        $edate = $_REQUEST[ 'end_date' ] = isset( $_REQUEST[ 'end_date' ] ) ? $_REQUEST[ 'end_date' ] : date( 'Y-m-d' );
        $sql = "SELECT g.name AS gname,h.id_head, h.name, h.address1, SUM(l.opening) AS opening, SUM(l.debit) AS debit, SUM(l.credit) AS credit, SUM(l.cbal) AS closing
          FROM `{$this->prefix}group` g, `{$this->prefix}head` h, (
          SELECT dhead AS id_head, SUM(IF(date<'$sdate', -1, 0)*total) AS opening, SUM(IF(date>='$sdate' AND date<='$edate', 1, 0)*total) AS debit, 
            0.00 AS credit, SUM(IF(date<='$edate', -1, 0)*total) AS cbal FROM `{$this->prefix}ledger` WHERE date<='$edate' GROUP BY 1
          UNION ALL 
          SELECT chead AS id_head, SUM(IF(date<'$sdate', 1, 0)*total) AS opening, 0.00 AS debit, SUM(IF(date>='$sdate' AND date<='$edate', 1, 0)*total) AS credit, 
            SUM(IF(date<='$edate', 1, 0)*total) AS cbal FROM `{$this->prefix}ledger` WHERE date<='$edate' GROUP BY 1) l
          WHERE l.id_head=h.id_head AND h.id_group=g.id_group GROUP BY h.id_head ORDER BY h.name";
        $res = $this->m->sql_getall( $sql );
        $this->sm->assign( 'data', $res );
    }
    function cashbook() {
        $_REQUEST[ 'option' ] = isset( $_REQUEST[ 'option' ] ) ? $_REQUEST[ 'option' ] : '1';
        $sdate = $_REQUEST[ 'start_date' ] = isset( $_REQUEST[ 'start_date' ] ) ? $_REQUEST[ 'start_date' ] : date( 'Y-m-d' );
        $edate = $_REQUEST[ 'end_date' ] = isset( $_REQUEST[ 'end_date' ] ) ? $_REQUEST[ 'end_date' ] : date( 'Y-m-d' );
        $_REQUEST[ 'id' ] = $cash = $_SESSION['config']['CASH'];
        $this->fetchdata( $cash, $sdate, $edate );
        $this->sm->assign( 'page', 'accounts/cashbook.tpl.html' );
    }
    function gethead() {
        $search = isset( $_REQUEST[ 'search' ] ) ? $_REQUEST[ 'search' ] : '';
        $sql = "SELECT id_head AS value, concat(name,' ',address1, ' ', IF(debtor, '(DB)', ''), ' ', IF(creditor, '(CR)', '')) AS text FROM {$this->prefix}head WHERE name LIKE '%{$search}%' ORDER BY name LIMIT 100";
        $data = $this->m->sql_getall( $sql );
        echo json_encode( $data );
        exit;
    }
    function ledger() {
        $_REQUEST[ 'option' ] = isset( $_REQUEST[ 'option' ] ) ? $_REQUEST[ 'option' ] : '1';
        $sdate = $_REQUEST[ 'start_date' ] = isset( $_REQUEST[ 'start_date' ] ) ? $_REQUEST[ 'start_date' ] : date( 'Y-m-d' );
        $edate = $_REQUEST[ 'end_date' ] = isset( $_REQUEST[ 'end_date' ] ) ? $_REQUEST[ 'end_date' ] : date( 'Y-m-d' );
        if (@$_REQUEST['id']) {
          $this->fetchdata( @$_REQUEST[ 'id' ], $sdate, $edate );
        }
        $this->sm->assign( 'page', 'accounts/ledger.tpl.html' );
    }
    function fetchdata( $id="", $sdate, $edate ) {
        $sql = "SELECT id_head AS id, concat(name,' ',address1) AS name FROM {$this->prefix}head ORDER BY name";
        $this->sm->assign( 'head', $this->m->sql_getall( $sql, 2, 'name', 'id' ) );
        $sql = "SELECT * FROM {$this->prefix}head WHERE id_head='$id'";
        $head = $this->m->sql_getall( $sql );
        $this->sm->assign( 'head1', $head );
        $res = "";
        if ( $id ) {
            $id = $_REQUEST[ 'id' ];
            switch ( $_REQUEST[ 'option' ] ) {
                case 1:
                $sql = "SELECT 'H' AS type, '' AS id, '' AS refno, '' AS date, '' AS chead, '$id' AS dhead, SUM(IF(dhead='$id', 1, -1)*total) AS total, '' AS memo 
                            FROM `{$this->prefix}ledger` WHERE (dhead='$id' or chead='$id') AND `date`<'$sdate' GROUP BY 1 UNION ALL
                            SELECT * FROM `{$this->prefix}ledger` WHERE (dhead='$id' or chead='$id') AND `date`>='$sdate' AND `date`<='$edate' ORDER BY date";
                break;
                case 2:
                $sql = "SELECT date, SUM(IF(dhead=$id,1,0)*total) AS debit, SUM(IF(dhead=$id,0,1)*total) AS credit, SUM(IF(dhead=$id,-1,1)*total) AS total FROM `{$this->prefix}ledger` WHERE dhead=$id or chead=$id GROUP BY 1 ORDER BY 1";
                break;
                case 3:
                $sql = "SELECT MONTHNAME(`date`) AS month, YEAR(`date`) AS year, SUM(IF(dhead=$id,1,0)*total) AS debit, SUM(IF(dhead=$id,0,1)*total) AS credit, SUM(IF(dhead=$id,-1,1)*total) AS total FROM `{$this->prefix}ledger` WHERE dhead=$id or chead=$id GROUP BY MONTH(`date`), YEAR(`date`) ORDER BY date";
                break;
            }
            $res = $this->m->sql_getall( $sql );
        }
        $this->sm->assign( 'data', $res );
        return $res;
    }
    function gledger() {
        $sdate = $_REQUEST[ 'start_date' ] = isset( $_REQUEST[ 'start_date' ] ) ? $_REQUEST[ 'start_date' ] : date( 'Y-m-d' );
        $edate = $_REQUEST[ 'end_date' ] = isset( $_REQUEST[ 'end_date' ] ) ? $_REQUEST[ 'end_date' ] : date( 'Y-m-d' );
        $option = isset( $_REQUEST[ 'option' ] ) ? $_REQUEST[ 'option' ] : '0';
        $id = isset( $_REQUEST[ 'id' ] ) ? $_REQUEST[ 'id' ] : '';
        if ( $id ) {
            $sql = "SELECT h.id_head, h.name, h.address1, SUM(l.opening) AS opening, SUM(l.debit) AS debit, SUM(l.credit) AS credit, SUM(l.cbal) AS closing
              FROM `{$this->prefix}head` h, (
              SELECT dhead AS id_head, SUM(IF(date<'$sdate', -1, 0)*total) AS opening, SUM(IF(date>='$sdate' AND date<='$edate', 1, 0)*total) AS debit, 
                0.00 AS credit, SUM(IF(date<='$edate', -1, 0)*total) AS cbal FROM `{$this->prefix}ledger` WHERE date<='$edate' GROUP BY 1
              UNION ALL 
              SELECT chead AS id_head, SUM(IF(date<'$sdate', 1, 0)*total) AS opening, 0.00 AS debit, SUM(IF(date>='$sdate' AND date<='$edate', 1, 0)*total) AS credit, 
                SUM(IF(date<='$edate', 1, 0)*total) AS cbal FROM `{$this->prefix}ledger` WHERE date<='$edate' GROUP BY 1) l
              WHERE l.id_head=h.id_head AND h.id_group = {$id}
              GROUP BY h.id_head ORDER BY h.name";
        } else {
            $sql = "SELECT g.id_group, g.name, '' AS address, SUM(t.opening) AS opening, SUM(t.debit) AS debit, SUM(t.credit) AS credit, SUM(t.closing) AS closing
              FROM `{$this->prefix}group` g,
                (SELECT h.id_head, id_group, SUM(l.opening) AS opening, SUM(l.debit) AS debit, SUM(l.credit) AS credit, SUM(l.cbal) AS closing
              FROM `{$this->prefix}head` h, (
              SELECT dhead AS id_head, SUM(IF(date<'$sdate', -1, 0)*total) AS opening, SUM(IF(date>='$sdate' AND date<='$edate', 1, 0)*total) AS debit, 
                0.00 AS credit, SUM(IF(date<='$edate', -1, 0)*total) AS cbal FROM `{$this->prefix}ledger` WHERE date<='$edate' GROUP BY 1
              UNION ALL 
              SELECT chead AS id_head, SUM(IF(date<'$sdate', 1, 0)*total) AS opening, 0.00 AS debit, SUM(IF(date>='$sdate' AND date<='$edate', 1, 0)*total) AS credit, 
                SUM(IF(date<='$edate', 1, 0)*total) AS cbal FROM `{$this->prefix}ledger` WHERE date<='$edate' GROUP BY 1) l
              WHERE l.id_head=h.id_head
              GROUP BY h.id_head) t WHERE g.id_group=t.id_group GROUP BY g.id_group ORDER BY g.name";
        }
        $res = $this->m->sql_getall( $sql );
        $this->sm->assign( 'group', $this->m->sql_getall( "SELECT id_group AS id, name FROM {$this->prefix}group ORDER BY name", 2, 'name', 'id' ) );
        $this->sm->assign( 'data', $res );
    }
    function trial() {
        $_REQUEST[ 'option' ] = isset( $_REQUEST[ 'option' ] ) ? $_REQUEST[ 'option' ] : '2';
        $startdate = $_SESSION[ 'start_date' ];
        $sdate = $_REQUEST[ 'start_date' ] = isset( $_REQUEST[ 'start_date' ] ) ? $_REQUEST[ 'start_date' ] : date( 'Y-m-d' );
        $wcond = " date<='$sdate' ";
        if ( isset( $_REQUEST[ 'opening' ] ) ) {
            $wcond .= " AND type = 'H' ";
        }
        $transact = isset( $_REQUEST[ 'transact' ] ) ? 1 : 0;
        $ocond = ( $_REQUEST[ 'option' ] == 1 ) ? ' h.name, h.address1 ' : ' g.name, h.name, h.address1 ';
        if ( $transact != 1 ) {
            $sql = "SELECT g.name AS gname, h.*, t.id_head, SUM(t.debit) AS debit, SUM(t.credit) AS credit 
           FROM (SELECT dhead AS id_head, ROUND(SUM(total),2) AS debit, 0 AS credit  FROM `{$this->prefix}ledger` WHERE $wcond GROUP BY 1
           UNION ALL 
           SELECT chead AS id_head, 0 AS debit, ROUND(SUM(total),2) AS credit FROM `{$this->prefix}ledger` WHERE $wcond GROUP BY 1
           ) t, `{$this->prefix}head` h, `{$this->prefix}group` g
            WHERE h.id_head=t.id_head AND h.id_group=g.id_group GROUP BY h.id_head ORDER BY $ocond";
        } else {
            $sql = "SELECT g.name AS gname,h.id_head, h.name, h.address1, SUM(l.opening) AS opening, SUM(l.debit) AS debit, SUM(l.credit) AS credit, SUM(l.cbal) AS closing
              FROM `{$this->prefix}group` g, `{$this->prefix}head` h, (
              SELECT dhead AS id_head, SUM(IF(date<'$startdate', -1, 0)*total) AS opening, SUM(IF(date>='$startdate' AND date<='$sdate', 1, 0)*total) AS debit, 
                0.00 AS credit, SUM(IF(date<='$sdate', -1, 0)*total) AS cbal FROM `{$this->prefix}ledger` WHERE date<='$sdate' GROUP BY 1
              UNION ALL 
              SELECT chead AS id_head, SUM(IF(date<'$startdate', 1, 0)*total) AS opening, 0.00 AS debit, SUM(IF(date>='$startdate' AND date<='$sdate', 1, 0)*total) AS credit, 
                SUM(IF(date<='$sdate', 1, 0)*total) AS cbal FROM `{$this->prefix}ledger` WHERE date<='$sdate' GROUP BY 1) l
              WHERE l.id_head=h.id_head AND h.id_group=g.id_group GROUP BY h.id_head ORDER BY $ocond";
        }
        $res = $this->m->sql_getall( $sql );
        $this->sm->assign( 'data', $res );
    }    
    function oneac( $ac, $sdate, $edate ) {
        $sql = "SELECT $ac AS id_head, h.name, concat(h.address2, ' ', IFNULL(address3, '')) as address, l.* FROM {$this->prefix}ledger l, {$this->prefix}head  h 
            WHERE `date`>='$sdate' AND `date`<='$edate' AND (dhead='$ac' OR chead='$ac') AND h.id_head=IF(dhead='$ac', chead, dhead) ORDER BY date";
        $data = $this->m->sql_getall( $sql );
        return $data;
    }
    function confirmation() {
        $sdate = $_REQUEST[ 'start_date' ] = isset( $_REQUEST[ 'start_date' ] ) ? $_REQUEST[ 'start_date' ] : date( 'Y-m-d' );
        $edate = $_REQUEST[ 'end_date' ] = isset( $_REQUEST[ 'end_date' ] ) ? $_REQUEST[ 'end_date' ] : date( 'Y-m-d' );
        $printdate = $_REQUEST[ 'printdate' ] = isset( $_REQUEST[ 'printdate' ] ) ? $_REQUEST[ 'printdate' ] : date( 'Y-m-d' );

        $id = isset( $_REQUEST[ 'id' ] ) ? $_REQUEST[ 'id' ] : '';
        if ( $id ) {
            $_REQUEST[ 'option' ] = 1;
            $result = $this->fetchdata( $id, $sdate, $edate );
            $sql = "SELECT id_head, concat(name,' ',address1) AS name FROM {$this->prefix}head ORDER BY name";
            $head = $this->m->sql_getall( $sql, 2, 'name', 'id_head' );
            $this->sm->assign( 'head', $head );
            $db = $cr = 0;
            foreach ( $result as $k => $v ) {
                $d = date_format( date_create( $v[ 'date' ] ), 'd-m-Y' );
                $r = $v[ 'refno' ].' '.$v[ 'memo' ];
                $t = abs( $v[ 'total' ] );
                if ( $v[ 'date' ] )
                $p = ( $v[ 'id' ] == $v[ 'dhead' ] ) ? $head[ $v[ 'chead' ] ] : $head[ $v[ 'dhead' ] ];
                else
                $p = 'Opening Balance';
                if ( $id != $v[ 'chead' ] AND $v[ 'total' ]>0 ) {
                    $all[ $db ][ 'dd' ] = $d;
                    $all[ $db ][ 'dr' ] = $r;
                    $all[ $db ][ 'dp' ] = $p;
                    $all[ $db++ ][ 'dt' ] = $t;
                } else {
                    $all[ $cr ][ 'cd' ] = $d;
                    $all[ $cr ][ 'cr' ] = $r;
                    $all[ $cr ][ 'cp' ] = $p;
                    $all[ $cr++ ][ 'ct' ] = $t;
                }
            }
            $this->sm->assign( 'data', $all );
        }
    }
    function profit() {
      $_REQUEST['end_date'] = isset($_REQUEST['end_date']) ? $_REQUEST['end_date'] : date("d/m/Y");
      $name = $this->prefix."CLOSING_STOCK";
      if (isset($_REQUEST['CLOSING_STOCK'])) {
          $value = $_REQUEST['CLOSING_STOCK'];
          $sql = "SELECT * FROM `configuration` WHERE name='$name'";
          $exists = $this->m->sql_getall($sql);
          if ($exists) {
              $sql = "UPDATE `configuration` SET `value`='$value'  WHERE name='$name'";
          } else {
              $sql = "INSERT INTO `configuration` (name, `value`) VALUES ('$name', '$value')";
          }
          $_SESSION['config'][$name] = $value;
          $this->m->query($sql);
      } else {
          $_REQUEST['CLOSING_STOCK'] = $_SESSION['config'][$name];
      }
      $edate = $this->format_date($_REQUEST['end_date']);
      $sql = "CREATE TEMPORARY TABLE temp_ledg SELECT id_head, SUM(total) AS cbal FROM 
              (SELECT dhead AS id_head, SUM(total) AS total FROM `{$this->prefix}ledger` WHERE date<='$edate' GROUP BY 1 UNION ALL
              SELECT chead AS id_head, SUM(-total) AS total FROM `{$this->prefix}ledger` WHERE date<='$edate' GROUP BY 1) l GROUP BY 1 HAVING cbal<>0 ";
      $this->m->query($sql);
      $sql = "SELECT g.id_group, g.name AS gname, h.id_head, h.name, h.address1, SUM(l.cbal) AS closing
        FROM `{$this->prefix}group` g, `{$this->prefix}head` h, temp_ledg l
        WHERE l.id_head=h.id_head AND h.id_group=g.id_group GROUP BY h.id_head ORDER BY g.id_group, h.name";
      $data = $this->m->sql_getall($sql, 1, "", "gname", "id_head");
      $id = $_SESSION['config']['SALE AC'];
      if (!$id) {
          echo ("Add in configuration 'SALE AC', 'PURCHASE AC', 'OPENING STOCK' (id from head)<br>");
          echo ("'INCOME GROUP', 'EXPENSES GROUP' give the group names comma separated from group.");
      }
      $saleac = $_SESSION['config']['SALE AC'];
      $data['sales'] = $data['REVENUE'][$saleac]['closing'];
      $data['purchase'] = $data['REVENUE'][$_SESSION['config']['PURCHASE AC']]['closing'];
      $data['opening_stock'] = $data['CURRENT ASSETS'][$_SESSION['config']['OPENING STOCK']]['closing'];
      $this->sm->assign("income", explode(",",$_SESSION['config']['INCOME GROUP']));
      $this->sm->assign("expense", explode(",",$_SESSION['config']['EXPENSES GROUP']));
      $this->sm->assign("data", $data);
  }
  function cashbalance() {
      $id = $_SESSION['config']['CASH'];
      $sql = "CREATE TEMPORARY TABLE temp_cashbook SELECT date, SUM(debit) AS debit, SUM(credit) AS credit FROM 
              (SELECT date, 0 AS debit, SUM(total) AS credit FROM `{$this->prefix}ledger` WHERE chead='$id' GROUP BY 1 UNION ALL
              SELECT date, SUM(total) AS debit, 0 AS credit FROM `{$this->prefix}ledger` WHERE dhead='$id' GROUP BY 1) l GROUP BY 1";
      $this->m->query($sql);
      $sql = "SELECT * FROM temp_cashbook ORDER BY date";
      $data = $this->m->sql_getall($sql);
      $this->sm->assign("data", $data);
  }
  function cashbalance_detail() {
      $id = $_SESSION['config']['CASH'];
      $date = $_REQUEST['date'];
      $sql = "SELECT id_head AS id, concat(name,' ',address1) AS name FROM {$this->prefix}head ORDER BY name";
      $this->sm->assign("head", $this->m->sql_getall($sql, 2, "name", "id"));

      $sql = "SELECT * FROM `{$this->prefix}ledger` WHERE (chead='$id' OR dhead='$id') AND date='$date'";
      $data = $this->m->sql_getall($sql);
      $this->sm->assign("data", $data);
  }
}
?>