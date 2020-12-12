<?php namespace App\Libraries;

/*
* Class to manage the html of the websites
*/
class Scraping {

    var $data = Array();
    var $maxUrl = 0;
    var $date = '';

    /*
    * Constructor of Scraping Class
    * input max of elements and date of today
    */
    public function __construct($max, $date='')
    {
       $this->maxUrl = $max;
       $this->date = date('Ymd');
    }

    /*
    * Get data from array
    * Return array
    */
    public function getData()
    {
        return $this->data;
    }

    /*
    * Load content from websites
    */
    public function load()
    {
        // Array with websites
        $webs = array(
                        'https://elpais.com',
                        'https://www.elmundo.es'
        );

        // Searching link into websites
        foreach ($webs as $value) {
            $web = $this->getContentsCurl($value);
            $nodes = $this->getDom($web);
            $nod = $this->getElementTag($nodes, 'article');

            $links = $this->getWebUrls($nod, $value);

            // Explore all links
            foreach ($links as $val) {
                $article = $this->getContentsCurl($val);
                $nodes = $this->getDom($article);

                // Get IMG
                $n = $this->getElementTag($nodes, 'article');
                $no = $this->getElementTag($n->item(0), 'img');

                // Check exist IMG
                if($no->length > 0)
                    $img = $this->getAttribute($no->item(0), 'src');
                else
                    $img = NULL;

                // Get all meta from html
                $metas = $this->getElementTag($nodes, 'meta');

                // For codification
                $charset = false;
                // Searching meta
                for ($i = 0; $i < $metas->length; $i++)
                {
                    $meta = $metas->item($i);

                    if($this->getAttribute($meta, 'property') == 'og:title')
                        $title = $this->getAttribute($meta, 'content');

                    if($this->getAttribute($meta, 'property') == 'og:description')
                        $body = $this->getAttribute($meta, 'content');

                    if($this->getAttribute($meta, 'property') == 'og:site_name')
                        $publiser = $this->getAttribute($meta, 'content');

                    // Check codification
                    if($this->getAttribute($meta, 'http-equiv') == 'Content-Type'){
                        $char = $this->getAttribute($meta, 'content');

                        if(strpos($char, 'charset') == true)
                            $charset = true;
                    }

                }

                // Codification
                if(!$charset){
                    $title = $this->codification($title);
                    $body = $this->codification($body);
                    $publiser = $this->codification($publiser);
                }

                // Create Array
                $dataPage = array(
                            'publisher' => $publiser,
                            'title'     => $title,
                            'img'       => $img,
                            'url'       => $val,
                            'body'      => $body,
                            'date'      => $this->date
                );

                // Insert into Array
                array_push($this->data, $dataPage);
            }
        }

    }

    /*
    * Get code from web
    * input link
    * output code
    */
    private function getContentsCurl($url)
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);

        $data = curl_exec($ch);
        curl_close($ch);

        return $data;
    }

    /*
    * Struct code from html
    * input link
    * output dom element
    */
    private function getDom($web)
    {
        $dom = new \DOMDocument();
        @ $dom->loadHTML($web);

        return $dom;
    }

    /*
    * Get all links from website
    * input node and string to search
    * output array with links
    */
    private function getWebUrls($nodes, $value)
    {
        $array = array();

        for($i=0; $i<$this->maxUrl; $i++){
            $content = $nodes->item($i);

            $link = $this->getElementTag($content, 'a');
            $link = $this->getAttribute($link[0], 'href');

            $pos = strpos($link, $value);
            if($pos === false){
                $link = $value . $link;
            }

            array_push($array, $link);
        }

        return $array;
    }

    /*
    * Get tag
    * input element and tag to search
    * output dom element
    */
    private function getElementTag($element, $tag)
    {
        return $element->getElementsByTagName($tag);
    }

    /*
    * Get attribute
    * input element and attribute to search
    * output string
    */
    private function getAttribute($element, $attr){
        return $element->getAttribute($attr);
    }

    /*
    * Codification
    * input strings
    * output string
    */
    private function codification($value){
        return utf8_decode($value);
    }


}

?>
