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
 * Read before change:
 * It's not recommended to change this file inside a Mod or App Project.
 * If you want to change it copy it to a custom project.

 *
 * @package WebFrap
 * @subpackage Acl
 * @author Dominik Bonsch <dominik.bonsch@webfrap.net>
 * @copyright webfrap.net <contact@webfrap.net>
 */
class AclMgmt_Query extends LibSqlQuery
{
/*//////////////////////////////////////////////////////////////////////////////
// fetch methodes
//////////////////////////////////////////////////////////////////////////////*/

 /**
   * Loading the tabledata from the database
   * @param int $areaId
   * @param string $key
   * @param TFlag $params
   * @return void
   *
   * @throws LibDb_Exception
   */
  public function fetchGroupsByKey($areaId, $key, $params = null)
  {

    if (!$params)
      $params = new TFlag();

    $this->sourceSize = null;
    $db = $this->getDb();

    $sql = <<<SQL

  SELECT
    rowid as id,
    name as value,
    name as label
  FROM
    wbfsys_role_group
  where
    UPPER(name) like UPPER('{$db->addSlashes($key)}%')
    AND NOT rowid IN(SELECT id_group FROM wbfsys_security_access WHERE id_area = {$areaId})
  LIMIT 10;

SQL;

    $this->result = $db->select($sql)->getAll();

  }//end public function fetchGroupsByKey */
  
  /**
   * Loading the tabledata from the database
   * @param int $areaId
   * @param string $key
   * @param TFlag $params
   * @return void
   *
   * @throws LibDb_Exception
   */
  public function fetchAreasByKey($areaId, $key, $params = null)
  {
  
    if (!$params)
      $params = new TFlag();
  
    $this->sourceSize = null;
    $db = $this->getDb();
  
    $sql = <<<SQL
  
  SELECT
    wbfsys_security_area.rowid as id,
    wbfsys_security_area.access_key as value,
    wbfsys_security_area.access_key as label
  FROM
    wbfsys_security_area
  JOIN 
      wbfsys_security_area_type
    ON
      wbfsys_security_area_type.rowid = wbfsys_security_area.id_type
  WHERE
    LOWER(wbfsys_security_area.access_key) like LOWER('{$db->addSlashes($key)}%')
    AND NOT rowid IN( SELECT id_group FROM wbfsys_security_area WHERE wbfsys_security_area.rowid = {$areaId} )
    AND wbfsys_security_area_type.access_key IN('module','module_category','mgmt')
  ORDER BY wbfsys_security_area.access_key asc
  LIMIT 12;
  
SQL;
  
    $this->result = $db->select($sql)->getAll();
  
  }//end public function fetchAreasByKey */

} // end class AclMgmt_Query */

