<div class="fio">
@foreach($posts as $ind=>$post)
@if($ind !== 0) <div class="fio-subpost"> @endif

@if($post->pinado) <span class="glyphicon glyphicon-pushpin"></span> @endif @if($post->modpost) <p class="modpost">### Administrador ###</p>  @else Anônimo @endif @if($post->countrycode) |  <img src="/storage/flags/{{ $post->countrycode }}.png" alt="{{ $post->countrycode }}"> @endif  | <strong class="assunto">{{ $post->assunto }}</strong> | {{ $post->created_at->toDayDateTimeString() }}  | Nro <a class="a-nro-post">{{ $post->id }}</a> @if($ind === 0) |  <button type="button" class="btn btn-report" data-id-post="{{ $post->id }}" data-toggle="modal" data-target="#modalReport">Denunciar</button> | <a href="/{{ $nomeBoard }}">Voltar</a>  @endif 
@if(Auth::check()) 
    | <a href="/deletepost/{{ $post->id }}"><button class="btn">Deletar post</button> </a> 
    @if($ind === 0) | <a href="/pinarpost/{{ $post->id }}"><button class="btn">Pinar post</button> </a> @endif
    | <button type="button" class="btn btn-ban" data-id-post="{{ $post->id }}" data-toggle="modal" data-target="#modalBan">Banir usuário</button> 
@endif <br>
<br>
@foreach ($post->arquivos as $arq)

@if($arq->mime === 'image/jpeg' || $arq->mime === 'image/png' || $arq->mime === 'image/gif' )
        <a href="/storage/{{ $arq->filename }}" target="_blank"><img class="img-responsive img-thumbnail" src="{{ \Storage::url($arq->filename) }}" width="200px" height="200px" ></a>
    @elseif($arq->mime === 'video/mp4')
     <video width="320" controls>
        <source src="/storage/{{ $arq->filename }}" type="video/mp4">
      </video>
    @elseif($arq->mime === 'video/webm')
     <video width="320" controls>
        <source src="/storage/{{ $arq->filename }}" type="video/webm">
      </video>
    @elseif($arq->mime === 'audio/mpeg')
     <audio controls>
        <source src="/storage/{{ $arq->filename }}" type="audio/mpeg">
     </audio>
    @endif

@if(Auth::check()) <a href="/deleteimg/{{ $nomeBoard }}/{{ $arq->filename }}"><button class="btn">Deletar Arquivo</button> </a> @endif
@endforeach

@foreach ($post->ytanexos as $anx)
    <iframe width="220" height="220"
        src="https://www.youtube.com/embed/{{ $anx->ytcode }}">
    </iframe> 
@endforeach

<br>
{!! $post->conteudo !!}
@if($post->ban) <p class="ban-msg">({{ $post->ban->motivo }})</p>  @endif
@if($ind !== 0) </div> @endif
@endforeach
</div>