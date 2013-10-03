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
class WebfrapDms_Folder_Model extends MvcModel
{
/*//////////////////////////////////////////////////////////////////////////////
// Attributes
//////////////////////////////////////////////////////////////////////////////*/

  public $folder = null;

  /**
   * @var WebfrapDms_Folder_Manager
   */
  protected $folderManager = null;

/*//////////////////////////////////////////////////////////////////////////////
// Methodes
//////////////////////////////////////////////////////////////////////////////*/

  /**
   * (non-PHPdoc)
   * @see MvcModel::init()
   */
  protected function init()
  {

    $this->folderManager = Manager::get('WebfrapDms_Folder');

  }//end protected function init */

  /**
   * @param WebfrapDms_Folder_Save_Request $userRqt
   */
  public function create( $userRqt )
  {

    $this->folder = $this->folderManager->create($userRqt->folder);

  }//end public function create */

  /**
   * @depends create kann erst nach create aufgerufen werden
   */
  public function getActiveFolder()
  {

    return $this->folderManager->getFolders(
      $this->folder->vid,
      $this->folder->id_parent, array('id'=>$this->folder->getid())
    );

  }//end public function getActiveFolder */


} // end class WebfrapFile_Model

