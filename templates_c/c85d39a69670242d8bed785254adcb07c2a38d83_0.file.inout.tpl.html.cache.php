<?php
/* Smarty version 3.1.39, created on 2021-10-30 09:06:52
  from 'C:\xampp8\htdocs\hotel\templates\report\inout.tpl.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_617cbdd4a88d64_80120040',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c85d39a69670242d8bed785254adcb07c2a38d83' => 
    array (
      0 => 'C:\\xampp8\\htdocs\\hotel\\templates\\report\\inout.tpl.html',
      1 => 1635051811,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_617cbdd4a88d64_80120040 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp8\\htdocs\\Smarty-3\\libs\\plugins\\modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
$_smarty_tpl->compiled->nocache_hash = '70693365617cbdd4a0bff6_26088953';
?>
<fieldset>
    <legend><h3>Check-in Check-out Report<hr></h3></legend>
    <form method="post">
        <table>
            <tr>
                <td>Check-in time</td>
                <td><input type="text" name="in" size="5" value='<?php echo $_REQUEST['in'];?>
' /></td>
                <td>Check-Out Time</td>
                <td><input type="text" name="out" size="5" value='<?php echo $_REQUEST['out'];?>
' /></td>
                <td>Start</td>
                <td><input type="date" name="start_date" size="9" placeholder="dd-mm-yyyy" value='<?php echo $_REQUEST['start_date'];?>
' /></td>
                <td>End</td>
                <td><input type="date" name="end_date" size="9"  placeholder="dd-mm-yyyy" value='<?php echo $_REQUEST['end_date'];?>
' /></td>
                <td><input type="submit" value="Go" />
                    <input type="button" class="print" value="Print" />
                    <input type="hidden" id="excelfile" value="InOut" />
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
    Check-in Check-out Report Period <?php echo smarty_modifier_date_format($_REQUEST['start_date'],"%d-%m-%Y");?>
 - <?php echo smarty_modifier_date_format($_REQUEST['end_date'],"%d-%m-%Y");?>

    <h5><b>Check In time is <?php echo $_REQUEST['in'];?>
 and Check Out time is <?php echo $_REQUEST['out'];?>
.</b></h5>
    <table id='report' border="1">
        <thead>    
            <tr>
                <th>#</th><th>No.</th><th>Name</th><th>Phone</th><th>Checkin Date</th><th>Checkout Date</th><th>CI Time</th><th>CO Time</th><th>Room</th>
                <th>Days</th><th>Rent</th><th>Discount</th><th>Net Rate</th><th>GST</th><th>Total</th><th>Remarks</th>
            </tr>
        </thead>
        <tbody>
            <?php $_smarty_tpl->_assignInScope('s', 1);?>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value, 'x');
$_smarty_tpl->tpl_vars['x']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['x']->value) {
$_smarty_tpl->tpl_vars['x']->do_else = false;
?>
            <?php if ($_smarty_tpl->tpl_vars['x']->value['daysstay'] != $_smarty_tpl->tpl_vars['x']->value['actual']) {?>
            <tr>
                <td><?php echo $_smarty_tpl->tpl_vars['s']->value;
$_smarty_tpl->_assignInScope('s', $_smarty_tpl->tpl_vars['s']->value+1);?></td>
                <td><?php echo $_smarty_tpl->tpl_vars['x']->value['no'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['x']->value['name'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['x']->value['mobile'];?>
</td>
                <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['x']->value['date'],"%d-%m-%Y");?>
</td>
                <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['x']->value['depature_date'],"%d-%m-%Y");?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['x']->value['time'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['x']->value['depature_time'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['x']->value['roomnumber'];?>
</td>
               
                <td><?php echo $_smarty_tpl->tpl_vars['x']->value['daysstay'];?>
</td>
                <td align="right"><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['x']->value['rent']);?>
</td>
                <td align="right"><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['x']->value['discount']);?>
</td>
                <td align="right"><?php echo sprintf("%.2f",($_smarty_tpl->tpl_vars['x']->value['goodsamount_0']+$_smarty_tpl->tpl_vars['x']->value['goodsamount_5']+$_smarty_tpl->tpl_vars['x']->value['goodsamount_12']+$_smarty_tpl->tpl_vars['x']->value['goodsamount_18']));?>
</td>
                <td align="right"><?php echo sprintf("%.2f",($_smarty_tpl->tpl_vars['x']->value['sgst_5']+$_smarty_tpl->tpl_vars['x']->value['sgst_12']+$_smarty_tpl->tpl_vars['x']->value['sgst_18']+$_smarty_tpl->tpl_vars['x']->value['cgst_5']+$_smarty_tpl->tpl_vars['x']->value['cgst_12']+$_smarty_tpl->tpl_vars['x']->value['cgst_18']));?>
</td>
                <td align="right"><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['x']->value['total']);?>
</td>
                <td><?php if ($_smarty_tpl->tpl_vars['x']->value['daysstay'] != $_smarty_tpl->tpl_vars['x']->value['actual']) {?>Charged for <?php echo $_smarty_tpl->tpl_vars['x']->value['daysstay'];?>
 days but it should be <?php echo $_smarty_tpl->tpl_vars['x']->value['actual'];?>
 days.<?php }?></td>
            </tr>
            <?php }?>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </tbody>
    </table>
</div><?php }
}
