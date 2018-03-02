<?php
/**
 * Schema setup
 *
 * @category  Mustela
 * @package   Mustela_Questions
 * @author    Mykhaylo Shovak <mysho@smile.fr>
 * @copyright 2017 Smile
 */
/** @var Magento\Framework\Setup\ModuleDataSetupInterface $setup */
/** @var Mustela\Mag\Setup\InstallSetup $this */

$setup->startSetup();

$questionsTree = [
    'Mustela Questions' => [
        'Pregnancy' => [
            'Pre-Pregnancy' => [
                'How to Conceive',
                'What to Eat',
            ],
            'Prenatal' => [
                '1st Trimester' => [
                    'Health',
                    'Style',
                    'Fitness',
                ],
                '2nd Trimester' => [
                    'Health',
                    'Style',
                    'Fitness',
                ],
                '3rd Trimester' => [
                    'Health',
                    'Style',
                    'Fitness',
                ],
            ],
            'Postpartum'    => [
                'Health',
                'Style',
                'Fitness',
            ],
        ],
        'Baby & Child' => [
            'Baby Skin Types' => [
                'Baby Skin',
                'Normal Skin',
                'Dry Skin',
                'Eczema-Prone Skin' => [
                    'Understanding and preventing atopy',
                    'Atopic-prone skin care',
                    'Daily life with atopic skin',
                ],
                'Very Sensitive Skin',
            ],
            'Skin Concerns' => [
                'General Health',
                'Irritated Areas',
                'Diaper Rash',
                'Sun Protection vs Sun Care',
                'Cradle Cap',
            ],
            'Baby Development' => [
                'Baby General Advice',
                '0-1 Month',
                '1-3 Months',
                '3-6 Months',
                '6-9 Months',
                '9-12 Months',
                '12+ Months',
                'Seasonal Events',
            ],
            'Routines' => [
                'Bathtime',
                'Diaper Change',
                'Massage',
                'Hydration',
                'Cleansing',
            ],
        ],
        "What's best for my baby" => [
            'Natural vs. Organic',
            'Natural Ingredients in Mustela' => [
                'Avocado Perseose',
                'Sunflower Oil Distillate',
                'Cold Cream',
            ],
            'Sustainability',
            'Safe Ingredients for Babies',
        ],
    ],
];

$this->generateHierarchyTree($questionsTree);

$setup->endSetup();
