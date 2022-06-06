@extends('layouts.app')

@section('title', 'Print Report')

<style>
.inv {
height:60px;    
}

.ref { 
    font-size: 10px;
    text-align: left;
    }

.channels {
    float: left;
    margin-left: 5em;
}
.revised {
    font-weight: bold; 
}

.logo-align {
    float: left;
    margin-right: 5em;
}


</style>

@section('content') 

        <div class="row text-center">
            <div class="col-md-12">
                <div class="card-box">
                        {{-- <div class="channels">
                            <img src="/admin/assets/img/rcl_logo.png" height="65">  
                        </div>  --}}
                        <div class="logo-align">
                            <img src="/admin/assets/img/logo.png" height="80">
                        </div>  
                            <h3>
                                <strong>REZAYAT GROUP Health and Safety</strong>
                            </h3>
                            <h4>Initial Incident/Accident Report</h4>
                </div>
            <div>
        <div>
<br><br>
<div class="container">
<h6 class="ref">RCL-HSE-FM-01.2 - Version 1.0 Rev. Nov 2020</h6> <br>
                                        <table class="table table-lg table-bordered">
                                            <tbody>
                                                <tr>
                                                    <td class="align-middle revised" width="12%">Company: </td>
                                                    <td class="align-middle" width="60%">Rezayat Company Limited</td>
                                                    <td class="align-middle revised" width="8%">Date: </td>
                                                    <td class="align-middle">{{ date('M-d-Y', strtotime($incidents->date)) }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="align-middle revised" width="8%">Location: </td>
                                                    <td class="align-middle">{{ $incidents->locations->loc_name }}</td>
                                                    <td class="align-middle revised" width="8%">Time: </td>
                                                    <td class="align-middle">{{ date('h:i a', strtotime($incidents->date)) }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table class="table table-lg table-bordered">
                                            <tbody>
                                                    <td class="align-middle revised" width="18%">Project/Site Name: </td>
                                                    <td class="align-middle" width="40%">{{ $incidents->locations->name }}</td>
                                                    <td class="align-middle revised" width="15%">Actual Severity: </td>
                                                    <td class="align-middle">{{ $incidents->severity }}</td>
                                                    <td class="align-middle revised" width="23%">Worst Potential Severity: </td>
                                                    <td class="align-middle">{{ $incidents->wps }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table class="table table-lg table-bordered">
                                            <tbody>
                                                    <td class="align-middle revised" width="15%">Persons Involved: </td>
                                                    <td class="align-middle">{{ $incidents->involved }}</td>
                                                </tr>
                                                    <td class="align-middle revised" width="25%">Injury Location by Body Parts: </td>
                                                    <td class="align-middle">{{ $incidents->injury_location }}</td>
                                                </tr>
                                                    <td class="align-middle revised" width="25%">Type of Injury Sustained: </td>
                                                    <td class="align-middle">{{ $incidents->injury_sustain }}</td>
                                                </tr>
                                                    <td class="align-middle revised" width="25%">Immediate Cause(s): </td>
                                                    <td class="align-middle">{{ $incidents->cause }}</td>
                                                </tr>
                                                </tr>
                                                    <td class="align-middle revised" width="25%">Equipment(s) Involved: </td>
                                                    <td class="align-middle">{{ $incidents->equipment }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table class="table table-lg table-bordered">
                                            <tbody>
                                                <tr>
                                                    <td class="align-middle revised" width="25%">Description of the Event: </td>
                                                    <td class="align-middle text-justify">{{ $incidents->description }}</td>
                                                </tr>
                                                <tr>
                                                <td class="align-middle revised" width="25%">Immediate Action(s) Taken to Prevent Reoccurance: </td>
                                                    <td class="align-middle text-justify">{{ $incidents->action }}</td>
                                                </tr>
                                                <tr>
                                                <td class="align-middle revised" width="25%">Person Created the Report:: </td>
                                                    <td class="align-middle text-justify">{{ $incidents->officer->badge }} - {{ $incidents->officer->name }} ({{ $incidents->officer->designation }})</strong></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        
                                        </div>

                                        <div class="text-center d-print-none">
                                            <a href="javascript:window.print()">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-printer action-print" data-toggle="tooltip" data-placement="top" data-original-title="Reply"><polyline points="6 9 6 2 18 2 18 9"></polyline><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path><rect x="6" y="14" width="12" height="8"></rect></svg>
                                            Print</a>
                                        </div>
</div>

<script>
    function myFunction() {
        window.print();
        console.log();
    }
</script>


@endsection