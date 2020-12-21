<?php

class Count
{
    public $currentCount = '';
    private $storage;
    private $counter;

    public function __construct(StorageInterface $storage)
    {
        $this->storage = $storage;
    }


    public function add()
    {
        $this->read();
        $new_counter = $this->counter + 1;
        $this->write($new_counter);
    }

    private function read()
    {
        $counter_str = $this->storage->read();
        if (preg_replace("/[^,.0-9]/", '', $counter_str) != '') {
            $this->counter = preg_replace("/[^,.0-9]/", '', $counter_str);

        } else {
            $this->counter = 0;
        }
    }

    private function write($content)
    {
        $this->storage->write($content);
    }
}