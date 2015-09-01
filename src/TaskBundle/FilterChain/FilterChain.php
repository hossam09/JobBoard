<?php

namespace TaskBundle\FilterChain;
use TaskBundle\Repository\JobRepository;

abstract class FilterChain 
{
    private $next = null;
    
    protected $jobRepository;
        
    public function setJobRepository(JobRepository $jobRepository)
    {
        $this->jobRepository = $jobRepository;
        return $this->jobRepository;
    }

    public function getJobRepository()
    {
        return $this->jobRepository;
    }
    
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
