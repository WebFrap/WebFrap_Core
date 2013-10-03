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
class WebfrapDms_Folder_Menu extends WgtMenuBuilder_SplitButton
{
/*//////////////////////////////////////////////////////////////////////////////
// Methoden
//////////////////////////////////////////////////////////////////////////////*/

  public function setup()
  {

    $this->buttons = array(
      'edit' => array(
        Wgt::ACTION_BUTTON_GET,
        'Edit',
        'maintab.php?c=Webfrap.Contact.edit&amp;objid=',
        'icon-edit',
        '',
        'wbf.label',
        //Acl::UPDATE
      ),
      'delete' => array(
        Wgt::ACTION_DELETE,
        'Delete',
        'index.php?c=Webfrap.Dms_Folder.delete&amp;objid=',
        'icon-remove',
        '',
        'wbf.label',
        //Acl::DELETE
      ),
      'sep' => array(
        Wgt::ACTION_SEP
      ),

    );

    $this->actions = array(
      'edit',
      'sep',
      'delete'
    );

  }//end public function setup */


}//end class WebfrapContact_List_Menu

