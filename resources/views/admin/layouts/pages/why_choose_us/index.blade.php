@extends('admin.layouts.app')
@section('title', 'Why choose us')
@push('styles')
    <link rel="stylesheet" href="{{ asset('backend') }}/assets/plugins/bootstrap-select/css/bootstrap-select.css" />
@endpush
@section('admin_content')

    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="header">
                    <h2> TABS WITH ICON TITLE </h2>
                </div>
                <div class="body">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item"><a class="nav-link active text-uppercase text-dark" data-toggle="tab"
                                href="#home_with_icon_title"> <i class="material-icons">menu</i> Why to chose link publisher
                            </a></li>
                        <li class="nav-item"><a class="nav-link text-uppercase text-dark" data-toggle="tab"
                                href="#profile_with_icon_title"><i class="material-icons">menu</i> Why to chose link
                                publisher two </a></li>
                        <li class="nav-item"><a class="nav-link text-uppercase text-dark" data-toggle="tab"
                                href="#messages_with_icon_title"><i class="material-icons">menu</i> Why to chose link
                                publisher three </a></li>
                        <li class="nav-item"><a class="nav-link text-uppercase text-dark" data-toggle="tab"
                                href="#settings_with_icon_title"><i class="material-icons">menu</i> Why to chose link
                                publisher four </a></li>
                        <li class="nav-item"><a class="nav-link text-uppercase text-dark" data-toggle="tab"
                                href="#settings_with_icon_title_five"><i class="material-icons">menu</i> Why to chose link
                                publisher five </a></li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane in active" id="home_with_icon_title">
                            <form id="whychoseUsForm" class="form-horizontal" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="col-lg-12 col-md-12 col-sm-8 col-xs-7 mb-3">
                                    <label for="title_one"><b>Title*</b></label>
                                    <div class="form-group">
                                        <div class="" style="border: 1px solid #ccc">
                                            <input type="text" id="title_one" name="title_one"
                                                class="form-control @error('title_one')invalid @enderror"
                                                placeholder="Enter title ">
                                        </div>
                                        @error('title_one')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-8 col-xs-7 mb-3">
                                    <label for="description_one"><b>Short Description</b></label>
                                    <div class="form-group">
                                        <div class="" style="border: 1px solid #ccc">
                                            <textarea type="text" rows="5" name="description_one" id="description_one" class="form-control"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-8 col-xs-7 mb-3">
                                    <label for="customFile"><b>Icon Image* (Image Size: 64 by 64 - Max size : 20kb
                                            )</b></label>
                                    <div class="form-group">
                                        <div class="" style="border: 1px solid #ccc">
                                            <input type="file" class="form-control @error('image')invalid @enderror"
                                                id="customFile" / name="image_one">
                                        </div>
                                        @error('image_one')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>


                                <div class="col-lg-12 col-md-12 col-sm-8 col-xs-7">
                                    <button type="submit"
                                        class="btn btn-raised btn-primary m-t-15 waves-effect">UPDATE</button>
                                </div>

                            </form>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="profile_with_icon_title">
                            <form class="form-horizontal" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="col-lg-12 col-md-12 col-sm-8 col-xs-7 mb-3">
                                    <label for="title_two"><b>Title*</b></label>
                                    <div class="form-group">
                                        <div class="" style="border: 1px solid #ccc">
                                            <input type="text" id="title_two" name="title_two"
                                                class="form-control @error('title_two')invalid @enderror"
                                                placeholder="Enter title ">
                                        </div>
                                        @error('title_two')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-8 col-xs-7 mb-3">
                                    <label for="description_two"><b>Short Description</b></label>
                                    <div class="form-group">
                                        <div class="" style="border: 1px solid #ccc">
                                            <textarea type="text" rows="5" name="description_two" id="description_two" class="form-control"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-8 col-xs-7 mb-3">
                                    <label for="customFile"><b>Icon Image* (Image Size: 64 by 64 - Max size : 20kb
                                            )</b></label>
                                    <div class="form-group">
                                        <div class="" style="border: 1px solid #ccc">
                                            <input type="file" class="form-control @error('image')invalid @enderror"
                                                id="customFile" / name="image_two">
                                        </div>
                                        @error('image_two')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>


                                <div class="col-lg-12 col-md-12 col-sm-8 col-xs-7">
                                    <button type="submit"
                                        class="btn btn-raised btn-primary m-t-15 waves-effect">UPDATE</button>
                                </div>

                            </form>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="messages_with_icon_title">
                            <form class="form-horizontal" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="col-lg-12 col-md-12 col-sm-8 col-xs-7 mb-3">
                                    <label for="title_three"><b>Title*</b></label>
                                    <div class="form-group">
                                        <div class="" style="border: 1px solid #ccc">
                                            <input type="text" id="title_three" name="title_two"
                                                class="form-control @error('title_three')invalid @enderror"
                                                placeholder="Enter title ">
                                        </div>
                                        @error('title_three')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-8 col-xs-7 mb-3">
                                    <label for="description_three"><b>Short Description</b></label>
                                    <div class="form-group">
                                        <div class="" style="border: 1px solid #ccc">
                                            <textarea type="text" rows="5" name="description_three" id="description_three" class="form-control"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-8 col-xs-7 mb-3">
                                    <label for="customFile"><b>Icon Image* (Image Size: 64 by 64 - Max size : 20kb
                                            )</b></label>
                                    <div class="form-group">
                                        <div class="" style="border: 1px solid #ccc">
                                            <input type="file" class="form-control @error('image')invalid @enderror"
                                                id="customFile" / name="image_three">
                                        </div>
                                        @error('image_three')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>


                                <div class="col-lg-12 col-md-12 col-sm-8 col-xs-7">
                                    <button type="submit"
                                        class="btn btn-raised btn-primary m-t-15 waves-effect">UPDATE</button>
                                </div>

                            </form>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="settings_with_icon_title">
                            <form class="form-horizontal" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="col-lg-12 col-md-12 col-sm-8 col-xs-7 mb-3">
                                    <label for="title_four"><b>Title*</b></label>
                                    <div class="form-group">
                                        <div class="" style="border: 1px solid #ccc">
                                            <input type="text" id="title_four" name="title_two"
                                                class="form-control @error('title_four')invalid @enderror"
                                                placeholder="Enter four ">
                                        </div>
                                        @error('title_four')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-8 col-xs-7 mb-3">
                                    <label for="description_four"><b>Short Description</b></label>
                                    <div class="form-group">
                                        <div class="" style="border: 1px solid #ccc">
                                            <textarea type="text" rows="5" name="description_four" id="description_four" class="form-control"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-8 col-xs-7 mb-3">
                                    <label for="customFile"><b>Icon Image* (Image Size: 64 by 64 - Max size : 20kb
                                            )</b></label>
                                    <div class="form-group">
                                        <div class="" style="border: 1px solid #ccc">
                                            <input type="file" class="form-control @error('image')invalid @enderror"
                                                id="customFile" / name="image_four">
                                        </div>
                                        @error('image_four')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>


                                <div class="col-lg-12 col-md-12 col-sm-8 col-xs-7">
                                    <button type="submit"
                                        class="btn btn-raised btn-primary m-t-15 waves-effect">UPDATE</button>
                                </div>

                            </form>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="settings_with_icon_title_five">
                            <form class="form-horizontal" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="col-lg-12 col-md-12 col-sm-8 col-xs-7 mb-3">
                                    <label for="title_five"><b>Title*</b></label>
                                    <div class="form-group">
                                        <div class="" style="border: 1px solid #ccc">
                                            <input type="text" id="title_five" name="title_two"
                                                class="form-control @error('title_tfive')invalid @enderror"
                                                placeholder="Enter four ">
                                        </div>
                                        @error('title_five')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-8 col-xs-7 mb-3">
                                    <label for="description_five"><b>Short Description</b></label>
                                    <div class="form-group">
                                        <div class="" style="border: 1px solid #ccc">
                                            <textarea type="text" rows="5" name="description_five" id="description_five" class="form-control"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-8 col-xs-7 mb-3">
                                    <label for="customFile"><b>Icon Image* (Image Size: 64 by 64 - Max size : 20kb
                                            )</b></label>
                                    <div class="form-group">
                                        <div class="" style="border: 1px solid #ccc">
                                            <input type="file" class="form-control @error('image')invalid @enderror"
                                                id="customFile" / name="image_five">
                                        </div>
                                        @error('image_five')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>


                                <div class="col-lg-12 col-md-12 col-sm-8 col-xs-7">
                                    <button type="submit"
                                        class="btn btn-raised btn-primary m-t-15 waves-effect">UPDATE</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $("#whychoseUsForm").submit(function(e) {
                e.preventDefault();

                let formData = new FormData(this);

                $.ajax({
                    url: "{{ route('whychoseus.update', $whyChoseUs->id ?? '') }}",
                    type: 'POST', // Always POST
                    data: formData,
                    processData: false,
                    contentType: false,
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'X-HTTP-Method-Override': 'PUT' // Override to PUT
                    },
                    success: function(response) {
                        toastr.success(response.message);
                    },
                    error: function(xhr) {
                        toastr.error('Something went wrong!');
                    }
                });
            });
        });
    </script>
@endpush
