<?php
	class UserController implements IController {
		public function helloAction() {
			$fc = FrontController::getInstance();

			$params = $fc->getParams();

			/* Инициализация модели */
			$model = new FileModel();

			$model->name = $params["name"];

			$output = $model->render(USER_DEFAULT_FILE);

			$fc->setBody($output);
		}
	}