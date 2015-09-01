<?php

namespace TaskBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Templating\EngineInterface;

class HomeController
{
    /**
     * @var EngineInterface
     */
    protected $templating;

    /**
     * @param EngineInterface   $templating
     */
    public function __construct(EngineInterface $templating)
    {
        $this->templating = $templating;
    }
           
    // About Page contains the most important points and diagrams
    public function aboutAction()
    {
        return $this->templating->renderResponse('TaskBundle:Home:about.html.twig');
    }
    
    // Help Apigen a documentation tool for all classes
    public function helpAction()
    {
        return $this->templating->renderResponse('TaskBundle:Home:help.html.twig');
    }
  
}
