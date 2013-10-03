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
class WebfrapDms_Folder_Controller extends MvcController
{
/*//////////////////////////////////////////////////////////////////////////////
// methodes
//////////////////////////////////////////////////////////////////////////////*/

  /**
   * @var array
   */
  protected $options = array(

    'create' => array(
      'method' => array('POST'),
      'views' => array('ajax')
    ),


  );

/*//////////////////////////////////////////////////////////////////////////////
// methodes
//////////////////////////////////////////////////////////////////////////////*/



  /**
   * Form zum erstellen einer neuen Message
   * @param LibRequestHttp $request
   * @param LibResponseHttp $response
   * @return boolean
   */
  public function service_createFolder($request, $response)
  {

    // prüfen ob irgendwelche steuerflags übergeben wurde
    $userRqt = new WebfrapDms_Folder_Save_Request();
    $userRqt->interpretInsert($request, $this);

    /* @var $model WebfrapDms_Model */
    $model = $this->loadModel('WebfrapDms');
    $model->loadTableAccess($userRqt);

    if (!$model->access->listing) {
      throw new InvalidRequest_Exception(
        Response::FORBIDDEN_MSG,
        Response::FORBIDDEN
      );
    }

    // load the view object
    $view = $response->loadView(
      'webfrap-dms-new-folder',
      'WebfrapDms_Folder',
      'displayNew'
    );

    // request bearbeiten
    $folderModel = $this->loadModel('WebfrapDms_Folder');
    $model->access = $model->getAccess();
    $folderModel->create($userRqt);

    $view->setModel($folderModel);

    $view->displayNew($params);

  }//end public function service_upload */


} // end class WebfrapDms_Controller
