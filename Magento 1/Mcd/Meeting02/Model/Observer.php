<?php

class Mcd_Meeting02_Model_Observer
{
    /**
     * @param Varien_Event_Observer $observer
     */
    public function controllerActionPredispatchCmsPageView( Varien_Event_Observer $observer )
    {
        $action = $observer->getControllerAction();
        $pathInfo = $action->getRequest()->getPathInfo();
        if( mb_strstr($pathInfo, '/home') !== false ) {
            $action->getPesponse->setRedirect(Mage::getBaseUrl());
            $action->getRequest()->setDispatched(true);
        }
    }

    public function controllerFrontInitBefore( Varien_Event_Observer $observer )
    {
        if( version_compare( Mage::getVersion(), '1.4.0', '<' ) ) {
            Mage::getConfig()->setNode('global/helpers/payment/rewrite/data', 'Mcd_Meeting02_Helper_Payment_Data');
        }
    }
}