<?php
/* Smarty version 3.1.39, created on 2021-09-07 07:56:11
  from 'C:\xampp8\htdocs\hotel\templates\report\due.tpl.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_6136cdc35c8412_61008461',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fd1d467c2b2dac50b6679cad071b7864b0f87b58' => 
    array (
      0 => 'C:\\xampp8\\htdocs\\hotel\\templates\\report\\due.tpl.html',
      1 => 1630818477,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6136cdc35c8412_61008461 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp8\\htdocs\\Smarty-3\\libs\\plugins\\modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
$_smarty_tpl->compiled->nocache_hash = '20984126006136cdc357c860_77163320';
?>
<fieldset>
    <legend><h3>Due Report<hr></h3></legend>
    <form method="post">
        <table>
            <tr>
                <td>AS On :</td>
                <td><input type="date" name="start_date" size="9" placeholder="dd-mm-yyyy" value='<?php echo $_REQUEST['start_date'];?>
' /></td>
                <td><input type="submit" value="Go" />
                    <input type="button" class="print" value="Print" />
                    <input type="hidden" id="excelfile" value="Due" />
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
    Due Report Period <?php echo smarty_modifier_date_format($_REQUEST['start_date'],"%d-%m-%Y");?>
 - <?php echo smarty_modifier_date_format($_REQUEST['end_date'],"%d-%m-%Y");?>
<br />
    <table id='report' border="1">
        <tr>
            <th>Sl</th><th>Ref No.</th><th>GRC</th><th>Bill No.</th><th>Date</th><th>Name</th><th>Room</th><th>Days</th><th>Room</th><th>Food</th><th>Other</th><th>MR</th><th>Balance</th>
        </tr>
        <?php $_smarty_tpl->_assignInScope('total', 0);
$_smarty_tpl->_assignInScope('foodtotal', 0);
$_smarty_tpl->_assignInScope('othertotal', 0);
$_smarty_tpl->_assignInScope('mrtotal', 0);
$_smarty_tpl->_assignInScope('due', 0);?>
        <?php $_smarty_tpl->_assignInScope('s', 1);?>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value, 'x', false, NULL, 'it', array (
));
$_smarty_tpl->tpl_vars['x']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['x']->value) {
$_smarty_tpl->tpl_vars['x']->do_else = false;
?>
            <?php if ($_smarty_tpl->tpl_vars['x']->value['due'] != 0) {?>
            <tr>
                <td><?php echo $_smarty_tpl->tpl_vars['s']->value;
$_smarty_tpl->_assignInScope('s', $_smarty_tpl->tpl_vars['s']->value+1);?></td>
                <td><?php echo $_smarty_tpl->tpl_vars['x']->value['no'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['x']->value['grcno'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['x']->value['billno'];?>
</td>
                <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['x']->value['date'],"%d-%m-%Y");?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['x']->value['name'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['x']->value['roomnumber'];?>
</td>
                <td align="right"><?php echo $_smarty_tpl->tpl_vars['x']->value['daysstay'];?>
</td>
                <td align="right"><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['x']->value['total']);?>
</td>
                <td align="right"><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['x']->value['foodtotal']);?>
</td>
                <td align="right"><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['x']->value['othertotal']);?>
</td>
                <td align="right"><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['x']->value['mrtotal']);?>
</td>
                <td align="right"><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['x']->value['due']);?>
</td>
                <?php $_smarty_tpl->_assignInScope('total', $_smarty_tpl->tpl_vars['total']->value+$_smarty_tpl->tpl_vars['x']->value['total']);?>
                <?php $_smarty_tpl->_assignInScope('foodtotal', $_smarty_tpl->tpl_vars['foodtotal']->value+$_smarty_tpl->tpl_vars['x']->value['foodtotal']);?>
                <?php $_smarty_tpl->_assignInScope('othertotal', $_smarty_tpl->tpl_vars['othertotal']->value+$_smarty_tpl->tpl_vars['x']->value['othertotal']);?>
                <?php $_smarty_tpl->_assignInScope('mrtotal', $_smarty_tpl->tpl_vars['mrtotal']->value+$_smarty_tpl->tpl_vars['x']->value['mrtotal']);?>
                <?php $_smarty_tpl->_assignInScope('due', $_smarty_tpl->tpl_vars['due']->value+$_smarty_tpl->tpl_vars['x']->value['due']);?>
            </tr>
            <?php }?>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        <tr>
            <th colspan="8">Total :</th>
            <td align="right"><b><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['total']->value);?>
</b></td>
            <td align="right"><b><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['foodtotal']->value);?>
</b></td>
            <td align="right"><b><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['othertotal']->value);?>
</b></td>
            <td align="right"><b><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['mrtotal']->value);?>
</b></td>
            <td align="right"><b><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['due']->value);?>
</b></td>
        </tr>
    </table>
</div>
<?php }
}
