<?php

namespace

{
    class Rdtestimonials extends Module
    {
        public function __construct()
        {
            $this->name = 'rdtestimonials';
            $this->tab = 'front_office_features';
            $this->version = '1.0.0';
            $this->author = 'Rémy Dubel';
            $this->need_instance = 0;
            $this->ps_versions_compliancy = array('min' => '1.6', 'max' => _PS_VERSION_);
            $this->bootstrap = true;

            parent::__construct();

            $this->displayName = 'Rdtestimonials';
            $this->description = 'Testimonials for you and your shop.';

            $this->confirmUninstall ='Are you sure you want to uninstall?';
        }

        public function installTab() {
            $tab = new Tab();
            foreach (Language::getLanguages(true) as $lang) {
                $tab->name[$lang['id_lang']] = $this->l('Rdtestimonials');
            }
            $tab->module = $this->name;
            $tab->id_parent = 0;
            $tab->class_name = "AdminRdtestimonials";

            if (!$tab->add()) {
                return false;
            }

            return true;
        }

        public function install()
        {
            if (Shop::isFeatureActive()) {
                Shop::setContext(Shop::CONTEXT_ALL);
            }

            if (!parent::install()
            || !$this->installTab()
            ) {
                return false;
            }

            return true;
        }

        public function uninstallTab() {
            $moduleTabs = Tab::getCollectionFromModule($this->name);
            if (!empty($moduleTabs)) {

                foreach ($moduleTabs as $tab) {

                    if (!$tab->delete()
                    ) {
                        return false;
                    }

                }
            }
            return true;
        }

        public function uninstall()
        {
            if (!parent::uninstall()
            || !$this->uninstallTab()
            ) {
                return false;
            }

            return true;
        }

    }
}
