<?php
/* Smarty version 3.1.39, created on 2021-09-03 07:32:45
  from 'C:\xampp8\htdocs\hotel\templates\rooms\listing.tpl.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_613182450ba9a8_79612736',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '31a012d4b0a687a2fc934b80475c43e3e0ac06ca' => 
    array (
      0 => 'C:\\xampp8\\htdocs\\hotel\\templates\\rooms\\listing.tpl.html',
      1 => 1630632821,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_613182450ba9a8_79612736 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp8\\htdocs\\Smarty-3\\libs\\plugins\\function.html_options.php','function'=>'smarty_function_html_options',),));
$_smarty_tpl->compiled->nocache_hash = '11318334016131824508f3c9_57354804';
?>
<h3>
    Rooms Master<hr>
</h3>
<table id="dataTable" class="table table-striped table-bordered" width="100%">
    <thead>    
        <tr>
            <th>#</th></th><th>Category</th><th>Room</th><th>Status</th><th><a class="btn btn-primary" href="index.php?module=rooms&func=edit" title="Add Room"><i class="fa fa-plus"></i></a></th>
        </tr>
    </thead>
    <tbody>
        <?php $_smarty_tpl->_assignInScope('s', 1);?>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rooms']->value, 'mod');
$_smarty_tpl->tpl_vars['mod']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['mod']->value) {
$_smarty_tpl->tpl_vars['mod']->do_else = false;
?>
        <tr>
            <td><?php echo $_smarty_tpl->tpl_vars['s']->value;?>
</td>			
            <?php $_smarty_tpl->_assignInScope('s', $_smarty_tpl->tpl_vars['s']->value+1);?>
            <td><?php echo $_smarty_tpl->tpl_vars['mod']->value['rtname'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['mod']->value['name'];?>
</td>
            <td>
                <?php if ($_smarty_tpl->tpl_vars['mod']->value['status'] == 3) {?>
                    Booked
                <?php } else { ?>
                    <select onchange="update_status('rooms', '<?php echo $_smarty_tpl->tpl_vars['mod']->value['id_rooms'];?>
', this.value, !this.value);">
                        <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['ini']->value['roomstatus'],'selected'=>$_smarty_tpl->tpl_vars['mod']->value['status']),$_smarty_tpl);?>

                    </select>
                <?php }?>
            </td>
            <td>
                <a class="btn btn-primary" href="index.php?module=rooms&func=edit&id=<?php echo $_smarty_tpl->tpl_vars['mod']->value['id_rooms'];?>
" title="Edit Room"><i class="fa fa-edit"></i></a>
                <a class="btn btn-primary" href="index.php?module=rooms&func=delete&id=<?php echo $_smarty_tpl->tpl_vars['mod']->value['id_rooms'];?>
" onclick="return confirm('Do you want to delete this Room?');" title="Delete Room"><i class="fa fa-trash"></i></a>
            </td>
        </tr>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </tbody>
</table><?php }
}
