<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Unit1\CustomConfig\Model;

use Magento\Framework\Config\CacheInterface;
use Magento\Framework\Config\ReaderInterface;

class Config extends \Magento\Framework\Config\Data
{
    /**
     * Config constructor.
     * @param Config\Reader $reader
     * @param CacheInterface $cache
     * @param string $cacheId
     * phpcs:disable Generic.CodeAnalysis.UselessOverridingMethod
     */
    public function __construct(ReaderInterface $reader, CacheInterface $cache, $cacheId = '')
    {
        parent::__construct($reader, $cache, $cacheId);
    }
}
