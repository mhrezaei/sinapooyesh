<?php  //if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// ------------------------------------------------------------------------

/* return asset url for include css and js file and project images */
if ( ! function_exists('assets_url'))
{
    /**
     * Base URL
     *
     * Create a local URL based on your basepath.
     * Segments can be passed in as a string or an array, same as site_url
     * or a URL to a file can be passed in, e.g. to an image file.
     *
     * @param    string    $uri
     * @param    string    $protocol
     * @return    string
     */
    function assets_url($uri = '', $protocol = NULL)
    {
        return get_instance()->config->base_url($uri, $protocol) . 'assets/';
    }
}

// ------------------------------------------------------------------------

/*  persian security question code generator and validator */
if( ! function_exists('securityQuestion'))
{
    function securityQuestion($code = 'y', $key = NULL, $unSetData = FALSE, $uniqId = FALSE)
    {
        $CI =& get_instance();
        $CI->load->library('encrypt');
        if($code == 'y')
        {
            $x = rand(1, 9);
            $y = rand(1, 9);
            $operation = array('+', '*');
            $op = $operation[rand(0,1)];
            if($op == '+')
            {
                $z = sha1(md5($x + $y));
                $a = "$x" . ' به علاوه ' . "$y";
            }
            elseif($op == '*')
            {
                $z = sha1(md5($x * $y));
                $a = "$x" . ' ضرب در ' . "$y";
            }
            else
            {
                $z = sha1(md5($x + $y));
                $a = "$x" . ' به علاوه ' . "$y";
            }
            
            $k = randnum(16);
            
            if($uniqId)
            {
                $qs = array(
                'key' => md5($k),
                'qsAn' => $z
                );
                
                $CI->session->set_userdata(array($uniqId => $qs));
            }
            else
            {
                $CI->session->set_userdata(array(md5($k) => $z));
            }
                        
            $data['key'] = $k;
            $data['value'] = $a;
            return $data;
        }
        else
        {
            if(is_numeric($code) && strlen($code) > 0 && ($code + 0) > 0)
            {
                if($uniqId)
                {
                    $uniqId = $CI->session->userdata($uniqId);
                    if($uniqId['key'] AND $uniqId['qsAn'])
                    {
                        $keyAn = $uniqId['key'];
                        $qsAn = $uniqId['qsAn'];
                    }
                    else
                    {
                        return FALSE;
                        exit;
                    }
                }
                else
                {
                    if($CI->session->userdata(md5($key)))
                    {
                        $keyAn = md5($key);
                        $qsAn = $CI->session->userdata(md5($key));
                    }
                    else
                    {
                        return FALSE;
                        exit;
                    }
                }
                
                if($keyAn AND $qsAn)
                {
                    if($qsAn == sha1(md5($code)))
                    {
                        return TRUE;
                    }
                    else
                    {
                        return FALSE;
                    }
                }
            }
            else
            {
                return FALSE;
            }
            
            if($unSetData)
            {
                if($uniqId)
                {
                    $CI->session->unset_userdata($uniqId);
                }
                else
                {
                    $CI->session->unset_userdata(md5($key));
                }
            }
        }
    }
}


// ------------------------------------------------------------------------

/* return a random number */
function randnum($len)
{
    $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    return substr(str_shuffle(str_repeat($pool, ceil($len / strlen($pool)))), 0, $len);
}

// ------------------------------------------------------------------------

/* retun character limmit */
function gCharLimit($String , $Length)
{
    if(strlen($String) > $Length ) {
        $String = substr(trim($String),0,$Length); 
        $String = substr($String,0,strlen($String)-strpos(strrev($String)," "));
        $String = $String.'...';
    }
    return $String ; 
}

// ------------------------------------------------------------------------

/* html coding */
function htmlCoding($input, $type = 1)
{
    if($type == '1')
    {
        $input = str_replace( "ي" , "ی" , $input ) ; 
        $input = str_replace( "ك"  , "ک" , $input ) ;
        $input = str_replace( "¬"  , "‏" , $input ) ;
        $input = trim($input);
        return htmlspecialchars($input ,ENT_QUOTES);
    }
    else
    {
        return htmlspecialchars_decode($input, ENT_QUOTES);
    }
}

// ------------------------------------------------------------------------

/* get real ip address */
function getRealUserIp()
{
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP']))
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_X_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if(isset($_SERVER['REMOTE_ADDR']))
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'UNKNOWN';

    return $ipaddress; 
}

// ------------------------------------------------------------------------

/* show data in array */
function showArray($data)
{
    echo '<pre>';
    print_r($data);
    echo '</pre>';
}

// ------------------------------------------------------------------------

/* national code verify */
function nationalCode($codes)
{
    if(strlen($codes) == '10' && is_numeric($codes))
    {
        $code = str_split($codes);
        $err ;
        foreach($code as $k => $v)
        {
            if($code[0] <> $v)
            {
                  $err = 1;
                  break;
            }
            else
            {
                $err = 2;
            }
        }
        if($err == 1)
        {
            $valid = 0;
            $jumper = 10;
            for($i = 0; $i <= 8; $i++)
            {
                $valid += $code[$i] * $jumper;
                --$jumper;
            }
            $valid = $valid % 11;
            if($valid >= 0 && $valid < 2)
            {
                if($valid == $code['9'])
                {
                    //$msg = 1; // national code valid
                    return true;
                    exit;
                }
                else
                {
                    //$msg = 2; // national code invalid
                    return false;
                    exit;
                }
            }
            else
            {
                $valid = 11 - $valid;
                if($valid == $code['9'])
                {
                    //$msg = 1; // national code valid
                    return true;
                    exit;
                }
                else
                {
                    //$msg = 2; // national code invalid
                    return false;
                    exit;
                }
            }
        }
        else
        {
            //$msg = 3; // number not be equal
            return false;
            exit;
        }
    }
    else
    {
        //$msg = 4; // not numbet AND not 10 char
        return false;
        exit;
    }
    //return $msg;
}

// ------------------------------------------------------------------------

/* return md5 and SHA1 str */
if ( ! function_exists('hashStr'))
{
    function hashStr($str)
    {
        return md5(sha1($str));
    }
}

// ------------------------------------------------------------------------

// ------------------------------------------------------------------------

// ------------------------------------------------------------------------