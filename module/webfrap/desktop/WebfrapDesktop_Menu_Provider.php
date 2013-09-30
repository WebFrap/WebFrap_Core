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
  public function getProfileMenu( $profileKey )
  {

    $db = $this->getDb();

    $sql = <<<SQL

SELECT
  wbfsys_menu_entry.rowid,
  wbfsys_menu_entry.label,
  wbfsys_menu_entry.icon,
  wbfsys_menu_entry.http_url
FROM
  wbfsys_menu_entry
JOIN
  wbfsys_profile
    ON wbfsys_profile.id_profile_menu = wbfsys_menu_entry.id_menu
WHERE
  wbfsys_profile.access_key = '{$profileKey}'
order by m_order;

SQL;

    return $db->select($sql)->getAll();


  }//end public function getProfileMenu */

  /**
   * @param int $profileId
   * @return array[rowid, label, icon, http_url]
   */
  public function getMainMenu( $profileKey )
  {

    $db = $this->getDb();

    $sql = <<<SQL

SELECT
  wbfsys_menu_entry.rowid,
  wbfsys_menu_entry.label,
  wbfsys_menu_entry.icon,
  wbfsys_menu_entry.http_url,
  wbfsys_menu_entry.m_parent,
  wbfsys_menu_entry.type,
  wbfsys_menu_entry.access_key
FROM
  wbfsys_menu_entry
JOIN
  wbfsys_profile
    ON wbfsys_profile.id_main_menu = wbfsys_menu_entry.id_menu
WHERE
  wbfsys_profile.access_key = '{$profileKey}'
ORDER BY m_order;

SQL;

    $tmp = $db->select($sql)->getAll();

    $entries = array('root'=> array());

    foreach( $tmp as $entry ){

      if (!$entry['m_parent']) {
        $entries['root'][] = $entry;
      } else {

        if(!isset($entries[$entry['m_parent']])){
          $entries[$entry['m_parent']] = array();
        }

        $entries[$entry['m_parent']][] = $entry;

      }
    }

    return $entries;


  }//end public function getMainMenu */

} // end class WebfrapDesktop_Menu_Provider

