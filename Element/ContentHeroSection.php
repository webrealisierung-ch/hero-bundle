<?php


namespace Wr\HeroBundle\Element;


class ContentHeroSection extends  \ContentElement
{
    /**
     * Template
     * @var string
     */
    protected $strTemplate = 'ce_hero-section';


    /**
     * Display a wildcard in the back end
     *
     * @return string
     */
    public function generate()
    {
        if (TL_MODE == 'BE')
        {
            /** @var BackendTemplate|object $objTemplate */
            $objTemplate = new \BackendTemplate('be_wildcard');

            $objTemplate->wildcard = '### Hero Section ###';
            return $objTemplate->parse();
        }
        return parent::generate();
    }


    /**
     * Generate the module
     */
    protected function compile()
    {

        if ($this->singleSRC != '')
        {
            $objModel = \FilesModel::findByUuid($this->singleSRC);

            if ($objModel !== null && is_file(TL_ROOT . '/' . $objModel->path))
            {
                $this->singleSRC = $objModel->path;
                $this->addImageToTemplate($this->Template, $this->arrData, null, null, $objModel);
            }
        }
    }
}
