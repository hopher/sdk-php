<?php

namespace Hopher;

/**
 * 网络类库
 */
class Net
{

    /**
     * 判断字节存储机制 - 大小端
     *
     * @return bool true | false
     */
    public static function isBigEndian()
    {
        $bin = pack("L", 0x12345678);
        $hex = bin2hex($bin);
        if (ord(pack("H2", $hex)) === 0x78) {
            return false;
        }
        return true;
    }
}