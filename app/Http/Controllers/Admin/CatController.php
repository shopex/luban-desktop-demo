<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Shopex\LubanAdmin\Finder;

use App\Models\Entity\Cat;
use Illuminate\Http\Request;
use Session;

class CatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $dataSet = Cat::class;

        $finder = Finder::create($dataSet, '分类列表')
                    ->setId('id')
                    ->addAction('新建分类', [$this, 'create'])
                    ->addSort('按修改时间倒排', 'created_at', 'desc')
                    ->addSort('按修改时间正排', 'created_at')
                    ->addBatchAction('删除', [$this, 'destroy'])
                    ->addColumn('操作', 'id')->modifier(function($id){
                        return '<a href="'.url("/admin/cat/$id/edit").' " title="编辑"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>编辑</button></a>';
                    })->html(true)
                    ->addColumn('名称', 'name')                    ->addColumn('排序', 'order_srot')                    ->addColumn('父ID', 'parent_id')                    
                    ->addSearch('名称', 'name', 'string')                    ->addSearch('排序', 'order_srot', 'string')                    ->addSearch('父ID', 'parent_id', 'string')                    
                    ->addTab("全部", [])
                    ->addInfoPanel('基本信息', [$this, 'detail']);

        return $finder->view();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.cat.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->validate($request, [
			'name' => 'required',
			'order_srot' => 'required',
			'parent_id' => 'required'
		]);
        $requestData = $request->all();
        
        Cat::create($requestData);

        Session::flash('flash_message', 'Cat added!');

        return redirect('admin/cat');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $cat = Cat::findOrFail($id);

        return view('admin.cat.show', compact('cat'));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function detail($id)
    {
        $cat = Cat::findOrFail($id);

        return view('admin.cat.detail', compact('cat'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $cat = Cat::findOrFail($id);

        return view('admin.cat.edit', compact('cat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        $this->validate($request, [
			'name' => 'required',
			'order_srot' => 'required',
			'parent_id' => 'required'
		]);
        $requestData = $request->all();
        
        $cat = Cat::findOrFail($id);
        $cat->update($requestData);

        Session::flash('flash_message', 'Cat updated!');

        return redirect('admin/cat');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Cat::destroy($id);

        Session::flash('flash_message', 'Cat deleted!');

        return redirect('admin/cat');
    }
}
