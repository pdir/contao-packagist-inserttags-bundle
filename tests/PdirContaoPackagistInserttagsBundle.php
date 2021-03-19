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

namespace Pdir\ContaoPackagistInserttagsBundle\Tests;

use Pdir\ContaoPackagistInserttagsBundle\PdirContaoPackagistInserttagsBundle;
use PHPUnit\Framework\TestCase;

class PdirContaoPackagistInserttagsBundleTest extends TestCase
{
    public function testCanBeInstantiated(): void
    {
        $bundle = new PdirContaoPackagistInserttagsBundle();

        $this->assertInstanceOf('Pdir\ContaoPackagistInserttagsBundle\PdirContaoPackagistInserttagsBundle', $bundle);
    }
}
