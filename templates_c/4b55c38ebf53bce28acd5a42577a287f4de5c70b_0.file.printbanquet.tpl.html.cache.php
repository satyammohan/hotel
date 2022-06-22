<?php
/* Smarty version 3.1.39, created on 2021-10-15 06:56:23
  from 'C:\xampp8\htdocs\hotel\templates\banquet\printbanquet.tpl.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_6168d8bfc3ba57_87395663',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4b55c38ebf53bce28acd5a42577a287f4de5c70b' => 
    array (
      0 => 'C:\\xampp8\\htdocs\\hotel\\templates\\banquet\\printbanquet.tpl.html',
      1 => 1634260369,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6168d8bfc3ba57_87395663 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp8\\htdocs\\Smarty-3\\libs\\plugins\\modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
$_smarty_tpl->compiled->nocache_hash = '1826048256168d8bfb55430_43264163';
?>
<div style="float:right;"><button class="print">Print</button></div>
<div class="print_content">
    <br><br>
    <style>
        .btable { width:90%; border:1px solid black !important; }
        .btable th { background-color: #cbcbcb; border:1px solid black; text-align:center; }
        .tdborder { border-top:1px solid black }
        @media print {
            body { -webkit-print-color-adjust: exact; }
        }
    </style>
    <table align="center" class="btable">
        <tr>
            <th colspan="6"><h3>Banquet Booking Bill</h3></th>
        </tr>
        <tr><td colspan="6">&nbsp;</td></tr>
        <tr>
            <td><b><?php echo $_SESSION['cname'];?>
</b>
                <br><b><?php echo $_SESSION['address'];?>
</b>
                <br>GSTIN:<b><?php echo $_SESSION['gstin'];?>
</b>
                <br>Email:<b><?php echo $_SESSION['email'];?>
</b>
                <br>Phone:<b><?php echo $_SESSION['phone'];?>
</b>
            </td>
            <td colspan="2">
                <b>Bill No. : </b>BAN/<?php echo $_smarty_tpl->tpl_vars['data']->value['bill'];?>
<br>
                <b>Date : </b><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['data']->value['date'],"%d-%m-%Y");?>
<br>
                <b>Ref No. : </b><?php echo $_smarty_tpl->tpl_vars['data']->value['no'];?>
<br>
            </td>
            <td colspan="3"><b>Billed to : </b><?php echo $_smarty_tpl->tpl_vars['data']->value['name'];?>
<br>
                <b>Address : </b><?php echo $_smarty_tpl->tpl_vars['data']->value['address'];?>
<br>
                <b>ID Proof : </b><?php echo $_smarty_tpl->tpl_vars['data']->value['proof'];?>
<br>
                <b>GSTIN : </b><?php if ($_smarty_tpl->tpl_vars['data']->value['gstin']) {
echo $_smarty_tpl->tpl_vars['data']->value['gstin'];
} else { ?>Not applicable<?php }?><br>
            </td>
        </tr>
        <tr><td colspan="6">&nbsp;</td></tr>
        <tr>
            <th width="52%"><b>Description</b></th>
            <th width="10%"><b>GST %</b></td>
            <th width="10%"><b>Amount</b></td>
            <th width="10%"><b>SGST Amt</b></td>
            <th width="10%"><b>CGST Amt</b></td>
            <th width="10%"><b>Net Amount</b></td>
        </tr>
        <tr><td colspan="6">&nbsp;</td></tr>
        <tr>
            <td><h4><?php echo $_smarty_tpl->tpl_vars['data']->value['room'];?>
 <?php if ($_smarty_tpl->tpl_vars['data']->value['kot']) {?> KOT : <?php echo $_smarty_tpl->tpl_vars['data']->value['kot'];
}?></h4>
                <h5>Persons : <?php echo $_smarty_tpl->tpl_vars['data']->value['persons'];?>
 Rate : <?php echo $_smarty_tpl->tpl_vars['data']->value['rate'];?>
 Total : <?php echo $_smarty_tpl->tpl_vars['data']->value['amount'];?>
<br></h5>
            </td>
        </tr>
        <tr>
            <td valign="top">
                Banquet Charges
            </td>
            <td valign="top" align="right" style=" padding-right: 20px;">
                <?php echo $_smarty_tpl->tpl_vars['data']->value['tax_per'];?>

            </td>
            <td valign="top" align="right" style=" padding-right: 20px;">
                <?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['data']->value['netamt']);?>

            </td>
            <td valign="top" align="right" style=" padding-right: 20px;">
                <?php echo sprintf("%.2f",($_smarty_tpl->tpl_vars['data']->value['gstamt']/2));?>

            </td>
            <td valign="top" align="right" style=" padding-right: 20px;">
                <?php echo sprintf("%.2f",($_smarty_tpl->tpl_vars['data']->value['gstamt']/2));?>

            </td>
            <td valign="top" align="right" style=" padding-right: 20px;">
                <?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['data']->value['total']);?>

            </td>
        </tr>
        <tr><td colspan="6">&nbsp;</td></tr>
        <tr height="100px"><td class="tdborder" colspan="6" ></td></tr>
        <tr class="tdborder">
            <th>Total</th>
            <th>&nbsp;</th>
            <th><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['data']->value['netamt']);?>
</th>
            <th><?php echo sprintf("%.2f",($_smarty_tpl->tpl_vars['data']->value['gstamt']/2));?>
</th>
            <th><?php echo sprintf("%.2f",($_smarty_tpl->tpl_vars['data']->value['gstamt']/2));?>
</th>
            <th><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['data']->value['total']);?>
</th>
        </tr>
        <tr>
            <td colspan="6" class="tdborder"><br><b>Rupees : </b><?php echo $_smarty_tpl->tpl_vars['data']->value['w'];?>
<br><br></td>
        </tr>
        <tr>
            <td class="tdborder" colspan="6"><br>
                <?php if ($_smarty_tpl->tpl_vars['mr']->value['total']) {?>
                    Total Amount Paid (<b>MR No. : <?php echo $_smarty_tpl->tpl_vars['mr']->value['nos'];?>
</b>) : <b><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['mr']->value['total']);?>
</b>
                <?php } else { ?>
                    No Payment received.
                <?php }?>
            </td>
        </tr>
        <tr>
            <td colspan="2"><h5><b>Total Due Amount : <?php echo sprintf("%.2f",($_smarty_tpl->tpl_vars['data']->value['total']-$_smarty_tpl->tpl_vars['mr']->value['total']));?>
</b></h5></td>
            <td colspan="4" align="right"><b>Signature : </b>____________________________</td>
        </tr>
        <tr>
            <td colspan="2"><font size="-2"><b>Created by : </b><?php echo $_smarty_tpl->tpl_vars['data']->value['username'];?>
 <b></b>Generated on : </b><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['data']->value['date_added'],"%d-%m-%Y %H:%M");?>
 <b>Printed on :</b> <?php echo smarty_modifier_date_format(time(),"%d-%m-%Y %H:%M");?>
</font></td>
            <td colspan="4" align="right"><b><?php echo $_SESSION['name'];?>
</b></td>
        </tr>
    </table>
</div><?php }
}
