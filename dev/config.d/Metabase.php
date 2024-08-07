<?php

return [
    'Metabase' => [
        'config' => [
            'links' => [
                'painel-agentes' => [
                    'link' => 'https://metabase.mapas.tec.br/public/dashboard/898173be-47ae-4987-894c-b7e54914539c',
                    'text' => 'Saiba os números de agentes individuais cadastrados, quantos são criados mensalmente, por onde estão distribuídos no território e outras informações.',
                    'title' => 'Painel sobre agentes individuais',
                    'entity' => 'Agent'
                ],
                'painel-espacos' => [
                    'link' => 'https://metabase.mapas.tec.br/public/dashboard/ea36c1b3-c3f3-4435-afc6-9faeea4c7c8f',
                    'text' => 'Saiba os números de espaços cadastrados, quantos são criados mensalmente, por onde estão distribuídos no território e outras informações.',
                    'title' => 'Painel sobre espaços',
                    'entity' => 'Space'
                ],
                'painel-oportunidades' => [
                    'link' => 'https://metabase.mapas.tec.br/public/dashboard/496d0b03-0476-4497-9a3d-719198cfe083',
                    'text' => 'Tenha acesso ao número de oportunidades e editais cadastrados, a quantidade de pessoas participantes inscritas, o perfil demográfico e mais informações.',
                    'title' => 'Painel sobre oportunidades',
                    'entity' => 'Opportunity'
                ],
            ],
            'cards' => [
                    'home' => [
                        [
                            'type' => 'space',
                            'label' => '',
                            'icon'=> 'space',
                            'iconClass'=> 'space__color',
                            'panelLink'=> 'painel-espacos',
                            'data'=> [
                                [
                                    'icon'=> 'space',
                                    'label' => 'Espaços cadastrados',
                                    'entity' => 'MapasCulturais\\Entities\\Space',
                                    'query' => [],
                                    'value' => null
                                ],
                            ]
                        ],
                        [
                            'type' => 'space',
                            'label' => '',
                            'icon'=> 'space',
                            'iconClass'=> 'space__color',
                            'panelLink'=> 'painel-espacos',
                            'data'=> [
                                [
                                    'icon'=> 'space',
                                    'label'=> 'Espaços certificados',
                                    'entity'=> 'MapasCulturais\\Entities\\Space',
                                    'query'=> [
                                        '@verified'=> 1
                                    ],
                                    'value'=> null
                                ]
                            ]
                        ],
                        [
                            'type' => 'agent',
                            'label' => '',
                            'icon'=> 'agent',
                            'iconClass'=> 'agent__color',
                            'panelLink'=> 'painel-agentes',
                            'data'=> [
                                [
                                    'icon'=> 'agent',
                                    'label' => 'Agentes cadastrados',
                                    'entity' => 'MapasCulturais\\Entities\\Agent',
                                    'query' => [],
                                    'value' => null
                                ],
                            ]
                        ],
                        [
                            'type' => 'agent',
                            'label' => '',
                            'icon'=> 'agent',
                            'iconClass'=> 'agent__color',
                            'panelLink'=> 'painel-agentes',
                            'data'=> [
                                [
                                    'icon'=> 'agent',
                                    'label' => 'Agentes individuais',
                                    'entity' => 'MapasCulturais\\Entities\\Agent',
                                    'query' => ['type' => 'EQ(1)'],
                                    'value' => null
                                ],
                            ]
                        ], 
                        [
                            'type' => 'agent',
                            'label' => '',
                            'icon'=> 'agent',
                            'iconClass'=> 'agent__color',
                            'panelLink'=> 'painel-agentes',
                            'data'=> [
                                [
                                    'icon'=> 'agent',
                                    'label' => 'Agentes coletivos',
                                    'entity' => 'MapasCulturais\\Entities\\Agent',
                                    'query' => ['type' => 'EQ(2)'],
                                    'value' => null
                                ],
                            ]
                        ],
                        // opportunity
                        [
                            'type' => 'opportunity',
                            'label' => 'Oportunidades',
                            'icon'=> 'opportunity',
                            'iconClass'=> 'opportunity__color',
                            'panelLink'=> 'painel-oportunidades',
                            'data'=> [
                                [
                                    'label' => 'Oportunidades criadas',
                                    'entity' => 'MapasCulturais\\Entities\\Opportunity',
                                    'query' => [],
                                    'value' => null
                                ],
                                [
                                    'label' => 'Oportunidades certificadas',
                                    'entity' => 'MapasCulturais\\Entities\\Opportunity',
                                    'query'=> [
                                        '@verified'=> 1
                                    ],
                                    'value' => null
                                ],
                            ]
                        ]
                            
                    ],
                    'entities' => [
                        [
                            'type' => 'space',
                            'label' => '',
                            'icon'=> 'space',
                            'iconClass'=> 'space__color',
                            'panelLink'=> 'painel-espacos',
                            'data'=> [
                                [
                                    'id' => 'espacos-cadastrados',
                                    'icon'=> 'space',
                                    'label' => 'Espaços cadastrados',
                                    'entity' => 'MapasCulturais\\Entities\\Space',
                                    'query' => [],
                                    'value' => null
                                ],
                            ]
                        ],
                        [
                            'type' => 'space',
                            'label' => '',
                            'icon'=> 'space',
                            'iconClass'=> 'space__color',
                            'panelLink'=> 'painel-espacos',
                            'data'=> [
                                [
                                    'id' => 'espacos-certificados',
                                    'icon'=> 'space',
                                    'label'=> 'Espaços certificados',
                                    'entity'=> 'MapasCulturais\\Entities\\Space',
                                    'query'=> [
                                        '@verified'=> 1
                                    ],
                                    'value'=> null
                                ]
                            ]
                        ],
                        [
                            'type' => 'agent',
                            'label' => '',
                            'icon'=> 'agent',
                            'iconClass'=> 'agent__color',
                            'panelLink'=> 'painel-agentes',
                            'data'=> [
                                [
                                    'id' => 'agentes-cadastrados',
                                    'icon'=> 'agent',
                                    'label' => 'Agentes cadastrados',
                                    'entity' => 'MapasCulturais\\Entities\\Agent',
                                    'query' => [],
                                    'value' => null
                                ],
                            ]
                        ],
                        [
                            'type' => 'agent',
                            'label' => '',
                            'icon'=> 'agent',
                            'iconClass'=> 'agent__color',
                            'panelLink'=> 'painel-agentes',
                            'data'=> [
                                [
                                    'id' => 'agentes-individuais',
                                    'icon'=> 'agent',
                                    'label' => 'Agentes individuais',
                                    'entity' => 'MapasCulturais\\Entities\\Agent',
                                    'query' => ['type' => 'EQ(1)'],
                                    'value' => null
                                ],
                            ]
                        ], 
                        [
                            'type' => 'agent',
                            'label' => '',
                            'icon'=> 'agent',
                            'iconClass'=> 'agent__color',
                            'panelLink'=> 'painel-agentes',
                            'data'=> [
                                [
                                    'id' => 'agentes-coletivos',
                                    'icon'=> 'agent',
                                    'label' => 'Agentes coletivos',
                                    'entity' => 'MapasCulturais\\Entities\\Agent',
                                    'query' => ['type' => 'EQ(2)'],
                                    'value' => null
                                ],
                            ]
                        ],
                        [
                            'type' => 'agent',
                            'label' => '',
                            'icon'=> 'agent',
                            'iconClass'=> 'agent__color',
                            'panelLink'=> 'painel-agentes',
                            'data'=> [
                                [
                                    'id' => 'agentes-cadastrados-7-dias',
                                    'icon'=> 'agent',
                                    'label' => 'Cadastrados nos últimos 7 dias',
                                    'entity' => 'MapasCulturais\\Entities\\Agent',
                                    'query'=> [
                                        '@select' => 'createTimestamp'
                                    ],
                                    'value' => null
                                ],
                            ]
                        ],
                        [
                            'type' => 'opportunity',
                            'label' => 'Oportunidades',
                            'icon'=> 'opportunity',
                            'iconClass'=> 'opportunity__color',
                            'panelLink'=> 'painel-oportunidades',
                            'data'=> [
                                [
                                    'icon'=> 'opportunity',
                                    'label' => 'Oportunidades criadas',
                                    'entity' => 'MapasCulturais\\Entities\\Opportunity',
                                    'query' => [],
                                    'value' => null
                                ],
                            ]
                        ],
                        [
                            'type' => 'opportunity',
                            'label' => 'Oportunidades certificadas',
                            'icon'=> 'opportunity',
                            'iconClass'=> 'opportunity__color',
                            'panelLink'=> 'painel-oportunidades',
                            'data'=> [
                                [
                                    'icon'=> 'opportunity',
                                    'label' => 'Oportunidades certificadas',
                                    'entity' => 'MapasCulturais\\Entities\\Opportunity',
                                    'query'=> [
                                        '@verified'=> 1
                                    ],
                                    'value' => null
                                ],
                            ]
                        ]
                    ]
            ]
        ]
    ]
];
