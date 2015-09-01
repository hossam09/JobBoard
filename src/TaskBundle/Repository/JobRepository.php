<?php

namespace TaskBundle\Repository;

use Doctrine\ORM\EntityRepository;
use TaskBundle\Entity\Job;

class JobRepository extends EntityRepository
{     
    
    public function getJobPosts()
    {
        $query = $this->findAll();
        return $query;
    }
           
    public function setJobPost($postInputs) 
    {            
        $status = $this->getJobPostStatus($postInputs['email']);

        $job = new Job();
        $job->setEmail($postInputs['email']);
        $job->setTitle($postInputs['title']);
        $job->setDescription($postInputs['description']);
        $job->setStatus($status);
        $job->setCreated();
        
        return $job;
    }

    public function getJobPostStatus($email) 
    {   
        $status = 0;
        $job = $this->findOneBy(array("email" => $email));
        
        if ( $job ) {
            $status = $job->getStatus();
        }
            
        return $status;
    }

    public function insertPost($job) 
    {            
        $job = new Job();
        $this->_em->persist($job);
        $this->_em->flush();
    }
            
    public function approvePost($id) 
    {
        if ( ! $this->updateStatus($id, 1) ) {
            return "Sorry,  this job post can't be approved!";
        }
        
        return "You have approved the job post successfully";
    }
    
    public function rejectPost($id) 
    {
        if ( ! $this->updateStatus($id, 2) ) {
            return "Sorry,  this job post can't be rejected!";
        }
        
        return "You have rejected the job post successfully";
    }
    
    public function updateStatus($id, $status) 
    {   
        $job = $this->find($id);
        $job->setStatus($status);        
        $this->_em->flush();
    }       
}
