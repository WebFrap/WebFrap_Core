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
  array('Example',$this->interface.'?c=Example.Base.menu','icon-folder-close-alt'),
);

if ($acl->hasRole('developer')) {

  $this->firstEntry = array(
    'menu_webfrap_root',
    Wgt::MAIN_TAB,
    '..',
    'Webfrap Root',
    'maintab.php?c=Daidalos.Base.menu',
    'icon-level-up',
  );

  $this->files[] = array(
    'menu_mod_example-wgt',
    Wgt::MAIN_TAB,
    'WGT',
    'WGT',
    'maintab.php?c=Example.Wgt.tree',
    'icon-laptop',
  );

  $this->files[] = array(
    'menu_mod_example-tech',
    Wgt::MAIN_TAB,
    'Tech &amp; Libs',
    'Tech &amp; Libs',
    'maintab.php?c=Example.Tech.tree',
    'icon-laptop',
  );

}
