<?php
	namespace App\Repositories\Project;

	use App\Models\Project;

	class ProjectRepository{
		private $this->userId;

		public function __construct(){
			$this->userId = auth()->user->id;
		}

		/*=======================================获取信息================================*/
		/**
		 * 获取项目信息
		 * @param		
		 * @author		wen.zhou@bioon.com
		 * @date		2016-05-06 14:22:53
		 * @return		
		 */
		public function projectInfo($projectId){
			if($checkValue = checkEmpty($id)){
				return Project::byId($projectId);
			}
			return $checkValue;
		}

		/*======================================修改信息====================================*/
		/**
		 * 修改项目
		 * @param		
		 * @author		wen.zhou@bioon.com
		 * @date		2016-05-06 16:43:57
		 * @return		
		 */
		public function projectUpdate($projectId, $data){
			if($projectInfo = $this->projectInfo($projectId)){
				if($project = $projectInfo->fill($data)->save()){
					return $project;
				}
				return $project;
			}
			return $projectInfo;
		}

		/*====================================删除信息====================================*/
		/**
		 * 删除项目
		 * @param		
		 * @author		wen.zhou@bioon.com
		 * @date		2016-05-06 16:47:25
		 * @return		
		 */
		public function projectDelete($projectId){
			if($projectInfo = $this->projectInfo($projectId)){
				$data = [
					'status' => config('admin.global.status.project.exit'),
				];
				if($project = $projectInfo->fill($data)->save()){
					return $project;
				}
				return $project;
			}
			return $projectInfo;
		}
	}