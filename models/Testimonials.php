<?php
namespace

{
    class Testimonials extends ObjectModel
    {
        public $id_testimonials;
    	public $title;
    	public $body;
        public $publication_date;

    	public static $definition = array(
    		'table' => "testimonials",
    		'primary' => 'id_testimonials',
    		'multilang' => false,
    		'fields' => array(
    			'title' => array('type' => self::TYPE_STRING, 'validate' => 'isGenericName'),
    			'body' => array('type' => self::TYPE_HTML, 'validate' => 'isGenericName'),
                'publication_date' => array('type' => self::TYPE_DATE, 'validate' => 'isDate'),
    		),
    	);
    }
}
