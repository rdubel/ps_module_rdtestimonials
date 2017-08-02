<?php
namespace

{
    class AdminRdtestimonialsController extends ModuleAdminController
    {
        public function __construct()
        {
            $this->table = "testimonials";
            $this->lang = false;
            $this->bootstrap = true;
            $this->className = "Testimonials";
            $this->fields_list = array(
                'id_testimonials' => array(
                    'title' => 'ID'
                ),
                'title' => array(
                    'title' => 'Title',
                ),
                'body' => array(
                    'title' => 'Content',
                ),
                'publication_date' => array(
                    'title' => 'Publication date',
                ),
            );
            //
            // $this->fields_form = array(
            //     'legend' => array(
            //         'title' => 'Post'
            //     ),
            //     'input' => array(
            //         array(
            //             'type' => 'text',
            //             'label' => 'Title',
            //             'name' => 'title',
            //             'size' => 25
            //         ),
            //         array(
            //             'type' => 'textarea',
            //             'label' => 'Content',
            //             'name' => 'body',
            //             'size' => 25
            //         ),
            //         array(
            //             'type' => 'date',
            //             'label' => 'Publication date',
            //             'name' => 'publication_date',
            //             'size' => 25
            //         )
            //     ),
            //     'submit' => array(
            //         'title' => 'Save'
            //     )
            // );

            $this->bulk_actions = array(
                'delete' => array(
                    'text' => 'Delete selected',
                    'confirm' => 'Delete selected items?',
                ),
            );

            // $this->addRowAction('delete');
            parent::__construct();
        }
        }
}
