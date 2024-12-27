<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>{{config('app.name')}}</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    </script>
</head>
<style>
    .page_break {
        page-break-before: always;
        margin-top: 100px;
    }

    #first {
        display: none;
    }

    table {
        border-spacing: 0;
        border-collapse: collapse;
        margin-top: 10px;
    }

    body {
        /* font-family: "Century Gothic", CenturyGothic, AppleGothic, sans-serif; */
        font-size: 9;
        margin-top: 120px;
    }

    @page {
        margin: 90px 50px 80px 50px;
    }

    .page-break {
        page-break-after: always;
    }

    header {
        position: fixed;
        top: -75px;
        left: 0px;
        right: 0px;
        color: black;
        text-align: left;
        background-color: #ffffff;
    }

    .text-right {
        text-align: right;
    }

    footer {
        position: fixed;
        bottom: -60px;
        left: 0px;
        right: 0px;
        height: 50px;
    }

    /* .footer {
        position: fixed;
        top: 750px;
        left: 500px;
        right: 0px;
        height: 50px;
    } */

    .fixed {
        position: fixed;
        top: -135px;
        left: 800px;
        right: 0px;
        height: 20px;
    }

    .page-number:after {
        content: counter(page);
    }

    table {
        page-break-inside: auto;
        width: 100%;
    }

    thead {
        display: table-row-group;
    }

    tr {
        page-break-inside: auto;
    }

    p {
        text-align: justify;
        text-justify: inter-word;
        margin: 0;
        padding: 0;
    }

    .upperline {
        -webkit-text-decoration-line: overline;
        /* Safari */
        text-decoration: overline
    }

    hr {
        margin-top: 0em;
        margin-bottom: 0em;
        border: none;
        height: 2px;
        /* Set the hr color */
        color: #333;
        /* old IE */
        background-color: #333;
        /* Modern Browsers */
    }

    hr.soft {
        margin-top: 0em;
        margin-bottom: 0em;
        border: none;
        height: .5px;
    }

    input[type=checkbox] {
        display: inline;
    }

    tr.no-bottom-border td {
        border-bottom: none;
        border-top: none;
    }

    #requestor::after {
        content: "Requestor";
    }
</style>
    
<body>
    <div class="page-break">
        <footer>
            <table style='width:100%;' border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td class='text-left"'>
                        <p class="m-0"><i>WGI-FR-ITD-012</i></p>
                        <p class="m-0"><i>Rev. 0 12/15/2023</i></p>
                    </td>
                    <td class='text-center'>
                        <i ></i>
                    </td>
                    <td class='text-right'>
                        <span class="page-number">Page <script type="text/php">{PAGE_NUM} of {PAGE_COUNT}</script></span>
                    </td>
                </tr>
            </table>
        </footer>
        <header>
            <table style='width:100%;' border="1" cellspacing="0" cellpadding="0">
                <tr>
                    <td width='100px' style='width:20; text-align:center;' rowspan="2">
                        <img src="{{asset('img/wgroup.png')}}" alt="" height="100" style="margin: auto;">
                    </td>
                    <td colspan="3">
                        <span class='m-0 p-0' style='font-size:8;margin-top;0px;padding-top:0px;'>
                            <p class="text-center" style="font-weight: bold;">Subsidiaries and Affiliates </p>
                        </span>
                        <hr class='soft'>
    
                        <table style='font-size:9;margin-top;0px;padding-top:0px;' style='width:100%;' border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td class='text-left' style='width:15%;'></td>
                                <td class='text-left'><input type='checkbox'> WGI</td>
                                <td class='text-left'><input type='checkbox'> WHI Carmona</td>
                                <td class='text-left'><input type='checkbox'> FMPI/FMTCC</td>
                            </tr>
                            <tr>
                                <td class='text-left' style='width:15%;'></td>
                                <td class='text-left'> <input type='checkbox'> WHI - HO</td>
                                <td class='text-left'><input type='checkbox'> CCC</td>
                                <td class='text-left'><input type='checkbox'> PBI</td>
                            </tr>
                            <tr>
                                <td class='text-left' style='width:15%;'></td>
                                <td class='text-left'> <input type='checkbox'> WLI</td>
                                <td class='text-left'><input type='checkbox'> MRDC </td>
                                <td class='text-left'><input type='checkbox'> Others: ________</td>
                            </tr>
                            <tr>
                                <td class='text-left' style='width:15%;'></td>
                                <td class='text-left'> <input type='checkbox'> PRI</td>
                                <td class='text-left'><input type='checkbox'> SPAI </td>
                                {{-- <td class='text-left'><input type='checkbox'> </td> --}}
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" class='text-center p-1'>
                        <p style="font-size: 10">Form Title :</p>
                        <p style="font-weight: bold; font-size:17px;" class="text-center">{{strtoupper('system change request form')}}</p>
                    </td>
                </tr>
            </table>
        </header>

        <table cellpadding="0" cellspacing="0" border="1" width="100%">
            <tr>
                <td colspan="2" class="p-1">
                    <p class="font-weight-bold" style="font-size: 9;">{{strtoupper('project name :')}} <span style="font-weight: normal;">{{$project_task->project_name}}</span></p>
                </td>
                <td class="p-1">
                    <p class="font-weight-bold" style="font-size: 9;">{{strtoupper('control no # :')}}</p>
                </td>
            </tr>
            <tr>
                <td class="p-1">
                    <p class="font-weight-bold" style="font-size: 9;">{{strtoupper('requested by :')}} <span style="font-weight: normal;">{{$project_task->user->name}}</span></p>
                </td>
                <td class="p-1">
                    <p class="font-weight-bold" style="font-size: 9;">{{strtoupper('department :')}} <span style="font-weight: normal;">{{$project_task->project->department->name}}</span></p>
                </td>
                <td class="p-1">
                    <p class="font-weight-bold" style="font-size: 9;">{{strtoupper('date requested :')}} <span style="font-weight: normal;">{{date('m/d/Y', strtotime($project_task->created_at))}}</span></p>
                </td>
            </tr>
        </table>

        <p class="mt-3 font-weight-bold" style="text-decoration:underline">Part I. System Change Request</p>

        <table cellpadding="0" cellspacing="0" border="0" width="100%">
            <tr>
                <td class="p-1" width="20%"  style="border: 1px solid black;">
                    <p class="font-weight-bold" style="font-size: 9;">{{strtoupper('type of request:')}}</p>
                </td>
                <td width="3%" style="border: none;">

                </td>
                <td class="p-1" style="border: 1px solid black;">
                    <table border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td class='text-left'><input type='checkbox' @if($project_task->type_of_request == 'New Report') checked @endif> NEW REPORT</td>
                            <td class='text-left'><input type='checkbox' @if($project_task->type_of_request == 'New Functions') checked @endif> NEW FUNCTION</td>
                        </tr>
                        <tr>
                            <td class='text-left'><input type='checkbox' @if($project_task->type_of_request == 'Modification') checked @endif> MODIFICATION</td>
                            <td class='text-left'><input type='checkbox'> OTHERS:______</td>
                        </tr>
                    </table>
                </td>
                <td class="p-1" style="border: 1px solid black;">
                    <p class="font-weight-bold" style="font-size: 9;">DATE NEEDED: <span style="font-weight:normal;">{{date('m/d/Y', strtotime($project_task->date_needed))}}</span></p>
                </td>
            </tr>
        </table>

        <table cellpadding="0" cellspacing="0" border="0" width="100%">
            <tr>
                <td class="p-1" width="20%"  style="border: 1px solid black;">
                    <p class="font-weight-bold" style="font-size: 9;">{{strtoupper('priority:')}}</p>
                </td>
                <td width="3%" style="border: none;">

                </td>
                <td class="p-1" style="border: 1px solid black;">
                    <table border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td class='text-left'><input type='checkbox' @if($project_task->priority == 'High') checked @endif> HIGH</td>
                            <td class='text-left'><input type='checkbox' @if($project_task->priority == 'Medium') checked @endif> MEDIUM</td>
                            <td class='text-left'><input type='checkbox' @if($project_task->priority == 'Low') checked @endif> LOW</td>
                        </tr>
                    </table>
                </td>
                <td class="p-1" style="border: 1px solid black;">
                    <p class="font-weight-bold" style="font-size: 9;">DATE ACCOMPLISHED: <span style="font-weight:normal;"></span></p>
                </td>
            </tr>
        </table>

        <table cellpadding="0" cellspacing="0" border="0" width="100%">
            <tr>
                <td class="p-1" width="20%" height="11%" style="border: 1px solid black; vertical-align: top;">
                    <p class="font-weight-bold" style="font-size: 9;">{{strtoupper('activity/task:')}} </p>
                </td>
                <td width="3%" style="border: none;" >

                </td>
                <td class="p-1" style="border: 1px solid black; vertical-align: top;">
                    <p class="m-0">{!! nl2br(e($project_task->activity_task)) !!}</p>
                </td>
            </tr>
        </table>

        <table cellpadding="0" cellspacing="0" border="0" width="100%">
            <tr>
                <td class="p-1" width="20%" style="border: 1px solid black; vertical-align: top;">
                    <p class="font-weight-bold" style="font-size: 9;">REASON FOR CHANGES:</p>
                </td>
                <td width="3%" style="border: none;" >

                </td>
                <td class="p-1" style="border: 1px solid black; vertical-align: top;">
                    <p class="m-0">{!! nl2br(e($project_task->reason_for_changes)) !!}</p>
                </td>
            </tr>
        </table>

        <table cellpadding="0" cellspacing="0" border="0" width="100%">
            <tr>
                <td class="p-1" width="20%" style="border: 1px solid black; vertical-align: top;">
                    <p class="font-weight-bold" style="font-size: 9;">GOAL/IMPACT:</p>
                </td>
                <td width="3%" style="border: none;" >

                </td>
                <td class="p-1" style="border: 1px solid black; vertical-align: top;">
                    <p class="m-0">{!! nl2br(e($project_task->goal)) !!}</p>
                </td>
            </tr>
        </table>

        <table cellpadding="0" cellspacing="0" border="1" width="100%">
            <tr>
                <td class="p-1">
                    <p style="font-size: 9;">Prepared By:</p>
                    <p style="font-size: 9; border-bottom:1px solid black;" class="text-center mt-4">{{$project_task->user->name}}</p>
                    <p style="font-size: 9;" class="text-center font-weight-bold">Requestor</p>
                    <p style="font-size: 7;" class="text-center">(Signature over Printed Name/ Date)</p>
                </td>
                <td class="p-1">
                    <p style="font-size: 9;">Reviewed By:</p>
                    <p style="font-size: 9; border-bottom:1px solid black;" class="text-center mt-4">{{$project_task->user->name}}</p>
                    <p style="font-size: 9;" class="text-center font-weight-bold">Immediate Head of Requestor</p>
                    <p style="font-size: 7;" class="text-center">(Signature over Printed Name/ Date)</p>
                </td>
                <td class="p-1">
                    <p style="font-size: 9;">Noted By:</p>
                    <p style="font-size: 9; border-bottom:1px solid black;" class="text-center mt-4">{{$project_task->project->department->head->name}}</p>
                    <p style="font-size: 9;" class="text-center font-weight-bold">Business Process Manager</p>
                    <p style="font-size: 7;" class="text-center">(Signature over Printed Name/ Date)</p>
                </td>
                <td class="p-1">
                    <p style="font-size: 9;">Received By:</p>
                    <p style="font-size: 9; border-bottom:1px solid black;" class="text-center mt-4">{{$sys_admin->name}}</p>
                    <p style="font-size: 9;" class="text-center font-weight-bold">System Administrator</p>
                    <p style="font-size: 7;" class="text-center">(Signature over Printed Name/ Date)</p>
                </td>
            </tr>
        </table>

        <p class="font-weight-bold"><u>Part II. System Change Completion</u> <span style="font-size:7; font-weight:normal; font-style:italic;">(to be filled out once the system has been developed)</span></p>

        <table cellpadding="0" cellspacing="0" border="0" width="100%">
            <tr>
                <td class="p-1" width="20%" height="12%" style="border: 1px solid black; vertical-align: top;">
                    <p class="font-weight-bold" style="font-size: 9;">{{strtoupper('activity/task:')}}</p>
                </td>
                <td width="3%" style="border: none;" >

                </td>
                <td class="p-1" style="border: 1px solid black; vertical-align: top;">
                    <p class="m-0"></p>
                </td>
            </tr>
        </table>

        <table cellpadding="0" cellspacing="0" border="1" width="100%">
            <tr>
                <td class="p-1">
                    <p style="font-size: 9;">Prepared By:</p>
                    <p style="font-size: 9; border-bottom:1px solid black;" class="text-center mt-4">
                        @if($project_task->assignedTo)
                        {{$project_task->assignedTo->name}}
                        @else
                        &nbsp;
                        @endif
                    </p>
                    <p style="font-size: 9;" class="text-center font-weight-bold">Developer</p>
                    <p style="font-size: 7;" class="text-center">(Signature over Printed Name/ Date)</p>
                </td>
                <td class="p-1">
                    <p style="font-size: 9;">Reviewed By:</p>
                    <p style="font-size: 9; border-bottom:1px solid black;" class="text-center mt-4">{{$it_head->name}}</p>
                    <p style="font-size: 9;" class="text-center font-weight-bold">IT Department Head</p>
                    <p style="font-size: 7;" class="text-center">(Signature over Printed Name/ Date)</p>
                </td>
                <td class="p-1">
                    <p style="font-size: 9;">Noted By:</p>
                    <p style="font-size: 9; border-bottom:1px solid black;" class="text-center mt-4">&nbsp;</p>
                    <p style="font-size: 9;" class="text-center font-weight-bold">Requestor</p>
                    <p style="font-size: 7;" class="text-center">(Signature over Printed Name/ Date)</p>
                </td>
                <td class="p-1">
                    <p style="font-size: 9;">Received By:</p>
                    <p style="font-size: 9; border-bottom:1px solid black;" class="text-center mt-4">&nbsp;</p>
                    <p style="font-size: 9;" class="text-center font-weight-bold">Immediate Head Requestor</p>
                    <p style="font-size: 7;" class="text-center">(Signature over Printed Name/ Date)</p>
                </td>
            </tr>
        </table>

    </div>
</body>

</html>