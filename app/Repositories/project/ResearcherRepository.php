<?php
	namespace App\Repositories\Project;

	use App\Models\Researcher;

	class ResearcherRepository{
		private $this->userId;

		public function __construct(){
			$this->userId = auth()->user->id;
		}

		/*=======================================获取信息================================*/
		/**
		 * 获取 研究者 信息
		 * @param		
		 * @author		wen.zhou@bioon.com
		 * @date		2016-05-06 15:52:02
		 * @return		
		 */
		public function researcherInfo($projectId){
			if($checkValue = checkEmpty($projectId)){
				return Researcher::byProjectId($projectId)
					->byUserId($this->userId)
					->first();
			}
			return $checkValue;
		}

		/**
		 * 获取 当前研究者的项目列表
		 * @param		
		 * @author		wen.zhou@bioon.com
		 * @date		2016-05-06 16:21:24
		 * @return		
		 */
		public function researcherProjectList(){
			Researcher::with('project')->byUserId($this->userId)->get();
		}

		/*======================================修改信息====================================*/
	}