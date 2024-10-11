		

    <div class="col-md-12 {{ $errors->has('title') ? 'has-error' : '' }}">
        {!! Form::label('Category title', ['class' => 'form-label']) !!}
        {!! Form::text('title', null, ['class' => 'form-control', 'placeholder'=> 'Category title']) !!}
        @if($errors->has('title'))
        <div class="invalid-feedback">{{ $errors->first('title') }}
        </div>
        @endif
    
    </div>


    <div class="col-md-12 {{ $errors->has('slug') ? 'has-error' : '' }}">
        {!! Form::label('Category Slug', ['class' => 'form-label']) !!}
        {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder'=> 'Category Slug']) !!}
        @if($errors->has('slug'))
        <div class="invalid-feedback">{{ $errors->first('slug') }}
        </div>
        @endif
    
    </div>
    

    <div class="col-md-12">
        <div class="d-md-flex d-grid align-items-center gap-3">

            <a href="{{ route('admin.product_category.index') }}" class="btn btn-light px-4">Cancel</a>
                   
            <button type="submit" class="btn btn-primary px-4">{{ $category->exists ? 'Update' : 'Save' }}</button>
            
        </div>
    </div>


