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
 * @subpackage maintenance/process
 * @author Dominik Bonsch <dominik.bonsch@webfrap.net>
 * @copyright Webfrap Developer Network <contact@webfrap.net>
 */
class WebfrapSystem_Status_Controller extends MvcController
{
/*//////////////////////////////////////////////////////////////////////////////
// Attributes
//////////////////////////////////////////////////////////////////////////////*/

  /**
   * Mit den Options wird der zugriff auf die Service Methoden konfiguriert
   *
   * method: Der Service kann nur mit den im Array vorhandenen HTTP Methoden
   *   aufgerufen werden. Wenn eine falsche Methode verwendet wird, gibt das
   *   System automatisch eine "Method not Allowed" Fehlermeldung zurück
   *
   * views: Die Viewtypen die erlaubt sind. Wenn mit einem nicht definierten
   *   Viewtype auf einen Service zugegriffen wird, gibt das System automatisch
   *  eine "Invalid Request" Fehlerseite mit einer Detailierten Meldung, und der
   *  Information welche Services Viewtypen valide sind, zurück
   *
   * public: boolean wert, ob der Service auch ohne Login aufgerufen werden darf
   *   wenn nicht vorhanden ist die Seite per default nur mit Login zu erreichen
   *
   * @var array
   */
  protected $options = array
  (
    'stats' => array
    (
      'method' => array('GET'),
      'views' => array('maintab')
    ),
    'phpinfo' => array
    (
      'method' => array('GET'),
      'views' => array('modal')
    ),
    'showenv' => array
    (
      'method' => array('GET'),
      'views' => array('modal')
    ),
    'showserver' => array
    (
      'method' => array('GET'),
      'views' => array('modal')
    )
  );

/*//////////////////////////////////////////////////////////////////////////////
// Methoden
//////////////////////////////////////////////////////////////////////////////*/

  /**
   * @param LibRequestHttp $request
   * @param LibResponseHttp $response
   * @return void
   */
  public function service_stats($request, $response)
  {

    /* @var $view WebfrapSystem_Status_Maintab_View  */
    $view = $response->loadView(
      'webfrap-system-stats',
      'WebfrapSystem_Status' ,
      'displayStats'
    );

    $model = $this->loadModel('WebfrapSystem_Status');

    $view->setModel($model);
    $view->displayStats();

  }//end public function service_stats */

  /**
   * @param LibRequestHttp $request
   * @param LibResponseHttp $response
   * @return void
   */
  public function service_phpInfo($request, $response)
  {

    /* @var $view WebfrapSystem_Status_Maintab_View  */
    $view = $response->loadView(
      'webfrap-system-info',
      'WebfrapSystem_Status' ,
      'displayInfo'
    );

    $view->displayInfo();

  }//end public function service_phpInfo */

  /**
   * @param LibRequestHttp $request
   * @param LibResponseHttp $response
   * @return void
   */
  public function service_showEnv($request, $response)
  {

    /* @var $view WebfrapSystem_Status_Modal_View  */
    $view = $response->loadView(
      'webfrap-system-env',
      'WebfrapSystem_Status' ,
      'displayEnv'
    );

    $view->displayEnv();

  }//end public function service_showEnv */

  /**
   * @param LibRequestHttp $request
   * @param LibResponseHttp $response
   * @return void
   */
  public function service_showServer($request, $response)
  {

    /* @var $view WebfrapSystem_Status_Modal_View  */
    $view = $response->loadView(
      'webfrap-system-env',
      'WebfrapSystem_Status' ,
      'displayServer'
    );

    $view->displayServer();

  }//end public function service_showServer */

}//end class WebfrapMaintenance_Metadata_Controller

