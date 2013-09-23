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
 * @subpackage ModSync
 * @author Dominik Bonsch <dominik.bonsch@webfrap.net>
 * @copyright Webfrap Developer Network <contact@webfrap.net>
 */
class DaidalosDeployDatabase_Model extends Model
{

  /**
   * @var LibProtocolReport
   */
  protected $protocol = null;

  /**
   * @var boolean
   */
  protected $syncCol = false;

  /**
   * @var boolean
   */
  protected $forceColSync = false;

  /**
   * @var boolean
   */
  protected $syncTable = false;

/*//////////////////////////////////////////////////////////////////////////////
// Methoden
//////////////////////////////////////////////////////////////////////////////*/

  /**
   * @param boolean $sync
   */
  public function syncCol($sync)
  {
    $this->syncCol = $sync;
  }//end public function syncCol */

  /**
   * @param boolean $sync
   */
  public function forceColSync($sync)
  {
    $this->forceColSync = $sync;
  }//end public function forceColSync */

  /**
   * @param boolean $sync
   */
  public function syncTable($sync)
  {
    $this->syncTable = $sync;
  }//end public function syncTable */

  /**
   * @param array $data
   */
  public function protocol($data, $opt1 = null, $opt2 = null, $opt3 = null)
  {

    if ($this->protocol)
      $this->protocol->entry($data);

  }//end public function protocol */

/*//////////////////////////////////////////////////////////////////////////////
// Methoden
//////////////////////////////////////////////////////////////////////////////*/

  /**
   *
   */
  public function syncMetadata($rootPath = PATH_ROOT, $type = null)
  {

    $orm = $this->getOrm();
    $db = $this->getDb();
    $respsonse = $this->getResponse();

    $repos = Webfrap::getIncludePaths('metadata');

    $this->protocol = new LibProtocolReport('log/report_sync_metadata_'.date('YmdHis').'.html');

    $this->protocol->head(array(
      'Type',
      'Key',
      'Entity',
      'Message'
    ));

    $deployRevision = $db->nextVal('wbf_deploy_revision');

    if (!$type) {

      $this->syncMetadata_ByType( 'security_area', $repos, $deployRevision, $rootPath);
      $this->syncMetadata_ByType( 'desktop',$repos, $deployRevision, $rootPath);
      $this->syncMetadata_ByType( 'desktop_mainmenu',$repos, $deployRevision, $rootPath);
      $this->syncMetadata_ByType( 'desktop_profilemenu',$repos, $deployRevision, $rootPath);
      $this->syncMetadata_ByType( 'profile', $repos, $deployRevision, $rootPath);
      $this->syncMetadata_ByType( 'role',$repos, $deployRevision, $rootPath);

      $this->syncMetadata_ByType( 'module', $repos, $deployRevision, $rootPath);
      $this->syncMetadata_ByType( 'module_category', $repos, $deployRevision, $rootPath);
      $this->syncMetadata_ByType( 'module_access', $repos, $deployRevision, $rootPath);

      $this->syncMetadata_ByType( 'entity', $repos, $deployRevision, $rootPath);
      $this->syncMetadata_ByType( 'entity_ref', $repos, $deployRevision, $rootPath);
      $this->syncMetadata_ByType( 'entity_access', $repos, $deployRevision, $rootPath);

      $this->syncMetadata_ByType( 'management', $repos, $deployRevision, $rootPath);
      $this->syncMetadata_ByType( 'management_ref', $repos, $deployRevision, $rootPath);
      $this->syncMetadata_ByType( 'management_element', $repos, $deployRevision, $rootPath);
      $this->syncMetadata_ByType( 'management_access', $repos, $deployRevision, $rootPath);
      $this->syncMetadata_ByType( 'management_maintenance', $repos, $deployRevision, $rootPath);
      $this->syncMetadata_ByType( 'management_acl', $repos, $deployRevision, $rootPath);

      $this->syncMetadata_ByType( 'process', $repos, $deployRevision, $rootPath);
      $this->syncMetadata_ByType( 'item', $repos, $deployRevision, $rootPath);
      $this->syncMetadata_ByType( 'widget', $repos, $deployRevision, $rootPath);
      $this->syncMetadata_ByType( 'period', $repos, $deployRevision, $rootPath);

    } else {

      $this->syncMetadata_ByType( 'management_ref', $repos, $deployRevision, $rootPath);
    }

  }//end public function syncMetadata */



  /**
   * @param LibDbOrm $orm
   * @param array $modules
   * @param int $deployRevision
   * @param string $rootPath
   */
  public function syncMetadata_ByType( $type, $modules, $deployRevision, $rootPath  )
  {

    $orm = $this->getOrm();
    $user = $this->getUser();
    $acl = $this->getAcl();
    $aclManager = $acl->getManager();
    $respsonse = $this->getResponse();

    $this->protocol->paragraph( SParserString::subToName($type) );

    foreach ($modules as $module) {

      $folder = new LibFilesystemFolder($rootPath.$module.'/data/metadata/'.$type.'/');
      $files = $folder->getFilesByEnding('.php');

      foreach ($files as $file)
        include $file;

      $folder = new LibFilesystemFolder($rootPath.$module.'/sandbox/data/metadata/'.$type.'/');

      $files = $folder->getFilesByEnding('.php');

      foreach ($files as $file)
        include $file;

    }

  }//end public function syncMetadata_ByType */

/*//////////////////////////////////////////////////////////////////////////////
// Methoden
//////////////////////////////////////////////////////////////////////////////*/

  /**
   *
   */
  public function syncDatabase($rootPath = PATH_ROOT)
  {

    $respsonse = $this->getResponse();
    $gmods = Webfrap::getIncludePaths('metadata');

    $dbAdmin = new LibDbAdminPostgresql($this->getDb());

    $allTables = array();
    $tmp = $dbAdmin->getDbTables();

    foreach ($tmp as $tab) {
      $allTables[$tab['name']] = $tab['name'];
    }

    foreach ($gmods as $gmod) {
      $folder = new LibFilesystemFolder($rootPath.$gmod.'/data/metadata/structure/postgresql/');

      $files = $folder->getFilesByEnding('.php');

      foreach ($files as $file)
        include $file;

      $folder = new LibFilesystemFolder($rootPath.$gmod.'/sandbox/data/metadata/structure/postgresql/');

      $files = $folder->getFilesByEnding('.php');

      foreach ($files as $file)
        include $file;

    }

    foreach ($allTables as $tableName) {
      if ($this->syncTable) {
        $this->getResponse()->addError('Dropped Table: '.$tableName.' cause it was not described in the model');
        $dbAdmin->dropTable($tableName);
      } else {
        $this->getResponse()->addError('Table: exists '.$tableName.' but is not described in the model');
      }

    }

  }//end public function syncDatabase */

  /**
   * synchronize the default data from the model with the actual database
   * @param string $rootPath
   */
  public function syncData($rootPath = PATH_ROOT)
  {

    $orm = $this->getOrm();
    $response = $this->getResponse();

    $dataPaths = Webfrap::getIncludePaths('metadata');
    foreach ($dataPaths as $dataPath) {

      $folder = new LibFilesystemFolder($rootPath.$dataPath.'/data/metadata/data/');
      $files = $folder->getFilesByEnding('.php');

      foreach ($files as $file) {

        try {
          include $file;
        } catch (LibDb_Exception $e) {
          $response->addError($e->getMessage());
        }

      }

      // sandbox
      $folder = new LibFilesystemFolder($rootPath.$dataPath.'/sandbox/data/metadata/data/');
      $files = $folder->getFilesByEnding('.php');

      foreach ($files as $file) {

        try {

          include $file;
        } catch (LibDb_Exception $e) {

          $response->addError($e->getMessage());
        }

      }

    }

  }//end public function syncData */

}//end class DaidalosDeploy_Model

