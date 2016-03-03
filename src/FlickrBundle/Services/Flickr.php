<?php

namespace FlickrBundle\Services;

use Symfony\Component\HttpFoundation\RequestStack;

class Flickr
{

    const TOKEN = "90686b1b8572771afaa6357530b4cf87";
    /**
     * @var int
     */
    private $per_page;
    /**
     * @var string
     */
    private $format;

    public function __construct()
    {
//        $this->container = $container;
        $this->per_page = 50;
        $this->format = 'php_serial';
    }

    public function search($query = null)
    {
        $args = [];
        $args['api_key'] = self::TOKEN;
        $args['format'] = $this->format;
        $args['per_page'] = $this->per_page;
        $args['method'] = empty($query)?'flickr.photos.getRecent':'flickr.photos.search';

        $url = 'http://flickr.com/services/rest/?';
        $search = $url . http_build_query($args);
        $result = file_get_contents($search);

        if ($this->format == 'php_serial')
            $result = unserialize($result);
        return $result;
    }

    public function setFormat($format){
        $this->format = $format;
    }
    public function setPerPage($per_page){
        $this->per_page = $per_page;
    }

}
