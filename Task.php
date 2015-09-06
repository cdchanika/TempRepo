<?php
class Task{
	private taskID;
	private $taskName;
	private $taskDescription;
	private $taskCreator;
	private $taskStatus;
	private $taskAssignees;

	function __construct($taskID){
		$this->taskID = $taskID;
	}
	
	public function createTask($taskName,$taskDescription,$taskCreator){
		$this->taskName = $taskName;
		$this->taskDescription = $taskDescription;
		$this->taskCreator = $taskCreator;
	}
	
	public function assignTask($taskAssignees){
		$this->taskAssignees = $taskAssignees;
	}
	
	public function changeTaskStatus($taskStatus){
		$this->taskStatus = $taskStatus;
	}
	
	public function updateTask($taskDescription,$taskAssignees){
		$this->taskDescription = $taskDescription;
		$this->taskAssignees = $taskAssignees;
	}
}
?>