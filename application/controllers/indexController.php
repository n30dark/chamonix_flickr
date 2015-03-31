<?php
/**
 * Micro MVC
 *
 * Index Controller
 *
 * This is the controller for the Index
 *
 * @author    Sergio Paulino <me@sergiopaulino.net>
 * @link      http://www.sergiopaulino.net
 * @copyright Copyright (c) Sérgio Paulino
 * @license   All rights reserved
 */

class IndexController{

    protected $_model;
    protected $_controller;
    protected $_action;
    protected $_view;
    protected $_modelBaseName;

    public function __construct($model, $action)
    {
        $this->_controller = ucwords(__CLASS__);
        $this->_action = $action;
        $this->_modelBaseName = $model;

        $this->_view = new View(HOME . DS . 'views' . DS . strtolower($this->_modelBaseName) . DS . $action . '.phtml');
    }

    protected function _setModel($modelName)
    {
        $modelName .= 'Model';
        $this->_model = new $modelName();
    }

    protected function _setView($viewName)
    {
        $this->_view = new View(HOME . DS . 'views' . DS . strtolower($this->_modelBaseName) . DS . $viewName . '.phtml');
    }

    public function index() {

        try{
            return $this->_view->output();

        } catch (Exception $e) {
            echo "Application error: " . $e->getMessage();
        }

    }

    public function getFlickrImages() {

        $rsp = simplexml_load_file("https://api.flickr.com/services/feeds/photos_public.gne?tags=chamonix,ski,snow");

        $photos = array();

        foreach($rsp->entry as $photo)
        {
            $photos[] = new FlickrImage($photo);
        }

        echo json_encode($photos);

    }

}
