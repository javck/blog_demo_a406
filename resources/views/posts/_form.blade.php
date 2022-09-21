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