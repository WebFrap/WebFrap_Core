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
 * @subpackage Taskplanner
 * @author Dominik Bonsch <dominik.bonsch@webfrap.net>
 * @copyright Webfrap Developer Network <contact@webfrap.net>
 */
class WebfrapTaskPlanner_List_Menu extends WgtSimpleListmenu
{
/*//////////////////////////////////////////////////////////////////////////////
// Attributes
//////////////////////////////////////////////////////////////////////////////*/

  public $listActions = <<<JSON
[
  {
    "type" : "request",
    "label": "Run Task",
    "icon": "control/star.png",
    "method": "get",
    "service": "modal.php?c=Webfrap.TaskPlanner.runTask&objid="
  },
  {
    "type" : "request",
    "label": "Edit",
    "icon": "control/listings.png",
    "method": "get",
    "service": "modal.php?c=Webfrap.TaskPlanner.editPlan&objid="
  },
  {
    "type" : "request",
    "label": "Delete",
    "icon": "control/delete.png",
    "method": "del",
    "service": "ajax.php?c=Webfrap.TaskPlanner.deletePlan&objid="
  }
]
JSON;

}//end class WebfrapTaskPlanner_List_Ajax_View

