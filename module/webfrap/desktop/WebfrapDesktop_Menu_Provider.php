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
class WebfrapDesktop_Menu_Provider extends Provider
{

  /**
   * @param int $profileId
   * @return array[rowid, label, icon, http_url]
   */
  public function getProfileMenu( $profileId )
  {

    $db = $this->getDb();

    $sql = <<<SQL

SELECT
  rowid,
  label,
  icon,
  http_url
FROM
  wbfsys_menu_entry
JOIN
  wbfsys_profile
    ON wbfsys_profile.id_profile_menu = wbfsys_menu_entry.id_menu
WHERE
  wbfsys_profile.rowid = {$profileId};

SQL;

    $db->select($sql)->getAll();


  }//end public function getProfileMenu */

  /**
   * @param int $profileId
   * @return array[rowid, label, icon, http_url]
   */
  public function getMainMenu( $profileId )
  {

    $db = $this->getDb();

    $sql = <<<SQL

SELECT
  rowid,
  label,
  icon,
  http_url,
  m_parent
FROM
  wbfsys_menu_entry
JOIN
  wbfsys_profile
    ON wbfsys_profile.id_main_menu = wbfsys_menu_entry.id_menu
WHERE
  wbfsys_profile.rowid = {$profileId};

SQL;

    $db->select($sql)->getAll();


  }//end public function getProfileMenu */

} // end class WebfrapDesktop_Menu_Provider

