<?php
/*
|--------------------------------------------------------------------------
| typeobject 注册配置
|--------------------------------------------------------------------------
| laravel模板模式
| {{ Form::finder_user("name", $value = "1", $attributes = array('class'=>'form-control')) }}
| vue模式
| <objectinput type="user" value="12" multiple="multiple" name="user" filters="[{'id','>','10'}]"></objectinput>
*/

return [
	'object'=>function(){
		Admin::RegisterObjectInput("role", App\Role::class)
            ->setId("id")
            ->addSearch('名称', 'name', 'string')
            ->addColumn('名称', 'name');
	},
];

