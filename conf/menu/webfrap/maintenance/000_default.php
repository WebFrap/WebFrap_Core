<?php

$this->crumbs = array(
  array(
    'Dashboard',
    '',
    'icon-dashboard',
    null,
    'wgt-ui-desktop'
  ),
  array('Root', $this->interface.'?c=Webfrap.Navigation.explorer','icon-desktopg'),
  array('System', $this->interface.'?c=Webfrap.Base.menu&amp;menu=maintenance','icon-folder-close-alt'),
);

$this->firstEntry = array
(
  'menu-system-maintenance-root',
   Wgt::MAIN_TAB,
  '..',
  I18n::s('Root', 'wbf.label'  ),
  'maintab.php?c=Webfrap.Navigation.explorer',
  'icon-level-up',
);

$this->files[] = array
(
  'menu-system-maintenance-theme',
  Wgt::MAIN_TAB,
  'Themes',
  'Themes',
  'maintab.php?c=Daidalos.Theme.form',
  'icon-picture',
);

$this->folders[] = array
(
  'menu-system-maintenance-backup',
  Wgt::MAIN_TAB,
  'Backups',
  'Backups',
  'maintab.php?c=daidalos.base.menu&amp;menu=backup',
  'icon-hdd',
);

$this->folders[] = array
(
  'menu-system-maintenance-conf',
  Wgt::MAIN_TAB,
  'Conf',
  'Conf',
  'maintab.php?c=Webfrap.System_Conf.overview',
  'icon-cog',
);

$this->folders[] = array
(
  'menu-system-maintenance-index',
  Wgt::MAIN_TAB,
  'Semantic Index',
  'Semantic Index',
  'maintab.php?c=Maintenance.Db_Index.stats',
  'icon-screenshot',
);

$this->folders[] = array
(
  'menu-system-maintenance-manager',
  Wgt::MAIN_TAB,
  'Package Manager',
  'Package Manager',
  'maintab.php?c=Maintenance.Packages.listAll',
  'icon-puzzle-piece',
);

$this->folders[] = array
(
  'menu-system-maintenance-imports',
  Wgt::MAIN_TAB,
  'Imports',
  'Imports',
  'maintab.php?c=Webfrap.Base.Menu&menu=imports',
  'icon-upload-alt',
);

$this->folders[] = array
(
  'menu-system-maintenance-exports',
  Wgt::MAIN_TAB,
  'Exports',
  'Exports',
  'maintab.php?c=Webfrap.Base.Menu&menu=exports',
  'icon-download-alt',
);

$this->folders[] = array
(
  'menu-system-maintenance-coredata',
  Wgt::MAIN_TAB,
  'Core Data',
  'Core Data',
  'maintab.php?c=Webfrap.Base.Menu&menu=masterdata',
  'icon-list',
);

$this->folders[] = array
(
  'menu-system-maintenance-access',
  Wgt::MAIN_TAB,
  'Access',
  'Access',
  'maintab.php?c=Webfrap.Base.Menu&menu=access',
  'icon-shield',
);

$this->folders[] = array
(
  'menu-system-maintenance-process_manager',
  Wgt::MAIN_TAB,
  'Process Manager',
  'Process Manager',
  'maintab.php?c=Webfrap.Maintenance_Process.list',
  'icon-cogs',
);

$this->folders[] = array
(
  'menu-system-maintenance-planned-tasks',
  Wgt::MAIN_TAB,
  'Planned Tasks',
  'Planned Tasks',
  'maintab.php?c=Webfrap.TaskPlanner.list',
  'icon-tasks',
);

$this->folders[] = array
(
  'menu-system-maintenance-announcements',
  Wgt::MAIN_TAB,
  'News',
  'News',
  'maintab.php?c=Webfrap.Announcement.listing',
  'icon-comments',
);

$this->files[] = array
(
  'menu-system-maintenance-protocol',
  Wgt::MAIN_TAB,
  'Protocols &amp; Logs',
  'Protocols &amp; Logs',
  'maintab.php?c=Webfrap.Base.menu&amp;menu=protocols',
  'icon-list',
);

$this->files[] = array
(
  'menu-system-maintenance-database',
  Wgt::MAIN_TAB,
  'Database',
  'Database',
  'maintab.php?c=Webfrap.Base.menu&amp;menu=database',
  'icon-hdd',
);

$this->files[] = array
(
  'menu-system-maintenance-editor',
  Wgt::MAIN_TAB,
  'Editor',
  'Editor',
  'maintab.php?c=Webfrap.Editor.Workspace',
  'icon-keyboard',
);

$this->files[] = array
(
  'menu-system-maintenance-i18n',
  Wgt::MAIN_TAB,
  'I18n',
  'I18n',
  'maintab.php?c=Webfrap.Editor.Workspace',
  'icon-copy',
);

$this->files[] = array
(
  'menu-system-maintenance-components',
  Wgt::MAIN_TAB,
  'System Components',
  'System Components',
  'maintab.php?c=Webfrap.SystemComponents.overview',
  //'maintab.php?c=Webfrap.Datasources.explorer',
  'icon-th',
);


$this->files[] = array
(
  'menu-system-maintenance-services',
  Wgt::MAIN_TAB,
  'External Datasources',
  'External Datasources',
  'ajax.php?c=Webfrap.Mockup.notYetImplemented',
  //'maintab.php?c=Webfrap.Datasources.explorer',
  'icon-rss',
);

$this->files[] = array
(
  'menu-system-maintenance-status',
  Wgt::MAIN_TAB,
  'System Status',
  'System Status',
  'maintab.php?c=Webfrap.System_Status.stats',
  'icon-cog',
);

