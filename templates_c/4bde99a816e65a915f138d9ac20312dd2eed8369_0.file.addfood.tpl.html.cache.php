<?php
/* Smarty version 3.1.39, created on 2021-09-02 07:00:18
  from 'C:\xampp8\htdocs\hotel\templates\reservation\addfood.tpl.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_6130292a75a068_32200055',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4bde99a816e65a915f138d9ac20312dd2eed8369' => 
    array (
      0 => 'C:\\xampp8\\htdocs\\hotel\\templates\\reservation\\addfood.tpl.html',
      1 => 1630546113,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6130292a75a068_32200055 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp8\\htdocs\\Smarty-3\\libs\\plugins\\modifier.date_format.php','function'=>'smarty_modifier_date_format',),1=>array('file'=>'C:\\xampp8\\htdocs\\Smarty-3\\libs\\plugins\\function.html_options.php','function'=>'smarty_function_html_options',),));
$_smarty_tpl->compiled->nocache_hash = '20357814316130292a7456f7_44953345';
?>
<h4>Add Food Bill</h4>
<form method="post" action="index.php?module=reservation&func=savefood">
    <input type="hidden" name="food[id_reservation]" value="<?php echo $_REQUEST['id'];?>
">
    <table>
        <tr>
            <td>Date :</td><td><input type="date" name="food[date]" required class="form-control" value="<?php echo smarty_modifier_date_format(time(),'%Y-%m-%d');?>
" ></td>
        </tr>
        <tr>
            <td>No :</td>
            <td><input type="text" name="food[no]" id="no" required class="form-control" onblur="checkno();"/>
                <div id="nomsg"></div>
            </td>
        </tr>
        <tr>
            <td>Amount Before GST :</td><td><input type="text" id="goodsvalue" name="food[goodsvalue]" required class="form-control" onblur="getall()"></td>
        </tr>
        <tr>
            <td>GST % :</td><td><select id="id_taxmaster" name="food[id_taxmaster]" class="form-control" onblur="getall()">
                <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['tax']->value,'selected'=>2),$_smarty_tpl);?>

            </select>
            <div class="d-none">
                <input type="text" id="gstper" name="food[gstper]" required class="form-control">
            </div>
        </td>
        </tr>
        <tr>
            <td>GST Amount :</td><td><input type="text" id="gstamount" readonly="readonly" name="food[gstamount]" required class="form-control"></td>
        </tr>
        <tr>
            <td>Net Amount :</td><td><input type="text" id="amount" readonly="readonly" name="food[amount]" required class="form-control"></td>
        </tr>
        <tr>
            <td>Remarks :</td><td><textarea name="food[remark]" class="form-control" cols=60 rows=6></textarea></td>
        </tr>
        <tr>
            <td colspan="2" class="text-center"><input type="submit" value="Save" class="btn btn-primary"></td>
        </tr>
    </table>
</form>
<?php echo '<script'; ?>
>
    $(document).ready(function() {
        $("#no").focus();
    });
    function getall() {
        let bg = parseFloat($("#goodsvalue").val());
        let gstp = parseFloat($("#id_taxmaster option:selected").text());
        $("#gstper").val(gstp);

        let gstamt = (bg * gstp / 100).toFixed(2);
        $("#gstamount").val(gstamt);
        let amount = (bg*1 + gstamt*1).toFixed(2);
        $("#amount").val(amount);
    }
    function checkno() {
        var gno = $("#no").val();
        $("#nomsg").html('');
        $.post("index.php?module=reservation&func=checkno&type=food", { no:gno }, function(data) {
            if (data==1) {
                $("#no").focus();
                $("#nomsg").html("Duplicate No.");
            }
        });
    }
<?php echo '</script'; ?>
><?php }
}
