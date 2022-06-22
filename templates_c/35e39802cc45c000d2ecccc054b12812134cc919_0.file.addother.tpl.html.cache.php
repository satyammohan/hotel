<?php
/* Smarty version 3.1.39, created on 2021-09-02 06:59:48
  from 'C:\xampp8\htdocs\hotel\templates\reservation\addother.tpl.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_6130290c6d9fe7_32091272',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '35e39802cc45c000d2ecccc054b12812134cc919' => 
    array (
      0 => 'C:\\xampp8\\htdocs\\hotel\\templates\\reservation\\addother.tpl.html',
      1 => 1630546164,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6130290c6d9fe7_32091272 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp8\\htdocs\\Smarty-3\\libs\\plugins\\modifier.date_format.php','function'=>'smarty_modifier_date_format',),1=>array('file'=>'C:\\xampp8\\htdocs\\Smarty-3\\libs\\plugins\\function.html_options.php','function'=>'smarty_function_html_options',),));
$_smarty_tpl->compiled->nocache_hash = '17282350266130290c6beb36_12128940';
?>
<h4>Add Laundry/Other Bill</h4>
<form method="post" action="index.php?module=reservation&func=saveother">
    <input type="hidden" name="other[id_reservation]" value="<?php echo $_REQUEST['id'];?>
">
    <table>
        <tr>
            <td>Date :</td><td><input type="date" name="other[date]" required class="form-control" value="<?php echo smarty_modifier_date_format(time(),'%Y-%m-%d');?>
" ></td>
        </tr>
        <tr>
            <td>Ref.No :</td>
            <td>
                <input type="text" name="other[no]" id="no" required class="form-control" onblur="checkno();"/>
                <div id="nomsg"></div>
            </td>
        </tr>
        <tr>
            <td>Amount Before GST :</td><td><input type="text" id="goodsvalue" name="other[goodsvalue]" required class="form-control" onblur="getall()"></td>
        </tr>
        <tr>
            <td>GST % :</td><td><select id="id_taxmaster" name="other[id_taxmaster]" class="form-control" onblur="getall()">
                <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['tax']->value,'selected'=>4),$_smarty_tpl);?>

            </select>
            <div class="d-none">
                <input type="text" id="gstper" name="other[gstper]" required class="form-control">
            </div>
        </td>
        <tr>
            <td>GST Amount :</td><td><input type="text" id="gstamount" readonly="readonly" name="other[gstamount]" required class="form-control"></td>
        </tr>
        <tr>
            <td>Net Amount :</td><td><input type="text" id="amount" readonly="readonly" name="other[amount]" required class="form-control"></td>
        </tr>
        <tr>
            <td>Remarks :</td><td><textarea name="other[remark]" class="form-control" cols=60 rows=6></textarea></td>
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
        $.post("index.php?module=reservation&func=checkno&type=other", { no:gno }, function(data) {
            if (data==1) {
                $("#no").focus();
                $("#nomsg").html("Duplicate No.");
            }
        });
    }
<?php echo '</script'; ?>
>
<?php }
}
