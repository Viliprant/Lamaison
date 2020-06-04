@if(Session::has('message'))
    <div class="alert {{ Session::get('message')['type'] ?? 'alert-primary' }}">
        <p>{{ Session::get('message')['content'] ?? 'Désolé pas de message ...' }}</p>
    </div>
@endif