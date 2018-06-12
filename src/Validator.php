<?php

namespace linkphp\validator;

use Closure;

class Validator
{

    protected $data;

    /**
     * [
     * 'title' => [
     * 'rule' => [
     *    'class' => 'validatorRule', 'param' => ['max' => '']
     *   ], 'errorMessage' => '出错信息'
     *  ]
     * ]
     */
    protected $rule = [];

    private $error;

    public function addRule($name, $value = null)
    {
        if (is_array($name)) {
            $this->rule = array_merge($this->rule, $name);
        } else {
            $this->rule[$name]   = $value;
        }
    }

    public function addValidator($name, $value = null)
    {
        if (is_array($name)) {
            $this->rule = array_merge($this->rule, $name);
        } else {
            $this->rule[$name]   = $value;
        }
    }

    public function data($data)
    {
        $this->data = $data;
        return $this;
    }

    public function withValidator($input, $validator = null, $param = null, $error_message = null)
    {
        if($validator instanceof Closure){
            call_user_func($validator,$this, $input);
            return $this;
        }

        if(is_array($input)){
            $this->rule = array_merge($this->rule, $input);
            return $this;
        }

        $this->rule[$input] = [
            'rule' => [
                'class' => $validator,
                'param' => $param
              ], 'errorMessage' => $error_message
        ];
        return $this;
    }

    /**
     * @return bool
     */
    public function check()
    {
        if(is_array($this->data)){
            foreach ($this->data as $key => $val){
                if(isset($this->data[$key])){
                    $class = "\\linkphp\\validator\\rule\\" . ucfirst($this->rule[$key]['rule']['class']);
                    if($class && is_string($class) && class_exists($class) &&
                        is_subclass_of($class, "\\linkphp\\validator\\AbstractRule")){
                        $ruleValidator = new $class;
                        $ruleValidator->input = $this->data;
                        if(isset($this->rule[$key]['rule']['class']['param']) &&
                            !empty($this->rule[$key]['rule']['class']['param'])){
                            foreach ($this->rule[$key]['rule']['class']['param'] as $method => $value){
                                $ruleValidator->$method = $value;
                            }
                        }
                    } else {
                        $class = "\\linkphp\\validator\\rule\\" . $class;
                        $ruleValidator = new $class;
                        $ruleValidator->input = $this->data;
                        foreach ($this->rule[$key]['rule']['class']['param'] as $method => $value){
                            $ruleValidator->$method = $value;
                        }
                    }
                    if(!$ruleValidator->validate()){
                        $this->error[$key] = $this->rule[$key]['errorMessage'];
                        return false;
                    }
                }
            }
        }
        if(is_string($this->data) && !empty($this->data)){
            foreach ($this->rule as $key => $val){
                $class = "\\linkphp\\validator\\rule\\" . ucfirst($this->rule[$key]['rule']['class']);
                if($class && is_string($class) && class_exists($class) &&
                    is_subclass_of($class, "\\linkphp\\validator\\AbstractRule")){
                    $ruleValidator = new $class;
                    $ruleValidator->input = $this->data;
                    if(isset($this->rule[$key]['rule']['class']['param']) &&
                        !empty($this->rule[$key]['rule']['class']['param'])){
                        foreach ($this->rule[$key]['rule']['class']['param'] as $method => $value){
                            $ruleValidator->$method = $value;
                        }
                    }
                } else {
                    $class = "\\linkphp\\validator\\rule\\" . $class;
                    $ruleValidator = new $class;
                    $ruleValidator->input = $this->data;
                    foreach ($this->rule[$key]['rule']['class']['param'] as $method => $value){
                        $ruleValidator->$method = $value;
                    }
                }
                if(!$ruleValidator->validate()){
                    $this->error[$key] = $this->rule[$key]['errorMessage'];
                    return false;
                }
            }
        }
        return true;
    }

    /**
     * 出错获取出错信息
     * @return string
     */
    public function getError()
    {
        return $this->error;
    }

    /**
     * 验证必须传入
     * @param $input
     * @return bool
     */
    public static function required($input = null)
    {
        return Rule::required($input);
    }

    /**
     * 验证是否为合法数字类型
     * @param $input
     * @return bool
     */
    public static function numeric($input)
    {
        return Rule::numeric($input);
    }

    /**
     * 验证是否为合法邮件类型
     * @param $input
     * @return bool
     */
    public static function email($input)
    {
        return Rule::email($input);
    }

    /**
     * 验证是否为整数
     * @param $input
     * @return bool
     */
    public static function integer($input)
    {
        return Rule::integer($input);
    }

    /**
     * 验证是否为浮点
     * @param $input
     * @return bool
     */
    public static function float($input)
    {
        return Rule::float($input);
    }

    /**
     * 验证是否为合法url
     * @param $input
     * @return bool
     */
    public static function alpha($input)
    {
        return Rule::alpha($input);
    }

    /**
     * 验证是否为合法url
     * @param $input
     * @return bool
     */
    public static function alphaNumeric($input)
    {
        return Rule::alpha_numeric($input);
    }

    /**
     * 验证是否为合法ip地址
     * @param $input
     * @return bool
     */
    public static function ip($input)
    {
        return Rule::ip($input);
    }

    /**
     * 验证是否为合法url
     * @param $input
     * @return bool
     */
    public static function url($input)
    {
        return Rule::url($input);
    }

    /**
     * 验证不能超过最大长度
     * @param $input
     * @param $length
     * @return bool
     */
    public static function maxLength($input, $length)
    {
        return Rule::max_length($input, $length);
    }

    /**
     * 验证不能少于最小长度
     * @param $input
     * @param $length
     * @return bool
     */
    public static function minLength($input, $length)
    {
        return Rule::min_length($input, $length);
    }

    /**
     * 验证长度是否相等
     * @param $input
     * @param $length
     * @return bool
     */
    public static function exactLength($input, $length)
    {
        return Rule::exact_length($input, $length);
    }

    /**
     * 验证数据是否相等
     * @param $input
     * @param $param
     * @return bool
     */
    public static function equals($input, $param)
    {
        return Rule::equals(input, $param);
    }

}