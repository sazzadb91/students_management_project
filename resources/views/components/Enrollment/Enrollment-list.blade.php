<div class=" container-fluid " >
    <div class="row">
    <div class="col-md-12 col-sm-12 col-lg-12">
        <div class="card px-5 py-5">
            <div class="row justify-content-between ">
                <div class="align-items-center col">
                    <h4>Enrollment Students </h4>
                </div>
                <div class="align-items-center col">
                    <button data-bs-toggle="modal" data-bs-target="#create-modal" class="float-end btn  m-0 bg-gradient-primary">Create Enrollment Students</button>
                </div>
            </div>
            <hr class="bg-dark "/>
            <table class="table" id="tableData">
                <thead>
                <tr class="bg-light">
                    <th>No</th>
                    <th>Student Name</th>
                    <th>Enroll Number</th>
                    <th>Enroll Start Date </th>
                    <th>Enrollment Fee </th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody id="tableList">

                </tbody>
            </table>
        </div>
    </div>
</div>
</div>

<script>

    getList();
    
    
    async function getList() {

        let res=await axios.get("/enrollment-list");
        let tableList=$("#tableList");
        let tableData=$("#tableData");
    
        tableData.DataTable().destroy();
        tableList.empty();
    
        res.data.forEach(function (item,index) {
            let row=`<tr>  
                        <td>${index+1}</td>
                        <td>${item.student['name']}</td>
                        
                        <td>${item['enroll_no']}</td>
                        <td>${item['enroll_date']}</td>
                        <td>${item['fee']}</td>
                        <td>
                            <button  data-id="${item['id']}" class="btn editBtn btn-sm btn-success">Edit</button>
                            <button  data-id="${item['id']}" class="btn deleteBtn btn-sm btn-danger">Delete</button>
                        </td>
                     </tr>`
            tableList.append(row)
        })
    
        $('.editBtn').on('click', async function () {
               let id = $(this).data('id');
               await FillUpUpdateForm(id);              
               $("#update-modal").modal('show');
        })
    
        $('.deleteBtn').on('click',function(){
            let id = $(this).data('id');
            $("#delete-modal").modal('show');
            $("#deleteID").val(id);
        })
    
        new DataTable('#tableData',{
            order:[[0,'desc']],
            lengthMenu:[5,10,15,20,30]
        });
    
    }
    
    
    </script>
    
    
