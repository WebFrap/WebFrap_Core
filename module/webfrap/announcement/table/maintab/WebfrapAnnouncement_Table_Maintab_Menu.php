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
 * @copyright webfrap.net <contact@webfrap.net>
 */
class WebfrapAnnouncement_Table_Maintab_Menu extends WgtDropmenu
{
  /**
   * de:
   * zusammenbaue des dropmenüs für die maintab view
   *
   * @param TArray $params benamte parameter
   * {
   *   @param LibAclContainer access: der container mit den zugriffsrechten für
   *    die aktuelle maske
   * }
   */
  public function buildMenu($params)
  {

    // laden der mvc/utils adapter Objekte
    $acl = $this->getAcl();
    $view = $this->getView();


    $entries = new TArray();

    // prüfen ob der aktuelle benutzer überhaupt neue einträge anlegen darf
    if ($params->access->insert) {

      $entries->buttonInsert = <<<BUTTON

<div class="wgt-panel-control" >
  <button class="wcm wcm_ui_button wgtac_new" ><i class="icon-plus-sign" ></i> {$this->view->i18n->l('New','wbf.label')} <i class="icon-chevron-down" ></i></button>
</div>

BUTTON;

    }

    $this->content = <<<HTML

<div class="inline" >
  <button
    class="wcm wcm_control_dropmenu wgt-button"
    id="{$this->id}-control"
    wgt_drop_box="{$this->id}_dropmenu"  ><i class="icon-record" ></i> {$this->view->i18n->l('Menu','wbf.label')} <i class="icon-chevron-down" ></i></button>
  <var id="{$this->id}-control-cfg-dropmenu"  >{"triggerEvent":"mouseover","closeOnLeave":"true","align":"right"}</var>
</div>

<div class="wgt-dropdownbox" id="{$this->id}_dropmenu" >
  <ul>
    <li>
      <a class="wgtac_bookmark" ><i class="icon-bookmark" ></i> {$this->view->i18n->l('Bookmark', 'wbf.label')}</a>
    </li>
  </ul>
  <ul>
    <li>
      <a class="deeplink" ><i class="icon-question-sign" ></i> {$this->view->i18n->l('Support', 'wbf.label')}</a>
      <span>
      <ul>
        <li><a class="wcm wcm_req_ajax" href="modal.php?c=Wbfsys.Faq.create&amp;context=menu" ><i class="icon-question" ></i> {$this->view->i18n->l('Faq', 'wbf.label')}</a></li>
      </ul>
      </span>
    </li>
    <li>
      <a class="wgtac_close" ><i class="icon-remove" ></i> {$this->view->i18n->l('Close','wbf.label')}</a>
    </li>
  </ul>
</div>

{$entries->buttonInsert}

HTML;

  }//end public function buildMenu */

}//end class WbfsysAnnouncement_Table_Maintab_Menu

