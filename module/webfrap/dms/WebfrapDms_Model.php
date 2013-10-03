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
 * @subpackage Groupware
 * @author Dominik Bonsch <dominik.bonsch@webfrap.net>
 * @copyright Webfrap Developer Network <contact@webfrap.net>
 */
class WebfrapDms_Model extends MvcModel
{
/*//////////////////////////////////////////////////////////////////////////////
// Attributes
//////////////////////////////////////////////////////////////////////////////*/


  /**
   * Conditions für die Query
   * @var array
   */
  public $conditions = array();

  /**
   * @var WebfrapDms_Folder_Manager
   */
  protected $folderManager = null;

  protected function init()
  {
    $this->folderManager = Manager::get('WebfrapDms_Folder');
  }


/*//////////////////////////////////////////////////////////////////////////////
// Methodes
//////////////////////////////////////////////////////////////////////////////*/

  /**
   * @param TFlag $params
   * @return WebfrapFile_List_Access
   */
  public function loadAccess($params)
  {

    $user = $this->getUser();

    // ok nun kommen wir zu der zugriffskontrolle
    $this->access = new WebfrapDms_Access($this);
    $this->access->init($params);

    $params->access = $this->access;

    return $this->access;

  }//end public function loadAccess */

  /**
   * @param int $mandantId
   * @param int $idParent
   * @return array
   */
  public function getFolders($mandantId, $idParent)
  {

    return $this->folderManager->getFolders($mandantId, $idParent);

  }//end public function getFolders */

  /**
   * @param int $idParent
   * @return array
   */
  public function getFiles($idParent)
  {
    return $this->folderManager->getFoles($idParent);
  }//end public function getFolders */





} // end class WebfrapFile_Model

