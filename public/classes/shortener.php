<?php

    class Shortener {
        protected $db;

        public function __construct() {
            $this->db = new Mysqli('localhost', 'root', '', 'url_shorturl');
        }

        public function generateCode($num) {
            // some generate code $num
            $checkNum = $this->db->query("SELECT url FROM urls WHERE code = '$num'");
            if ($checkNum->num_rows) {
                $this->generateCode($num);
            }
            return $num;     
        }

        public function makeCode($url) {
            $url = trim($url);

            if (!filter_var($url, FILTER_VALIDATE_URL)) {
                return '';
            }

            $url = $this->db->escape_string($url);
            $exsists = $this->db->query("SELECT code FROM urls WHERE url='{$url}'");
            if ($exsists->num_rows) {
                return $exsists->fetch_object()->code;
            } else {
                $this->db->query("INSERT INTO urls(url, created) VALUES('{$url}', NOW())");
                $code = $this->generateCode($this->db->insert_id);
                $this->db->query("UPDATE urls SET code='{$code}' WHERE url = '{$url}'");
                return $code;
            }
        }

        public function getUrl($code){
            $code = $this->db->escape_string($code);
            $code = $this->db->query("SELECT url FROM urls WHERE code = '$code'");

            if ($code->num_rows) {
                return $code->fetch_object()->url;
            }

            return '';
        }
    }
?>
