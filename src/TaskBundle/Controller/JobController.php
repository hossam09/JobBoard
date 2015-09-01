<?php

namespace TaskBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Templating\EngineInterface;
use Symfony\Component\HttpFoundation\Request;
use TaskBundle\Repository\JobRepository;
use TaskBundle\FilterChain\FilterChainRequest;

class JobController
{
    private $templating;
    private $jobRepository;
    private $filterChainRequest;
    private $request;

    public function __construct(EngineInterface $templating,
            Request $request,
            FilterChainRequest $filterChainRequest,
            JobRepository $jobRepository
            )
    {
        $this->templating = $templating;
        $this->request = $request;
        $this->filterChainRequest = $filterChainRequest;
        $this->jobRepository = $jobRepository;
    }
    
    public function index()
    {
        $jobs = $this->jobRepository->getJobPosts();
        
        return $this->templating->renderResponse(
            'TaskBundle:Job:index.html.twig',
            array('entities' => $jobs)  
        );   
    }   
    
    public function newPost()
    {
        return $this->templating->renderResponse(
            'TaskBundle:Job:new.html.twig'            
        );   
    }   
    
    public function createPost()
    {
        $postInputs = array('email' => $this->request->get('email'),
            'title' => $this->request->get('title'),
            'description' => $this->request->get('description')
            );
        
        $job = $this->jobRepository->setJobPost($postInputs);
        $result = $this->filterChainRequest->proceed($job);
        if ( ! $result['is_spam'] ) {
        $this->jobRepository->insertPost($result['job']);
        }
        
        return $this->viewMsg($result['msg']); 
    }
    
    public function approvePost($id)
    {
        $result = $this->jobRepository->approvePost($id);
        
        return $this->viewMsg($result);

    }

    public function rejectPost($id)
    {
        $result = $this->jobRepository->rejectPost($id);
        
        return $this->viewMsg($result);

    }

    public function viewMsg($msg)
    {        
        return $this->templating->renderResponse(
            'TaskBundle:Job:result.html.twig',
            array('msg' => $msg)  
        );
    }

}
