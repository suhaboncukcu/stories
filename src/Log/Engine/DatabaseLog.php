<?php
namespace Stories\Log\Engine;
use Cake\Core\Configure;
use Cake\Log\Engine\BaseLog;
use Cake\ORM\TableRegistry;

class DatabaseLog extends BaseLog
{
	protected $_defaultConfig = [
        'levels' => [],
        'scopes' => [],
    ];

    public function __construct($options = [])
    {
        parent::__construct($options);
    }

    public function log($level, $message, array $context = [])
    {
        $model = $this->_config['model'];
        $Model = TableRegistry::get($model);



        $data = $this->getDataFromMessage(json_decode($message, TRUE));
        if(!$data) {
            return;
        }



        $data['level'] = $level;

        $entity =  $Model->newEntity();
        $Model->patchEntity($entity, $data);
        $Model->save($entity);
    }

    private function getDataFromMessage($message)
    {
        if(!is_array($message)) {
            return false;
        }
        $data = array();
        $data['ip'] = ip2long($message['ip']);
        $data['controller'] = $message['controller'];
        $data['action'] = $message['action'];
        $data['currentpath'] = $message['path'];
        $data['user_id'] = $message['user_id'];
        $data['webroot'] = $message['webroot'];
        $data['plugin'] = $message['plugin'];
        if(Configure::read('Stories.DataLogger') === true) {
            $data['data_load'] = $message['data_load'];
        }

        return $data;
    }
}