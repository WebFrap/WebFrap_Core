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
 * @subpackage Groupware
 * @author Dominik Bonsch <dominik.bonsch@webfrap.net>
 * @copyright webfrap.net <contact@webfrap.net>
 */
class WebfrapDms_Controller extends Controller
{
/*//////////////////////////////////////////////////////////////////////////////
// methodes
//////////////////////////////////////////////////////////////////////////////*/

  /**
   * @var array
   */
  protected $options = array(

    'explorer' => array(
      'method' => array('GET'),
      'views' => array('maintab')
    ),
    'search' => array(
      'method' => array('GET'),
      'views' => array('ajax')
    ),
    'dropupload' => array(
      'method' => array('POST'),
      'views' => array('ajax')
    ),
    'upload' => array(
      'method' => array('POST'),
      'views' => array('ajax')
    ),
    'createfolder' => array(
      'method' => array('POST'),
      'views' => array('ajax')
    ),


  );

/*//////////////////////////////////////////////////////////////////////////////
// methodes
//////////////////////////////////////////////////////////////////////////////*/

 /**
  * @param LibRequestHttp $request
  * @param LibResponseHttp $response
  * @return boolean
  */
  public function service_explorer($request, $response)
  {

    /* @var $model WebfrapFile_Model  */
    $model = $this->loadModel('WebfrapFile');

    // prüfen ob irgendwelche steuerflags übergeben wurde
    $params = new WebfrapFile_Search_Request($request);

    $model->loadAccess($params);

    if (!$model->access->listing) {
      throw new InvalidRequest_Exception(
        Response::FORBIDDEN_MSG,
        Response::FORBIDDEN
      );
    }

    // load the view object
    /* @var $view WebfrapFile_Maintab_View */
    $view = $response->loadView(
      'webfrap-file_list',
      'WebfrapFile',
      'displayExplorer'
    );

    $view->setModel($model);

    $model->params = $params;

    $view->displayExplorer($params);

  }//end public function service_search */

  /**
   * Form zum erstellen einer neuen Message
   * @param LibRequestHttp $request
   * @param LibResponseHttp $response
   * @return boolean
   */
  public function service_dropUpload($request, $response)
  {

    // prüfen ob irgendwelche steuerflags übergeben wurde
    $params = $this->getFlags($request);

    $model = $this->loadModel('WebfrapFile');
    $model->loadAccess($params);

    if (!$model->access->listing) {
      throw new InvalidRequest_Exception(
          Response::FORBIDDEN_MSG,
          Response::FORBIDDEN
      );
    }

    // load the view object
    /* @var $view WebfrapFile_Ajax_View */
    $view = $response->loadView(
      'webfrap-file-upload',
      'WebfrapFile',
      'displayDropUpload'
    );

    // request bearbeiten
    /* @var $model WebfrapFile_Model */
    $model = $this->loadModel('WebfrapFile');
    $view->setModel($model);

    $view->displayDropUpload($params);

  }//end public function service_dropUpload */

 /**
  * Form zum erstellen einer neuen Message
  * @param LibRequestHttp $request
  * @param LibResponseHttp $response
  * @return boolean
  */
  public function service_upload($request, $response)
  {

    // prüfen ob irgendwelche steuerflags übergeben wurde
    $params = $this->getFlags($request);

    $model = $this->loadModel('WebfrapFile');
    $model->loadTableAccess($params);

    if (!$model->access->listing) {
      throw new InvalidRequest_Exception(
        Response::FORBIDDEN_MSG,
        Response::FORBIDDEN
      );
    }

    // load the view object
    $view = $response->loadView(
      'form-messages-new',
      'WebfrapFile_New',
      'displayNew'
    );

    // request bearbeiten
    /* @var $model WebfrapFile_Model */
    $model = $this->loadModel('WebfrapFile');
    $view->setModel($model);

    $view->displayNew($params);

  }//end public function service_upload */

  /**
   * Form zum erstellen einer neuen Message
   * @param LibRequestHttp $request
   * @param LibResponseHttp $response
   * @return boolean
   */
  public function service_createFolder($request, $response)
  {

    // prüfen ob irgendwelche steuerflags übergeben wurde
    $params = $this->getFlags($request);

    $model = $this->loadModel('WebfrapFile');
    $model->loadTableAccess($params);

    if (!$model->access->listing) {
      throw new InvalidRequest_Exception(
        Response::FORBIDDEN_MSG,
        Response::FORBIDDEN
      );
    }

    // load the view object
    $view = $response->loadView(
      'form-messages-new',
      'WebfrapFile_New',
      'displayNew'
    );

    // request bearbeiten
    /* @var $model WebfrapFile_Model */
    $model = $this->loadModel('WebfrapFile');
    $view->setModel($model);

    $view->displayNew($params);

  }//end public function service_upload */


} // end class WebfrapFile_Controller
