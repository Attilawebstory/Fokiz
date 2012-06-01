<?php 

/*
 * This file is part of the Fokiz Content Management System 
 * <http://www.fokiz.com>
 * 
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/

require_once('../controllers/pages.php'); 

?>

<button class="right" onclick="modal.open('system/admin/views/page_editor.php?id=new',500);"><?php lang('Create New Page'); ?></button>

<h1><?php lang('Page Manager'); ?></h1>

<input type="hidden" id="cur_page" value="<?php echo($_SESSION['cur_page']); ?>" />
<input type="hidden" id="def_page" value="<?php echo($system->default_page); ?>" />

<table id="pages" class="adm_datatable">
    <thead>
        <tr>
            <th><?php lang('Title'); ?></th>
            <th><?php lang('Description'); ?></th>
            <th><?php lang('Keywords'); ?></th>
            <th><?php lang('Created'); ?></th>
            <th><?php lang('Modified'); ?></th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($list as $page){ ?>
        <tr valign="top" id="page_<?php echo($page['id']); ?>">
            <td><?php echo($page['title']); ?></td>
            <td><span class="adm_breakable"><?php echo($page['description']); ?></span></td>
            <td><span class="adm_breakable"><?php echo($page['keywords']); ?></span></td>
            <td><?php echo(formatTimestamp($page['created'])); ?></td>
            <td><?php echo(formatTimestamp($page['modified'])); ?></td>
            <td class="adm_datatable_center"><a href="<?php echo(BASE_URL . $page['url']); ?>"><?php lang('Go'); ?>&nbsp;&raquo;</a></td>
            <td class="adm_datatable_center"><a onclick="deletePage(<?php echo($page['id']); ?>);"><?php lang('Delete'); ?></a></td>
        </tr>
        <?php } ?>
    </tbody>
</table>
            

<button onclick="modal.hide();"><?php lang('Close'); ?></button>

<script>

    $(function(){
        datatable.init('pages');
    });
    
    function deletePage(id){
        if($('#cur_page').val()==id){
            alert('<?php lang('You are currently viewing this page. You must move to a different page first.'); ?>');
        }else if($('#def_page').val()==id){
            alert('<?php lang('The page selected is the website default and cannot be deleted.'); ?>');
        }else{
            var answer = confirm("<?php lang('Delete page permanantly?'); ?>");
            if(answer){
                $.get('system/admin/controllers/pages.php?del='+id);
                $('tr#page_'+id).remove();
            } 
        }
    }

</script>