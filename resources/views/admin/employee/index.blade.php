<x-admin>
    @section('title')
        {{ 'Employee' }}
    @endsection
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Employee Table</h3>
            <div class="card-tools">
                <a href="{{ route('admin.employee.create') }}" class="btn btn-sm btn-info">New</a>
            </div>
        </div>
        <div class="card-body p-3 m-3">
            
        <table class="table table-bordered data-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>email</th> 
                        <th>Company</th>
                        <th>Phone</th>  
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>

        </div>
     
    </div>

    @section('css')
        <style>
            img.img-th {
                height: 25px;
                width: auto;
            }
            .dataTables_filter{
                display:none;
            float:right!important;
                }
            .dataTables_paginate.paging_simple_numbers{
            float:right!important;

            }
        </style>
    @endsection

</x-admin>

<script >
 
 $(document).ready(function () {
     var table = $('.data-table').DataTable({
         processing: true,
         serverSide: true,
         ajax: "{{ route('admin.employee.getEmployeeData') }}",
         columns: [ 
             {data: 'id', name: 'id', sortable: false},
             {data: 'employee_name', name: 'employee_name', sortable: false},
             {data: 'email', name: 'email', sortable: false},
             {data: 'company', name: 'company', sortable: false},
             {data: 'phone', name: 'phone', sortable: false}, 
             {data: 'action', name: 'action', sortable: false},
         ]
     });
  
 
 
 });
  
 function deleteForm($element=null)
     {
        
         Swal.fire({
             title: 'Are you sure?',
             text: "You won't be able to revert this!",
             type: 'warning',
             showCancelButton: true,
             confirmButtonColor: '#3085d6',
             cancelButtonColor: '#d33',
             confirmButtonText: 'Yes, delete it!'
         }).then((result) => {
             if (result.value) {
                 $('#'+$element).submit();
             }
         })
     }
 </script>
 
 

 