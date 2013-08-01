<h2>Entity List</h2>

<p>
Hier findest du eine Liste aller Entities die im System vorhanden sind.<br />
Klicke auf die den Namen um weiterführende Informationen zum Module zu erhalten.
</p>

<table class="wgt-table bw8" >
  <thead>
    <tr>
      <th style="width:50px;" class="pos" >Pos.</th>
      <th style="width:150px;" >Name</th>
      <th style="width:120px;" >Key</th>
      <th style="width:350px;" >Short Desc</th>
      <th style="width:70px;" ><i class="icon-list-ol " ></i> Attr</th>
      <th style="width:70px;" >Short Desc</th>
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