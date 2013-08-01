<h2>Module <?php echo $this->model->data->name ?></h2>


<div class="bw3 left" >
	<label>Name</label>
	<div><?php echo $this->model->data->name ?></div>
</div>
<div class="bw3 left" >
	<label>Key</label>
	<div><?php echo $this->model->data->access_key ?></div>
</div>


<div class="bw6 left" >
	<label>Description</label>
	<div><?php echo $this->model->data->description ?></div>
</div>

<div class="wgt-clear small" ></div>

<h3>Entities &amp; Managements</h3>
<table class="wgt-table bw8" >
  <thead>
    <tr>
      <th style="width:50px;" class="pos" >Pos.</th>
      <th style="width:150px;" >Name</th>
      <th style="width:120px;" >Key</th>
      <th style="width:60px;" >Rel</th>
      <th style="width:60px;" ><i class="icon-list-ol " ></i> A|M</th>
      <th style="width:450px;" >Short Desc</th>
      <th style="width:70px;" >Created</th>
    </tr>
  </thead>
  <tbody>
<?php $pos = 1; foreach($this->model->entityList as $entry){ ?>
    <tr>
      <td class="pos" ><?php echo $pos ?></td>
      <td><a
        href="maintab.php?c=Webfrap.DocuEntity.entry&amp;key=<?php echo $entry['access_key'] ?>"
        class="wcm wcm_req_ajax" ><?php echo $entry['name'] ?></a>
      </td>
      <td><a
        href="maintab.php?c=Webfrap.DocuEntity.entry&amp;key=<?php echo $entry['access_key'] ?>"
        class="wcm wcm_req_ajax" ><?php echo $entry['access_key'] ?></a>
      </td>
      <td><?php echo $entry['relevance'] ?></td>
      <td><?php echo $entry['num_attributes'] ?>|<?php echo $entry['num_mgmts'] ?></td>
      <td><?php echo $entry['short_desc'] ?></td>
      <td><?php echo date('Y-m-d', strtotime($entry['m_time_created'])) ?></td>
    </tr>
<?php ++$pos; } ?>
  </tbody>
</table>