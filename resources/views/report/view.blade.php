@extends('layouts.master')

@section('title', 'Investigation Details ')
@section('content') 

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <a href="{{ \URL::previous() }}" type="button"class="btn btn-dark mb-2 float-right">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-corner-up-left"><polyline points="9 14 4 9 9 4"></polyline><path d="M20 20v-7a4 4 0 0 0-4-4H4"></path></svg>
                    Back
                </a> 
            </div>
       <div class="card-body">
        <table class="table table-bordered mb-4">
            <thead>
               
            </thead>
            <tbody>
                <tr>
                    <td width="25%"><strong>Employees Name</strong></td>
                    <td>: {{ $reports->incident->involved }}</td>
                </tr>
                <tr>
                    <td width="25%"><strong>Line Manager Name</strong></td>
                    <td>: {{ $reports->manager->badge }} - {{ $reports->manager->name }} ({{ $reports->manager->designation }})</td>
                </tr>
                <tr>
                    <td width="25%"><strong>Supervisor Name</strong></td>
                    <td>: {{ $reports->supervisor->badge }} - {{ $reports->supervisor->name }} ({{ $reports->supervisor->designation }})</td>
                </tr>
                <tr>
                    <td width="25%"><strong>Project Devision/Department</strong></td>
                    <td>: {{ $reports->location->division }}</td>
                </tr>
                <tr>
                    <td width="25%"><strong>Project Name</strong></td>
                    <td>: {{ $reports->location->name }}</td>
                </tr>
                <tr>
                    <td width="25%"><strong>Project Location</strong></td>
                    <td>: {{ $reports->location->loc_name }}</td>
                </tr>
                <tr>
                    <td width="25%"><strong>Place of the Incident</strong></td>
                    <td>: {{ $reports->inc_loc }}</td>
                </tr>
                <tr>
                    <td width="25%"><strong>Date & Time of Incident</strong></td>
                    <td>: {{ date('M-d-Y h:i a', strtotime($reports->incident->date)) }}</td>
                </tr>
                <tr>
                    <td width="25%"><strong>Nature of Incident</strong></td>
                    <td>: {{ $reports->nature }}</td>
                </tr>
                <tr>
                    <td width="25%"><strong>Brief Description</strong></td>
                    <td>: {{ $reports->description }}</td>
                </tr>
                <tr>
                    <td width="25%"><strong>Details of the Injury</strong></td>
                    <td>: {{ $reports->details }}</td>
                </tr>
                <tr>
                    <td width="25%"><strong>First Aid Given?</strong></td>
                    <td>: {{ $reports->aid }}</td>
                </tr>
                @if($reports->aid == 'Yes')
                <tr>
                    <td width="25%"><strong>Name of First Aider</strong></td>
                    <td>: {{ $reports->nurse->badge }} - {{ $reports->nurse->name }} ({{ $reports->nurse->designation }})</td>
                </tr>
                @endif
                <tr>
                    <td width="25%"><strong>Hospitalized?</strong></td>
                    <td>: {{ $reports->hosp }}</td>
                </tr>
                @if($reports->hosp == 'Yes')
                <tr>
                    <td width="25%"><strong>Hospital Name</strong></td>
                    <td>: {{ $reports->hospital }}</td>
                </tr>
                <tr>
                    <td width="25%"><strong>Hospital Address</strong></td>
                    <td>: {{ $reports->hos_addr }}</td>
                </tr>
                <tr>
                    <td width="25%"><strong>Medical Leave Given?</strong></td>
                    <td>: {{ $reports->med_leave }}</td>
                </tr>
                <tr>
                    <td width="25%"><strong>Number of Days</strong></td>
                    <td>: {{ $reports->leave_days }}</td>
                </tr>
                @endif
                <tr>
                    <td width="25%"><strong>Property Damaged?</strong></td>
                    <td>: {{ $reports->prop_dam }}</td>
                </tr>
                @if($reports->aid == 'Yes')
                <tr>
                    <td width="25%"><strong>Estimated Damage Percentage</strong></td>
                    <td>: {{ $reports->est_dam }}</td>
                </tr>
                <tr>
                    <td width="25%"><strong>Estimated Cost of Damage (SAR)</strong></td>
                    <td>: {{ $reports->est_amt }}</td>
                </tr>
                <tr>
                    <td width="25%"><strong>Type/Function of Property</strong></td>
                    <td>: {{ $reports->property }}</td>
                </tr>
                <tr>
                    <td width="25%"><strong>Location of Property</strong></td>
                    <td>: {{ $reports->prop_loc }}</td>
                </tr>
                <tr>
                    <td width="25%"><strong>Manufacturer's Name</strong></td>
                    <td>: {{ $reports->prop_manuf }}</td>
                </tr>
                <tr>
                    <td width="25%"><strong>Property Model</strong></td>
                    <td>: {{ $reports->prop_model }}</td>
                </tr>
                <tr>
                    <td width="25%"><strong>Plate No.</strong></td>
                    <td>: {{ $reports->prop_plate }}</td>
                </tr>
                <tr>
                    <td width="25%"><strong>Vehicle Registration No.</strong></td>
                    <td>: {{ $reports->prop_reg }}</td>
                </tr>
                <tr>
                    <td width="25%"><strong>Company Fleet No.</strong></td>
                    <td>: {{ $reports->prop_rte }}</td>
                </tr>
                @endif
                <tr>
                    <td width="25%"><strong>Was Pre-Task/Toolbox Meeting Conducted?</strong></td>
                    <td>: {{ $reports->toolbox }}</td>
                </tr>
                <tr>
                    <td width="25%"><strong>Was the Person Using Required PPE?</strong></td>
                    <td>: {{ $reports->ppe }}</td>
                </tr>
                @if($reports->ppe == 'Yes')
                <tr>
                    <td width="25%"><strong>Specify Personal Protective Equipment (PPE)</strong></td>
                    <td>: {{ $reports->ppe_equip }}</td>
                </tr>
                @endif
                <tr>
                    <td width="25%"><strong>What was the injured person/employee doing at the time of the incident?</strong></td>
                    <td>: {{ $reports->emp_doing }}</td>
                </tr>
                <tr>
                    <td width="25%"><strong>What was the machine/equipment doing at the time of the incident?</strong></td>
                    <td>: {{ $reports->emp_machine }}</td>
                </tr>
                <tr>
                    <td width="25%"><strong>What was the machine/equipment doing at the time of the incident?</strong></td>
                    <td>: {{ $reports->emp_material }}</td>
                </tr>
                <tr>
                    <td width="25%"><strong>Immediate Cause(s) of the Incident/injury</strong></td>
                    <td>: {{ $reports->imm_cause }}</td>
                </tr>
                <tr>
                    <td width="25%"><strong>
                    <a class="bs-tooltip" title="Click to view details!" href="{{ route('recommendations.show', $reports->id) }}">Root Cause(s) of the Incident/injury</a>
                    </strong></td>
                    <td> 
                        @foreach($output as  $item)
                        <li>{{ $loop->iteration }}. {!! $item->type !!} - {!! $item->root_name !!}</li>
                        @endforeach
                    </td>
                </tr>
                <tr>
                    <td width="25%"><strong>
                    <a class="bs-tooltip" title="Click to view details!" href="{{ route('recommendations.show', $reports->id) }}">Corrective Action(s) to prevent reoccurence</a>
                    </strong></td>
                    <td> 
                        @foreach($output as  $item)
                        <li> {{ $loop->iteration }}. {!! $item->rec_type !!} - {!! $item->rec_name !!} (
                        @if($item->status == 0)
                        On Going 
                        @else
                        Done
                        @endif )</li>
                        @endforeach
                    </td>
                </tr>
                <tr>
                    <td width="25%"><strong>Were there any witnesses?</strong></td>
                    <td>: {{ $reports->witness }}</td>
                </tr>
                @if($reports->witness == 'Yes')
                <tr>
                    <td width="25%"><strong>Type of witness(es)</strong></td>
                    <td>: {{ $reports->wit_type }}</td>
                </tr>
                <tr>
                    <td width="25%"><strong>Witness Details</strong></td>
                    <td>: {{ $reports->wit_details }}</td>
                </tr>
                <tr>
                    <td width="25%"><strong>Witness Statement</strong></td>
                    <td>: {{ $reports->wit_statement }}</td>
                </tr>
                @endif
                <tr>
                    <td width="25%"><strong>Safety Awareness Training Date</strong></td>
                    <td>: {{ date('M-d-Y', strtotime($reports->safety)) }}</td>
                </tr>
                <tr>
                    <td width="25%"><strong>Proof of Training</strong></td>
                    <td>: {{ $reports->proof_training }}</td>
                </tr>
                <tr>
                    <!-- <td width="25%"><strong>Attachment Document</strong></td> -->
                   <td>
                            @if(!empty($reports->docs))
                   <a class="bs-tooltip" title="Click to download this attachment!" href="{{ asset('files/documents/'.$reports->docs) }}" target="_blank" rel="noopener noreferrer">
                    <button class="btn btn-danger mb-2 mr-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                    Attachment</button>
                    </a>
                            @endif
                   </td>
                   </tr>

            </tbody>
        </table>
        <div class="widget-content widget-content-area">
            <h5>Proof of Training Image(s)</h5>
                    <div id="demo-test-gallery" class="demo-gallery" data-pswp-uid="1">
                    @if(!empty($reports->proof))
                        @foreach ($photos as $image)
                        <a class="img-1" href="{{ asset('files/image/'.$image ) }}" data-size="1600x1068" data-med="{{url('../')}}/files/thumbnail/{{ $image ? $image : 'no_image.jpg' }}" data-med-size="1024x683" data-author="Samuel Rohl">
                            <img src="{{ asset('files/thumbnail/'.$image) }}" alt="image-gallery">
                           
                        </a>
                        @endforeach
                    @endif    
                    </div>
                            <!-- Root element of PhotoSwipe. Must have class pswp. -->
                            <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">

                                <!-- Background of PhotoSwipe. It's a separate element, as animating opacity is faster than rgba(). -->
                                <div class="pswp__bg"></div>

                                <!-- Slides wrapper with overflow:hidden. -->
                                <div class="pswp__scroll-wrap">
                                    <!-- Container that holds slides. PhotoSwipe keeps only 3 slides in DOM to save memory. -->
                                    <!-- don't modify these 3 pswp__item elements, data is added later on. -->
                                    <div class="pswp__container">
                                        <div class="pswp__item"></div>
                                        <div class="pswp__item"></div>
                                        <div class="pswp__item"></div>
                                    </div>

                                    <!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
                                    <div class="pswp__ui pswp__ui--hidden">

                                        <div class="pswp__top-bar">

                                            <!--  Controls are self-explanatory. Order can be changed. -->
                                            <div class="pswp__counter"></div>
                                            <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
                                            <button class="pswp__button pswp__button--share" title="Share"></button>
                                            <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
                                            <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>

                                            <!-- element will get class pswp__preloader--active when preloader is running -->
                                            <div class="pswp__preloader">
                                                <div class="pswp__preloader__icn">
                                                <div class="pswp__preloader__cut">
                                                    <div class="pswp__preloader__donut"></div>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                                            <div class="pswp__share-tooltip"></div> 
                                        </div>
                                        <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
                                        </button>
                                        <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
                                        </button>
                                        <div class="pswp__caption">
                                            <div class="pswp__caption__center"></div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
        <div class="widget-content widget-content-area">
                <h5>Incident Image(s)</h5>
                    <div id="demo-test-gallery" class="demo-gallery" data-pswp-uid="1">
                    @if(!empty($reports->inc_img))
                        @foreach ($images as $img)
                        <a class="img-1" href="{{ asset('files/image/'.$img) }}" data-size="1600x1068" data-med="{{url('../')}}/files/thumbnail/{{ $img ? $img : 'no_image.jpg' }}" data-med-size="1024x683" data-author="Samuel Rohl">
                            <img src="{{ asset('files/thumbnail/'.$img) }}" alt="image-gallery">
                           
                        </a>
                        @endforeach
                    @endif
                        
                    </div>
                            <!-- Root element of PhotoSwipe. Must have class pswp. -->
                            <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">

                                <!-- Background of PhotoSwipe. It's a separate element, as animating opacity is faster than rgba(). -->
                                <div class="pswp__bg"></div>

                                <!-- Slides wrapper with overflow:hidden. -->
                                <div class="pswp__scroll-wrap">
                                    <!-- Container that holds slides. PhotoSwipe keeps only 3 slides in DOM to save memory. -->
                                    <!-- don't modify these 3 pswp__item elements, data is added later on. -->
                                    <div class="pswp__container">
                                        <div class="pswp__item"></div>
                                        <div class="pswp__item"></div>
                                        <div class="pswp__item"></div>
                                    </div>

                                    <!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
                                    <div class="pswp__ui pswp__ui--hidden">

                                        <div class="pswp__top-bar">

                                            <!--  Controls are self-explanatory. Order can be changed. -->
                                            <div class="pswp__counter"></div>
                                            <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
                                            <button class="pswp__button pswp__button--share" title="Share"></button>
                                            <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
                                            <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>

                                            <!-- element will get class pswp__preloader--active when preloader is running -->
                                            <div class="pswp__preloader">
                                                <div class="pswp__preloader__icn">
                                                <div class="pswp__preloader__cut">
                                                    <div class="pswp__preloader__donut"></div>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                                            <div class="pswp__share-tooltip"></div> 
                                        </div>
                                        <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
                                        </button>
                                        <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
                                        </button>
                                        <div class="pswp__caption">
                                            <div class="pswp__caption__center"></div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            
        </div>
        <h8 >Submitted by: <strong>{{ $reports->user->name }} - ({{ date('M-d-Y h:i a', strtotime($reports->created_at)) }})</strong></h8>
        @if(auth()->user()->role == 'user' || auth()->user()->role == 'super_admin' || auth()->user()->role == 'admin')
                <a href="{{ route('reports.edit', $reports->id) }}" type="button"class="btn btn-dark mb-2 float-right">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                    Update
                </a> 
            @endif
        @if(auth()->user()->role == 'gm' || auth()->user()->role == 'hsem')
            <a data-toggle="modal" data-target="#remarks{{$reports->id}}" type="button"class="btn btn-dark mb-2 float-right">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                Comment
            </a> 
        @endif
       </div>
    </div>
</div>



@foreach ($reports as $report)
    @include('manager.remarks')
@endforeach
@endsection