<?php 

class RssField extends CI_Controller{
    
    public function __construct()
    {
        parent::__construct();
        
        $this->load->helper('url');
        
    }
    public function index()
    {
        $url = "https://www.thehindu.com/news/national/?service=rss";
        $content = file_get_contents($url);
        $rss_objects = new SimpleXMLElement($content);
        foreach ($rss_objects->channel->item as $key => $rss_object) {
            $media_elements = $rss_object->children('http://search.yahoo.com/mrss/');
            $media_url = '';
            foreach ($media_elements as $media) {
                if ($media->getName() == 'content') {
                    $attributes = $media->attributes();
                    if ($attributes['medium'] == 'image') {
                        $media_url = (string) $attributes['url'];
                        break;
                    }
                }
            }
            $data[]=[
                'title'=>$rss_object->title,
                'description'=>$rss_object->description,
                'link'=>$rss_object->link,
                'category'=>$rss_object->category,
                'pubDate'=>$rss_object->pubDate,
                'media_url'=>$media_url
            ];
        }
        $this->load->view('rssfield',array('data'=>$data));
    }
    
    
}