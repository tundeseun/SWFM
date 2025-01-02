<?php

declare(strict_types=1);

/*
 * This file is part of the league/commonmark package.
 *
 * (c) Colin O'Dell <colinodell@gmail.com>
 *
 * Original code based on the CommonMark JS reference parser (https://bitly.com/commonmark-js)
 *  - (c) John MacFarlane
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace League\CommonMark\Extension\CommonMark\Parser\Inline;

<<<<<<< HEAD
use League\CommonMark\Delimiter\Delimiter;
=======
>>>>>>> tundeseun/devtest
use League\CommonMark\Node\Inline\Text;
use League\CommonMark\Parser\Inline\InlineParserInterface;
use League\CommonMark\Parser\Inline\InlineParserMatch;
use League\CommonMark\Parser\InlineParserContext;

final class BangParser implements InlineParserInterface
{
    public function getMatchDefinition(): InlineParserMatch
    {
        return InlineParserMatch::string('![');
    }

    public function parse(InlineParserContext $inlineContext): bool
    {
        $cursor = $inlineContext->getCursor();
        $cursor->advanceBy(2);

        $node = new Text('![', ['delim' => true]);
        $inlineContext->getContainer()->appendChild($node);

        // Add entry to stack for this opener
<<<<<<< HEAD
        $delimiter = new Delimiter('!', 1, $node, true, false, $cursor->getPosition());
        $inlineContext->getDelimiterStack()->push($delimiter);
=======
        $inlineContext->getDelimiterStack()->addBracket($node, $cursor->getPosition(), true);
>>>>>>> tundeseun/devtest

        return true;
    }
}
