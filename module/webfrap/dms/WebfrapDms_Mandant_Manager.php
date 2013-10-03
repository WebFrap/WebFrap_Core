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
 * Verwaltung der Mandaten Spezifischen Ordner
 *
 * @package WebFrap
 * @subpackage Groupware
 * @author Dominik Bonsch <dominik.bonsch@webfrap.net>
 * @copyright Webfrap Developer Network <contact@webfrap.net>
 */
class WebfrapDms_Mandant_Manager extends Manager
{
/*//////////////////////////////////////////////////////////////////////////////
// Methodes
//////////////////////////////////////////////////////////////////////////////*/


  /**
   * Erstellen einer Ordner Struktur für den Mandaten
   * @param int $mandantId
   */
  public function createMandantRoot( $mandantId )
  {

    $orm = $this->getOrm();

    $mandant = $orm->get('WbfsysRoleMandant', $mandantId);

    $folderStructure = $orm->newEntity('FolderStructure');
    $folderStructure->vid = $mandantId;
    $folderStructure->description = 'The Root folder for Mandant '.$mandant->name;

    $orm->save($folderStructure);

  }//end public function createMandantRoot */




} // end class WebfrapDms_Mandant_Manager

