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
 * @subpackage Daidalos
 * @author Dominik Bonsch <dominik.bonsch@webfrap.net>
 * @copyright Webfrap Developer Network <contact@webfrap.net>
 */
class WebfrapEditor_Workspace_Maintab_View extends WgtMaintabCustom
{
/*//////////////////////////////////////////////////////////////////////////////
// Methoden
//////////////////////////////////////////////////////////////////////////////*/

  /**
   * @param string $nodeKey
   * @param int $containerId
   * @return void
   */
  public function displayWorkspace(  )
  {

    /* @var $model WebfrapKnowhowNode_Model */
    $model = $this->model;

    $this->setLabel("Wbf Workspace");
    $this->setTitle("Wbf Workspace");

    $this->setTemplate('webfrap/editor/maintab/workspace_tree');

    $this->addMenu();

  }//end public function displayForm */

  /**
   * add a drop menu to the create window
   *
   * @param TFlowFlag $params the named parameter object that was created in
   *   the controller
   * {
   *   string formId: the id of the form;
   * }
   */
  public function addMenu()
  {

    $iconMenu = '<i class="icon-reorder" ></i>';
    $iconClose = '<i class="icon-remove " ></i>';
    $iconSave = '<i class="icon-save" ></i>';
    $iconRefresh = '<i class="icon-refresh" ></i>';

    $iconSupport = $this->icon('control/support.png'  ,'Support');
    $iconBug = $this->icon('control/bug.png'      ,'Bug');
    $iconFaq = $this->icon('control/faq.png'      ,'Faq');
    $iconHelp = $this->icon('control/help.png'     ,'Help');

    $menu = $this->newMenu($this->id.'_dropmenu');

    $menu->id = $this->id.'_dropmenu';

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
      <a class="deeplink" ><i class="icon-question-sign" ></i> {$this->i18n->l('Support', 'wbf.label')}</a>
      <span>
      <ul>
        <li><a class="wcm wcm_req_ajax" href="modal.php?c=Wbfsys.Issue.create&amp;context=menu" >{$iconBug} {$this->i18n->l('Bug', 'wbf.label')}</a></li>
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
  <button class="wgt-button wgtac_refresh" ><i class="icon-refresh" ></i> {$this->i18n->l('Refresh','wbf.label')}</button>
</div>

HTML;

    $this->injectActions($menu);

  }//end public function addMenu */

  /**
   * just add the code for the edit ui controls
   *
   * @param int $objid die rowid des zu editierende Datensatzes
   * @param TFlag $params benamte parameter
   * {
   *   @param LibAclContainer access: der container mit den zugriffsrechten für
   *     die aktuelle maske
   *
   *   @param string formId: die html id der form zum ansprechen des update
   *     services
   * }
   */
  public function injectActions($menu)
  {

    // add the button action for save in the window
    // the code will be binded direct on a window object and is removed
    // on close
    // all buttons with the class save will call that action

    $code = <<<BUTTONJS

    self.getObject().find(".wgtac_close").click(function() {
      self.close();
    });

    self.getObject().find(".wgtac_refresh").click(function() {
      self.close();
      \$R.get('maintab.php?c=Webfrap.Editor.workspace');
    });


BUTTONJS;

    $this->addJsCode($code);

  }//end public function injectActions */

}//end class DaidalosBdlNodeProfile_Maintab_View

