<?php
/**
 * Цей файл буде розбирати shop.xml в масив php. Це не універсальний конвертер, але для структури shop.xml підходить
 */
namespace Training\Shop\Config\Shop;

class Converter implements \Magento\Framework\Config\ConverterInterface
{
    public function convert($source)
    {
        $output = [];
        // TODO This is and explame of converting 'config_node' using 'node_id' as id value

        foreach($source->getElementsByTagName('shop') as $node) { // перебираю всі теги shop
            $id = $this->_getAttributeValue($node, 'code');

            $output[$id] = [
                'code'    => $id,
                'state'   => $this->_getAttributeValue($node, 'state'),
                'name'    => $this->_getAttributeValue($node, 'name'),
                'address' => $this->_getAttributeValue($node, 'address'),
                'city'    => $this->_getAttributeValue($node, 'city')
            ];
        }
        return $output;
    }

    /**
     * @param  \DOMNode $node
     * @param  $attributeName
     * @param  null $defaultValue
     * @return null|string
     *
     * Це маленький хелпер, який дозволяє читати xml-ки
     *
     */
    protected  function _getAttributeValue(\DOMNode $node, $attributeName, $defaultValue = null)
    {
        $attributeNode = $node->attributes->getNamedItem($attributeName);
        return $attributeNode
            ? $attributeNode->nodeValue
            :$defaultValue;
    }


    // protected function _g

}

?>