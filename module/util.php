<?php

class util extends common {
    function __construct() {
        $this->checklogin();
        $this->table_prefix();
        parent:: __construct();
        //ini_set('display_errors', 'On');
    }
    function checkall() {
        ini_set('display_errors', 'On');
        $sdate = $_SESSION['start_date'];
        $edate = $_SESSION['end_date'];
        $this->m->query("DROP view IF EXISTS `{$this->prefix}ledger`");
        $this->m->query("DROP view IF EXISTS `{$this->prefix}tb`");
        $sql = "CREATE view `{$this->prefix}ledger` AS
                SELECT 'V' AS type, id_voucher AS id, no AS refno, date, id_head_credit AS chead, id_head_debit AS dhead, total, memo FROM `{$this->prefix}voucher` WHERE date BETWEEN '$sdate' AND '$edate'
                UNION ALL
                SELECT 'V' AS type, id, no AS refno, date, 7 AS chead, 3 AS dhead, amount AS total, 'Money Receipt' AS memo FROM mr WHERE type=1 AND cancel_date IS NULL AND (date BETWEEN '$sdate' AND '$edate')
                UNION ALL
                SELECT 'H' AS type, id_head AS id, '' AS refno, date('0000-00-00') AS date, IF(otype='D' OR otype='0', 0, id_head) AS chead, IF(otype='D' OR otype='0', id_head, 0) AS dhead, opening_balance AS total, '' AS memo FROM {$this->prefix}head";
        $this->m->query( $sql );
        $sql = "CREATE view `{$this->prefix}tb` AS 
                  SELECT dhead AS id_head, ROUND(SUM(total),2) AS debit, 0 AS credit  FROM `{$this->prefix}ledger` GROUP BY 1
                  UNION ALL 
                  SELECT chead AS id_head, 0 AS debit, ROUND(SUM(total),2) AS credit FROM `{$this->prefix}ledger` GROUP BY 1";
        $this->m->query( $sql );
        $msg = '<b>Check All</b><br><br>Ledger View re-created.<br>Trial Balance View re-created.<br><br>';
        $msg .= '<b>Autoincrement Checking</b><br><br>';
        $prefix = $this->prefix;
        $exclude = array( $prefix . 'ledger', $prefix . 'product_ledger', $prefix . 'product_ledger_summary', $prefix . 'tb' );
        $sql = "SHOW TABLES LIKE '{$prefix}_%'";
        $rs = $this->m->query( $sql );
        $records = $this->m->num_rows( $rs );
        for ( $i = 1; $i <= $records; $i++ ) {
            $data = $this->m->fetch_array( $rs );
            $tablename = $data[ 0 ];
            if ( !in_array( $tablename, $exclude ) ) {
                $msg .= $this->create_primary($tablename);
            } else {
                $msg .= $tablename . ' is a view.<br>';
            }
        }
        $msg .= $this->create_primary("user");
        $msg .= $this->create_primary("info");
        $this->sm->assign( 'msg', $msg );
        $this->sm->assign( 'page', 'util/check.tpl.html' );
    }
    function create_primary($table) {
        $sql1 = "describe $table";
        $dt1 = $this->m->fetch_assoc( $sql1 );
        if ( $dt1[ 'Key' ] != 'PRI' ) {
            $msg = $table . ' do not Primary Key<br>';
            $fld = $dt1[ 'Field' ];
            $sql1 = "ALTER TABLE $table CHANGE {$fld} {$fld} INT(11) AUTO_INCREMENT PRIMARY KEY;";
            $this->m->query( $sql1 );
        } else {
            $msg = $table . ' already has Primary Key<br>';
        }
        return $msg;
    }
    function changefield( $fld, $tbl, $qstring ) {
        $sql = "SHOW COLUMNS FROM {$tbl} LIKE '{$fld}'";
        $uid = $this->m->num_rows( $this->m->query( $sql ) ) == 0 ? 0 : 1;
        if ( $uid == 1 ) {
            $sql = "ALTER TABLE `{$tbl}` {$qstring}";
            $this->m->query( $sql );
        }
    }
    function auto_backup() {
        $sql = "SELECT value FROM configuration WHERE name='last_backup_date'";
        $res = $this->m->fetch_assoc($sql);
        $dt = $res['value'];
        $curdate = date('Y-m-d');
        if ($dt < $curdate || $dt=="") {
            $msg = $this->create_autobackup();
            if ($dt=="") {
                $sql = "INSERT INTO configuration (name, value) VALUES ('last_backup_date', '$curdate')";
            } else {
                $sql = "UPDATE configuration SET value='$curdate' WHERE name='last_backup_date'";
            }
            $this->m->query($sql);
        } else {
            $msg = "Auto backup already taken for $curdate";$msg="";
        }
        return $msg;
    }
    function create_autobackup() {
        $file = $this->get_filename();
        $ini = parse_ini_file("config/db.ini");
        $hostName = $ini['hostName'];
        $userName = $ini['userName'];
        $password = $ini['password'];
        $dbName = $ini['dbName'];
        $conn = mysqli_connect($hostName, $userName, $password, $dbName) or die("Connection to the server failed");

        $result = mysqli_query($conn, "SHOW FULL TABLES WHERE Table_Type = 'BASE TABLE'");
        $tables = array();
        while ($row = mysqli_fetch_row($result)) {
            $tables[] = $row[0];
        }
        $sqlScript = "";
        foreach ($tables as $table) {
            $query = "SHOW CREATE TABLE $table";
            $result = mysqli_query($conn, $query);
            $row = mysqli_fetch_row($result);
            
            $sqlScript .= "\n\n" . $row[1] . ";\n\n";
            
            
            $query = "SELECT * FROM $table";
            $result = mysqli_query($conn, $query);
            
            $columnCount = mysqli_num_fields($result);
            
            for ($i = 0; $i < $columnCount; $i ++) {
                while ($row = mysqli_fetch_row($result)) {
                    $sqlScript .= "INSERT INTO $table VALUES(";
                    for ($j = 0; $j < $columnCount; $j ++) {
                        $row[$j] = $row[$j];
                        
                        $sqlScript .= (isset($row[$j])) ? '"' . $row[$j] . '"' : '""';

                        if ($j < ($columnCount - 1)) {
                            $sqlScript .= ',';
                        }
                    }
                    $sqlScript .= ");\n";
                }
            }
            $sqlScript .= "\n"; 
        }
        $mysql_file = fopen($file, 'w+');
        fwrite($mysql_file ,$sqlScript );
        fclose($mysql_file);

        $zip = new ZipArchive();
        $zip->open("$file.zip",  ZipArchive::CREATE);
        $zip->addFile("{$file}");
        $zip->close();
        unlink("$file");
    }
    function get_filename() {
        date_default_timezone_set('Asia/Kolkata');
        $fname = str_replace(" ", "_", trim(trim($_SESSION['companyname']), "."));
        $fname = str_replace("&", "_", $fname);
        $sdate = substr($_SESSION['sdate'], 0, 4);
        $edate = substr($_SESSION['edate'], 0, 4);
        $file = 'backup/' . $fname . "_" . $sdate . "_" . $edate . "_" . date("d-m-Y_H_i_s") . '.sql';
        return $file;
    }
    function create_backup() {
        $file = $this->get_filename();
        $ini = parse_ini_file("config/db.ini");
        $dbhost = $ini['hostName'];
        $dbuser = $ini['userName'];
        $dbpass = $ini['password'];
        $dbname = $ini['dbName'];

        if ($dbpass!="") {
            $command = "mysqldump --opt -h $dbhost -u $dbuser -p{$dbpass} $dbname > $file";
            exec($command);

            $command = "zip -j $file.zip $file";
            exec($command);

            $command = "rm $file";
            exec($command);
            $msg = "Backup is Successful. File Created : " . $this->file;
        } else {
            $msg = "Backup not possible.";
        }
        return $msg;
    }
    function backup() {
        $_SESSION['msg'] = $this->create_backup();
        $this->redirect("index.php?module=util&func=listing");
    }
    function listing() {
        $files = array();
        if ($dir = opendir("backup")) {
            while (($file = readdir($dir)) !== false) {
                if (strpos($file, '.sql', 1)) {
                    $filename = str_replace('.sql', '', $file);
                    $filename = str_replace('.zip', '', $file);
                    $date =  date ("d F Y H:i:s.", filectime("backup/$file"));
                    $size = $this->filesize_formatted("backup/$file");
                    $files[] = array("date" => $date, "size"=>$size, "filename" => $file);
                }
            }
        }
        $this->sm->assign("file", $files);
        $this->sm->assign("page", "util/listing.tpl.html");
    }
    function filesize_formatted($path) {
        $size = filesize($path);
        $units = array( 'B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');
        $power = $size > 0 ? floor(log($size, 1024)) : 0;
        return number_format($size / pow(1024, $power), 2, '.', ',') . ' ' . $units[$power];
    }
    function delete() {
        $file = $_REQUEST['id'];
        if (!is_dir("backup/" . $file)) {
            unlink("backup/" . $file);
            $_SESSION['msg'] = "Backup file Successfully Delete.";
        } else {
            $_SESSION['msg'] = "Error occured while Deleting Backup file!!!";
        }
        $this->redirect("index.php?module=util&func=listing");
    }
    function download() {
        $file = "backup/" . $_REQUEST['id'];
        if (!is_dir($file)) {
            header('Content-type: application/octet-stream');
            header('Content-Disposition: attachment; filename="' . $_REQUEST['id'] . '"');
            readfile($file);
            exit;
        }
    }
}
?>