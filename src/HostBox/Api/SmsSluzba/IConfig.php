<?php

namespace HostBox\Api\SmsSluzba;


interface IConfig {

    const DEFAULT_BLOCK_SIZE = 8192;

    /** @return string */
    public function getLogin();

    /** @return string */
    public function getPassword();

    /** @return int */
    public function getBlockSize();
}
