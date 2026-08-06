<?php namespace Multifields\Elements\Select;

/**
 * Renders fixed option lists in the Evolution manager from MultiFields config.
 *
 * The element keeps option serialization inside the package so custom configs
 * can declare a select without embedding manager HTML.
 *
 * @since 3.1.0
 */
class Select extends \Multifields\Base\Elements
{
    protected $template = '
        <div class="col [+class+]" data-type="select" data-name="[+name+]" [+attr+]>
            [+title+]
            <select id="tv[+id+]" class="form-control [+item.class+]" name="tv[+id+]" onchange="documentDirty=true;" [+item.attr+]>
                [+elements+]
            </select>
        </div>';

    /**
     * Transform configured select options into manager markup.
     *
     * @since 3.1.0
     */
    protected function setOptions(): void
    {
        if (empty($this->params['elements'])) {
            return;
        }

        $elements = is_array($this->params['elements'])
            ? $this->params['elements']
            : array_map('trim', explode('||', $this->params['elements']));

        foreach ($elements as &$element) {
            [$label, $value] = array_pad(explode('==', $element, 2), 2, '');
            $value = $value === '' ? $label : $value;
            $selected = $value === (string) $this->params['value'] ? ' selected="selected"' : '';
            $element = '<option value="' . htmlspecialchars($value, ENT_QUOTES, 'UTF-8') . '"' . $selected . '>'
                . htmlspecialchars($label, ENT_QUOTES, 'UTF-8') . '</option>';
        }
        unset($element);

        $this->params['elements'] = implode('', $elements);
    }

    /**
     * Render the select after preparing its configured options.
     *
     * @since 3.1.0
     */
    public function render()
    {
        $this->setOptions();

        return parent::render();
    }
}
