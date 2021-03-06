<?php

$crudForm = new WgtFormBuilder(
  $this,
  $VAR->formActionCrud,
  $VAR->formIdCrud,
  'put'
);

// print the crud form
$crudForm->form();

?>

<form
  method="get"
  accept-charset="utf-8"
  id="<?php echo $VAR->searchFormId?>"
  action="<?php echo $VAR->searchFormAction?>" ></form>

<input
  type="hidden"
  id="wgt-input-<?php echo $VAR->domain->aclDomainKey ?>-backpath-id_area"
  name="path[id_area]"
  value="<?php echo $VAR->areaId?>"
  class="meta asgd-<?php echo $VAR->formIdCrud?>"
/>


<!-- Assignment Panel -->
<div class="wgt-panel" style="margin-left:5px;"  >
  <button
    class="wgt-button"
    id="wgt-button-<?php echo $VAR->domain->aclDomainKey ?>-backpath-crud"
    onclick="$R.form('<?php echo $VAR->formIdCrud ?>');$UI.form.reset('<?php echo $VAR->formIdCrud ?>');return false;" >
    <i class="icon-save " ></i> Save Path</button>

  <button
    class="wgt-button"
    id="wgt-button-<?php echo $VAR->domain->aclDomainKey ?>-acl-backpath-reload"
    onclick="$R.get('ajax.php?c=Acl.Mgmt_Backpath.openTab&area_id=<?php
      echo $VAR->areaId ?>&dkey=<?php
      echo $VAR->domain->domainName ?>&tabid=wgt_tab-<?php
      echo $VAR->domain->domainName ?>_acl_listing-<?php
      echo $VAR->domain->aclDomainKey ?>-acl-content-backpath');return false;" >
    <i class="icon-refresh" ></i> Reload</button>
</div>


<section class="wgt-content_box form" id="wgt-box-<?php echo $VAR->domain->aclDomainKey ?>-backpath_crudform" >

  <input
    type="hidden"
    id="wgt-input-<?php echo $VAR->domain->aclDomainKey ?>-backpath-rowid"
    name="objid"
    value=""
    class="meta asgd-<?php echo $VAR->formIdCrud?>"
  />

  <div class="content" >
    <fieldset>

      <div class="left n-cols-2" >
        <?php $crudForm->autocomplete(
          'Target Area',
          'path,id_target_area',
          null,
          'ajax.php?c=Acl.Mgmt_Backpath.autoArea&amp;area_id='.$VAR->areaId.'&amp;dkey='.$VAR->domain->domainName.'&amp;key=',
          array(),
          array('size'=>'large','entityMode'=>true)
        ); ?>

       <?php  $crudForm->input(
          'Ref Field',
          'path,ref_field',
          null,
          array(),
          array('size'=>'large')
        ); ?>

        <?php  /* $crudForm->autocomplete(
          'Ref Field',
          'path[ref_field]',
          null,
          'ajax.php?c=Acl.Mgmt_Backpath.autoRefField&amp;area_id='.$VAR->areaId.'&amp;dkey='.$VAR->domain->domainName.'&amp;key=',
          array(),
          array('size'=>'large')
        ); */ ?>
      </div>

      <div class="inline n-cols-2" >
        <?php $crudForm->textarea(
            'Groups',
            'path,groups',
            null,
            array(),
            array('size'=>'large')
          );
        ?>
        <?php $crudForm->textarea(
            'Set Groups',
            'path,set_groups',
            null,
            array(),
            array('size'=>'large')
          );
        ?>
      </div>

    </fieldset>
  </div>
</section>

<div class="full" style="width:100%;" >
  <?php echo $ELEMENT->listingBackpath ?>
</div>

<div class="wgt-clear xxsmall" ></div>

<?php // check if this is still required ?>
<script>
<?php foreach( $this->jsItems as $jsItem ){ ?>
  <?php echo $ELEMENT->$jsItem->jsCode?>
<?php } ?>
</script>
