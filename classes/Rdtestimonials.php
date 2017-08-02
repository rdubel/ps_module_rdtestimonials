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

        public function install()
        {
            if (Shop::isFeatureActive()) {
                Shop::setContext(Shop::CONTEXT_ALL);
            }

            if (!parent::install()
            ) {
                return false;
            }

            return true;
        }


        public function uninstall()
        {
            if (!parent::uninstall()
            ) {
                return false;
            }

            return true;
        }

    }
}
