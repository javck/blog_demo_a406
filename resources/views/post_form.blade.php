<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
       新增文章
    </title>
</head>
<body>

    {!! Form::open(['action'=>'App\Http\Controllers\PostController@store','method'=>'POST','files'=>true]) !!}

        {!! Form::label('title', '標題', ['class' => 'myclass']) !!}
        {!! Form::text('title', null) !!}<br><br>

        {!! Form::label('size', '規格', ['class' => 'myclass']) !!}
        {!! Form::textarea('size', 'L Size', ['cols' =>50 , 'rows'=>10]) !!}<br><br>

        {!! Form::label('isRecommend', '是否為推薦商品', []) !!}
        {!! Form::checkbox('isRecommend', 1, true) !!}<br><br>

        {!! Form::label('colors[]', '紅色', []) !!}
        {!! Form::checkbox('colors[]', 'red', false) !!}

        {!! Form::label('colors[]', '黃色', []) !!}
        {!! Form::checkbox('colors[]', 'yellow', false) !!}

        {!! Form::label('colors[]', '綠色', []) !!}
        {!! Form::checkbox('colors[]', 'green', false) !!}<br><br>

        {!! Form::label('enabled', '是否上架', []) !!}
        上架{!! Form::radio('enabled', 1, true, []) !!}
        下架{!! Form::radio('enabled', 0, false, []) !!}<br><br>

        {!! Form::label('price', '價格', []) !!}
        {!! Form::number('price', 0, ['min'=>0 , 'max'=>10000]) !!}<br><br>
        
        {{-- 

    

        

        

        {!! Form::label('mode:', '模式', []) !!}
        經典下拉
        {!! Form::select('mode', ['recommend'=>'編輯精選','season'=>'當季商品','cp'=>'超值商品'],null, ['placeholder' => '請選擇商品模式']) !!}
        分群下拉
        {!! Form::select('mode', ['時節'=>['summer' => '夏日熱銷','winter'=>'冬節獻禮'],'價格'=>['cp'=>'超值商品','boss'=>'老闆跳樓']],null, []) !!}
        選項由後台提供
        {!! Form::select('mode', $cgies,null, []) !!}

        {!! Form::label('month', '月份', []) !!}
        月份下拉
        {!! Form::selectMonth('month', null, []) !!}<br><br>

        {!! Form::label('number', '數字', []) !!}
        區間數字下拉
        {!! Form::selectRange('number', 1, 10, 5, []) !!}<br><br>

        {!! Form::label('pwd', '密碼', []) !!}
        {!! Form::password('pwd', []) !!}<br><br>

        {!! Form::label('email', 'Email', []) !!}
        {{ Form::email('email',null,[]) }}<br><br>

        {!! Form::label('pic', '圖片', []) !!}
        {!! Form::file('pic', []) !!}<br><br>

        {!! Form::label('date', '日期', []) !!}
        {!! Form::date('date',null, []) !!}<br><br> --}}

        {!! Form::submit('儲存', []) !!}
        {!! Form::reset('重置', []) !!}

        {!! Form::close() !!}
</body>
</html>