<?php

/* WebProfilerBundle:Collector:events.html.twig */
class __TwigTemplate_fc89f8689552c67e7cc74afa29b981a3 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("WebProfilerBundle:Profiler:layout.html.twig");

        $this->blocks = array(
            'menu' => array($this, 'block_menu'),
            'panel' => array($this, 'block_panel'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "WebProfilerBundle:Profiler:layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 3
        $context["__internal_fc89f8689552c67e7cc74afa29b981a3_1"] = $this;
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 5
    public function block_menu($context, array $blocks = array())
    {
        // line 6
        echo "<span class=\"label\">
    <span class=\"icon\"><img src=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/webprofiler/images/profiler/events.png"), "html", null, true);
        echo "\" alt=\"Events\" /></span>
    <strong>Events</strong>
</span>
";
    }

    // line 12
    public function block_panel($context, array $blocks = array())
    {
        // line 13
        echo "    <h2>Called Listeners</h2>

    <table>
        <tr>
            <th>Event name</th>
            <th>Listener</th>
        </tr>
        ";
        // line 20
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "collector"), "calledlisteners"));
        foreach ($context['_seq'] as $context["_key"] => $context["listener"]) {
            // line 21
            echo "            <tr>
                <td><code>";
            // line 22
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "listener"), "event"), "html", null, true);
            echo "</code></td>
                <td><code>";
            // line 23
            echo $context["__internal_fc89f8689552c67e7cc74afa29b981a3_1"]->getdisplay_listener($this->getContext($context, "listener"));
            echo "</code></td>
            </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['listener'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 26
        echo "    </table>

    ";
        // line 28
        if ($this->getAttribute($this->getContext($context, "collector"), "notcalledlisteners")) {
            // line 29
            echo "        <h2>Not Called Listeners</h2>

        <table>
            <tr>
                <th>Event name</th>
                <th>Listener</th>
            </tr>
            ";
            // line 36
            $context["listeners"] = $this->getAttribute($this->getContext($context, "collector"), "notcalledlisteners");
            // line 37
            echo "            ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable(twig_sort_filter(twig_get_array_keys_filter($this->getContext($context, "listeners"))));
            foreach ($context['_seq'] as $context["_key"] => $context["listener"]) {
                // line 38
                echo "                <tr>
                    <td><code>";
                // line 39
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "listeners"), $this->getContext($context, "listener"), array(), "array"), "event"), "html", null, true);
                echo "</code></td>
                    <td><code>";
                // line 40
                echo $context["__internal_fc89f8689552c67e7cc74afa29b981a3_1"]->getdisplay_listener($this->getAttribute($this->getContext($context, "listeners"), $this->getContext($context, "listener"), array(), "array"));
                echo "</code></td>
                </tr>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['listener'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 43
            echo "        </table>
    ";
        }
    }

    // line 47
    public function getdisplay_listener($listener = null)
    {
        $context = $this->env->mergeGlobals(array(
            "listener" => $listener,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 48
            echo "    ";
            if (($this->getAttribute($this->getContext($context, "listener"), "type") == "Closure")) {
                // line 49
                echo "        Closure
    ";
            } elseif (($this->getAttribute($this->getContext($context, "listener"), "type") == "Function")) {
                // line 51
                echo "        ";
                $context["link"] = $this->env->getExtension('code')->getFileLink($this->getAttribute($this->getContext($context, "listener"), "file"), $this->getAttribute($this->getContext($context, "listener"), "line"));
                // line 52
                echo "        ";
                if ($this->getContext($context, "link")) {
                    echo "<a href=\"";
                    echo twig_escape_filter($this->env, $this->getContext($context, "link"), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "listener"), "function"), "html", null, true);
                    echo "</a>";
                } else {
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "listener"), "function"), "html", null, true);
                }
                // line 53
                echo "    ";
            } elseif (($this->getAttribute($this->getContext($context, "listener"), "type") == "Method")) {
                // line 54
                echo "        ";
                $context["link"] = $this->env->getExtension('code')->getFileLink($this->getAttribute($this->getContext($context, "listener"), "file"), $this->getAttribute($this->getContext($context, "listener"), "line"));
                // line 55
                echo "        ";
                echo $this->env->getExtension('code')->abbrClass($this->getAttribute($this->getContext($context, "listener"), "class"));
                echo "::";
                if ($this->getContext($context, "link")) {
                    echo "<a href=\"";
                    echo twig_escape_filter($this->env, $this->getContext($context, "link"), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "listener"), "method"), "html", null, true);
                    echo "</a>";
                } else {
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "listener"), "method"), "html", null, true);
                }
                // line 56
                echo "    ";
            }
        } catch(Exception $e) {
            ob_end_clean();

            throw $e;
        }

        return ob_get_clean();
    }

    public function getTemplateName()
    {
        return "WebProfilerBundle:Collector:events.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  170 => 56,  157 => 55,  154 => 54,  151 => 53,  140 => 52,  130 => 48,  119 => 47,  100 => 39,  66 => 23,  68 => 22,  56 => 17,  76 => 39,  65 => 22,  136 => 40,  114 => 30,  85 => 31,  61 => 28,  21 => 3,  36 => 6,  209 => 84,  205 => 82,  196 => 79,  192 => 78,  189 => 77,  178 => 71,  176 => 70,  165 => 63,  161 => 61,  152 => 58,  148 => 57,  145 => 56,  141 => 55,  134 => 50,  132 => 49,  127 => 46,  123 => 30,  109 => 39,  93 => 33,  90 => 36,  54 => 19,  133 => 49,  124 => 41,  111 => 29,  80 => 29,  60 => 20,  52 => 15,  26 => 5,  86 => 28,  79 => 28,  97 => 38,  95 => 47,  92 => 37,  88 => 32,  78 => 25,  71 => 37,  25 => 5,  224 => 96,  215 => 90,  211 => 88,  204 => 84,  200 => 83,  195 => 80,  193 => 79,  190 => 78,  188 => 77,  185 => 76,  179 => 72,  177 => 71,  171 => 67,  162 => 63,  158 => 61,  156 => 60,  153 => 59,  146 => 55,  142 => 54,  137 => 51,  126 => 31,  120 => 39,  117 => 44,  103 => 36,  74 => 38,  47 => 17,  32 => 6,  40 => 8,  24 => 3,  72 => 17,  64 => 35,  53 => 23,  42 => 7,  34 => 7,  29 => 5,  19 => 2,  22 => 3,  23 => 29,  17 => 1,  69 => 20,  63 => 28,  58 => 26,  49 => 11,  43 => 12,  37 => 8,  20 => 2,  139 => 26,  131 => 48,  128 => 43,  125 => 42,  121 => 40,  115 => 39,  107 => 36,  99 => 34,  96 => 34,  91 => 33,  82 => 43,  77 => 25,  75 => 26,  57 => 27,  50 => 14,  46 => 13,  44 => 14,  39 => 12,  33 => 5,  30 => 7,  27 => 3,  135 => 50,  129 => 47,  122 => 46,  116 => 33,  113 => 43,  108 => 28,  104 => 40,  102 => 6,  94 => 33,  89 => 20,  87 => 44,  84 => 28,  81 => 29,  73 => 28,  70 => 24,  67 => 19,  62 => 22,  59 => 21,  55 => 20,  51 => 23,  48 => 10,  41 => 11,  38 => 8,  35 => 7,  31 => 6,  28 => 7,);
    }
}
