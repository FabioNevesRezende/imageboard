
<h1 class="board-header"> /{{ $nomeBoard }}/ - {{ $descrBoard }} </h1><br>
{!! Form::open(['route' => 'posts.store', 'enctype' => 'multipart/form-data']) !!}
{{ csrf_field() }}
{{  Form::hidden('nomeboard', $nomeBoard) }}
{{  Form::hidden('insidepost', $insidePost) }}
{{  Form::text('assunto', null, array('class' => 'novo-post-form-item form-control', 'maxlength' => '255', 'placeholder' => 'Assunto' )) }}
@if($insidePost === 'n') 
    {{  Form::file('arquivos[]', array('class' => 'novo-post-form-item', 'multiple' => '')) }}
@else
    {{  Form::file('arquivos[]', array('class' => 'novo-post-form-item', 'multiple' => '')) }}
@endif
{{ Form::text('linkyoutube', null, array('class' => 'novo-post-form-item form-control', 'maxlength' => '255', 'placeholder' => 'Link(s) para vídeo(s) do youtube, separados por |' )) }}
@if(Auth::check()) 
<div style="float: left; margin-bottom: 20px; margin-left: 15px;">
Modpost {{ Form::checkbox('modpost', 'modpost', false,array('class'=>'novo-post-form-item')) }}
</div>
@endif
{{  Form::textarea('conteudo', null, array('id' => 'novo-post-conteudo','class' => 'novo-post-form-item form-control', 'placeholder' => 'Mensagem', 'rows'=>'5', 'maxlength' => '65535')) }}
<p style="margin-left: 15px;">Mime types: image/jpeg, image/png, image/gif, video/webm, video/mp4, audio/mpeg</p>
<div class="row">
    <div class="col-sm-6">
        Sage {{ Form::checkbox('sage', 'sage', false,array('class'=>'novo-post-form-item')) }}
    </div>
    <div class="col-sm-6">
        {{ Form::submit('Postar', array('class' => 'btn btn-primary btn-block form-control') ) }}
    </div>
</div>

@if($configuracaos->captcha_ativado)
<div class="row">
    <div class="col-sm-12 text-center">
        {!! app('captcha')->display($attributes = ['style'=>'margin-top: 20px;'], $lang = 'pt'); !!}
    </div>
        
</div><br>
@endif

{!! Form::close() !!}