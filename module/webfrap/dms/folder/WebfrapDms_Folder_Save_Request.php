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
 * @subpackage Maintenance
 * @author Dominik Bonsch <dominik.bonsch@webfrap.net>
 * @copyright Webfrap Developer Network <contact@webfrap.net>
 */
class WebfrapDms_Folder_Save_Request extends Context
{
/*//////////////////////////////////////////////////////////////////////////////
// Attributes
//////////////////////////////////////////////////////////////////////////////*/

  /**
   * @var WbfsysFolder_Entity
   */
  public $folder = null;

/*//////////////////////////////////////////////////////////////////////////////
// Methoden
//////////////////////////////////////////////////////////////////////////////*/

  /**
   * @param LibRequestHttp $request
   * @param Controller $env
   */
  public function interpretInsert($request, $env)
  {

    $orm = $env->getOrm();

    $this->folder = $orm->newEntity('WbfsysFolder');

    // if the validation fails report
    $request->validateInsert(
      $this->folder,
      'folder',
       array(
        'name',
        'm_parent'
       )
    );

    $this->interpretRequestAcls($request);

  }//end public function interpretRequest */

}//end class WebfrapMessage_Save_Request */

