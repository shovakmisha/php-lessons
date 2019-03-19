<?php

class IGN_Siteblocks_Adminhtml_SiteblocksController extends Mage_Adminhtml_Controller_Action {

    public function indexAction() // example.com/admin/test/mytest
    {
        $this->loadLayout();
        $this->_addContent($this->getLayout()->createBlock('siteblocks/adminhtml_siteblocks'));
        $this->renderLayout();
    }

    public function newAction() // на цей екшн веде кнопка "Add new block"
    {
        $this->_forward('edit'); // Коли він на неї нажме, то перейде на сторінку редагування рядка таблиці - editAction()
    }


    public function editAction()
    {
        $id = $this->getRequest()->getParam('block_id');

        Mage::register('siteblocks_block',Mage::getModel('siteblocks/block')->load($id));
        $blockObject = (array)Mage::getSingleton('adminhtml/session')->getBlockObject(true); // при збереженні форми в saveAction() я вказав, що якщо дані не збережуться в базу, кинь користувача знов на цю сторінку і дані які він ввів поклади у Mage::getSingleton('adminhtml/session')->setBlockObject();
        if(count($blockObject)) { // можливо регістр якось звязаний з сесіями
            Mage::registry('siteblocks_block')->setData($blockObject); // У регістрі будуть дані, які користувач хотів зберегти в базу, але була помилка
        }

        // Якщо користувач нажав на "Add new block" то ці строчки вверху нічого не дадуть.
        // Mage::register('siteblocks_block',Mage::getModel('siteblocks/block')->load($id)); теж нічого не дасть так як не загрузиться з таблиці рядок.
        // У змінній $id нічого не має. Тобто після клацання на "Add new block" я перехожу у $this->_addContent($this->getLayout()->createBlock('siteblocks/adminhtml_siteblocks_edit')

        $this->loadLayout();

        /**
         * вывод блока вкладок на странице
         *
         * Але я закоментував цей код, Я виводив вкладки через лейаут app/design/adminhtml/default/default/layout/siteblocks.xml
         */
        // $this->_addLeft($this->getLayout()->createBlock('siteblocks/adminhtml_siteblocks_edit_tabs'));

        $this->_addContent($this->getLayout()->createBlock('siteblocks/adminhtml_siteblocks_edit'));

        $this->renderLayout();
    }


    /**
     * @return IGN_Siteblocks_Adminhtml_SiteblocksController|Mage_Core_Controller_Varien_Action
     *
     * логіка тут буде така що мені треба буде зберегти дані, якщо не вийде викинути ексепшн.
     *
     * І в залежності від того чи я нажав конопку зберегти або зберегти і продовжити перенаправити на користувача на сторінку
     */
    public function saveAction()
    {
        try {
            $id = $this->getRequest()->getParam('block_id');

           // var_dump($id);
           // die();

            $block = Mage::getModel('siteblocks/block')->load($id); // у змінній $block по любому буде обєкт моделі - http://joxi.ru/a2XzQoki1n9WNr




            #ниже следует участок для сохранения условий
            /**
             * Знову ж таки. У сторінки в якоъ я скопіював  цей функцонал з конфішнами, форма теж відправляється на  saveAction()
             *
             * Тож я заліз у його метод saveAction(), подивив що там і взяв потрібний мені функціонал
             */
            $data = $this->getRequest()->getParams();
            if (isset($data['rule']['conditions'])) {
                $data['conditions'] = $data['rule']['conditions'];
            }
            unset($data['rule']);

            #вместо setData используем loadPost
            $block->loadPost($data);


            /**
             * це для картинок
             *
             * используем метод загрузки файлов
             */
            $this->_uploadFile('image', $block);

            // Кароче че лайфхак. Якщо я передав через медіаквері айдішку рядка який треба редагувати, то вона відредагується. Якщо не передав, стровиться новий рядок з новою айдішкою
            $block
                ->setTitle($this->getRequest()->getParam('title'))
                ->setContent($this->getRequest()->getParam('content'))
                ->setImage($block->getImage())
                ->setBlockStatus($this->getRequest()->getParam('block_status'))
                ->setCreatedAt(Mage::app()->getLocale()->date())
                ->save();

            // $block
            //     ->setData($this->getRequest()->getParams())
            //     ->setCreatedAt(Mage::app()->getLocale()->date())
            //     ->save();

            if(!$block->getId()) { // $block->getId - це прімарі кей. Тобто block_id. Вверху я зберіг рядок в таблицю. І не важливо чи це новий був чи відредагований, у нього ($block - текущий рядок) має бути прімарі кей
                Mage::getSingleton('adminhtml/session')->addError('Cannot save the block');
            }
        } catch(Exception $e) {
            Mage::logException($e);
            Mage::getSingleton('adminhtml/session')->addError($e->getMessage()); // Фішка у тому, що це повідомлення відобразиться на сторінці, яка загрузиться після цієї
            Mage::getSingleton('adminhtml/session')->setBlockObject($block->getData()); // Дані які користувач ввів у форму, збережуться у сесіях і їх можна буде витягти. Типу якщо дані не збереглись, то щоб не поверталась пуста форма
            return  $this->_redirect('*/*/edit',array('block_id'=>$this->getRequest()->getParam('block_id'))); // Якщо не вдалось зберегти дані, мене поверне на сторінку редагування рядка. Якшо параметра getParam('block_id') не має, то на сторінку створення нового рядка
        }

        Mage::getSingleton('adminhtml/session')->addSuccess('Block was saved successfully!');

        /**
         * Якщо дані збереглись і не було помилки. Редіректни
         *
         * або на індекс екшн (сторінка гріда) (якщо була нажати кнопка сейв)
         *
         * або на цю ж саму сторінку якщо була нажата сторінку сейв енд едіт
         *
         */
        $this->_redirect('*/*/'.$this->getRequest()->getParam('back','index'),array('block_id'=>$block->getId())); // хз чому він так прописує редіректи
    }

    /**
     * @throws Exception
     *
     * Це якась дефолтна тема. Я ніде не назначав цей екшн. Але при кліку на кнопку 'delete' перенаправляє сюди
     */
    public function deleteAction()
    {
        $block = Mage::getModel('siteblocks/block')
            ->setId($this->getRequest()->getParam('block_id')) // Я вроді не передавав йому айдішку. Воно просто якось установилось скріптом - http://joxi.ru/12MzjodiMV9WOA
            ->delete();
        if($block->getId()) { // Як бачу, навіть після видалення рядка, його дані зберігаються у об'єкті
            Mage::getSingleton('adminhtml/session')->addSuccess('Block was deleted successfully!');
        }
        $this->_redirect('*/*/');

    }


    public function massStatusAction()
    {
        $statuses = $this->getRequest()->getParams();
        try {
            $blocks= Mage::getModel('siteblocks/block')
                ->getCollection()
                ->addFieldToFilter('block_id',array('in'=>$statuses['massaction']));
            foreach($blocks as $block) {
                $block->setBlockStatus($statuses['block_status'])->save();
            }
        } catch(Exception $e) {
            Mage::logException($e);
            Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
            return $this->_redirect('*/*/');
        }
        Mage::getSingleton('adminhtml/session')->addSuccess('Blocks were updated!');

        return $this->_redirect('*/*/');

    }

    public function massDeleteAction()
    {
        $blocks = $this->getRequest()->getParams(); // Я не передавав вручну ці параметри екшну. Це сама маджента
        try {
            $blocks= Mage::getModel('siteblocks/block')
                ->getCollection()
                ->addFieldToFilter('block_id',array('in'=>$blocks['massaction'])); // цей фільтр можна зпиисати - in. Це теж якесь мажентівське, що айдішки записались в massaction
            foreach($blocks as $block) {
                $block->delete();
            }
        } catch(Exception $e) {
            Mage::logException($e);
            Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
            return $this->_redirect('*/*/');
        }
        Mage::getSingleton('adminhtml/session')->addSuccess('Blocks were deleted!');

        return $this->_redirect('*/*/');

    }

    /**
     * @param $fieldName
     * @param $model
     * @return bool
     *
     * метод загрузки файлов
     */
    protected function _uploadFile($fieldName,$model)
    {

        if( ! isset($_FILES[$fieldName])) {
            return false;
        }
        $file = $_FILES[$fieldName];

        if(isset($file['name']) && (file_exists($file['tmp_name']))){
            if($model->getId()){
                unlink(Mage::getBaseDir('media').DS.$model->getData($fieldName));
            }
            try
            {
                $path = Mage::getBaseDir('media') . DS . 'siteblocks' . DS;
                $uploader = new Varien_File_Uploader($file);
                $uploader->setAllowedExtensions(array('jpg','png','gif','jpeg'));
                $uploader->setAllowRenameFiles(true);
                $uploader->setFilesDispersion(false);

                $uploader->save($path, $file['name']);
                $model->setData($fieldName,$uploader->getUploadedFileName());
                return true;
            }
            catch(Exception $e)
            {
                return false;
            }
        }
    }

}

