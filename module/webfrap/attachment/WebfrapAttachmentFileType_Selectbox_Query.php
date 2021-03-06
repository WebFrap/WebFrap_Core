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
 * @subpackage core_item\attachment
 * @author Dominik Bonsch <dominik.bonsch@webfrap.net>
 * @copyright Webfrap Developer Network <contact@webfrap.net>
 */
class WebfrapAttachmentFileType_Selectbox_Query extends LibSqlQuery
{
/*//////////////////////////////////////////////////////////////////////////////
// Attributes
//////////////////////////////////////////////////////////////////////////////*/

/*//////////////////////////////////////////////////////////////////////////////
// Query Methodes
//////////////////////////////////////////////////////////////////////////////*/

  /**
   * Fetch method for the WbfsysFileStorage Selectbox
   * @return void
   */
  public function fetchSelectbox($profileKey)
  {

    $db = $this->getDb();

    if (!$this->criteria)
      $criteria = $db->orm->newCriteria();
    else
      $criteria = $this->criteria;

    $criteria->select(array(
      'wbfsys_file_type.rowid as id',
      'wbfsys_file_type.name as value',
      'wbfsys_file_type.description as content'
    ));

    $criteria->from('wbfsys_file_type');

    $criteria->joinOn(
      'wbfsys_file_type',
      'rowid',
      'wbfsys_file_profile_type',
      'id_type'
    );

    $criteria->joinOn(
      'wbfsys_file_profile_type',
      'id_profile',
      'wbfsys_file_profile',
      'rowid'
    );

    $criteria->orderBy('wbfsys_file_type.name ');
    $criteria->where("UPPER(wbfsys_file_profile.access_key) = UPPER('{$profileKey}')");

    $this->result = $db->orm->select($criteria);

  }//end public function fetchSelectbox */

  /**
   * Laden einer einzelnen Zeile,
   * Wird benötigt wenn der aktive Wert durch die Filter gerutscht ist.
   * Kann in archive Szenarien passieren.
   * In diesem Fall soll der Eintrag trotzdem noch angezeigt werden, daher
   * wird er explizit geladen
   *
   * @param int $entryId
   * @return void
   */
  public function fetchSelectboxEntry($entryId)
  {

    // wenn keine korrekte id > 0 übergeben wurde müssen wir gar nicht erst
    // nach einträgen suchen
    if (!$entryId)
      return array();

    $db = $this->getDb();

    $criteria = $db->orm->newCriteria();

    $criteria->select(array(
      'DISTINCT wbfsys_file_storage.rowid as id',
      'wbfsys_file_storage.name as value',
      'wbfsys_file_type.description as content'
     ));
    $criteria->from('wbfsys_file_storage');

    $criteria->where("wbfsys_file_storage.rowid = '{$entryId}'"  );

    return $db->orm->select($criteria)->get();

  }//end public function fetchSelectboxEntry */

  /**
   * Laden einer definierten Liste von Werten
   * Wird benötigt wenn die Selectbox mit der option multi
   * verwendet wird und einige der aktiven Werte durch die Filter gerutscht sind.
   * siehe auch self::fetchSelectboxEntry
   *
   * @param int $entryId
   * @return void
   */
  public function fetchSelectboxEntries($entryIds)
  {

    // wenn der array leer ist müssen wir nicht weiter prüfen
    if (!$entryIds)
      return array();

    $db = $this->getDb();

    $criteria = $db->orm->newCriteria();

    $criteria->select(array
    (
      'DISTINCT wbfsys_file_storage.rowid as id',
      'wbfsys_file_storage.name as value',
      'wbfsys_file_type.description as content'
     ));
    $criteria->from('wbfsys_file_storage');

    $criteria->where("wbfsys_file_storage.rowid IN ('".implode("', '", $entryIds)."')"  );

    return $db->orm->select($criteria)->getAll();

  }//end public function fetchSelectboxEntries */

}//end class WebfrapAttachmentFileType_Selectbox_Query

