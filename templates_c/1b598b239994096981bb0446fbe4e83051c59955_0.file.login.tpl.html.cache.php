<?php
/* Smarty version 3.1.39, created on 2022-06-22 06:45:59
  from 'C:\xampp\htdocs\hotel\templates\user\login.tpl.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_62b26d4f400611_17216592',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1b598b239994096981bb0446fbe4e83051c59955' => 
    array (
      0 => 'C:\\xampp\\htdocs\\hotel\\templates\\user\\login.tpl.html',
      1 => 1630646412,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62b26d4f400611_17216592 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '151985417862b26d4f3fa442_76871443';
?>
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
<?php echo '<script'; ?>
>
	$("#uname").focus();
<?php echo '</script'; ?>
>
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
</style><?php }
}
