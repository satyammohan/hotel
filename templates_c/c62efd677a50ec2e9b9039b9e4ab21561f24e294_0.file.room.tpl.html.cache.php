<?php
/* Smarty version 3.1.39, created on 2021-10-15 08:50:48
  from 'C:\xampp8\htdocs\hotel\templates\report\room.tpl.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_6168f390532308_85827219',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c62efd677a50ec2e9b9039b9e4ab21561f24e294' => 
    array (
      0 => 'C:\\xampp8\\htdocs\\hotel\\templates\\report\\room.tpl.html',
      1 => 1630646412,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6168f390532308_85827219 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp8\\htdocs\\Smarty-3\\libs\\plugins\\modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
$_smarty_tpl->compiled->nocache_hash = '6864757496168f3904fc983_84574188';
?>
<fieldset>
    <legend><h3>Room Booking Report<hr></h3></legend>
    <form method="post">
        <table>
            <tr>
                <td>Start</td>
                <td><input type="date" name="start_date" size="9" placeholder="dd-mm-yyyy" value='<?php echo $_REQUEST['start_date'];?>
' /></td>
                <td>End</td>
                <td><input type="date" name="end_date" size="9"  placeholder="dd-mm-yyyy" value='<?php echo $_REQUEST['end_date'];?>
' /></td>
                <td><input type="submit" value="Go" />
                    <input type="button" class="print" value="Print" />
                    <input type="hidden" id="excelfile" value="RoomBooking" />
                    <input type="button" class="excel" value="Download" title="Download as Excel" />
                </td>
            </tr>
        </table>
    </form>
</fieldset>
<br />
<div class="print_content">
    <?php echo $_SESSION['cname'];?>
 <?php echo $_SESSION['fyear'];?>
<br>
    Room Booking Report Period <?php echo smarty_modifier_date_format($_REQUEST['start_date'],"%d-%m-%Y");?>
 - <?php echo smarty_modifier_date_format($_REQUEST['end_date'],"%d-%m-%Y");?>
<br />
    <table id='report' border="1">
        <tr>
            <th>Sl</th><th>Bill No.</th><th>Date</th><th>Name</th><th>Total</th><th>Amount Received</th><th>MR</th><th>Due</th>
        </tr>
        <?php $_smarty_tpl->_assignInScope('total', 0);
$_smarty_tpl->_assignInScope('recv', 0);?>
        <?php $_smarty_tpl->_assignInScope('s', 1);?>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value, 'x', false, NULL, 'it', array (
));
$_smarty_tpl->tpl_vars['x']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['x']->value) {
$_smarty_tpl->tpl_vars['x']->do_else = false;
?>
            <tr>
                <td><?php echo $_smarty_tpl->tpl_vars['s']->value;
$_smarty_tpl->_assignInScope('s', $_smarty_tpl->tpl_vars['s']->value+1);?></td>
                <td><?php echo $_smarty_tpl->tpl_vars['x']->value['no'];?>
</td>
                <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['x']->value['date'],"%d-%m-%Y");?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['x']->value['name'];?>
</td>
                <td align="right"><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['x']->value['total']);?>
</td>
                <td align="right"><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['x']->value['recv']);?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['x']->value['mrs'];?>
</td>
                <td align="right"><?php echo sprintf("%.2f",($_smarty_tpl->tpl_vars['x']->value['total']-$_smarty_tpl->tpl_vars['x']->value['recv']));?>
</td>
                <?php $_smarty_tpl->_assignInScope('total', $_smarty_tpl->tpl_vars['total']->value+$_smarty_tpl->tpl_vars['x']->value['total']);?>
                <?php $_smarty_tpl->_assignInScope('recv', $_smarty_tpl->tpl_vars['recv']->value+$_smarty_tpl->tpl_vars['x']->value['recv']);?>
            </tr>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        <tr>
            <th colspan="4">Total :</th>
            <td align="right"><b><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['total']->value);?>
</b></td>
            <td align="right"><b><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['recv']->value);?>
</b></th>
            <td>&nbsp;</td>
            <td align="right"><b><?php echo sprintf("%.2f",($_smarty_tpl->tpl_vars['total']->value-$_smarty_tpl->tpl_vars['recv']->value));?>
</b></td>
        </tr>
    </table>
</div>
<?php }
}
