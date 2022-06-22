<?php
/* Smarty version 3.1.39, created on 2021-10-16 07:54:53
  from 'C:\xampp8\htdocs\hotel\templates\reservation\printmr.tpl.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_616a37f55c1533_98483379',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a8d0b04fae67a538681170b77c88ba6ff8b42d8a' => 
    array (
      0 => 'C:\\xampp8\\htdocs\\hotel\\templates\\reservation\\printmr.tpl.html',
      1 => 1630646412,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_616a37f55c1533_98483379 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp8\\htdocs\\Smarty-3\\libs\\plugins\\modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
$_smarty_tpl->compiled->nocache_hash = '62535960616a37f5588fb0_68915423';
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
            <th colspan="2"><h3>Money Receipt</h3></th>
        </tr>
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
            <td><b>MR No. : </b><?php echo $_smarty_tpl->tpl_vars['data']->value['no'];?>

                <br><b>Date : </b><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['data']->value['date'],"%d-%m-%Y");?>
                
            </td>
        </tr>
        <tr><td class="tdborder" colspan="2"></td></tr>
        <tr>
            <td colspan="2"><b>Received from : </b><?php echo $_smarty_tpl->tpl_vars['data']->value['name'];?>

                <br><b>Address : </b><?php echo $_smarty_tpl->tpl_vars['data']->value['address'];?>

                <br><b>Phone/Email : </b><?php echo $_smarty_tpl->tpl_vars['data']->value['phone'];?>
 <?php echo $_smarty_tpl->tpl_vars['data']->value['email'];?>

            </td>
        </tr>
        <tr>
            <th width="70%" ><b>Description</b></th>
            <th><b>Amount</b></td>
        </tr>
        <tr style="height:300px">
            <td valign="top">
                <br><?php echo $_smarty_tpl->tpl_vars['data']->value['remark'];?>
<br> for room number <?php echo $_smarty_tpl->tpl_vars['data']->value['roomnumber'];?>
.<br>
                Mode : <?php if ($_smarty_tpl->tpl_vars['data']->value['type'] == 1) {?>Cash Received<?php }?>
                <?php if ($_smarty_tpl->tpl_vars['data']->value['type'] == 2) {?>Credit Card Payment<?php }?>
                <?php if ($_smarty_tpl->tpl_vars['data']->value['type'] == 3) {?>Cheque Payment<?php }?>
                <?php if ($_smarty_tpl->tpl_vars['data']->value['type'] == 4) {?>Wallet Payment <br>
                    <b>UPI :</b> <?php echo $_smarty_tpl->tpl_vars['data']->value['upitype'];?>
<br>
                    <b>Paid to :</b> <?php echo $_smarty_tpl->tpl_vars['data']->value['paidto'];?>
</b>
                <?php }?>
            </td>
            <td valign="top" align="right" style=" padding-right: 20px;"><br><?php echo $_smarty_tpl->tpl_vars['data']->value['amount'];?>
</td>
        </tr>
        <tr>
            <td colspan="2" class="tdborder"><b>Rupees : </b><?php echo $_smarty_tpl->tpl_vars['data']->value['w'];?>
</td>
        </tr>
        <tr>
            <td colspan="2" align="right"><b>Signature : </b>_______________________</td>
        </tr>
        <tr>
            <td><font size="-2"><b>Created by : </b><?php echo $_smarty_tpl->tpl_vars['data']->value['username'];?>
 <b></b>Generated on : </b><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['data']->value['date_added'],"%d-%m-%Y %H:%M");?>
 <b>Printed on :</b> <?php echo smarty_modifier_date_format(time(),"%d-%m-%Y %H:%M");?>
</font></td>
            <td align="right"><b><?php echo $_SESSION['name'];?>
</b></td>
        </tr>
    </table>
</div><?php }
}
