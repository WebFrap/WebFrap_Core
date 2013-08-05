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
 * @subpackage Core
 * @author Dominik Bonsch <dominik.bonsch@webfrap.net>
 * @copyright Webfrap Developer Network <contact@webfrap.net>
 */
class WebfrapPeriod_Action_Model extends Model
{
/*//////////////////////////////////////////////////////////////////////////////
// Trigger Methodes
//////////////////////////////////////////////////////////////////////////////*/

 
  /**
   * @param int $idType
   * @param int EWbfsysPeridEventType $type
   */
  public function getActionsByStatus($key, $type)
  {
    
    $sql = <<<SQL
SELECT 
  rowid,
  actions
FROM 
  wbfsys_period_task
JOIN
  wbfsys_period_type ON wbfsys_period_type.rowid = wbfsys_period_task.id_type
WHERE
  wbfsys_period_task.event_type = {$type}
  AND
    UPPER(wbfsys_period_type.access_key) = UPPER('{$key}');
SQL;

    return $this->getDb()->sql($sql);
    
  }//end public function getActionsByStatus */
  
  
}//end WebfrapPeriod_Action_Model

