<?php

namespace Training\Shop\Config\Shop;

/**
 * Рідер. Залежностями для нього є Converter.php і SchemaLocator.php
 */

use Magento\Framework\Config\Reader\Filesystem;
use Training\Shop\Config\Shop\Converter;
use Training\Shop\Config\Shop\SchemaLocator;

class Reader extends Filesystem
{
    protected $_idAttributes = ['/config/shop' => 'code']; // тут указую, який атрибут є айдішником. Атрибут code y xml-ці знаходиться у тезі shop, який в свою чергу знаходиться у тезі config.
    // $_idAttributes - це для того щоб знати яка поведінка має бути, якщо у двох злитих xml-ок(може і в одної) буде ідентичний цей атрибут. Цей перезапише попередній. Як зробити інакше, я поки не знаю
    // Якщо значення атрибуту code ідентичне у двох тегів <shop>, то буде перезапис, попередный перезапишеться текущим
    // Це якось звязано з <xs:selector xpath="shop" /><xs:field xpath="@code" /> файлі shops.xsd вроді. У ньому я вказував, що це має code має бути унікальним

    /**
     * Reader constructor.
     * @param \Magento\Framework\Config\FileResolverInterface $fileResolver
     * @param \Training\Shop\Config\Shop\Converter $converter
     * @param \Training\Shop\Config\Shop\SchemaLocator $schemaLocator
     * @param \Magento\Framework\Config\ValidationStateInterface $validationState
     * @param string $fileName
     * @param array $idAttributes
     * @param string $domDocumentClass
     * @param string $defaultScope
     */

    public function __construct(
        \Magento\Framework\Config\FileResolverInterface $fileResolver,
        Converter $converter,
        SchemaLocator $schemaLocator,
        \Magento\Framework\Config\ValidationStateInterface $validationState,
        $fileName = 'shops.xml',
        $idAttributes = [],
        $domDocumentClass = 'Magento\Framework\Config\Dom',
        $defaultScope = 'global'
    ){
        parent::__construct(
            $fileResolver,
            $converter,
            $schemaLocator,
            $validationState,
            $fileName,
            $idAttributes,
            $domDocumentClass,
            $defaultScope);
    }
}

?>