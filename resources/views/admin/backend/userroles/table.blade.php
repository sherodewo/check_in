<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
        <table class="table table-bordered" id="table-datatables" width="100%" cellspacing="0">
            <thead>
            <tr>
                <th>No</th>
                <th>User</th>
                <th>Role</th>
                <th>Action</th>
            </tr>
            </thead>
        </table>
    </div>
</div>
</div>
<script type="text/javascript">
    $(function() {
        $('#table-datatables').DataTable({
            processing: true,
            serverSide: true,
            scrollX: true,
            ajax: '{!! route("userrole.datatables") !!}',
            columns: [
                { data: 'DT_RowIndex',name:'DT_RowIndex', searchable: false, width: '5%', className: 'center'},
                { data: 'user_id' },
                { data: 'role_id' },
                { data: 'action', orderable: false, searchable: false, width: '15%', className: 'center action'},
            ]
        });
    });
</script>