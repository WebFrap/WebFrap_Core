<?php
/*******************************************************************************
*
* @author      : Dominik Bonsch <dominik.bonsch@webfrap.net>
* @date        :
* @copyright   : Webfrap Developer Network <contact@webfrap.net>
* @project     : Webfrap Web Frame Application
* @projectUrl  : http://webfrap.net
*
* @licence     : BSD License see: LICENCE/BSD Licence.txt
*
* @version: @package_version@  Revision: @package_revision@
*
* Changes:
*
*******************************************************************************/

/**
 * @package WebFrap
 * @subpackage Taskplanner
 * @author Dominik Bonsch <dominik.bonsch@webfrap.net>
 * @copyright Webfrap Developer Network <contact@webfrap.net>
 */
class WebfrapSystem_Status_Maintab_View extends WgtMaintab
{
/*//////////////////////////////////////////////////////////////////////////////
// form export methodes
//////////////////////////////////////////////////////////////////////////////*/

  /**
   * @var WebfrapCache_Model
   */
  public $cacheModel = null;

  /**
   * @var WebfrapCache_ListMenu
   */
  public $cacheMenu = null;

  /**
   * @var WebfrapMaintenance_Metadata_Model
   */
  public $metadataModel = null;

  /**
   * @var WebfrapMaintenance_Metadata_List_Menu
   */
  public $metadataMenu = null;

  /**
   * @var array
   */
  public $contextData = array();

  /**
   * @var WebfrapMaintenance_Context_List_Menu
   */
  public $contextMenu = null;

  /**
   * @var string
   */
  public $overflowY = 'auto';

/*//////////////////////////////////////////////////////////////////////////////
// form export methodes
//////////////////////////////////////////////////////////////////////////////*/

 /**
  * @param TFlag $params
  */
  public function displayStats()
  {

    // fetch the i18n text for title, status and bookmark
    $i18nText = $this->i18n->l(
      'System Status',
      'wbf.label'
    );

    $this->cacheModel = $this->loadModel('WebfrapCache');
    $this->cacheModel->getCaches();
    $this->cacheMenu = new WebfrapCache_ListMenu();

    $this->metadataModel = $this->loadModel('WebfrapMaintenance_Metadata');
    $this->metadataModel->loadStats();
    $this->metadataMenu = new WebfrapMaintenance_Metadata_List_Menu();


    $this->contextMenu = new WebfrapMaintenance_Context_List_Menu();

    $session = $this->getSession();

    $data = $session->getContext();

    if (!$data){
      $this->contextData = array();
    } else {
      foreach ($data as $key => $value){
        $this->contextData[] = array('id'=>$key, 'value' => $value);
      }
    }


    // set the window title
    $this->setTitle($i18nText);

    // set the window status text
    $this->setLabel($i18nText);

    // set the from template
    $this->setTemplate('webfrap/system/status/maintab/system_stats', true);

    $this->addMenu();
    $this->addActions();

    // kein fehler aufgetreten
    return null;

  }//end public function displayList */

/*//////////////////////////////////////////////////////////////////////////////
// protocol for entities
//////////////////////////////////////////////////////////////////////////////*/

  /**
   * add a drop menu to the create window
   *
   * @param TFlag $params the named parameter object that was created in
   *   the controller
   * {
   *   string formId: the id of the form;
   * }
   */
  public function addMenu()
  {

    $i18n = $this->getI18n();

    $menu = $this->newMenu($this->id.'_dropmenu');
    $menu->content = <<<HTML

<div class="inline" >
  <button
    class="wcm wcm_control_dropmenu wgt-button"
    id="{$this->id}-control"
    wgt_drop_box="{$this->id}_dropmenu"  ><i class="icon-reorder" ></i> {$this->i18n->l('Menu','wbf.label')}</button>
  <var id="{$this->id}-control-cfg-dropmenu"  >{"triggerEvent":"mouseover","closeOnLeave":"true","align":"right"}</var>
</div>

<div class="wgt-dropdownbox" id="{$this->id}_dropmenu" >
  <ul>
    <li>
      <a class="wgtac_bookmark" ><i class="icon-bookmark" ></i> {$this->i18n->l('Bookmark', 'wbf.label')}</a>
    </li>
  </ul>
  <ul>
    <li>
      <a class="wgtac_close" ><i class="icon-remove" ></i> {$this->i18n->l('Close','wbf.label')}</a>
    </li>
  </ul>
</div>

<div class="wgt-panel-control" >
  <button
      class="wgt-button"
      onclick="\$R.get('modal.php?c=Webfrap.System_Status.phpInfo');"
      title="PHP Info" ><i class="icon-info-sign" ></i></button>
</div>

<div class="wgt-panel-control" >
  <button
      class="wgt-button"
      onclick="\$R.get('modal.php?c=Webfrap.System_Status.showEnv');"
      title="Server Env" ><i class="icon-info-sign" ></i></button>
</div>

<div class="wgt-panel-control" >
  <button
      class="wgt-button"
      onclick="\$R.get('modal.php?c=Webfrap.System_Status.showServer');"
      title="Server Data" ><i class="icon-info-sign" ></i></button>
</div>

<div class="wgt-panel-control" >
  <button
      class="wgt-button"
      onclick="\$R.get('maintab.php?c=Maintenance.DbConsistency.table');"
      title="Refresh" ><i class="icon-cog" ></i> Consistency</button>
</div>


<div class="wgt-panel-control" >
  <button
      class="wcm wcm_ui_button wgtac_refresh wcm_ui_tip-top"
      title="Refresh" ><i class="icon-refresh" ></i> {$this->i18n->l('Refresh','wbf.label')}</button>
</div>


HTML;

  }//end public function addMenu */

  /**
   * this method is for adding the buttons in a create window
   * per default there is only one button added: save with the action
   * to save the window onclick
   *
   * @param TFlag $params the named parameter object that was created in
   *   the controller
   * {
   *   string formId: the id of the form;
   * }
   */
  public function addActions()
  {

    // add the button actions for create in the window
    // the code will be binded direct on a window object and is removed
    // on close
    // all buttons with the class save will call that action
    $code = <<<BUTTONJS

self.getObject().find(".wgtac_refresh").click(function() {
  self.close();
  \$R.get('maintab.php?c=Webfrap.System_Status.stats');
});

// close tab
self.getObject().find(".wgtac_close").click(function() {
  self.close();
});

BUTTONJS;

    $this->addJsCode($code);

  }//end public function addActions */

}//end class Webfrap_TaskPlanner_List_Maintab_View

