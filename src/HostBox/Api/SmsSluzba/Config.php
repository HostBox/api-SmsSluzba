<?php

namespace HostBox\Api\SmsSluzba;


class Config implements IConfig {

    /** @var string */
    private $login;

    /** @var string */
    private $password;

    /** @var int */
    private $blockSize;


    /**
     * @param string $login
     * @param string $password
     * @param int $blockSize
     */
    public function __construct($login, $password, $blockSize = self::DEFAULT_BLOCK_SIZE) {
        $this->login = $login;
        $this->password = $password;
        $this->blockSize = $blockSize;
    }

    /** @inheritdoc */
    public function getLogin() {
        return $this->login;
    }

    /** @inheritdoc */
    public function getPassword() {
        return $this->password;
    }

    /** @inheritdoc */
    public function getBlockSize() {
        return $this->blockSize;
    }

}
