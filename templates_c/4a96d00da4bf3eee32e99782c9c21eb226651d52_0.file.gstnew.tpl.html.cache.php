<?php
/* Smarty version 3.1.39, created on 2021-10-24 20:17:21
  from 'C:\xampp8\htdocs\hotel\templates\report\gstnew.tpl.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_617571f998aca1_34575599',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4a96d00da4bf3eee32e99782c9c21eb226651d52' => 
    array (
      0 => 'C:\\xampp8\\htdocs\\hotel\\templates\\report\\gstnew.tpl.html',
      1 => 1634958281,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_617571f998aca1_34575599 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp8\\htdocs\\Smarty-3\\libs\\plugins\\modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
$_smarty_tpl->compiled->nocache_hash = '1476773764617571f97d91b1_31172488';
?>
<fieldset>
    <legend><h3>New GST Report<hr></h3></legend>
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
    GST Report Period <?php echo smarty_modifier_date_format($_REQUEST['start_date'],"%d-%m-%Y");?>
 - <?php echo smarty_modifier_date_format($_REQUEST['end_date'],"%d-%m-%Y");?>
<br />
    <table id='report' border="1">
        <thead>
        <tr>
            <td colspan="13"></td><th>GST 0%</th><th colspan="3">GST 5%</th><th colspan="3">GST 12%</th><th colspan="3">GST 18%</th><th colspan="5">&nbsp;</th>
        </tr>
        <tr>
            <th>Sl</th><th>Type</th><th>Bill No</th><th>Bill Date</th><th>In Date</th><th>In Time</th><th>Out Time</th><th>Ref No</th><th>GRC</th><th>Name</th><th>GSTIN</th>
            <th>Rent</th><th>Days Stay</th>
            <th>0% GST Taxable Value</th>
            <th>5% GST Taxable Value</th><th>SGST</th><th>CGST</th>
            <th>12% GST Taxable Value</th><th>SGST</th><th>CGST</th>
            <th>18% GST Taxable Value</th><th>SGST</th><th>CGST</th>
            <th>Net Amount</th><th>Total GST Amount</th><th>Total</th><th>Discount</th><th>Add Date</th><th>Modify Date</th>
        </tr>
        </thead>
        <?php $_smarty_tpl->_assignInScope('total', 0);
$_smarty_tpl->_assignInScope('goods', 0);
$_smarty_tpl->_assignInScope('gst', 0);?>
        <?php $_smarty_tpl->_assignInScope('goodsamount_0', 0);
$_smarty_tpl->_assignInScope('discount', 0);?>
        <?php $_smarty_tpl->_assignInScope('goodsamount_5', 0);
$_smarty_tpl->_assignInScope('sgst_5', 0);
$_smarty_tpl->_assignInScope('cgst_5', 0);?>
        <?php $_smarty_tpl->_assignInScope('goodsamount_12', 0);
$_smarty_tpl->_assignInScope('sgst_12', 0);
$_smarty_tpl->_assignInScope('cgst_12', 0);?>
        <?php $_smarty_tpl->_assignInScope('goodsamount_18', 0);
$_smarty_tpl->_assignInScope('sgst_18', 0);
$_smarty_tpl->_assignInScope('cgst_18', 0);?>
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
                <td><?php echo $_smarty_tpl->tpl_vars['x']->value['rtype'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['x']->value['billno'];?>
</td>
                <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['x']->value['depature_date'],"%d-%m-%Y");?>
</td>
                <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['x']->value['date'],"%d-%m-%Y");?>
</td>
<td><?php echo $_smarty_tpl->tpl_vars['x']->value['time'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['x']->value['depature_time'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['x']->value['no'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['x']->value['grcno'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['x']->value['name'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['x']->value['gstin'];?>
</td>
                <td align="right"><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['x']->value['rent']);?>
</td><td><?php echo $_smarty_tpl->tpl_vars['x']->value['daysstay'];?>
</td>
                <td align="right"><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['x']->value['goodsamount_0']);?>
</td>
                <td align="right"><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['x']->value['goodsamount_5']);?>
</td><td align="right"><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['x']->value['sgst_5']);?>
</td><td align="right"><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['x']->value['cgst_5']);?>
</td>
                <td align="right"><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['x']->value['goodsamount_12']);?>
</td><td align="right"><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['x']->value['sgst_12']);?>
</td><td align="right"><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['x']->value['cgst_12']);?>
</td>
                <td align="right"><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['x']->value['goodsamount_18']);?>
</td><td align="right"><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['x']->value['sgst_18']);?>
</td><td align="right"><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['x']->value['cgst_18']);?>
</td>
                <td align="right"><?php echo sprintf("%.2f",($_smarty_tpl->tpl_vars['x']->value['goodsamount_0']+$_smarty_tpl->tpl_vars['x']->value['goodsamount_5']+$_smarty_tpl->tpl_vars['x']->value['goodsamount_12']+$_smarty_tpl->tpl_vars['x']->value['goodsamount_18']));?>
</td>
                <td align="right"><?php echo sprintf("%.2f",($_smarty_tpl->tpl_vars['x']->value['sgst_5']+$_smarty_tpl->tpl_vars['x']->value['sgst_12']+$_smarty_tpl->tpl_vars['x']->value['sgst_18']+$_smarty_tpl->tpl_vars['x']->value['cgst_5']+$_smarty_tpl->tpl_vars['x']->value['cgst_12']+$_smarty_tpl->tpl_vars['x']->value['cgst_18']));?>
</td>
                <td align="right"><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['x']->value['total']);?>
</td>
                <td align="right"><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['x']->value['discount']);?>
</td>
                <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['x']->value['create_date'],"%d-%m");?>
</td>
                <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['x']->value['modify_date'],"%d-%m");?>
</td>

                <?php $_smarty_tpl->_assignInScope('goodsamount_0', $_smarty_tpl->tpl_vars['goodsamount_0']->value+$_smarty_tpl->tpl_vars['x']->value['goodsamount_0']);?>
                <?php $_smarty_tpl->_assignInScope('goodsamount_5', $_smarty_tpl->tpl_vars['goodsamount_5']->value+$_smarty_tpl->tpl_vars['x']->value['goodsamount_5']);?>
                <?php $_smarty_tpl->_assignInScope('sgst_5', $_smarty_tpl->tpl_vars['sgst_5']->value+$_smarty_tpl->tpl_vars['x']->value['sgst_5']);?>
                <?php $_smarty_tpl->_assignInScope('cgst_5', $_smarty_tpl->tpl_vars['cgst_5']->value+$_smarty_tpl->tpl_vars['x']->value['cgst_5']);?>
                <?php $_smarty_tpl->_assignInScope('goodsamount_12', $_smarty_tpl->tpl_vars['goodsamount_12']->value+$_smarty_tpl->tpl_vars['x']->value['goodsamount_12']);?>
                <?php $_smarty_tpl->_assignInScope('sgst_12', $_smarty_tpl->tpl_vars['sgst_12']->value+$_smarty_tpl->tpl_vars['x']->value['sgst_12']);?>
                <?php $_smarty_tpl->_assignInScope('cgst_12', $_smarty_tpl->tpl_vars['cgst_12']->value+$_smarty_tpl->tpl_vars['x']->value['cgst_12']);?>
                <?php $_smarty_tpl->_assignInScope('goodsamount_18', $_smarty_tpl->tpl_vars['goodsamount_18']->value+$_smarty_tpl->tpl_vars['x']->value['goodsamount_18']);?>
                <?php $_smarty_tpl->_assignInScope('sgst_18', $_smarty_tpl->tpl_vars['sgst_18']->value+$_smarty_tpl->tpl_vars['x']->value['sgst_18']);?>
                <?php $_smarty_tpl->_assignInScope('cgst_18', $_smarty_tpl->tpl_vars['cgst_18']->value+$_smarty_tpl->tpl_vars['x']->value['cgst_18']);?>

                <?php $_smarty_tpl->_assignInScope('total', $_smarty_tpl->tpl_vars['total']->value+$_smarty_tpl->tpl_vars['x']->value['total']);?>
                <?php $_smarty_tpl->_assignInScope('discount', $_smarty_tpl->tpl_vars['discount']->value+$_smarty_tpl->tpl_vars['x']->value['discount']);?>
                <?php $_smarty_tpl->_assignInScope('gst', $_smarty_tpl->tpl_vars['gst']->value+$_smarty_tpl->tpl_vars['x']->value['sgst_5']+$_smarty_tpl->tpl_vars['x']->value['sgst_12']+$_smarty_tpl->tpl_vars['x']->value['sgst_18']+$_smarty_tpl->tpl_vars['x']->value['cgst_5']+$_smarty_tpl->tpl_vars['x']->value['cgst_12']+$_smarty_tpl->tpl_vars['x']->value['cgst_18']);?>
                <?php $_smarty_tpl->_assignInScope('goods', $_smarty_tpl->tpl_vars['goods']->value+$_smarty_tpl->tpl_vars['x']->value['goodsamount_0']+$_smarty_tpl->tpl_vars['x']->value['goodsamount_5']+$_smarty_tpl->tpl_vars['x']->value['goodsamount_12']+$_smarty_tpl->tpl_vars['x']->value['goodsamount_18']);?>
            </tr>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
<tr>
    <td colspan="13">Total :</td>
    <td align="right"><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['goodsamount_0']->value);?>
</td>
    <td align="right"><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['goodsamount_5']->value);?>
</td><td align="right"><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['sgst_5']->value);?>
</td><td align="right"><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['cgst_5']->value);?>
</td>
    <td align="right"><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['goodsamount_12']->value);?>
</td><td align="right"><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['sgst_12']->value);?>
</td><td align="right"><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['cgst_12']->value);?>
</td>
    <td align="right"><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['goodsamount_18']->value);?>
</td><td align="right"><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['sgst_18']->value);?>
</td><td align="right"><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['cgst_18']->value);?>
</td>
    <td align="right"><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['goods']->value);?>
</td>
    <td align="right"><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['gst']->value);?>
</td>
    <td align="right"><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['total']->value);?>
</td>
    <td align="right"><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['discount']->value);?>
</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
</tr>

    </table>
</div>
<?php }
}
