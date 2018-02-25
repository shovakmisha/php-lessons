<?php
class RoleController implements IController {
    public function getAction() {
        $fc = FrontController::getInstance();

        /* Инициализация модели */
        $model = new FileModel();

        $model->list = unserialize( file_get_contents(USER_DB) );

        $output = $model->render(USER_ROLE_FILE);

        $fc->setBody($output);
    }
}