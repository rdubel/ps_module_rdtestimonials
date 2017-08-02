<?php
namespace

{
/**
 * display controller
 */
    class rdtestimonialstestimonialdetailModuleFrontController extends ModuleFrontController
    {

        function initContent()
        {
            parent::initContent();
            $this->setTemplate('testimonial_detail.tpl');

            $testimonial_id = Tools::getValue('id');

            $sql = new DbQuery();
            $sql->select('*');
            $sql->from('testimonials');
            $sql->where('id_testimonials ='.$testimonial_id);

            $res = Db::getInstance()->executeS($sql);

            if ($res) {
                $this->context->smarty->assign(array(
                'testimonial' => $res
                ));
            }
        }
    }

}
