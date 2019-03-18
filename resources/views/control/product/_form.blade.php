<div class="content-wrapper">
    <div class="row">
        <div class="col-12">
            <div class="card card-default">
                <div class="card-header">
                    <div class="card-title">
                        <h4>Create Product</h4>
                    </div>
                </div>
                <div class="card-body">
                    {{ Form::model(isset($model) ? $model : ['action' => $action ,'method' => $method,'class' => '']) }}
                        <fieldset>
                            <legend class="border-bottom pb-2 mb-4"><strong>New Components</strong></legend>
                            <div class="form-row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        {{ Form::label('product_name','Product Name') }}
                                        {{ Form::text('product_name',null,['class' => 'form-control']) }}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('category','Category') }}
                                        {{ Form::select('category',[],null,['class' => 'custom-select']) }}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('sub_category','Sub Category') }}
                                        {{ Form::select('sub_category',[
                                            '-1' => 'Loading...'
                                        ],'-1',['class' => 'custom-select','disabled']) }}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('product_series','Product Series') }}
                                        {{ Form::select('product_series',[],null,['class' => 'custom-select']) }}
                                    </div>
                                </div>
                                <div class="col-md offset-md-1">
                                    <div class="simple-file-upload">
                                        {{ Form::label('product_image','Product Image') }}
                                        <div class="card">
                                            <div class="btn-simple-file-upload">
                                                {{ Form::button('Choose Image',['class' => 'btn btn-default']) }}
                                            </div>
                                            {{ Form::file('product_image',['class' => 'form-control-file input-simple-file-upload']) }}
                                            <img class="simple-file-upload-placeolder">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        {{ Form::label('author','Author') }}
                                        {{ Form::select('author',[],null,['class' => 'custom-select']) }}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('author_role','Author Role') }}
                                        {{ Form::select('author_role',[],null,['class' => 'custom-select']) }}
                                    </div>
                                </div>
                                <div class="col-md offset-md-1">
                                    <div class="form-group">
                                        {{ Form::label('publisher','Publisher') }}
                                        {{ Form::select('publisher',[],null,['class' => 'custom-select']) }}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('publisher_role','Publisher Role') }}
                                        {{ Form::select('publisher_role',[],null,['class' => 'custom-select']) }}
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                            <legend class="border-bottom pb-2 mb-4"><strong>Financial Details</strong></legend>
                            <div class="form-row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        {{ Form::label('selling_price','Selling Price') }}
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="fas fa-dollar-sign"></i></div>
                                            </div>
                                            {{ Form::text('selling_price',null,['class' => 'form-control']) }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md offset-md-1">
                                    <div class="form-group">
                                        {{ Form::label('cost_price','Cost Price') }}
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="fas fa-dollar-sign"></i></div>
                                            </div>
                                            {{ Form::text('cost_price',null,['class' => 'form-control']) }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                            <legend class="border-bottom pb-2 mb-4"><strong>Product Details</strong></legend>

                            <div class="form-row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        {{ Form::label('isbn','ISBN') }}
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="fas fa-barcode"></i></div>
                                            </div>
                                            {{ Form::text('isbn',null,['class' => 'form-control']) }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md offset-md-1">
                                    <div class="form-group">
                                        {{ Form::label('barcode','barcode') }}
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="fas fa-barcode"></i></div>
                                            </div>
                                            {{ Form::text('barcode',null,['class' => 'form-control']) }}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <fieldset>
                                <div class="form-row">
                                    <div class="col-md-5">

                                        <div class="form-group">
                                            {{ Form::label('product_type','Product Type') }}
                                            {{ Form::select('product_type',[],null,['class' => 'custom-select']) }}
                                        </div>
                                        <div class="form-group">
                                            {{ Form::label('cover_type','Cover Type') }}
                                            {{ Form::select('cover_type',[],null,['class' => 'custom-select']) }}
                                        </div>

                                    </div>
                                    <div class="col-md offset-md-1">
                                        <div class="form-group">
                                            {{ Form::label('edition','Edition') }}
                                            {{ Form::text('edition',null,['class' => 'form-control']) }}
                                        </div>
                                        <div class="form-group">
                                            {{ Form::label('product_size','Product Size') }}
                                            {{ Form::select('product_size',[],null,['class' => 'custom-select']) }}
                                        </div>
                                    </div>
                                </div>
                            </fieldset>

                            <div class="form-row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        {{ Form::label('product_weight','Product Weight') }}
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="fas fa-weight-hanging"></i></div>
                                            </div>
                                            {{ Form::text('product_weight',null,['class' => 'form-control']) }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md offset-md-1">
                                    <div class="form-group">
                                        {{ Form::label('nb_of_pages','#Nb Of Pages') }}
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="fas fa-hashtag"></i></div>
                                            </div>
                                            {{ Form::number('nb_of_pages',null,['class' => 'form-control']) }}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        {{ Form::label('release_date','Release Date') }}
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="fas fa-calendar-alt"></i></div>
                                            </div>
                                            {{ Form::text('release_date',null,['class' => 'form-control']) }}
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </fieldset>

                        <fieldset>
                            <legend class="border-bottom pb-2 mb-4"><strong>Product Files</strong></legend>

                            <div class="form-row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        {{ Form::label('ebook','E-Book/Pdf Link') }}
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="far fa-file-pdf"></i></div>
                                            </div>
                                            {{ Form::text('ebook',null,['class' => 'form-control']) }}
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md offset-md-1">
                                    <div class="form-group">
                                        {{ Form::label('audio','Audio') }}
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="far fa-file-audio"></i></div>
                                            </div>
                                            {{ Form::text('audio',null,['class' => 'form-control']) }}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col">
                                    <div class="form-group">
                                        {{ Form::label('description','Description') }}
                                        {{ Form::hidden('description',null,['class' => 'editor-value']) }}
                                        <div class="editor"></div>
                                    </div>
                                </div>

                            </div>

                        </fieldset>
                    {{ Form::close() }}
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-end">
                        <button class="btn btn-info" type="submit"><strong>Save</strong></button>
                        <button class="btn btn-link" type="submit"><strong>Cancel</strong></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>