<?php
/* Smarty version 3.1.39, created on 2021-10-19 22:38:14
  from 'C:\xampp8\htdocs\hotel\templates\report\pay.tpl.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_616efb7edf03a5_33588469',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3d54f0a02d892dc28f9da1448c2b85c779dd6263' => 
    array (
      0 => 'C:\\xampp8\\htdocs\\hotel\\templates\\report\\pay.tpl.html',
      1 => 1630646412,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_616efb7edf03a5_33588469 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp8\\htdocs\\Smarty-3\\libs\\plugins\\modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
$_smarty_tpl->compiled->nocache_hash = '729148837616efb7ed7e144_33472162';
?>
<fieldset>
    <legend><h3>Pay In/Out Reportt<hr></h3></legend>
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
                    <input type="hidden" id="excelfile" value="Pay" />
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
    Pay In/Out Report Period <?php echo smarty_modifier_date_format($_REQUEST['start_date'],"%d-%m-%Y");?>
 - <?php echo smarty_modifier_date_format($_REQUEST['end_date'],"%d-%m-%Y");?>
<br />
    <table id='report' border="1">
        <tr>
            <th>Sl</th><th>Reference No.</th><th>Guest Name</th><th>Bill No.</th>
            <th>Booking Date</th><th>Check out Date</th><th>Room Rent</th>
            <th>gst on room</th>
            <th>total bill amount</th>
            <th>paid to go ibo</th>
            <th>commission</th>
            <th>gst charged by go ibo</th>
            <th>tds by go ibo</th>
            <th>amount to be received from go ibo</th>
        </tr>
        <?php $_smarty_tpl->_assignInScope('total', 0);
$_smarty_tpl->_assignInScope('comm', 0);
$_smarty_tpl->_assignInScope('s', 1);?>
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
                <td><?php echo $_smarty_tpl->tpl_vars['x']->value['name'];?>
</td>
                <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['x']->value['date'],"%d-%m-%Y");?>
</td>
                <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['x']->value['depature_date'],"%d-%m-%Y");?>
</td>
                <td align="right"><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['x']->value['total']);?>
</td>
                <td align="right"><?php echo sprintf("%.2f",0);?>
</td>
                <?php $_smarty_tpl->_assignInScope('total', $_smarty_tpl->tpl_vars['total']->value+$_smarty_tpl->tpl_vars['x']->value['total']);?>
                <?php $_smarty_tpl->_assignInScope('comm', $_smarty_tpl->tpl_vars['comm']->value+0);?>
            </tr>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        <tr>
            <th colspan="5">Total :</th>
            <td align="right"><b><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['total']->value);?>
</b></td>
            <td align="right"><b><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['comm']->value);?>
</b></td>
        </tr>
    </table>
</div>
<?php }
}
