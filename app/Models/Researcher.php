<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Researcher extends Model
{
	/**
	 * 通过项目id
	 * @param		
	 * @author		wen.zhou@bioon.com
	 * @date		2016-05-06 15:16:03
	 * @return		
	 */
    public function ScopeByProjectId($query, $projectId){
    	return $query->where('project_id', $projectId);
    }

	/**
	 * 通过用户id
	 * @param		
	 * @author		wen.zhou@bioon.com
	 * @date		2016-05-06 15:16:03
	 * @return		
	 */
    public function ScopeByUserId($query, $userId){
    	return $query->where('user_id', $userId);
    }

    /**
	 * 研究者正常
	 * @param		
	 * @author		wen.zhou@bioon.com
	 * @date		2016-05-06 15:16:03
	 * @return		
	 */
    public function ScopeByStatusActive($query){
    	return $query->where('status', config('admin.global.status.active'));
    }

    /**
	 * 研究者禁止
	 * @param		
	 * @author		wen.zhou@bioon.com
	 * @date		2016-05-06 15:16:03
	 * @return		
	 */
    public function ScopeByStatusBan($query){
    	return $query->where('status', config('admin.global.status.ban'));
    }

    /**
	 * 研究者类型
	 * @param		
	 * @author		wen.zhou@bioon.com
	 * @date		2016-05-06 15:16:03
	 * @return		
	 */
    public function ScopeByRoleStatus($query, $roleStatus){
    	return $query->where('role_status', $roleStatus);
    }

    /**
     * 项目一对一关系
     */
    public function project(){
    	return $this->hasOne(Project::class);
    }
}
