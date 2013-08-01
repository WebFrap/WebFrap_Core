<?php

$this->crumbs = array(
  array('Root', $this->interface.'?c=Webfrap.Navigation.explorer','icon-desktop'),
  array('System', $this->interface.'?c=Webfrap.Base.menu&amp;menu=maintenance','icon-folder-close-alt'),
  array('Access', $this->interface.'?c=Webfrap.Base.menu&amp;menu=access','icon-folder-close-alt'),
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
  'menu-system-access-users',
  Wgt::MAIN_TAB,
  $this->view->i18n->l
  (
    'Users',
    'wbf.label'
  ),
  $this->view->i18n->l
  (
    'Users',
    'wbf.label'
  ),
  'maintab.php?c=Wbfsys.RoleUser.listing',
  'icon-user',
);

$this->files[] = array
(
  'menu-system-access-groups',
  Wgt::MAIN_TAB,
  $this->view->i18n->l
  (
    'Groups',
    'wbf.label'
  ),
  $this->view->i18n->l
  (
    'Groups',
    'wbf.label'
  ),
  'maintab.php?c=Wbfsys.RoleGroup.listing',
  'icon-group',
);

$this->files[] = array
(
  'menu-system-access-profiles',
  Wgt::MAIN_TAB,
  $this->view->i18n->l
  (
    'Profiles',
    'wbf.label'
  ),
  $this->view->i18n->l
  (
    'Profiles',
    'wbf.label'
  ),
  'maintab.php?c=Wbfsys.Profile.listing',
  'icon-mail',
);

$this->files[] = array
(
  'menu-system-acl',
  Wgt::MAIN_TAB,
  'ACLs',
  'ACLs',
  'maintab.php?c=Daidalos.Acl.form',
  'icon-shield',
);

