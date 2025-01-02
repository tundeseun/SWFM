<?php
/**
 * @package dompdf
 * @link    https://github.com/dompdf/dompdf
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 */
namespace Dompdf\Renderer;

use Dompdf\Frame;

/**
<<<<<<< HEAD
 * Renders block frames
 *
=======
>>>>>>> tundeseun/devtest
 * @package dompdf
 */
class TableRowGroup extends Block
{
<<<<<<< HEAD

=======
>>>>>>> tundeseun/devtest
    /**
     * @param Frame $frame
     */
    function render(Frame $frame)
    {
        $style = $frame->get_style();
<<<<<<< HEAD
=======
        $node = $frame->get_node();
>>>>>>> tundeseun/devtest

        $this->_set_opacity($frame->get_opacity($style->opacity));

        $border_box = $frame->get_border_box();

<<<<<<< HEAD
        $this->_render_border($frame, $border_box);
        $this->_render_outline($frame, $border_box);

        $id = $frame->get_node()->getAttribute("id");
        if (strlen($id) > 0) {
            $this->_canvas->add_named_dest($id);
        }

        $this->debugBlockLayout($frame, "red");
=======
        // FIXME: Render background onto the area consisting of all spanned
        // cells. In the separated border model, the border-spacing area should
        // be left out. Currently, the background is inherited by the table
        // cells instead, which does not handle transparent backgrounds and
        // background images correctly.
        // See https://www.w3.org/TR/CSS21/tables.html#table-layers

        $this->_render_outline($frame, $border_box);

        $this->addNamedDest($node);
        $this->addHyperlink($node, $border_box);
>>>>>>> tundeseun/devtest
    }
}
