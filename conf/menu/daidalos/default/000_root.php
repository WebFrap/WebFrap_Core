<?php

$this->crumbs = array(
  array(
    'Dashboard',
    '',
    'icon-dashboard',
    null,
    'wgt-ui-desktop'
  ),
  array('Root',$this->interface.'?c=Webfrap.Navigation.explorer','icon-desktop'),
  array('Daidalos',$this->interface.'?c=Daidalos.Base.menu','icon-folder-close-alt'),
);


if ($acl->hasRole('developer')) {

  $this->firstEntry = array(
    'menu_webfrap_root',
    Wgt::MAIN_TAB,
    '..',
    'Webfrap Root',
    'maintab.php?c=Webfrap.Navigation.explorer',
    'icon-level-up',
  );

  $this->files[] = array(
    'menu_mod_daidalos_database',
    Wgt::MAIN_TAB,
    'Database',
    'Database',
    'maintab.php?c=Daidalos.Db.listing',
    'icon-hdd',
  );

  $this->files[] = array(
    'menu_mod_daidalos_bdl_modeller',
    Wgt::MAIN_TAB,
    'BDL Modeller',
    'BDL Modeller',
    'maintab.php?c=Daidalos.BdlModeller.listing',
    'icon-cloud',
  );

  $this->files[] = array(
    'menu_developer_example',
    Wgt::MAIN_TAB,
    'Coding Examples',
    'Coding Examples',
    'maintab.php?c=Example.Base.menu',
    'icon-code',
  );

}
