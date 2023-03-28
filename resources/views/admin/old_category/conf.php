
    <!-- Alternative pagination table -->
    <div class="content-body">
        <section id="pagination">
            <div class="row">
                <div class="col-12">
                    <div class="card card-sm">
                        <div class="card-header pl-2">
                            <div class="form-group">
                                <a class="text-white" href="{{ route('product.category.create')}}">
                                    <button type="button" class="btn btn-sm btn-primary">
                                        <i class="ft-plus text-white"></i> Create Category
                                    </button>
                                </a>
                            </div>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                    <li><a data-action="close"><i class="ft-x"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body card-dashboard text-center">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered alt-pagination table-sm" id="indextable">
                                        <thead>
                                        <tr>
                                            <th>Sl.</th>
                                            <th class="text-left">SKU Prefix</th>
                                            <th class="text-left">Name</th>

                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($rows as $row)
                                            <tr>
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td class="text-left">{{ $row->CODE }}</td>
                                                <td class="text-left">{{ $row->NAME }}</td>
                                                <td>
                                                    <a href="{{ route('product.category.edit', [$row->PK_NO]) }}" title="EDIT" class="btn btn-xs btn-primary mr-1"><i class="la la-edit"></i></a>
                                                    <a href="{{ route('product.category.delete', [$row->PK_NO]) }}" onclick="return confirm('Are you sure you want to delete product category?')" title="DELETE" class="btn btn-xs btn-danger mr-1"><i class="la la-trash"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
