<?php

$this->crumbs = array(
  array('Root', $this->interface.'?c=Webfrap.Navigation.explorer','icon-desktop'),
  array('System', $this->interface.'?c=Webfrap.Base.menu&amp;menu=maintenance','icon-folder-close-alt'),
  array('Database', $this->interface.'?c=Webfrap.Base.menu&amp;menu=database','icon-folder-close-alt'),
);

$this->firstEntry = array(
  'menu_mod_root',
   Wgt::MAIN_TAB,
  '..',
  I18n::s('Root', 'wbf.label'  ),
  'maintab.php?c=Webfrap.Base.menu&amp;menu=maintenance',
  'icon-level-up',
);

$this->files[] = array(
  'menu-system-maintenance-db-consistency',
  Wgt::AJAX,
  'Db Concistency',
  'Db Concistency',
  'maintab.php?c=Maintenance.DbConsistency.table',
  'utilities/db.png',
);

$this->files[] = array(
  'menu-system-maintenance-db-queries',
  Wgt::AJAX,
  'Db Queries',
  'Db Queries',
  'maintab.php?c=Webfrap.Db_QueryManager.table',
  'utilities/db.png',
);


