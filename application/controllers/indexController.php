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

class IndexController extends AbstractController {

    public function index() {

        try{
            $images = $this->getFlickrImages();
            $this->_view->set('flickrImages', $images);

            return $this->_view->output();

        } catch (Exception $e) {
            echo "Application error: " . $e->getMessage();
        }

    }

    public function getFlickrImages() {

        $rsp = simplexml_load_file("https://api.flickr.com/services/feeds/photos_public.gne?tags=chamonix,ski,snow");
        foreach($rsp->photos->photo as $photo)
        {
            echo "<pre>";
            print_r($photo);
            echo "</pre>";
            exit;
        }

    }

}
