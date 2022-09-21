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

        {!! Form::label('content_small', '簡要內容', ['class' => 'myclass']) !!}
        {!! Form::textarea('content_small', null, ['cols' =>50 , 'rows'=>10]) !!}<br><br>

        {!! Form::label('content', '完整內容', ['class' => 'myclass']) !!}
        {!! Form::textarea('content', null, ['cols' =>50 , 'rows'=>10]) !!}<br><br>

        {!! Form::label('category_id', '分類', ['class' => 'myclass']) !!}
        {!! Form::select('category_id',$categories,null, ['placeholder' => '請選擇分類']) !!}<br><br>


        {!! Form::label('status', '狀態', []) !!}
        上架{!! Form::radio('status', 'published', true, []) !!}
        下架{!! Form::radio('status', 'draft', false, []) !!}<br><br>

        {!! Form::label('sort', '數字', []) !!}
        區間數字下拉
        {!! Form::selectRange('sort', 1, 10, 5, []) !!}<br><br>

        {!! Form::label('pic', '圖片', []) !!}
        {!! Form::file('pic', []) !!}<br><br>

        {{-- 

        

        

        

        {!! Form::label('mode:', '模式', []) !!}
        經典下拉
        {!! Form::select('mode', ['recommend'=>'編輯精選','season'=>'當季商品','cp'=>'超值商品'],null, ['placeholder' => '請選擇商品模式']) !!}
        分群下拉
        {!! Form::select('mode', ['時節'=>['summer' => '夏日熱銷','winter'=>'冬節獻禮'],'價格'=>['cp'=>'超值商品','boss'=>'老闆跳樓']],null, []) !!}
        選項由後台提供
        {!! Form::select('mode', $cgies,null, []) !!}

        {!! Form::label('month', '月份', []) !!}
        

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