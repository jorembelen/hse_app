<script>

    $(function() {
        
        // run on change for the selectbox
        
        $( "#frm_hosp" ).change(function() {  
            updateHospDivs();
        });
        
        // handle the updating of the duration divs
        function updateHospDivs() {
            // hide all form-duration-divs
            $('.frm-hosp-div').hide();
              
              // for Hospitalization
            var aiderKey = $( "#frm_hosp option:selected" ).val();                
            $('#hosp'+aiderKey).show();
            var aiderKey = $( "#frm_hosp option:selected" ).val();                
            $('#hosp1'+aiderKey).show();
    
        }        
    
        // run at load, for the currently selected div to show up
        updateHospDivs();
    
    });
    
    </script>

<script>

    $(function() {
        
        // run on change for the selectbox
        
        $( "#frm_hosp" ).change(function() {  
            updateHospDivs();
        });
        
        // handle the updating of the duration divs
        function updateHospDivs() {
            // hide all form-duration-divs
            $('.frm-hosp-div').hide();
              
              // for Hospitalization
            var aiderKey = $( "#frm_hosp option:selected" ).val();                
            $('#hosp'+aiderKey).show();
            var aiderKey = $( "#frm_hosp option:selected" ).val();                
            $('#hosp1'+aiderKey).show();
    
        }        
    
        // run at load, for the currently selected div to show up
        updateHospDivs();
    
    });
    
    </script>
    
    <script>
        $(function() {
            
            // run on change for the selectbox
            $( "#frm_duration" ).change(function() {  
                updateDurationDivs();
            });
            
            // handle the updating of the duration divs
            function updateDurationDivs() {
                // hide all form-duration-divs
                $('.form-duration-div').hide();
                  
                // For property
                var divKey = $( "#frm_duration option:selected" ).val();                
                $('#divFrm'+divKey).show();
                var divKey = $( "#frm_duration option:selected" ).val();                
                $('#divFrm1'+divKey).show();
                var divKey = $( "#frm_duration option:selected" ).val();                
                $('#divFrm2'+divKey).show();
                var divKey = $( "#frm_duration option:selected" ).val();                
                $('#divFrm3'+divKey).show();
                var divKey = $( "#frm_duration option:selected" ).val();                
                $('#divFrm4'+divKey).show();
                var divKey = $( "#frm_duration option:selected" ).val();                
                $('#divFrm5'+divKey).show();
                var divKey = $( "#frm_duration option:selected" ).val();                
                $('#divFrm6'+divKey).show();
                var divKey = $( "#frm_duration option:selected" ).val();                
                $('#divFrm7'+divKey).show();
                var divKey = $( "#frm_duration option:selected" ).val();                
                $('#divFrm8'+divKey).show();
            }        
        
            // run at load, for the currently selected div to show up
            updateDurationDivs();
        
        });
        
        </script>

<script>

    $(function() {
        
        // run on change for the selectbox
        
        $( "#med_leave" ).change(function() {  
            updateLeaveDivs();
        });
        
        // handle the updating of the duration divs
        function updateLeaveDivs() {
            // hide all form-duration-divs
            $('.frm-leave-div').hide();
              
              // for Leave
            var divLKey = $( "#med_leave option:selected" ).val();                
            $('#div'+divLKey).show();
    
        }        
    
        // run at load, for the currently selected div to show up
        updateLeaveDivs();
    
    });
    
    </script>

<script>

    $(function() {
        
        // run on change for the selectbox
        
        $( "#frm_hosp" ).change(function() {  
            updateHospDivs();
        });
        
        // handle the updating of the duration divs
        function updateHospDivs() {
            // hide all form-duration-divs
            $('.frm-hosp-div').hide();
              
              // for Hospitalization
            var aiderKey = $( "#frm_hosp option:selected" ).val();                
            $('#hosp'+aiderKey).show();
            var aiderKey = $( "#frm_hosp option:selected" ).val();                
            $('#hosp1'+aiderKey).show();
    
        }        
    
        // run at load, for the currently selected div to show up
        updateHospDivs();
    
    });
    
    </script>

<script>

    $(function() {
        
        // run on change for the selectbox
        
        $( "#witness_frm" ).change(function() {  
            witnessDivs();
        });
        
        // handle the updating of the duration divs
        function witnessDivs() {
            // hide all form-duration-divs
            $('.frm-div').hide();
              
              // for Leave
            var witKey = $( "#witness_frm option:selected" ).val();                
            $('#select'+witKey).show();
            var witKey = $( "#witness_frm option:selected" ).val(); 
            $('#select1'+witKey).show();
            var witKey = $( "#witness_frm option:selected" ).val(); 
            $('#select2'+witKey).show();
    
        }        
    
        // run at load, for the currently selected div to show up
        witnessDivs();
    
    });
    
    </script>

<script>

    $(function() {
        
        // run on change for the selectbox
        
        $( "#frm_ppe" ).change(function() {  
            ppeDivs();
        });
        
        // handle the updating of the duration divs
        function ppeDivs() {
            // hide all form-duration-divs
            $('.frm-ppe-div').hide();
              
              // for Leave
            var ppeKey = $( "#frm_ppe option:selected" ).val();                
            $('#divPpe'+ppeKey).show();
    
        }        
    
        // run at load, for the currently selected div to show up
        ppeDivs();
    
    });
    </script>



<script src="/admin/plugins/file-upload/file-upload-with-preview.min.js"></script>
<script src="/admin/plugins/flatpickr/flatpickr.js"></script>
<script>
    var f2 = flatpickr(document.getElementById('dateTimeFlatpickr2'), {
        enableTime: false,
        dateFormat: "Y-m-d",
    });
</script>
<script>
    var secondUpload = new FileUploadWithPreview('myFirstImage')
</script>
<script>
    var secondUpload = new FileUploadWithPreview('mySecondImage')
</script>