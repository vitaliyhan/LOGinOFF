<?php

interface StorageInterface {
    public function read();
    public function write($content);

}