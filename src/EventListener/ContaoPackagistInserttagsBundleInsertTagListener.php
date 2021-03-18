<?php

declare(strict_types=1);

/*
 * Contao Packagist Inserttags Bundle for Contao Open Source CMS
 *
 * Copyright (c) 2021 pdir / digital agentur // pdir GmbH
 *
 * @package    contao-packagist-inserttags-bundle
 * @link       https://pdir.de/docs/de/contao/extensions/contao-packagist-inserttags-bundle/
 * @license    @license LGPL-3.0-or-later
 * @author     Mathias Arzberger <develop@pdir.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Pdir\ContaoPackagistInserttagsBundle\EventListener;

use Contao\CoreBundle\ServiceAnnotation\Hook;

/**
 * @Hook("replaceInsertTags")
 */
class ContaoPackagistInserttagsBundleInsertTagListener
{
    #{{github::pdir/maklermodul::downloads}}
    public const TAG = 'github';

    public function __invoke(string $tag)
    {
        $chunks = explode('::', $tag);

        if (self::TAG !== $chunks[0]) {
            return false;
        }

        if (!$chunks[1]) {
            return false;
        }

        if (!$chunks[2]) {
            $chunks[2] = 'QuoteChart';
        }

        $isin = $chunks[1];
        $chart = $chunks[2];

        // render html output
	    $html = <<<HTML
OK läuft
HTML;

	    return "<div class='pitb-plugin' style='width:inherit;margin:auto'>" . $html . "</div>";
    }
}
