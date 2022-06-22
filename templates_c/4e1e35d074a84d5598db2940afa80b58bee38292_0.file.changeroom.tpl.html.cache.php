<?php
/* Smarty version 3.1.39, created on 2021-09-03 07:57:59
  from 'C:\xampp8\htdocs\hotel\templates\reservation\changeroom.tpl.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_6131882fbb1db7_51746207',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4e1e35d074a84d5598db2940afa80b58bee38292' => 
    array (
      0 => 'C:\\xampp8\\htdocs\\hotel\\templates\\reservation\\changeroom.tpl.html',
      1 => 1630635713,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6131882fbb1db7_51746207 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '11192961916131882fb7b5b4_59294515';
?>

<h4>Change Rooms</h4>

<div>Name : <?php echo $_smarty_tpl->tpl_vars['guest']->value['name'];?>
</div>
<div>Address : <?php echo $_smarty_tpl->tpl_vars['guest']->value['address'];?>
</div>
<div>Days Stay : <?php echo $_smarty_tpl->tpl_vars['guest']->value['daysstay'];?>
</div>
<div>Rooms Alloted : <?php echo $_smarty_tpl->tpl_vars['guest']->value['roomnumber'];?>
</div>

<div class="row">
    <div class="col-6 card">
        <div class="card-body w-10">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rooms']->value, 'mod');
$_smarty_tpl->tpl_vars['mod']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['mod']->value) {
$_smarty_tpl->tpl_vars['mod']->do_else = false;
?>
                <?php if ((isset($_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['mod']->value['name']]))) {?>
                    <?php $_smarty_tpl->_assignInScope('bc', "btn-secondary");?>
                <?php } else { ?>
                    <?php $_smarty_tpl->_assignInScope('bc', "btn-primary");?>
                <?php }?>
                <a href="#" style="width: 60px;" onclick="selectthis(this, '<?php echo $_smarty_tpl->tpl_vars['mod']->value['name'];?>
');" class="btn <?php echo $_smarty_tpl->tpl_vars['bc']->value;?>
 m-3 p-4"><?php echo $_smarty_tpl->tpl_vars['mod']->value['name'];?>
</a>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </div>
    </div>
</div>
<form method="post" id="saverooms" action="index.php?module=reservation&func=savechangedroom">
    <input type="hidden" name="id" id="id" value="<?php echo $_REQUEST['id'];?>
">
    <input type="hidden" id="newid" name="newid" value="<?php echo $_smarty_tpl->tpl_vars['roomnumber']->value;?>
">
    <input class="btn btn-primary" type="text" onclick="saverooms();" value="Save">
</form>
<?php echo '<script'; ?>
>
    var sl = max = <?php echo count($_smarty_tpl->tpl_vars['data']->value);?>
;
    function selectthis(e, v) {
        if ($(e).hasClass('btn-secondary')) {
            nid = $("#newid").val();
            nid = nid.replace(v+",", "");
            $(e).addClass("btn-primary").removeClass('btn-secondary');
            sl -= 1;
            $("#newid").val(nid);
        } else {
            if (sl<max) {
                $(e).addClass('btn-secondary').removeClass("btn-primary");
                nid = $("#newid").val()+v+",";
                sl += 1;
                $("#newid").val(nid);
            } else {
                alert("You can select maximum "+max+" rooms.");
            }
        }
    }
    function saverooms() {
        if (sl==max) {
            $("#saverooms").submit();
        } else {
            alert("Please select "+max+" rooms.");
        }
    }
<?php echo '</script'; ?>
><?php }
}
