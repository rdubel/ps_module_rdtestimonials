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

        public function installTab()
        {
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

        public function installDb()
        {
            $sql = "CREATE TABLE IF NOT EXISTS `"._DB_PREFIX_."testimonials`(
                `id_testimonials` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
                `title` VARCHAR(250) NOT NULL ,
                `body` TEXT ,
                `publication_date` DATE NOT NULL) DEFAULT CHARSET=utf8";

            if (!$result=Db::getInstance()->Execute($sql)) {
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
            || !$this->installDb()
            ) {
                return false;
            }

            return true;
        }

        public function uninstallTab()
        {
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

        public function uninstallDb()
        {
            $sql = "DROP TABLE IF EXISTS `"._DB_PREFIX_."testimonials`";

            if (!$result=Db::getInstance()->Execute($sql)) {
                return false;
            }

            return true;
        }

        public function uninstall()
        {
            if (!parent::uninstall()
            || !$this->uninstallTab()
            || !$this->uninstallDb()
            ) {
                return false;
            }

            return true;
        }
    }
}
