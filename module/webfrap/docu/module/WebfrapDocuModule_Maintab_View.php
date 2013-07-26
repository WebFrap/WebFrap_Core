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
  
    // fetch the i18n text for title, status and bookmark

  
    // set the window status text
    $this->setLabel($i18nText);
  
    // set the from template
    $this->setTemplate('webfrap/docu/module/page', true);
  
    $this->model->loadModuleByKey($params->key);
    $this->model->loadModuleEntities();
  
    $i18nText = $this->i18n->l(
      'Module '.$this->model->data->name,
      'wbf.label'
    );
    
    $this->addMenu($params);
  
    // kein fehler aufgetreten
    return null;
  
  }//end public function displayEntry */

}//end class WebfrapDocuModule_Maintab_View

