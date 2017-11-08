<?php
return [
	'menus'=>[
		['label'=>'了解系统',  'route'=>'welcome'],
	    ['label'=>'首页', 'route'=>'home'],
		['label'=> '菜单组二',  'items'=>[
			['label'=>'菜单', 'link'=>'/'],
			[],
				['label'=>'菜单', 'link'=>'/'],
				['label'=>'菜单', 'link'=>'/'],
				[],
				['label'=>'菜单', 'link'=>'/'],
				['label'=>'菜单', 'link'=>'/'],
		]],
	    ['label'=> '权限',  'items'=>[
	            ['label'=>'用户', 'route'=>'users.index', 'params'=>[] ],
	            ['label'=>'角色', 'route'=>'roles.index', 'params'=>[]],
	    ]],
	    ['label'=> '开发者工具',  'items'=>[
	            ['label'=>'代码生成', 'route'=>'admin.generator.index','params'=>[] ],
	    ]],

	],

];