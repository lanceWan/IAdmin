<?php
namespace App\Models;
use Auth;
trait ActionAttributeTrait{
	/**
	 * 查看按钮
	 * @author 晚黎
	 * @date   2016-03-10T10:09:23+0800
	 * @return [type]                   [description]
	 */
	public function getShowActionButton()
	{	
		//开启查看按钮
		if (config('admin.'.$this->action.'.show')) {
			if (Auth::user()->can(config('admin.permissions.'.$this->action.'.show'))) {
				return '<a href="#" class="btn btn-xs btn-info tooltips" data-container="body" data-original-title="' . trans('label.permission.show') . '"  data-placement="top"><i class="fa fa-search"></i></a>';
			}
		}
		return '';
	}

	/**
	 * 修改按钮
	 * @author 晚黎
	 * @date   2016-03-10T10:08:56+0800
	 * @return [type]                   [description]
	 */
	public function getEditActionButton()
	{
		if (Auth::user()->can(config('admin.permissions.'.$this->action.'.edit'))) {
			return '<a href="'.url('admin/'.$this->action.'/'.$this->id.'/edit').'" class="btn btn-xs btn-primary tooltips" data-original-title="' . trans('crud.edit') . '"  data-placement="top"><i class="fa fa-pencil"></i></a>';
		}
		return '';
	}

	/**
	 * 添加回收站/禁用按钮
	 * @author 晚黎
	 * @date   2016-03-10T10:07:20+0800
	 * @return [type]                   [description]
	 */
	public function getTrashActionButton()
	{
		if (($this->status == config('admin.global.status.active')) || ($this->status == config('admin.global.status.audit'))) {
			if (Auth::user()->can(config('admin.permissions.'.$this->action.'.trash'))) {
				return '<a href="#" class="btn btn-xs btn-danger tooltips" data-container="body" data-original-title="' . trans('crud.trash') . '"  data-placement="top"><i class="fa fa-pause"></i></a>';
			}
		}
		return '';
	}

	/**
	 * 从回收站恢复到待审核状态
	 * @author 晚黎
	 * @date   2016-03-10T12:14:28+0800
	 * @return [type]                          [description]
	 */
	public function getUndoActionButton()
	{
		if (($this->status == config('admin.global.status.destory')) || ($this->status == config('admin.global.status.trash'))) {
			if (Auth::user()->can(config('admin.permissions.'.$this->action.'.undo'))) {
				return '<a href="#" class="btn btn-xs btn-danger tooltips" data-container="body" data-original-title="' . trans('crud.undo') . '"  data-placement="top"><i class="fa fa-reply"></i></a>';
			}
		}
		return '';
	}

	/**
	 * 通过审核按钮
	 * @author 晚黎
	 * @date   2016-03-10T12:12:44+0800
	 * @return [type]                   [description]
	 */
	public function getAuditActionButton()
	{
		if (($this->status == config('admin.global.status.audit'))) {
			if (Auth::user()->can(config('admin.permissions.'.$this->action.'.audit'))) {
				return '<a href="#" class="btn btn-xs btn-primary tooltips" data-container="body" data-original-title="' . trans('crud.audit') . '"  data-placement="top"><i class="fa fa-check"></i></a>';
			}
		}
		return '';
	}

	/**
	 * 彻底删除按钮
	 * @author 晚黎
	 * @date   2016-03-10T10:08:20+0800
	 * @return [type]                   [description]
	 */
	public function getDestoryActionButton()
	{
		if (($this->status == config('admin.global.status.trash'))) {
			if (Auth::user()->can(config('admin.global.permissions.'.$this->action.'.destory'))) {
				return '<a href="#" class="btn btn-xs btn-danger tooltips" data-container="body" data-original-title="' . trans('crud.destory') . '"  data-placement="top"><i class="fa fa-trash"></i></a>';
			}
		}
		return '';
	}


	

	public function getActionButtonAttribute()
	{
		return $this->getShowActionButton().
				$this->getEditActionButton().
				$this->getUndoActionButton().
				$this->getAuditActionButton().
				$this->getTrashActionButton().
				$this->getDestoryActionButton();
	}
}