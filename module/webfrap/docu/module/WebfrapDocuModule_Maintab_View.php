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
class WebfrapDocuModule_Maintab_View extends WgtMaintabCustom
{
/*//////////////////////////////////////////////////////////////////////////////
// Attributes
//////////////////////////////////////////////////////////////////////////////*/

  /**
   * @var WebfrapDocuModule_Model
   */
  public $model = null;

/*//////////////////////////////////////////////////////////////////////////////
// form export methodes
//////////////////////////////////////////////////////////////////////////////*/

  /**
   * @param TFlag $params
   */
  public function displayList($params)
  {

    // fetch the i18n text for title, status and bookmark
    $i18nText = $this->i18n->l(
      'List Modules',
      'wbf.label'
    );

    // set the window status text
    $this->setLabel($i18nText);

    // set the from template
    $this->setTemplate('webfrap/docu/module/list', true);

    $this->model->loadList();

    $this->addMenu($params);

    // kein fehler aufgetreten
    return null;

  }//end public function displayList */

  /**
   * @param TFlag $params
   */
  public function displayEntry($params)
  {

    // set the from template
    $this->setTemplate('webfrap/docu/module/page', true);

    $this->model->loadModuleByKey($params->key);
    $this->model->loadModuleEntities();

    $i18nText = $this->i18n->l(
      'Module '.$this->model->data->name,
      'wbf.label'
    );
    $this->setLabel($i18nText);

    $params->modName = $this->model->data->name;
    $params->modKey = $this->model->data->access_key;

    $this->addMenu($params);

    // kein fehler aufgetreten
    return null;

  }//end public function displayEntry */


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

    $menu = $this->newMenu($this->id.'_dropmenu');

    $this->addActions($params);

    $crumbs = array();
    $crumbs['maintab.php?c=Webfrap.Docu.root'] = 'Root';
    $crumbs['maintab.php?c=Webfrap.DocuModule.list'] = 'Modules';

    if($params->modKey)
      $crumbs['maintab.php?c=Webfrap.DocuModule.entry&amp;key='.$params->modKey] = $params->modName;

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
      <a class="wgtac_close" ><i class="icon-remove" ></i> {$this->i18n->l('Close','wbf.label')}</a>
    </li>
  </ul>
</div>

HTML;

    $menu->content .= $crumbMenu->buildCrumbs();

  }//end public function addMenu */

}//end class WebfrapDocuModule_Maintab_View

