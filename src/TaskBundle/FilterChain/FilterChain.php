<?php

namespace TaskBundle\FilterChain;

abstract class FilterChain 
{
    private $next =null;
    
    public function setNext(FilterChain $filterChain) 
    {
        $this->next = $filterChain;
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
