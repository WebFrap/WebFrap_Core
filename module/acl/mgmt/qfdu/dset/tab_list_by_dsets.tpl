 <form
  method="get"
  accept-charset="utf-8"
  id="<?php echo $VAR->searchFormId?>"
  action="<?php echo $VAR->searchFormAction?>" ></form>

<form
  method="post"
  accept-charset="utf-8"
  id="<?php echo $VAR->formIdAppend?>"
  action="<?php echo $VAR->formActionAppend?>" ></form>

<input
  type="text"
  id="wgt-input-<?php echo $VAR->domain->aclDomainKey ?>-acl-tdset-id_area"
  name="group_users[id_area]"
  value="<?php echo $VAR->areaId?>"
  class="meta asgd-<?php echo $VAR->formIdAppend?>"
/>

<!-- Assignment Panel -->
<div class="wgt-panel" style="margin-left:5px;" >
  <button
    class="wgt-button"
    id="wgt-button-<?php echo $VAR->domain->aclDomainKey ?>-acl-tdset-append"
    onclick="$R.form('wgt-form-<?php
      echo $VAR->domain->aclDomainKey ?>-acl-tdset-append');$UI.form.reset('wgt-form-<?php
      echo $VAR->domain->aclDomainKey ?>-acl-tdset-append');return false;" >
    <i class="icon-link " ></i> Append
  </button>

  <button
    class="wgt-button"
    id="wgt-button-<?php echo $VAR->domain->aclDomainKey ?>-acl-tdset-reload"
    onclick="$R.get('ajax.php?c=Acl.Mgmt_Qfdu.tabUsers&area_id=<?php
      echo $VAR->areaId ?>&dkey=<?php
      echo $VAR->domain->domainName ?>&tabid=wgt_tab-<?php
      echo $VAR->domain->aclDomainKey ?>_acl_listing_tab_<?php
      echo $VAR->domain->aclDomainKey ?>-acl_qfd_users');return false;" >
    <i class="icon-refresh" ></i> Reload
  </button>
</div>

<section class="wgt-content_box form" >
  <div class="content" >
    <fieldset>

      <div class="left n-cols-2" >
        <!-- <?php echo $VAR->domain->label ?> Entity -->
        <div class="wgt-box input"  >

          <div class="wgt-label" >
            <label
              class="wgt-label"
              for="wgt-input-<?php echo $VAR->domain->aclDomainKey ?>-acl-tdset-vid"
            ><?php echo $VAR->domain->label ?></label>
          </div>

          <div class="wgt-input" >
            <input
              type="text"
              id="wgt-input-<?php echo $VAR->domain->aclDomainKey ?>-acl-tdset-vid-tostring"
              title="Just type in the namen of the <?php echo $VAR->domain->label ?>, or klick on search for an extended search"
              name="key"
              class="medium wcm wcm_ui_autocomplete wgt-ignore wcm_ui_tip"
            />
            <var class="wgt-settings" >{
                "url":"ajax.php?c=Acl.Mgmt_Qfdu.loadEntity&amp;dkey=<?php echo $VAR->domain->domainName ?>&amp;area_id=<?php echo $VAR->areaId ?>&amp;key=",
                "type":"entity"
              }</var>
            <input
              type="text"
              id="wgt-input-<?php echo $VAR->domain->aclDomainKey ?>-acl-tdset-vid"
              name="group_users[vid]"
              class="meta valid_required asgd-<?php echo $VAR->formIdAppend?>"
            />
            <button
              id="wgt-input-<?php echo $VAR->domain->aclDomainKey ?>-acl-tdset-vid-append"
              class="wgt-button append"
              onclick="$R.get('modal.php?c=<?php echo $VAR->domain->domainUrl ?>.selection&input=<?php echo $VAR->domain->aclDomainKey ?>-acl-tdset-vid');return false;"
             >
              <i class="icon-search" ></i>
            </button>
          </div>
          <div class="wgt-clear tiny" >&nbsp;</div>
        </div>

        <!-- user input -->
        <div class="wgt-box input" >

          <div class="wgt-label" >
            <label
              class="wgt-label"
              for="wgt-input-<?php echo $VAR->domain->aclDomainKey ?>-acl-tdset-id_user"
            ><?php echo $I18N->l( 'User', 'wbf.label' ); ?></label>
          </div>

          <div class="wgt-input" >
            <input
              type="text"
              id="wgt-input-<?php echo $VAR->domain->aclDomainKey ?>-acl-tdset-id_user-tostring"
              name="key"
              title="Just type in the namen of the user, or klick on search for an extended search"
              class="medium wcm wcm_ui_autocomplete wgt-ignore wcm_ui_tip"  />
            <var class="wgt-settings" >{
                "url":"ajax.php?c=Acl.Mgmt_Qfdu.loadUsers&amp;dkey=<?php echo $VAR->domain->domainName ?>&amp;area_id=<?php
                  echo $VAR->areaId
                 ?>&amp;key=",
                "type":"entity"
              }</var>
            <input
              type="text"
              id="wgt-input-<?php echo $VAR->domain->aclDomainKey ?>-acl-tdset-id_user"
              name="group_users[id_user]"
              class="meta valid_required asgd-<?php echo $VAR->formIdAppend?>"  />
            <button
              id="wgt-button-<?php echo $VAR->domain->aclDomainKey ?>-acl-advanced_search"
              class="wgt-button append"
              onclick="$R.get('modal.php?c=Wbfsys.RoleUser.selection&input=<?php echo $VAR->domain->aclDomainKey ?>-acl-tdset-id_user');return false;"    >
              <i class="icon-search" ></i>
            </button>
          </div>
          <div class="wgt-clear tiny" >&nbsp;</div>
        </div>
      </div>

      <div class="inline n-cols-2" >

        <!-- group input -->
        <div class="wgt-box input" >
          <div class="wgt-label" >
            <label
              class="wgt-label"
              for="<?php echo $ELEMENT->selectboxGroups->id ?>"
            ><?php echo $I18N->l( 'Group', 'wbf.label' ); ?></label>
          </div>
          <div class="wgt-input medium" >
            <?php echo $ELEMENT->selectboxGroups->niceElement() ?>
          </div>
          <div class="wgt-clear tiny" >&nbsp;</div>
        </div>


        <!-- Assign wgt-box input -->
        <div class="wgt-box input aligned" >

         <div class="wgt-input medium checkbox" >
          <input
            type="checkbox"
            class="asgd-<?php echo $VAR->formIdAppend?>"
            id="wgt-input-<?php echo $VAR->domain->aclDomainKey ?>-acl-tdset-flagfull"
            name="assign_full"
            />
          </div>
          <div class="wgt-label" >
            <label
              class="wgt-label"
              for="wgt-input-<?php echo $VAR->domain->aclDomainKey ?>-acl-tdset-flagfull"
            ><?php echo $I18N->l( 'Assign Full', 'wbf.label') ?></label>
          </div>
          <div class="wgt-clear tiny" >&nbsp;</div>
        </div>

      </div>

    </fieldset>
  </div>
</section>

<div class="wgt-clear small" >&nbsp;</div>

<div class="left" style="width:100%" >

<?php echo $ELEMENT->listingQualifiedUsers ?>

</div>

<script type="application/javascript">

<?php foreach( $this->jsItems as $jsItem ){ ?>
  <?php echo $ELEMENT->$jsItem->jsCode?>
<?php } ?>
</script>

