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
  wbfsys_module;

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
  public function loadModuleEntities()
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

