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
class WebfrapAnnouncement_Crud_Access_Edit extends LibAclContainer_Dataset
{
  
  /**
   * @var string
   */
  public $aclKey = 'mgmt-wbfsys_announcement';
  
  /**
   * @var string
   */
  public $aclPath = 'mod-wbfsys>mgmt-wbfsys_announcement';
  

}//end class WebfrapAnnouncement_Crud_Access_Edit

