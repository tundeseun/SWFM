<?php
/**
 * @package dompdf
 * @link    https://github.com/dompdf/dompdf
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 */
namespace Dompdf\Renderer;

use Dompdf\Helpers;
use Dompdf\Frame;
use Dompdf\FrameDecorator\ListBullet as ListBulletFrameDecorator;
use Dompdf\FrameDecorator\ListBulletImage;
use Dompdf\Image\Cache;

/**
 * Renders list bullets
 *
 * @package dompdf
 */
class ListBullet extends AbstractRenderer
{
    /**
     * @param $type
     * @return mixed|string
<<<<<<< HEAD
=======
     * @deprecated
>>>>>>> tundeseun/devtest
     */
    static function get_counter_chars($type)
    {
        static $cache = [];

        if (isset($cache[$type])) {
            return $cache[$type];
        }

        $uppercase = false;
        $text = "";

        switch ($type) {
<<<<<<< HEAD
            case "decimal-leading-zero":
            case "decimal":
            case "1":
=======
            default:
            case "decimal":
            case "decimal-leading-zero":
>>>>>>> tundeseun/devtest
                return "0123456789";

            case "upper-alpha":
            case "upper-latin":
<<<<<<< HEAD
            case "A":
                $uppercase = true;
            case "lower-alpha":
            case "lower-latin":
            case "a":
=======
                $uppercase = true;
            case "lower-alpha":
            case "lower-latin":
>>>>>>> tundeseun/devtest
                $text = "abcdefghijklmnopqrstuvwxyz";
                break;

            case "upper-roman":
<<<<<<< HEAD
            case "I":
                $uppercase = true;
            case "lower-roman":
            case "i":
=======
                $uppercase = true;
            case "lower-roman":
>>>>>>> tundeseun/devtest
                $text = "ivxlcdm";
                break;

            case "lower-greek":
                for ($i = 0; $i < 24; $i++) {
                    $text .= Helpers::unichr($i + 944);
                }
                break;
        }

        if ($uppercase) {
            $text = strtoupper($text);
        }

        return $cache[$type] = "$text.";
    }

    /**
<<<<<<< HEAD
     * @param int $n
     * @param string $type
=======
     * @param int      $n
     * @param string   $type
>>>>>>> tundeseun/devtest
     * @param int|null $pad
     *
     * @return string
     */
<<<<<<< HEAD
    private function make_counter($n, $type, $pad = null)
    {
        $n = intval($n);
        $text = "";
        $uppercase = false;

        switch ($type) {
            case "decimal-leading-zero":
            case "decimal":
            case "1":
=======
    private function make_counter(int $n, string $type, ?int $pad = null): string
    {
        $text = "";

        switch ($type) {
            default:
            case "decimal":
            case "decimal-leading-zero":
>>>>>>> tundeseun/devtest
                if ($pad) {
                    $text = str_pad($n, $pad, "0", STR_PAD_LEFT);
                } else {
                    $text = $n;
                }
                break;

            case "upper-alpha":
            case "upper-latin":
<<<<<<< HEAD
            case "A":
                $uppercase = true;
            case "lower-alpha":
            case "lower-latin":
            case "a":
=======
                $text = chr((($n - 1) % 26) + ord('A'));
                break;

            case "lower-alpha":
            case "lower-latin":
>>>>>>> tundeseun/devtest
                $text = chr((($n - 1) % 26) + ord('a'));
                break;

            case "upper-roman":
<<<<<<< HEAD
            case "I":
                $uppercase = true;
            case "lower-roman":
            case "i":
=======
                $text = strtoupper(Helpers::dec2roman($n));
                break;

            case "lower-roman":
>>>>>>> tundeseun/devtest
                $text = Helpers::dec2roman($n);
                break;

            case "lower-greek":
                $text = Helpers::unichr($n + 944);
                break;
        }

<<<<<<< HEAD
        if ($uppercase) {
            $text = strtoupper($text);
        }

=======
>>>>>>> tundeseun/devtest
        return "$text.";
    }

    /**
     * @param ListBulletFrameDecorator $frame
     */
    function render(Frame $frame)
    {
        $li = $frame->get_parent();
        $style = $frame->get_style();

        $this->_set_opacity($frame->get_opacity($style->opacity));

        // Don't render bullets twice if the list item was split
        if ($li->is_split_off) {
            return;
        }

        $font_family = $style->font_family;
        $font_size = $style->font_size;
        $baseline = $this->_canvas->get_font_baseline($font_family, $font_size);

        // Handle list-style-image
        // If list style image is requested but missing, fall back to predefined types
        if ($frame instanceof ListBulletImage && !Cache::is_broken($img = $frame->get_image_url())) {
            [$x, $y] = $frame->get_position();
            $w = $frame->get_width();
            $h = $frame->get_height();
            $y += $baseline - $h;

            $this->_canvas->image($img, $x, $y, $w, $h);
        } else {
            $bullet_style = $style->list_style_type;

            switch ($bullet_style) {
<<<<<<< HEAD
                default:
=======
>>>>>>> tundeseun/devtest
                case "disc":
                case "circle":
                    [$x, $y] = $frame->get_position();
                    $offset = $font_size * ListBulletFrameDecorator::BULLET_OFFSET;
                    $r = ($font_size * ListBulletFrameDecorator::BULLET_SIZE) / 2;
                    $x += $r;
                    $y += $baseline - $r - $offset;
                    $o = $font_size * ListBulletFrameDecorator::BULLET_THICKNESS;
                    $this->_canvas->circle($x, $y, $r, $style->color, $o, null, $bullet_style !== "circle");
                    break;

                case "square":
                    [$x, $y] = $frame->get_position();
                    $offset = $font_size * ListBulletFrameDecorator::BULLET_OFFSET;
                    $w = $font_size * ListBulletFrameDecorator::BULLET_SIZE;
                    $y += $baseline - $w - $offset;
                    $this->_canvas->filled_rectangle($x, $y, $w, $w, $style->color);
                    break;

<<<<<<< HEAD
                case "decimal-leading-zero":
                case "decimal":
=======
                default:
                case "decimal":
                case "decimal-leading-zero":
>>>>>>> tundeseun/devtest
                case "lower-alpha":
                case "lower-latin":
                case "lower-roman":
                case "lower-greek":
                case "upper-alpha":
                case "upper-latin":
                case "upper-roman":
<<<<<<< HEAD
                case "1": // HTML 4.0 compatibility
                case "a":
                case "i":
                case "A":
                case "I":
=======
>>>>>>> tundeseun/devtest
                    $pad = null;
                    if ($bullet_style === "decimal-leading-zero") {
                        $pad = strlen($li->get_parent()->get_node()->getAttribute("dompdf-children-count"));
                    }

                    $node = $frame->get_node();

                    if (!$node->hasAttribute("dompdf-counter")) {
                        return;
                    }

<<<<<<< HEAD
                    $index = $node->getAttribute("dompdf-counter");
                    $text = $this->make_counter($index, $bullet_style, $pad);

                    if (trim($text) === "") {
                        return;
                    }

=======
                    $index = (int) $node->getAttribute("dompdf-counter");
                    $text = $this->make_counter($index, $bullet_style, $pad);

>>>>>>> tundeseun/devtest
                    $word_spacing = $style->word_spacing;
                    $letter_spacing = $style->letter_spacing;
                    $text_width = $this->_dompdf->getFontMetrics()->getTextWidth($text, $font_family, $font_size, $word_spacing, $letter_spacing);

                    [$x, $y] = $frame->get_position();
                    // Correct for static frame width applied by positioner
                    $x += $frame->get_width() - $text_width;

                    $this->_canvas->text($x, $y, $text,
                        $font_family, $font_size,
                        $style->color, $word_spacing, $letter_spacing);
<<<<<<< HEAD
=======
                    break;
>>>>>>> tundeseun/devtest

                case "none":
                    break;
            }
        }
<<<<<<< HEAD

        $id = $frame->get_node()->getAttribute("id");
        if (strlen($id) > 0) {
            $this->_canvas->add_named_dest($id);
        }
=======
>>>>>>> tundeseun/devtest
    }
}
