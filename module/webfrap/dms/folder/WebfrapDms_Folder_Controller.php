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
  public function service_create($request, $response)
  {

    // prüfen ob irgendwelche steuerflags übergeben wurde
    $userRqt = new WebfrapDms_Folder_Save_Request();
    $userRqt->interpretInsert($request, $this);

    /* @var $model WebfrapDms_Model */
    $model = $this->loadModel('WebfrapDms');
    $model->loadAccess($userRqt);

    if (!$model->access->listing) {
      throw new InvalidRequest_Exception(
        Response::FORBIDDEN_MSG,
        Response::FORBIDDEN
      );
    }

    // load the view object
    /* @var $view WebfrapDms_Folder_Ajax_View */
    $view = $response->loadView(
      'webfrap-dms-new-folder',
      'WebfrapDms_Folder',
      'displayNew'
    );

    // request bearbeiten
    /* @var $folderModel WebfrapDms_Folder_Model */
    $folderModel = $this->loadModel('WebfrapDms_Folder');
    $model->access = $model->getAccess();
    $folderModel->create($userRqt);

    $view->setModel($folderModel);

    $view->displayNew($userRqt);

  }//end public function service_create */


} // end class WebfrapDms_Controller
