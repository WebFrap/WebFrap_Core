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
 * @subpackage ModSync
 * @author Dominik Bonsch <dominik.bonsch@webfrap.net>
 * @copyright Webfrap Developer Network <contact@webfrap.net>
 */
class WebfrapMaintenance_Maintab_Menu extends WgtDropmenu
{
/*//////////////////////////////////////////////////////////////////////////////
// Methoden
//////////////////////////////////////////////////////////////////////////////*/

  /**
   *
   * Enter description here ...
   * @var unknown_type
   */
  public $crumbs = null;

  /**
   * build the window menu
   * @param TArray $params
   */
  public function buildMenu($params)
  {

    $iconMenu = '<i class="icon-reorder" ></i>';
    $iconClose = '<i class="icon-remove " ></i>';

    $entries = new TArray();

    $this->content = <<<HTML

  <div class="inline" >
    <button
      class="wcm wcm_control_dropmenu wgt-button"
      tabindex="-1"
      id="{$this->id}-control"
      wgt_drop_box="{$this->id}"  ><i class="icon-reorder" ></i> {$this->view->i18n->l('Menu','wbf.label')}</button>
      <var id="{$this->id}-control-cfg-dropmenu"  >{"triggerEvent":"click"}</var>
  </div>

  <div class="wgt-dropdownbox" id="{$this->id}" >
    <ul>
      <li>
        <a class="wgtac_close" ><i class="icon-remove" ></i> {$this->view->i18n->l('Close', 'wbf.label')}</a>
      </li>
    </ul>
  </div>

HTML;

    $this->content .= $this->crumbs;

  }//end public function buildMenu */


  /**
   * build the window menu
   * @param TArray $params
   */
  protected function entriesSupport($params)
  {

    $iconSupport = $this->view->icon('control/support.png'  ,'Support');
    $iconBug = $this->view->icon('control/bug.png'      ,'Bug');
    $iconFaq = $this->view->icon('control/faq.png'      ,'Faq');
    $iconHelp = $this->view->icon('control/help.png'     ,'Help');


    $html = <<<HTML

      <li>
        <p><i class="icon-question-sign" ></i> Support</p>
        <ul>
          <li><a class="wcm wcm_req_ajax" href="maintab.php?c=Webfrap.Base.help&refer=webfrap-maintenance-menu" >{$iconHelp} Help</a></li>
          <li><a class="wcm wcm_req_ajax" href="maintab.php?c=Wbfsys.Issue.create&refer=webfrap-maintenance-menu" >{$iconBug} Bug</a></li>
          <li><a class="wcm wcm_req_ajax" href="maintab.php?c=Webfrap.Faq.create&refer=webfrap-maintenance-menu" ><i class="icon-question" ></i> Faq</a></li>
        </ul>
      </li>

HTML;

    return $html;

  }//end public function entriesSupport */

}//end class WebfrapMaintenance_Maintab_Menu

