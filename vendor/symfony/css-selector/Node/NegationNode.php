<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\CssSelector\Node;

/**
 * Represents a "<selector>:not(<identifier>)" node.
 *
 * This component is a port of the Python cssselect library,
 * which is copyright Ian Bicking, @see https://github.com/SimonSapin/cssselect.
 *
 * @author Jean-François Simon <jeanfrancois.simon@sensiolabs.com>
 *
 * @internal
 */
class NegationNode extends AbstractNode
{
<<<<<<< HEAD
    private NodeInterface $selector;
    private NodeInterface $subSelector;

    public function __construct(NodeInterface $selector, NodeInterface $subSelector)
    {
        $this->selector = $selector;
        $this->subSelector = $subSelector;
=======
    public function __construct(
        private NodeInterface $selector,
        private NodeInterface $subSelector,
    ) {
>>>>>>> tundeseun/devtest
    }

    public function getSelector(): NodeInterface
    {
        return $this->selector;
    }

    public function getSubSelector(): NodeInterface
    {
        return $this->subSelector;
    }

    public function getSpecificity(): Specificity
    {
        return $this->selector->getSpecificity()->plus($this->subSelector->getSpecificity());
    }

    public function __toString(): string
    {
<<<<<<< HEAD
        return sprintf('%s[%s:not(%s)]', $this->getNodeName(), $this->selector, $this->subSelector);
=======
        return \sprintf('%s[%s:not(%s)]', $this->getNodeName(), $this->selector, $this->subSelector);
>>>>>>> tundeseun/devtest
    }
}
