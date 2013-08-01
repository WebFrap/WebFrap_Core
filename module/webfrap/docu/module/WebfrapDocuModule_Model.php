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
class WebfrapDocuModule_Model extends Model
{
/*//////////////////////////////////////////////////////////////////////////////
// Attributes
//////////////////////////////////////////////////////////////////////////////*/

  /**
   * Liste der Module
   * @var array
   */
  public $list = array();

  /**
   * Date des Modules
   * @var stdClass
   */
  public $data = null;

  /**
   * Liste der Entities
   * @var array
   */
  public $entityList = array();

/*//////////////////////////////////////////////////////////////////////////////
// Attributes
//////////////////////////////////////////////////////////////////////////////*/

  /**
   * @return string
   */
  public function loadList()
  {

    $db = $this->getDb();

    $sql = <<<SQL

SELECT
  rowid,
  name,
  access_key,
  description,
  m_time_created,
  id_security_area
FROM
  wbfsys_module
order by name;

SQL;

    $this->list = $db->select($sql);

  }//end public function loadList */

  /**
   * @param string $key
   * @return void
   */
  public function loadModuleByKey($key)
  {

    $db = $this->getDb();

    $sql = <<<SQL

SELECT
  rowid,
  name,
  access_key,
  description,
  m_time_created,
  id_security_area
FROM
  wbfsys_module
WHERE
  UPPER(access_key) = UPPER('{$key}');

SQL;

    $this->data = (object)$db->select($sql)->get();

  }//end public function loadModuleByKey */

  /**
   * @return string
   */
  public function loadModuleEntities($idModule = null)
  {

    $db = $this->getDb();

    if (!$idModule)
      $idModule = $this->data->rowid;

    $sql = <<<SQL
SELECT
  ent.rowid,
  ent.name,
  ent.access_key,
  ent.flag_index,
  ent.relevance,
  ent.m_time_created,
  ent.short_desc,
  attr.num_attributes,
  mgmt.num_mgmts
FROM wbfsys_entity ent
JOIN (
  SELECT
    COUNT(attr.rowid) as num_attributes,
    attr.id_entity from wbfsys_entity_attribute attr group by attr.id_entity
  ) attr ON attr.id_entity = ent.rowid
JOIN (
  SELECT COUNT(mgmt.rowid) as num_mgmts,
  mgmt.id_entity from wbfsys_management mgmt group by  mgmt.id_entity
  ) mgmt ON mgmt.id_entity = ent.rowid
WHERE
  ent.id_module = {$idModule}
ORDER BY ent.name;

SQL;

    $this->entityList = $db->select($sql);

  }//end public function loadModuleEntities */

  /**
   */
  public function loadModuleManagements()
  {

    $db = $this->getDb();

    $sql = <<<SQL

SELECT
  rowid,
  name,
  access_key,
  description,
  m_time_created,
  id_security_area
FROM
  wbfsys_module;

SQL;

    $this->list = $db->select($sql);

  }//end public function loadModuleEntities */


}//end class WebfrapDocuModule_Model

