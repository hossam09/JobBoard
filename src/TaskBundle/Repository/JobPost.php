<?php

namespace TaskBundle\Repository;

use TaskBundle\Repository\JobRepository;

class JobPost 
{
    private $jobRepository;

    public function __construct(JobRepository $jobRepository)
    {
        $this->jobRepository = $jobRepository;
    }
    
    public function savePost($job)
    {
       $this->jobRepository->setJobPost($job);       
    }

}
