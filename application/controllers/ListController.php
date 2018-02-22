<?php
class ListController implements IController {
    public function listAction() {
        $fc = FrontController::getInstance();

        /* Инициализация модели */
        $model = new FileModel();

        $output = $model->getUsers(USER_LIST_FILE, USER_DB);

        $fc->setBody($output);
    }
    public function getAction() {
        $fc = FrontController::getInstance();

        $params = $fc->getParams();

        /* Инициализация модели */
        $model = new FileModel();

        $model->name = $params["name"];

        $output = $model->render(USER_ROLE_FILE);

        $fc->setBody($output);
    }
}