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
 * Read before change:
 * It's not recommended to change this file inside a Mod or App Project.
 * If you want to change it copy it to a custom project.

 *
 * @package WebFrap
 * @subpackage Acl
 * @author Dominik Bonsch <dominik.bonsch@webfrap.net>
 * @copyright webfrap.net <contact@webfrap.net>
 */
class AclMgmt_Backpath_Ajax_View extends LibTemplateAjaxView
{
/*//////////////////////////////////////////////////////////////////////////////
// Attributes
//////////////////////////////////////////////////////////////////////////////*/

  /**
   * @var DomainNode
   */
  public $domainNode = null;

  /**
   * @var AclMgmt_Backpath_Model
   */
  public $model = null;

/*//////////////////////////////////////////////////////////////////////////////
// display methodes
//////////////////////////////////////////////////////////////////////////////*/


  /**
   * search pushes a rendered listing element body to the client, that replaces
   * the existing body
   *
   * @param int $areaId the rowid of the activ area
   * @param TArray $context control flags
   */
  public function displaySearch($areaId, $context)
  {
  
    /* @var $ui AclMgmt_Backpath_Ui */
    $ui = $this->tplEngine->loadUi('AclMgmt_Backpath');
    $ui->domainNode = $this->domainNode;
    $ui->setModel($this->model);
    $ui->setView($this->getView());
  
    // ok it's definitly an ajax request
    $context->ajax = true;
  
    $ui->createListItem(
      $this->model->search($areaId, $context->access, $context),
      $areaId,
      $context->access,
      $context
    );
  
    return null;
  
  }//end public function displaySearch */

  /**
   * append a new user in relation to an area / entity to a group
   *
   * on connect the server pushes a new table row via ajax area to the client
   * the ajax area appends automatically at the end of the listing element body
   *
   * @param WbfsysAreaAssignment_Entity $eAssignment
   * @param TArray $context useriput / control flags
   */
  public function displayInsert($eAssignment, $context)
  {

    $ui = $this->tplEngine->loadUi('AclMgmt_Qfdu_Group');
    $ui->domainNode = $this->domainNode;
    $ui->setModel($this->model);
    $ui->setView($this->getView());

    // add the id to the form
    if (!$context->searchFormId)
      $context->searchFormId = 'wgt-form-table-'.$this->domainNode->domainName.'-acl-qfdu-search';

    // ok it's definitly an ajax request
    $context->ajax = true;

    $ui->createListItem
    (
      $this->model->searchQualifiedUsers($context->areaId, $context, $eAssignment->getId()),
      $context->areaId,
      $context->access,
      $context
    );

    return null;

  }//end public function displayConnect */
  
  /**
   * append a new user in relation to an area / entity to a group
   *
   * on connect the server pushes a new table row via ajax area to the client
   * the ajax area appends automatically at the end of the listing element body
   *
   * @param WbfsysAreaAssignment_Entity $eAssignment
   * @param TArray $context useriput / control flags
   */
  public function displayUpdate($eAssignment, $context)
  {
  
    $ui = $this->tplEngine->loadUi('AclMgmt_Qfdu_Group');
    $ui->domainNode = $this->domainNode;
    $ui->setModel($this->model);
    $ui->setView($this->getView());
  
    // add the id to the form
    if (!$context->searchFormId)
      $context->searchFormId = 'wgt-form-table-'.$this->domainNode->domainName.'-acl-qfdu-search';
  
    // ok it's definitly an ajax request
    $context->ajax = true;
  
    $ui->createListItem
    (
        $this->model->searchQualifiedUsers($context->areaId, $context, $eAssignment->getId()),
        $context->areaId,
        $context->access,
        $context
    );
  
    return null;
  
  }//end public function displayUpdate */
  
  /**
   * append a new user in relation to an area / entity to a group
   *
   * on connect the server pushes a new table row via ajax area to the client
   * the ajax area appends automatically at the end of the listing element body
   *
   * @param WbfsysAreaAssignment_Entity $eAssignment
   * @param TArray $context useriput / control flags
   */
  public function displayDelete($delId, $context)
  {
  
    $itemId = 'wgt-table-'.$this->domainNode->domainName.'-acl-tgroup';
  
    $groupRowId = "{$itemId}_row_{$groupId}";
  
    $code = <<<JSCODE
  
    \$S('#{$groupRowId}').fadeOut(100,function() {
      \$S('#{$groupRowId}').remove();
      \$S('.c-{$groupRowId}').each(function() {
        \$S('.c-'+\$S(this).attr('id')).remove();
      });
      \$S('.c-{$groupRowId}').remove();
    });
  
JSCODE;
  
    $this->view->addJsCode($code);
  
  }//end public function displayDelete */

  /**
   * @param string $key
   * @param TArray $params
   */
  public function displayAutocompleteRefField($key, $params)
  {
  
    $view = $this->getTplEngine();
    $view->setRawJsonData($this->model->searchRefFieldsAutocomplete($key, $params));
  
  }//end public function displayAutocompleteRefField */
 

} // end class AclMgmt_Backpath_Ajax_View */

