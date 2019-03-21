<div class="content-wrapper">
    <div class="row">
        <div class="col-12">
            {{ Form::model(isset($model) ? $model : [],['url' => $action ,'method' => $method ,'enctype' => "multipart/form-data" ,'class' => 'ajax-form']) }}
            <div class="card card-default">
                <div class="card-header">
                    <div class="card-title">
                        <h4>{{ $title }}</h4>
                    </div>
                </div>
                <div class="card-body">
                    <fieldset>
                        <legend class="border-bottom pb-2 mb-4"><strong>New Components</strong></legend>
                        <div class="form-row">
                            <div class="col-md-5 order-1 order-md-0">
                                {!! _Form::required()->text('Product Name','product-name','product_name') !!}
                                {!! _Form::required()->select('Category','category-type','category_type',$categoryType,$model->category_type_id ?? null) !!}
                                {!! _Form::select('Sub Ctaegory','category','category',$category ?? [],$model->category_id ?? null,'','normal-select',[
                                    'data-remote' => url('autocomplete/category'),
                                    'data-param'  => '#category-type',
                                ]) !!}
                                {!! _Form::select('Product Series','product_series','product_series',$productSeries,$model->product_series_id ?? null) !!}
                            </div>
                            <div class="col-md offset-md-1">
                                <div class="simple-file-upload">
                                    {{ Form::label('product_image','Product Image') }}
                                    <div class="card">
                                        <div class="btn-simple-file-upload">
                                            {{ Form::button('Choose Image',['class' => 'btn btn-default']) }}
                                        </div>
                                        {{ Form::file('product_image',['class' => 'form-control-file input-simple-file-upload','accept' => "image/*"]) }}
                                        <img class="simple-file-upload-placeolder" @isset($model) src="{{ $model->product_image_path ?? '' }}" @endisset>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-5">
                                {!! _Form::required()->select('Author','author','author',$author, $model->author_id ?? null) !!}
                                {!! _Form::required()
                                     ->tooltip('author-role','','220px')
                                     ->autocomplete('Author Role','author-role','author_role', url('autocomplete/author-role'), isset($model) ? autocompleteEval($model->authorRole) : []) !!}
                            </div>
                            <div class="col-md-6 offset-md-1">
                                {!! _Form::required()->select('Publisher','publisher','publisher',$publisher ,$model->publisher_id ?? null) !!}
                                {!! _Form::required()
                                     ->tooltip('publisher-role',', ')
                                     ->autocomplete('Publisher Role','publisher-role','publisher_role', url('autocomplete/publisher-role'),isset($model) ? autocompleteEval($model->publisherRole) : []) !!}
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend class="border-bottom pb-2 mb-4"><strong>Financial Details</strong></legend>
                        <div class="form-row">
                            <div class="col-md-5">
                                {!! _Form::required()->inputNumberGroup('Selling Price','selling-price','selling_price',null,'','','','fas fa-dollar-sign',['min' => 0]) !!}
                            </div>
                            <div class="col-md offset-md-1">
                                {!! _Form::required()->inputNumberGroup('Cost Price','cost-price','cost_price',null,'','','','fas fa-dollar-sign',['min' => 0]) !!}
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend class="border-bottom pb-2 mb-4"><strong>Product Details</strong></legend>

                        <div class="form-row">
                            <div class="col-md-5">
                                {!! _Form::inputTextGroup('ISBN','isbn','isbn',$model->product_isbn ?? null,'','','','fas fa-barcode',['min' => 0]) !!}
                            </div>
                            <div class="col-md offset-md-1">
                                {!! _Form::inputTextGroup('Barcode','barcode','barcode',$model->product_barcode ?? null,'','','','fas fa-barcode',['min' => 0]) !!}
                            </div>
                        </div>

                        <fieldset>
                            <div class="form-row">
                                <div class="col-md-5">
                                    {!! _Form::required()
                                            ->tooltip('product-type',', ')
                                            ->autocomplete('Product Type','product-type','product_type', url('autocomplete/product-type'), isset($model) ? autocompleteEval($model->productType) : []) !!}

                                    {!! _Form::tooltip('cover-type',', ')
                                            ->autocomplete('Cover Type','cover-type','cover_type', url('autocomplete/cover-type'), isset($model) ? autocompleteEval($model->coverType) : []) !!}
                                </div>
                                <div class="col-md-6 offset-md-1">
                                    {!! _Form::number('Edition','edition','edition',null,'','',['min' => 1]) !!}

                                    {!! _Form::tooltip('product-size')
                                            ->autocomplete('Product Size','product-size','product_size', url('autocomplete/product-size'), isset($model) ? autocompleteEval($model->productSize) : []) !!}
                                </div>
                            </div>
                        </fieldset>

                        <div class="form-row">
                            <div class="col-md-5">
                                {!! _Form::inputTextGroup('Product Weight','product-weight','product_weight',null,'','','','fas fa-weight-hanging') !!}
                            </div>
                            <div class="col-md offset-md-1">
                                {!! _Form::inputNumberGroup('#Nb Of Pages','nb-of-pages','nb_of_pages',null,'','','','fas fa-hashtag',['min' => 1]) !!}
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-5">
                                {!! _Form::inputTextGroup('Release Date','release-date','release_date',null,'','','date','fas fa-calendar-alt',['data-format' => 'YYYY-MM-DD']) !!}
                            </div>
                        </div>

                    </fieldset>
                    <fieldset>
                        <legend class="border-bottom pb-2 mb-4"><strong>Product Files</strong></legend>

                        <div class="form-row">
                            <div class="col-md-5">
                                {!! _Form::inputUrlGroup('E-Book/Pdf Link','ebook','ebook',null,'','','','far fa-file-pdf') !!}
                            </div>

                            <div class="col-md offset-md-1">
                                {!! _Form::inputUrlGroup('Audio','audio','audio',null,'','','','far fa-file-audio') !!}
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col">
                                {!! _Form::editor('Description','description','description',$model->description ?? '') !!}
                            </div>
                        </div>

                    </fieldset>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-center justify-content-md-end">
                        <button class="btn btn-info mr-2" type="submit">Save</button>
                        @if($method == 'PUT')
                            <button class="btn btn-danger mr-2" type="submit" data-method="delete">Delete</button>
                        @endif
                        <a class="btn btn-link mr-2" href="{{ URL::previous() }}"><strong>Cancel</strong></a>
                    </div>
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
