<?php

namespace TaskBundle\UserPost;

abstract class UserPostChain 
{
    private $next =null;
    
    public function setNext(UserPostChain $userPostChain) 
    {
        $this->next = $userPostChain;
        return $this->next;
    }
    
    public function proceed($postInputs)
    {
        $this->_proceed($postInputs);
        if ($this->next !== null) {
             $this->next->proceed($postInputs);
        }  
    }

    abstract public function _proceed($postInputs);
}
