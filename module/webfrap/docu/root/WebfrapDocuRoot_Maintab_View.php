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
class WebfrapDocuRoot_Maintab_View extends WgtMaintabCustom
{
/*//////////////////////////////////////////////////////////////////////////////
// Attributes
//////////////////////////////////////////////////////////////////////////////*/


  /**
   * @param TFlag $params
   */
  public function displayRoot($params)
  {

    // set the from template
    $this->setTemplate('webfrap/docu/root/page', true);

    $i18nText = $this->i18n->l(
      'Docu Root',
      'wbf.label'
    );
    $this->setLabel($i18nText);
    $this->addMenu($params);

    // kein fehler aufgetreten
    return null;

  }//end public function displayRoot */


  /**
   * add a drop menu to the create window
   *
   * @param TFlag $params the named parameter object that was created in
   *   the controller
   * {
   *   string formId: the id of the form;
   * }
   */
  public function addMenu( $params)
  {

    $i18n = $this->getI18n();

    $iconMenu = '<i class="icon-reorder" ></i>';
    $iconClose = '<i class="icon-close" ></i>';
    $iconBookmark = '<i class="icon-bookmark" ></i>';

    $menu = $this->newMenu($this->id.'_dropmenu');

    $this->addActions($params);

    $crumbs = array();
    $crumbs['maintab.php?c=Webfrap.Docu.root'] = 'Root';
    $crumbMenu = new WgtControlCrumb();
    $crumbMenu->setPathCrumb($crumbs);

    $menu->content = <<<HTML

<div class="inline" >
  <button
    class="wcm wcm_control_dropmenu wgt-button"
    id="{$this->id}_dropmenu-control"
    wgt_drop_box="{$this->id}_dropmenu"  ><i class="icon-reorder" ></i> {$this->i18n->l('Menu','wbf.label')}</button>
</div>

<div class="wgt-dropdownbox" id="{$this->id}_dropmenu" >
  <ul>
    <li>
      <a class="wgtac_bookmark" ><i class="icon-bookmark" ></i> {$this->i18n->l('Bookmark', 'wbf.label')}</a>
    </li>
  </ul>
  <ul>
    <li>
      <a class="wgtac_close" ><i class="icon-remove-circle" ></i> {$this->i18n->l('Close','wbf.label')}</a>
    </li>
  </ul>
</div>

HTML;

    $menu->content .= $crumbMenu->buildCrumbs();

  }//end public function addMenu */

}//end class WebfrapDocuRoot_Maintab_View

