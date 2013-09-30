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
class WebfrapColab_Controller extends Controller
{
/*//////////////////////////////////////////////////////////////////////////////
// methodes
//////////////////////////////////////////////////////////////////////////////*/

  /**
   * @var array
   */
  protected $options = array(

    'overview' => array(
      'method' => array('GET'),
      'views' => array('maintab')
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
  public function service_overview($request, $response)
  {

    /* @var $model WebfrapColab_Model  */
    $model = $this->loadModel('WebfrapColab');

    // prüfen ob irgendwelche steuerflags übergeben wurde
    $params = new TFlag();

    $model->loadAccess($params);

    if (!$model->access->listing) {
      throw new InvalidRequest_Exception(
        Response::FORBIDDEN_MSG,
        Response::FORBIDDEN
      );
    }

    // load the view object
    /* @var $view WebfrapColab_Maintab_View */
    $view = $response->loadView(
      'webfrap-colab-overview',
      'WebfrapColab',
      'displayOverview'
    );

    $view->setModel($model);

    $model->params = $params;

    $view->displayOverview($params);

  }//end public function service_overview */


} // end class WebfrapColab_Controller
