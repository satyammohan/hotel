<?php
/* Smarty version 3.1.39, created on 2021-10-14 17:55:05
  from 'C:\xampp8\htdocs\hotel\templates\reservation\printroom.tpl.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_616821a1c3af11_74635982',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c76d9f624303ddf63049d68ec40afd548a1770af' => 
    array (
      0 => 'C:\\xampp8\\htdocs\\hotel\\templates\\reservation\\printroom.tpl.html',
      1 => 1630996978,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_616821a1c3af11_74635982 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp8\\htdocs\\Smarty-3\\libs\\plugins\\modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
$_smarty_tpl->compiled->nocache_hash = '613886718616821a1b65b96_86041746';
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
            <th colspan="6"><h3>Guest Booking Bill</h3></th>
        </tr>
        <tr>
            <td colspan="3"><b><?php echo $_SESSION['cname'];?>
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
            <td colspan="3">
                <b>Bill No. : </b><?php echo $_smarty_tpl->tpl_vars['data']->value['billno'];?>
<br>
                <b>Date : </b><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['data']->value['depature_date'],"%d-%m-%Y");?>
<br>
                <b>GRC No. : </b><?php echo $_smarty_tpl->tpl_vars['data']->value['grcno'];?>
<br>
                <b>Ref.No. : </b><?php echo $_smarty_tpl->tpl_vars['data']->value['no'];?>

            </td>
        </tr>
        <tr><td class="tdborder" colspan="6"></td></tr>
        <tr>
            <td colspan="1"><b>Billed to : </b><?php echo $_smarty_tpl->tpl_vars['data']->value['name'];?>
<br>
                <b>Address : </b><?php echo $_smarty_tpl->tpl_vars['data']->value['address'];?>
<br>
                <b>GSTIN : </b><?php if ($_smarty_tpl->tpl_vars['data']->value['gstin']) {
echo $_smarty_tpl->tpl_vars['data']->value['gstin'];
} else { ?>Not applicable<?php }?><br>
                <b>Phone/Email : </b><?php echo $_smarty_tpl->tpl_vars['data']->value['mobile'];?>
 <?php echo $_smarty_tpl->tpl_vars['data']->value['email'];?>
<br>
                <b>City : </b><?php echo $_smarty_tpl->tpl_vars['data']->value['city'];?>
  <b>District : </b><?php echo $_smarty_tpl->tpl_vars['data']->value['district'];?>
 <b>State : </b><?php echo $_smarty_tpl->tpl_vars['data']->value['state'];?>
<br>
                <b>Country : </b><?php echo $_smarty_tpl->tpl_vars['data']->value['country'];?>

            </td>
            <td colspan="3">
                <b>Booking Type : </b><?php echo $_smarty_tpl->tpl_vars['data']->value['type'];?>
<br>
                <b>Booking No : </b><?php echo $_smarty_tpl->tpl_vars['data']->value['booking_no'];?>
<br>
                <b>Refer : </b><?php echo $_smarty_tpl->tpl_vars['data']->value['refer'];?>
<br>
                <b>Arrived from : </b><?php echo $_smarty_tpl->tpl_vars['data']->value['arrivedfrom'];?>
<br>
                <b>ID Proof : </b><?php echo $_smarty_tpl->tpl_vars['data']->value['id_proof'];?>

            </td>
            <td colspan="2">
                <b>Purpose : </b><?php echo $_smarty_tpl->tpl_vars['data']->value['purpose'];?>
<br>
                <b>Others : </b><?php echo $_smarty_tpl->tpl_vars['data']->value['oname'];?>
<br>
                <b>Destination : </b><?php echo $_smarty_tpl->tpl_vars['data']->value['destination'];?>
<br>
                <b>Persons : </b><?php echo $_smarty_tpl->tpl_vars['data']->value['person'];?>
<br>
                <b>Adult : </b><?php echo $_smarty_tpl->tpl_vars['data']->value['adult'];?>
<br>
                <b>Childen : </b><?php echo $_smarty_tpl->tpl_vars['data']->value['child'];?>

            </td>
        </tr>
        <tr>
            <th width="52%"><b>Description</b></th>
            <th width="10%"><b>GST %</b></td>
            <th width="10%"><b>Amount</b></td>
            <th width="10%"><b>SGST Amt</b></td>
            <th width="10%"><b>CGST Amt</b></td>
            <th width="10%"><b>Net Amount</b></td>
        </tr>
        <tr>
            <td valign="top" colspan="6" >
                Rooms alloted : <?php echo $_smarty_tpl->tpl_vars['data']->value['roomnumber'];?>
   Rent Per day : <?php echo $_smarty_tpl->tpl_vars['data']->value['rentday'];?>
 for <?php echo $_smarty_tpl->tpl_vars['data']->value['daysstay'];?>
 days.<br>
                Check-in Date : <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['data']->value['date'],"%d-%m-%Y");?>
 <?php echo $_smarty_tpl->tpl_vars['data']->value['time'];?>
 Check-out Date : <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['data']->value['depature_date'],"%d-%m-%Y");?>
 <?php echo $_smarty_tpl->tpl_vars['data']->value['depature_time'];?>

                <br><br>
            </td>
        </tr>
        <?php if ($_smarty_tpl->tpl_vars['data']->value['json'][0]['total'] != 0) {?>
        <tr>
            <td valign="top">
                Room rent No GST 
            </td>
            <td valign="top" align="right" style=" padding-right: 20px;">
                0.00
            </td>
            <td valign="top" align="right" style=" padding-right: 20px;">
                <?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['data']->value['json'][0]['withtax']);?>

            </td>
            <td valign="top" align="right" style=" padding-right: 20px;">
                0.00
            </td>
            <td valign="top" align="right" style=" padding-right: 20px;">
                0.00
            </td>
            <td valign="top" align="right" style=" padding-right: 20px;">
                <?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['data']->value['json'][0]['total']);?>

            </td>
        </tr>
        <?php } else { ?>
            <tr><td colspan=6>&nbsp;</td></tr>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['data']->value['json'][12]['total'] != 0) {?>
        <tr>
            <td valign="top">
                Room rent 12% GST 
            </td>
            <td valign="top" align="right" style=" padding-right: 20px;">
                12.00
            </td>
            <td valign="top" align="right" style=" padding-right: 20px;">
                <?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['data']->value['json'][12]['withtax']);?>

            </td>
            <td valign="top" align="right" style=" padding-right: 20px;">
                <?php echo sprintf("%.2f",($_smarty_tpl->tpl_vars['data']->value['json'][12]['gstamt']/2));?>

            </td>
            <td valign="top" align="right" style=" padding-right: 20px;">
                <?php echo sprintf("%.2f",($_smarty_tpl->tpl_vars['data']->value['json'][12]['gstamt']/2));?>

            </td>
            <td valign="top" align="right" style=" padding-right: 20px;">
                <?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['data']->value['json'][12]['total']);?>

            </td>
        </tr>
        <?php } else { ?>
            <tr><td colspan=6>&nbsp;</td></tr>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['food']->value['famount'] != 0) {?>
        <tr>
            <td valign="top">
                Food Bill
            </td>
            <td valign="top" align="right" style=" padding-right: 20px;">
                <?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['food']->value['fgstpep']);?>

            </td>
            <td valign="top" align="right" style=" padding-right: 20px;">
                <?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['food']->value['fgoodsvalue']);?>

            </td>
            <td valign="top" align="right" style=" padding-right: 20px;">
                <?php echo sprintf("%.2f",($_smarty_tpl->tpl_vars['food']->value['fgstamount']/2));?>

            </td>
            <td valign="top" align="right" style=" padding-right: 20px;">
                <?php echo sprintf("%.2f",($_smarty_tpl->tpl_vars['food']->value['fgstamount']/2));?>

            </td>
            <td valign="top" align="right" style=" padding-right: 20px;">
                <?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['food']->value['famount']);?>

            </td>
        </tr>
        <?php } else { ?>
            <tr><td colspan=6>&nbsp;</td></tr>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['other']->value['oamount'] != 0) {?>
        <tr>
            <td valign="top">
                Other Bills<br>
            </td>
            <td valign="top" align="right" style=" padding-right: 20px;">
                <?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['other']->value['ogstpep']);?>

            </td>
            <td valign="top" align="right" style=" padding-right: 20px;">
                <?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['other']->value['ogoodsvalue']);?>

            </td>
            <td valign="top" align="right" style=" padding-right: 20px;">
                <?php echo sprintf("%.2f",($_smarty_tpl->tpl_vars['other']->value['ogstamount']/2));?>

            </td>
            <td valign="top" align="right" style=" padding-right: 20px;">
                <?php echo sprintf("%.2f",($_smarty_tpl->tpl_vars['other']->value['ogstamount']/2));?>

            </td>
            <td valign="top" align="right" style=" padding-right: 20px;">
                <?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['other']->value['oamount']);?>

            </td>
        </tr>
        <?php } else { ?>
            <tr><td colspan=6>&nbsp;</td></tr>
        <?php }?>
        <tr height="100px"><td class="tdborder" colspan="6" ></td></tr>
        <tr class="tdborder">
            <th>Total</th>
            <th>&nbsp;</th>
            <th><?php echo sprintf("%.2f",($_smarty_tpl->tpl_vars['data']->value['json'][0]['withtax']+$_smarty_tpl->tpl_vars['data']->value['json'][12]['withtax']+$_smarty_tpl->tpl_vars['other']->value['ogoodsvalue']+$_smarty_tpl->tpl_vars['food']->value['fgoodsvalue']));?>
</th>
            <th><?php echo sprintf("%.2f",(($_smarty_tpl->tpl_vars['data']->value['json'][12]['gstamt']/2)+($_smarty_tpl->tpl_vars['food']->value['fgstamount']/2)+($_smarty_tpl->tpl_vars['other']->value['ogstamount']/2)));?>
</th>
            <th><?php echo sprintf("%.2f",(($_smarty_tpl->tpl_vars['data']->value['json'][12]['gstamt']/2)+($_smarty_tpl->tpl_vars['food']->value['fgstamount']/2)+($_smarty_tpl->tpl_vars['other']->value['ogstamount']/2)));?>
</th>
            <th><?php echo sprintf("%.2f",($_smarty_tpl->tpl_vars['data']->value['total']+$_smarty_tpl->tpl_vars['other']->value['oamount']+$_smarty_tpl->tpl_vars['food']->value['famount']));?>
</th>
        </tr>
<!---
        <tr>
            <td colspan="6" class="tdborder"><b>Rupees : </b><?php echo $_smarty_tpl->tpl_vars['data']->value['w'];?>
</td>
        </tr>-->
        <tr>
            <td class="tdborder" colspan="6">
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
            <td colspan="2"><h5><b>Total Due Amount : <?php echo sprintf("%.2f",($_smarty_tpl->tpl_vars['data']->value['total']+$_smarty_tpl->tpl_vars['other']->value['oamount']+$_smarty_tpl->tpl_vars['food']->value['famount']-$_smarty_tpl->tpl_vars['mr']->value['total']));?>
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
</div>
<?php }
}
