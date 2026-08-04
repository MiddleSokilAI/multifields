<?php

namespace Multifields\Elements\Row;

/**
 * Renders a manager row and exposes the actions available for that row.
 *
 * The action list controls editor capabilities whose state is persisted with
 * the MultiFields value, including temporary hiding and collapsing of groups.
 */
class Row extends \Multifields\Base\Elements
{
    protected $styles = 'view/css/row.css';
    protected $scripts = 'view/js/row.js';

    protected $actions = [
        'add',
        'move',
        'del',
        'resize',
        'hide',
        'expand',
    ];

    protected $template = '
        <div id="[+id+]" class="col mf-row [+class+]" data-type="row" data-name="[+name+]" [+attr+]>
            [+title+]
            [+templates+]
            [+value+]
            [+actions+]
            <div class="mf-items [+items.class+]">
                [+items+]
            </div>
        </div>';

    protected function setAttr()
    {
        if (!empty($this->params['autoincrement'])) {
            $this->params['attr'] .= ' data-autoincrement="' . $this->params['autoincrement'] . '"';
        }

        if (!empty($this->params['mf.col'])) {
            $this->params['class'] = trim(preg_replace('/col-[\d|auto]+/', '', $this->params['class']) . ' col-' . $this->params['mf.col']);
        }

        if (!empty($this->params['mf.offset'])) {
            $this->params['class'] = trim(preg_replace('/offset-[\d|auto]+/', '', $this->params['class']) . ' offset-' . $this->params['mf.offset']);
        }

        parent::setAttr();
    }

    protected function setTemplates()
    {
        $out = '';

        if (!empty(\Multifields\Base\Core::getInstance()->getConfig('templates')) && isset($this->params['templates']) && ($this->params['templates'] === true || is_array($this->params['templates']))) {
            $i = 0;
            foreach (\Multifields\Base\Core::getInstance()->getConfig('templates') as $k => $v) {
                if ((empty($v['hidden']) && empty($this->params['templates'])) || ($this->params['templates'] === true || (is_array($this->params['templates']) && (isset($this->params['templates'][$k]) || in_array($k, $this->params['templates']))))) {
                    $v['label'] = isset($v['label']) ? $v['label'] : $k;
                    $v['icon'] = isset($v['icon']) ? $v['icon'] : '';

                    $out .= '<div class="mf-option" onclick="Multifields.elements.row.setTemplate(\'' . $k . '\');" data-template-name="' . $k . '">' . $this->setIcon($v['icon']) . $v['label'] . '</div>';
                    $i++;
                }
            }

            if (!empty($out)) {
                $this->params['class'] .= ' mf-row-group';

                $out = '<div id="mf-templates-' . $this->params['id'] . '" class="mf-templates' . ($i > 1 ? '' : ' mf-hidden') . ' contextMenu">' . $out . '</div>';
            }
        }

        $this->params['templates'] = $out;
    }

    /**
     * @return string
     */
    public function render()
    {
        $this->setTemplates();
        $this->setActions();
        $this->setValue();

        return parent::render();
    }

    /**
     * @param $action
     * @param $type
     * @return string
     */
    protected function setAction($action, $type)
    {
        if ($action == 'resize') {
            return '
                <i class="mf-actions-' . $action . '-offset fa"></i>
                <i class="mf-actions-' . $action . '-col fa"></i>';
        }

        return parent::setAction($action, $type);
    }
}
