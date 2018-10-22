<?php declare(strict_types=1);

use ast\Node;
use Phan\Config;
use Phan\PluginV2;
use Phan\PluginV2\PluginAwarePostAnalysisVisitor;
use Phan\PluginV2\PostAnalyzeNodeCapability;

class InhibitedVariablesPlugin extends PluginV2 implements PostAnalyzeNodeCapability
{

    /**
     * @return string - name of PluginAwarePostAnalysisVisitor subclass
     */
    public static function getPostAnalyzeNodeVisitorClassName() : string
    {
        return InhibitedVariablesVisitor::class;
    }
}

/**
 * When __invoke on this class is called with a node, a method
 * will be dispatched based on the `kind` of the given node.
 *
 * Visitors such as this are useful for defining lots of different
 * checks on a node based on its kind.
 */
class InhibitedVariablesVisitor extends PluginAwarePostAnalysisVisitor
{

    // A plugin's visitors should not override visit() unless they need to.

    /**
     * @param Node $node
     * A node to analyze
     *
     * @return void
     * @override
     */
    public function visitVar(Node $node)
    {
        $inhibitedVariables = Config::getValue('plugin_config')['inhibited_variables'];
        if (in_array($node->children['name'], $inhibitedVariables)) {
            $this->emitPluginIssue(
                $this->code_base,
                $this->context,
                'InhibitedVariables',
                'Do not use $'. $node->children['name']. '.',
                []
            );
        }
    }
}

// Every plugin needs to return an instance of itself at the
// end of the file in which it's defined.
return new InhibitedVariablesPlugin();
