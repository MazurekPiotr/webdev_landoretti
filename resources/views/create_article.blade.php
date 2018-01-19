@extends('layouts.app')

@section('content')
    <div class="container">

        {{ Html::ul($errors->all(), array('class' => 'errors'))}}

        {{ Form::open(['url' => 'auctions','files' => true])}}

        <div class="form-group">
            {{ Form::label('title', 'Title',array('class' => 'required'))  }}
            {{ Form::text('title', old('title'), array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('style', 'Style',array('class' => 'required'))  }}<br>
            {{Form::select('style', array(
            'abstract' => 'Abstract',
            'africanamerican' => 'African American',
            'asiancontemporary' => 'Asian Contemporary',
            'conceptual' => 'Conceptual',
            'contemporary' => 'Contemporary',
            'emergingartists' => 'Emerging Artists',
            'middleeastcontemporary' => 'Middle East Contemporary',
            'minimalism' => 'Minimalism',
            'modern' => 'Modern',
            'pop' => 'Pop',
            'urban' => 'Urban',
            'vintagephotographs' => 'Vintage Photographs',
            ))}}
        </div>

        <div class="form-group">
            {{ Form::label('year', 'Year',array('class' => 'required'))  }}
            {{ Form::text('year', old('year'), array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('width', 'Width',array('class' => 'required'))  }}
            {{ Form::text('width', old('width'), array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('height', 'Height',array('class' => 'required'))  }}
            {{ Form::text('height', old('height'), array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('depth', 'Depth',array('class' => 'required'))  }}
            {{ Form::text('depth', old('depth'), array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('description', 'Description',array('class' => 'required'))  }}
            {{ Form::textarea('description', old('description'), array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('condition', 'Condition',array('class' => 'required'))  }}
            {{ Form::text('condition', old('condition'), array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('color', 'Color',array('class' => 'required'))  }}
            {{ Form::text('color', old('color'), array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('min_price', 'Minimum Estimated price',array('class' => 'required'))  }}
            {{ Form::text('min_price', old('min_price'), array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('max_price', 'Maximum Estimated price',array('class' => 'required'))  }}
            {{ Form::text('max_price', old('max_price'), array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('buyout_price', 'Buyout price',array('class' => 'required'))  }}
            {{ Form::text('buyout_price', old('buyout_price'), array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('enddate', 'Enddate',array('class' => 'required'))  }}
            {{ Form::date('enddate', old('enddate'), array('class' => 'form-control')) }}
        </div>


        <div class="form-group">
            <input type="file" name="image" id="image" class="required">
        </div>

        <div class="form-group">

            {{ Form::checkbox('conditionsaccepted', 'conditionsaccepted')}}
            Accept the conditions
        </div>


        {{ Form::submit('Add auction', array('class' => 'btn btn-primary')) }}

        {{ Form::close() }}

    </div>
    <br>
    </div>
@endsection
