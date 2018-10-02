<?php

namespace Stories\Controller;

use App\Controller\AppController as BaseController;
use Cake\Core\Configure;

class AppController extends BaseController
{
    /**
     * @param $user
     * @return bool|void
     */
    public function isAuthorized($user)
    {
        if($this->Auth->user('id')) {
            $fieldValue = $this->Auth->user(Configure::read('Stories.AllowTemplates.forField'));
            $checker = Configure::read('Stories.AllowTemplates.rule');
            return $checker($fieldValue);
        }
    }

}
