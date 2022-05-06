@extends('layouts.base')
@section('body')

<body>
    <!-- Navbar -->
    @include('layouts.admin.navbar')

    <div class="wrapper">
        <div class="main">
            <div class="section">
                <div class="container">
                    <h3>Edit Event: {{ $event->name }} </h3>
                    @if ($errors->any())
                    <div class="alert alert-danger alert-with-icon" data-notify="container">
                        <div class="container">
                            <div class="alert-wrapper">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <i class="nc-icon nc-simple-remove"></i>
                                </button>
                                <div class="message">
                                    <h6 style="margin-top: unset;"><i class="nc-icon nc-bell-55"></i> {{
                                        $errors->first() }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    <form method="post" action="{{ route('admin.events.edit.process', $event->id) }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-5 col-sm-5">
                                <h6>
                                    Event Image
                                    <span class="icon-danger">*</span>
                                </h6>
                                <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail img-no-padding" style="
                                            max-width: 370px;
                                            max-height: 250px;
                                        ">
                                        <img src="{{ $event->image }}" alt="Event Image" />
                                    </div>
                                    <div class="fileinput-preview fileinput-exists thumbnail img-no-padding" style="
                                            max-width: 370px;
                                            max-height: 250px;
                                        "></div>
                                    <div>
                                        <span class="btn btn-outline-default btn-round btn-file">
                                            <span class="fileinput-new">Select image</span>
                                            <span class="fileinput-exists">Change</span>
                                            <input type="file" name="image" accept="image/*" /></span>
                                        <a href="#paper-kit" class="btn btn-link btn-danger fileinput-exists"
                                            data-dismiss="fileinput"><i class="fa fa-times"></i>
                                            Remove</a>
                                    </div>
                                </div>

                                <h6>Famous Person</h6>
                                <input type="text" name="famous_person"
                                    value="{{ old('famous_person') != null ? old('famous_person') : $event->famous_person }}"
                                    data-role="tagsinput" placeholder="Idol Name" />
                                <h6>Free Food</h6>
                                <input type="text" name="free_food"
                                    value="{{ old('free_food') != null ? old('free_food') : $event->free_food }}"
                                    data-role="tagsinput" placeholder="Food Name" />
                                <h6>
                                    Status <span class="icon-danger">*</span>
                                </h6>
                                <div class="form-check-radio">
                                    <label class="form-check-label">
                                        @if (old('status') != null)
                                        <input class="form-check-input" type="radio" name="status" value="1" {{
                                            old('status')==1 ? 'checked' : '' }} />
                                        Active
                                        <span class="form-check-sign"></span>
                                        @else
                                        <input class="form-check-input" type="radio" name="status" value="1" {{
                                            $event->status == 1 ? 'checked' : '' }} />
                                        Active
                                        <span class="form-check-sign"></span>
                                        @endif
                                    </label>
                                </div>
                                <div class="form-check-radio">
                                    <label class="form-check-label">
                                        @if (old('status') != null)
                                        <input class="form-check-input" type="radio" name="status" value="0" {{
                                            old('status')==0 ? 'checked' : '' }} />
                                        Inactive
                                        <span class="form-check-sign"></span>
                                        @else
                                        <input class="form-check-input" type="radio" name="status" value="0" {{
                                            $event->status == 0 ? 'checked' : '' }} />
                                        Inactive
                                        <span class="form-check-sign"></span>
                                        @endif
                                    </label>
                                </div>

                            </div>

                            <div class="col-md-7 col-sm-7">
                                <div class="form-group">
                                    <h6>
                                        Name <span class="icon-danger">*</span>
                                    </h6>
                                    <input type="text" name="name" value="{{ old('name') != null ? old('name') : $event->name }}"
                                        class="form-control border-input" placeholder="Enter the event name here..." />
                                </div>
                                <div class="form-group">
                                    <h6>
                                        Location
                                        <span class="icon-danger">*</span>
                                    </h6>
                                    <input type="text" name="location" value="{{ old('location') != null ? old('location') : $event->location }}"
                                        class="form-control border-input"
                                        placeholder="Enter the event location here..." />
                                </div>
                                <div class="row price-row" style="margin-top: -15px">
                                    <div class="col-md-6">
                                        <h6>
                                            Start Date
                                            <span class="icon-danger">*</span>
                                        </h6>
                                        <div class="input-group date">
                                            <input type="text" name="start_date" value="{{ old('start_date') != null ? old('start_date') : $event->start_date }}"
                                                class="form-control" id="start_date"
                                                placeholder="2022-12-17 16:55:00" />
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"
                                                    onclick="focusInput('start_date')"><i class="fa fa-calendar"
                                                        aria-hidden="true"></i></span>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <h6>
                                            End Date
                                            <span class="icon-danger">*</span>
                                        </h6>
                                        <div class="input-group date">
                                            <input type="text" name="end_date" value="{{ old('end_date') != null ? old('end_date') : $event->end_date }}"
                                                class="form-control" id="end_date"
                                                placeholder="2022-12-18 16:55:00" />
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"><i class="fa fa-calendar"
                                                        aria-hidden="true"></i></span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h6>Description</h6>
                                    <textarea class="form-control textarea-limited" name="description"
                                        placeholder="Enter description for your event" rows="13" ,
                                        maxlength="255">{{ old('description') != null ? old('description') : $event->description }}</textarea>
                                    <h5>
                                        <small><span id="textarea-limited-message" class="pull-right">255 characters
                                                left</span></small>
                                    </h5>
                                </div>
                            </div>
                        </div>
                        <div class="separator"></div>
                        <div class="row buttons-row">
                            <div class="col-md-8 col-sm-8"></div>
                            <div class="col-md-2 col-sm-2">
                                <button class="btn btn-outline-danger btn-block btn-round">
                                    Cancel
                                </button>
                            </div>
                            <div class="col-md-2 col-sm-2">
                                <button class="btn btn-outline-primary btn-block btn-round">
                                    Save
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    @include('layouts.admin.footer')
</body>
@endsection
