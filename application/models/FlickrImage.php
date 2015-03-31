<?php
/**
 *
 * Chamonix Flickr Gallery
 *
 * Flickr Image Object
 *
 * This is the class for an image
 *
 * @author    Sergio Paulino <me@sergiopaulino.net>
 * @link      http://www.sergiopaulino.net
 * @copyright Copyright (c) Sérgio Paulino
 * @license   All rights reserved
 */

class FlickrImage {

    public $title;
    public $link;
    public $image;
    public $author;

    public function __construct($data) {

        $this->title = $data->title;
        $this->link = $data->link[0]->attributes("", false)->href;
        $this->image = $data->link[1]->attributes("", false)->href;
        $this->author = $data->author->name;

    }

}
