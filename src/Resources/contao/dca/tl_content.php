<?php


$GLOBALS['TL_DCA']['tl_content']['palettes']['hero-section'] = "{type_legend},type;{headline_legend},headline;{image_legend},text,singleSRC,imageUrl;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID;{invisible_legend:hide},invisible,start,stop;'";

$GLOBALS['TL_DCA']['tl_content']['fields']['text']['load_callback'][] = array('tl_content_hero_content','removeMandatory');

class tl_content_hero_content{
    public function removeMandatory($value, \Contao\DataContainer $dc){
        if($dc->activeRecord->type === 'hero-section'){
            $GLOBALS['TL_DCA']['tl_content']['fields']['text']['eval']['mandatory'] = false;
        }
        return $value;
    }
}