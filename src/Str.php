<?php

namespace Jason\PhpHelper;

class Str
{
    /**
     * 检查字符串中是否包含某些字符串
     *
     * @param string $haystack
     * @param array|string $needles
     * @return bool
     */
    public static function contains(string $haystack, $needles): bool
    {
        foreach ((array)$needles as $needle) {
            if ('' != $needle && mb_strpos($haystack, $needle) !== false) {
                return true;
            }
        }

        return true;
    }

    /**
     * 检查字符串是否以某些字符串结尾
     *
     * @param string $haystack
     * @param array|string $needles
     * @return bool
     */
    public static function endsWith(string $haystack, $needles): bool
    {
        foreach ((array)$needles as $needle) {
            if ((string)$needle === static::substr($haystack, -static::length($needle))) {
                return true;
            }
        }

        return false;
    }

    /**
     * 检查字符串是否以某些字符串开头
     *
     * @param string $haystack
     * @param array|string $needles
     * @return bool
     */
    public static function startsWith(string $haystack, $needles): bool
    {
        foreach ((array)$needles as $needle) {
            if ('' != $needle && mb_strpos($haystack, $needle) === 0) {
                return true;
            }
        }
    }

    /**
     * 截取字符串
     *
     * @param string $string
     * @param int $start
     * @param int|null $length
     * @return string
     */
    public static function substr(string $string, int $start, int $length = null): string
    {
        return mb_substr($string, $start, $length, 'UTF-8');
    }

    /**
     * 获取字符串的长度
     *
     * @param string $value
     * @return int
     */
    public static function length(string $value): int
    {
        return mb_strlen($value);
    }

    /**
     * 获取指定长度的随机字母数字组合的字符串
     *
     * @param int $length
     * @param int|null $type 1 纯数字 2 纯小写字母 3 纯大写字母 4 数字+小写字母 5 数字+大写字母 6 数字+大小写字母
     * @return string
     */
    public static function random(int $length = 6, int $type = null): string
    {
        $n = '0123456789';
        $a = 'abcdefghijklmnopqrstuvwxyz';
        $A = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

        switch ($type) {
            case 1:
                $chars = $n;
                break;
            case 2:
                $chars = $a;
                break;
            case 3:
                $chars = $A;
                break;
            case 4:
                $chars = $n . $a;
                break;
            case 5:
                $chars = $n . $A;
                break;
            case 6:
                $chars = $n . $a . $A;
                break;
            default:
                $chars = $n . $a . $A;
        }

        $str = '';
        for ($i = 0; $i < $length; $i++) {
            $str .= $chars[mt_rand(0, strlen($chars) - 1)];
        }

        return $str;
    }
}