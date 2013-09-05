<?php 

$crudForm = new WgtFormBuilder(
  $this,
  $VAR->formActionCrud,
  $VAR->formIdCrud,
  'post'
);
$crudForm->form();

?>

<form
  method="get"
  accept-charset="utf-8"
  id="<?php echo $VAR->searchFormId?>"
  action="<?php echo $VAR->searchFormAction?>" ></form>
  
<input
  type="hidden"
  id="wgt-input-<?php echo $VAR->domain->aclDomainKey ?>-acl-qfdu-id_area"
  name="path[id_area]"
  value="<?php echo $VAR->areaId?>"
  class="meta asgd-<?php echo $VAR->formIdCrud?>"
/>

  
<!-- Assignment Panel -->
<div class="wgt-panel" style="margin-left:5px;"  >
  <button
    class="wgt-button"
    id="wgt-button-<?php echo $VAR->domain->aclDomainKey ?>-backpath-crud"
    onclick="$R.form('wgt-form-<?php
      echo $VAR->domain->aclDomainKey ?>-backpath-crud');$UI.form.reset('wgt-form-<?php
      echo $VAR->domain->aclDomainKey ?>-backpath-crud');return false;" >
    <i class="icon-save " ></i> Save
  </button>

  <button
    class="wgt-button"
    id="wgt-button-<?php echo $VAR->domain->aclDomainKey ?>-acl-backpath-reload"
    onclick="$R.get('ajax.php?c=Acl.Mgmt_Backpath.openTab&area_id=<?php
      echo $VAR->areaId ?>&dkey=<?php
      echo $VAR->domain->domainName ?>&tabid=wgt_tab-<?php
      echo $VAR->domain->domainName ?>_acl_listing-<?php
      echo $VAR->domain->aclDomainKey ?>-acl-content-backpath');return false;" >
    <i class="icon-refresh" ></i> Reload
  </button>
</div>

<!-- formular -->
<div class="left bw71 wgt-space" >

  <div class="left bw4" >
    <?php $crudForm->autocomplete(
      'Target Area', 
      'path[id_target_area]',
      null,
      'ajax.php?c=Acl.Mgmt_Backpath.autoArea&amp;area_id='.$VAR->areaId.'&amp;dkey='.$VAR->domain->domainName.'&amp;key=',
      array(),
      array('size'=>'large')
    ); ?>
    <?php  $crudForm->autocomplete(
      'Ref Field',
      'path[ref_field]',
      null,
      'ajax.php?c=Acl.Mgmt_Backpath.autoArea&amp;area_id='.$VAR->areaId.'&amp;dkey='.$VAR->domain->domainName.'&amp;key=',
      array(),
      array('size'=>'large','entityMode'=>true)
    ); ?>
  </div>

  <div class="inline bw3" >
    <?php $crudForm->textarea(
        'Groups',
        'path[groups]',
        null,
        array(),
        array('size'=>'large','entityMode'=>true)
      );
    ?>
  </div>

  <div class="wgt-clear small" >&nbsp;</div>

</div>

<div class="full" style="width:100%;" >
  <?php echo $ELEMENT->listingBackpath ?>
</div>

<div class="wgt-clear xxsmall" ></div>



<script>

<?php foreach( $this->jsItems as $jsItem ){ ?>
  <?php echo $ELEMENT->$jsItem->jsCode?>
<?php } ?>
</script>
