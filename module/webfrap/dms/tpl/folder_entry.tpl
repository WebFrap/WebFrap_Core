<tr class="folder" >
  <th><input type="checkbox" value="<?php echo $folder['rowid'] ?>" /></th>
  <td><i class="<?php echo isset($folder['folder_icon'])?$folder['folder_icon']:'icon-folder' ?>" ></i><?php echo $folder['name'] ?></td>
  <td>Status</td>
  <td><?php echo $I18N->date($folder['created']); ?></td>
  <td></td>
</tr>