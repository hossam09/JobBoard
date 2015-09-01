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
 
    public function getJobPost($id)
    {
        $query = $this->findOneBy(array("id" => $id));
        return $query;
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
        if ( ! $this->updateStatus($id, 0) ) {
            return "Sorry,  this job post can't be rejected!";
        }
        
        return "You have rejected the job post successfully";
    }
    
    public function insertPost($postInputs) 
    {            
        $job = new Job();
        
        $job->setEmail($postInputs['email']);
        $job->setTitle($postInputs['title']);
        $job->setDescription($postInputs['description']);
        $job->setStatus($postInputs['status']);
        $job->setCreated();
        
        $this->_em->persist($job);
        $this->_em->flush();
    }
    
    public function setJobPost($postInputs) 
    {            
        $job = new Job();
        
        $job->setEmail($postInputs['email']);
        $job->setTitle($postInputs['title']);
        $job->setDescription($postInputs['description']);
        $job->setStatus(1);
        $job->setCreated();
        
        return $job;
    }
    
    public function updateStatus($id,$status) 
    {   
        $job = $this->find($id);
        $job->setStatus($status);
        
        $this->_em->flush();
    }       
}
