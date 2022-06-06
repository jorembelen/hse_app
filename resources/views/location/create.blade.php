

                                                  <!-- sample modal content -->
                  <div id="create" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title" id="myModalLabel">Add Project Location</h3>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            </div>
                            <div class="modal-body">

                              <form class="mt-0 form-disabled-button" method="POST" action="{{ route('locations.store') }}" id="loc-create">
                                @csrf
                                        <div class="form-group row">
                                            <label for="create-name" class="col-md-4 ml-3 col-form-label">Division</label>
                                            <div class="col-md-11 ml-3">
                                              <input type="text" class="form-control mb-2" name="division"  placeholder="Division/Department">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="create-username" class="col-md-4 ml-3 col-form-label">Project Name</label>
                                            <div class="col-md-11 ml-3">
                                              <input type="text" class="form-control mb-2" name="name" placeholder="Project Name">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="create-email" class="col-md-4 ml-3 col-form-label">Location</label>
                                            <div class="col-md-11 ml-3">
                                              <input type="text" class="form-control mb-2" name="loc_name" placeholder="Location">
                                            </div>
                                        </div>

                            </div>
                            <div class="modal-footer">
                              <div class="progress-bar progress-bar-striped progress-bar-animated spinner-prevent" role="status" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">Submitting . . .</div>
                              <button type="submit" class="btn btn-dark waves-effect waves-light disabled-button-prevent">Submit</button>
                              <button type="button" class="btn btn-danger waves-effect disabled-button-prevent" data-dismiss="modal">Close</button>
                            </form>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->