<?php

namespace Simya\Assignment6\Block\Adminhtml\Form\Field;

use Magento\Config\Block\System\Config\Form\Field\FieldArray\AbstractFieldArray;
use Magento\Framework\DataObject;
use Magento\Framework\Exception\LocalizedException;

class EmiOptions extends AbstractFieldArray
{



    protected $genderrenderer;


    protected function _prepareToRender()
    {

        $this->addColumn('choose_gender', [
            'label' => __('Choose Gender'),
            'class' => 'required-entry',
            'renderer' => $this->getGenderRenderer()
        ]);

        $this->addColumn('tenure', [
            'label' => __('Tenure'),
            'class' => 'required-entry'
        ]);

        $this->addColumn('interestrate', [
            'label' => __('Rate of Interest'),
            'class' => 'required-entry'
        ]);

        $this->_addAfter = false;
        $this->_addButtonLabel = __('Add');
    }


    protected function _prepareArrayRow(DataObject $row): void
    {
        $options = [];
        $gender = $row->getChooseGender();
        if ($gender !== null) {
            $options['option_' . $this->getGenderRenderer()->calcOptionHash($gender)] = 'selected="selected"';
        }

        $row->setData('option_extra_attrs', $options);
    }


    private function getGenderRenderer()
    {
        if (!$this->genderrenderer) {
            $this->genderrenderer = $this->getLayout()->createBlock(
                GenderColumn::class,
                '',
                ['data' => ['is_render_to_js_template' => true]]
            );
        }
        return $this->genderrenderer;
    }

}
