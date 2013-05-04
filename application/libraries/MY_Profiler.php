<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
    /**
    * Name:        Doctrine Profiler with CodeIgniter
    * Author:      Ahmet KAPIKIRAN
    * Author URI:  http://ahmetkapikiran.com/
    */
    Class MY_Profiler extends CI_Profiler {
        /**
        * put your comment there...
        * 
        */
        function _compile_doctrine_output() {
            $output  = "\n\n";
            $output .= '<fieldset style="border:1px solid #009999;padding:6px 10px 10px 10px;margin:20px 0 20px 0;background-color:#eee">';
            $output .= "\n";
            $output .= '<legend style="color:#009999;">  '.'DOCTRINE QUERIES'.'  </legend>';
            $output .= "\n";
            $CI =& get_instance();
            if (count($CI->doctrine_queries)==0) {
                $output .= "<div style='color:#009999;font-weight:normal;padding:4px 0 4px 0'>".'No Query'."</div>";
            } else {
                $output .= "\n\n<table cellpadding='4' cellspacing='1' border='0' width='100%'>\n";

                foreach ($CI->doctrine_queries as $query) {

                    $output .= "<tr>
                    <td width='10%' style='color:#000;background-color:#ddd;'>{$query['time']}</td>
                    <td width='90%' style='color:#009999;font-weight:normal;background-color:#ddd;'>{$query['query']}</td>\n</tr>\n";
                }

                $output .= "</table>\n";
            }
            $output .= "</fieldset>";

            return $output;    
        }

        function run() {
            $output = "<div id='codeigniter_profiler' style='clear:both;background-color:#fff;padding:10px;'>";

            $output .= $this->_compile_uri_string();
            $output .= $this->_compile_controller_info();
            $output .= $this->_compile_memory_usage();
            $output .= $this->_compile_benchmarks();
            $output .= $this->_compile_get();
            $output .= $this->_compile_post();
            $output .= $this->_compile_doctrine_output();
            $output .= $this->_compile_queries();
            $output .= '</div>';

            return $output;
        }
} 