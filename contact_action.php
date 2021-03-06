<?php
include('dbconnect.php');
include('functions.php');

if(isset($_POST['btn_action']))
{
	if($_POST['btn_action'] == 'Add')
	{	
    	$ecname = $_POST['ecname'];
    	$ecemail = $_POST['ecemail'];
    	$ecphone = $_POST['ecphone'];
    	$ecfax = $_POST['ecfax'];
    	$ecwebsite = $_POST['ecwebsite'];
    	$ecaddress1 = $_POST['ecaddress1'];
    	$ecaddress2 = $_POST['ecaddress2'];
    	$eccity = $_POST['eccity'];
    	$ecstate = $_POST['ecstate'];
    	$eczip = $_POST['eczip'];
    	$eccountry = $_POST['eccountry'];
    	$modify_date = date("Y-m-d h:i");
    	$modify_by = $_SESSION['acct_id'];
    	$ecstatus = "Active";
    
        $query ="INSERT INTO Entity_Contact VALUES (null, '$ecname', '$ecemail', '$ecphone', '$ecfax', '$ecwebsite', '$ecaddress1', '$ecaddress2', '$eccity', '$ecstate', '$eczip', '$eccountry', $modify_by, '$modify_date', $modify_by, '$ecstatus')";
        
		if($dbconnect->query($query) === TRUE){
			echo "New Contact Added";
		}
    	else{
        	echo $query;
        }
	}

	//// load single item into update form
	if($_POST['btn_action'] == 'fetch_single')
	{
    	$ercid =  $_POST['ercid'];
        $ercarray = explode(".", $ercid);
        $ecid = $ercarray[0];
        $eid = $ercarray[1];

        $query = "SELECT * FROM Entity_RelateTo_Contact WHERE ECID = $ecid AND EID = $eid";
        $result = $dbconnect->query($query);
        while($row = $result->fetch_assoc()){
            // retrieve data from database and load into edit form
            $output['ercid'] = $ercid;
            $output['eid'] = $row['EID'];
            $output['ecid'] = $row['ECID'];
            $output['priority'] = $row['Priority'];
            $output['erctitle'] = $row['ERCTitle'];
        }
        echo json_encode($output);
	}

	//// submit update/edit item information
	if($_POST['btn_action'] == 'Edit')
	{
    	$query = "";
    	$projectid = $_POST['project_id'];
    	$projectname = $_POST['project_name'];
        $projectdescription = $_POST['project_description'];
    	$brandid = $_POST['brand_id'];
    	$deptid = $_POST['dept_id'];
    	$date_created = $_POST['datecreated'];
    	$start_date = $_POST['startdate'];
    	$est_end_date = $_POST['estcompletedate'];
    	$end_date = $_POST['completedate'];
    	$project_lead = $_POST['project_lead'];
    	$modify_date = date("Y-m-d H:i");
    	$modify_by = $_SESSION['acct_id'];
    	$project_progress = $_POST['progress'];
    	$project_status = $_POST['status'];
    
    	if($end_date == NULL){
        	$query = "UPDATE Project SET ProjectName = '$projectname', ProjectDescription = '$projectdescription', BrandBelongTo = '$brandid', DeptBelongTo = '$deptid', DateCreated = '$date_created', StartDate = '$start_date', EstEndDate = '$est_end_date', Progress = '$project_progress', ProjectStatus = '$project_status', ProjectLead = $project_lead, ModifyDate = '$modify_date', ModifyBy = $modify_by 
            WHERE ProjectID = $projectid";
        }
    	else{
			$query = "UPDATE Project SET ProjectName = '$projectname', ProjectDescription = '$projectdescription', BrandBelongTo = '$brandid', DeptBelongTo = '$deptid', DateCreated = '$date_created', StartDate = '$start_date', EstEndDate = '$est_end_date', EndDate = '$end_date', Progress = '$project_progress', ProjectStatus = '$project_status', ProjectLead = $project_lead, ModifyDate = '$modify_date', ModifyBy = $modify_by 
            WHERE ProjectID = $projectid";
        }
		if($dbconnect->query($query) === TRUE)
		{
			echo 'Project '.$projectname.' Updated';
		}
    	else
        {
        	echo "Failed to Update";
        }
	}

	if($_POST['btn_action'] == 'delete')
	{	
    	$ecid =  $_POST['ecid'];

    	$modify_date = date("Y-m-d H:i");
    	$modify_by = $_SESSION['acct_id'];
    	$status = "Active";
        if($_POST['status'] == "Active"){
            $status = "InActive";
        }   
        $query = "UPDATE Entity_Contact SET ECStatus = '$status', ECModifyDate = '$modify_date', ECModifyBy = $modify_by WHERE ECID = $ecid";
        if($dbconnect->query($query) == TRUE){
            echo 'Contact is Set to '.$status;
        }
        else{
            echo $query;
        }
		
	}
}

?>