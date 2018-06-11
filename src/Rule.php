<?php

namespace linkphp\validator;

use linkphp\validator\rule\Required;
use linkphp\validator\rule\Numeric;
use linkphp\validator\rule\Email;
use linkphp\validator\rule\Integer;
use linkphp\validator\rule\FloatInput;
use linkphp\validator\rule\Alpha;
use linkphp\validator\rule\AlphaNumeric;
use linkphp\validator\rule\Ip;
use linkphp\validator\rule\Url;
use linkphp\validator\rule\MaxLength;
use linkphp\validator\rule\MinLength;
use linkphp\validator\rule\ExactLength;
use linkphp\validator\rule\Equals;

class Rule
{

    /**
     * 验证必须传入
     * @param $input
     * @return bool
     */
    public static function required($input = null)
    {
        return (!is_null($input) && (trim($input) != ''));
    }

    /**
     * 验证是否为合法数字类型
     * @param $input
     * @return bool
     */
    public static function numeric($input)
    {
        return is_numeric($input);
    }

    /**
     * 验证是否为合法邮件类型
     * @param $input
     * @return bool
     */
    public static function email($input)
    {
        return filter_var($input, FILTER_VALIDATE_EMAIL);
    }

    /**
     * 验证是否为整数
     * @param $input
     * @return bool
     */
    public static function integer($input)
    {
        return is_int($input) || ($input == (string)(int)$input);
    }

    /**
     * 验证是否为浮点
     * @param $input
     * @return bool
     */
    public static function float($input)
    {
        return is_float($input) || ($input == (string)(float)$input);
    }

    /**
     * 验证是否为合法url
     * @param $input
     * @return bool
     */
    public static function alpha($input)
    {
        return (preg_match("#^[a-zA-ZÀ-ÿ]+$#", $input) == 1);
    }

    /**
     * 验证是否为合法url
     * @param $input
     * @return bool
     */
    public static function alpha_numeric($input)
    {
        return (preg_match("#^[a-zA-ZÀ-ÿ0-9]+$#", $input) == 1);
    }

    /**
     * 验证是否为合法ip地址
     * @param $input
     * @return bool
     */
    public static function ip($input)
    {
        return filter_var($input, FILTER_VALIDATE_IP);
    }

    /**
     * 验证是否为合法url
     * @param $input
     * @return bool
     */
    public static function url($input)
    {
        return filter_var($input, FILTER_VALIDATE_URL);
    }

    /**
     * 验证不能超过最大长度
     * @param $input
     * @param $length
     * @return bool
     */
    public static function max_length($input, $length)
    {
        return (strlen($input) <= $length);
    }

    /**
     * 验证不能少于最小长度
     * @param $input
     * @param $length
     * @return bool
     */
    public static function min_length($input, $length)
    {
        return (strlen($input) >= $length);
    }

    /**
     * 验证长度是否相等
     * @param $input
     * @param $length
     * @return bool
     */
    public static function exact_length($input, $length)
    {
        return (strlen($input) == $length);
    }

    /**
     * 验证数据是否相等
     * @param $input
     * @param $param
     * @return bool
     */
    public static function equals($input, $param)
    {
        return ($input == $param);
    }

}