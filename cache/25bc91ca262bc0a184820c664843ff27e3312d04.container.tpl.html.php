<?php
/* Smarty version 3.1.39, created on 2022-06-22 06:45:59
  from 'C:\xampp\htdocs\hotel\templates\common\container.tpl.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_62b26d4f57b799_00685676',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6ce6c24427326d7c1daba122d9ca857a5a5cc54b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\hotel\\templates\\common\\container.tpl.html',
      1 => 1631240806,
      2 => 'file',
    ),
    '1b598b239994096981bb0446fbe4e83051c59955' => 
    array (
      0 => 'C:\\xampp\\htdocs\\hotel\\templates\\user\\login.tpl.html',
      1 => 1630646412,
      2 => 'file',
    ),
    '03975b2349ae94ff1dbd563545d63015fb5ead2b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\hotel\\templates\\common\\footer.tpl.html',
      1 => 1630646412,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 3600,
),true)) {
function content_62b26d4f57b799_00685676 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>
    <head>
        <title>Hotel Management System
                    </title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
        <link rel="stylesheet" href="js/jquery.mobile-1.4.5/jquery.mobile-1.4.5.min.css">

        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="js/jquery.mobile-1.4.5/jquery.mobile-1.4.5.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

        <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>

		<link rel="stylesheet" href="js/jquery.mobile-1.4.5/demos/_assets/css/jqm-demos.css">
		<script src="js/jquery.mobile-1.4.5/demos/_assets/js/index.js"></script>

        <link rel="stylesheet" href="css/common.css">
        <script type="text/javascript" src="js/jqprint.js"></script>
        <script type="text/javascript" src="js/table2excel.js"></script>
        <script src="js/common.js?time=1"></script>

                <script language="javascript" type="text/javascript">
            var js_date = "dd/mm/yy";
            var sdate = "";
            var edate = "";
        </script>
    </head>
    <body>
                    <div class="row w-100">
                <div class="err_msg">Invalid Username or Password.</div>
            </div>
                        <div class="row grow w-100 h-100">
                            <div class="col-12 w-100 h-100">
                    <main id="main" class=" alert-info">
	<div id="login-left"></div>
	<div id="login-right">
		<div class="card col-md-8">
			<div class="card-body">
				<form method="post" action="index.php?module=user&func=login">
					<div class="form-group">
						<label for="uname" class="control-label">Username</label>
						<input type="text" id="uname" name="user[uname]" class="form-control">
					</div>
					<div class="form-group">
						<label for="pass" class="control-label">Password</label>
						<input type="password" id="pass" name="user[pass]" class="form-control">
					</div>
					<center><button class="btn-sm btn-block btn-wave col-md-4 btn-primary">Login</button></center>
				</form>
			</div>
		</div>
	</div>
  </main>
<script>
	$("#uname").focus();
</script>
<style>
	#login-right{
      position: absolute;
      right:0;
      width:40%;
      height: calc(100%);
      background:white;
      display: flex;
      align-items: center;
  }
  #login-left{
      position: absolute;
      left:0;
      width:60%;
      height: calc(100%);
      background:#00000061;
      display: flex;
      align-items: center;
  }
  #login-right .card{
      margin: auto
  }
  #login-left {
    background: url(./img/hotel-cover.jpg);
    background-repeat: no-repeat;
    background-size: cover;
  }
	img#cimg,.cimg{
		max-height: 10vh;
		max-width: 6vw;  
  }
</style>                </div>
                        <div class="footer">
    <div class="float-left">Copyright &copy; 2021 - All Rights Reserved </div>
    <div class="float-right">Powered by : @ Solutions</div>
</div>        </div>
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="btn" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                    </div>
                </div>
            </div>
        </div>
		<div tabindex="-1" class="modal bs-logout-modal-sm" role="dialog" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-sm">
			  <div class="modal-content">
				<div class="modal-header"><h4>Are you sure you want to logout ?</h4></div>
				<div class="modal-footer">
					<a class="btn btn-danger btn-xl" href="index.php?module=user&func=logout">Logout</a>
					<a class="btn btn-primary btn-xl" data-dismiss="modal">Close</a>
				</div>
			  </div>
			</div>
		</div>
    </body>
</html>
<?php }
}
