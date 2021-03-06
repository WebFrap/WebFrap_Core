<?php

$this->crumbs = array(
  array('Root', $this->interface.'?c=Webfrap.Navigation.explorer','icon-desktop'),
  array('System', $this->interface.'?c=Webfrap.Base.menu&amp;menu=maintenance','icon-folder-close-alt'),
  array('Protocols', $this->interface.'?c=Webfrap.Base.menu&amp;menu=protocols','icon-folder-close-alt'),
);

$this->firstEntry = array
(
  'menu_mod_root',
   Wgt::MAIN_TAB,
  '..',
  I18n::s('Root', 'wbf.label'  ),
  'maintab.php?c=Webfrap.Base.menu&amp;menu=maintenance',
  'icon-level-up',
);

$this->files[] = array
(
  'menu-system-protocols-login',
  Wgt::MAIN_TAB,
  'Logon Protocol',
  'Logon Protocol',
  'maintab.php?c=Wbfsys.ProtocolUsage.listing',
  'icon-list',
);

$this->files[] = array
(
  'menu-system-protocols-messages',
  Wgt::MAIN_TAB,
  'Mesage Protocol',
  'Mesage Protocol',
  'maintab.php?c=Wbfsys.MessageLog.listing',
  'icon-list',
);

$this->files[] = array
(
  'menu-system-protocols-usage',
  Wgt::MAIN_TAB,
  'Usage Protocol',
  'Usage Protocol',
  'maintab.php?c=Wbfsys.ProtocolMessage.listing',
  'icon-list',
);

$this->files[] = array
(
  'menu-system-protocols-error',
  Wgt::MAIN_TAB,
  'Error Protocol',
  'Error Protocol',
  'maintab.php?c=Wbfsys.ProtocolMessage.listing',
  'icon-list',
);

$this->files[] = array
(
  'menu-system-protocols-deploment',
  Wgt::MAIN_TAB,
  'Deployment Protocol',
  'Deployment Protocol',
  'maintab.php?c=Wbfsys.ProtocolMessage.listing',
  'icon-list',
);

$this->files[] = array
(
  'menu-system-protocols-security',
  Wgt::MAIN_TAB,
  'Attack Protocol',
  'Attack Protocol',
  'maintab.php?c=Wbfsys.ProtocolMessage.listing',
  'icon-list',
);

$this->files[] = array
(
  'menu-system-protocols-apache',
  Wgt::MAIN_TAB,
  'Apache Logs',
  'Apache Logs',
  'maintab.php?c=Webfrap.Log_Apache.listing',
  'icon-list',
);

$this->files[] = array
(
  'menu-system-protocols-php',
  Wgt::MAIN_TAB,
  'PHP Error Log',
  'PHP Error Log',
  'maintab.php?c=Webfrap.Log_Php.listing',
  'icon-list',
);

$this->files[] = array
(
  'menu-system-protocols-postgresql',
  Wgt::MAIN_TAB,
  'PostgreSQL Error Log',
  'PostgreSQL Error Log',
  'maintab.php?c=Webfrap.Log_Postgresql.listing',
  'icon-list',
);