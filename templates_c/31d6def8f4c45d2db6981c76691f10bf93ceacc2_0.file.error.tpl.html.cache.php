<?php
/* Smarty version 3.1.39, created on 2021-10-22 08:22:24
  from 'C:\xampp8\htdocs\hotel\templates\report\error.tpl.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_61722768a8f531_09447165',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '31d6def8f4c45d2db6981c76691f10bf93ceacc2' => 
    array (
      0 => 'C:\\xampp8\\htdocs\\hotel\\templates\\report\\error.tpl.html',
      1 => 1634871143,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61722768a8f531_09447165 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp8\\htdocs\\Smarty-3\\libs\\plugins\\modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
$_smarty_tpl->compiled->nocache_hash = '94182895661722768a2aec1_94351109';
?>
<fieldset>
    <legend><h3>Error Report<hr></h3></legend>
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
                    <input type="hidden" id="excelfile" value="GST" />
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
    Error Report Period <?php echo smarty_modifier_date_format($_REQUEST['start_date'],"%d-%m-%Y");?>
 - <?php echo smarty_modifier_date_format($_REQUEST['end_date'],"%d-%m-%Y");?>
<br />
    <table id='report' border="1">
        <thead>
        <tr>
            <th>Sl</th><th>Bill No</th><th>Bill Date</th><th>In Date</th><th>Ref No</th><th>GRC</th><th>Name</th>
            <th>Days Stay</th><th>Rent</th>
            <th>Discount</th>
            <th>Detail GST</th>
            <th>Detail Amount</th>
            <th>Summary GST</th>
            <th>Summary Total</th>
            <th>Remark</th>
        </tr>
        </thead>
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
                <td><?php echo $_smarty_tpl->tpl_vars['x']->value['billno'];?>
</td>
                <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['x']->value['depature_date'],"%d-%m-%Y");?>
</td>
                <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['x']->value['date'],"%d-%m-%Y");?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['x']->value['no'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['x']->value['grcno'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['x']->value['name'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['x']->value['daysstay'];?>
</td>
                <td align="right"><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['x']->value['rent']);?>
</td>
                <td align="right"><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['x']->value['discount']);?>
</td>
                <?php $_smarty_tpl->_assignInScope('gst', $_smarty_tpl->tpl_vars['x']->value['gst_5']+$_smarty_tpl->tpl_vars['x']->value['gst_12']+$_smarty_tpl->tpl_vars['x']->value['gst_18']);?>
                <?php $_smarty_tpl->_assignInScope('tot', $_smarty_tpl->tpl_vars['x']->value['goodsamount_0']+$_smarty_tpl->tpl_vars['x']->value['goodsamount_5']+$_smarty_tpl->tpl_vars['x']->value['goodsamount_12']+$_smarty_tpl->tpl_vars['x']->value['goodsamount_18']);?>
                <td align="right"><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['gst']->value);?>
</td>
                <td align="right"><?php echo sprintf("%.2f",($_smarty_tpl->tpl_vars['tot']->value+$_smarty_tpl->tpl_vars['gst']->value));?>
</td>

                <td align="right"><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['x']->value['gstamt']);?>
</td>
                <td align="right"><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['x']->value['total']);?>
</td>
                <td>
                    <?php if ($_smarty_tpl->tpl_vars['gst']->value != $_smarty_tpl->tpl_vars['x']->value['gstamt']) {?><!--<?php echo $_smarty_tpl->tpl_vars['gst']->value;?>
-<?php echo $_smarty_tpl->tpl_vars['x']->value['gstamt'];?>
=--><?php echo sprintf("%.6f",($_smarty_tpl->tpl_vars['gst']->value-$_smarty_tpl->tpl_vars['x']->value['gstamt']));?>
.Gst Not Matching<br><?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['x']->value['total'] != $_smarty_tpl->tpl_vars['tot']->value+$_smarty_tpl->tpl_vars['gst']->value) {?><!--<?php echo $_smarty_tpl->tpl_vars['tot']->value+$_smarty_tpl->tpl_vars['gst']->value;?>
-<?php echo $_smarty_tpl->tpl_vars['x']->value['total'];?>
=--><?php echo sprintf("%.6f",($_smarty_tpl->tpl_vars['x']->value['total']-($_smarty_tpl->tpl_vars['tot']->value+$_smarty_tpl->tpl_vars['gst']->value)));?>
.Total Not Matching<?php }?>
                </td>
            </tr>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </table>
</div>
<?php }
}
