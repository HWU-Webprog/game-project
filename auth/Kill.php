<?php

namespace Auth;

class Kill
{
    private $killer;
    private $victim;
    private $timestamp;

    public function __construct($killer, $victim, $timestamp)
    {
        $this->killer = $killer;
        $this->victim = $victim;
        $this->timestamp = $timestamp;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getVictim()
    {
        return $this->victim;
    }

    public function getKiller()
    {
        return $this->killer;
    }

    public function getTime()
    {
        return new DateTime($this->timestamp);
    }
}
