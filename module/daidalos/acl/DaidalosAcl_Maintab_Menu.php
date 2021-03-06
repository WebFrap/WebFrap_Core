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
class DaidalosAcl_Maintab_Menu extends WgtDropmenu
{
/*//////////////////////////////////////////////////////////////////////////////
// Methoden
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
  public function buildMenu($params)
  {

    $iconMenu = '<i class="icon-reorder" ></i>';
    $iconClose = '<i class="icon-remove " ></i>';

    $entries = new TArray();
    $entries->support = $this->entriesSupport($params);

    $this->content = <<<HTML
<ul class="wgt-dropmenu" id="{$this->id}" style="z-index:500;height:16px;"  >
  <li class="wgt-root" >
    <button class=" wgt-button" ><i class="icon-reorder" ></i> {$this->view->i18n->l('Menu','wbf.label')}</button>
    <ul style="margin-top:-10px;" >
      <li>
        <p class="wgtac_bookmark" ><i class="icon-bookmark" ></i> {$this->view->i18n->l('Bookmark','wbf.label')}</p>
      </li>
{$entries->support}
{$entries->report}
      <li>
        <p class="wgtac_close" ><i class="icon-remove" ></i> {$this->view->i18n->l('Close','wbf.label')}</p>
      </li>
    </ul>
  </li>
</ul>
HTML;

  }//end public function buildMenu */



  /**
   * build the window menu
   * @param TArray $params
   */
  protected function entriesSupport($params)
  {


    $html = <<<HTML

      <li>
        <p><i class="icon-question-sign" ></i> Support</p>
        <ul>
          <li><a class="wcm wcm_req_ajax" href="modal.php?c=Wbfsys.Faq.create&amp;context=menu" ><i class="icon-question" ></i> Faq</a></li>
        </ul>
      </li>

HTML;

    return $html;

  }//end public function entriesSupport */

}//end class DaidalosAcl_Maintab_Menu

