<?php
return [
	/*
    |--------------------------------------------------------------------------
    | 默认权限配置
    |--------------------------------------------------------------------------
    |
    | 这个配置控制了数据权限和路由权限的数据源
    |
    */
	'defaults'=>[
		'router'=>'shopadmin',
		'data'=>'org',
	],
	'data' => [
		'org' => [
			'repositroy' => App\Group::class,
			'manger' => App\GroupManger::class,
			'resources' => [
				["name" => App\Shop::class,'resource_id'=>'shop_id'],
				["name" => App\Order::class,'resource_id'=>'shop_id']
			],
			'proxy'=> App\PermissionUser::class,
			'user' => App\User::class,
		],
		'shop' => [
			'repositroy' => App\Group::class,
			'manger' => App\GroupManger::class,
			'resources' => [
				["name" => App\Shop::class,'resource_id'=>'shop_id'],
				["name" => App\Order::class,'resource_id'=>'shop_id']
			],
			'proxy' => App\PermissionUser::class,
			'user' => App\User::class,
		],
	],
	'router'=>[
		'shopadmin'=>[
			[	
				'group'=>'用户',
				'permissions'=>[
					'users.list' =>   ['name'=>'用户列表','routes'=>['users.index'] ],
					'users.add' =>    ['name'=>'用户新增','routes'=>['users.create','users.store'] ],
					'users.deteil' => ['name'=>'用户详情','routes'=>['users.show'] ],
					'users.update' => ['name'=>'用户编辑','routes'=>['users.edit','users.update']],
					'users.delete' => ['name'=>'用户删除','routes'=>['users.destroy']],
				]
			],
			[	
				'group'=>'角色',
				'permissions'=>[
					'roles.list' =>   ['name'=>'角色列表','routes'=>['roles.index'] ],
					'roles.add' =>    ['name'=>'角色新增','routes'=>['roles.create','roles.store'] ],
					'roles.deteil' => ['name'=>'角色详情','routes'=>['roles.show'] ],
					'roles.update' => ['name'=>'角色编辑','routes'=>['roles.edit','roles.update']],
					'roles.delete' => ['name'=>'角色删除','routes'=>['roles.destroy']],
				]
			],
			[	
				'group'=>'代码生成',
				'permissions'=>[
					'admin.generator.create' =>   [
						'name'=>'代码创建',
						'routes'=>['admin.generator.new','admin.generator.post'] 
					],
					'admin.generator.list' =>    [
						'name'=>'代码列表',
						'routes'=>['admin.generator.index'] 
					],
					'admin.generator.edit' => [
						'name'=>'角色编辑',
						'routes'=>['admin.generator.edit','admin.generator.post']
					],
					
				]
			],
		],
	],
];