<?php
/**
 * Setup utilities for Questions installer
 *
 * @category  Mustela
 * @package   Mustela\Questions
 * @author    Mykhaylo Shovak <mysho@smile.fr>
 * @copyright 2017 Smile
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
namespace Mustela\Questions\Setup;

/**
 * Class InstallSetup
 * @package Mustela\Questions
 */
class InstallSetup extends \Mustela\VersionsCms\Setup\InstallSetup
{
    /**
     * Return optional field values (e.g. top_menu_visibility) to override defaults for given node.
     *
     * @param string $label        Node label
     * @param int    $parentNodeId Node parent id
     * @param int    $sortOrder    Node sort order
     * @param int    $level        Node level in the tree
     * @SuppressWarnings(Unused)
     *
     * @return array
     */
    protected function getAdditionalData($label, $parentNodeId, $sortOrder, $level)
    {
        $menuExcluded      = $level > 3 ? 1 : 0;
        $topMenuVisibility = $level == 1;

        return [
            'top_menu_excluded'   => $menuExcluded,
            'menu_excluded'       => $menuExcluded,
            'top_menu_visibility' => $topMenuVisibility,
        ];
    }
}
