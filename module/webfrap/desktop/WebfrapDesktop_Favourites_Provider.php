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
class WebfrapDesktop_Favourites_Provider extends Provider
{

  /**
   * @param int $userId
   * @return array[title, url, description]
   */
  public function getFavs( $userId )
  {

    $db = $this->getDb();

    $sql = <<<SQL

SELECT
  title,
  url,
  description
FROM
  wbfsys_bookmark
WHERE
  id_role = {$userId}
ORDER BY
title;

SQL;

    return $db->select($sql)->getAll();


  }//end public function getFavs */


} // end class WebfrapDesktop_Favourites_Provider

