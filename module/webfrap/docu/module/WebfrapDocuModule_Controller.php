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
class WebfrapDocuModule_Controller extends MvcController
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
  protected $options = array(
    'list' => array(
      'method' => array('GET'),
      'views' => array('maintab')
    ),
    'entry' => array(
      'method' => array('GET'),
      'views' => array('maintab')
    ),
  );

/*//////////////////////////////////////////////////////////////////////////////
// Methoden
//////////////////////////////////////////////////////////////////////////////*/

 /**
  *  @param LibRequestHttp $request
  *  @param LibResponseHttp $response
  * @throws LibRequest_Exception
  */
  public function service_list($request, $response)
  {

    $params = $this->getFlags($request);

    $view = $response->loadView(
      'webfrap-docu-viewer',
      'WebfrapDocuModule',
      'displayList'
    );

    $view->model = $this->loadModel('WebfrapDocuModule');

    $view->displayList($params);

  }//end public function service_list */

  /**
   *  @param LibRequestHttp $request
   *  @param LibResponseHttp $response
   * @throws LibRequest_Exception
   */
  public function service_entry($request, $response)
  {

    $params = $this->getFlags($request);

    $params->key = $request->param('key',Validator::CKEY);

    /* @var $view WebfrapDocuModule_Maintab_View */
    $view = $response->loadView(
      'webfrap-docu-viewer',
      'WebfrapDocuModule',
      'displayEntry'
    );

    $view->model = $this->loadModel('WebfrapDocuModule');

    $view->displayEntry($params);

  }//end public function service_list */

}//end class WebfrapDocuEntity_Controller

