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

            $testimonials = [];
            $testimonials_list = Db::getInstance()->executeS($sql);

            if ($testimonials_list) {
                foreach ($testimonials_list as $testimonial) {

                    $testimonial['link'] = $this->context->link->getModuleLink('rdtestimonials', 'testimonialdetail', array('id' => $testimonial['id_testimonials']));
                    $testimonials[] = $testimonial;

                }

            $this->context->smarty->assign(array(
                'testimonials' => $testimonials,
            ));
            }

        }
    }

}
