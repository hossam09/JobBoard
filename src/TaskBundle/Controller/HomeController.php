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
    public function about()
    {
        return $this->templating->renderResponse('TaskBundle:Help:about.html.twig');
    }
    
    // Help Apigen a documentation tool for all classes
    public function help()
    {
        return $this->templating->renderResponse('TaskBundle:Help:classes.html.twig');
    }
  
}
