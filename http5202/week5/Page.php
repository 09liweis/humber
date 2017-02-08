<?php
class Page {
    private $title;
    private $url;
    
    public function __construct($title, $url) {
        $this->setTitle($title);
        $this->setUrl($url);
    }
    
    public function getTitle() {
        return $this->title;
    }
    
    public function setTitle($title) {
        $this->title = $title;
    }
    
    public function getUrl() {
        return $this->url;
    }
    
    public function setUrl($url) {
        $this->url = $url;
    }
    
    public function makePage() {
        return '<h1>' . $this->title . '</h1>' . '<a target="_blank" href="' . $this->url . '">' . $this->url . '</a>';
    }
}

$page = new Page('Google', 'http://www.google.ca');
echo $page->makePage();

$humber = new Page('Humber', 'http://www.humber.ca');
echo $humber->makePage();