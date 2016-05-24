<?php
namespace App\Models;
use Auth;
trait ActionAttributeTrait{
	/**
	 * 查看按钮
	 * @author 晚黎
	 * @date   2016-04-13T16:52:18+0800
	 * @param  boolean                  $type [默认为跳转页面查看信息,false时a链接带上modal样式]
	 * @return [type]                         [description]
	 */
	public function getShowActionButton($type = true)
	{
		//开启查看按钮
		if (config('admin.global.'.$this->action.'.show')) {
			if (Auth::user()->can(config('admin.permissions.'.$this->action.'.show'))) {
				if ($type) {
					return '<a href="'.url('admin/'.$this->action.'/'.$this->id).'" class="btn btn-xs btn-info tooltips" data-container="body" data-original-title="' . trans('labels.'.$this->action.'.show') . '"  data-placement="top"><i class="fa fa-search"></i></a>';
				}
				return '<a href="'.url('admin/'.$this->action.'/'.$this->id).'" class="btn btn-xs btn-info tooltips" data-toggle="modal" data-target="#draggable" data-container="body" data-original-title="' . trans('labels.'.$this->action.'.show') . '"  data-placement="top"><i class="fa fa-search"></i></a>';
			}
			return '';
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
				return '<a href="'.url('admin/'.$this->action.'/'.$this->id.'/mark/'.config('admin.global.status.trash')).'" class="btn btn-xs btn-danger tooltips" data-container="body" data-original-title="' . trans('crud.trash') . '"  data-placement="top"><i class="fa fa-pause"></i></a>';
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
				return '<a href="'.url('admin/'.$this->action.'/'.$this->id.'/mark/'.config('admin.global.status.audit')).'" class="btn btn-xs btn-danger tooltips" data-container="body" data-original-title="' . trans('crud.undo') . '"  data-placement="top"><i class="fa fa-reply"></i></a>';
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
				return '<a href="'.url('admin/'.$this->action.'/'.$this->id.'/mark/'.config('admin.global.status.active')).'" class="btn btn-xs btn-primary tooltips" data-container="body" data-original-title="' . trans('crud.audit') . '"  data-placement="top"><i class="fa fa-check"></i></a>';
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
	public function getDestoryActionButton($showType = true)
	{
		if (($this->status == config('admin.global.status.trash')) || $showType == false) {
			if (Auth::user()->can(config('admin.permissions.'.$this->action.'.destory'))) {
				return '<a href="javascript:;" onclick="return false" class="btn btn-xs btn-danger tooltips" data-container="body" data-original-title="' . trans('crud.destory') . '"  data-placement="top" id="destory"><i class="fa fa-trash"></i><form action="'.url('admin/'.$this->action.'/'.$this->id).'" method="POST" name="delete_item" style="display:none"><input type="hidden" name="_method" value="delete"><input type="hidden" name="_token" value="'.csrf_token().'"></form></a>';
			}
		}
		return '';
	}

	/**
	 * 修改用户密码
	 * @author 晚黎
	 * @date   2016-04-14T09:30:32+0800
	 * @return [type]                   [description]
	 */
	public function getResetActionButton()
	{
		if (Auth::user()->can(config('admin.permissions.'.$this->action.'.reset'))) {
			return '<a href="'.url('admin/user/'.$this->id.'/reset').'" class="btn btn-xs btn-danger tooltips" data-container="body" data-original-title="' . trans('crud.reset') . '"  data-placement="top"><i class="fa fa-lock"></i></a>';
		}
		return '';
	}


	

	public function getActionButtonAttribute($showType = true)
	{
		return $this->getShowActionButton($showType).
				$this->getResetActionButton().
				$this->getEditActionButton().
				$this->getUndoActionButton().
				$this->getAuditActionButton().
				$this->getTrashActionButton().
				$this->getDestoryActionButton($showType);
	}
}