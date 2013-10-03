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
// Methodes
//////////////////////////////////////////////////////////////////////////////*/

  public $folder = null;

  /**
   * @param WebfrapDms_Folder_Save_Request $userRqt
   */
  public function create( $userRqt )
  {

    /* @var $folderManager WebfrapDms_Folder_Manager */
    $folderManager = Manager::get('DmsFolder');
    $this->folder = $folderManager->create($userRqt->folder);

  }//end public function create */

  /**
   * @param WebfrapDms_Folder_Save_Request $userRqt
   */
  public function create( $userRqt )
  {

    /* @var $folderManager WebfrapDms_Folder_Manager */
    $folderManager = Manager::get('DmsFolder');
    $this->folder = $folderManager->create($userRqt->folder);

  }//end public function create */


} // end class WebfrapFile_Model

