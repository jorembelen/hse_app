@extends('layouts.master')

@section('title', 'Import Locations')
@section('content') 

<div class="container">

                    
                    <div class="row layout-top-spacing">
                    
                        <div id="basic" class="col-lg-12 layout-spacing">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-header">
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h4>Import Locations</h4>
                                        </div>                 
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area">

                                    <div class="row">
                                        <div class="col-lg-6 col-12 mx-auto">
                                        <form action="{{ route('import.locations') }}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                <input type="file" name="file" class="form-control" required>
                                                <br>
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </form>
                                        </div>                                        
                                    </div>

                                </div>
                            </div>
                        </div>


                        
                    </div>
                </div>

@endsection