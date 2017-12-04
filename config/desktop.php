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
	'searchbar'=>[
	    ['label'=>'搜索用户', 'action'=>'/search/user', 'regexp'=>'[a-z0-9\.\_\+\-]'],
	    ['label'=>'搜索手机号', 'action'=>'/search/phone', 'regexp'=>'^[0-9\s]+$'],
	    ['label'=>'搜索邮箱', 'action'=>'/search/email', 'regexp'=>'^[a-z0-9\.\_\+\-]+@[a-z0-9\.\_\-]+$'],
	]

];