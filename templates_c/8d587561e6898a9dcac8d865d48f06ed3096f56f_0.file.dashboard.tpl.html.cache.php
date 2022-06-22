<?php
/* Smarty version 3.1.39, created on 2021-11-14 08:34:39
  from 'C:\xampp8\htdocs\hotel\templates\reservation\dashboard.tpl.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_61907cc7115785_34250400',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8d587561e6898a9dcac8d865d48f06ed3096f56f' => 
    array (
      0 => 'C:\\xampp8\\htdocs\\hotel\\templates\\reservation\\dashboard.tpl.html',
      1 => 1635733267,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61907cc7115785_34250400 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp8\\htdocs\\Smarty-3\\libs\\plugins\\modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
$_smarty_tpl->compiled->nocache_hash = '173193460861907cc70c6340_78674181';
?>
<div class="col-7 card">
    <!---<form method="post">
        <h4>Show Rooms Available for Date : <input type="date" name="date" value="<?php echo $_REQUEST['date'];?>
">
        <input type="submit" value="Show"></h4>
    </form>-->
    <div class="remark">Room Status for :: <?php echo smarty_modifier_date_format(time(),"%d-%m-%Y %H:%M %p");?>
</div>
    <div class="card-body w-10">
        <?php $_smarty_tpl->_assignInScope('booked', 0);
$_smarty_tpl->_assignInScope('vacant', 0);
$_smarty_tpl->_assignInScope('all', 0);
$_smarty_tpl->_assignInScope('res', 0);
$_smarty_tpl->_assignInScope('block', 0);
$_smarty_tpl->_assignInScope('dty', 0);?>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rooms']->value, 'mod');
$_smarty_tpl->tpl_vars['mod']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['mod']->value) {
$_smarty_tpl->tpl_vars['mod']->do_else = false;
?>
	<?php $_smarty_tpl->_assignInScope('flag', 0);?>
                    <?php if ($_smarty_tpl->tpl_vars['mod']->value['status'] == 1) {
$_smarty_tpl->_assignInScope('bc', "dirty");
$_smarty_tpl->_assignInScope('dty', $_smarty_tpl->tpl_vars['dty']->value+1);
}?>
                    <?php if ($_smarty_tpl->tpl_vars['mod']->value['status'] == 2) {
$_smarty_tpl->_assignInScope('bc', "block");
$_smarty_tpl->_assignInScope('block', $_smarty_tpl->tpl_vars['block']->value+1);
}?>
                    <?php if ($_smarty_tpl->tpl_vars['mod']->value['status'] == 0) {
$_smarty_tpl->_assignInScope('bc', "vacant");
$_smarty_tpl->_assignInScope('vacant', $_smarty_tpl->tpl_vars['vacant']->value+1);
}?>
                    <?php if ($_smarty_tpl->tpl_vars['mod']->value['status'] == 4) {
$_smarty_tpl->_assignInScope('bc', "reserve");
$_smarty_tpl->_assignInScope('res', $_smarty_tpl->tpl_vars['res']->value+1);
}?>
                    <?php if ($_smarty_tpl->tpl_vars['mod']->value['status'] == 3) {
$_smarty_tpl->_assignInScope('bc', "occupy");
$_smarty_tpl->_assignInScope('flag', 1);
$_smarty_tpl->_assignInScope('booked', $_smarty_tpl->tpl_vars['booked']->value+1);
}?>
            <?php $_smarty_tpl->_assignInScope('all', $_smarty_tpl->tpl_vars['all']->value+1);?>
            <a style="width: 60px;" href="#" class="btn <?php echo $_smarty_tpl->tpl_vars['bc']->value;?>
 m-3 p-4" <?php if ($_smarty_tpl->tpl_vars['flag']->value) {?>onclick="showdetails('<?php echo $_smarty_tpl->tpl_vars['mod']->value['name'];?>
', '<?php echo $_REQUEST['date'];?>
')"<?php }?>><?php echo $_smarty_tpl->tpl_vars['mod']->value['name'];?>
</a>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </div>
    <div class="remark">Total Rooms : <?php echo $_smarty_tpl->tpl_vars['all']->value;?>
,  Booked : <?php echo $_smarty_tpl->tpl_vars['booked']->value;?>
, Vacant : <?php echo $_smarty_tpl->tpl_vars['vacant']->value;?>
, Reserved : <?php echo $_smarty_tpl->tpl_vars['res']->value;?>
, Blocked : <?php echo $_smarty_tpl->tpl_vars['block']->value;?>
, Dirty : <?php echo $_smarty_tpl->tpl_vars['dty']->value;?>
</div>
</div>
<?php echo '<script'; ?>
>
function showdetails(room, date) {
    $.post("index.php?module=reservation&func=showguest", { room:room, date:date }, function(resp) {
        if (resp=="null") {
            json_data = "Some issue, while getting data from Server.";
        } else {
            data = JSON.parse(resp);
            json_data = "<table class='table table-bordered table-striped'>";
            for (i in data) {
                json_data = json_data + "<tr><th>"+ i.toUpperCase() + "</th><td>" + data[i] + "</td></tr>";
            }
            json_data = json_data + "</table>";
        }
        $(".modal-body").html(json_data);
        $('#myModal').modal('show');
    });
}
<?php echo '</script'; ?>
>
<style>
    .dirty {
        background-color: yellow;
        color : black;
        font-weight:bolder;
    }
    .occupy {
        background-color: red;
        color : white;
        font-weight: bolder;
    }
    .vacant {
        background-color: green;
        color : white;
        font-weight: bolder;
    }
    .block {
        background-color: grey;
        color : white;
        font-weight: bolder;
    }
    .reserve {
        background-color: blue;
        color : white;
        font-weight: bolder;
    }
    .remark {
        background-color:lightgrey;
        vertical-align: middle;
        vertical-align: center;
        font-size: x-large;
        text-align: center;
    }
</style>
<?php }
}
