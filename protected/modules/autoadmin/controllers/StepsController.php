<?php

class StepsController extends Controller
{
    public function actionStepsList()
    {
        $this->pageTitle = 'Кроки';

        $this->module->tableName('step');
        $this->module->setPK('stepID');
        $fieldsConf = array(
            array('language', 'string', 'Мова', array('show')),
            array('stepNumber', 'num', 'Номер', array('show')),
            array('stepTitle', 'string', 'Заголовок кроку', array('show')),
            array('stepImage', 'image', 'Фото', array('show', 'directoryPath'=>'/../css/images')),
            array('stepText', 'text', 'Текст', array('show', 'directoryPath'=>'./')),
        );

        $this->module->fieldsConf($fieldsConf);
        $this->module->sortDefault(array('stepNumber'));
        $this->module->process();
    }
}