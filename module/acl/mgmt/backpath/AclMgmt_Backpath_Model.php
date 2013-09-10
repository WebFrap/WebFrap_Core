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
class AclMgmt_Backpath_Model extends AclMgmt_Base_Model
{
/*//////////////////////////////////////////////////////////////////////////////
// Getter & Setter for Group Users
//////////////////////////////////////////////////////////////////////////////*/

  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysSecurityArea_Entity
  */
  public function getEntityWbfsysSecurityBackpath($objid = null)
  {

    $response = $this->getResponse();

    $entityWbfsysSecurityBackpath = $this->getRegisterd('entityWbfsysSecurityBackpath');

    //entity wbfsys_security_area
    if (!$entityWbfsysSecurityBackpath) {

      if (!is_null($objid)) {
        $orm = $this->getOrm();

        if (!$entityWbfsysSecurityBackpath = $orm->get('WbfsysGroupUsers', $objid)) {
          $response->addError(
            $this->i18n->l(
              'There is no wbfsyssecurityarea with this id '.$objid,
              'wbfsys.security_area.message'
            )
          );

          return null;
        }

        $this->register('entityWbfsysSecurityBackpath', $entityWbfsysSecurityBackpath);

      } else {
        $entityWbfsysSecurityBackpath = new WbfsysSecurityBackpath_Entity() ;
        $this->register('entityWbfsysSecurityBackpath', $entityWbfsysSecurityBackpath);
      }

    } elseif ($objid && $objid != $entityWbfsysSecurityBackpath->getId()) {
      $orm = $this->getOrm();

      if (!$entityWbfsysSecurityBackpath = $orm->get('WbfsysGroupUsers', $objid)) {
        $response->addError(
          $this->i18n->l(
            'There is no wbfsyssecurityarea with this id '.$objid,
            'wbfsys.security_area.message'
          )
        );

        return null;
      }

      $this->register('entityWbfsysSecurityBackpath', $entityWbfsysSecurityBackpath);
    }

    return $entityWbfsysSecurityBackpath;

  }//end public function getEntityWbfsysSecurityBackpath */

  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysSecurityBackpath_Entity $entity
  */
  public function setEntityWbfsysSecurityBackpath($entity)
  {

    $this->register('entityWbfsysSecurityBackpath', $entity);

  }//end public function setEntityWbfsysSecurityBackpath */

/*//////////////////////////////////////////////////////////////////////////////
// CRUD code
//////////////////////////////////////////////////////////////////////////////*/


  /**
   *
   * @param int $areaId
   * @param LibAclContainer $access
   * @param TFlag $params named parameters
   * @return void
   */
  public function search($areaKeys, $access, $params)
  {
  
    $db = $this->getDb();
    $query = $db->newQuery('AclMgmt_Backpath_Table');
    /* @var $query AclMgmt_Backpath_Table_Query  */
  
    $condition = $this->getSearchCondition();
  
    $query->fetch(
      $areaKeys,
      $condition,
      $params
    );
  
    return $query;
  
  }//end public function search */

  /**
   * @param int $areaId
   * @param int $dsetId
   * @param LibAclContainer $access
   * @param TFlag $params named parameters
   * @return void
   */
  public function searchById($areaKeys, $dsetId, $access, $params)
  {
  
    $db = $this->getDb();
    $query = $db->newQuery('AclMgmt_Backpath_Table');
    /* @var $query AclMgmt_Backpath_Table_Query  */
  
    //$condition = $this->getSearchCondition();
  
    $query->fetchById(
      $areaKeys,
      $dsetId,
      array(),
      $params
    );
  
    return $query;
  
  }//end public function searchById */
  
  
  /**
   * de:
   * Extrahieren und validieren der Daten zum erstellen einer Verknüpfung,
   * aus dem Userrequest
   *
   * @param TFlag $params named parameters
   * @return null/Error im Fehlerfall
   */
  public function fetchInsertData($params)
  {

    $httpRequest = $this->getRequest();
    $orm = $this->getOrm();
    $response = $this->getResponse();

    $entityWbfsysSecurityBackpath = new WbfsysSecurityBackpath_Entity;

    $fields = array(
      'id_area',
      'id_target_area',
      'ref_field',
      'groups',
    );

    $httpRequest->validateInsert(
      $entityWbfsysSecurityBackpath,
      'path',
      $fields,
      $fields
    );

    // aus sicherheitsgründen setzen wir die hier im code
    $entityWbfsysSecurityBackpath->id_area = $this->getAreaId();
    
    // setzen des keys, ist zwar denormalisiert macht es aber einfacher
    $entityWbfsysSecurityBackpath->target_area_key = $orm->getField(
      'WbfsysSecurityArea', 
      $entityWbfsysSecurityBackpath->id_target_area, 
      'access_key'
    );
    
    $this->register('entityWbfsysSecurityBackpath', $entityWbfsysSecurityBackpath);
  
    if ($response->hasErrors())
      throw new InvalidRequest_Exception('One or more Fields contain invalid values');

  }//end public function fetchInsertData */
  
  /**
   * de:
   * Extrahieren und validieren der Daten zum erstellen einer Verknüpfung,
   * aus dem Userrequest
   *
   * @param TFlag $params named parameters
   * @return null/Error im Fehlerfall
   */
  public function fetchUpdateData($params)
  {
  
    $httpRequest = $this->getRequest();
    $orm = $this->getOrm();
    $response = $this->getResponse();
  
    $entityWbfsysSecurityBackpath = $this->getEntityWbfsysSecurityBackpath();
  
    $fields = array(
      'id_target_area',
      'ref_field',
      'groups',
    );
  
    $httpRequest->validateUpdate(
      $entityWbfsysSecurityBackpath,
      'path',
      $fields,
      $fields
    );
  
    $this->register('entityWbfsysSecurityBackpath', $entityWbfsysSecurityBackpath);
  
    if ($response->hasErrors())
      throw new InvalidRequest_Exception('One or more Fields contain invalid values');
  
  }//end public function fetchUpdateData */

  /**
   * de:
   * prüfen ob der benutzer nicht schon unter diesen bedingungen der
   * gruppe zugeordnet wurde
   *
   * @param WbfsysSecurityBackpath_Entity $entity
   * @return boolean false wenn doppelten einträge vorhanden sind
   */
  public function checkUnique($entity = null)
  {

    $orm = $this->getOrm();

    if (!$entity)
      $entity =  $this->getRegisterd('entityWbfsysSecurityBackpath');

    return $orm->checkUnique(
      $entity,
      array(
        'id_area',
        'id_target_area',
        'ref_field'
      )
    );

  }//end public function checkUnique */

  /**
   * Create thew new Backpath
   *
   * @param TFlag $params named parameters
   * @return boolean
   */
  public function insert($params)
  {

    // erst mal die nötigen resourcen laden
    $db = $this->getDb();
    $orm = $db->getOrm();
    $response = $this->getResponse();

    try {
      
      $entityWbfsysSecurityBackpath = $this->getRegisterd('entityWbfsysSecurityBackpath');

      if (!$orm->insert($entityWbfsysSecurityBackpath)) {
        
        $response->addError(
          $response->i18n->l(
            'Failed to create the path',
            'wbf.message'
          )
        );

      } else {

        $response->addMessage(
          $response->i18n->l(
            'Successfully created new path',
            'wbf.message'
          )
        );
        $this->protocol(
          'Created new Backpath',
          'insert',
          $entityWbfsysSecurityBackpath
        );

      }
      
    } catch (LibDb_Exception $e) {
      
      return new Error($e, Response::INTERNAL_ERROR);
    }

  }//end public function insert */
  
  /**
   * Create thew new Backpath
   *
   * @param TFlag $params named parameters
   * @return boolean
   */
  public function update($params)
  {
  
    // erst mal die nötigen resourcen laden
    $db = $this->getDb();
    $orm = $db->getOrm();
    $response = $this->getResponse();
  
    try {
  
      $entityWbfsysSecurityBackpath = $this->getRegisterd('entityWbfsysSecurityBackpath');
  
      if (!$orm->update($entityWbfsysSecurityBackpath)) {
        $response->addError(
            $response->i18n->l(
                'Failed to update the path',
                'wbf.message'
            )
        );
  
      } else {
  
        $response->addMessage(
            $response->i18n->l(
                'Successfully created new path',
                'wbf.message'
            )
        );
        $this->protocol(
            'Created new Backpath',
            'insert',
            $entityWbfsysSecurityBackpath
        );
  
      }
  
    } catch (LibDb_Exception $e) {
  
      return new Error($e, Response::INTERNAL_ERROR);
    }
  
  }//end public function insert */
  
  /**
   * Create thew new Backpath
   *
   * @param TFlag $params named parameters
   * @return boolean
   */
  public function delete($delId, $params)
  {
  
    // erst mal die nötigen resourcen laden
    $db = $this->getDb();
    $orm = $db->getOrm();
    $response = $this->getResponse();
    
    try {
  
      if (!$orm->delete('WbfsysSecurityBackpath',$delId )) {
        $response->addError(
          $response->i18n->l(
            'Failed to delete the path',
            'wbf.message'
          )
        );
  
      } else {
  
        $response->addMessage(
          $response->i18n->l(
            'Successfully deleted the path',
            'wbf.message'
          )
        );
        $this->protocol(
          'Deleted a backpath',
          'delete',
          $delId
        );
  
      }
  
    } catch (LibDb_Exception $e) {
  
      return new Error($e, Response::INTERNAL_ERROR);
    }
  
  }//end public function insert */

/*//////////////////////////////////////////////////////////////////////////////
// Search Methodes
//////////////////////////////////////////////////////////////////////////////*/



  /**
   * process userinput and map it to seachconditions that can be injected
   * in the query object
   *
   * @return array
   */
  public function getSearchCondition($filterFree = null)
  {

    $condition = array();

    $httpRequest = $this->getRequest();
    $db = $this->getDb();
    $orm = $db->getOrm();

    if ($filterFree)
      $condition['free'] = $filterFree;
    else if ($free = $httpRequest->param('free_search' , Validator::TEXT))
      $condition['free'] = $free;

    return $condition;

  }//end public function getSearchCondition */





} // end class AclMgmt_Backpath_Model */

