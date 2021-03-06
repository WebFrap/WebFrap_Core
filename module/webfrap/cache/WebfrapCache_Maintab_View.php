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
class WebfrapCache_Maintab_View extends WgtMaintabCustom
{

  public $cacheDirs = array();

/*//////////////////////////////////////////////////////////////////////////////
// form export methodes
//////////////////////////////////////////////////////////////////////////////*/

 /**
  * @param TFlag $params
  */
  public function displayStats($params)
  {

    // fetch the i18n text for title, status and bookmark
    $i18nText = $this->i18n->l(
      'Cache Statistics',
      'wbf.label'
    );

    // set the window title
    $this->setTitle($i18nText);

    // set the window status text
    $this->setLabel($i18nText);

    $this->cacheDirs = $this->model->getCaches();

    // set the from template
    $this->setTemplate('webfrap/cache/stats', true);

    $this->addMenu($params);
    $this->addActions($params);

    // kein fehler aufgetreten
    return null;

  }//end public function displayStats */

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
    $iconClose = '<i class="icon-remove " ></i>';
    $iconEdit = '<i class="icon-edit" ></i>';

    $iconRefresh = '<i class="icon-refresh" ></i>';

    $menu = $this->newMenu($this->id.'_dropmenu');
    $menu->content = <<<HTML

<div class="inline" >
  <button
    class="wcm wcm_control_dropmenu wgt-button"
    id="{$this->id}-control"
    wgt_drop_box="{$this->id}_dropmenu"  ><i class="icon-reorder" ></i> {$this->i18n->l('Menu','wbf.label')} <i class="icon-chevron-down" ></i></button>
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
      <a class="deeplink" ><i class="icon-question-sign" ></i> {$this->i18n->l('Support', 'wbf.label')}</a>
      <span>
      <ul>
        <li><a class="wcm wcm_req_ajax" href="modal.php?c=Wbfsys.Faq.create&amp;context=menu" ><i class="icon-question" ></i> {$this->i18n->l('Faq', 'wbf.label')}</a></li>
      </ul>
      </span>
    </li>
    <li>
      <a class="wgtac_close" ><i class="icon-remove" ></i> {$this->i18n->l('Close','wbf.label')}</a>
    </li>
  </ul>
</div>

<div class="wgt-panel-control" >
  <button
      class="wcm wcm_ui_button wgtac_refresh wcm_ui_tip-top"
      title="Refresh view" ><i class="icon-refresh" ></i> {$this->i18n->l('Refresh','wbf.label')}</button>
</div>

<div class="wgt-panel-control" >
  <button
      class="wcm wcm_ui_button wgtac_clean_cache wcm_ui_tip-top"
      title="Clean the full cache" ><i class="icon-eraser" ></i> {$this->i18n->l('Clean all','wbf.label')}</button>
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
  public function addActions($params)
  {

    // add the button actions for create in the window
    // the code will be binded direct on a window object and is removed
    // on close
    // all buttons with the class save will call that action
    $code = <<<BUTTONJS

self.getObject().find(".wgtac_clean_cache").click(function() {
  \$R.del('ajax.php?c=Webfrap.Cache.cleanAll');
});

self.getObject().find(".wgtac_refresh").click(function() {
  self.close();
  \$R.get('maintab.php?c=Webfrap.Cache.stats');
});

// close tab
self.getObject().find(".wgtac_close").click(function() {
  self.close();
});

BUTTONJS;

    $this->addJsCode($code);

  }//end public function addActions */

  /**
   *
   * Enter description here ...
   * @param unknown_type $cDir
   */
  protected function renderDisplay($cDir)
  {

    $code = array();

    if (isset($cDir->display)) {
      foreach ($cDir->display as $action) {
        switch ($action) {
          case 'created':
          {
            $code[] = "Updated: ".SFilesystem::timeChanged(PATH_GW.'cache/'.$cDir->dir);
            break;
          }
          case 'size':
          {
            $code[] = "Size: ".SFilesystem::getFolderSize(PATH_GW.'cache/'.$cDir->dir);
            break;
          }
          case 'num_files':
          {
            $code[] = "Files: ".SFilesystem::countFiles(PATH_GW.'cache/'.$cDir->dir);
            break;
          }
        }
      }
    }

    return implode('<br />', $code);
  }

  /**
   * @param unknown_type $cDir
   */
  protected function renderActions($cDir)
  {

    $code = array();

    if (isset($cDir->actions)) {
      foreach ($cDir->actions as $action) {
        switch ($action->type) {
          case 'request':
          {
            $code[] = <<<CODE

<button
  class="wgt-button"
  onclick="\$R.{$action->method}('{$action->service}');" >{$action->label}</button>

CODE;
            break;
          }
        }
      }
    }

    return implode('<br />', $code);

  }//end renderActions */

}//end class MaintenanceCache_Maintab_View

