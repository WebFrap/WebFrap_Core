<?php

$this->crumbs = array(
  array('Root', $this->interface.'?c=Webfrap.Navigation.explorer','icon-desktop'),
  array('System', $this->interface.'?c=Webfrap.Base.menu&amp;menu=maintenance','icon-folder-close-alt'),
  array('Backup', $this->interface.'?c=Webfrap.Base.menu&amp;menu=access','icon-folder-close-alt'),
);

$this->firstEntry = array(
  'menu_mod_root',
   Wgt::MAIN_TAB,
  '..',
  I18n::s('System', 'wbf.label'  ),
  'maintab.php?c=Webfrap.Base.menu&amp;menu=maintenance',
  'icon-level-up',
);

if ($acl->hasRole('developer')) {

  $this->firstEntry = array(
    'menu_mod_maintenance',
     Wgt::MAIN_TAB,
    '..',
    I18n::s('Maintenance', 'maintenance.title'  ),
    'maintab.php?c=maintenance.base.menu',
    WgtIcon::big('places/folder.png'),
  );

  $this->folders[] = array(
    'menu_mod_maintenance_backup_db',
    Wgt::MAIN_TAB,
    'backup db',
    I18n::s('backup', 'admin.title'  ),
    'index.php?c=Daidalos.BackupDb.table',
    WgtIcon::big('utilities/db_backup.png'),
  );

}
