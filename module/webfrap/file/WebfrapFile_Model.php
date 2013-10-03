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
class WebfrapFile_Model extends Model
{
/*//////////////////////////////////////////////////////////////////////////////
// Attributes
//////////////////////////////////////////////////////////////////////////////*/


  /**
   * Conditions für die Query
   * @var array
   */
  public $conditions = array();


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
    $this->access = new WebfrapFile_Access($this);
    $this->access->init($params);

    $params->access = $this->access;

    return $this->access;

  }//end public function loadAccess */

  /**
   * @param WebfrapFile_Upload_Request $params
   * @return array
   */
  public function uploadFiles()
  {

    $files = $this->getRequest()->files('file', Validator::FILE );

    foreach ( $files as /* @var $file LibUploadFile */ $file ) {

      $file->copy();

    }


  }//end public function uploadFiles */

  /**
   * @param int $vid
   * @param int $parentFolder
   * @return array
   */
  public function getMandantFolder( $vid, $parentFolder = null)
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

