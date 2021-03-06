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
 * @subpackage Core
 * @author Dominik Bonsch <dominik.bonsch@webfrap.net>
 * @copyright Webfrap Developer Network <contact@webfrap.net>
 */
class MaintenancePackages_Maintab_View extends WgtMaintabCustom
{

/*//////////////////////////////////////////////////////////////////////////////
// form export methodes
//////////////////////////////////////////////////////////////////////////////*/

 /**
  * @param TFlag $params
  */
  public function displayList($params)
  {

    // fetch the i18n text for title, status and bookmark
    $i18nText = $this->i18n->l
    (
      'Package Manager',
      'wbf.label'
    );

    // set the window title
    $this->setTitle($i18nText);

    // set the window status text
    $this->setLabel($i18nText);

    $this->addVar('caches', $this->model->getCaches());

    // set the from template
    $this->setTemplate('maintenance/packages/maintab/list_packages');

    $this->addMenu($params);
    $this->addActions($params);

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
  public function addMenu($params)
  {

    $i18n = $this->getI18n();

    $iconMenu = '<i class="icon-reorder" ></i>';
    $iconSupport = $this->icon('control/support.png'      ,'Support');
    $iconHelp = $this->icon('control/help.png'      ,'Help');
    $iconClose = '<i class="icon-remove " ></i>';
    $iconEdit = '<i class="icon-edit" ></i>';
    $iconBug = $this->icon('control/bug.png'      ,'Bug');

    $iconRefresh = '<i class="icon-refresh" ></i>';

    $menu = $this->newMenu($this->id.'_dropmenu');
    $menu->content = <<<HTML
<ul class="wcm wcm_ui_dropmenu wgt-dropmenu" id="{$this->id}_dropmenu" >
  <li class="wgt-root" >
    <button class="wcm wcm_ui_button" ><i class="icon-reorder" ></i> {$i18n->l('Menu','wbf.label')}</button>
    <ul style="margin-top:-10px;" >
      <li class="current" >
        <p><i class="icon-question-sign" ></i> {$i18n->l('Support','wbf.label')}</p>
        <ul>
          <li>
            <a class="wcm wcm_req_ajax" href="modal.php?c=Webfrap.Bug.create&amp;context=webfrap_docu-create" >
              {$iconBug} {$i18n->l('Bug','wbf.label')}
            </a>
          </li>
        </ul>
      </li>
      <li>
        <p class="wgtac_close" ><i class="icon-remove" ></i> {$i18n->l('Close','wbf.label')}</p>
      </li>
    </ul>
  </li>
  <li class="wgt-root" >
    <button
      class="wcm wcm_ui_button wgtac_clean_cache wcm_ui_tip-top"
      title="Clean the full cache" ><i class="icon-refresh" ></i> {$i18n->l('Refresh','wbf.label')}</button>
    <ul style="margin-top:-10px;" ></ul>
  </li>
</ul>
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
  public function addActions($params)
  {

    // add the button actions for create in the window
    // the code will be binded direct on a window object and is removed
    // on close
    // all buttons with the class save will call that action
    $code = <<<BUTTONJS

self.getObject().find(".wgtac_clean_cache").click(function() {
  \$R.delete('ajax.php?c=Maintenance.Cache.cleanAll');
});

// close tab
self.getObject().find(".wgtac_close").click(function() {
  self.close();
});

BUTTONJS;

    $this->addJsCode($code);

  }//end public function addActions */

}//end class MaintenanceCache_Maintab_View

