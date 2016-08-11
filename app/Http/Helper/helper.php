<?php

function totalLeaves($leaveType)
{
    $result = [
        '1' => '24',//casual leave
        '2' => '6',//sick leave
        '3' => '15',//marriage leave
        '4' => '10',//bereavement leave
        '6' => '15',//paternity leave
        '12' => '90',//maternity leave
        '7' => '0',
        '8' => '0',
        '9' => '0',
        '10' => '0',
        '11' => '0'
    ];

    return $result[$leaveType];
}


function convertRole($role)
{
    $data = [
        'Admin' => '1',
        'Director' => '2',
        'Research Analyst' => '3',
        'Senior Research Analyst' => '4',
        'Team Lead' => '5',
        'IT Executive' => '6',
        'HR Manager' => '7',
        'Associate-Enforcement' => '8',
        'Enforcement Head' => '9',
        'Finance Controller' => '10',
        'Consultant' => '11',
        'Front desk Executive' => '12',
        'Software Developer' => '13',
        'Senior Software Developer' => '14',
        'Accounts Executive' => '15',
        'Manager' => '16'
        //bharo baki
    ];
    return $data[$role];
}


function convertStatus($emp_status)
{
    $data = [
        'Present' => '1',
        'Ex' => '0'
    ];
    return $data[$emp_status];
}

function convertStatusBack($emp_status)
{
    $data = [
        '1' => 'Present',
        '0' => 'Ex'
    ];
    return $data[$emp_status];
}

function getLeaveType($leave_id)
{
    $result = \App\Models\LeaveType::where('id', $leave_id)->first();
    return $result->leave_type;
}

function covertDateToDay($date)
{
    $day = strtotime($date);
    $day = date("l", $day);
    return strtoupper($day);
}

function getFormattedDate($date)
{
    $date = new DateTime($date);
    return date_format($date,'l jS \\of F Y');
}

    function getEmployeeDropDown()
    {
        $data = [

            "" => "Select",
            'name' => 'Name',
            'code' => 'Code',
            'department' => 'Department',
            'email' => 'Email',
            'number' => 'Number'
        ];
        return $data;
    }

function getLeaveColumns()
{
    $data = [
        "" => "Select",
        'name' => 'Name',
        'code' => 'Code',
        'days' => 'Days',
        'leave_type' => 'Leave type',
        'status' => 'Status'
     ];

    return $data;
}