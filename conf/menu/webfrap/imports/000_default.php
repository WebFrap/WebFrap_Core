<?php

$this->crumbs = array(
  array('Root', $this->interface.'?c=Webfrap.Navigation.explorer','icon-desktop'),
  array('System', $this->interface.'?c=Webfrap.Base.menu&amp;menu=maintenance','icon-folder-close-alt'),
  array('Imports', $this->interface.'?c=Webfrap.Base.menu&amp;menu=imports','icon-folder-close-alt'),
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

