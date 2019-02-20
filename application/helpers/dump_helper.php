<?php
if ( ! function_exists('dump'))
{
    function dump($var, $label = 'Dump', $echo = true)
    {
        // Store dump in variable
        ob_start();
        var_dump($var);
        $output = ob_get_clean();

        // Custom CSS style
        $style = 'background: #282c34;
        color: #83c379;
        margin: 10px;
        padding: 10px;
        text-align: left;
        font-family: Inconsolata, Monaco, Consolas, Courier New, Courier;;
        font-size: 15px;
        border: 1px;
        border-radius: 1px;
        overflow: auto;
        border: 2px;
        -webkit-box-shadow: 5px 5px 5px #a4a4a4;';

        // Add formatting
        $output = preg_replace("/\]\=\>\n(\s+)/m", '] => ', $output);
        $output = '<pre style="'.$style.'">'.$label.' => '.$output.'</pre>';

        // Output
        if ($echo == true) {
            echo $output;
        } else {
            return $output;
        }
    }
}

/* End of file dump_helper.php */
/* Location: ./application/helpers/dump_helper.php */
