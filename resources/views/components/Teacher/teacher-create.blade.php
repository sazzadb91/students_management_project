<div class="modal animated zoomIn" id="create-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Teacher</h5>
                </div>
                <div class="modal-body">
                    <form id="save-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <label class="form-label">Teacher Name *</label>
                                <input type="text" class="form-control" id="StudentName">
                                <label class="form-label">Teacher Mobile *</label>
                                <input type="text" class="form-control" id="StudentMobile">
                                <label class="form-label">Teacher Address *</label>
                                <input type="text" class="form-control" id="StudentAddress">
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button id="modal-close" class="btn bg-gradient-primary" data-bs-dismiss="modal" aria-label="Close">Close</button>
                    <button onclick="Save()" id="save-btn" class="btn  bg-gradient-success" >Save</button>
                </div>
            </div>
    </div>
</div>

<script>
    async function Save(){
        var StudentName = document.getElementById("StudentName").value;
        var StudentMobile = document.getElementById("StudentMobile").value;
        var StudentAddress = document.getElementById("StudentAddress").value;
        if(StudentName.length ==0){
            errorToast("Please Enter Student Name");
        }
        else if(StudentMobile.length ==0){
            errorToast("Please Enter Student Mobile");
        }
        else if(StudentAddress.length ==0){
            errorToast("Please Enter Student Address");
        }else{
        document.getElementById('modal-close').click();
        var res = await axios.post('/teacher-create',{
            name:StudentName,
            phone:StudentMobile,
            address:StudentAddress});

            if(res.status===201){
                successToast(res.data['message']);
                document.getElementById("save-form").reset();
                await getList();
            }
            else{
                errorToast("Request fail !")
            }

        }
    }
    
</script>
