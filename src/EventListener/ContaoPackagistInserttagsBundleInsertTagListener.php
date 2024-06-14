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
use Contao\System;


/**
 * @Hook("replaceInsertTags")
 */
class ContaoPackagistInserttagsBundleInsertTagListener
{
    private const TAG = 'packagist';

    public function __invoke(string $tag)
    {
        // we have only 3 chunks
        @[$chunk1, $chunk2, $chunk3] = explode('::', $tag);

        if (self::TAG !== $chunk1) return false;

        if (!$chunk2) return false;

        $json = json_decode(file_get_contents("https://packagist.org/search.json?q=$chunk2"));
        /* json response
        {#887 ▼
            +"results": array:1 [▼
            0 => {#886 ▼
            +"name": "pdir/maklermodul-bundle"
            +"description": "maklermodul for Contao 4"
            +"url": "https://packagist.org/packages/pdir/maklermodul-bundle"
            +"repository": "https://github.com/pdir/maklermodul-bundle"
            +"downloads": 739
            +"favers": 4
            }
          ]
          +"total": 1
        }
        */

        switch($chunk3) {
            case 'downloads':
                $result = System::getFormattedNumber(intval($json->results[0]->downloads), 0);
                break;
            case 'likes':
                $result = System::getFormattedNumber(intval($json->results[0]->favers), 0);
                break;
            default:
                return false;
        }

        return $result;
    }
}
