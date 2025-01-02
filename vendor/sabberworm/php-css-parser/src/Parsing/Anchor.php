<?php

namespace Sabberworm\CSS\Parsing;

<<<<<<< HEAD
=======
/**
 * @internal since 8.7.0
 */
>>>>>>> tundeseun/devtest
class Anchor
{
    /**
     * @var int
     */
    private $iPosition;

    /**
     * @var \Sabberworm\CSS\Parsing\ParserState
     */
    private $oParserState;

    /**
     * @param int $iPosition
     * @param \Sabberworm\CSS\Parsing\ParserState $oParserState
     */
    public function __construct($iPosition, ParserState $oParserState)
    {
        $this->iPosition = $iPosition;
        $this->oParserState = $oParserState;
    }

    /**
     * @return void
     */
    public function backtrack()
    {
        $this->oParserState->setPosition($this->iPosition);
    }
}
