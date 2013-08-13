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
class WebfrapPeriod_Action extends Action
{
/*//////////////////////////////////////////////////////////////////////////////
// Trigger Methodes
//////////////////////////////////////////////////////////////////////////////*/

  /**
   * @param BaseChild $env
   */
  public function __construct($env)
  {

     $this->env = $env;

  }//end public function __construct */
  

  /**
   * @param Entity $entity
   * @param TFlag $params
   *
   * @throws LibActionBreak_Exception bei so schwerwiegenden Fehlern, dass
   *  der komplette Programmfluss abgebrochen werden sollte
   *
   * @throws LibAction_Exception Bei Fehlern die jedoch nicht so schwer sind
   *  um den Fortlauf des Programms zu gefährden
   *
   */
  public function initialize($entity, $params)
  {

    $message = $this->env->getMessage();
  
    try {
      
      $periodManager = new LibPeriodManager($this->env);
      $periodManager->initialize($entity);
        
      $message->addMessage( 'Successfully initialized the Period' );
      
    } catch (Exception $exc) {
      
      $message->addError( 'Failed to initialize the period' );
      
    }
  
  }//end public function initialize */
  
  /**
   * @param Entity $entity
   * @param TFlag $params
   *
   * @throws LibActionBreak_Exception bei so schwerwiegenden Fehlern, dass
   *  der komplette Programmfluss abgebrochen werden sollte
   *
   * @throws LibAction_Exception Bei Fehlern die jedoch nicht so schwer sind
   *  um den Fortlauf des Programms zu gefährden
   *
   */
  public function freeze($entity, $params)
  {
  
    $periodManager = new LibPeriodManager($this->env);
    $periodManager->freeze($entity);
     
  }//end public function close */
  

  
  /**
   * @param Entity $entity
   * @param TFlag $params
   *
   * @throws LibActionBreak_Exception bei so schwerwiegenden Fehlern, dass
   *  der komplette Programmfluss abgebrochen werden sollte
   *
   * @throws LibAction_Exception Bei Fehlern die jedoch nicht so schwer sind
   *  um den Fortlauf des Programms zu gefährden
   *
   */
  public function close($entity, $params)
  {
  
    /* @var $model WebfrapPeriod_Action_Model */
    $model = $this->loadModel('WebfrapPeriod_Action');
    $actions = $model->getActionsByStatus($entity->getId(), EWbfsysPeriodEventType::CLOSE );
     
  }//end public function close */

  /**
   * @param Entity $entity
   * @param TFlag $params
   *
   * @throws LibActionBreak_Exception bei so schwerwiegenden Fehlern, dass
   *  der komplette Programmfluss abgebrochen werden sollte
   *
   * @throws LibAction_Exception Bei Fehlern die jedoch nicht so schwer sind
   *  um den Fortlauf des Programms zu gefährden
   *
   */
  public function archive($entity, $params)
  {

     /* @var $model WebfrapPeriod_Action_Model */
     $model = $this->loadModel('WebfrapPeriod_Action');
     $actions = $model->getActionsByStatus($entity->getId(), EWbfsysPeriodEventType::ARCHIVE );
     
  }//end public function archive */

}//end WebfrapPeriod_Action

