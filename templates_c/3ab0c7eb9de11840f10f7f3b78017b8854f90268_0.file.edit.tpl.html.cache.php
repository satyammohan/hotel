<?php
/* Smarty version 3.1.39, created on 2021-10-14 17:47:09
  from 'C:\xampp8\htdocs\hotel\templates\banquet\edit.tpl.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_61681fc5371c15_75320597',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3ab0c7eb9de11840f10f7f3b78017b8854f90268' => 
    array (
      0 => 'C:\\xampp8\\htdocs\\hotel\\templates\\banquet\\edit.tpl.html',
      1 => 1634213766,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61681fc5371c15_75320597 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp8\\htdocs\\Smarty-3\\libs\\plugins\\modifier.date_format.php','function'=>'smarty_modifier_date_format',),1=>array('file'=>'C:\\xampp8\\htdocs\\Smarty-3\\libs\\plugins\\function.html_options.php','function'=>'smarty_function_html_options',),));
$_smarty_tpl->compiled->nocache_hash = '77078888361681fc5324091_11109565';
?>
<h3>
  <?php if ($_smarty_tpl->tpl_vars['data']->value['id_reservation']) {?>Edit<?php } else { ?>Add<?php }?> Banquet Bill<hr>
</h3>
<form method="post" action="index.php?module=banquet&func=<?php if ($_smarty_tpl->tpl_vars['data']->value['id_banquet']) {?>update<?php } else { ?>insert<?php }?>">
  <table class="table">
      <tr><td>Ref. No.:</td><td><input type="text" readonly name="t[no]" required value="<?php echo $_smarty_tpl->tpl_vars['data']->value['no'];?>
"/></td>
          <td>Bill No:</td><td><input type="text" <?php if ($_smarty_tpl->tpl_vars['data']->value['id_banquet']) {?> readonly <?php }?> id="bill" name="t[bill]" onblur="checkno();" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['bill'];?>
"/>
              <div id="nomsg"></div>
          </td>
          <td>Date:</td><td><input type="date" id="date" name="t[date]" value="<?php if ($_smarty_tpl->tpl_vars['data']->value['date']) {
echo $_smarty_tpl->tpl_vars['data']->value['date'];
} else {
echo smarty_modifier_date_format(time(),'%Y-%m-%d');
}?>"/></td></tr>
      <tr><td>Hall Detail:</td><td><input type="text" name="t[room]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['room'];?>
"/></td>
          <td>KOT:</td><td><input type="text" name="t[kot]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['kot'];?>
"/></td>
          
      <tr><td>Guest:</td><td><input name="t[name]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['name'];?>
"></td>
          <td>Address:</td><td><textarea name="t[address]" rows="4" cols="40"><?php echo $_smarty_tpl->tpl_vars['data']->value['address'];?>
</textarea></td>
          <td>ID Proof:<br>GSTIN:</td><td><input type="text" name="t[proof]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['proof'];?>
"/>
          <br><input type="text" name="t[gstin]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['gstin'];?>
"/></td></tr>

      <tr><td>Persons:</td><td><input type="number" id="persons" name="t[persons]" onblur="calamount()" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['persons'];?>
"/></td>
          <td>Rate:</td><td><input type="number" id="rate" name="t[rate]" onblur="calamount()" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['rate'];?>
"/></td>
          <td>Amount:</td><td><input type="text" readonly tabindex="-1" id="amount" name="t[amount]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['amount'];?>
"/></td></tr>

      <tr><td>Discount %:</td><td><input type="number" id="disc" name="t[disc]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['disc'];?>
" onblur="calamount()"/></td>
          <td>Discount Amount:</td><td><input type="number" id="discamt" name="t[discamt]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['discamt'];?>
" onblur="calamount()"/></td>
          <td>Net Amount:</td><td><input type="text" readonly tabindex="-1" id="net" name="t[netamt]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['netamt'];?>
"/></td>
      </tr>

      <tr><td>GST %:</td><td>
            <select id="id_taxmaster" name="room[id_taxmaster]" onchange="calamount()">
                <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['tax']->value,'selected'=>$_smarty_tpl->tpl_vars['data']->value['id_taxmaster']),$_smarty_tpl);?>

            </select><br>
            <input type="hidden" id="tax_per" name="t[tax_per]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['tax_per'];?>
"/>
          </td>
          <td>GST Amount:</td><td><input type="text" readonly id="gstamt" name="t[gstamt]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['gstamt'];?>
"/></td>
          <td>Total Payable :</td><td><input type="text" readonly tabindex="-1" id="total" name="t[total]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['total'];?>
"/></td>
      </tr>
      <tr><td>Remark:</td><td><textarea name="t[remark]" rows="4" cols="40"><?php echo $_smarty_tpl->tpl_vars['data']->value['remark'];?>
</textarea></td></tr>
      <tr>
          <td colspan="2">
              <input type="hidden" id="hide" name="id" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['id_banquet'];?>
">
              <input class="btn btn-primary" type="submit" value="Save" />
          </td>
      </tr>
  </table>
</form>
<?php echo '<script'; ?>
>
$("#date").focus();
function calamount() {
    var per = $("#persons").val();
    var rate = $("#rate").val();
    var amount = (per*rate).toFixed(2);
    $("#amount").val(amount);

    var amount = $("#amount").val();
    var disc = $("#disc").val() ? $("#disc").val() : 0;
    if (disc!=0) {
        var discamt = (amount * disc / 100).toFixed(2);
        $("#discamt").val(discamt);
    }
    var discamt = $("#discamt").val();
    var net = (amount*1 - discamt*1).toFixed(2);
    $("#net").val(net);

    var tp = $("#id_taxmaster :selected").text();
    $("#tax_per").val(tp);

    var net = $("#net").val() ? $("#net").val() : 0;
    var gstamt = (net * tp / 100).toFixed(2);
    $("#gstamt").val(gstamt);

    var total = (net*1 + gstamt*1).toFixed(2);
    $("#total").val(total);
}
function checkno() {
    var no = $("#bill").val();
    $("#nomsg").html('');
    $.post("index.php?module=banquet&func=checkno", { no:no }, function(data) {
        if (data==1) {
            $("#bill").focus();
            $("#nomsg").html("Duplicate No.");
        }
    });
}
<?php echo '</script'; ?>
>
<style>
input[type="text"]:read-only {
    cursor: normal;
    background-color:lightgrey;
    font-weight: 800;
}
</style><?php }
}
