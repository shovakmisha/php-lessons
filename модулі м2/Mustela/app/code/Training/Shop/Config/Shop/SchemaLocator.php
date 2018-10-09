<?php
/**
 * Рідер для xsd схеми для мого shop.xml. Це може бути і обєднана схема з декількох схем у різних файлах, але в цьому тільки одна
 */
namespace Training\Shop\Config\Shop;

use Magento\Framework\Module\Dir,
    Magento\Framework\Module\Dir\Reader,
    Magento\Framework\Config\SchemaLocatorInterface;

class SchemaLocator implements SchemaLocatorInterface
{
    protected $_schema = null;

    protected  $_perFileSchema = null;

    public function __construct(Reader $moduleReader)
    {
        $etcDir = $moduleReader->getModuleDir(Dir::MODULE_ETC_DIR, "Training_Shop"); // Вказуэться папка etc модуля Training_Shop
        $this->_schema = $etcDir . '/shops.xsd'; // or /<config-file>_merged.xsd Можна валідувати зразу декілька файлів, але Вова тільки в 2-х словах про це сказав. Я тільки зрозумів що ця строчка для обєднаних xml
        $this->_perFileSchema = $etcDir . '/shops.xsd'; // Це теж для валідації, але тільки для одного файла. Тобто я вказав, що в обох випадках, треба брати одну схему
    }

    public function getSchema()
    {
        // TODO: Implement getSchema() method.

        return $this->_schema;
    }

    /**
     * @return null|string
     */
    public function getPerFileSchema()
    {
        return $this->_perFileSchema;
    }

}

?>