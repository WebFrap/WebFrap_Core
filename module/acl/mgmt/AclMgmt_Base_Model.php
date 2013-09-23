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
class AclMgmt_Base_Model extends Model
{
/*//////////////////////////////////////////////////////////////////////////////
// Attributes
//////////////////////////////////////////////////////////////////////////////*/

  /**
   * the id of the active area
   * @var int
   */
  protected $areaId = null;

  /**
   * @var DomainNode
   */
  public $domainNode = null;

/*//////////////////////////////////////////////////////////////////////////////
// Getter & Setter
//////////////////////////////////////////////////////////////////////////////*/

  /**
   * request the id of the activ security area
   *
   * @return int
   */
  public function getAreaId()
  {

    if (!$this->areaId) {
      $this->areaId = $this->getAcl()->resources->getAreaId($this->domainNode->aclBaseKey);
    }

    return $this->areaId;

  }//end public function getAreaId */

/*//////////////////////////////////////////////////////////////////////////////
// Getter & Setter for Entities Area
//////////////////////////////////////////////////////////////////////////////*/

  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysSecurityArea_Entity
  */
  public function getEntityWbfsysSecurityArea($objid = null)
  {

    $entityWbfsysSecurityArea = $this->getRegisterd('entityWbfsysSecurityArea');

    //entity wbfsys_security_area
    if (!$entityWbfsysSecurityArea) {

      if (!is_null($objid)) {
        $orm = $this->getOrm();

        if (!$entityWbfsysSecurityArea = $orm->get('WbfsysSecurityArea', $objid)) {
          $this->getResponse()->addError
          (
            $this->i18n->l
            (
              'There is no wbfsyssecurityarea with this id '.$objid,
              'wbfsys.security_area.message'
            )
          );

          return null;
        }

        $this->register('entityWbfsysSecurityArea', $entityWbfsysSecurityArea);

      } else {
        $entityWbfsysSecurityArea = new WbfsysSecurityArea_Entity() ;
        $this->register('entityWbfsysSecurityArea', $entityWbfsysSecurityArea);
      }

    } elseif ($objid && $objid != $entityWbfsysSecurityArea->getId()) {
      $orm = $this->getOrm();

      if (!$entityWbfsysSecurityArea = $orm->get('WbfsysSecurityArea', $objid)) {
        $this->getResponse()->addError
        (
          $this->i18n->l
          (
            'There is no wbfsyssecurityarea with this id '.$objid,
            'wbfsys.security_area.message'
          )
        );

        return null;
      }

      $this->register('entityWbfsysSecurityArea', $entityWbfsysSecurityArea);
    }

    return $entityWbfsysSecurityArea;

  }//end public function getEntityWbfsysSecurityArea */

  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysSecurityArea_Entity $entity
  */
  public function setEntityWbfsysSecurityArea($entity)
  {

    $this->register('entityWbfsysSecurityArea', $entity);

  }//end public function setEntityWbfsysSecurityArea */



  /**
   * de:
   * prüfen ob eine derartige referenz nicht bereits existiert
   *
   * @param WbfsysSecurityAccess_Entity $entity
   * @return boolean false wenn eine derartige verknüpfung bereits existiert
   */
  public function checkAccess($domainNode, $params)
  {

    $user = $this->getUser();

    $access = new AclMgmt_Access_Container($this, $domainNode);
    $access->init($params);

    // ok wenn er nichtmal lesen darf, dann ist hier direkt schluss
    if (!$access->admin) {
      // ausgabe einer fehlerseite und adieu
      throw new InvalidRequest_Exception(
        $response->i18n->l(
          'You have no permission for administration in {@resource@}',
          'wbf.message',
          array(
            'resource' => $response->i18n->l($domainNode->label, $domainNode->domainI18n.'.label')
          )
        ),
        Response::FORBIDDEN
      );
    }

    // der Access Container des Users für die Resource wird als flag übergeben
    $params->access = $access;

  }//end public function checkAccess */



} // end class AclMgmt_Base_Model */

