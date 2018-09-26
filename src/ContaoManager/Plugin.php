<?php

/**
 * @copyright 2017 Webrealisierung GmbH
 *
 * @license LGPL-3.0+
 */

namespace Wr\HeroBundle\ContaoManager;

use Wr\HeroBundle\WrHeroBundle;
use Contao\CoreBundle\ContaoCoreBundle;
use Contao\ManagerPlugin\Bundle\BundlePluginInterface;
use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;

/**
 * @author Daniel Steuri <mail@webrealisierung.ch>
 * @package Wr\HeroBundle
 */
class Plugin implements BundlePluginInterface
{
    /**
     * {@inheritdoc}
     */
    public function getBundles(ParserInterface $parser)
    {
        return [
            BundleConfig::create(WrHeroBundle::class)
                ->setLoadAfter([ContaoCoreBundle::class]),
        ];
    }
}
