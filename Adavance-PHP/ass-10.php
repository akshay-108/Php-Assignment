<?php


// Find depth/ level for a provided array

// function array_depth($arr)
// {

// }

$arr=[
    [1,2,3,4,5,6,
        ['akshay','harshada','sandesh'],
        ['html','css','javascript']
    ],

    ['ratnagiri','malvan','goa'],

    [7,8,9,
        [1,2,3,4,5,6,
            [10,11,12,13,
                [14,15,
                    [16,17,18,19,20,
                        [21,22,23,
                            [26,27,28,29,30],24,25]
                        ]
                ]
            ]
        ]
    ]
];

function find_depth($arr)
{
        if(is_array($arr)) 
        {
            return 1 + max(array_map('find_depth',$arr)); 
        } 
}

$result=find_depth($arr);
echo $result-1;

  
?>