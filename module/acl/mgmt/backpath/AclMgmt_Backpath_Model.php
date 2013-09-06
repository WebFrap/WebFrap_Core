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
          $response->addError
          (
            $this->i18n->l
            (
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
        $response->addError
        (
          $this->i18n->l
          (
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

  /**
   * just fetch the post data without any required validation
   * @param TFlag $params named parameters
   * @return boolean
   */
  public function getEntryWbfsysGroupUsers($params)
  {

    $db = $this->getDb();
    $query = $db->newQuery($this->domainNode->domainAclMask.'_Qfdu_Treetable');

    $areaId = $this->getAreaId();

    $condition = array();
    $condition['free'] = $this->getEntityWbfsysSecurityBackpath()->getId();

    $query->fetch
    (
      $areaId,
      $condition,
      $params
    );

    return $query;


  }// end public function getEntryWbfsysGroupUsers */

/*//////////////////////////////////////////////////////////////////////////////
// Connect Code
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
   * de:
   * Extrahieren und validieren der Daten zum erstellen einer Verknüpfung,
   * aus dem Userrequest
   *
   * @param TFlag $params named parameters
   * @return null/Error im Fehlerfall
   */
  public function fetchConnectData($params)
  {

    $httpRequest = $this->getRequest();
    $orm = $this->getOrm();
    $response = $this->getResponse();

    $entityWbfsysSecurityBackpath = new WbfsysSecurityBackpath_Entity;

    $fields = array
    (
      'id_group',
      'id_user',
      'vid',
    );

    $httpRequest->validateUpdate
    (
      $entityWbfsysSecurityBackpath,
      'group_users',
      $fields,
      array('id_group', 'id_user')
    );

    // aus sicherheitsgründen setzen wir die hier im code
    $entityWbfsysSecurityBackpath->id_area = $this->getAreaId();

    // ist eine direkte verknüpfung
    $entityWbfsysSecurityBackpath->partial = 0;

    if (!$entityWbfsysSecurityBackpath->id_group) {
      $response->addError
      (
        $response->i18n->l('Missing Group', 'wbf.message')
      );
    }

    if (!$entityWbfsysSecurityBackpath->id_user) {
      $response->addError
      (
        $response->i18n->l('Missing User', 'wbf.message')
      );
    }

    if (!$entityWbfsysSecurityBackpath->vid) {
      if (!$httpRequest->data('assign_full', Validator::BOOLEAN)) {
        $response->addError
        (
          $response->i18n->l
          (
            'Please confirm, that you want to access this use to the full Area.',
            'wbf.message'
          )
        );
      }
    }

    $this->register('entityWbfsysSecurityBackpath', $entityWbfsysSecurityBackpath);

    if ($response->hasErrors()) {
      return new Error
      (
        $response->i18n->l
        (
          'Sorry this request was invlalid.',
          'wbf.message'
        ),
        Response::BAD_REQUEST
      );
    } else {
      return null;
    }

  }//end public function fetchConnectData */

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

    return $orm->checkUnique
    (
      $entity,
      array('id_area', 'id_group', 'id_user', 'vid', 'partial')
    );

  }//end public function checkUnique */

  /**
   * the update method of the model
   *
   * @param TFlag $params named parameters
   * @return boolean
   */
  public function connect($params)
  {

    // erst mal die nötigen resourcen laden
    $db = $this->getDb();
    $orm = $db->getOrm();
    $response = $this->getResponse();

    try {
      if (!$entityWbfsysSecurityBackpath = $this->getRegisterd('entityWbfsysSecurityBackpath')) {
        return new Error
        (
          $response->i18n->l
          (
            'Sorry, something went wrong!',
            'wbfsys.message'
          ),
          Response::INTERNAL_ERROR,
          $response->i18n->l
          (
            'The expected Entity with the key {@key@} was not in the registry',
            'wbf.message',
            array('key' => 'entityWbfsysSecurityBackpath')
          )
        );
      }

      if (!$orm->insert($entityWbfsysSecurityBackpath)) {
        $entityText = $entityWbfsysSecurityBackpath->text();
        $response->addError
        (
          $response->i18n->l
          (
            'Failed to update {@label@}',
            'wbf.message',
            array('label' => $entityText)
          )
        );

      } else {

        // wenn ein benutzer der gruppe hinzugefügt wird, jedoch nur
        // in relation zu einem datensatz, dann bekommt er einen teilzuweisung
        // zu der gruppe in relation zur area des datensatzes
        // diese teilzuweisung vermindert den aufwand um in listen elementen
        // zu entscheiden in welcher form die alcs ausgelesen werden müssen
        if ($entityWbfsysSecurityBackpath->vid) {
          $partUser = new WbfsysSecurityBackpath_Entity;
          $partUser->id_user = $entityWbfsysSecurityBackpath->id_user;
          $partUser->id_group = $entityWbfsysSecurityBackpath->id_group;
          $partUser->id_area = $entityWbfsysSecurityBackpath->id_area;
          $partUser->partial = 1;
          $orm->insertIfNotExists($partUser, array('id_area','id_group','id_user','partial'));
        }

        $entityText = $entityWbfsysSecurityBackpath->text();

        $response->addMessage
        (
          $response->i18n->l
          (
            'Successfully updated {@label@}',
            'wbfsys.message',
            array('label'=>$entityText)
          )
        );

        $this->protocol
        (
          'Edited: '.$entityText,
          'edit',
          $entityWbfsysSecurityBackpath
        );

      }
    } catch (LibDb_Exception $e) {
      return new Error($e, Response::INTERNAL_ERROR);
    }

    if ($response->hasErrors()) {
      return new Error
      (
        $response->i18n->l
        (
          'Sorry, something went wrong!',
          'wbf.message'
        ),
        Response::INTERNAL_ERROR
      );
    } else {
      return null;
    }


  }//end public function connect */

/*//////////////////////////////////////////////////////////////////////////////
// Search Methodes
//////////////////////////////////////////////////////////////////////////////*/



  /**
   *
   * @param int $areaId
   * @param TFlag $params named parameters
   * @return void
   */
  public function loadGroups($areaId, $params)
  {

    $db = $this->getDb();

    /* @var $query AclMgmt_Qfdu_Group_Treetable_Query  */
    $query = $db->newQuery('AclMgmt_Qfdu_Group_Treetable');

    $condition = $this->getSearchCondition();

    $query->fetch
    (
      $areaId,
      $condition,
      $params
    );

    return $query;

  }//end public function searchQualifiedUsers */

  /**
   *
   * @param int $areaId
   * @param TFlag $params named parameters
   * @param $filter mixed some custom filter, mainly used for display connect of a single dataset
   * @return void
   */
  public function searchQualifiedUsers($areaId, $params, $filter = null)
  {

    $db = $this->getDb();

    /* @var $query AclMgmt_Qfdu_Group_Treetable_Query  */
    $query = $db->newQuery('AclMgmt_Qfdu_Group_Treetable');

    $condition = $this->getSearchCondition($filter);

    $query->fetch(
      $areaId,
      $condition,
      $params
    );

    return $query;

  }//end public function searchQualifiedUsers */

 

  /**
   * @param int $areaId
   * @param Context $context
   * @return AclMgmt_Qfdu_Group_Export_Query
   */
  public function loadExportByGroup($areaId, $context)
  {

    $db = $this->getDb();

    /* @var $query AclMgmt_Qfdu_Group_Export_Query  */
    $query = $db->newQuery('AclMgmt_Qfdu_Group_Export');
    $query->domainNode = $this->domainNode;
    $query->fetch
    (
      $areaId,
      $context
    );

    return $query;

  }//end public function loadExportByGroup */

  /**
   * @param int $areaId
   * @param Context $context
   * @return AclMgmt_Qfdu_Dset_Export_Query
   */
  public function loadExportByDset($areaId, $context)
  {

    $db = $this->getDb();

    /* @var $query AclMgmt_Qfdu_Dset_Export_Query  */
    $query = $db->newQuery('AclMgmt_Qfdu_Dset_Export');
    $query->domainNode = $this->domainNode;
    $query->fetch
    (
      $areaId,
      $context
    );

    return $query;

  }//end public function loadExportByDset */

  /**
   * @param int $areaId
   * @param Context $context
   * @return AclMgmt_Qfdu_User_Export_Query
   */
  public function loadExportByUser($areaId, $context)
  {

    $db = $this->getDb();

    /* @var $query AclMgmt_Qfdu_User_Export_Query  */
    $query = $db->newQuery('AclMgmt_Qfdu_User_Export');
    $query->domainNode = $this->domainNode;
    $query->fetch
    (
      $areaId,
      $context
    );

    return $query;

  }//end public function loadExportByUser */


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





} // end class AclMgmt_Qfdu_Model */

