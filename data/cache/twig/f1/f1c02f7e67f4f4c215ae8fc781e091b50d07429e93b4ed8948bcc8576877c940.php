<?php

/* @app/home-page.html.twig */
class __TwigTemplate_bb7433be0e6db426df307469c3d3dfc62094a3e9dfcd4456e0ab25868d4af7ed extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@layout/default.html.twig", "@app/home-page.html.twig", 1);
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
        echo "Home";
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "    <div class=\"jumbotron\">
        <h1>Welcome to <span class=\"zf-green\">zend-expressive</span></h1>
        <p>
            Congratulations! You have successfully installed the
            <a href=\"https://github.com/zendframework/zend-expressive-skeleton\" target=\"_blank\">zend-expressive skeleton application</a>.
            This skeleton can serve as a simple starting point for you to begin building your application.
        </p>
        <p>
            Expressive builds on zend-stratigility to provide a minimalist PSR-7 middleware framework for PHP.
        </p>
    </div>

    <div class=\"row\">
        <div class=\"col-md-4\">
            <h2>
                <a href=\"https://docs.zendframework.com/zend-expressive/getting-started/features/\" target=\"_blank\">
                    <i class=\"fa fa-refresh\"></i> Agile &amp; Lean
                </a>
            </h2>
            <p>
                Expressive is fast, small and perfect for rapid application development, prototyping and api's. You decide how you
                extend it and choose the best packages from major framework or standalone projects.
            </p>
        </div>

        <div class=\"col-md-4\">
            <h2>
                <a href=\"https://github.com/zendframework/zend-diactoros\" target=\"_blank\">
                    <i class=\"fa fa-exchange\"></i> HTTP Messages
                </a>
            </h2>
            <p>
                HTTP messages are the foundation of web development. Web browsers and HTTP clients such as cURL create
                HTTP request messages that are sent to a web server, which provides an HTTP response message.
                Server-side code receives an HTTP request message, and returns an HTTP response message.
            </p>
        </div>

        <div class=\"col-md-4\">
            <h2>
                <a href=\"https://github.com/zendframework/zend-stratigility\" target=\"_blank\">
                    <i class=\"fa fa-dot-circle-o\"></i> Middleware
                </a>
            </h2>
            <p>
                Middleware is code that exists between the request and response, and which can take the incoming
                request, perform actions based on it, and either complete the response or pass delegation on to the
                next middleware in the queue. Your application is easily extended with custom middleware created by
                yourself or <a href=\"https://packagist.org/search/?q=middleware\" target=\"_blank\">others</a>.
            </p>
        </div>
    </div>

    <div class=\"row\">
        <div class=\"col-md-4\">
            <h2>
                <a href=\"https://docs.zendframework.com/zend-expressive/features/container/intro/\" target=\"_blank\">
                    <i class=\"fa fa-cube\"></i> Containers
                </a>
            </h2>
            <p>
                Expressive promotes and advocates the usage of Dependency Injection/Inversion of Control containers
                when writing your applications. Expressive supports multiple containers which typehints against
                <a href=\"https://github.com/container-interop/container-interop\" target=\"_blank\">container-interop</a>.
            </p>
        </div>

        <div class=\"col-md-4\">
            <h2>
                <a href=\"https://docs.zendframework.com/zend-expressive/features/router/intro/\" target=\"_blank\">
                    <i class=\"fa fa-plane\"></i> Routers
                </a>
            </h2>
            <p>
                One fundamental feature of zend-expressive is that it provides mechanisms for implementing dynamic
                routing, a feature required in most modern web applications. Expressive ships with multiple adapters.
            </p>
            ";
        // line 83
        if (array_key_exists("routerName", $context)) {
            // line 84
            echo "                <p>
                    <a href=\"";
            // line 85
            echo twig_escape_filter($this->env, ($context["routerDocs"] ?? null), "html", null, true);
            echo "\" target=\"_blank\">
                        Get started with ";
            // line 86
            echo twig_escape_filter($this->env, ($context["routerName"] ?? null), "html", null, true);
            echo ".
                    </a>
                </p>
            ";
        }
        // line 90
        echo "        </div>

        <div class=\"col-md-4\">
            <h2>
                <a href=\"https://docs.zendframework.com/zend-expressive/features/template/twig/\" target=\"_blank\">
                    <i class=\"fa fa-files-o\"></i> Templating
                </a>
            </h2>
            <p>
                By default, no middleware in Expressive is templated. We do not even provide a default templating
                engine, as the choice of templating engine is often very specific to the project and/or organization.
                However, Expressive does provide abstraction for templating, which allows you to write middleware that
                is engine-agnostic.
            </p>
            ";
        // line 104
        if (array_key_exists("templateName", $context)) {
            // line 105
            echo "                <p>
                    <a href=\"";
            // line 106
            echo twig_escape_filter($this->env, ($context["templateDocs"] ?? null), "html", null, true);
            echo "\" target=\"_blank\">
                        Get started with ";
            // line 107
            echo twig_escape_filter($this->env, ($context["templateName"] ?? null), "html", null, true);
            echo ".
                    </a>
                </p>
            ";
        }
        // line 111
        echo "        </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "@app/home-page.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  165 => 111,  158 => 107,  154 => 106,  151 => 105,  149 => 104,  133 => 90,  126 => 86,  122 => 85,  119 => 84,  117 => 83,  38 => 6,  35 => 5,  29 => 3,  11 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "@app/home-page.html.twig", "C:\\Users\\mahir\\php\\flatex\\src\\App\\templates\\app\\home-page.html.twig");
    }
}
