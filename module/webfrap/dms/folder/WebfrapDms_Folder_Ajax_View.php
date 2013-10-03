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
 *
 * @package WebFrap
 * @subpackage Groupware
 * @author Dominik Bonsch <dominik.bonsch@webfrap.net>
 * @copyright Webfrap Developer Network <contact@webfrap.net>
 */
class WebfrapDms_Folder_Ajax_View extends LibTemplatePlain
{
/*//////////////////////////////////////////////////////////////////////////////
// display methodes
//////////////////////////////////////////////////////////////////////////////*/

  /**
   *
   * @var WebfrapDms_Folder_Model
   */
  public $model = null;

  /**
   * Übergabe der Suchergebnisse
   * @param array $entries
   */
  public function displayNew( $params )
  {

    $area = $this->newArea('newEntry');
    $area->position = '#wgt-grid-webfrap-files-table>tbody';
    $area->action = 'prepend';

    $folder = $this->model->getActiveFolder();

    $icon = isset($folder['folder_icon'])?$folder['folder_icon']:'icon-folder';

    $area->content = <<<CODE
  <tr class="folder" >
    <th><input type="checkbox" value="{$folder['rowid']}" /></th>
    <td><i class="{$icon}" ></i> {$folder['name']}</td>
    <td>Status</td>
    <td>{$this->i18n->date($folder['created'])}</td>
    <td></td>
  </tr>
CODE;

  }//end public function displayNew */

  /**
   * Render des Suchergebnisses und übergabe in die ajax response
   * @param int $linkId
   */
  public function displayDelete($userRqt)
  {

    $this->addJsCode("\$S('#wgt-grid-webfrap-files-table').grid('deleteRowById','#wgt-row-webfrap-files-{$userRqt->folder}');");

  }//end public function displayDelete */


} // end class WebfrapMessage_Ajax_View */

