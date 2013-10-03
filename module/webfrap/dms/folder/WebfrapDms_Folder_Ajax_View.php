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
   * Übergabe der Suchergebnisse
   * @param array $entries
   */
  public function displaySearch( $params )
  {

    $tpl = $this->getTplEngine();


    $entries = $this->model->searchEvents( $params );


    $tpl->setRawJsonData($entries);


  }//end public function displaySearch */


  /**
   * Render des Suchergebnisses und übergabe in die ajax response
   * @param string $elementId
   */
  public function displayDropUpload()
  {

    $tpl = $this->getTplEngine();

    $entryArea = $tpl->newArea(
      'wgt-grid-webfrap-files-table'
    );
    $entryArea->position = '#fubar-narf';
    $entryArea->action = 'html';

    $fileInfo = $this->model->uploadFiles();

    $entries = Debug::dumpToString($_FILES, true);

    $entryArea->setContent($entries);


  }//end public function displayDropUpload */




  /**
   * Render des Suchergebnisses und übergabe in die ajax response
   * @param int $linkId
   */
  public function displayDelRef($linkId)
  {

    $tpl = $this->getTplEngine();
    $tpl->addJsCode("\$S('li#wgt-entry-msg-ref-".$linkId."').remove();");

  }//end public function displayDelRef */


  /**
   * Autocomplete für User
   *
   * @param string $key
   * @param TArray $params
   */
  public function displayUserAutocomplete($key, $params)
  {

    $view = $this->getTpl();
    $view->setRawJsonData($this->model->getUserListByKey($key, $params));

  }//end public function displayUserAutocomplete */






} // end class WebfrapMessage_Ajax_View */

