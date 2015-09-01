<?php

namespace TaskBundle\FilterChain;

abstract class FilterChain 
{
    private $next = null;

    public function setNext(FilterChain $filterChain) 
    {
        $this->next = $filterChain;
        return $this->next;
    }
    
    public function proceed($postInputs)
    {
        $response = $this->_proceed($postInputs);
        if ($this->next !== null) {
            $response =  $this->next->proceed($postInputs);
        }  
        return $response;
    }

    abstract public function _proceed($postInputs);
}
