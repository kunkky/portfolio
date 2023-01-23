                <!---Job form Here--->
            <form action="{{ url('UploadJob') }}" method="POST" enctype="multipart/form-data">
            @csrf

                        <div class="card-body">
                        <p class="text-uppercase text-sm"></p>
                        <div class="row">
                            <div class="col-md-12">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Job Name</label>
                                <input class="form-control" id="name" name="name" type="text" placeholder="Job name" :value="old('name')" required autofocus >
                            </div>
                            </div>
                            <div class="col-md-12">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Status</label>
                                <select name="status" class="form-control">
                                    <option value="in Progress">In progress</option>
                                    <option value="Delivered">Delivered</option>
                                    <option value="Abandoned">Abandoned</option>
                                </select>
                            </div>
                            </div>
                            <div class="col-md-12">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Description</label>
                            <textarea name="description" id="description" class="form-control" cols="10" rows="2" required autofocus :value="old('description')" ></textarea>
                            </div>
                            </div>
                            <div class="col-md-12">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Date</label>
                                <input class="form-control" :value="old('date')" id="date" name="job_date" type="date" required autofocus >
                            </div>
                            </div>
                            <div class="col-md-12">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Type</label>
                                <select name="job_type" class="form-control" :selected="old('job_type')">
                                    <option value="Graphics">Graphic</option>
                                    <option value="web">Web Design/Development</option>
                                </select>
                            </div>
                            </div>
                            <div class="col-md-12">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Avatar</label>
                                <input type="file" name="avatar" class="form-control" required autofocus >
                            </div>
                            </div>

                            <div class="col-md-12">
                            <div class="form-group">
                                <button class="btn btn-primary" id="btn">Add Job</button>
                            </div>
                            </div>
                        </div>
                        </div>

                    </div>
                </form>
