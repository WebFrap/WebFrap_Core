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
class WebfrapImport_Maintab_Menu extends WgtDropmenu
{
/*//////////////////////////////////////////////////////////////////////////////
// Methoden
//////////////////////////////////////////////////////////////////////////////*/

  /**
   * add a drop menu to the create window
   *
   * @param TFlowFlag $params the named parameter object that was created in
   *   the controller
   * {
   *   string formId: the id of the form;
   * }
   */
  public function buildMenu($params)
  {

    $iconMenu      = '<i class="icon-reorder" ></i>';
    $iconClose     = $this->view->icon('control/close_tab.png'     ,'Close');

    $entries = new TArray();
    //$entries->support  = $this->entriesSupport($params);

    $this->content = <<<HTML

  <div class="inline" >
    <button
      class="wcm wcm_widget_dropmenu wgt-button"
      id="{$this->id}-control"
      wgt_drop_box="{$this->id}"  ><i class="icon-reorder" ></i> {$this->view->i18n->l('Menu','wbf.label')}</button>
  </div>

  <div class="wgt-dropdownbox" id="{$this->id}" >
    <ul>
      <li>
        <a class="wgtac_bookmark" ><i class="icon-bookmark" ></i> {$this->view->i18n->l('Bookmark','wbf.label')}</a>
      </li>
    </ul>
    <ul>
{$entries->support}
{$entries->report}
    </ul>
    <ul>
      <li>
        <a class="wgtac_close" ><i class="icon-remove-circle" ></i> {$this->view->i18n->l('Close','wbf.label')}</a>
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

    $iconSupport   = $this->view->icon('control/support.png'  ,'Support');
    $iconBug       = $this->view->icon('control/bug.png'      ,'Bug');
    $iconFaq       = $this->view->icon('control/faq.png'      ,'Faq');
    $iconHelp      = $this->view->icon('control/help.png'     ,'Help');


    $html = <<<HTML

      <li>
        <a class="deeplink" ><i class="icon-question-sign" ></i> Support</a>
        <span>
          <ul>
            <li><a class="wcm wcm_req_ajax" href="modal.php?c=_Maintenance.help&amp;context=menu" >{$iconHelp} Help</a></li>
            <li><a class="wcm wcm_req_ajax" href="modal.php?c=Wbfsys.Faq.create&amp;context=menu" >{$iconFaq} Faq</a></li>
          </ul>
        </span>
      </li>

HTML;

    return $html;

  }//end public function entriesSupport */

}//end class AdminBase_Maintab_Menu

