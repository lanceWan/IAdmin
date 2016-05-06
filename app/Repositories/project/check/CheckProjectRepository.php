<?php
	namespace App\Respositories\Project\Check;

	use App\Models\Researcher;

	use ResearcherRepo;

	class CheckProjectRepository{

		/**
		 * 验证是否是项目的发起人
		 * @param		string  $projectId   项目id
		 * @author		wen.zhou@bioon.com
		 * @date		2016-05-06 15:03:06
		 * @return		
		 */
		public function isProjectSponsor($projectId){
			return $this->checkRoleStatus(config('admin.global.statue.role.sponsor'));
		}

		/**
		 * 验证是否是项目的主要研究者
		 * @param		
		 * @author		wen.zhou@bioon.com
		 * @date		2016-05-06 15:55:07
		 * @return		
		 */
		public function isProjectMajor($projectId){
			return $this->checkRoleStatus(config('admin.global.status.role.marjor'));
		}

		/**
		 * 验证是否是项目的研究者
		 * @param		
		 * @author		wen.zhou@bioon.com
		 * @date		2016-05-06 15:55:19
		 * @return		
		 */
		public function isProjectNormal($projectId){
			return $this->checkRoleStatus(config('admin.global.status.role.normal'));
		}

		/*===============================私有方法=========================================*/
		/**
		 * 验证 角色状态
		 * @param		
		 * @author		wen.zhou@bioon.com
		 * @date		2016-05-06 16:05:23
		 * @return		
		 */
		private function checkRoleStatus($roleStatus){
			$researhcer = ResearcherRepo::researcherInfo($projectId);
			if($researhcer){
				//研究者是否正常
				if(config('admin.global.status.active') == $researhcer['status']){
					/*判断角色状态*/
					if($roleStatus == $researhcer['role_status']){
						return true;
					}else{
						return false;
					}
				}else{
					return false;
				}
			}else{
				return false;
			}
		}	
	}