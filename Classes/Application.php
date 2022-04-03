<?php

include '../../Classes/Language.php';

class Application
{
    public $base_url = null;
    public $default_lang = "en";
//    public $lang = null;

    function get_word($word) {
        $lang = new Language();
        return $lang->get_word($this->default_lang, $word);
    }

}


