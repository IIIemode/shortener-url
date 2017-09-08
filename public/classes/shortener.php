<?php

    class Shortener {
        protected $db;

        public function __construct() {
            $this->db = new Mysqli('localhost', 'root', '', 'url_shorturl');
        }

        public function generateCode($num) {
            return $num;     
        }

        public function makeCode($url) {
            $url = trim($url);


            $this->db->query("INSERT INTO urls(url, created) VALUES('{$url}', NOW())");
            $code = $this->generateCode($this->db->insert_id);
            $this->db->query("UPDATE urls SET code='{$code}' WHERE url = '{$url}'");
            return $code;
        }

        public function getUrl($code){
            
            $code = $this->db->query("SELECT url FROM urls WHERE code = '$code'");

            return $code->fetch_object()->url;
        }
    }

?>
