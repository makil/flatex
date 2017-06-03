<?php

/* @error/error.html.twig */
class __TwigTemplate_2bcf89d13772e0ce6c56672c1538abf73184323ec410b0e8c630768bd5007777 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@layout/default.html.twig", "@error/error.html.twig", 1);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@layout/default.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo twig_escape_filter($this->env, ($context["status"] ?? null), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, ($context["reason"] ?? null), "html", null, true);
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "    <h1>Oops!</h1>
    <h2>This is awkward.</h2>
    <p>We encountered a ";
        // line 8
        echo twig_escape_filter($this->env, ($context["status"] ?? null), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, ($context["reason"] ?? null), "html", null, true);
        echo " error.</p>
    ";
        // line 9
        if ((($context["status"] ?? null) == 404)) {
            // line 10
            echo "        <p>
            You are looking for something that doesn't exist or may have moved. Check out one of the links on this page
            or head back to <a href=\"";
            // line 12
            echo twig_escape_filter($this->env, $this->env->getExtension('Zend\Expressive\Twig\TwigExtension')->renderUri("home"), "html", null, true);
            echo "\">Home</a>.
        </p>
    ";
        }
    }

    public function getTemplateName()
    {
        return "@error/error.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  56 => 12,  52 => 10,  50 => 9,  44 => 8,  40 => 6,  37 => 5,  29 => 3,  11 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "@error/error.html.twig", "C:\\Users\\mahir\\php\\flatex\\src\\App\\templates\\error\\error.html.twig");
    }
}
