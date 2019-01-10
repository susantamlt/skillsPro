<?php 
/**
 * Indeed API Class
 *
 * PHP class to interact with the Indeed API
 * https://ads.indeed.com/jobroll/
 *
 * @package  indeed-class
 * @license  http://opensource.org/licenses/MIT
 * @version  1.0.0
 */
ini_set('max_execution_time', 0); 
class Indeedapi {
    const DEFAULT_FORMAT = "json";
    const API_SEARCH_ENDPOINT = "http://api.indeed.com/ads/apisearch";//https://auth.indeed.com/search
    const API_JOBS_ENDPOINT = "http://api.indeed.com/ads/apigetjobs";//https://auth.indeed.com/jobs
    const API_RESUMES_ENDPOINT = "https://auth.indeed.com/resumes";//https://auth.indeed.com/resumes
    const API_RESUMESD_ENDPOINT = "https://auth.indeed.com/resumes/full";//https://auth.indeed.com/resumes
    private static $API_SEARCH_REQUIRED = array("userip", "useragent", array("q", "l"));
    private static $API_RESUMES_REQUIRED = array("userip", "useragent", array("q", "l"));
    private static $API_JOBS_REQUIRED = array("jobkeys");
    public function __construct($publisher, $version = "2"){
        $this->publisher = $publisher;
        $this->version = $version;
    }
    public function search($args){
        $v='2';
        return $this->process_request(self::API_SEARCH_ENDPOINT, $this->validate_args(self::$API_SEARCH_REQUIRED, $args),$v);
    }
    public function jobs($args){
        $valid_args = $this->validate_args(self::$API_JOBS_REQUIRED, $args);
        $valid_args["jobkeys"] = implode(",", $valid_args['jobkeys']);
        $v='2';
        return $this->process_request(self::API_JOBS_ENDPOINT, $valid_args,$v);
    }

    public function auth($value='') {
        # code...
    }

    public function resumes($args){
        $args['client_id']='ace1296b647854a22301a765df49dc7e7061f045dda708afbbd49101b73fe641';
        $v='1';

        //print_r($args);
        return $this->process_request(self::API_RESUMES_ENDPOINT, $args,$v);
    }
    public function resume($args){
        $args['client_id']='ace1296b647854a22301a765df49dc7e7061f045dda708afbbd49101b73fe641';
        //$args['access_token']='vQjiLKQzmwc';
        $v='1';
        return $this->process_request(self::API_RESUMES_ENDPOINT, $args,$v);
    }
    private function process_request($endpoint, $args,$v=''){
        $format = (array_key_exists("format", $args) ? $args["format"] : self::DEFAULT_FORMAT);
        $raw = ($format == "xml" ? true : (array_key_exists("raw", $args) ? $args["raw"] : false));
        $args["publisher"] = $this->publisher;
        if($v!=''){
            $args["v"] = $v;
        } else {
            $args["v"] = $this->version;
        }
        $args["format"] = $format;
        $c = curl_init(sprintf("%s?%s", $endpoint, http_build_query($args)));
        curl_setopt($c, CURLOPT_RETURNTRANSFER, TRUE);
        $result = curl_exec($c);
        curl_close($c);
        $r = (!$raw ? json_decode($result, $assoc = true) : $result);
        return $r;
    }
    private function validate_args($required_fields, $args){
        foreach($required_fields as $field){
            if(is_array($field)){
                $has_one_required = false;
                foreach($field as $f){
                    if(array_key_exists($f, $args)){
                        $has_one_required = True;
                        break;
                    }
                }
                if(!$has_one_required){
                    throw new Exception(sprintf("You must provide one of the following %s", implode(",", $field)));
                }
            } elseif(!array_key_exists($field, $args)){
                throw new Exception("The field $field is required");
            }
        }
        return $args;
    }
}