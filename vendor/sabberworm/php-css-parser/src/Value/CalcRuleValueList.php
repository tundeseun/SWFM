<?php

namespace Sabberworm\CSS\Value;

use Sabberworm\CSS\OutputFormat;

class CalcRuleValueList extends RuleValueList
{
    /**
     * @param int $iLineNo
     */
    public function __construct($iLineNo = 0)
    {
        parent::__construct(',', $iLineNo);
    }

    /**
<<<<<<< HEAD
     * @return string
     */
    public function render(OutputFormat $oOutputFormat)
=======
     * @param OutputFormat|null $oOutputFormat
     *
     * @return string
     */
    public function render($oOutputFormat)
>>>>>>> tundeseun/devtest
    {
        return $oOutputFormat->implode(' ', $this->aComponents);
    }
}
