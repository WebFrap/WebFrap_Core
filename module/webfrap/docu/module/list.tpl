<h2>Module List</h2>

<p>
Hier findest du eine Liste aller Module die im System installiert sind.<br />
Klicke auf die den Namen um weiterführende Informationen zum Module zu erhalten.
</p>

<table class="wgt-table bw8" >
  <thead>
    <tr>
      <th style="width:50px;" class="pos" >Pos.</th>
      <th style="width:150px;" >Name</th>
      <th style="width:120px;" >Key</th>
      <th style="width:450px;" >Short Desc</th>
    </tr>
  </thead>
  <tbody>
<?php $pos = 1; foreach($this->model->list as $entry){ ?>
    <tr>
      <td class="pos" ><?php echo $pos ?></td>
      <td><a
        href="maintab.php?c=Webfrap.DocuModule.entry&amp;key=<?php echo $entry['access_key'] ?>"
        class="wcm wcm_req_ajax" ><?php echo $entry['name'] ?></a>
      </td>
      <td><a
        href="maintab.php?c=Webfrap.DocuModule.entry&amp;key=<?php echo $entry['access_key'] ?>"
        class="wcm wcm_req_ajax" ><?php echo $entry['access_key'] ?></a>
      </td>
      <td><?php echo $entry['description'] ?></td>
    </tr>
<?php ++$pos; } ?>
  </tbody>
</table>