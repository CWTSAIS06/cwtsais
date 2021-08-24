<?php namespace Config;

class Validation
{
	//--------------------------------------------------------------------
	// Setup
	//--------------------------------------------------------------------

	/**
	 * Stores the classes that contain the
	 * rules that are available.
	 *
	 * @var array
	 */
	public $ruleSets = [
		\CodeIgniter\Validation\Rules::class,
		\CodeIgniter\Validation\FormatRules::class,
		\CodeIgniter\Validation\FileRules::class,
		\CodeIgniter\Validation\CreditCardRules::class,
	];

	/**
	 * Specifies the views that are used to display the
	 * errors.
	 *
	 * @var array
	 */
	public $templates = [
		'list'   => 'CodeIgniter\Validation\Views\list',
		'single' => 'CodeIgniter\Validation\Views\single',
	];

	public $nodes = [
        'title' => [
            'label'  => 'Node Title',
            'rules'  => 'required',
            'errors' => [
                'required' => 'Node title field is required.'
            ]
        ],

        'description' => [
            'label'  => 'Node Description',
            'rules'  => 'required',
            'errors' => [
                'required' => 'Node desciption field is required.'
            ]
        ],

    ];

		public $gender = [

				 		'gender' => [
				 				'label'  => 'Gender',
				 				'rules'  => 'required',
				 			  	'errors' => [
				 					'required' => 'Gender field is required.',
				 				]
				 			],
				  ];

		public $year = [
					'course_id' => [
						'label'  => 'Course',
						'rules'  => 'required',
						'errors' => [
							'required' => 'Course field is required.',
							]
						],
					'year' => [
						'label'  => 'Year',
						'rules'  => 'required',
						'errors' => [
							'required' => 'Year field is required.',
							]
						],
					'section' => [
						'label'  => 'Section',
						'rules'  => 'required|numeric',
						'errors' => [
							'required' => 'Section field is required.',
						]
					],
				 ];

		public $section = [
				 		'section' => [
				 		'label'  => 'Section',
				 		'rules'  => 'required',
				 		'errors' => [
				 		'required' => 'Section field is required.',
				 			]
				 		],
				 ];

		public $subject = [
				 		'code' => [
				 		'label'  => 'Subject Code',
				 		'rules'  => 'required',
				 		'errors' => [
				 		'required' => 'Subject Code field is required.',
				 			]
				 		],
				 		'subject' => [
				 		'label'  => 'Subject',
				 		'rules'  => 'required',
				 		'errors' => [
				 		'required' => 'Subject field is required.',
				 			]
				 		],
				 		'required_hrs' => [
				 		'label'  => 'Required Hours',
				 		'rules'  => 'required',
				 		'errors' => [
				 		'required' => 'Required Hours field is required.',
				 			]
				 		],
				 ];

		public $penalty = [
				 		'penalty' => [
				 		'label'  => 'Penalty',
				 		'rules'  => 'required',
				 		'errors' => [
				 		'required' => 'Penalty field is required.',
				 			]
				 		],
				 		'hours' => [
							'label'  => 'Hours',
							'rules'  => 'required',
							'errors' => [
								'required' => 'Number of Hours field is required.',
							]
				 		],
				 ];

		public $enroll = [
			'subject_id' => [
				'label' => 'Subject',
				'rules' => 'required',
				'errors' => [
					'required' => 'Subject is required.'
				]
			],
			'professor_id' => [
				'label' => 'Professor',
				'rules' => 'required',
				'errors' => [
					'required' => 'Professor is required.'
				]
			],
			'day' => [
				'label' => 'Day',
				'rules' => 'required',
				'errors' => [
					'required' => 'Day is required.'
				]
			],
			'schedule' => [
				'label' => 'schedule',
				'rules' => 'required',
				'errors' => [
					'required' => 'Schedule is required.'
				]
			]
		];

    public $role = [
        'role_name' => [
            'label'  => 'Role Name',
            'rules'  => 'required',
            'errors' => [
                'required' => 'Role Name field is required.'
            ]
        ],

        'description' => [
            'label'  => 'Role Description',
            'rules'  => 'required',
            'errors' => [
                'required' => 'Role desciption field is required.'
            ]
        ],

        'function_id' => [
            'label'  => 'Landing Page',
            'rules'  => 'required',
            'errors' => [
                'required' => 'Landing Page field is required.'
            ]
        ],

    ];

	public $user = [
        'username' => [
            'label'  => 'Username',
            'rules'  => 'required',
            'errors' => [
                'required' => 'Username field is required.'
            ]
        ],

        'password' => [
            'label'  => 'Password',
            'rules'  => 'required',
            'errors' => [
                'required' => 'Password field is required.'
            ]
        ],

        'password_retype' => [
            'label'  => 'Password Retype',
            'rules'  => 'required|matches[password]',
            'errors' => [
                'required' => 'Password field is required.',
                'matches' => 'Password Retype field must match password.'
            ]
        ],

        'role_id' => [
            'label'  => 'Role',
            'rules'  => 'required',
            'errors' => [
                'required' => 'Role field is required.'
            ]
        ],

				'firstname' => [
						'label'  => 'First Name',
						'rules'  => 'required',
						'errors' => [
								'required' => 'First Name is required.'
						]
				],

				'lastname' => [
						'label'  => 'Last Name',
						'rules'  => 'required',
						'errors' => [
								'required' => 'Last Name is required.'
						]
				],

				'email' => [
						'label'  => 'Email',
						'rules'  => 'required',
						'errors' => [
								'required' => 'Email is required.'
						]
				],

				'birthdate' => [
						'label'  => 'BirthDate',
						'rules'  => 'required',
						'errors' => [
								'required' => 'Birthdate is required.'
						]
				],

    ];

    public $user_edit = [
        'username' => [
            'label'  => 'Username',
            'rules'  => 'required',
            'errors' => [
                'required' => 'Username field is required.'
            ]
        ],

     

        'role_id' => [
            'label'  => 'Role',
            'rules'  => 'required',
            'errors' => [
                'required' => 'Role field is required.'
            ]
        ],

				'firstname' => [
						'label'  => 'First Name',
						'rules'  => 'required',
						'errors' => [
								'required' => 'First Name is required.'
						]
				],

				'lastname' => [
						'label'  => 'Last Name',
						'rules'  => 'required',
						'errors' => [
								'required' => 'Last Name is required.'
						]
				],

				'email' => [
						'label'  => 'Email',
						'rules'  => 'required',
						'errors' => [
								'required' => 'Email is required.'
						]
				],

				

    ];

		public $penaltys = [
			'enrollment_id' => [
					'label'  => 'Student',
					'rules'  => 'required',
					'errors' => [
							'required' => 'Student Type field is required.',
					]
			],
			'date' => [
					'label'  => 'Date',
					'rules'  => 'required',
					'errors' => [
							'required' => 'Date field is required.',
					]
			],
			'reason' => [
					'label'  => 'Reason',
					'rules'  => 'required',
					'errors' => [
							'required' => 'Reason field is required.',
					]
			],
		];
		public $courses = [
			'course' => [
					'label'  => 'Course',
					'rules'  => 'required|is_unique[course.course]',
					'errors' => [
							'required' => 'Course field is required.',
							'is_unique' => 'Data Already Exist!',
					]
			],
			'description' => [
					'label'  => 'Desciption',
					'rules'  => 'required|is_unique[course.description]',
					'errors' => [
							'required' => 'Course Description field is required.',
							'is_unique' => 'Data Already Exist!',
					]
			],
		];
		public $edit_courses = [
			'course' => [
					'label'  => 'Course',
					'rules'  => 'required',
					'errors' => [
							'required' => 'Course field is required.',
					]
			],
			'description' => [
					'label'  => 'Desciption',
					'rules'  => 'required',
					'errors' => [
							'required' => 'Course Description field is required.',
					]
			],
		];

		public $schyears = [
			'schyear' => [
					'label'  => 'School Year',
					'rules'  => 'required|min_length[9]|is_unique[schyear.schyear]',
					'errors' => [
							'required' => 'School Year field is required.',
							'min_length' => 'Minimum Length is 9 Characters',
							'is_unique' => 'Data Already Exist!',

					]
			],
		];

		public $edit_schyears = [
			'schyear' => [
					'label'  => 'School Year',
					'rules'  => 'required|min_length[9]',
					'errors' => [
							'required' => 'School Year field is required.',
							'min_length' => 'Minimum Length is 9 Characters',
					]
			],
		];

		public $announcements= [
			'event' => [
					'label'  => 'Announcement',
					'rules'  => 'required',
					'errors' => [
							'required' => 'Announcement field is required.',

					]
			],
			'description' => [
					'label'  => 'Description',
					'rules'  => 'required',
					'errors' => [
							'required' => 'Description field is required.',

					]
			],
			'announcement_date' => [
					'label'  => 'Announcement Date',
					'rules'  => 'required',
					'errors' => [
							'required' => 'Announcement Date field is required.',

					]
			],

			'start_time' => [
				'label'  => 'Start Time',
				'rules'  => 'required',
				'errors' => [
						'required' => 'Start Time field is required.',

				]
			],
			'end_time' => [
				'label'  => 'End Time',
				'rules'  => 'required',
				'errors' => [
						'required' => 'End Time field is required.',

				]
			],
		];
		public $students = [
			'stud_num' => [
					'label'  => 'Student number',
					'rules'  => 'required|min_length[14]|max_length[15]|is_unique[student.stud_num]',
					'errors' => [
							'required' => 'Student Number field is required.',
						 	'min_length' => 'Minimum Length is 14 Characters',
						 	'max_length' => 'Minimum Length is 15 Characters',
							'is_unique' => 'Data Already Exist!',
					]
			],

			'lastname' => [
					'label'  => 'Last Name',
					'rules'  => 'required',
					'errors' => [
							'required' => 'Last Name field is required.',
							// 'alpha' => 'Alphabetical Only.',
					]
			],

			'firstname' => [
					'label'  => 'First Name',
					'rules'  => 'required',
					'errors' => [
							'required' => 'First Name field is required.',
							'alpha' => 'Alphabetical Only.',
					]
			],

			'gender' => [
					'label'  => 'Gender',
					'rules'  => 'required',
					'errors' => [
							'required' => 'Gender field is required.',
					]
			],

			'birthdate' => [
					'label'  => 'BirthDate',
					'rules'  => 'required',
					'errors' => [
							'required' => 'Birth Date field is required.',
					]
			],

			'address' => [
					'label'  => 'Address',
					'rules'  => 'required',
					'errors' => [
							'required' => 'Address field is required.',
					]
			],

			'contact_no' => [
					'label'  => 'Contact #',
					'rules'  => 'required|is_unique[student.contact_no]',
					'errors' => [
							'required' => 'Contact Number field is required.',
							'is_unique' => 'Data Already Exist!',
					]
			],

			'email' => [
					'label'  => 'Email Address',
					'rules'  => 'required|is_unique[student.email]',
					'errors' => [
							'required' => 'Email Address field is required.',
							'is_unique' => 'Data Already Exist!',
					]
			],
			'section' => [
					'label'  => 'section',
					'rules'  => 'required',
					'errors' => [
							'required' => 'Year & Section field is required.',
					]
			],

			'course_id' => [
					'label'  => 'Course',
					'rules'  => 'required',
					'errors' => [
							'required' => 'Course field is required.',
					]
			],
		];

		public $edit_students = [
			'lastname' => [
					'label'  => 'Last Name',
					'rules'  => 'required',
					'errors' => [
							'required' => 'Last Name field is required.',
					]
			],

			'firstname' => [
					'label'  => 'First Name',
					'rules'  => 'required',
					'errors' => [
							'required' => 'First Name field is required.',
					]
			],

			'age' => [
				'label'  => 'Age',
				'rules'  => 'required',
				'errors' => [
						'required' => 'Age field is required.',
				]
			],

			'gender' => [
					'label'  => 'Gender',
					'rules'  => 'required',
					'errors' => [
							'required' => 'Gender field is required.',
					]
			],

			'birthdate' => [
					'label'  => 'BirthDate',
					'rules'  => 'required',
					'errors' => [
							'required' => 'Birth Date field is required.',
					]
			],

			'address' => [
					'label'  => 'Address',
					'rules'  => 'required',
					'errors' => [
							'required' => 'Address field is required.',
					]
			],

			'contact_no' => [
					'label'  => 'Contact #',
					'rules'  => 'required',
					'errors' => [
							'required' => 'Contact Number field is required.',
					]
			],

			'email' => [
					'label'  => 'Email Address',
					'rules'  => 'required',
					'errors' => [
							'required' => 'Email Address field is required.',
					]
			],
		

			'course_id' => [
					'label'  => 'Course',
					'rules'  => 'required',
					'errors' => [
							'required' => 'Course field is required.',
					]
			],
			
		];


		public $registration = [
			'stud_num' => [
				'label'  => 'Student number',
				'rules'  => 'required|min_length[14]|max_length[15]|is_unique[student.stud_num]',
				'errors' => [
						'required' => 'Student Number field is required.',
						 'min_length' => 'Minimum Length is 14 Characters',
						 'max_length' => 'Minimum Length is 15 Characters',
						'is_unique' => 'Data Already Exist!',
				]
			],

			'lastname' => [
					'label'  => 'Last Name',
					'rules'  => 'required|alpha',
					'errors' => [
							'required' => 'Last Name is required.',
							'alpha' => 'Alphabetical Only.',
					]
			],

			'firstname' => [
					'label'  => 'First Name',
					'rules'  => 'required',
					'errors' => [
							'required' => 'First Name is required.',
							'alpha' => 'Alphabetical Only.',
					]
			],


			'email' => [
					'label'  => 'Email Address',
					'rules'  => 'required|valid_email',
					'errors' => [
							'required' => 'Email is required.',
					]
			],

			// 'username' => [
			// 	'label'  => 'User name',
			// 	'rules'  => 'required',
			// 	'errors' => [
			// 			'required' => 'Username is required.',
			// 	]
			// ],

			'password' => [
				'label'  => 'Password',
				'rules'  => 'required',
				'errors' => [
						'required' => 'Password is required.',
				]
			],

			'password_retype' => [
				'label'  => 'Password Re-type',
				'rules'  => 'required|matches[password]',
				'errors' => [
						'required' => 'Password Re-type required.',
				]
			],
			
		

			
		];

		public $change_password = [
			'password' => [
				'label'  => 'Password',
				'rules'  => 'required',
				'errors' => [
						'required' => 'Password field is required.',
				]
			]
		];


		public $edit_profile = [
			'username' => [
				'label'  => 'Username',
				'rules'  => 'required',
				'errors' => [
					'required' => 'Username field is required.'
				]
			],

			'firstname' => [
					'label'  => 'First Name',
					'rules'  => 'required',
					'errors' => [
							'required' => 'First Name is required.'
					]
			],

			'lastname' => [
					'label'  => 'Last Name',
					'rules'  => 'required',
					'errors' => [
							'required' => 'Last Name is required.'
					]
			],

			'email' => [
					'label'  => 'Email',
					'rules'  => 'required',
					'errors' => [
							'required' => 'Email is required.'
					]
			],

		];

		public $graduates = [
			'serial_num' => [
				'label'  => 'Serial No.',
				'rules'  => 'required',
				'errors' => [
						'required' => 'Serial No. field is required.',
				]
			]
		];

		public $forgot_password = [
			'email' => [
				'label'  => 'Email',
				'rules'  => 'required',
				'errors' => [
						'required' => 'Email field is required.',
				]
			]
		];

	//--------------------------------------------------------------------
	// Rules
	//--------------------------------------------------------------------
}
