<?php
namespace

{
    /**
    * display controller
    */
    class rdtestimonialstestimonialslistModuleFrontController extends ModuleFrontController
    {

        function initContent()
        {
            parent::initContent();
            $this->setTemplate('testimonials_list.tpl');

            $sql = new DbQuery();
            $sql->select('*');
            $sql->from('testimonials');

            $testimonials_list = Db::getInstance()->executeS($sql);

            if ($testimonials_list) {
                var_dump($testimonials_list);
                $this->context->smarty->assign(array(
                    'testimonials' => $testimonials_list,
                ));

            }

        }
    }

}
