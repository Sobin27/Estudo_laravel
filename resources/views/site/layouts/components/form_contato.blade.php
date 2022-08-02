{{$slot}}
<form action= {{route('site.contato')}} method= "POST">
    @csrf
    <input name="nome" value="{{old('nome')}}" type="text" placeholder="Nome" class="{{$classe}}">
    @if ($errors->has('nome'))
        {{$errors->first('nome')}}
    @endif
    <br>
    <input name="telefone" value="{{old('telefone')}}" type="text" placeholder="Telefone" class="{{$classe}}">
    @if ($errors->has('telefone'))
        {{$errors->first('telefone')}}
    @endif
    <br>
    <input name="email" value="{{old('email')}}" type="text" placeholder="E-mail" class="{{$classe}}">
    @if ($errors->has('email'))
        {{$errors->first('email')}}
    @endif
    <br>

    <select name="motivo_contatos_id" class="{{$classe}} ">
        
        <option value="">Qual o motivo do contato?</option>

        @foreach ($motivo_contato as $key => $motivo)
            <option value="{{$motivo->id}}" {{old('motivo_contatos_id') == $motivo->id ? 'selected' : ''}}>{{$motivo->motivo_contato}}</option>
        @endforeach

    </select>
        @if ($errors->has('motivo_contatos_id'))
            {{$errors->first('motivo_contatos_id')}}
        @endif
    <br>
    <textarea name="mensagem" class="{{$classe}}"> 
        @if (old('mensagem') === "") 
            {{old(mensagem)}} 
        @else 
            Preencha aqui a sua mensagem 
        @endif
    </textarea>
    <br>
    <button type="submit" class="{{$classe}}">ENVIAR</button>
</form>

@if ($errors->any())

    <div style="position: absolute; top:0px; left:0px; width:100%; background-color:red">
        @foreach ($errors->all() as $error )
            {{$error}}
            <br>
        @endforeach
    </div>

@endif
