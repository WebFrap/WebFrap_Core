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
class WebfrapDms_Folder_Manager extends Manager
{
/*//////////////////////////////////////////////////////////////////////////////
// Methodes
//////////////////////////////////////////////////////////////////////////////*/


  /**
   * @param WbfsysFolder_Entity $folder
   * @return WbfsysFolder_Entity
   */
  public function create( $folder )
  {
    $orm = $this->getOrm();

    if (!$folder->id_structure)
      $folder->id_structure = $this->getMandantFolderStructure();

    $orm->insert($folder);

    return $folder;

  }//end public function create */

  public function getMandantFolderStructure()
  {

    $user = $this->getUser();
    $orm = $this->getOrm();

    $structure = $orm->getWhere('WbfsysFolderStructure','vid='.$user->mandantId);

    if (!$structure) {
      $mandantManager = Manager::get('WebfrapDms_Mandant');
      $mandantManager->createMandantRoot( $mandantId );
    }

    return $structure->getId();

  }



  /**
   * @param int $vid
   * @param int $parentFolder
   * @return array
   */
  public function getFolders( $vid, $parentFolder = null)
  {

    $where = '';
    if (is_null($parentFolder)) {

      $where = <<<SQL
  folder.m_parent is null
SQL;

    } else {

      $where = <<<SQL
  folder.m_parent = {$parentFolder}
SQL;

    }

    $sql = <<<SQL
SELECT
  folder.rowid,
  folder.name,
  folder.folder_icon,
  folder.description,
  folder.vid,
  folder.m_time_created as created
FROM
  wbfsys_folder folder
WHERE {$where} order by folder.name;

SQL;

    return $this->getDb()->select($sql);

  }//end public function getFolders */

  /**
   * @param int $parentFolder
   * @return array
   */
  public function getFiles($parentFolder)
  {

    // root hat keine folder
    if(is_null($parentFolder)){
      return array();
    }


    $sql = <<<SQL
SELECT
  file.rowid,
  file.name,
  file.link,
  file.id_confidentiality,
  file.description,
  file.mimetype,
  file.m_time_created as created
FROM
  wbfsys_file file
WHERE
  file.id_folder = {$parentFolder}
ORDER BY
  file.name;
SQL;

    return $this->getDb()->select($sql);

  }//end public function getFiles */


} // end class WebfrapFile_Model

